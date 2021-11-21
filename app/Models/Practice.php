<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'skill_id',
        'phrase',
        'hanzi',
        'pinyin',
    ];

    function skill() {
        
        return $this->belongsTo(Skill::class);
    }
}
