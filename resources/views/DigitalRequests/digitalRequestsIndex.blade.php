@extends('layouts.digitalRequestLayout.digitalRequest')

@section('content')
@section('title', 'Anaa Digital Request')
<section>

    <div class="relative overflow-x-hidden">
        <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">
            <div class="bg-gradient-to-r from-violet-300/50 to-purple-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem] dark:from-violet-900/50 dark:to-purple-900"></div>
            <div class="bg-gradient-to-r from-[#DFBA86] to-[#DFBA86] dark:from-[#6C4121] dark:from-[#9C603B] blur-3xl w-[90rem] h-[50rem] rounded-fulls origin-top-left -rotate-12 -translate-x-[15rem] "></div>
        </div>

        <div class="relative z-99 flex justify-end px-4">
            <div class="hs-dropdown relative inline-flex">
                <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    Settings
                    <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>

                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" aria-labelledby="hs-dropdown-default">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link class="text-sm" :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="relative z-99 max-w-full mt-2 md:mt-20 xl:mt-[16vh] mx-20 px-4 ">
            <!-- Grid -->
            <div class="lg:grid lg:grid-cols-12 lg:items-center">
                <div class="lg:col-span-7">
                    <!-- Grid -->
                    <div class="grid grid-cols-12 gap-2 sm:gap-6 items-center lg:-translate-x-10">
                        <div class="col-span-4">
                            <img class="rounded-xl" src="{{asset('img/housekeepingImages/maintenance.jpg')}}" alt="Image Description">
                        </div>
                        <!-- End Col -->

                        <div class="col-span-3">
                            <img class="rounded-xl" src="{{ asset('img/housekeepingImages/housekeeping.jpg') }}" alt="Image Description">
                        </div>
                        <!-- End Col -->

                        <div class="col-span-5">
                            <img class="rounded-xl" src="{{ asset('img/housekeepingImages/hotelRoom.jpg') }}" alt="Image Description">
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Grid -->
                </div>
                <!-- End Col -->

                <div class="mt-5 sm:mt-10 lg:mt-0 lg:col-span-5">
                    <div class="space-y-6 sm:space-y-8">
                        <!-- Title -->
                        <div class="max-w-2xl text-center mx-auto">
                            <p class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent dark:from-blue-400 dark:to-[#DFBA86]">
                                ANAA: HOTEL AND RESTAURANT
                            </p>

                            <!-- Title -->
                            <div class="mt-5 max-w-2xl">
                                <h1 class="block font-semibold text-gray-800 text-4xl md:text-5xl lg:text-6xl dark:text-white">
                                    Digital Request
                                </h1>
                            </div>
                            <!-- End Title -->

                            <div class="mt-5 max-w-3xl">
                                <p class="text-md text-gray-600 dark:text-gray-400">Welcome to Anaa: Hotel and Restaurant, where your comfort is our top priority. We understand that a seamless stay is essential for our guests, and that's why we offer a state-of-the-art digital housekeeping and maintenance request system for every room, ensuring convenience at your fingertips</p>
                            </div>

                            <!-- Buttons -->
                            <div class="mt-8 gap-3 flex justify-center">
                                <a class="btn btn-primary hover:-translate-y-2 hover:bg-[#DFBA86] duration-700" href="{{ url('housekeeping-request') }}">
                                    Housekeeping Request

                                </a>
                                <a class="btn btn-secondary hover:-translate-y-2 hover:bg-[#DFBA86] duration-700" href="{{ url('maintenance-request') }}">

                                    Maintenance Request
                                </a>
                            </div>
                            <!-- End Buttons -->
                        </div>
                        <!-- End List -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->
        </div>
    </div>

</section>
@include('sweetalert::alert')
@endsection