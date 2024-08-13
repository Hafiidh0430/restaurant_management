<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Manajemen Restoran')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

</head>

<body class="b">
    <div class="flex">
        <aside class="fixed bg-neutral-50 h-screen w-[16.5rem] py-10 px-10 border-r-2">
            <h3 class="title text-2xl font-bold">Sigmart.</h3>
            <div class="menu flex flex-col  mt-7">
                <p class="title-main text-sm rounded-full text-neutral-500 font-bold">General.</p>
                <div class="list-menu mt-4 text-gray-800 font-medium gap-1 flex flex-col">
                    <a class="hover:bg-purple-200  hover:text-purple-600 px-4 rounded-md py-2 rounded-4 {{ request()->routeIs('main') ? 'bg-purple-500 text-white' : '' }}"
                        href="{{ route('main') }}">Dashboard</a>
                    <a class="hover:bg-purple-200  hover:text-purple-600 px-4 rounded-md py-2 rounded-4 {{ request()->routeIs(['menu', 'foodPage']) ? 'bg-purple-500 text-white' : '' }}"
                        href="{{ route('menu') }}">Food Menu</a>
                    <a class="hover:bg-purple-200  hover:text-purple-600 px-4 rounded-md py-2 rounded-4 {{ request()->is(['order', 'addorder']) ? 'bg-purple-500 text-white' : '' }}"
                        href="{{ route('order') }}">Order Menu</a>
                    <a class="hover:bg-purple-200  hover:text-purple-600 px-4 rounded-md py-2 rounded-4 {{ request()->is('transaction') ? 'bg-purple-500 text-white' : '' }}"
                        href="{{route('transaction')}}">Transaction</a>
                    <a class="hover:bg-purple-200  hover:text-purple-600 px-4 rounded-md py-2 rounded-4 {{ request()->is('logs*') ? 'bg-purple-500 text-white' : '' }}"
                        href="{{route('logs')}}">Logs</a>
                </div>

                <hr class="my-4">
                <div class="list-menu mt-2 text-gray-800 font-medium flex flex-col">
                    <div class="list-menu flex">
                        <p class="title-main text-sm rounded-full text-neutral-500 font-bold">Other.</p>
                    </div>
                    <div class="mt-4 text-gray-800 font-medium w-full flex flex-col">
                        <a class=" text-red-600 px-4 hover:bg-red-300 hover:text-red-700 bg-red-200 rounded-md py-2 rounded-4"
                            href="#">Sign Out</a>
                    </div>
                </div>
            </div>

    </div>
    </div>

    <div class="z-10 pl-[20rem] container-dashboard w-full flex-col py-10 px-12 flex">
        <div class="wrapper-dashboard border-b-2 pb-6 w-full">
            <div class="header-dashboard flex items-center justify-between">
                @yield('header')
            </div>
        </div>
        <section class="mt-2 relative">
            @yield('dashboard')

        </section>
    </div>
    </div>


</body>

</html>
