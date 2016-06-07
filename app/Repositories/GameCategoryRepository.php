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

    public function findAllWithPaginate($perPage = 10) {
        return $this->gameCategory->orderBy('created_at', 'desc')->paginate($perPage);
    }

}
