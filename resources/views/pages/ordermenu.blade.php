@extends('layout')

@section('header')
    <div class="title-dashboard flex flex-col gap-1">
        <h1 class="font-bold text-3xl">Order Menu.</h1>
        <p class="font-extralight text-neutral-400">Heyy Sigma, Good Evening!</p>
    </div>
@endsection

@section('dashboard')
    <div class="mt-6">
        <div class="menu-transaction flex justify-between items-center">
            <form action="" class="search flex w-[60%] items-center gap-2">
                <input type="text" name="search_food_menu" placeholder="Nasi Bakar"
                    class="bg-slate-50 w-full py-2 pl-5 pr-32 border-2 rounded-lg outline-none ">
                <button class="px-4 py-2 border-2 rounded-lg" type="submit">Search</button>
            </form>
            <div class="filter flex items-center gap-4">
                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-2 dark:bg-lime-500 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                    type="button">
                    <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                    </svg>
                    Last 30 days
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <div class="filter-options">
                </div>
                <div class="filter-food">
                    <a href="{{ route('orderPage') }}"
                        class="px-4 py-2 inline-flex gap-3 text-white rounded-lg bg-lime-500  hover:bg-lime-600">+
                        Order
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="order-foods h-fit max-h-[70dvh] overflow-y-auto mt-6 grid grid-cols-3">
        @forelse ($pesanan as $order)
            <a href="" class="card-for-order card-order p-4  border-2 rounded-xl">
                <div class="header-order pb-2 border-b-2 flex justify-between items-center">
                    <div class="order-name flex flex-col gap-1">
                        <h3 class="order-code text-lg font-semibold">
                            Order #{{ $order->id_pesanan }}
                        </h3>
                        <p class="date-order text-sm">
                            {{ $order->pesanan->tanggal_pesanan }}
                        </p>
                    </div>
                    <h5 class="price-food px-4 py-2 text-[.8rem] bg-lime-200  text-lime-600 rounded-full font-semibold">Rp.
                        {{ $order->subtotal }}</h5>

                </div>

                <div class="order-food pt-4 flex gap-4">
                    <div class="food-img">
                        <img src="https://www.blibli.com/friends-backend/wp-content/uploads/2023/08/COVER.jpg"
                            class="w-[13rem] object-cover rounded-lg h-full " alt="">
                    </div>
                    <div class="food-details flex w-full flex-col gap-2">
                        <h3 class="food-name text-lg font-semibold">
                            {{ $order->dataMenu->nama_menu }}
                        </h3>
                        <div class="qty-food flex items-center">
                            <div class="outline-none qty w-[4.5rem] rounded-xl">
                                Qty: {{ $order->jumlah }}
                            </div>

                        </div>

                    </div>
                </div>
            </a>

            {{-- <div class="z-10 mt-10 detail-container-order absolute w-full flex justify-center">
                <div class="details-order w-[40rem] h-[24rem] flex flex-col bg-slate-400">
                    <img src="" class="bg-slate-700 w-full h-full" alt="">
                </div>
            </div> --}}
        @empty
            <h1>Empty Order!</h1>
        @endforelse 
    </div>
@endsection
