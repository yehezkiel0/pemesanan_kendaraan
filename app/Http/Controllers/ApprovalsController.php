<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationLog;
use Illuminate\Http\Request;

class ApprovalsController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('approvals.index', compact('reservations'));
    }

    public function approveLevel1($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->status = 'menunggu level 2';
        $reservation->save();


        ReservationLog::create([
            'reservation_id' => $reservation->id,
            'level' => 'info',
            'message' => 'Persetujuan Level 1 berhasil.',
        ]);

        return redirect()->route('approvals.index')->with('success', 'Persetujuan Level 1 berhasil.');
    }

    public function rejectLevel1($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->status = 'rejected';
        $reservation->save();

        ReservationLog::create([
            'reservation_id' => $reservation->id,
            'level' => 'warning',
            'message' => 'Penolakan Level 1 berhasil.',
        ]);

        return redirect()->route('approvals.index')->with('success', 'Penolakan Level 1 berhasil.');
    }

    public function approveLevel2($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->status = 'approved';
        $reservation->save();

        ReservationLog::create([
            'reservation_id' => $reservation->id,
            'level' => 'info',
            'message' => 'Persetujuan Level 2 berhasil.',
        ]);

        return redirect()->route('approvals.index')->with('success', 'Persetujuan Level 2 berhasil.');
    }

    public function rejectLevel2($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->status = 'rejected';
        $reservation->save();

        ReservationLog::create([
            'reservation_id' => $reservation->id,
            'level' => 'warning',
            'message' => 'Penolakan Level 2 berhasil.',
        ]);

        return redirect()->route('approvals.index')->with('success', 'Penolakan Level 2 berhasil.');
    }
}
