<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminGameStoreRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'game_category_id' => 'required|exists:game_categories,id',
            'chinese_name'     => 'required',
            'english_name'     => 'required',
            'cover_photo'      => 'required|image|mimes:jpg,jpeg,png,gif'
        ];
    }
}
