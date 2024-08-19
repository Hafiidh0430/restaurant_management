@extends('layout')

@section('header')
    <div class="title-dashboard flex flex-col gap-1">
        <h1 class="font-bold text-3xl">Update Order.</h1>
        <p class="font-extralight text-neutral-400">Heyy {{auth()->user()->username}}, {{$time}}!</p>
    </div>
    <div class="menu-dashboard flex items-center  justify-center gap-4">
        {{-- <form action="" class="search flex items-center gap-2">
        <input type="text" name="search_food_menu" placeholder="Nasi Bakar"
            class="bg-neutral-50 py-3 pl-5 pr-32 border-2 rounded-lg outline-none ">
        <button class="px-4 py-2 border-2 rounded-lg" type="submit">Search</button>
    </form> --}}

    </div>
@endsection

@section('dashboard')
    <div class="form-container flex">
        <form method="POST" action="{{ route('updateOrderStore', ['id' => $update->id_menu]) }}" class="flex flex-col gap-2">
            <!-- <div class="foods-name w-full flex flex-col">
                                                                <label for="food_name">Upload Photo</label>
                                                                <input id="food_name" class=" py-2 rounded-l outline-none border-none" type="file">
                                                            </div> -->
            @method('PATCH')
            @csrf
            <div class="foods-name w-full flex flex-col">
                <label for="food_name">Menu Code</label>
                <select id="food_code" name="id_menu" class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none">
                    <option value="{{ $update->id_menu }}" {{ $update->id_menu == $update->id_menu ? 'selected' : '' }}>
                        {{ $update->id_menu }}</option>
                </select>
            </div>
            <div class="option-form-food flex gap-4">
                <div class="foods-quantity flex flex-col">
                    <label for="food_quantity">Quantity</label>
                    <input name="jumlah" value="{{ $update->jumlah }}" id="food_quantity"
                        class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="text">
                </div>
            </div>
            <div class="btn-confirm flex flex-col">
                <button type="submit" class="bg-lime-500 mt-2 hover:bg-lime-600 text-white py-2 rounded-lg">Update
                </button>
                <a href="{{ route('order') }}"
                    class="border border-lime-500 mt-2 text-center hover:bg-lime-600 hover:text-white text-lime-600 py-2 rounded-lg">Cancel</a>
            </div>
        </form>
    </div>
@endsection
