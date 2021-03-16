<?php


namespace App\Services;


use App\Models\Bar;
use App\Models\Music;
use App\Models\Visitor;

/**
 * Class BarService
 * @package App\Services
 */
class BarService
{
    /**
     * @param int $music
     * @param int $visitorsCount
     * @return Bar
     */
    public static function create(int $music, int $visitorsCount) : Bar
    {
        $bar = Bar::factory()->create();
        $bar->update(['music_id' => $music]);

        /** @var  Visitor[] $visitors */
        $visitors = Visitor::factory()
            ->count($visitorsCount)
            ->create([
                'bar_id' => $bar->id
            ]);

        $musics = Music::query()->select('id')->pluck('id');
        foreach ($visitors as $visitor) {
            $visitor->musics()->sync($musics->random(rand(1, 3)));
        }

        return $bar->load('visitors');
    }

}
