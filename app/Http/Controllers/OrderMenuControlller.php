<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Throw_;
use Symfony\Component\Console\Input\Input;

use function Laravel\Prompts\error;

class OrderMenuControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pesanan = DetailPesanan::with(['dataMenu', 'pesanan']);
        $search = $request->input('search_order');
        $filter_date = $request->input('filter_order_date');

        if ($search) {
            $pesanan = DetailPesanan::whereRaw("id_pesanan LIKE? OR jumlah LIKE? OR subtotal LIKE?", ["%{$search}%", "%{$search}%", "%{$search}%"])->get();
        } else {
            $pesanan = DetailPesanan::with(['dataMenu', 'pesanan'])->get();
        }

        //filter order by date 
        // $start_date = Carbon::now()->subDays(7); // 7 days ago
        // $end_date = Carbon::now();

        // foreach ($pesanan as $value) {
        //     dd($value->pesanan->tanggal_pesanan);
        // }
        // $pesanan = DetailPesanan::with(['dataMenu', 'pesanan'])
        //     ->whereHas('pesanan', function ($query) use ($start_date, $end_date) {
        //         $query->whereDate('tanggal_pesanan', '>=', $start_date)
        //             ->whereDate('tanggal_pesanan', '<=', $end_date);
        //     })
        //     ->get();

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

        return view('pages.ordermenu')->with(['pesanan' => $pesanan, 'search' => $search, 'time' => $time]);
    }

    public function addOrderPages()
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

        $menu = DB::table('data_menu')->get();
        return view('pages.order')->with(['menu' => $menu, 'time' => $time]);
    }

    public function updateOrderPages($id)
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

        $update_pesanan = DetailPesanan::with(['dataMenu', 'pesanan'])->where('id_menu', $id)->first();
        return view('pages.updateOrder')->with(['update' => $update_pesanan, 'time' => $time]);
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
            if ($request->jumlah > $stok_menu) {
                return to_route('addorder');
            };

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
            $total_pesanan = DB::table('detail_pesanan')->where('id_pesanan', $id_pesanan)->first();
            DB::table('pesanan')->where('idpesanan', $id_pesanan)->update([
                'total_pesanan' => $total_pesanan->jumlah
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
    public function editOrder(Request $request, $id)
    {
        //
        $update_data = $request->validate([
            'id_menu' => ['required'],
            'jumlah' => ['required'],
        ]);

        // inisialisasi untuk get stok
        $stok_menu = DB::table('data_menu')->where('idmenu', $request->id_menu)->first()->stok;
        $jumlah_old = DetailPesanan::with(['dataMenu'])->where('id_menu', $request->id_menu)->first()->jumlah;

        if ($request->jumlah > $stok_menu) {
            return back()->withErrors(['jumlah' => 'Jumlah melebihi stok yang tersedia']);
        } else {
            if ($request->jumlah < $jumlah_old) {
                DB::table('data_menu')->where('idmenu', $request->id_menu)->update([
                    'stok' => $stok_menu + ($jumlah_old - $request->jumlah)
                ]);
            } else {
                DB::table('data_menu')->where('idmenu', $request->id_menu)->update([
                    'stok' => $stok_menu - $request->jumlah
                ]);
            }
        }

        if (DB::table('detail_pesanan')->where('id_menu', $id)->update($update_data)) {
            return to_route('order');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function deleteOrder($id)
    {
        //
        $order = DB::table('pesanan')->where('idpesanan', $id)->delete();
        if ($order) return to_route('order');
    }
}
