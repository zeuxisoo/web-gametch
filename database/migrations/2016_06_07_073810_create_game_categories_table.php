<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameCategoriesTable extends Migration {

    public function up() {
        Schema::create('game_categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('chinese_name');
            $table->string('english_name');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('game_categories');
    }

}
