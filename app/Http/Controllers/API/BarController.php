<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bar;
use App\Services\ActionManager;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class BarController extends Controller
{
    /**
     * @param Bar $bar
     * @return \Illuminate\Http\JsonResponse
     */
    public function barStatus(Bar $bar) : JsonResponse
    {
        $actionManager = new ActionManager($bar);
        $peoples = $actionManager->getPeopleAction();

        return Response::json([
            'bar' => $bar,
            'peoples' => $peoples
        ]);
    }
}
