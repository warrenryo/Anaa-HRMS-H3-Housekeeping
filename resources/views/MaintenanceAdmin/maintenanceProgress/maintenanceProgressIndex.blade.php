@extends('layouts.maintenanceLayout.maintenance')

@section('content')
    @section('title', 'Task Progress')
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ url('maintenance-admin/dashboard') }}" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] before:mr-1 rtl:before:ml-1">
            <span>Maintenance Task Progress</span>
        </li>
    </ul>

    <div class="pt-6">
        <div x-data="notes">
            <div class="flex gap-5 relative sm:h-[calc(100vh_-_150px)] h-full">
                <div class="bg-black/60 z-10 w-full h-full rounded-md absolute hidden"
                    :class="{ '!block xl:!hidden': isShowNoteMenu }" @click="isShowNoteMenu = !isShowNoteMenu"></div>
                <div class="panel p-4 flex-none  w-[240px] absolute xl:relative z-10 space-y-4 h-full xl:h-auto hidden xl:block ltr:lg:rounded-r-md ltr:rounded-r-none rtl:lg:rounded-l-md rtl:rounded-l-none overflow-hidden"
                    :class="{ 'hidden shadow': !isShowNoteMenu, 'h-full ltr:left-0 rtl:right-0': isShowNoteMenu }">
                    <div class="flex flex-col h-full ">
                        <div class="flex text-center items-center">
                            <div>

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                    <path
                                        d="M20.3116 12.6473L20.8293 10.7154C21.4335 8.46034 21.7356 7.3328 21.5081 6.35703C21.3285 5.58657 20.9244 4.88668 20.347 4.34587C19.6157 3.66095 18.4881 3.35883 16.2331 2.75458C13.978 2.15033 12.8504 1.84821 11.8747 2.07573C11.1042 2.25537 10.4043 2.65945 9.86351 3.23687C9.27709 3.86298 8.97128 4.77957 8.51621 6.44561C8.43979 6.7254 8.35915 7.02633 8.27227 7.35057L8.27222 7.35077L7.75458 9.28263C7.15033 11.5377 6.84821 12.6652 7.07573 13.641C7.25537 14.4115 7.65945 15.1114 8.23687 15.6522C8.96815 16.3371 10.0957 16.6392 12.3508 17.2435L12.3508 17.2435C14.3834 17.7881 15.4999 18.0873 16.415 17.9744C16.5152 17.9621 16.6129 17.9448 16.7092 17.9223C17.4796 17.7427 18.1795 17.3386 18.7203 16.7612C19.4052 16.0299 19.7074 14.9024 20.3116 12.6473Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path opacity="0.5"
                                        d="M16.415 17.9741C16.2065 18.6126 15.8399 19.1902 15.347 19.6519C14.6157 20.3368 13.4881 20.6389 11.2331 21.2432C8.97798 21.8474 7.85044 22.1495 6.87466 21.922C6.10421 21.7424 5.40432 21.3383 4.86351 20.7609C4.17859 20.0296 3.87647 18.9021 3.27222 16.647L2.75458 14.7151C2.15033 12.46 1.84821 11.3325 2.07573 10.3567C2.25537 9.58627 2.65945 8.88638 3.23687 8.34557C3.96815 7.66065 5.09569 7.35853 7.35077 6.75428C7.77741 6.63996 8.16368 6.53646 8.51621 6.44531"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path d="M11.7769 10L16.6065 11.2941" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path opacity="0.5" d="M11 12.8975L13.8978 13.6739" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold ltr:ml-3 rtl:mr-3">Tasks</h3>
                        </div>
                        <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b] my-4"></div>
                        <div class="perfect-scrollbar relative pr-3.5 -mr-3.5 h-full grow">
                            <div class="space-y-1">
                                <a href="{{ url('maintenance-admin/maintenance-task-progress') }}"
                                    class=" w-full flex justify-between items-center p-2 hover:bg-white-dark/10 rounded-md dark:hover:text-primary hover:text-primary dark:hover:bg-[#181F32] font-medium h-10"
                                    :class="{
                                    'bg-gray-100 dark:text-primary text-primary dark:bg-[#181F32]': @if(Request::get('filter_status') == 'Pending' || Request::get('filter_status') == 'Completed' || Request::get('filter_status') == 'In-Progress') selectedTab === '' @else selectedTab === 'all' @endif
                                    }" @click="tabChanged('all')">
                                    <div class="flex items-center">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                            <path
                                                d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901"
                                                stroke="currentColor" stroke-width="1.5" />
                                            <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" />
                                            <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" />
                                            <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" />
                                            <path opacity="0.5"
                                                d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                                stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                        <span class="ltr:ml-3 rtl:mr-3">All Tasks</span>
                                    </div>
                                </a>

                                <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                                <div class="px-1 py-3 text-white-dark">Status</div>

                                <form action="" method="GET" id="filterForm">
                                    <label for="pending_radio" onclick="submitForm()"
                                        class="@if(Request::get('filter_status') == 'Pending') bg-white-dark/10 dark:bg-[#181F32] ltr:pl-3 rtl:pr-3 @endif w-full cursor-pointer flex items-center h-10 p-1 hover:bg-white-dark/10 rounded-md dark:hover:bg-[#181F32] font-medium text-warning ltr:hover:pl-3 rtl:hover:pr-3 duration-300">
                                        <input id="pending_radio" type="radio" name="filter_status" value="Pending"
                                            class="hidden form-radio outline-warning peer" />
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 rotate-45 fill-warning">
                                            <path
                                                d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                        <span class="ltr:ml-3 rtl:mr-3">Pending</span>
                                    </label>

                                    <label for="in-progress" onclick="submitForm()"
                                        class="@if(Request::get('filter_status') == 'In-Progress') bg-white-dark/10 dark:bg-[#181F32] ltr:pl-3 rtl:pr-3 @endif w-full cursor-pointer flex items-center h-10 p-1 hover:bg-white-dark/10 rounded-md dark:hover:bg-[#181F32] font-medium text-primary ltr:hover:pl-3 rtl:hover:pr-3 duration-300">
                                        <input id="in-progress" type="radio" name="filter_status" value="In-Progress"
                                            class="hidden form-radio outline-success peer"  />
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 rotate-45 fill-primary">
                                            <path
                                                d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                        <span class="ltr:ml-3 rtl:mr-3">In-Progress</span>
                                    </label>

                                    <label for="completed_radio" onclick="submitForm()"
                                        class="@if(Request::get('filter_status') == 'Completed') bg-white-dark/10 dark:bg-[#181F32] ltr:pl-3 rtl:pr-3 @endif w-full cursor-pointer flex items-center h-10 p-1 hover:bg-white-dark/10 rounded-md dark:hover:bg-[#181F32] font-medium text-success ltr:hover:pl-3 rtl:hover:pr-3 duration-300">
                                        <input id="completed_radio" type="radio" name="filter_status" value="Completed"
                                            class="hidden form-radio outline-success peer"  />
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 rotate-45 fill-success">
                                            <path
                                                d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                        <span class="ltr:ml-3 rtl:mr-3">Completed</span>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel flex-1 overflow-auto h-full">
                    <div class="pb-5">
                        <button type="button" class="xl:hidden hover:text-primary"
                            @click="isShowNoteMenu = !isShowNoteMenu">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                                <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                </path>
                                <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"></path>
                                <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                </path>
                            </svg>
                        </button>
                    </div>


                    <div class="min-h-[400px] sm:min-h-[300px]">
                        <div class="grid 2xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-5">
                            @forelse($work_order as $task)
                            <div
                                class="panel @if($task->h3_status == 'Pending') bg-warning-light shadow-warning @elseif($task->h3_status == 'In-Progress') bg-primary-light shadow-primary @else bg-success-light shadow-success @endif pb-12">
                                <div class="min-h-[142px]">
                                    <div class="flex justify-between">
                                        <div class="flex items-center space-x-2">
                                            <div class="">
                                                <div class="font-semibold">{{$task->h3_housekeeper_name}}</div>
                                                <div class="text-xs text-white-dark">{{$task->created_at->format('F j, Y
                                                    g:i A')}}</div>
                                            </div>
                                        </div>
                                        @include('MaintenanceAdmin.maintenanceProgress.maintenanceProgressModal')
                                        <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                            <button type="button" class="text-primary" @click="toggle">

                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="w-5 h-5 rotate-90 opacity-70 hover:opacity-100">
                                                    <circle cx="5" cy="12" r="2" stroke="currentColor"
                                                        stroke-width="1.5"></circle>
                                                    <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor"
                                                        stroke-width="1.5">
                                                    </circle>
                                                    <circle cx="19" cy="12" r="2" stroke="currentColor"
                                                        stroke-width="1.5"></circle>
                                                </svg>
                                            </button>
                                            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                                class="ltr:right-0 rtl:left-0 text-sm font-medium">
                                                <li>
                                                    <button class="w-full" @click="toggle"
                                                        data-hs-overlay="#view-details{{$task->id}}">

                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="w-4.5 h-4.5 ltr:mr-3 rtl:ml-3">
                                                            <path opacity="0.5"
                                                                d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                                                stroke="currentColor" stroke-width="1.5" />
                                                            <path
                                                                d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                                                stroke="currentColor" stroke-width="1.5" />
                                                        </svg>
                                                        Details
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @if($task->h3_status == 'Completed')
                                    <div>
                                        <h4 class="font-semibold mt-4">Task Completed</h4>
                                        <p class="text-white-dark mt-2"> Completed Time:
                                            <span
                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                <svg class="flex-shrink-0 w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-alarm"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z" />
                                                    <path
                                                        d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1" />
                                                </svg>
                                                {{$task->updated_at->format('g:i a')}}
                                            </span>
                                        </p>
                                    </div>
                                    @else
                                    <div>
                                        <h4 class="font-semibold mt-4">Room: {{$task->h3_room_no}}</h4>
                                        <p class="text-white-dark mt-2"> Scheduled Time:
                                            <span
                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                <svg class="flex-shrink-0 w-3 h-3" xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-alarm"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z" />
                                                    <path
                                                        d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1" />
                                                </svg>
                                                {{$task->h3_scheduled_time}}
                                            </span>
                                        </p>
                                    </div>
                                    @endif
                                    <div class="mt-2">
                                        <p class="text-white-dark"></p>
                                    </div>
                                </div>
                                <div class="absolute bottom-5 left-0 w-full px-5">
                                    <div class="flex items-center justify-between mt-2">
                                        <div
                                            class="@if($task->h3_status == 'Pending') text-warning  @else text-success @endif">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-3 h-3 rotate-45 @if($task->h3_status == 'Pending') fill-warning  @elseif($task->h3_status == 'In-Progress') fill-primary @else fill-success @endif">
                                                <path
                                                    d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                    stroke="currentColor">
                                                </path>
                                            </svg>
                                        </div>
                                        @if($task->h3_status == 'Completed')
                                        <div class="flex items-center">
                                            <button data-hs-overlay="#delete-task{{$task->id}}" type="button" class="text-danger hover:animate-rotate">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"></path>
                                                    <path
                                                        d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                                    </path>
                                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5"
                                                        d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                        stroke="currentColor" stroke-width="1.5"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        @else
                                        <div class="flex items-center">
                                            <button data-hs-overlay="#cancel-task{{$task->id}}" type="button" class="text-danger hover:animate-rotate">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"></path>
                                                    <path
                                                        d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                                    </path>
                                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path opacity="0.5"
                                                        d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                        stroke="currentColor" stroke-width="1.5"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                       
                            </div>
                            @empty
                                <div
                                    class="flex justify-center place-items-center items-center sm:min-h-[300px] min-h-[400px] font-semibold text-lg h-full">
                                  
                                </div>
                                <div
                                    class="flex justify-center place-items-center items-center sm:min-h-[300px] min-h-[400px] font-semibold text-lg h-full">
                                    No data available
                                </div>
                                <div
                                    class="flex justify-center place-items-center items-center sm:min-h-[300px] min-h-[400px] font-semibold text-lg h-full">
                               
                                </div>
                            @endforelse
                        </div>
                        
                    </div>
                    <div class="mt-8">
                        {{$work_order->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function submitForm(){
            document.getElementById('filterForm').submit();
        }

    </script>
@endsection