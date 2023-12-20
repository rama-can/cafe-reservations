<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Services\HashIdService;
use App\Http\Controllers\Controller;
use App\Notifications\ReservationApproved;
use App\Notifications\ReservationRejected;

class ReservationController extends Controller
{
    protected $hashId;

    /**
     * ReservationController constructor.
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
     * Update a reservation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $hashId = $this->hashId->decode($id);
        $reservation = Reservation::FindOrFail($hashId);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'message' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $oldStatus = $reservation->status;

        $reservation->update($data);

        /**
         * Notifies the user about the status change of a reservation.
         *
         * @param Reservation $reservation The reservation object.
         * @param string $oldStatus The previous status of the reservation.
         * @return void
         */
        if ($reservation->status === 'approved' && $oldStatus !== 'approved') {
            $reservation->notify(new ReservationApproved($reservation));
        } elseif ($reservation->status === 'rejected' && $oldStatus !== 'rejected') {
            $reservation->notify(new ReservationRejected($reservation));
        }

        $reservation->update($data);
        notify()->success('Reservation updated successfully!');
        return redirect()->route('admin.reservations.index');
    }

    /**
     * Delete a reservation.
     *
     * @param string $id The ID of the reservation to be deleteden.
     * @return void
     */
    public function destroy(string $id)
    {
        $hashId = $this->hashId->decode($id);
        $reservation = Reservation::findOrFail($hashId);
        $reservation->delete();
        notify()->success('Reservation deleted successfully!');
        return redirect()->route('admin.reservations.index');
    }
}