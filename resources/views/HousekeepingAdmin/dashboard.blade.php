<x-app-layout>
    @section('title', 'Dashboard')
    <script defer src="/assets/js/apexcharts.js"></script>
    <div x-data="finance">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Analytics</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-6 text-white">
                <!-- Users Visit -->
                <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400">
                    <div class="flex justify-between">
                        <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Today's Requests</div>
                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                            <a href="javascript:;" @click="toggle">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hover:opacity-80 opacity-70">
                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </a>
                            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="ltr:right-0 rtl:left-0 text-black dark:text-white-dark">
                                <li><a href="{{url('HousekeepingAdmin/housekeeping-request-list') }}" @click="toggle">
                                        <svg class="mr-2" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 4.45962C9.91153 4.16968 10.9104 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C3.75612 8.07914 4.32973 7.43025 5 6.82137" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="#1C274C" stroke-width="1.5" />
                                        </svg>
                                        View</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex items-center mt-5">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> {{$today_pending_request}} </div>
                        <div class="badge bg-white/30">Total Pending: {{$total_pending}} </div>
                    </div>
                    <div class="flex items-center font-semibold mt-5">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                            <path opacity="0.5" d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z" stroke="currentColor" stroke-width="1.5"></path>
                            <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="1.5"></path>
                        </svg>
                        Exceeded: {{$exceeded}}
                    </div>
                </div>

                <!-- Sessions -->
                <div class="panel bg-gradient-to-r from-violet-500 to-violet-400">
                    <div class="flex justify-between">
                        <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Today's Task In-Progress</div>
                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                            <a href="javascript:;" @click="toggle">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hover:opacity-80 opacity-70">
                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </a>
                            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="ltr:right-0 rtl:left-0 text-black dark:text-white-dark">

                                <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                <li><a href="javascript:;" @click="toggle">Edit Report</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="flex items-center mt-5">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> {{$today_task_progress}} </div>
                        <div class="badge bg-white/30"> Completed: {{$completed_task}} </div>
                    </div>
                    <div class="flex items-center font-semibold mt-5">
                        <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                            <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Total Completed: {{$total_completed_task}}
                    </div>
                </div>

                <!-- Time On-Site -->
                <div class="panel bg-gradient-to-r from-blue-500 to-blue-400">
                    <div class="flex justify-between">
                        <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Items In-stock</div>
                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                            <a href="javascript:;" @click="toggle">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hover:opacity-80 opacity-70">
                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </a>
                            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="ltr:right-0 rtl:left-0 text-black dark:text-white-dark">
                                <li><a href="javascript:;" @click="toggle">View Report</a></li>
                                <li><a href="javascript:;" @click="toggle">Edit Report</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="flex items-center mt-5">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> {{$in_stock}} </div>
                        <div class="badge bg-white/30">Low Stock: {{$low_stock}} </div>
                    </div>
                    <div class="flex items-center font-semibold mt-5">
                        <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                            <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        Out of Stock: {{$out_of_stock}}
                    </div>
                </div>

                <!-- Bounce Rate -->
                <div class="panel bg-gradient-to-r from-fuchsia-500 to-fuchsia-400">
                    <div class="flex justify-between">
                        <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Housekeeping Staff</div>
                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                            <a href="javascript:;" @click="toggle">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hover:opacity-80 opacity-70">
                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </a>
                            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="ltr:right-0 rtl:left-0 text-black dark:text-white-dark">
                                <li><a href="{{ url('HousekeepingAdmin/housekeepingStaff') }}" @click="toggle">
                                        <svg class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 4.45962C9.91153 4.16968 10.9104 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C3.75612 8.07914 4.32973 7.43025 5 6.82137" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="#1C274C" stroke-width="1.5" />
                                        </svg>

                                        View</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex items-center mt-5">
                        <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> {{$staff}} </div>
                        <!--<div class="badge bg-white/30"> </div>-->
                    </div>
                    <div class="flex items-center font-semibold mt-5">
                        <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                            <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        Total Active: {{$staff}}
                    </div>
                </div>
            </div>

            <div class="mb-6 grid grid-cols-1 xl:grid-cols-2 gap-6">
                <!-- Recent Transactions -->
                <div class="panel">
                    <div class="mb-5 text-lg font-medium">Recent Housekeeping Requests</div>
                    <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="ltr:rounded-l-md rtl:rounded-r-md">Code</th>
                                <th>Room Number</th>
                                <th>Time Issue</th>
                                <th class="text-center ltr:rounded-r-md rtl:rounded-l-md">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_requests as $requests)
                            <tr>
                                <td class="font-semibold">{{$requests->h3_request_code}}</td>
                                <td class="whitespace-nowrap">{{$requests->h3_room_no}}</td>
                                <td class="whitespace-nowrap">
                                @php
                                    // Convert the string to a Carbon object
                                    $carbonTime = Carbon\Carbon::createFromFormat('H:i',
                                    $requests->h3_time_issue);

                                    // Format the time with AM/PM
                                    $formattedTime = $carbonTime->format('h:i A');
                                    @endphp
                                    {{ $formattedTime }}
                                </td>
                                <td class="w-[22vh] text-center">
                                @php
                                    $today_date = Carbon\Carbon::now()->toDateString();
                                    @endphp
                                    @if($requests->status == 'Work Order Created')
                                    <div class="py-2">
                                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                            <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            Task Created
                                        </span>
                                    </div>
                                    @elseif(\Carbon\Carbon::parse($requests->created_at)->toDateString() != $today_date)
                                    <div class=" py-2">
                                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full dark:bg-red-500/10 dark:text-red-500">
                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                            </svg>
                                            Exceeded
                                        </span>
                                    </div>
                                    @else
                                    <div class=" py-2">
                                        <span class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs  bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-green-200">
                                            <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                                </path>
                                            </svg>
                                            Pending
                                        </span>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    </div>
                    <div class="mt-2">
                        {{$recent_requests->links()}}
                    </div>
                </div>
                   <!--COMPLETED TASK CHART -->
                   <div class="panel">
                    <div class="flex items-start justify-between dark:text-white-light pb-5 border-b  border-[#e0e6ed] dark:border-[#1b2e4b]">
                        <h5 class="font-semibold text-lg ">Completed Task / Month</h5>
                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                            <a href="javascript:;" @click="toggle">
                                <svg class="w-5 h-5 text-black/70 dark:text-white/70 hover:!text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </a>
                            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="ltr:right-0 rtl:left-0">
                                <li><a href="{{ url('HousekeepingAdmin/housekeeping-progress') }}" @click="toggle">
                                <svg class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 4.45962C9.91153 4.16968 10.9104 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C3.75612 8.07914 4.32973 7.43025 5 6.82137" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="#1C274C" stroke-width="1.5" />
                                        </svg>    
                                View</a></li>
                            </ul>
                        </div>
                    </div>
                    <div x-ref="areaChart" class="bg-white dark:bg-black rounded-lg"></div>
                </div>
            </div>
        </div>
            

            <!--ITEM STOCKS CHART -->
            <div class="mb-6 grid lg:grid-cols-3 gap-6 ">
                <div class=" panel h-full p-0 lg:col-span-2">
                    <div class="flex items-start justify-between dark:text-white-light mb-5 p-5 border-b  border-[#e0e6ed] dark:border-[#1b2e4b]">
                        <h5 class="font-semibold text-lg ">Item Stocks</h5>
                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                            <a href="javascript:;" @click="toggle">
                                <svg class="w-5 h-5 text-black/70 dark:text-white/70 hover:!text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </a>
                            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="ltr:right-0 rtl:left-0">
                                <li><a href="{{ url('HousekeepingAdmin/items-lists') }}" @click="toggle">
                                    <svg class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 4.45962C9.91153 4.16968 10.9104 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C3.75612 8.07914 4.32973 7.43025 5 6.82137" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                        <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="#1C274C" stroke-width="1.5" />
                                    </svg>    
                                View</a></li>
                            </ul>
                        </div>
                    </div>

                    <div x-ref="uniqueVisitorSeries">
                        <!-- loader -->
                        <div class="min-h-[360px] grid place-content-center bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] ">
                            <span class="animate-spin border-2 border-black dark:border-white !border-l-transparent  rounded-full w-5 h-5 inline-flex"></span>
                        </div>
                    </div>
                </div>
                <!--PIE CHART -->
                <div class="panel">
                    <div class="flex items-start justify-between dark:text-white-light pb-5 border-b  border-[#e0e6ed] dark:border-[#1b2e4b]">
                        <h5 class="font-semibold text-lg ">Inventory Status</h5>
                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                            <a href="javascript:;" @click="toggle">
                                <svg class="w-5 h-5 text-black/70 dark:text-white/70 hover:!text-primary" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                    <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </a>
                            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="ltr:right-0 rtl:left-0">
                                <li><a href="{{ url('HousekeepingAdmin/items-lists') }}" @click="toggle">
                                <svg class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 4.45962C9.91153 4.16968 10.9104 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C3.75612 8.07914 4.32973 7.43025 5 6.82137" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                            <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="#1C274C" stroke-width="1.5" />
                                        </svg>    
                                View</a></li>
                            </ul>
                        </div>
                    </div>
                    <div x-ref="pieChart" class="bg-white dark:bg-black rounded-lg mt-10">
                    </div>

                </div>
            </div>
        </div>
        <div>
        <div class="panel h-full">
                <div
                    class="flex items-start justify-between dark:text-white-light mb-5 -mx-5 p-5 pt-0 border-b  border-[#e0e6ed] dark:border-[#1b2e4b]">
                    <h5 class="font-semibold text-lg ">Activity Log</h5>
                    <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                        <a href="javascript:;" @click="toggle">

                            <svg class="w-5 h-5 text-black/70 dark:text-white/70 hover:!text-primary"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="5" cy="12" r="2" stroke="currentColor"
                                    stroke-width="1.5" />
                                <circle opacity="0.5" cx="12" cy="12" r="2"
                                    stroke="currentColor" stroke-width="1.5" />
                                <circle cx="19" cy="12" r="2" stroke="currentColor"
                                    stroke-width="1.5" />
                            </svg>
                        </a>
                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                            class="ltr:right-0 rtl:left-0">
                            <li><a href="javascript:;" @click="toggle">View All</a></li>
                            <li><a href="javascript:;" @click="toggle">Mark as Read</a></li>
                        </ul>
                    </div>
                </div>
                <div class="perfect-scrollbar relative h-[360px] pr-3 -mr-3">
                    <div class="space-y-7">
                        @foreach($activity_logs as $logs)
                        <div class="flex">
                            <div
                                class="ltr:mr-2 rtl:ml-2 relative z-10 before:w-[2px] before:h-[calc(100%-24px)] before:bg-white-dark/30 before:absolute before:top-10 before:left-4">
                                @if($logs->h3_log_type == 'Cancelled Task')
                                <div
                                    class="bg-danger shadow shadow-danger w-8 h-8 rounded-full flex items-center justify-center text-white">
                                    <svg class="w-4 h-4" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                @elseif($logs->h3_log_type == 'Delete Exceeded Requests')
                                <div                            
                                    class="bg-danger shadow shadow-danger w-8 h-8 rounded-full flex items-center justify-center text-white">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5" d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                @elseif($logs->h3_log_type == 'Task Added')
                                <div
                                    class="bg-primary w-8 h-8 rounded-full flex items-center justify-center text-white">

                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" d="M4 12.9L7.14286 16.5L15 7.5" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M20.0002 7.5625L11.4286 16.5625L11.0002 16" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                @elseif($logs->h3_log_type == 'Logged-in')
                                <div
                                    class="bg-secondary w-8 h-8 rounded-full flex items-center justify-center text-white">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"/>
                                    <ellipse opacity="0.5" cx="12" cy="17" rx="7" ry="4" stroke="currentColor" stroke-width="1.5"/>
                                    </svg>
                                </div>
                               
                                @endif
                            </div>
                            <div>
                                <h5 class="font-semibold dark:text-white-light">{{$logs->h3_log_type}} : {{$logs->h3_activities}}</h5>
                                <p class="text-white-dark text-xs">{{$logs->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    <script>
        var inventory_items = {!!$inventory!!};
        var task_january = {!!$completed_task_jan!!};
        var in_stock = {!!$in_stock!!};
        var low_stock = {!!$low_stock!!};
        var out_of_stock = {!!$out_of_stock!!};
        var task_feb = {!!$completed_task_feb!!};
        var task_mar = {!!$completed_task_mar!!};
        var task_apr = {!!$completed_task_apr!!};
        var task_may = {!!$completed_task_may!!};
        var task_jun = {!!$completed_task_jun!!};
        var task_jul = {!!$completed_task_jul!!};
        var task_aug = {!!$completed_task_aug!!};
        var task_sep = {!!$completed_task_sep!!};
        var task_oct = {!!$completed_task_oct!!};
        var task_nov = {!!$completed_task_nov!!};
        var task_dec = {!!$completed_task_dec!!};

        //INVENTORY FUNCTIONS
        const items = [];
        const quantity = [];
        inventory_items.forEach(function(val) {
            items.push(val.h3_item_name);
            quantity.push(val.h3_quantity);
        });

        //TASK AREA CHART
            const completedPerMonth = [];
            completedPerMonth.push(task_january)
            completedPerMonth.push(task_feb);
            completedPerMonth.push(task_mar);
            completedPerMonth.push(task_apr);
            completedPerMonth.push(task_may);
            completedPerMonth.push(task_jun);
            completedPerMonth.push(task_jul);
            completedPerMonth.push(task_aug);
            completedPerMonth.push(task_sep);
            completedPerMonth.push(task_oct);
            completedPerMonth.push(task_nov);
            completedPerMonth.push(task_dec);

        //ITEMS STATUS PIE CHART
            const itemStatus = [];
            itemStatus.push(in_stock);
            itemStatus.push(low_stock);
            itemStatus.push(out_of_stock);

        document.addEventListener("alpine:init", () => {
            // finance
            Alpine.data("finance", () => ({
                init() {
                    isDark = this.$store.app.theme === "dark" ? true : false;
                    isRtl = this.$store.app.rtlClass === "rtl" ? true : false;

                    const totalVisit = null;
                    const paidVisit = null;
                    const uniqueVisitorSeries = null;
                    const pieChart = null;
                    const areaChart = null;
                    // statistics
                    setTimeout(() => {
                        this.areaChart = new ApexCharts(this.$refs.areaChart, this
                            .areaChartOptions);
                        this.areaChart.render();

                        this.pieChart = new ApexCharts(this.$refs.pieChart, this
                            .pieChartOptions);
                        this.pieChart.render();

                        this.totalVisit = new ApexCharts(this.$refs.totalVisit, this
                            .totalVisitOptions);
                        this.totalVisit.render();

                        this.paidVisit = new ApexCharts(this.$refs.paidVisit, this
                            .paidVisitOptions);
                        this.paidVisit.render();

                        // unique visitors
                        this.uniqueVisitorSeries = new ApexCharts(this.$refs
                            .uniqueVisitorSeries, this.uniqueVisitorSeriesOptions);
                        this.$refs.uniqueVisitorSeries.innerHTML = "";
                        this.uniqueVisitorSeries.render();

                    }, 300);

                    this.$watch('$store.app.theme', () => {
                        isDark = this.$store.app.theme === "dark" ? true : false;
                        this.totalVisit.updateOptions(this.totalVisitOptions);
                        this.paidVisit.updateOptions(this.paidVisitOptions);
                        this.uniqueVisitorSeries.updateOptions(this.uniqueVisitorSeriesOptions);
                        this.followers.updateOptions(this.followersOptions);
                        this.referral.updateOptions(this.referralOptions);
                        this.engagement.updateOptions(this.engagementOptions);
                        this.pieChart.updateOptions(this.pieChartOptions);
                        this.areaChart.updateOptions(this.areaChartOptions);
                    });

                    this.$watch('$store.app.rtlClass', () => {
                        isRtl = this.$store.app.rtlClass === "rtl" ? true : false;
                        this.uniqueVisitorSeries.updateOptions(this.uniqueVisitorSeriesOptions);
                        this.pieChart.updateOptions(this.pieChartOptions);
                        this.areaChart.updateOptions(this.areaChartOptions);
                    });
                },

                get areaChartOptions() {
                    return {
                        series: [{
                            name: 'Total Task Done',
                            data: completedPerMonth,
                        }],
                        chart: {
                            type: 'area',
                            height: 300,
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ['#00ab55'],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            width: 2,
                            curve: 'smooth'
                        },
                        xaxis: {
                            axisBorder: {
                                color: isDark ? '#191e3a' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -40 : 0,
                            }
                        },
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
                            'Oct', 'Nov', 'Dec'
                        ],
                        legend: {
                            horizontalAlign: 'left'
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                        },
                        tooltip: {
                            theme: isDark ? 'dark' : 'light',
                            marker: false,
                            y: {
                                formatter(number) {
                                    return number
                                }
                            }
                        }
                    }
                },

                get pieChartOptions() {
                    return {
                        series: itemStatus,
                        chart: {
                            height: 300,
                            type: 'pie',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            }
                        },
                        labels: ['In-Stock', 'Low Stock', 'Out of Stock'],
                        colors: ['#00ab55', '#e2a03f', '#e7515a',],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                }
                            }
                        }],
                        stroke: {
                            show: false,
                        },
                        legend: {
                            position: 'bottom',
                        }
                    }
                },

                // statistics
                get totalVisitOptions() {
                    return {
                        series: [{
                            data: [21, 9, 36, 12, 44, 25, 59, 41, 66, 25]
                        }],
                        chart: {
                            height: 58,
                            type: 'line',
                            fontFamily: 'Nunito, sans-serif',
                            sparkline: {
                                enabled: true
                            },
                            dropShadow: {
                                enabled: true,
                                blur: 3,
                                color: '#009688',
                                opacity: 0.4
                            }
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        colors: ['#009688'],
                        grid: {
                            padding: {
                                top: 5,
                                bottom: 5,
                                left: 5,
                                right: 5
                            }
                        },
                        tooltip: {
                            x: {
                                show: false
                            },
                            y: {
                                title: {
                                    formatter: formatter = () => {
                                        return '';
                                    },
                                },
                            },
                        },
                    }
                },

                //paid visit
                get paidVisitOptions() {
                    return {
                        series: [{
                            data: [22, 19, 30, 47, 32, 44, 34, 55, 41, 69]
                        }],
                        chart: {
                            height: 58,
                            type: 'line',
                            fontFamily: 'Nunito, sans-serif',
                            sparkline: {
                                enabled: true
                            },
                            dropShadow: {
                                enabled: true,
                                blur: 3,
                                color: '#e2a03f',
                                opacity: 0.4
                            }
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        colors: ['#e2a03f'],
                        grid: {
                            padding: {
                                top: 5,
                                bottom: 5,
                                left: 5,
                                right: 5
                            }
                        },
                        tooltip: {
                            x: {
                                show: false
                            },
                            y: {
                                title: {
                                    formatter: formatter = () => {
                                        return '';
                                    },
                                },
                            },
                        },

                    }
                },

                // unique visitors
                get uniqueVisitorSeriesOptions() {
                    return {
                        series: [{
                            name: 'Quantity: ',
                            data: quantity,
                        }, ],
                        chart: {
                            height: 360,
                            type: 'bar',
                            fontFamily: 'Nunito, sans-serif',
                            toolbar: {
                                show: false
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            width: 2,
                            colors: ['transparent']
                        },
                        colors: ['#5c1ac3', '#ffbb44'],
                        dropShadow: {
                            enabled: true,
                            blur: 3,
                            color: '#515365',
                            opacity: 0.4,
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '55%',
                                borderRadius: 10
                            }
                        },
                        legend: {
                            position: 'bottom',
                            horizontalAlign: 'center',
                            fontSize: '14px',
                            itemMargin: {
                                horizontal: 8,
                                vertical: 8
                            }
                        },
                        grid: {
                            borderColor: isDark ? '#191e3a' : '#e0e6ed',
                            padding: {
                                left: 20,
                                right: 20
                            }
                        },
                        xaxis: {
                            categories: items,
                            axisBorder: {
                                show: true,
                                color: isDark ? '#3b3f5c' : '#e0e6ed'
                            },
                        },
                        yaxis: {
                            tickAmount: 6,
                            opposite: isRtl ? true : false,
                            labels: {
                                offsetX: isRtl ? -10 : 0,
                            }
                        },
                        fill: {
                            type: 'gradient',
                            gradient: {
                                shade: isDark ? 'dark' : 'light',
                                type: 'vertical',
                                shadeIntensity: 0.3,
                                inverseColors: false,
                                opacityFrom: 1,
                                opacityTo: 0.8,
                                stops: [0, 100]
                            },
                        },
                        tooltip: {
                            marker: {
                                show: true,
                            },
                            y: {
                                formatter: (val) => {
                                    return val;
                                },
                            },
                        },
                    }
                },

            }));
        });
    </script>
</x-app-layout>