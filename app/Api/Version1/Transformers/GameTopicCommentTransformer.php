<?php
namespace App\Api\Version1\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\GameTopicComment;

class GameTopicCommentTransformer extends TransformerAbstract {

    protected $defaultIncludes = [
        'user'
    ];

    public function transform(GameTopicComment $gameTopicComment) {
        return [
            'id'         => $gameTopicComment->id,
            'content'    => $gameTopicComment->content,
            'created_at' => $gameTopicComment->created_at->diffForHumans(),
        ];
    }

    public function includeUser(GameTopicComment $gameTopicComment) {
        $user = $gameTopicComment->user;

        return $this->item($user, new UserTransformer);
    }

}
