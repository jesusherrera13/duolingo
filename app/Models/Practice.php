<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    protected $fillable = [
        'hanzi',
        'pinyin',
        'meaning',
        'order',
        'skill_id',
        'language_id',
        'user_id',
    ];

    function skill() {
        
        return $this->belongsTo(Skill::class);
    }
}
