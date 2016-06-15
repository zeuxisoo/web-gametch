<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTopicTable extends Migration {

    public function up() {
        Schema::create('game_topics', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('subject');
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('game_topics');
    }

}
