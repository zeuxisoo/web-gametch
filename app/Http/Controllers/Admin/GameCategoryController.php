<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameCategoryController extends Controller {

    public function create() {
        return view('admin.game_category.create');
    }

}
