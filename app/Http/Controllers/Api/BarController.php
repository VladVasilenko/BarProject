<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bar;
use App\Models\Visitor;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class BarController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function barStatus() : JsonResponse
    {
        /** @var Bar $bar */
        $bar = Bar::with('visitors')
            ->with('music')
            ->orderBy('id', 'desc')
            ->firstOrFail();

        $bar->visitors->map(function (Visitor $visitor) use ($bar): Visitor {
           $visitor->action_name = $visitor->getActionName($bar);
            return $visitor;
        });

        return Response::json($bar);
    }
}
