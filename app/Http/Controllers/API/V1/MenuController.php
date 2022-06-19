<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::latest()
            ->get(['id', 'name', 'slug','icon']);

        return response()->json([
            'data' => $menu,
        ], 200);

    }
}
