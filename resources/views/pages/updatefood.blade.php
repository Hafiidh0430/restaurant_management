@extends('layout')

@section('header')
    <div class="title-dashboard flex flex-col gap-1">
        <h1 class="font-bold text-3xl">Update Food.</h1>
        <p class="font-extralight text-neutral-400">Heyy Sigma, Good Evening!</p>
    </div>
@endsection

@section('dashboard')
    <div class="form-container flex">
        <form method="POST" action="{{ route('updateFoodStore', ['id' => $menu->idmenu]) }}" class="flex flex-col gap-2">
            @method('PATCH')
            @csrf
            <div class="foods-name w-full flex flex-col">
                <label for="food_name">Upload Photo</label>
                <input id="food_name" name="image" class=" py-2 rounded-l outline-none border-none" type="file">
            </div>
            <div class="foods-name w-full flex flex-col">
                <label for="food_name">Food Name</label>
                <input id="food_name" name="nama_menu" value="{{ $menu->nama_menu }}"
                    class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="text">
            </div>
            <div class="option-form-food flex gap-4">
                <div class="foods-price flex flex-col">
                    <label for="food_price">Price</label>
                    <input id="food_price" name="harga_menu" value="{{ $menu->harga_menu }}"
                        class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="text">
                </div>
                <div class="foods-Quantity flex flex-col">
                    <label for="food_Quantity">Quantity</label>
                    <input id="food_Quantity" name="stok" value="{{ $menu->stok }}"
                        class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="text">
                </div>
            </div>
            <button type="submit" class="bg-purple-500 mt-2 hover:bg-purple-600 text-white py-2 rounded-lg">Update
                food</button>
        </form>
    </div>
@endsection
