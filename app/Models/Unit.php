<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'language_id',
        'user_id',
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
