<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameCategory extends Model {

    protected $fillable = [
        'chinese_name', 'english_name',
    ];

}
