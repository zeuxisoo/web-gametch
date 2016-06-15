<?php
namespace App\Api\Version1\Requests;

use App\Api\Version1\Bases\ApiRequest;

class GameTopicStoreRequest extends ApiRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'game_id' => 'required|exists:games,id',
            'subject' => 'required',
            'content' => 'required',
        ];
    }

}
