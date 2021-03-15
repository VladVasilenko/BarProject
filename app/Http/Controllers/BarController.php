<?php

namespace App\Http\Controllers;

use App\Models\Bar;
use App\Models\Music;
use App\Models\People;
use App\Services\ActionManager;


class BarController extends Controller
{

    public function index()
    {
        $bar = Bar::factory()->create();

        $musics = Music::all()->pluck('id');

        $bar->update(['music_id' => $musics->random()]);

        /** @var  People[] $peoples */
        $peoples = People::factory()->count(rand(5, 20))->create();

        foreach ($peoples as $people) {

            $people->bar()->attach($bar->id);
            $people->musics()->sync($musics->random(rand(1, 3)));
        }

        $actionManager = new ActionManager($bar);
        $peoples = $actionManager->getPeopleAction();

        return view('bar-state', compact('bar', 'peoples'));

    }
}
