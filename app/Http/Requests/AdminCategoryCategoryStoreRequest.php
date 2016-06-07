<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminCategoryCategoryStoreRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'chinese_name' => 'required',
            'english_name' => 'required',
            'cover_photo'  => 'required|image|mimes:jpg,jpeg,png,gif'
        ];
    }
}
