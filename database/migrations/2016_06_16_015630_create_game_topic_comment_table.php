<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTopicCommentTable extends Migration {

    public function up() {
        Schema::create('game_topic_comments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('game_topic_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('game_topic_comments');
    }

}
