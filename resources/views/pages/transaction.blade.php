@extends('layout')

@section('header')
    <div class="title-dashboard flex flex-col gap-1">
        <h1 class="font-bold text-3xl">Logs.</h1>
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
    <div class="mt-6">
        <div class="menu-transaction flex justify-between items-center">
            <form action="" class="search flex items-center gap-2">
                <input type="text" name="search_food_menu" placeholder="Nasi Bakar"
                    class="bg-slate-50 w-[20rem] py-2 pl-5 pr-32 border-2 rounded-lg outline-none ">
                <button class="px-4 py-2 border-2 rounded-lg" type="submit">Search</button>
            </form>
            <div class="filter flex items-center justify-between gap-4">
                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-500 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
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

                <div class="filter-food flex item-center gap-4">
                    <a href=""
                        class="px-4 py-2 inline-flex gap-3 text-white rounded-lg bg-purple-500  hover:bg-purple-600">+ Transaction
                    </a>
                    <a href="" class="py-2 inline-flex gap-3 text-purple-600 rounded-lg underline">Download
                        Report
                    </a>
                </div>
            </div>
        </div>
        <div class="relative mt-6 max-h-[70dvh]  rounded-lg">
            <table class="w-full text-sm text-left overflow-x-auto rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        {{-- <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-neutral-600 bg-gray-100 border-gray-300 rounded focus:ring-neutral-500 dark:focus:ring-neutral-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th> --}}
                        <th scope="col" class="px-6 py-3">
                            Order
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Menu
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Return
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-green-500 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        {{-- <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox"
                                    class="w-4 h-4 text-neutral-600 bg-gray-100 border-gray-300 rounded focus:ring-neutral-500 dark:focus:ring-neutral-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td> --}}
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Silver
                        </td>

                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            Yes
                        </td>
                        <td class="px-6 py-4">
                            Yes
                        </td>

                        <td class="flex items-center px-6 py-4">
                            <a href="#"
                                class="font-medium text-green-600 px-4 py-2 rounded-full bg-green-200 hover:underline">22/07/2024
                                - 09:55
                            </a>
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-green-500 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        {{-- <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-2" type="checkbox"
                                    class="w-4 h-4 text-neutral-600 bg-gray-100 border-gray-300 rounded focus:ring-neutral-500 dark:focus:ring-neutral-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-2" class="sr-only">checkbox</label>
                            </div>
                        </td> --}}
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Microsoft Surface Pro
                        </th>
                        <td class="px-6 py-4">
                            White
                        </td>

                        <td class="px-6 py-4">
                            Laptop PC
                        </td>
                        <td class="px-6 py-4">
                            No
                        </td>
                        <td class="px-6 py-4">
                            Yes
                        </td>

                        <td class="flex items-center px-6 py-4">
                            <a href="#"
                                class="font-medium text-green-600 px-4 py-2 rounded-full bg-green-200 hover:underline">24/11/2024
                                - 10:29
                            </a>
                        </td>
                    </tr>
                    <tr
                        class="bg-white border-b dark:bg-green-500 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        {{-- <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-3" type="checkbox"
                                    class="w-4 h-4 text-neutral-600 bg-gray-100 border-gray-300 rounded focus:ring-neutral-500 dark:focus:ring-neutral-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                            </div>
                        </td> --}}
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Magic Mouse 2
                        </th>
                        <td class="px-6 py-4">
                            Black
                        </td>

                        <td class="px-6 py-4">
                            Accessories
                        </td>
                        <td class="px-6 py-4">
                            Yes
                        </td>
                        <td class="px-6 py-4">
                            No
                        </td>

                        <td class="flex items-center px-6 py-4">
                            <a href="#"
                                class="font-medium text-green-600 px-4 py-2 rounded-full bg-green-200 hover:underline">22/07/2024
                                - 09:55
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
