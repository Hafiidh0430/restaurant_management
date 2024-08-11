@extends('layout')

@section('header')
<div class="title-dashboard flex flex-col gap-1">
    <h1 class="font-bold text-3xl">Update Order.</h1>
    <p class="font-extralight text-neutral-400">Heyy Sigma, Good Evening!</p>
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
    <form action="" class="flex flex-col gap-2">
        <!-- <div class="foods-name w-full flex flex-col">
                <label for="food_name">Upload Photo</label>
                <input id="food_name" class=" py-2 rounded-l outline-none border-none" type="file">
            </div> -->
        <div class="foods-name w-full flex flex-col">
            <label for="food_name">Order Code.</label>
            <input id="food_name" class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="text">
        </div>
        <div class="option-form-food flex gap-4">
            <div class="foods-quantity flex flex-col">
                <label for="food_quantity">Quantity</label>
                <input name="jumlah" id="food_quantity"
                    class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="text">
            </div>
            <div class="foods-price flex flex-col">
                <label for="food_subtotal">Subtotal</label>
                <input name="subtotal" id="food_subtotal"
                    class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="text">
            </div>
        </div>
        <button type="submit" class="bg-purple-500 mt-2 hover:bg-purple-600 text-white py-2 rounded-lg">Add food</button>
    </form>
</div>
@endsection