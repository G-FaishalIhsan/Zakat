<?php

namespace App\Http\Controllers;

use App\Models\BayarZakat;
use App\Models\DistribusiZakat;
use App\Models\Muzakki;
use App\Models\mustahik;
use App\Models\mustahikLainnya;
use App\Models\JumlahZakat;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}