<?php
namespace App\Api\Version1\Requests;

use App\Api\Version1\Bases\ApiRequest;

class AuthSignUpRequest extends ApiRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'username' => 'required|min:3|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ];
    }

}
