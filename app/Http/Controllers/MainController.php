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

        //set time by vibes
        $current_time = Carbon::now()->timezone('Asia/Jakarta')->hour;
      if($current_time < 12) {
            $time = "Good Morning";
        } else if ($current_time >= 12 && $current_time < 17) {
           $time = "Good Afternoon";
        } else if ($current_time >= 17 && $current_time < 20) {
            $time = "Good Evening";
        }else {
            $time = "Good Night";
        }

        return view('pages.main')->with(['menu' => $menu, 'pesanan' => $pesanan, 'time' => $time]);
    }
}
