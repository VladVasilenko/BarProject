<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int|null $id
 * @property int|null $bar_id
 * @property string|null $name
 * @property BelongsToMany $musics
 * @property BelongsTo $bar
 * Class Visitor
 * @package App\Models
 */
class Visitor extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return BelongsToMany
     */
    public function musics(): BelongsToMany
    {
        return $this->belongsToMany(Music::class, 'visitor_music');
    }

    /**
     * @return BelongsTo
     */
    public function bar(): BelongsTo
    {
        return $this->belongsTo(Bar::class);
    }

    /**
     * @param int $musicId
     * @return bool
     */
    private function isLikeMusic(int $musicId) : bool
    {
        return $this->musics()->where('music_id', $musicId)->exists();
    }

    /**
     * @param Bar $bar
     * @return string
     */
    public function getActionName(Bar $bar) : string
    {
        return  $this->isLikeMusic($bar->music_id) ? 'Танцует' : 'Пьет';
    }




}
