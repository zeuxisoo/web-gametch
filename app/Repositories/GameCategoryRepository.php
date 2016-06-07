<?php
namespace App\Repositories;

use App\Bases\AppRepository;
use App\Models\GameCategory;

class GameCategoryRepository extends AppRepository {

    protected $gameCategory;

    public function __construct(GameCategory $gameCategory) {
        $this->gameCategory = $gameCategory;
    }

    public function create($input) {
        return (new GameCategory)->create($input);
    }

}
