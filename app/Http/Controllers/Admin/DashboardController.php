<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('pages.admin.dashboard', [
            'food' => \App\Models\Food::count(),
            'category' => \App\Models\Category::count(),
            'user' => \App\Models\User::count(),
            'reservation' => \App\Models\Reservation::count(),
            'reservation_pending' => \App\Models\Reservation::where('status', 'pending')->count(),
        ]);
    }
}