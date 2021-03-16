<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;

/**
 * @property int|null $id
 * @property string|null $name
 * @property int|null $music_id
 * @property HasMany|Collection $visitors
 * @property BelongsTo $music
 * Class Bar
 * @package App\Models
 */
class Bar extends Model
{
    use HasFactory;

    public $timestamps = false;


    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function visitors() : HasMany
    {
        return $this->hasMany(Visitor::class);
    }

    /**
     * @return BelongsTo
     */
    public function music() : BelongsTo
    {
        return $this->belongsTo(Music::class);
    }
}
