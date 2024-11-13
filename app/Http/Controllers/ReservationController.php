<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationLog;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_type' => 'required',
            'driver' => 'required',
            'requester' => 'required',
            'approver_level_1' => 'required',
            'approver_level_2' => 'required',
            'reservation_date' => 'required|date',
        ]);

        $reservation = Reservation::create($request->except('_token'));

        ReservationLog::create([
            'reservation_id' => $reservation->id,
            'level' => 'info',
            'message' => 'Pemesanan kendaraan berhasil dibuat',
        ]);

        return redirect()->route('reservations.index')->with('success', 'Pemesanan berhasil dibuat.');
    }

    public function dashboard()
    {
        $reservations = Reservation::all();
        return view('reservations.dashboard', compact('reservations'));
    }
}
