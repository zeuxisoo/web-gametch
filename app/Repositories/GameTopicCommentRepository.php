<?php
namespace App\Repositories;

use App\Bases\AppRepository;
use App\Models\GameTopicComment;

class GameTopicCommentRepository extends AppRepository {

    protected $gameTopicComment;

    public function __construct(GameTopicComment $gameTopicComment) {
        $this->gameTopicComment = $gameTopicComment;
    }

    public function create($input) {
        return (new GameTopicComment)->create($input);
    }

    public function findAllByGameTopicIdWithPaginate($gameTopicId, $perPage = 10) {
        return $this->gameTopicComment->whereGameTopicId($gameTopicId)->orderBy('created_at', 'asc')->paginate($perPage);
    }

}
