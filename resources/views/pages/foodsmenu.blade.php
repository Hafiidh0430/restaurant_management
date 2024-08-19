@extends('layout')

@section('header')
    <div class="title-dashboard flex flex-col gap-1">
        <h1 class="font-bold text-3xl">Menu.</h1>
        <p class="font-extralight text-neutral-400">Heyy {{auth()->user()->username}}, {{$time}}!</p>
    </div>
@endsection

@section('dashboard')
    <div class="section-foods mt-2 h-fit max-h-[70dvh] overflow-y-hidden pt-4 pb-6">
        <div class="menu-transaction flex justify-between items-center">
            <form action="" class="search flex w-[60%] items-center gap-2">
                <input type="text" name="search_menu" value="{{ $search }}" placeholder="Nasi Bakar"
                    class="bg-slate-50 w-[20rem] py-2 pl-5 pr-32 border-2 rounded-lg outline-none ">
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
                    <a href="{{ route('addFood') }}"
                        class="px-4 py-2 inline-flex gap-3 text-white rounded-lg bg-lime-500  hover:bg-lime-600">+ Menu
                    </a>
                </div>
            </div>
        </div>
        <section
            class="foods-container relative pr-4 pb-4 max-h-[70dvh] grid grid-cols-2 lg:grid-cols-3 overflow-y-auto mt-6 gap-6">
            @forelse ($menu as $food)
                <a href="" class="food-card w-full relative flex p-[1rem] border-2 rounded-xl flex-col gap-4">
                    <div class="img-food relative flex flex-col mr-1 rounded-xl">

                        <div class="flex justify-between items-center mb-4">
                            <h5 class="food-price rounded-full font-semibold">Menu - #{{ $food->idmenu }}</h5>
                            <svg class="w-10 option_svg flex h-10 p-2 text-dark bg-slate-100 rounded-md hover:bg-slate-200"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="M12 6h.01M12 12h.01M12 18h.01" />
                            </svg>
                        </div>

                        <img src="https://i.pinimg.com/736x/99/fb/d0/99fbd015546ba88252b699414e4a3334.jpg" alt=""
                            class="img w-full object-cover bg-center rounded-lg h-[12rem]" />
                        {{-- <img src="{{ asset('public/assets/' . $food->image) }}" alt=""
                            class="img w-full object-cover bg-center rounded-lg h-[12rem]" /> --}}
                        <div
                            class="option_menu top-12 right-0 mr-[-2.8rem] absolute shadow-xl text-sm p-2 rounded-lg gap-1 bg-slate-100 flex flex-col ">
                            <form method="GET" action="{{ route('updateFood', ['id' => $food->idmenu]) }}">
                                <button class="px-3 text-left w-full py-1 hover:bg-slate-200 rounded-md">Edit</button>
                            </form>
                            <button type="button"
                                class="btn_delete_menu px-3 py-1 text-left hover:bg-red-200 text-red-600 rounded-md">Delete</button>
                        </div>
                    </div>
                    <div class="details-food ">
                        <div class="food-header flex flex-col gap-2">
                            <div class="food-detail flex items-center justify-between">
                                <h3 class="food-name text-lg font-bold w-[60%]">{{ $food->nama_menu }}</h3>
                                <h5
                                    class="food-price font-bold bg-lime-200 text-[.8rem] px-4 py-3  rounded-full text-lime-600">
                                    Rp. {{ $food->harga_menu }}</h5>
                            </div>
                            <div class="other flex items-center justify-between">

                                <h5 class="food-price rounded-full">Stok: {{ $food->stok }}</h5>

                            </div>
                        </div>
                    </div>
                </a>

                <div
                    class="delete-modal fixed z-20 text-center justify-center flex bg-slate-100 p-6 rounded-xl flex-col gap-3 items-center">

                    <svg xmlns="http://www.w3.org/2000/svg" width="2.5rem" height="2.5rem" viewBox="0 0 24 24">
                        <g fill="none">
                            <path stroke="currentColor" stroke-width="1.5"
                                d="M5.312 10.762C8.23 5.587 9.689 3 12 3c2.31 0 3.77 2.587 6.688 7.762l.364.644c2.425 4.3 3.638 6.45 2.542 8.022S17.786 21 12.364 21h-.728c-5.422 0-8.134 0-9.23-1.572s.117-3.722 2.542-8.022z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="1.5" d="M12 8v5" />
                            <circle cx="12" cy="16" r="1" fill="currentColor" />
                        </g>
                    </svg>

                    <div class="text text-center">
                        <h3 class="text-xl font-bold">Delete Menu</h3>
                        <p class="text-lg desc-modal inline-flex flex-col gap-1">You're going to delete the <br><span
                                class="font-bold">"{{ $food->nama_menu }}"</span>
                        </p>
                    </div>

                    <div class="btn-options mt-4 flex gap-4 text-md font-semibold">
                        <button class="px-4 keep-modal rounded-lg bg-slate-100">No, Keep it.</button>
                        <form method="POST" action="{{ route('deleteFoodStore', ['id' => $food->idmenu]) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-red-200 rounded-lg text-red-600">Yes,
                                Delete!</button>
                        </form>
                    </div>
                </div>

            @empty
                <h1>Empty Food</h1>
            @endforelse
        </section>
    </div>
@endsection
<div class="overlay_delete w-dvw z-10 h-dvh opacity-55 absolute bg-neutral-900"> </div>
