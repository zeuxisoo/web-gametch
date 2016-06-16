<?php
namespace App\Api\Version1\Requests;

use App\Api\Version1\Bases\ApiRequest;

class GameTopicCommentStoreRequest extends ApiRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'game_topic_id' => 'required|exists:game_topics,id',
            'content'       => 'required',
        ];
    }

}
