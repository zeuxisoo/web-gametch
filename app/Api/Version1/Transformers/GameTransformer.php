<?php
namespace App\Api\Version1\Transformers;

use Storage;
use League\Fractal\TransformerAbstract;
use App\Models\Game;
use App\Api\Version1\Transformers\GameCategoryTransformer;

class GameTransformer extends TransformerAbstract {

    protected $defaultIncludes = [
        'category'
    ];

    public function transform(Game $game) {
        return [
            'id'           => $game->id,
            'chinese_name' => $game->chinese_name,
            'english_name' => $game->english_name,
            'cover_photo'  => Storage::disk('game')->url('upload/game/'.$game->cover_photo),
        ];
    }

    public function includeCategory(Game $game) {
        $category = $game->category;

        return $this->item($category, new GameCategoryTransformer);
    }

}
