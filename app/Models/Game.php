<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

    protected $fillable = [
        'game_category_id', 'chinese_name', 'english_name', 'cover_photo',
    ];

}
