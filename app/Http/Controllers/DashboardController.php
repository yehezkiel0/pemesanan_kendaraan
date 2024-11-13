<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationLog;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $vehicle_usage = Reservation::select('vehicle_type', DB::raw('count(*) as total'))->groupBy('vehicle_type')->get();

        $labels = $vehicle_usage->pluck('vehicle_type');
        $data = $vehicle_usage->pluck('total');

        $logs = ReservationLog::orderBy('created_at', 'desc')->take(50)->get();

        return view('reservations.dashboard', compact('labels', 'data', 'logs'));
    }
}
