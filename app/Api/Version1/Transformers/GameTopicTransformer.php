<?php
namespace App\Api\Version1\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\GameTopic;

class GameTopicTransformer extends TransformerAbstract {

    protected $defaultIncludes = [
        'user', 'game',
    ];

    public function transform(GameTopic $gameTopic) {
        return [
            'id'      => $gameTopic->id,
            'subject' => $gameTopic->subject,
            'content' => $gameTopic->content,
        ];
    }

    public function includeUser(GameTopic $gameTopic) {
        $user = $gameTopic->user;

        return $this->item($user, new UserTransformer);
    }

    public function includeGame(GameTopic $gameTopic) {
        $game = $gameTopic->game;

        return $this->item($game, new GameTransformer);
    }

}
