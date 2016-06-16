<?php
namespace App\Api\Version1\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Api\Version1\Bases\ApiController;
use App\Api\Version1\Requests\GameTopicCommentStoreRequest;
Use App\Api\Version1\Transformers\GameTopicCommentTransformer;
use App\Repositories\GameTopicCommentRepository;

class GameTopicCommentController extends ApiController {

    private $gameTopicCommentRepository;

    public function __construct(GameTopicCommentRepository $gameTopicCommentRepository) {
        $this->gameTopicCommentRepository = $gameTopicCommentRepository;
    }

    public function store(GameTopicCommentStoreRequest $request) {
        $input = array_merge(
            $request->only('game_topic_id', 'content'),
            [
                'user_id' => Auth::user()->id
            ]
        );

        $gameTopicComment = $this->gameTopicCommentRepository->create($input);

        return $this->response->item($gameTopicComment, new GameTopicCommentTransformer);
    }

    public function all(Request $request) {
        $gameTopicId       = $request->get('id', 1);
        $gameTopicComments = $this->gameTopicCommentRepository->findAllByGameTopicIdWithPaginate($gameTopicId);

        return $this->response->paginator($gameTopicComments, new GameTopicCommentTransformer);
    }

}
