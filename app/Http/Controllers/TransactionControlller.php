<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionControlller extends Controller
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
        } else if ($current_time >= 17 && $current_time > 20) {
            $time = "Good Evening";
        } else {
            $time = "Good Night";
        }

        $order = Transaksi::with(['transaksiPesanan'])->get();
        return view('pages.transaction')->with(['time' => $time, 'order' => $order]);
    }

    public function addTransactionPage()
    {
        $order = Pesanan::with(['detailPesanan'])->get();
        // dd($nice->detailPesanan);
        return view('pages.transactionorder')->with(['order' => $order]);
    }

    public function transactionStore(Request $request)
    {
        $request->validate([
            'id_pesanan' => ['required'],
            'total_bayar' => ['required'],
        ]);

        $order = Pesanan::with(['detailPesanan'])->where('idpesanan', $request->id_pesanan)->first();

        $total_pesanan = $order->total_pesanan;
        $total_bayar = $request->total_bayar;
        foreach ($order->detailPesanan as $cape) {
            $kembalian = $total_bayar - $cape->subtotal;
        }

        try {
            $bayar = DB::table('transaksi')->insert([
                'id_pesanan' => $request->id_pesanan,
                'total_pesanan' => $total_pesanan,
                'total_bayar' => $total_bayar,
                'kembalian' => $kembalian,
            ]);

            if($bayar){

                return to_route('transaction');
            };
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('addTransaction')->withErrors("Error in payment!");
        }
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
