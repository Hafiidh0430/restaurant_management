<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\DetailPesanan;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listMenu(Request $request)
    {
        $menu = Menu::all();
        $search = $request->input('search_menu');
        if ($search) {
            $menu = Menu::whereRaw("nama_menu LIKE? OR harga_menu LIKE? OR stok LIKE?", ["%{$search}%", "%{$search}%", "%{$search}%"])->get();
        } else {
            $menu = Menu::all();
        }
        return view('pages.foodsmenu')->with(['menu' => $menu, 'search' => $search]);
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


            if ($request->hasFile('image')) {
               $request->file('image')->store('public/assets');
            }

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
    public function editMenuPages($id)
    {
        $menu = Menu::find($id);
        return view('pages.updatefood')->with(['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editMenu(Request $request, $id)
    {
        //
        $request->validate([
            'image' => ['nullable'],
            'nama_menu' => ['required'],
            'harga_menu' => ['required'],
            'stok' => ['nullable'],
        ]);

        $update_data = [
            'image' => $request->image,
            'nama_menu' => $request->nama_menu,
            'harga_menu' => $request->harga_menu,
            'stok' => $request->stok
        ];

        if (DB::table('data_menu')->where('idmenu', $id)->update($update_data) || DB::table('data_menu')->where('idmenu', $id)->first()) {
            return to_route('menu');
        }
    }

    /**
     * Remove the specified resource in storage.
     */
    public function deleteMenu($id)
    {
        //
        $delete = DB::table('data_menu')->where('idmenu', $id)->delete();
        if ($delete) return to_route('menu');
    }
}
