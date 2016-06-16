<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class GameTopicComment extends Model {

    protected $fillable = [
        'user_id', 'game_topic_id', 'content',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
