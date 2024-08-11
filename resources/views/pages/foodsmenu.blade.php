@extends('layout')

@section('header')
    <div class="title-dashboard flex flex-col gap-1">
        <h1 class="font-bold text-3xl">Food Menu.</h1>
        <p class="font-extralight text-neutral-400">Heyy Sigma, Good Evening!</p>
    </div>
@endsection

@section('dashboard')
    <div class="section-foods mt-2 h-fit max-h-[70dvh] overflow-y-auto rounded-xl pt-4 pb-6">
        <div class="menu-transaction flex justify-between items-center">
            <form action="" class="search flex w-[60%] items-center gap-2">
                <input type="text" name="search_food_menu" placeholder="Nasi Bakar"
                    class="bg-slate-50 w-full py-2 pl-5 pr-32 border-2 rounded-lg outline-none ">
                <button class="px-4 py-2 border-2 rounded-lg" type="submit">Search</button>
            </form>
            <div class="filter flex items-center gap-4">
                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-2 dark:bg-purple-500 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
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
                    <a href="{{ route('addFood') }}"
                        class="px-4 py-2 inline-flex gap-3 text-white rounded-lg bg-purple-500  hover:bg-purple-600">+ Menu
                    </a>
                </div>
            </div>
        </div>
        <section class="foods-container pr-4 pb-4 max-h-[70dvh] grid grid-cols-2 lg:grid-cols-3 overflow-y-auto mt-6 gap-6">
            @forelse ($menu as $food)
                <a href="" class="food-card w-full flex p-[1rem] border-2 rounded-xl flex-col gap-4">
                    <div class="img-food rounded-xl">
                        <img src="{{ asset('public/assets/' . $food->image) }}" alt=""
                            class="img w-full object-cover bg-center rounded-lg h-[12rem]" />
                    </div>

                    <div class="details-food ">
                        <div class="food-header flex flex-col gap-2">
                            <div class="food-detail flex items-center justify-between">
                                <h3 class="food-name text-lg font-bold w-[60%]">{{ $food->nama_menu }}</h3>
                                <h5
                                    class="food-price font-bold bg-purple-200 text-[.8rem] px-4 py-3  rounded-full text-purple-600">
                                   Rp. {{ $food->harga_menu }}</h5>
                            </div>
                            <div class="other flex items-center justify-between">
                                <h5 class="food-price rounded-full font-semibold">#{{ $food->idmenu }}</h5>
                                <h5 class="food-price rounded-full">Stok: {{ $food->stok }}</h5>

                            </div>
                        </div>
                    </div>
                </a>
            @empty
            <h1>Empty Food</h1>
            @endforelse


        </section>
    </div>
@endsection
