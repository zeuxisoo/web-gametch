<?php
namespace App\Http\Controllers\Admin;

use Image;
use Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminGameStoreRequest;
use App\Http\Requests\AdminGameUpdateRequest;
use App\Repositories\GameRepository;
use App\Repositories\GameCategoryRepository;

class GameController extends Controller {

    private $gameCategoryRepository;
    private $gameRepository;

    public function __construct(GameCategoryRepository $gameCategoryRepository, GameRepository $gameRepository) {
        $this->gameCategoryRepository = $gameCategoryRepository;
        $this->gameRepository         = $gameRepository;
    }

    public function create() {
        $gameCategories = $this->gameCategoryRepository->findAll();

        return view('admin.game.create', compact('gameCategories'));
    }

    public function store(AdminGameStoreRequest $request) {
        $input = $request->only('game_category_id', 'chinese_name', 'english_name', 'cover_photo');

        $input = array_merge($input, [
            'cover_photo' => $this->uploadCoverPhoto($input['cover_photo']),
        ]);

        $this->gameRepository->create($input);

        return Redirect()->back()->withNotice("Game created");
    }

    public function manage() {
        $games = $this->gameRepository->findAllWithPaginate(10);

        return view('admin.game.manage', compact('games'));
    }

    public function edit($id) {
        $gameCategories = $this->gameCategoryRepository->findAll();
        $game           = $this->gameRepository->findById($id);

        return view('admin.game.edit', compact('gameCategories', 'game'));
    }

    public function update(AdminGameUpdateRequest $request) {
        $id    = $request->input('id');
        $input = $request->only('game_category_id', 'chinese_name', 'english_name', 'cover_photo');

        $game = $this->gameRepository->findById($id);

        // Upload new cover when cover is entered
        if ($input['cover_photo'] !== null) {
            $input['cover_photo'] = $this->uploadCoverPhoto($input['cover_photo']);

            // Delete oldest cover
            Storage::disk('game')->delete($game->cover_photo);
        }else{
            $input['cover_photo'] = $game->cover_photo;
        }

        // Update database records
        $this->gameRepository->updateById($id, $input);

        return Redirect()->back()->withNotice('Game updated');
    }

    private function uploadCoverPhoto($file) {
        $name = date("YmdHis").'_'.str_random(10);
        $ext  = $file->getClientOriginalExtension();

        // Image object
        $image = Image::canvas(350, 350, '#FFFFFF')->insert(
            Image::make($file)->resize(350, 350, function($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            }),
            'center'
        );

        // Storage arguments
        $file_name    = $name.'.'.$ext;
        $file_content = (string) $image->encode($ext, 90);

        // Store to game category directory
        $storage = Storage::disk('game')->put($file_name, $file_content);

        return $file_name;
    }

}
