<?php
namespace App\Api\Version1\Controllers;

use Illuminate\Http\Request;
use App\Api\Version1\Bases\ApiController;
use App\Repositories\GameRepository;
use App\Api\Version1\Transformers\GameTransformer;

class GameController extends ApiController {

    private $gameRepository;

    public function __construct(GameRepository $gameRepository) {
        $this->gameRepository = $gameRepository;
    }

    public function all() {
        $games = $this->gameRepository->findAllWithPaginate();

        return $this->response->paginator($games, new GameTransformer);
    }

    public function show($id) {
        $game = $this->gameRepository->findById($id);

        return $this->response->item($game, new GameTransformer);
    }

}
