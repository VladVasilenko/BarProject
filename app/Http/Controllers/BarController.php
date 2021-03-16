<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Services\BarService;

class BarController extends Controller
{
    public function index()
    {
        $musicId = Music::query()->select('id')->orderByRaw('RAND()')->first()->id;

        $bar = BarService::create($musicId, rand(5, 20));

        return view('bar_state', compact('bar'));

    }
}
