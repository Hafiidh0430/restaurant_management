@extends('layout')

@section('header')
    <div class="title-dashboard flex flex-col gap-1">
        <h1 class="font-bold text-3xl">Add Order.</h1>
        <p class="font-extralight text-neutral-400">Heyy Sigma, Good Evening!</p>
    </div>
@endsection

@section('dashboard')
    <div class="form-container flex">
        <form action="{{ route('addOrder') }}" method="POST" class="flex flex-col gap-2">
            {{-- <div class="foods-name w-full flex flex-col">
                <label for="food_name">Upload Photo</label>
                <input id="food_name" class=" py-2 rounded-l outline-none border-none" type="file">
            </div> --}}
            @csrf
            <div class="foods-name w-full gap-3 flex flex-col">
                <label for="food_code">Menu Code.</label>
                <select id="food_code" name="id_menu" class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none">
                    @if ($menu->count() == 0)
                        <option value="">Empty menu!</option>
                    @else
                        @foreach ($menu as $item)
                            <option value="{{ $item->idmenu }}">{{ $item->idmenu }}</option>
                        @endforeach
                    @endif
                </select>

            </div>
            <div class="option-form-food mt-4 flex gap-4">
                <div class="foods-quantity flex gap-3 flex-col">
                    <label for="food_quantity">Quantity</label>
                    <input name="jumlah" id="food_quantity"
                        class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="text">
                </div>
                <div class="foods-price flex flex-col gap-3 ">
                    <label for="food_subtotal">Subtotal</label>
                    <input name="subtotal" id="food_subtotal"
                        class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="text">
                </div>
            </div>
            <button type="submit" class="bg-purple-500 mt-2 hover:bg-purple-600 text-white py-2 rounded-lg">Add
                food</button>
        </form>
    </div>
@endsection
