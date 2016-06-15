<?php
use Illuminate\Database\Seeder;
use App\Models\Game;

class GamesTableSeeder extends Seeder {

    public function run() {
        $games = [
            [
                'game_category_id' => 1,
                'chinese_name'     => "被遺忘的國度：惡魔之石",
                'english_name'     => "FORGOTTEN REALMS: DEMON STONE",
                'cover_photo'      => "20160615054232_ZizhvrGFwV.png",
            ],
            [
                'game_category_id' => 1,
                'chinese_name'     => "翡翠帝國",
                'english_name'     => "JADE EMPIRE: SPECIAL EDITION",
                'cover_photo'      => "20160615054240_SZRZx5DmKD.png",
            ],
        ];

        foreach($games as $game) {
            (new Game)->create($game);
        }
    }

}
