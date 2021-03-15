<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $table = 'musics';

    protected $guarded = [];

    public function bar()
    {
        return $this->belongsTo(Bar::class);
    }
}
