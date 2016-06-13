<?php
namespace App\Repositories;

use App\Bases\AppRepository;
use App\Models\Game;

class GameRepository extends AppRepository {

    protected $game;

    public function __construct(Game $game) {
        $this->game = $game;
    }

    public function create($input) {
        return (new Game)->create($input);
    }

}
