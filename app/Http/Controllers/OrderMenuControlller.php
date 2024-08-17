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
    public $stok_menu = null;
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

    public function updateOrderPages($id)
    {
        $update_pesanan = DetailPesanan::with(['dataMenu', 'pesanan'])->where('id_menu', $id)->first();
        $pesanan = Menu::with(['detailPesanan'])->get()->filter(function ($menu) use ($update_pesanan) {
            return $menu->idmenu !== $update_pesanan->id_menu;
        });
        return view('pages.updateOrder')->with(['pesanan' => $pesanan, 'update' => $update_pesanan]);
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
                'total_pesanan' => 0
            ]);

            // inisialisasi untuk get stok
            $stok_menu = DB::table('data_menu')->where('idmenu', $request->id_menu)->first()->stok;

            // insert into detail_pesanan
            DB::table('detail_pesanan')->insert([
                'id_pesanan' => $id_pesanan,
                'id_menu' => $request->id_menu,
                'jumlah' => $request->jumlah,
            ]);

            // update stok
            DB::table('data_menu')->where('idmenu', $request->id_menu)->update([
                'stok' => $stok_menu - $request->jumlah
            ]);

            // update total pesanan
            $total_pesanan = DB::table('detail_pesanan')->count();
            DB::table('pesanan')->where('idpesanan', $id_pesanan)->update([
                'total_pesanan' => $total_pesanan
            ]);

            return to_route('order');
        } catch (\Throwable $th) {
            // Log the error for debugging
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPesanan(Request $request, $id)
    {
        //
        $request->validate([
            'id_menu' => ['required'],
            'jumlah' => ['required'],
        ]);

        $update_data = [
            'id_menu' => $request->id_menu,
            'jumlah' => $request->jumlah,
        ];

         // inisialisasi untuk get stok
         $stok_menu = DB::table('data_menu')->where('idmenu', $request->id_menu)->first()->stok;
        
        if($request->jumlah) {
            DB::table('data_menu')->where('idmenu', $request->id_menu)->update([
                'stok' => $stok_menu - $request->jumlah
            ]);
        }

        if (DB::table('detail_pesanan')->where('id_menu', $id)->update($update_data)) {
            return to_route('order');
        }
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
