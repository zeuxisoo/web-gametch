<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminGameCategoryStoreRequest extends Request {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'chinese_name' => 'required',
            'english_name' => 'required',
        ];
    }
}
