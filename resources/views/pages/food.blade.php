@extends('layout')

@section('header')
    <div class="title-dashboard flex flex-col gap-1">
        <h1 class="font-bold text-3xl">Add Food.</h1>
        <p class="font-extralight text-neutral-400">Heyy {{auth()->user()->username}}, {{$time}}!</p>
    </div>
@endsection

@section('dashboard')
    <div class="form-container flex">
        <form action="{{ route('addFood') }}" method="POST" class="flex flex-col gap-2">
            @csrf
            <div class="foods-name w-full flex flex-col">
                <label for="food_name">Upload Photo</label>
                <input name="image" id="food_image" class=" py-2 rounded-l outline-none border-none" type="file">
            </div>
            <div class="foods-name w-full flex flex-col">
                <label for="food_name">Food Name</label>
                <input name="nama_menu" id="food_name" class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none"
                    type="text">
            </div>
            <div class="option-form-food flex gap-4">
                <div class="foods-price flex flex-col">
                    <label for="food_price">Price</label>
                    <input name="harga_menu" id="food_price"
                        class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="number">
                </div>
                <div class="foods-Quantity flex flex-col">
                    <label for="food_stok">Stok</label>
                    <input name="stok" id="food_stok"
                        class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="number">
                </div>
            </div>
            <div class="btn-confirm flex flex-col">
                <button type="submit" class="bg-lime-500 mt-2 hover:bg-lime-600 text-white py-2 rounded-lg">Add
                </button>
                <a href="{{ route('menu') }}"
                    class="border border-lime-500 mt-2 text-center hover:bg-lime-600 hover:text-white text-lime-600 py-2 rounded-lg">Cancel</a>
            </div>
        </form>
    </div>
@endsection
