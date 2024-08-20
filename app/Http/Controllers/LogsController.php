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
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
