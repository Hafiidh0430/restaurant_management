<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listMenu()
    {
        $data_menu = DB::table('data_menu')->get();
        return view('pages.foodsmenu')->with('menu', $data_menu);
    }

    public function addMenuPages()
    {
        return view('pages.food');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function tambahMenu(Request $request)
    {
        try {
            $data_menu = $request->validate([
                'image' => ['nullable'],
                'nama_menu' => ['required'],
                'harga_menu' => ['required'],
                'stok' => ['nullable'],
            ]);
            
            // $imageName = null;
            
            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $imageName = time() . '.' . $image->getClientOriginalExtension();
            //     $image->storeAs('assets', $imageName, 'public');
            // }
            
            DB::table('data_menu')->insert($data_menu);
            return to_route('menu');
            
        } catch (\Throwable $th) {
            return back();
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function detailMenu()
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function editMenuPages()
    {
        return view('pages.updatefood');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editMenu()
    {
        //
    }

    /**
     * Remove the specified resource in storage.
     */
    public function hapusMenu()
    {
        //
    }
}
