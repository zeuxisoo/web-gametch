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

    public function findAllByGameIdWithPaginate($gameId, $perPage = 10) {
        return $this->gameTopic->whereGameId($gameId)->orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function findById($id) {
        return $this->gameTopic->find($id);
    }

}
