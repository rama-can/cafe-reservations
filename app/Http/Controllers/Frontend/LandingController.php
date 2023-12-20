<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $food = \App\Models\Food::get();
        $categories = \App\Models\Category::with(['foods' => function ($query) {
            $query->inRandomOrder();
        }])->take(6)->get();
        $chefs = \App\Models\Chef::get();
        return view('pages.frontend.landing', compact('food', 'categories', 'chefs'));
    }
}
