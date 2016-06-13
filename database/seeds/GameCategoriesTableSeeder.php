<?php
use Illuminate\Database\Seeder;
use App\Models\GameCategory;

class GameCategoriesTableSeeder extends Seeder {

    public function run() {
        $gameCategories = [
            [
                'chinese_name' => "動作類",
                'english_name' => "Action",
            ],
            [
                'chinese_name' => "冒險類",
                'english_name' => "Adventure",
            ],
        ];

        foreach($gameCategories as $gameCategory) {
            (new GameCategory)->create($gameCategory);
        }
    }

}
