@extends('layout')

@section('header')
    <div class="title-dashboard flex flex-col gap-1">
        <h1 class="font-bold text-3xl">Welcome to Dashboard.</h1>
        <p class="font-extralight text-neutral-400">Heyy {{auth()->user()->username}}, {{$time}}!</p>
    </div>
    <div class="menu-dashboard flex items-center  justify-center gap-4">
        <form action="" class="search flex items-center gap-2">
            <input name="search_main" value="{{ $search }}" type="text" name="search_dashboard"
                placeholder="Bebek fried chicken" class="bg-slate-50 py-2 px-5 w-[20rem] rounded-lg outline-none border-2">
            <button class="px-4 py-2 border-2 rounded-lg" type="submit">Search</button>
        </form>
        <a href="{{ route('logs') }}"
            class="px-4 py-2 inline-flex gap-3 text-white rounded-lg bg-lime-500 hover:bg-lime-600">Messages
        </a>
    </div>
@endsection

@section('dashboard')
    <div class="dashboard-content mt-2">
        <div class="section-foods rounded-xl pt-4 pb-6 ">
            <header class="dashboard-title items-center flex justify-between ">
                <h1 class="title text-xl font-bold">
                    Available Foods.
                </h1>
                <form action="{{ route('menu') }}" method="GET" class="filter">
                    <button type="submit" class="inline-flex items-center hover:gap-2">
                        See all
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                </form>
            </header>
            <section class="foods-cotainer pr-4 h-fit max-h-[60dvh] overflow-y-auto mt-4 grid grid-cols-2 rounded-lg gap-2">
                @forelse ($menu as $foods)
                    <div class="food-card w-full flex p-[1rem] border-2 rounded-xl flex-col gap-4">
                        <div class="img-food rounded-xl">
                            <img src="https://asset.kompas.com/crops/MrdYDsxogO0J3wGkWCaGLn2RHVc=/84x60:882x592/750x500/data/photo/2021/11/17/61949959e07d3.jpg"
                                alt="" class="img w-full object-cover bg-center rounded-lg h-[12rem]" />
                        </div>

                        <div class="details-food ">
                            <div class="food-header flex flex-col gap-3">
                                <div class="food-detail flex items-center justify-between">
                                    <h3 class="food-name text-lg font-semibold w-[60%]">{{ $foods->nama_menu }}</h3>
                                    <h5
                                        class="food-price font-bold text-[1rem] rounded-full">
                                        Rp. {{ $foods->harga_menu }}</h5>
                                </div>
                                <h5 class="food-price rounded-full">Stok: {{ $foods->stok }}</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1>Empty menu!</h1>
                @endforelse
            </section>
        </div>
        <div class="section-foods rounded-xl pt-4 pb-6">
            <header class="dashboard-title items-center flex justify-between ">
                <h1 class="title text-xl font-bold">
                    Orders.
                </h1>
                <div class="filter">
                    <form action="{{ route('order') }}" method="GET" class="filter">
                        <button type="submit" class="inline-flex items-center hover:gap-2">
                            More
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </form>
                    <div class="filter-options mt-3 rounded-lg gap-1 absolute bg-neutral-100 p-4">
                        <a class="hover:bg-neutral-200 hover:font-medium px-2 py-1 option rounded-md"
                            href="">Today</a>
                        <a class="hover:bg-neutral-200 hover:font-medium px-2 py-1 option rounded-md"
                            href="">Yesterday</a>
                        <a class="hover:bg-neutral-200 hover:font-medium px-2 py-1 option rounded-md" href="">3 Days
                            ago</a>
                        <a class="hover:bg-neutral-200 hover:font-medium px-2 py-1 option rounded-md" href="">a Week
                            ago</a>
                        <a class="hover:bg-neutral-200 hover:font-medium px-2 py-1 option rounded-md" href="">a Month
                            ago</a>
                    </div>
                </div>
            </header>
            <section class="foods-contaier max-h-[60dvh] pr-4 overflow-y-auto mt-4 grid grid-cols-1 rounded-lg gap-2">
                @forelse ($pesanan as $orders)
                    <div class="card-order p-4  border-2 rounded-xl">
                        <div class="order-name pb-2 border-b-2 flex justify-between items-center ">
                            <div class="flex flex-col gap-1">
                                <h3 class="order-code text-lg font-semibold">
                                    Order #{{ $orders->id_pesanan }}
                                </h3>
                                <p class="date-order text-sm">
                                    {{ $orders->pesanan->tanggal_pesanan }}
                                </p>
                            </div>

                            <h5 class="price-food font-semibold">Rp. {{ $orders->subtotal }}</h5>
                        </div>

                        <div class="order-food pt-4 flex gap-4 items-center">
                            <div class="food-img w-[13rem] h-[5rem]">
                                <img src="https://www.blibli.com/friends-backend/wp-content/uploads/2023/08/COVER.jpg"
                                    class="w-full h-full object-cover rounded-lg " alt="">
                            </div>
                            <div class="food-details flex w-full flex-col gap-2">
                                <div class="product-food flex items-center justify-between">
                                    <h3 class="food-name text-lg font-semibold">
                                        {{ $orders->dataMenu->nama_menu }}
                                    </h3>
                                </div>
                                <div class="qty-food flex items-center">
                                    <h5>Qty: {{ $orders->jumlah }}</h5>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <h1>Empty order!</h1>
                @endforelse
            </section>
        </div>
    </div>
@endsection

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttonFilterFoods = document.querySelector(".select-filter");
        const filterOption = document.querySelector(".filter-options");
        const optionMenuFilterFoods = document.querySelectorAll(".filter-options .option");


        buttonFilterFoods.addEventListener("click", () => {
            filterOption.classList.toggle("active");
        })

        optionMenuFilterFoods.forEach(element => {
            element.addEventListener("click", (event) => {
                event.preventDefault();
                if (event) {
                    filterOption.classList.remove("active");
                    const target = event.target.textContent;
                    buttonFilterFoods.textContent = target;
                }
                return;
            })
        });

    });
</script> --}}
