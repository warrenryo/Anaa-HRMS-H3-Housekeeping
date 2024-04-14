@extends('layouts.InventoryLayout.inventory')

@section('content')
@section('title', 'Reorder Points')

@section('title', 'Task Progress')
<ul class="flex space-x-2 rtl:space-x-reverse">
    <li>
        <a href="{{ url('HousekeepingAdmin/dashboard')}}" class="text-primary hover:underline">Dashboard</a>
    </li>
    <li class="before:content-['/'] before:mr-1 rtl:before:ml-1">
        <span>Reorder Points</span>
    </li>
</ul>

<div class="pt-6">
    <div x-data="notes">
        <div class="flex gap-5 relative sm:h-[calc(100vh_-_150px)] h-full">
            <div class="bg-black/60 z-10 w-full h-full rounded-md absolute hidden" :class="{ '!block xl:!hidden': isShowNoteMenu }" @click="isShowNoteMenu = !isShowNoteMenu"></div>
            <div class="panel p-4 flex-none  w-[240px] absolute xl:relative z-10 space-y-4 h-full xl:h-auto hidden xl:block ltr:lg:rounded-r-md ltr:rounded-r-none rtl:lg:rounded-l-md rtl:rounded-l-none overflow-hidden" :class="{ 'hidden shadow': !isShowNoteMenu, 'h-full ltr:left-0 rtl:right-0': isShowNoteMenu }">
                <div class="flex flex-col h-full ">
                    <div class="flex text-center items-center">
                        <div>

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path d="M20.3116 12.6473L20.8293 10.7154C21.4335 8.46034 21.7356 7.3328 21.5081 6.35703C21.3285 5.58657 20.9244 4.88668 20.347 4.34587C19.6157 3.66095 18.4881 3.35883 16.2331 2.75458C13.978 2.15033 12.8504 1.84821 11.8747 2.07573C11.1042 2.25537 10.4043 2.65945 9.86351 3.23687C9.27709 3.86298 8.97128 4.77957 8.51621 6.44561C8.43979 6.7254 8.35915 7.02633 8.27227 7.35057L8.27222 7.35077L7.75458 9.28263C7.15033 11.5377 6.84821 12.6652 7.07573 13.641C7.25537 14.4115 7.65945 15.1114 8.23687 15.6522C8.96815 16.3371 10.0957 16.6392 12.3508 17.2435L12.3508 17.2435C14.3834 17.7881 15.4999 18.0873 16.415 17.9744C16.5152 17.9621 16.6129 17.9448 16.7092 17.9223C17.4796 17.7427 18.1795 17.3386 18.7203 16.7612C19.4052 16.0299 19.7074 14.9024 20.3116 12.6473Z" stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.5" d="M16.415 17.9741C16.2065 18.6126 15.8399 19.1902 15.347 19.6519C14.6157 20.3368 13.4881 20.6389 11.2331 21.2432C8.97798 21.8474 7.85044 22.1495 6.87466 21.922C6.10421 21.7424 5.40432 21.3383 4.86351 20.7609C4.17859 20.0296 3.87647 18.9021 3.27222 16.647L2.75458 14.7151C2.15033 12.46 1.84821 11.3325 2.07573 10.3567C2.25537 9.58627 2.65945 8.88638 3.23687 8.34557C3.96815 7.66065 5.09569 7.35853 7.35077 6.75428C7.77741 6.63996 8.16368 6.53646 8.51621 6.44531" stroke="currentColor" stroke-width="1.5" />
                                <path d="M11.7769 10L16.6065 11.2941" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M11 12.8975L13.8978 13.6739" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold ltr:ml-3 rtl:mr-3">Items</h3>
                    </div>
                    <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b] my-4"></div>
                    <div class="perfect-scrollbar relative pr-3.5 -mr-3.5 h-full grow">
                        <div class="space-y-1">
                            <a href="{{ url('inventory-admin/reorder-points') }}" class=" w-full flex justify-between items-center p-2 hover:bg-white-dark/10 rounded-md dark:hover:text-primary hover:text-primary dark:hover:bg-[#181F32] font-medium h-10" :class="{
                                    'bg-gray-100 dark:text-primary text-primary dark:bg-[#181F32]': @if(Request::get('filter_status') == 'Pending Order' || Request::get('filter_status') == 'Normal') selectedTab === '' @else selectedTab === 'all' @endif
                                    }" @click="tabChanged('all')">
                                <div class="flex items-center">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                        <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="currentColor" stroke-width="1.5" />
                                        <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.5" d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    <span class="ltr:ml-3 rtl:mr-3">All Items</span>
                                </div>
                            </a>

                            <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                            <div class="px-1 py-3 text-white-dark">Status</div>

                            <form action="" method="GET" id="filterForm">
                                <label for="pending_radio" onclick="submitForm()" class="@if(Request::get('filter_status') == 'Pending Order') bg-white-dark/10 dark:bg-[#181F32] ltr:pl-3 rtl:pr-3 @endif w-full cursor-pointer flex items-center h-10 p-1 hover:bg-white-dark/10 rounded-md dark:hover:bg-[#181F32] font-medium text-warning ltr:hover:pl-3 rtl:hover:pr-3 duration-300">
                                    <input id="pending_radio" type="radio" name="filter_status" value="Pending Order" class="hidden form-radio outline-warning peer" />
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 rotate-45 fill-warning">
                                        <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                    <span class="ltr:ml-3 rtl:mr-3">Pending</span>
                                </label>

                                <label for="in-progress" onclick="submitForm()" class="@if(Request::get('filter_status') == 'Normal') bg-white-dark/10 dark:bg-[#181F32] ltr:pl-3 rtl:pr-3 @endif w-full cursor-pointer flex items-center h-10 p-1 hover:bg-white-dark/10 rounded-md dark:hover:bg-[#181F32] font-medium text-primary ltr:hover:pl-3 rtl:hover:pr-3 duration-300">
                                    <input id="in-progress" type="radio" name="filter_status" value="Normal" class="hidden form-radio outline-success peer" />
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 rotate-45 fill-primary">
                                        <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                    <span class="ltr:ml-3 rtl:mr-3">Reorder</span>
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel flex-1 overflow-auto h-full">
                <div class="pb-5">
                    <button type="button" class="xl:hidden hover:text-primary" @click="isShowNoteMenu = !isShowNoteMenu">

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                            <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                            </path>
                            <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                            </path>
                        </svg>
                    </button>
                </div>


                <div class="min-h-[400px] sm:min-h-[300px]">
                    <!--TABLE FOR MAINTENANCE INVENTORY -->
                    <div class="table-responsive mt-4">
                        <table class="table-hover">
                            <thead>
                                <tr>
                                    <th class="text-xs">ID</th>
                                    <th class="text-xs">CATEGORY</th>
                                    <th class="text-xs">ITEM NAME</th>
                                    <th class="text-xs">QUANTITY</th>
                                    <th class="text-xs">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reorder as $items)
                                <tr>
                                    <td class="whitespace-nowrap">
                                        {{$items->id}}
                                    </td>
                                    <td class="whitespace-nowrap">
                                        {{$items->h3_category_name}}
                                    </td>
                                    <td class="whitespace-nowrap">
                                        {{$items->h3_item_name}}
                                    </td>
                                    <td class="whitespace-nowrap">
                                        @if($items->h3_quantity > 0 && $items->h3_quantity <= 71) <span class="inline-flex rounded-full bg-warning bg-opacity-10 px-3 py-1 text-sm font-medium text-warning"">{{$items->h3_quantity}}</span>
                                            @elseif($items->h3_quantity == 0)
                                            <span class=" inline-flex rounded-full bg-danger bg-opacity-10 px-3 py-1 text-sm font-medium text-danger">{{$items->h3_quantity}}</span>
                                            @else
                                            <span class="inline-flex rounded-full bg-success bg-opacity-10 px-3 py-1 text-sm font-medium text-success">{{$items->h3_quantity}}</span>
                                            @endif
                                    </td>
                                    <td class="">
                                        @if($items->h3_status == 'Pending Order')
                                        <div class="text-center">
                                            <button type="button" class="btn btn-warning" disabled>
                                                <div class="mr-4 animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
                                                    <span class="sr-only">Loading...</span>
                                                </div> Pending Order
                                            </button>
                                        </div>
                                        @else
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary" data-hs-overlay="#item-reorder{{$items->id}}">
                                                Reorder Now
                                            </button>
                                        </div>
                                        @endif

                                        <div id="item-reorder{{$items->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                                            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                                <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-800">
                                                    <div class="absolute top-2 end-2">
                                                        <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#item-reorder{{$items->id}}">
                                                            <span class="sr-only">Close</span>
                                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M18 6 6 18" />
                                                                <path d="m6 6 12 12" />
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <div class="p-4 sm:p-14 text-center overflow-y-auto">
                                                        <div class="py-10 flex items-center justify-center">
                                                            <svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M13.7502 8.99999C13.7502 8.58578 13.4144 8.24999 13.0002 8.24999C12.586 8.24999 12.2502 8.58578 12.2502 8.99999V10.25H11.0002C10.586 10.25 10.2502 10.5858 10.2502 11C10.2502 11.4142 10.586 11.75 11.0002 11.75H12.2502V13C12.2502 13.4142 12.586 13.75 13.0002 13.75C13.4144 13.75 13.7502 13.4142 13.7502 13V11.75H15.0002C15.4144 11.75 15.7502 11.4142 15.7502 11C15.7502 10.5858 15.4144 10.25 15.0002 10.25H13.7502V8.99999Z" fill="#1C274C" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.29266 2.75123C1.43005 2.36047 1.8582 2.15506 2.24896 2.29245L2.55036 2.39841C3.16689 2.61514 3.69052 2.79922 4.10261 3.00142C4.54324 3.21762 4.92109 3.48396 5.20527 3.89982C5.48725 4.31246 5.60367 4.76518 5.6574 5.26156C5.66124 5.29709 5.6648 5.33324 5.66809 5.36999L17.1203 5.36999C17.9389 5.36998 18.7735 5.36997 19.4606 5.44677C19.8103 5.48587 20.1569 5.54817 20.4634 5.65586C20.7639 5.76144 21.0942 5.93435 21.3292 6.23977C21.711 6.73616 21.7777 7.31417 21.7416 7.90037C21.7071 8.45848 21.5686 9.15237 21.4039 9.97726L21.3935 10.0295L21.3925 10.0341L20.8836 12.5034C20.7339 13.2298 20.6079 13.841 20.4455 14.3232C20.2731 14.8346 20.0341 15.2842 19.6076 15.6318C19.1811 15.9793 18.6925 16.1227 18.1568 16.1882C17.6518 16.25 17.0278 16.25 16.2862 16.25L10.8804 16.25C9.53464 16.25 8.44479 16.25 7.58656 16.1283C6.69032 16.0012 5.93752 15.7285 5.34366 15.1022C4.79742 14.526 4.50529 13.9144 4.35897 13.0601C4.22191 12.2599 4.20828 11.2125 4.20828 9.75999V7.03835C4.20828 6.2984 4.20726 5.80319 4.16611 5.42298C4.12678 5.05963 4.05708 4.87821 3.96682 4.74612C3.87876 4.61726 3.74509 4.49683 3.44186 4.34805C3.11902 4.18964 2.68026 4.03409 2.01266 3.79937L1.75145 3.70754C1.36068 3.57015 1.15527 3.142 1.29266 2.75123ZM5.70828 6.86999L5.70828 9.75999C5.70828 11.249 5.72628 12.1578 5.83744 12.8069C5.93933 13.4018 6.11202 13.7325 6.43219 14.0701C6.70473 14.3576 7.08235 14.5418 7.79716 14.6432C8.53783 14.7482 9.5209 14.75 10.9377 14.75H16.2406C17.0399 14.75 17.5714 14.7487 17.9746 14.6993C18.3573 14.6525 18.5348 14.571 18.66 14.469C18.7853 14.3669 18.9009 14.2095 19.024 13.8441C19.1537 13.4593 19.2623 12.9389 19.4237 12.1561L19.9225 9.73594L19.9229 9.73372C20.1005 8.84379 20.217 8.25153 20.2444 7.80796C20.2704 7.38651 20.2043 7.2393 20.1429 7.1579C20.1367 7.15262 20.0931 7.11568 19.9661 7.07104C19.8107 7.01642 19.5895 6.97052 19.2939 6.93748C18.6991 6.87099 17.9454 6.86999 17.089 6.86999H5.70828Z" fill="#1C274C" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.2502 19.5C5.2502 20.7426 6.25756 21.75 7.5002 21.75C8.74285 21.75 9.7502 20.7426 9.7502 19.5C9.7502 18.2573 8.74285 17.25 7.5002 17.25C6.25756 17.25 5.2502 18.2573 5.2502 19.5ZM7.5002 20.25C7.08599 20.25 6.7502 19.9142 6.7502 19.5C6.7502 19.0858 7.08599 18.75 7.5002 18.75C7.91442 18.75 8.2502 19.0858 8.2502 19.5C8.2502 19.9142 7.91442 20.25 7.5002 20.25Z" fill="#1C274C" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2502 19.5001C14.2502 20.7427 15.2576 21.7501 16.5002 21.7501C17.7428 21.7501 18.7502 20.7427 18.7502 19.5001C18.7502 18.2574 17.7428 17.2501 16.5002 17.2501C15.2576 17.2501 14.2502 18.2574 14.2502 19.5001ZM16.5002 20.2501C16.086 20.2501 15.7502 19.9143 15.7502 19.5001C15.7502 19.0859 16.086 18.7501 16.5002 18.7501C16.9144 18.7501 17.2502 19.0859 17.2502 19.5001C17.2502 19.9143 16.9144 20.2501 16.5002 20.2501Z" fill="#1C274C" />
                                                            </svg>
                                                        </div>

                                                        <h3 class="mb-2 text-2xl font-bold text-gray-800 dark:text-gray-200">
                                                            Reorder {{$items->h3_item_name}} Now?
                                                        </h3>
                                                        <p class="mb-4 text-gray-500">
                                                            Are you sure to reorder Hotel's Items?
                                                        </p>
                                                    </div>

                                                    <div class="flex items-center">
                                                        <button type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-es-xl border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-white/10 dark:hover:bg-white/20 dark:text-white dark:hover:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#item-reorder{{$items->id}}">
                                                            Cancel
                                                        </button>
                                                        <button type="button" data-hs-overlay="#invoice{{$items->id}}" type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-ee-xl border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                            Yes, Proceed
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div id="invoice{{$items->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                                            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                                <div class="relative flex flex-col bg-white shadow-lg rounded-xl pointer-events-auto dark:bg-gray-800">
                                                    <div class="relative overflow-hidden min-h-32 bg-gray-900 text-center rounded-t-xl">


                                                        <!-- SVG Background Element -->
                                                        <figure class="absolute inset-x-0 bottom-0 -mb-px">
                                                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
                                                                <path fill="currentColor" class="fill-white dark:fill-gray-800" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
                                                            </svg>
                                                        </figure>
                                                        <!-- End SVG Background Element -->
                                                    </div>

                                                    <div class="relative z-10 -mt-12">
                                                        <!-- Icon -->
                                                        <span class="mx-auto flex justify-center items-center size-[62px] rounded-full border border-gray-200 bg-white text-gray-700 shadow-sm dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                                                            <svg class="flex-shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                                <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                                                <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                                            </svg>
                                                        </span>
                                                        <!-- End Icon -->
                                                    </div>
                                                    <form action="{{ url('inventory-admin/submit-reorder/id='.$items->id) }}" method="POST">
                                                        @csrf
                                                        <!-- Body -->
                                                        <div class="p-4 sm:p-7 overflow-y-auto">
                                                            <div class="text-center">
                                                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                                                    Reorder {{$items->h3_item_name}}
                                                                </h3>
                                                                <p class="text-sm text-gray-500">
                                                                    Item ID # {{$items->id}}

                                                                </p>
                                                            </div>


                                                            <div class="mt-5 sm:mt-10">
                                                                <h4 class="text-xs font-semibold uppercase text-gray-800 dark:text-gray-200">Summary</h4>

                                                                <ul class="mt-3 flex flex-col">
                                                                    <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-gray-700 dark:text-gray-200">
                                                                        <div class="flex items-center justify-between w-full">
                                                                            <span>{{$items->h3_item_name}}</span>
                                                                            <!-- Input Number -->
                                                                            <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-lg dark:bg-slate-900 dark:border-gray-700" data-hs-input-number>
                                                                                <div class="flex items-center gap-x-1.5">
                                                                                    <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-decrement>
                                                                                        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                                            <path d="M5 12h14" />
                                                                                        </svg>
                                                                                    </button>
                                                                                    <input id="quantity" name="quantity" class="p-0 w-14 bg-transparent border-0 text-gray-800 text-center focus:ring-0 dark:text-white" type="text" value="100" data-hs-input-number-input>
                                                                                    <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-increment>
                                                                                        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                                            <path d="M5 12h14" />
                                                                                            <path d="M12 5v14" />
                                                                                        </svg>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <!-- End Input Number -->
                                                                        </div>
                                                                    </li>

                                                                </ul>
                                                            </div>

                                                            <!-- Button -->
                                                            <div class="mt-5 flex justify-end gap-x-2">
                                                                <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800" href="{{ url('inventory-admin/reorder-points') }}">
                                                                    Cancel
                                                                </a>
                                                                <button type="submit" class="flex items-center btn btn-primary">
                                                                    <svg class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0001 2.75C10.7575 2.75 9.75012 3.75736 9.75012 5V5.25988C10.3072 5.24999 10.9184 5.24999 11.5893 5.25H12.411C13.0818 5.24999 13.693 5.24999 14.2501 5.25988V5C14.2501 3.75736 13.2428 2.75 12.0001 2.75ZM15.7501 5.32793V5C15.7501 2.92893 14.0712 1.25 12.0001 1.25C9.92905 1.25 8.25012 2.92893 8.25012 5V5.32793C8.10739 5.34021 7.96947 5.35444 7.83619 5.3709C6.82622 5.49569 5.9936 5.75783 5.2863 6.34483C4.57901 6.93183 4.16792 7.70189 3.85914 8.67156C3.55991 9.61128 3.3334 10.8194 3.04866 12.3381L3.02798 12.4484C2.62618 14.5912 2.30954 16.2799 2.25143 17.6112C2.19187 18.9758 2.39488 20.106 3.16465 21.0335C3.93443 21.961 5.00785 22.3689 6.36005 22.5618C7.67926 22.75 9.39737 22.75 11.5775 22.75H12.4227C14.6028 22.75 16.321 22.75 17.6402 22.5618C18.9924 22.3689 20.0658 21.961 20.8356 21.0335C21.6054 20.106 21.8084 18.9758 21.7488 17.6112C21.6907 16.2799 21.3741 14.5912 20.9723 12.4484L20.9516 12.3381C20.6668 10.8194 20.4403 9.61129 20.1411 8.67156C19.8323 7.70189 19.4212 6.93183 18.7139 6.34483C18.0066 5.75783 17.174 5.49569 16.164 5.3709C16.0308 5.35444 15.8928 5.34021 15.7501 5.32793ZM8.02012 6.85959C7.16458 6.96529 6.64786 7.16413 6.24426 7.49909C5.84065 7.83406 5.54999 8.30528 5.28843 9.12669C5.02057 9.96788 4.80982 11.0846 4.5137 12.6639C4.09798 14.8811 3.8029 16.4647 3.75 17.6766C3.69801 18.8679 3.88907 19.5576 4.31892 20.0756C4.74876 20.5935 5.39151 20.9084 6.57193 21.0768C7.77284 21.2482 9.38371 21.25 11.6395 21.25H12.3607C14.6165 21.25 16.2274 21.2482 17.4283 21.0768C18.6087 20.9084 19.2515 20.5935 19.6813 20.0756C20.1112 19.5576 20.3022 18.8679 20.2502 17.6766C20.1973 16.4647 19.9023 14.8811 19.4865 12.6639C19.1904 11.0846 18.9797 9.96788 18.7118 9.12669C18.4502 8.30528 18.1596 7.83406 17.756 7.49909C17.3524 7.16413 16.8357 6.96529 15.9801 6.85959C15.104 6.75133 13.9675 6.75 12.3607 6.75H11.6395C10.0327 6.75 8.89627 6.75133 8.02012 6.85959ZM14.4984 11.9394C14.808 12.2146 14.8359 12.6887 14.5607 12.9983L11.894 15.9983C11.7613 16.1475 11.5746 16.2377 11.3752 16.2488C11.1758 16.26 10.9802 16.1911 10.8317 16.0575L9.49839 14.8575C9.19051 14.5804 9.16555 14.1062 9.44265 13.7983C9.71974 13.4904 10.194 13.4654 10.5018 13.7425L11.2743 14.4377L13.4396 12.0017C13.7147 11.6921 14.1888 11.6643 14.4984 11.9394Z" fill="currentColor" />
                                                                    </svg>

                                                                    Submit
                                                                </button>
                                                            </div>
                                                            <!-- End Buttons -->
                                                    </form>
                                                    <div class="mt-5 sm:mt-10">
                                                        <p class="text-sm text-gray-500">© 2024. ANAA Hotel and Restaurant Capstone Project Group 35 Module 3</p>
                                                    </div>
                                                </div>
                                                <!-- End Body -->
                                            </div>
                                        </div>
                    </div>
                    <!-- End Modal -->
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-8">
                {{$reorder->links()}}
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function submitForm() {
        document.getElementById('filterForm').submit();
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Get references to the input and total elements
        var quantityInput = document.getElementById('quantity');
        var totalSpan = document.getElementById('total');

        // Attach a 'keyup' event listener to the input
        quantityInput.addEventListener('keyup', function() {
            // Get the current value of the input
            var quantityValue = parseInt(quantityInput.value, 10) || 0;

            // Update the total span with the new value
            totalSpan.textContent = quantityValue;
        });
    });
</script>

@endsection