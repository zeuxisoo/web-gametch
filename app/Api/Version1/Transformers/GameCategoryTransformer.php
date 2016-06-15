<?php
namespace App\Api\Version1\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\GameCategory;

class GameCategoryTransformer extends TransformerAbstract {

    public function transform(GameCategory $gameCategory) {
        return [
            'id'           => $gameCategory->id,
            'chinese_name' => $gameCategory->chinese_name,
            'english_name' => $gameCategory->english_name,
        ];
    }

}
