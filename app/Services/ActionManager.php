<?php

namespace App\Services;

use App\Models\Bar;

class ActionManager
{
    protected $bar;

    public function __construct(Bar $bar)
    {
        $this->bar = $bar;
    }

    public function getPeopleAction()
    {
        $peoples = $this->bar->peoples->load('musics');

        foreach ($peoples as &$people) {
            $people['action'] = $people->isLikeMusicInBar($this->bar->music_id) ? 'Танцует' : 'Пьет';
        }

        return $this->bar->peoples;
    }

}
