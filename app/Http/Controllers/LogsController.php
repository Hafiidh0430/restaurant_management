<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //set time by vibes
        $current_time = Carbon::now()->timezone('Asia/Jakarta')->hour;

        if ($current_time < 12) {
            $time = "Good Morning";
        } else if ($current_time >= 12 && $current_time < 17) {
            $time = "Good Afternoon";
        } else if ($current_time >= 17 && $current_time < 20) {
            $time = "Good Evening";
        } else {
            $time = "Good Night";
        }

        $transaksi = Transaksi::with(['transaksiPesanan'])->get();
        return view('pages.logs')->with(['time' => $time, 'transaksi' => $transaksi]);
    }
}
