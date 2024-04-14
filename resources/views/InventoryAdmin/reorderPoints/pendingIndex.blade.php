@extends('layouts.InventoryLayout.inventory')

@section('content')
@section('title', 'Pending Order Points')

<div class="panel">
    <div>
        <div class="table-responsive mt-4">
            <table class="table-hover">
                <thead>
                    <tr>
                        <th class="text-xs">ID</th>
                        <th class="text-xs">ITEM NAME</th>
                        <th class="text-xs">CATEGORY</th>
                        <th class="text-xs">QUANTITY</th>
                        <th class="text-xs">STATUS</th>
                        <th class="text-xs">ACTION</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($reorder as $order)
                    <tr>
                        <td class="whitespace-nowrap">
                            {{$order->id}}
                        </td>
                        <td class="whitespace-nowrap">
                            {{$order->item_name}}
                        </td>
                        <td class="whitespace-nowrap">
                            {{$order->category}}
                        </td>
                        <td class="whitespace-nowrap">
                            {{$order->quantity}}
                        </td>
                        <td class="">
                            @if($order->status == 'Pending')
                            <div class="text-center">
                                <div class="flex items-center ">
                                    <div class="mr-4 animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
                                        <span class="sr-only">Loading...</span>
                                    </div> Pending Order
                                </div>
                            </div>
                            @elseif($order->status == 'Approved')
                            <div class="flex items-center ">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.0303 10.0303C16.3232 9.73744 16.3232 9.26256 16.0303 8.96967C15.7374 8.67678 15.2626 8.67678 14.9697 8.96967L10.5 13.4393L9.03033 11.9697C8.73744 11.6768 8.26256 11.6768 7.96967 11.9697C7.67678 12.2626 7.67678 12.7374 7.96967 13.0303L9.96967 15.0303C10.2626 15.3232 10.7374 15.3232 11.0303 15.0303L16.0303 10.0303Z" fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z" fill="currentColor" />
                                </svg>

                                <span class="ml-2">Approve</span>
                            </div>
                            @elseif($order->status == 'On-Delivery')
                            <div class="flex items-center ">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 7.70031C5.25 4.10215 8.30876 1.25 12 1.25C15.608 1.25 18.6116 3.97488 18.7454 7.45788L19.2231 7.61714C19.6863 7.77148 20.0922 7.90676 20.4142 8.05657C20.7623 8.21853 21.0814 8.42714 21.3253 8.76554C21.5692 9.10394 21.6662 9.47259 21.7098 9.85407C21.7501 10.207 21.75 10.6348 21.75 11.123V16.8712C21.75 17.4806 21.7501 18.0005 21.7028 18.4176C21.653 18.8563 21.5418 19.2875 21.2404 19.6553C21.0674 19.8665 20.8573 20.0445 20.6205 20.1805C20.2081 20.4173 19.7645 20.4561 19.3236 20.433C18.9044 20.4111 18.3915 20.3256 17.7904 20.2254L17.7488 20.2185C16.456 20.003 15.9351 19.9216 15.4274 19.9641C15.2417 19.9796 15.0571 20.0074 14.875 20.0471C14.3774 20.1558 13.8988 20.3891 12.716 20.9805C12.6749 21.0011 12.6342 21.0214 12.594 21.0415C11.2114 21.7331 10.3595 22.1592 9.44031 22.2923C9.16384 22.3323 8.88482 22.3522 8.60546 22.3516C7.67668 22.3499 6.77995 22.0508 5.32536 21.5657C5.28328 21.5517 5.24074 21.5375 5.19772 21.5231L4.81415 21.3953L4.77684 21.3828C4.31373 21.2285 3.90783 21.0932 3.5858 20.9434C3.23766 20.7815 2.91861 20.5729 2.67471 20.2345C2.4308 19.8961 2.33379 19.5274 2.29024 19.1459C2.24995 18.793 2.24997 18.3652 2.25 17.877L2.25 12.8572C2.24997 12.0711 2.24994 11.4085 2.31729 10.8895C2.38759 10.3478 2.54652 9.81811 2.98262 9.4198C3.11082 9.30271 3.25213 9.20085 3.40375 9.11626C3.91953 8.8285 4.47226 8.84521 5.00841 8.94983C5.11717 8.97105 5.23109 8.99718 5.35019 9.02754C5.28411 8.5817 5.25 8.13723 5.25 7.70031ZM5.74869 10.7093C5.32072 10.5713 4.99224 10.475 4.72113 10.4221C4.32599 10.345 4.19646 10.3917 4.13459 10.4262C4.08405 10.4544 4.03694 10.4883 3.99421 10.5274C3.9419 10.5751 3.85663 10.6833 3.80482 11.0825C3.75151 11.4933 3.75 12.0575 3.75 12.908V17.8377C3.75 18.3768 3.75114 18.7181 3.78055 18.9758C3.80779 19.2143 3.85234 19.303 3.89157 19.3574C3.9308 19.4118 4.00083 19.4821 4.21849 19.5834C4.45364 19.6928 4.77709 19.8018 5.28849 19.9723L5.67205 20.1001C7.29563 20.6413 7.95089 20.8504 8.6083 20.8516C8.81478 20.852 9.02101 20.8374 9.22537 20.8078C9.87582 20.7136 10.5009 20.411 12.0452 19.6389C12.0765 19.6232 12.1074 19.6078 12.138 19.5925C13.1987 19.062 13.852 18.7352 14.555 18.5817C14.8014 18.5279 15.051 18.4903 15.3023 18.4693C16.0193 18.4093 16.7344 18.5286 17.8945 18.7221C17.9278 18.7276 17.9614 18.7332 17.9954 18.7389C18.6497 18.8479 19.0779 18.9181 19.4019 18.9351C19.7138 18.9514 19.821 18.9098 19.8735 18.8797C19.9524 18.8344 20.0225 18.775 20.0801 18.7046C20.1185 18.6578 20.1771 18.5589 20.2123 18.2486C20.2489 17.9262 20.25 17.4923 20.25 16.829V11.1623C20.25 10.6232 20.2489 10.2819 20.2195 10.0242C20.1922 9.7857 20.1477 9.69703 20.1084 9.64261C20.0692 9.58818 19.9992 9.51787 19.7815 9.41661C19.5464 9.30722 19.2229 9.19821 18.7115 9.02774L18.6527 9.00813C18.4625 10.3095 17.9996 11.6233 17.3173 12.7959C16.4048 14.364 15.0697 15.7299 13.3971 16.4595C12.5094 16.8468 11.4906 16.8468 10.6029 16.4595C8.93027 15.7299 7.59519 14.364 6.68273 12.7959C6.29871 12.136 5.9842 11.4313 5.74869 10.7093ZM12 2.75C9.06383 2.75 6.75 5.00208 6.75 7.70031C6.75 9.11775 7.18744 10.6808 7.97922 12.0415C8.77121 13.4026 9.88753 14.5109 11.2027 15.0847C11.708 15.3051 12.292 15.3051 12.7973 15.0847C14.1125 14.5109 15.2288 13.4026 16.0208 12.0415C16.8126 10.6808 17.25 9.11775 17.25 7.70031C17.25 5.00208 14.9362 2.75 12 2.75ZM12 6.75C11.3096 6.75 10.75 7.30964 10.75 8C10.75 8.69036 11.3096 9.25 12 9.25C12.6904 9.25 13.25 8.69036 13.25 8C13.25 7.30964 12.6904 6.75 12 6.75ZM9.25 8C9.25 6.48122 10.4812 5.25 12 5.25C13.5188 5.25 14.75 6.48122 14.75 8C14.75 9.51878 13.5188 10.75 12 10.75C10.4812 10.75 9.25 9.51878 9.25 8Z" fill="currentColor" />
                                </svg>

                                <span class="ml-2">On-Delivery</span>
                            </div>
                            @elseif($order->status == 'Pending Complete')
                            <div class="flex items-center ">
                                <button id="loading" type="button" class="hidden btn btn-info">
                                    <div class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full dark:text-blue-500" role="status" aria-label="loading">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <span class="ml-2">Loading...</span>
                                </button>
                                <a href="{{ url('received/id='.$order->id) }}" class="btn btn-info" id="complete">


                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.0303 10.0303C16.3232 9.73744 16.3232 9.26256 16.0303 8.96967C15.7374 8.67678 15.2626 8.67678 14.9697 8.96967L10.5 13.4393L9.03033 11.9697C8.73744 11.6768 8.26256 11.6768 7.96967 11.9697C7.67678 12.2626 7.67678 12.7374 7.96967 13.0303L9.96967 15.0303C10.2626 15.3232 10.7374 15.3232 11.0303 15.0303L16.0303 10.0303Z" fill="currentColor" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z" fill="currentColor" />
                                    </svg>

                                    <span class="ml-2">Received</span>
                                </a>
                            </div>
                            @elseif($order->status == 'Completed')
                            <div class="flex items-center ">
                                <div class="text-center" >
                                    <button type="button" class="btn btn-success" data-hs-overlay="#item-reorder{{$order->id}}">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0303 10.0303C16.3232 9.73744 16.3232 9.26256 16.0303 8.96967C15.7374 8.67678 15.2626 8.67678 14.9697 8.96967L10.5 13.4393L9.03033 11.9697C8.73744 11.6768 8.26256 11.6768 7.96967 11.9697C7.67678 12.2626 7.67678 12.7374 7.96967 13.0303L9.96967 15.0303C10.2626 15.3232 10.7374 15.3232 11.0303 15.0303L16.0303 10.0303Z" fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z" fill="currentColor" />
                                        </svg>

                                        <span class="ml-2">Claim Quantity</span>
                                    </button>
                                </div>


                                <div id="item-reorder{{$order->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                                    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                        <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-800">
                                            <div class="absolute top-2 end-2">
                                                <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#item-reorder{{$order->id}}">
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
                                                    Claim Quantity Now?
                                                </h3>
                                                <p class="mb-4 text-gray-500">
                                                    Are you sure you want to claim {{$order->item_name}} with quantity <span class="text-blue-700">{{$order->quantity}}</span>
                                                </p>
                                            </div>

                                            <div class="flex items-center">
                                                <button type="button" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-es-xl border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-white/10 dark:hover:bg-white/20 dark:text-white dark:hover:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#item-reorder{{$order->id}}">
                                                    Cancel
                                                </button>
                                                <a href="{{ url('claim-now/id='.$order->id) }}" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-ee-xl border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                    Claim Now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="flex items-center" >
                                    <button type="button" class="btn btn-success">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0303 10.0303C16.3232 9.73744 16.3232 9.26256 16.0303 8.96967C15.7374 8.67678 15.2626 8.67678 14.9697 8.96967L10.5 13.4393L9.03033 11.9697C8.73744 11.6768 8.26256 11.6768 7.96967 11.9697C7.67678 12.2626 7.67678 12.7374 7.96967 13.0303L9.96967 15.0303C10.2626 15.3232 10.7374 15.3232 11.0303 15.0303L16.0303 10.0303Z" fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z" fill="currentColor" />
                                        </svg>

                                        <span class="ml-2">Claimed</span>
                                    </button>
                                    <div class="ml-4">
                                        <p class="badge bg-primary rounded-full ">{{$order->updated_at}}</p>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td>
                            @if($order->status == 'Approve')
                            <div class="hs-tooltip inline-block [--trigger:hover] mr-2">
                                <button type="button" data-hs-overlay="#cancel-task{{$order->id}}" class="hs-tooltip-toggle flex justify-center items-center h-10 w-10 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">

                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2.75C11.0215 2.75 10.1871 3.37503 9.87787 4.24993C9.73983 4.64047 9.31134 4.84517 8.9208 4.70713C8.53026 4.56909 8.32557 4.1406 8.46361 3.75007C8.97804 2.29459 10.3661 1.25 12 1.25C13.634 1.25 15.022 2.29459 15.5365 3.75007C15.6745 4.1406 15.4698 4.56909 15.0793 4.70713C14.6887 4.84517 14.2602 4.64047 14.1222 4.24993C13.813 3.37503 12.9785 2.75 12 2.75Z" fill="#e7515a" />
                                        <path d="M2.75 6C2.75 5.58579 3.08579 5.25 3.5 5.25H20.5001C20.9143 5.25 21.2501 5.58579 21.2501 6C21.2501 6.41421 20.9143 6.75 20.5001 6.75H3.5C3.08579 6.75 2.75 6.41421 2.75 6Z" fill="#e7515a" />
                                        <path d="M5.91508 8.45011C5.88753 8.03681 5.53015 7.72411 5.11686 7.75166C4.70356 7.77921 4.39085 8.13659 4.41841 8.54989L4.88186 15.5016C4.96735 16.7844 5.03641 17.8205 5.19838 18.6336C5.36678 19.4789 5.6532 20.185 6.2448 20.7384C6.83639 21.2919 7.55994 21.5307 8.41459 21.6425C9.23663 21.75 10.2751 21.75 11.5607 21.75H12.4395C13.7251 21.75 14.7635 21.75 15.5856 21.6425C16.4402 21.5307 17.1638 21.2919 17.7554 20.7384C18.347 20.185 18.6334 19.4789 18.8018 18.6336C18.9637 17.8205 19.0328 16.7844 19.1183 15.5016L19.5818 8.54989C19.6093 8.13659 19.2966 7.77921 18.8833 7.75166C18.47 7.72411 18.1126 8.03681 18.0851 8.45011L17.6251 15.3492C17.5353 16.6971 17.4712 17.6349 17.3307 18.3405C17.1943 19.025 17.004 19.3873 16.7306 19.6431C16.4572 19.8988 16.083 20.0647 15.391 20.1552C14.6776 20.2485 13.7376 20.25 12.3868 20.25H11.6134C10.2626 20.25 9.32255 20.2485 8.60915 20.1552C7.91715 20.0647 7.54299 19.8988 7.26957 19.6431C6.99616 19.3873 6.80583 19.025 6.66948 18.3405C6.52891 17.6349 6.46488 16.6971 6.37503 15.3492L5.91508 8.45011Z" fill="#e7515a" />
                                        <path d="M9.42546 10.2537C9.83762 10.2125 10.2051 10.5132 10.2464 10.9254L10.7464 15.9254C10.7876 16.3375 10.4869 16.7051 10.0747 16.7463C9.66256 16.7875 9.29502 16.4868 9.25381 16.0746L8.75381 11.0746C8.71259 10.6625 9.0133 10.2949 9.42546 10.2537Z" fill="#e7515a" />
                                        <path d="M15.2464 11.0746C15.2876 10.6625 14.9869 10.2949 14.5747 10.2537C14.1626 10.2125 13.795 10.5132 13.7538 10.9254L13.2538 15.9254C13.2126 16.3375 13.5133 16.7051 13.9255 16.7463C14.3376 16.7875 14.7051 16.4868 14.7464 16.0746L15.2464 11.0746Z" fill="#e7515a" />
                                    </svg>


                                    <span class=" hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-3 px-4 bg-white border text-sm text-gray-600 rounded-lg shadow-md dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400" role="tooltip">
                                        Cancel Order
                                    </span>
                                </button>
                            </div>

                            <!--CANCEL TASK MODAL -->
                            <div id="cancel-task{{$order->id}}" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                                <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto ">
                                    <div class="relative flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                        <div class="absolute top-2 end-2">
                                            <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#cancel-task{{$order->id}}">
                                                <span class="sr-only">Close</span>
                                                <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M18 6 6 18" />
                                                    <path d="m6 6 12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="p-4 sm:p-10 text-center overflow-y-auto">
                                            <!-- Icon -->
                                            <span class="mb-4 inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-yellow-50 bg-yellow-100 text-yellow-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100">
                                                <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                </svg>
                                            </span>
                                            <!-- End Icon -->

                                            <h3 class="mb-2 text-2xl font-bold text-gray-800 dark:text-gray-200">
                                                Cancel Order
                                            </h3>
                                            <p class="text-gray-500">
                                                Are you sure you want to cancel {{$order->item_name}} - {{$order->category}} Order from Logistics?
                                            </p>

                                            <div class="mt-6 flex justify-center gap-x-4">
                                                <a href="{{ url('inventory-admin/cancel-order/id='.$order->id) }}" class="btn btn-danger">
                                                    Cancel Order
                                                </a>
                                                <button type="button" class="btn btn-secondary" data-hs-overlay="#cancel-task{{$order->id}}">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="hs-tooltip inline-block [--trigger:hover] mr-2">
                                <button disabled type="button" class="hs-tooltip-toggle flex justify-center items-center h-10 w-10 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">

                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2.75C11.0215 2.75 10.1871 3.37503 9.87787 4.24993C9.73983 4.64047 9.31134 4.84517 8.9208 4.70713C8.53026 4.56909 8.32557 4.1406 8.46361 3.75007C8.97804 2.29459 10.3661 1.25 12 1.25C13.634 1.25 15.022 2.29459 15.5365 3.75007C15.6745 4.1406 15.4698 4.56909 15.0793 4.70713C14.6887 4.84517 14.2602 4.64047 14.1222 4.24993C13.813 3.37503 12.9785 2.75 12 2.75Z" fill="#e7515a" />
                                        <path d="M2.75 6C2.75 5.58579 3.08579 5.25 3.5 5.25H20.5001C20.9143 5.25 21.2501 5.58579 21.2501 6C21.2501 6.41421 20.9143 6.75 20.5001 6.75H3.5C3.08579 6.75 2.75 6.41421 2.75 6Z" fill="#e7515a" />
                                        <path d="M5.91508 8.45011C5.88753 8.03681 5.53015 7.72411 5.11686 7.75166C4.70356 7.77921 4.39085 8.13659 4.41841 8.54989L4.88186 15.5016C4.96735 16.7844 5.03641 17.8205 5.19838 18.6336C5.36678 19.4789 5.6532 20.185 6.2448 20.7384C6.83639 21.2919 7.55994 21.5307 8.41459 21.6425C9.23663 21.75 10.2751 21.75 11.5607 21.75H12.4395C13.7251 21.75 14.7635 21.75 15.5856 21.6425C16.4402 21.5307 17.1638 21.2919 17.7554 20.7384C18.347 20.185 18.6334 19.4789 18.8018 18.6336C18.9637 17.8205 19.0328 16.7844 19.1183 15.5016L19.5818 8.54989C19.6093 8.13659 19.2966 7.77921 18.8833 7.75166C18.47 7.72411 18.1126 8.03681 18.0851 8.45011L17.6251 15.3492C17.5353 16.6971 17.4712 17.6349 17.3307 18.3405C17.1943 19.025 17.004 19.3873 16.7306 19.6431C16.4572 19.8988 16.083 20.0647 15.391 20.1552C14.6776 20.2485 13.7376 20.25 12.3868 20.25H11.6134C10.2626 20.25 9.32255 20.2485 8.60915 20.1552C7.91715 20.0647 7.54299 19.8988 7.26957 19.6431C6.99616 19.3873 6.80583 19.025 6.66948 18.3405C6.52891 17.6349 6.46488 16.6971 6.37503 15.3492L5.91508 8.45011Z" fill="#e7515a" />
                                        <path d="M9.42546 10.2537C9.83762 10.2125 10.2051 10.5132 10.2464 10.9254L10.7464 15.9254C10.7876 16.3375 10.4869 16.7051 10.0747 16.7463C9.66256 16.7875 9.29502 16.4868 9.25381 16.0746L8.75381 11.0746C8.71259 10.6625 9.0133 10.2949 9.42546 10.2537Z" fill="#e7515a" />
                                        <path d="M15.2464 11.0746C15.2876 10.6625 14.9869 10.2949 14.5747 10.2537C14.1626 10.2125 13.795 10.5132 13.7538 10.9254L13.2538 15.9254C13.2126 16.3375 13.5133 16.7051 13.9255 16.7463C14.3376 16.7875 14.7051 16.4868 14.7464 16.0746L15.2464 11.0746Z" fill="#e7515a" />
                                    </svg>


                                    <span class=" hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-3 px-4 bg-white border text-sm text-gray-600 rounded-lg shadow-md dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400" role="tooltip">
                                        Cancel Order
                                    </span>
                                </button>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    const loading = document.getElementById('loading');
    const approve = document.getElementById('complete');

    approve.addEventListener('click', function() {
        loading.classList.remove('hidden');
        approve.classList.add('hidden');
        setTimeout(() => {
            approve.click();
        }, 3000);
    })
</script>
@endsection