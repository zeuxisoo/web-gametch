<?php
namespace App\Repositories;

use App\Bases\AppRepository;
use App\Models\GameTopic;

class GameTopicRepository extends AppRepository {

    protected $gameTopic;

    public function __construct(GameTopic $gameTopic) {
        $this->gameTopic = $gameTopic;
    }

    public function create($input) {
        return (new GameTopic)->create($input);
    }

}
