<?php
use Illuminate\Database\Seeder;
use App\Models\GameCategory;

class GameCategoriesTableSeeder extends Seeder {

    public function run() {
        $gameCategories = [
            [
                'chinese_name' => "動作類",
                'english_name' => "Action",
                'cover_photo'  => "20160607074826_6W5MtL9aqG.png"
            ],
            [
                'chinese_name' => "冒險類",
                'english_name' => "Adventure",
                'cover_photo'  => "20160607084734_2P3iGqOMQs.png"
            ],
        ];

        foreach($gameCategories as $gameCategory) {
            (new GameCategory)->create($gameCategory);
        }
    }

}
