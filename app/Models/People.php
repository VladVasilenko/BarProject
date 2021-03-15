<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'peoples';

    public function musics()
    {
        return $this->belongsToMany(Music::class, 'people_music');
    }

    public function bar()
    {
        return $this->belongsToMany(Bar::class, 'bar_people');
    }

    public function isLikeMusicInBar($music_id)
    {
        return in_array($music_id, $this->musics->pluck('id')->toArray());
    }

}
