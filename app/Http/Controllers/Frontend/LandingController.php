<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $food = \App\Models\Food::get();
        $categories = \App\Models\Category::with(['foods' => function ($query) {
            $query->where('is_available', true) // Hanya makanan yang tersedia
                  ->inRandomOrder(); // Mengambil makanan secara acak
        }])
        ->where('is_active', true) // Hanya kategori yang aktif
        ->take(6)
        ->get();

        $chefs = \App\Models\Chef::get();
        return view('pages.frontend.landing', compact('food', 'categories', 'chefs'));
    }
}