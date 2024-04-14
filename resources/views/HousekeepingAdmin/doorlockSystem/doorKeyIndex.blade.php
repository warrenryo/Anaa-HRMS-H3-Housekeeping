<x-app-layout>
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ url('HousekeepingAdmin/dashboard') }}" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Door Keys</span>
        </li>
    </ul>
    <div class="panel mt-6">
        <div class="mb-5">
            <div class="table-responsive">
                <table class="table-hover">
                    <thead>
                        <tr>
                            <th class="text-xs">DOOR KEY UID</th>
                            <th class="text-xs">USER</th>
                            <th class="text-xs">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($key as $keys)
                        <tr>
                            <td>{{$keys->key_UID}}</td>
                            <td>
                                @if($keys->key_user == null)
                                <div class="">
                                    <button data-hs-overlay="#uid{{$keys->id}}" class="btn btn-primary" type="button">
                                        Assign key
                                    </button>
                                </div>
                                <div id="uid{{$keys->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                                    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center justify-center">
                                        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                                <h3 class="font-bold text-gray-800 dark:text-white">
                                                    Assign key {{$keys->key_UID}}
                                                </h3>
                                                <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#uid{{$keys->id}}">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M18 6 6 18" />
                                                        <path d="m6 6 12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-4 overflow-y-auto">
                                                <form action="{{ url('HousekeepingAdmin/assign-key/'.$keys->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div>
                                                        <label for="ctnSelect1">Assign key to</label>
                                                        <select id="ctnSelect1" name="housekeeper" class=" form-select text-white-dark" required>
                                                            <option disabled selected>Select Housekeeper</option>
                                                            @foreach($housekeeper as $staff)
                                                            <option value="{{$staff->user_code}}">{{$staff->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                            </div>
                                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#uid{{$keys->id}}">
                                                    Close
                                                </button>
                                                <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                    Submit
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @else
                                {{$keys->key_user}}
                                @endif
                            </td>
                            <td class="flex">
                                <!--EDIT KEY-->
                                <div class="">
                                    <div class="hs-tooltip inline-block [--trigger:hover] mr-2">
                                        <button type="button" data-hs-overlay="#edit{{$keys->id}}" class="hs-tooltip-toggle flex justify-center items-center h-10 w-10 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">

                                            <svg class="hover:animate-rotate" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9436 1.25H13.0564C14.8942 1.24998 16.3498 1.24997 17.489 1.40314C18.6614 1.56076 19.6104 1.89288 20.3588 2.64124C20.6516 2.93414 20.6516 3.40901 20.3588 3.7019C20.0659 3.9948 19.591 3.9948 19.2981 3.7019C18.8749 3.27869 18.2952 3.02502 17.2892 2.88976C16.2615 2.75159 14.9068 2.75 13 2.75H11C9.09318 2.75 7.73851 2.75159 6.71085 2.88976C5.70476 3.02502 5.12511 3.27869 4.7019 3.7019C4.27869 4.12511 4.02502 4.70476 3.88976 5.71085C3.75159 6.73851 3.75 8.09318 3.75 10V14C3.75 15.9068 3.75159 17.2615 3.88976 18.2892C4.02502 19.2952 4.27869 19.8749 4.7019 20.2981C5.12511 20.7213 5.70476 20.975 6.71085 21.1102C7.73851 21.2484 9.09318 21.25 11 21.25H13C14.9068 21.25 16.2615 21.2484 17.2892 21.1102C18.2952 20.975 18.8749 20.7213 19.2981 20.2981C19.994 19.6022 20.2048 18.5208 20.2414 15.9892C20.2474 15.575 20.588 15.2441 21.0022 15.2501C21.4163 15.2561 21.7472 15.5967 21.7412 16.0108C21.7061 18.4383 21.549 20.1685 20.3588 21.3588C19.6104 22.1071 18.6614 22.4392 17.489 22.5969C16.3498 22.75 14.8942 22.75 13.0564 22.75H10.9436C9.10583 22.75 7.65019 22.75 6.51098 22.5969C5.33856 22.4392 4.38961 22.1071 3.64124 21.3588C2.89288 20.6104 2.56076 19.6614 2.40314 18.489C2.24997 17.3498 2.24998 15.8942 2.25 14.0564V9.94358C2.24998 8.10582 2.24997 6.65019 2.40314 5.51098C2.56076 4.33856 2.89288 3.38961 3.64124 2.64124C4.38961 1.89288 5.33856 1.56076 6.51098 1.40314C7.65019 1.24997 9.10582 1.24998 10.9436 1.25ZM18.1131 7.04556C19.1739 5.98481 20.8937 5.98481 21.9544 7.04556C23.0152 8.1063 23.0152 9.82611 21.9544 10.8869L17.1991 15.6422C16.9404 15.901 16.7654 16.076 16.5693 16.2289C16.3387 16.4088 16.0892 16.563 15.8252 16.6889C15.6007 16.7958 15.3659 16.8741 15.0187 16.9897L12.9351 17.6843C12.4751 17.8376 11.9679 17.7179 11.625 17.375C11.2821 17.0321 11.1624 16.5249 11.3157 16.0649L11.9963 14.0232C12.001 14.0091 12.0056 13.9951 12.0102 13.9813C12.1259 13.6342 12.2042 13.3993 12.3111 13.1748C12.437 12.9108 12.5912 12.6613 12.7711 12.4307C12.924 12.2346 13.099 12.0596 13.3578 11.8009C13.3681 11.7906 13.3785 11.7802 13.3891 11.7696L18.1131 7.04556ZM20.8938 8.10622C20.4188 7.63126 19.6488 7.63126 19.1738 8.10622L18.992 8.288C19.0019 8.32149 19.0132 8.3571 19.0262 8.39452C19.1202 8.66565 19.2988 9.02427 19.6372 9.36276C19.9757 9.70125 20.3343 9.87975 20.6055 9.97382C20.6429 9.9868 20.6785 9.99812 20.712 10.008L20.8938 9.8262C21.3687 9.35124 21.3687 8.58118 20.8938 8.10622ZM19.5664 11.1536C19.2485 10.9866 18.9053 10.7521 18.5766 10.4234C18.2479 10.0947 18.0134 9.75146 17.8464 9.43357L14.4497 12.8303C14.1487 13.1314 14.043 13.2388 13.9538 13.3532C13.841 13.4979 13.7442 13.6545 13.6652 13.8202C13.6028 13.9511 13.5539 14.0936 13.4193 14.4976L13.019 15.6985L13.3015 15.981L14.5024 15.5807C14.9064 15.4461 15.0489 15.3972 15.1798 15.3348C15.3455 15.2558 15.5021 15.159 15.6468 15.0462C15.7612 14.957 15.8686 14.8513 16.1697 14.5503L19.5664 11.1536ZM7.25 9C7.25 8.58579 7.58579 8.25 8 8.25H14.5C14.9142 8.25 15.25 8.58579 15.25 9C15.25 9.41421 14.9142 9.75 14.5 9.75H8C7.58579 9.75 7.25 9.41421 7.25 9ZM7.25 13C7.25 12.5858 7.58579 12.25 8 12.25H10.5C10.9142 12.25 11.25 12.5858 11.25 13C11.25 13.4142 10.9142 13.75 10.5 13.75H8C7.58579 13.75 7.25 13.4142 7.25 13ZM7.25 17C7.25 16.5858 7.58579 16.25 8 16.25H9.5C9.91421 16.25 10.25 16.5858 10.25 17C10.25 17.4142 9.91421 17.75 9.5 17.75H8C7.58579 17.75 7.25 17.4142 7.25 17Z" fill="#3498DB" />
                                            </svg>


                                            <span class=" hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-3 px-4 bg-white border text-sm text-gray-600 rounded-lg shadow-md dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400" role="tooltip">
                                                Edit Key
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div id="edit{{$keys->id}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                                    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center justify-center">
                                        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                                <h3 class="font-bold text-gray-800 dark:text-white">
                                                    Assign key {{$keys->key_UID}}
                                                </h3>
                                                <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#edit{{$keys->id}}">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M18 6 6 18" />
                                                        <path d="m6 6 12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="p-4 overflow-y-auto">
                                                <form action="{{ url('HousekeepingAdmin/assign-key/'.$keys->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div>
                                                        <label for="ctnSelect1">Assign key to</label>
                                                        <select id="ctnSelect1" name="housekeeper" class=" form-select text-white-dark" required>
                                                            <option disabled selected>Select Housekeeper</option>
                                                            @foreach($housekeeper as $staff)
                                                            <option value="{{$staff->user_code}}">{{$staff->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                            </div>
                                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#edit{{$keys->id}}">
                                                    Close
                                                </button>
                                                <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                    Submit
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--END EDIT KEY-->

                                <div class="">
                                    <div class="hs-tooltip inline-block [--trigger:hover] mr-2">
                                        <button type="button" data-hs-overlay="#delete{{$keys->id}}" class="hs-tooltip-toggle flex justify-center items-center h-10 w-10 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">

                                            <svg class="hover:animate-rotate" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.11686 7.7517C5.53016 7.72415 5.88754 8.03685 5.91509 8.45015L6.37503 15.3493C6.46489 16.6971 6.52892 17.6349 6.66948 18.3406C6.80583 19.025 6.99617 19.3873 7.26958 19.6431C7.54299 19.8989 7.91715 20.0647 8.60915 20.1552C9.32255 20.2485 10.2626 20.25 11.6134 20.25H12.3868C13.7376 20.25 14.6776 20.2485 15.391 20.1552C16.083 20.0647 16.4572 19.8989 16.7306 19.6431C17.004 19.3873 17.1943 19.025 17.3307 18.3406C17.4713 17.6349 17.5353 16.6971 17.6251 15.3493L18.0851 8.45015C18.1126 8.03685 18.47 7.72415 18.8833 7.7517C19.2966 7.77925 19.6093 8.13663 19.5818 8.54993L19.1183 15.5017C19.0328 16.7844 18.9638 17.8206 18.8018 18.6336C18.6334 19.4789 18.347 20.185 17.7554 20.7385C17.1638 21.2919 16.4402 21.5308 15.5856 21.6425C14.7635 21.7501 13.7251 21.7501 12.4395 21.75H11.5607C10.2751 21.7501 9.23664 21.7501 8.4146 21.6425C7.55995 21.5308 6.8364 21.2919 6.2448 20.7385C5.65321 20.185 5.36679 19.4789 5.19839 18.6336C5.03642 17.8205 4.96736 16.7844 4.88186 15.5017L4.41841 8.54993C4.39086 8.13663 4.70357 7.77925 5.11686 7.7517Z" fill="#E74C3C" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3553 2.25004L10.3094 2.25002C10.093 2.24988 9.90445 2.24976 9.72643 2.27819C9.02313 2.39049 8.41453 2.82915 8.08559 3.46084C8.00232 3.62074 7.94282 3.79964 7.87452 4.00496L7.86 4.04858L7.76291 4.33984C7.74392 4.39681 7.73863 4.41251 7.73402 4.42524C7.55891 4.90936 7.10488 5.23659 6.59023 5.24964C6.5767 5.24998 6.56013 5.25004 6.50008 5.25004H3.5C3.08579 5.25004 2.75 5.58582 2.75 6.00004C2.75 6.41425 3.08579 6.75004 3.5 6.75004L6.50865 6.75004L6.52539 6.75004H17.4748L17.4915 6.75004L20.5001 6.75004C20.9143 6.75004 21.2501 6.41425 21.2501 6.00004C21.2501 5.58582 20.9143 5.25004 20.5001 5.25004H17.5001C17.44 5.25004 17.4235 5.24998 17.4099 5.24964C16.8953 5.23659 16.4413 4.90933 16.2661 4.42522C16.2616 4.41258 16.2562 4.39653 16.2373 4.33984L16.1402 4.04858L16.1256 4.00494C16.0573 3.79961 15.9978 3.62073 15.9146 3.46084C15.5856 2.82915 14.977 2.39049 14.2737 2.27819C14.0957 2.24976 13.9072 2.24988 13.6908 2.25002L13.6448 2.25004H10.3553ZM9.14458 4.93548C9.10531 5.04404 9.05966 5.14902 9.00815 5.25004H14.992C14.9405 5.14902 14.8949 5.04405 14.8556 4.9355L14.8169 4.82216L14.7171 4.52292C14.626 4.2494 14.605 4.19363 14.5842 4.15364C14.4745 3.94307 14.2716 3.79686 14.0372 3.75942C13.9927 3.75231 13.9331 3.75004 13.6448 3.75004H10.3553C10.067 3.75004 10.0075 3.75231 9.96296 3.75942C9.72853 3.79686 9.52566 3.94307 9.41601 4.15364C9.39519 4.19363 9.37419 4.24942 9.28302 4.52292L9.18322 4.82234C9.1682 4.86742 9.1565 4.90251 9.14458 4.93548Z" fill="#E74C3C" />
                                            </svg>

                                            <span class=" hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-3 px-4 bg-white border text-sm text-gray-600 rounded-lg shadow-md dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400" role="tooltip">
                                                Remove Key
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <!--DELETE TASK MODAL -->
                                <div id="delete{{$keys->id}}" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                                    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto ">
                                        <div class="relative flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                            <div class="absolute top-2 end-2">
                                                <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#delete{{$keys->id}}">
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
                                                    Remove Door Key
                                                </h3>
                                                <p class="text-gray-500">
                                                    Are you sure you want to remove {{$keys->key_UID}} door key?
                                                </p>

                                                <div class="mt-6 flex justify-center gap-x-4">
                                                    <a href="{{ url('HousekeepingAdmin/remove-doorkey/id='.$keys->id) }}" class="btn btn-danger">
                                                        Remove Door Key
                                                    </a>
                                                    <button type="button" class="btn btn-secondary" data-hs-overlay="#delete{{$keys->id}}">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">

            </div>
        </div>
    </div>
</x-app-layout>