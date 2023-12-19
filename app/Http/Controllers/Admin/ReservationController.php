<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Services\HashIdService;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    protected $hashId;

    /**
     * CategoryController constructor.
     *
     * @param HashIdService $hashIdService The HashIdService instance.
     */
    public function __construct(HashIdService $hashIdService)
    {
        $this->hashId = $hashIdService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Reservation::with('category');

        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%');
                // Tambahkan kolom-kolom lain yang ingin Anda cari di sini
        }

        $reservations = $query->paginate(5);

        return view('pages.admin.reservation.index', [
            'reservations' => $reservations,
            'hashId' => $this->hashId,
            'search' => $search,
            'isSearching' => $search ? true : false,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hash = $this->hashId;
        $id = $hash->decode($id);
        return view('pages.admin.reservation.edit', [
            'reservation' => Reservation::findOrFail($id),
            'hash' => $hash
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
