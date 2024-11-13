<?php

namespace App\Http\Controllers;

use App\Models\Reservation;


class ReportController extends Controller
{
    public function export()
    {

        $reservations = Reservation::all();


        $fileName = 'reservations.csv';


        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');


        $output = fopen('php://output', 'w');


        fputcsv($output, ['ID', 'Name', 'Vehicle Type', 'Date', 'Status']);


        foreach ($reservations as $reservation) {
            fputcsv($output, [
                $reservation->id,
                $reservation->driver,
                $reservation->vehicle_type,
                $reservation->reservation_date,
                $reservation->status,
            ]);
        }


        fclose($output);
        exit;
    }
}
