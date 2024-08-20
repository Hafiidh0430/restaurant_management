<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\DetailPesanan;
use App\Models\Menu;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // mapping all Menu with search input
        $menu = Menu::all();
        $pesanan = DetailPesanan::with(['dataMenu', 'pesanan'])->get();
        $search = $request->input('search_main');
        if ($search) {
            $menu = Menu::whereRaw("nama_menu LIKE? OR harga_menu LIKE? OR stok LIKE?", ["%{$search}%", "%{$search}%", "%{$search}%"])->get();
        } else {
            $menu = Menu::all();
        }

        //set time by vibes
        $current_time = Carbon::now()->timezone('Asia/Jakarta')->hour;
      if($current_time < 12) {
            $time = "Good Morning";
        } else if ($current_time >= 12 && $current_time < 17) {
           $time = "Good Afternoon";
        } else if ($current_time >= 17 && $current_time > 20) {
            $time = "Good Evening";
        }else {
            $time = "Good Night";
        }

        return view('pages.main')->with(['menu' => $menu, 'pesanan' => $pesanan, 'search' => $search, 'time' => $time]);
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
