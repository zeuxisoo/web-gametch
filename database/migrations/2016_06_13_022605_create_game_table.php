<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTable extends Migration {

    public function up() {
        Schema::create('games', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('game_category_id')->unsigned()->index();
            $table->string('chinese_name');
            $table->string('english_name');
            $table->string('cover_photo');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('games');
    }

}
