@extends('layout')

@section('header')
    <div class="title-dashboard flex flex-col gap-1">
        <h1 class="font-bold text-3xl">Add Transaction.</h1>
        <p class="font-extralight text-neutral-400">Heyy {{ auth()->user()->username }}, {{ $time }}!</p>
    </div>
@endsection

@section('dashboard')
    <div class="form-container flex">
        <form action="{{ route('transactionStore') }}" method="POST" class="flex flex-col gap-2">
            {{-- <div class="foods-name w-full flex flex-col">
                <label for="food_name">Upload Photo</label>
                <input id="food_name" class=" py-2 rounded-l outline-none border-none" type="file">
            </div> --}}
            @csrf
            <div class="input-top gap-2 grid grid-cols-2 items-center">
                <div class="foods-name w-full gap-3 flex flex-col">
                    <label for="food_code">Menu Code.</label>
                    <select id="food_code" name="id_pesanan"
                        class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none">
                        @forelse ($order as $menu)
                            @foreach ($menu->detailPesanan as $pesanan)
                                <option value="{{ $pesanan->id_pesanan }}">{{ $pesanan->id_pesanan }}</option>
                            @endforeach
                        @empty
                            <option value="">Empty menu!</option>
                        @endforelse
                    </select>
                </div>

                {{-- <div class="foods-quantity flex gap-3 flex-col">
                    <label for="food_quantity">Total Pesanan</label>
                    <input name="total_pesanan" id="food_quantity"
                        class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="text">
                </div> --}}
            </div>

            {{-- <div class="foods-quantity flex gap-3 flex-col">
                <label for="order_total_price">Total Harga</label>
                <input name="total_harga" id="order_total_price"
                    class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="text">
            </div> --}}


            <div class="foods-quantity flex gap-3 flex-col">
                <label for="food_quantity">Bayar</label>
                <input name="total_bayar" id="food_quantity"
                    class="px-4 py-2 rounded-lg bg-slate-100 outline-none border-none" type="text">
            </div>
            <div class="btn-confirm flex flex-col">
                <button type="submit" class="bg-lime-500 mt-2 hover:bg-lime-600 text-white py-2 rounded-lg">Add
                </button>
                <a href="{{ route('transaction') }}"
                    class="border border-lime-500 mt-2 text-center hover:bg-lime-600 hover:text-white text-lime-600 py-2 rounded-lg">Cancel</a>
            </div>
        </form>
    </div>
@endsection
