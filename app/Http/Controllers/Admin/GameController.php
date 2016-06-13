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

    }

    public function edit($id) {

    }

    public function update(AdminGameUpdateRequest $request) {

    }

    private function uploadCoverPhoto($file) {
        $name = date("YmdHis").'_'.str_random(10);
        $ext  = $file->getClientOriginalExtension();

        // Image object
        $image = Image::canvas(300, 300, '#FFFFFF')->insert(
            Image::make($file)->resize(300, null, function($constraint) {
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
