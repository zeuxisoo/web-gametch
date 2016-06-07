<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminGameCategoryUpdateRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id'           => 'required|exists:game_categories,id',
            'chinese_name' => 'required',
            'english_name' => 'required',
            'cover_photo'  => 'image|mimes:jpg,jpeg,png,gif'
        ];
    }
}
