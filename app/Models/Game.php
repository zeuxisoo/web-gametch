<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GameCategory;

class Game extends Model {

    protected $fillable = [
        'game_category_id', 'chinese_name', 'english_name', 'cover_photo',
    ];

    public function category() {
        return $this->belongsTo(GameCategory::class, 'game_category_id', 'id');
    }

}
