<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function peoples()
    {
        return $this->belongsToMany(People::class, 'bar_people');
    }

    public function music()
    {
        return $this->hasOne(Music::class, 'id', 'music_id');
    }
}
