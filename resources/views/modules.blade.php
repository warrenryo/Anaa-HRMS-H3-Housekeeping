<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--FLOWBITE-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <!--FONTAWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Hotel 3 Modules</title>
</head>

<body>
    @include('layouts.navigationLayout')
    <div class="flex items-center justify-center mt-[10vh]">
        <h1 class="font-bold text-2xl">Hotel and Restaurant: Module 3</h1>
    </div>
    @if(auth()->user()->role == 'Housekeeping Manager')
    <div class="flex justify-center mt-10">
        <div class="flex max-w-xl bg-white border border-gray-200 rounded-lg shadow ">
            <a href="{{ url('HousekeepingAdmin/dashboard') }}">
                <img class="h-auto w-[80vh]" src="{{ asset('img/housekeepingImages/h_module.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="{{ url('HousekeepingAdmin/dashboard') }}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Housekeeping Module</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Housekeeping Management includes Digital requests, Work orders
                    and
                    housekeeping activities
                    Modules</p>
                <a href="{{ url('HousekeepingAdmin/dashboard') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#52ab98] hover:bg-[#2b6777] duration-300 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Go to Housekeeping Module
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    @else

    @endif

    @if(auth()->user()->role == 'Maintenance Manager')
    <div class="flex justify-center mt-10">
        <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
            <a href="#">
                <img class="rounded-t-lg h-auto" src="{{ asset('FirstPage/inventory.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Maintenance Module</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Maintenance Management includes Maintenance requests, Work
                    orders
                    and
                    maintenance activities
                    Modules</p>
                <a href="{{ url('maintenance-admin/dashboard') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#52ab98] hover:bg-[#2b6777] duration-300 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Go to Maintenance Module
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    @else

    @endif


    <!--INVENTORY MANAGEMENT -->
    @if(auth()->user()->role == 'Inventory Manager')
    <div class="flex justify-center mt-10 ">
        <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <img class="rounded-t-lg h-auto" src="{{ asset('FirstPage/inventory.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Inventory Module</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Inventory includes Supplier Vendor, Information, and Stock
                    Modules</p>
                <a href="{{ url('inventory-admin/dashboard') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#52ab98] hover:bg-[#2b6777] duration-300 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Go to Inventory Module
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    @else

    @endif

    @if(auth()->user()->role == 'Admin')
    <div class="mt-10 grid grid-cols-1 md:grid-cols-2 xl:grid xl:grid-cols-4 gap-4 mx-20 mb-10">
        <!--HOUSEKEEPING MANAGEMENT -->
        <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
            <a href="#">
                <img class="rounded-t-lg h-auto" src="{{ asset('FirstPage/inventory.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Housekeeping Module</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Housekeeping Management includes Digital requests, Work orders
                    and
                    housekeeping activities
                    Modules</p>
                <a href="{{ url('HousekeepingAdmin/dashboard') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#52ab98] hover:bg-[#2b6777] duration-300 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Go to Housekeeping Module
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>

        <!--MAINTENANCE MANAGEMENT -->
        <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow ">
            <a href="#">
                <img class="rounded-t-lg h-auto" src="{{ asset('FirstPage/inventory.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Maintenance Module</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Maintenance Management includes Maintenance requests, Work
                    orders
                    and
                    maintenance activities
                    Modules</p>
                <a href="{{ url('maintenance-admin/dashboard') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#52ab98] hover:bg-[#2b6777] duration-300 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Go to Maintenance Module
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- INVENTORY MANAGEMENT -->
        <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <img class="rounded-t-lg h-auto" src="{{ asset('FirstPage/inventory.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Inventory Module</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Inventory includes Supplier Vendor, Information, and Stock
                    Modules</p>
                <a href="{{ url('inventory-admin/dashboard') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#52ab98] hover:bg-[#2b6777] duration-300 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Go to Inventory Module
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>

        <!--USER MANAGEMENT -->
        <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <img class="rounded-t-lg h-auto" src="{{ asset('FirstPage/inventory.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Users</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">This include users, roles and modifications</p>
                <a href="{{ url('users') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#52ab98] hover:bg-[#2b6777] duration-300 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Go to Users
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>

        <!--DOOR LOCK MANAGEMENT -->
        <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow">
            <a href="#">
                <img class="rounded-t-lg h-auto" src="{{ asset('FirstPage/inventory.jpg') }}" alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Door Lock Management</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">Doorlock system that includes door activity logs and door lock
                    uid's</p>
                <a href="{{ url('doorLock-admin/dashboard') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#52ab98] hover:bg-[#2b6777] duration-300 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Go to Doorlock System
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    @else

    @endif

    <!--DOOR LOCK MANAGEMENT-->
    @if( auth()->user()->role == 'Door Lock Manager')
    <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow">
        <a href="#">
            <img class="rounded-t-lg h-auto" src="{{ asset('FirstPage/inventory.jpg') }}" alt="" />
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Door Lock Management</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700">Doorlock system that includes door activity logs and door lock
                uid's</p>
            <a href="{{ url('doorLock-admin/dashboard') }}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#52ab98] hover:bg-[#2b6777] duration-300 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                Go to Doorlock System
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
    @else

    @endif
    @include('sweetalert::alert')
</body>

</html>