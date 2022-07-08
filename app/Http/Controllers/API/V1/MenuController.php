<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(): JsonResponse
    {
        $menu = Menu::latest()
            ->withCount('articles')
            ->get(['id', 'name', 'slug','icon','articles_count']);

        return response()->json([
            'data' => $menu,
        ], 200);

    }
}
