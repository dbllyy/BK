<?php

namespace App\Http\Controllers;

use App\Models\Komputer;
use App\Models\Cabang;

class DashboardController extends Controller
{
    public function index()
    {
        // Example: Retrieve data for the dashboard
        $komputers = Komputer::all();
        $cabangs = Cabang::all();

        // Pass the data to the dashboard view
        return view('dashboard.index', compact('komputers', 'cabangs'));
    }
}
