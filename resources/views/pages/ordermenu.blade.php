@extends('layout')

@section('header')
    <div class="title-dashboard flex flex-col gap-1">
        <h1 class="font-bold text-3xl">Order.</h1>
        <p class="font-extralight text-neutral-400">Heyy {{auth()->user()->username}}, {{$time}}!</p>
    </div>
@endsection

@section('dashboard')
    <div class="mt-6">
        <div class="menu-transaction flex justify-between items-center">
            <form action="" class="search flex w-[60%] items-center gap-2">
                <input type="text" name="search_order" value="{{ $search }}" placeholder="Nasi Bakar"
                    class="bg-slate-50 w-[20rem]  py-2 pl-5 pr-32 border-2 rounded-lg outline-none ">
                <button class="px-4 py-2 border-2 rounded-lg" type="submit">Search</button>
            </form>
            <div class="filter flex items-center gap-4">
                <select class="filter_order_date">
                    <option selected value="24">24 hours</option>
                    <option value="3">3 days</option>
                    <option value="7">7 days</option>
                    <option value="1">1 month</option>
                    <option value="3">3 month</option>
                </select>
                <div class="filter-food">
                    <a href="{{ route('orderPage') }}"
                        class="px-4 py-2 inline-flex gap-3 text-white rounded-lg bg-lime-500  hover:bg-lime-600">+
                        Order
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="order-foods h-fit max-h-[70dvh] pr-8 overflow-y-auto mt-6 ">
        @forelse ($pesanan as $order)
            <a href="" class="card-for-order card-order p-4  border-2 rounded-xl">
                <div class="header-order pb-2 border-b-2 relative flex justify-between items-center">
                    <div class="order-name flex flex-col gap-1">
                        <h3 class="order-code text-lg font-semibold">
                            Order #{{ $order->id_pesanan }}
                        </h3>
                        <p class="date-order text-sm">
                            {{ $order->pesanan->tanggal_pesanan }}
                        </p>
                    </div>
                    <div class="sub-heading flex items-center gap-3">
                        <h5 class="price-food text-[1rem] text-dark rounded-full font-semibold">
                            Rp.
                            {{ $order->subtotal }}</h5>
                        <svg class="w-10 option_order_svg flex h-10 p-2 text-dark bg-slate-100 rounded-md hover:bg-slate-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M12 6h.01M12 12h.01M12 18h.01" />
                        </svg>
                    </div>
                    <div
                        class="option_order_menu top-12 right-0 mr-[-2.8rem] mt-[.4rem] absolute shadow-xl text-sm p-2 rounded-lg gap-1 bg-slate-100 flex flex-col ">
                        <form method="GET" action="{{ route('updateOrderPages', ['id' => $order->id_menu]) }}">
                            <button class="px-3 text-left w-full py-1 hover:bg-slate-200 rounded-md">Edit</button>
                        </form>
                        <button type="button"
                            class="btn_delete_order_menu px-3 py-1 text-left hover:bg-red-200 text-red-600 rounded-md">Delete</button>
                    </div>

                </div>

                <div class="order-food pt-4 flex gap-4">
                    <div class="food-img w-[13rem] min-h-[6rem]">
                        <img src="{{ asset('/assets/img/' . $order->dataMenu->image) }}" 
                            class="w-full object-cover h-full rounded-lg" alt="">
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
            <div
                class="delete-order-modal fixed z-20 text-center justify-center flex bg-slate-100 p-6 rounded-xl flex-col gap-3 items-center">

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
                            class="font-bold">"Order #{{ $order->id_pesanan }}"</span>
                    </p>
                </div>

                <div class="btn-order-options mt-4 flex gap-4 text-md font-semibold">
                    <button class="px-4 keep-order-modal rounded-lg bg-slate-100">No, Keep it.</button>
                    <form method="POST" action="{{ route('deleteOrderStore', ['id' => $order->id_pesanan]) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-200 rounded-lg text-red-600">Yes,
                            Delete!</button>
                    </form>
                </div>
            </div>
        @empty
            <h1>Empty Order!</h1>
        @endforelse
    </div>
@endsection
<div class="overlay_order_delete w-dvw z-10 h-dvh opacity-55 absolute bg-neutral-900"> </div>
