<!-- Modal toggle -->
<div id="view-details{{$task->id}}" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-between items-center py-3 px-4 dark:border-gray-700">
                <h3 class="font-bold text-gray-800 dark:text-white">
                    # {{$task->h3_housekeeping_task_id}} {{$task->h3_room_no}}
                </h3>
                <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#view-details{{$task->id}}">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <!--WORK DESCRIPTION -->
                <div class="">
                    <label for="hs-about-hire-us-2" class="block mb-2 text-xs text-gray-500 dark:text-white">WORK
                        DESCRIPTION</label>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-2 mt-3">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border overflow-hidden dark:border-gray-700">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    Housekeeping Request</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach(json_decode($task->h3_housekeeping_request) as $requests)
                                            <tr class="bg-white border-b text-sm dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td scope="row" class="px-6 text-primary py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$requests}}
                                                    <input type="hidden" value="{{$requests}}" name="housekeeping_request[]">
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col mt-3 md:mt-0">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border overflow-hidden dark:border-gray-700">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    Items and Services</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach(json_decode($task->h3_items_services) as $requests)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td scope="row" class="px-6 py-4 text-primary whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    {{$requests}}
                                                    <input type="hidden" value="{{$requests}}" name="items_services[]">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END WORK DESCRIPTION -->
                <!--ITEMS NEEDED-->
                <div class="mt-6">
                    <label for="hs-about-hire-us-2" class="block mb-2 text-xs text-gray-500 dark:text-white">ITEMS
                        NEEDED</label>
                </div>
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border overflow-hidden dark:border-gray-700">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                ITEM</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                QTY
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach($task->workOrderItem as $item)
                                        <tr class="bg-white border-b text-sm dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="px-6 py-4 text-primary whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{$item->h3_items}}
                                            </td>
                                            <td class="px-6 py-4 text-primary whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{$item->h3_quantity}}
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END ITEMS NEEDED-->
                <div class="mt-6">
                    <label for="hs-about-hire-us-2" class="block mb-2 text-xs text-gray-500 dark:text-white">ADDITIONAL
                        REQUESTS</label>
                    <textarea readonly id="hs-about-hire-us-2" name="hs-about-hire-us-2" rows="4" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">@if($task->h3_additional_request == null) No request found @else{{$task->h3_additional_request}} @endif</textarea>
                </div>

                <div class="mt-6">
                <label for="hs-about-hire-us-2" class="block mb-2 text-xs text-gray-500 dark:text-white">PROOF OF COMPLETION</label>
                <img src="{{ asset($task->h3_proof_image) }}" alt="">
                </div>
            </div>

            <div class="flex justify-end items-center gap-x-2 py-3 px-4 dark:border-gray-700">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#view-details{{$task->id}}">
                    Close
                </button>
                @if($task->h3_status == 'In-Progress')
                <div x-data="modal">
                        <!-- button -->
                        <div class="flex items-center justify-center">
                            <button type="button" class="btn btn-success" @click="toggle">Mark as Completed</button>
                        </div>
                    
                        <!-- modal -->
                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                        <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                                        </button>
                                    </div>
                                    <div class="p-5">
                                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                            <div class="flex items-center justify-center">
                                                <img src="{{ asset('img/animatedIcons/check.gif') }}" class="w-[16vh]" alt="">
                                            </div>
                                            <p class="text-center mt-4">Are you sure that you have completed this task?</p>
                                        </div>
                                        <div class="flex justify-center items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger" @click="toggle">No</button>
                                            <a href="{{ url('housekeeper/mark-as-completed/'.$task->id) }}"  class="btn btn-success ltr:ml-4 rtl:mr-4" >Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                @elseif($task->h3_status == 'Pending')
                <a href="{{ url('housekeeper/accept-update-status/'.$task->id) }}" type="button" class="btn btn-secondary">
                    Accept
                </a>
                @else
                
                @endif
            </div>
        </div>
    </div>
</div>