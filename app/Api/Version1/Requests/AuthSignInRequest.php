<?php
namespace App\Api\Version1\Requests;

use App\Api\Version1\Bases\ApiRequest;

class AuthSignInRequest extends ApiRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'account'  => 'required',
            'password' => 'required',
        ];
    }

}
