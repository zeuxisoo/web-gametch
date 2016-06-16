<?php
namespace App\Api\Version1\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Api\Version1\Bases\ApiController;
use App\Api\Version1\Requests\GameTopicStoreRequest;
Use App\Api\Version1\Transformers\GameTopicTransformer;
use App\Repositories\GameTopicRepository;

class GameTopicController extends ApiController {

    private $gameTopicRepository;

    public function __construct(GameTopicRepository $gameTopicRepository) {
        $this->gameTopicRepository = $gameTopicRepository;
    }

    public function store(GameTopicStoreRequest $request) {
        $input = array_merge(
            $request->only('game_id', 'subject', 'content'),
            [
                'user_id' => Auth::user()->id
            ]
        );

        $gameTopic = $this->gameTopicRepository->create($input);

        return $this->response->item($gameTopic, new GameTopicTransformer);
    }

    public function all(Request $request) {
        $gameId     = $request->get('id', 1);
        $gameTopics = $this->gameTopicRepository->findAllByGameIdWithPaginate($gameId);

        return $this->response->paginator($gameTopics, new GameTopicTransformer);
    }

    public function show($id) {
        $gameTopic = $this->gameTopicRepository->findById($id);

        return $this->response->item($gameTopic, new GameTopicTransformer);
    }

}
