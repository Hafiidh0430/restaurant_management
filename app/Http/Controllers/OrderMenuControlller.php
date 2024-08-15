<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class OrderMenuControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = DetailPesanan::with(['dataMenu', 'pesanan'])->get();
        return view('pages.ordermenu')->with(['pesanan' => $pesanan]);
    }

    public function addOrderPages()
    {
        $menu = DB::table('data_menu')->get();
        return view('pages.order')->with('menu', $menu);
    }

    public function pesananBaru(Request $request)
    {
        try {
            $request->validate([
                'id_menu' => ['required', 'numeric'],
                'jumlah' => ['required', 'numeric'],
            ]);

            // insialisasi untuk get id_pesanan
            $id_pesanan = DB::table('pesanan')->insertGetId([
                'total_pesanan' => 0 // Initialize total_pesanan
            ]);

            // inisialisasi untuk get harga dan stok
            $menu = DB::table('data_menu')->where('idmenu', $request->id_menu)->first();
            $harga_menu = $menu->harga_menu;
            $stok_menu = $menu->stok;

            // hitung subtotal
            $subtotal = $harga_menu * $request->jumlah;

            // insert into detail_pesanan
            DB::table('detail_pesanan')->insert([
                'id_pesanan' => $id_pesanan,
                'id_menu' => $request->id_menu,
                'jumlah' => $request->jumlah,
                'subtotal' => $subtotal
            ]);

            // update stok
            DB::table('data_menu')->where('idmenu', $request->id_menu)->update([
                'stok' => $stok_menu - $request->jumlah
            ]);

            // update total pesanan
            $total_pesanan = DB::table('detail_pesanan')->where('id_pesanan', $id_pesanan)->count();
            DB::table('pesanan')->where('idpesanan', $id_pesanan)->update([
                'total_pesanan' => $total_pesanan
            ]);

            return to_route('order');
        } catch (\Throwable $th) {
            // Log the error for debugging
            return back()->with('error', 'Terjadi kesalahan saat memproses pesanan.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambahItemPesanan(Request $request)
    {
        //

        function simpanPesanan() {}
        function batalPesanan() {}
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
        return view('pages.updateorder');
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
    public function update(Request $request)
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
