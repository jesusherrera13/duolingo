<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'unit_id',
        'name',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function practices()
    {
        return $this->hasMany(Practice::class);
    }
}
