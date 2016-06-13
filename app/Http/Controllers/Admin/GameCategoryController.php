<?php
namespace App\Http\Controllers\Admin;

use Image;
use Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminGameCategoryStoreRequest;
use App\Http\Requests\AdminGameCategoryUpdateRequest;
use App\Repositories\GameCategoryRepository;

class GameCategoryController extends Controller {

    private $gameCategoryRepository;

    public function __construct(GameCategoryRepository $gameCategoryRepository) {
        $this->gameCategoryRepository = $gameCategoryRepository;
    }

    public function create() {
        return view('admin.game_category.create');
    }

    public function store(AdminGameCategoryStoreRequest $request) {
        $input = $request->only('chinese_name', 'english_name');

        $this->gameCategoryRepository->create($input);

        return Redirect()->back()->withNotice("Game category created");
    }

    public function manage() {
        $gameCategories = $this->gameCategoryRepository->findAllWithPaginate(2);

        return view('admin.game_category.manage', compact('gameCategories'));
    }

    public function edit($id) {
        $gameCategory = $this->gameCategoryRepository->findById($id);

        return view('admin.game_category.edit', compact('gameCategory'));
    }

    public function update(AdminGameCategoryUpdateRequest $request) {
        $id    = $request->input('id');
        $input = $request->only('chinese_name', 'english_name');

        // Update database records
        $this->gameCategoryRepository->updateById($id, $input);

        return Redirect()->back()->withNotice('Game category updated');
    }

}
