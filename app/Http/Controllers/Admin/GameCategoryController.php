<?php
namespace App\Http\Controllers\Admin;

use Image;
use Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryCategoryStoreRequest;
use App\Repositories\GameCategoryRepository;

class GameCategoryController extends Controller {

    private $gameCategoryRepository;

    public function __construct(GameCategoryRepository $gameCategoryRepository) {
        $this->gameCategoryRepository = $gameCategoryRepository;
    }

    public function create() {
        return view('admin.game_category.create');
    }

    public function store(AdminCategoryCategoryStoreRequest $request) {
        $input = $request->only('chinese_name', 'english_name', 'cover_photo');

        $input = array_merge($input, [
            'cover_photo' => $this->uploadCoverPhoto($input['cover_photo']),
        ]);

        $this->gameCategoryRepository->create($input);

        return Redirect()->back()->withNotice("Game category created");
    }

    public function manage() {
        $gameCategories = $this->gameCategoryRepository->findAllWithPaginate(10);

        return view('admin.game_category.manage', compact('gameCategories'));
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
        $storage = Storage::disk('game-category')->put($file_name, $file_content);

        return $file_name;
    }

}
