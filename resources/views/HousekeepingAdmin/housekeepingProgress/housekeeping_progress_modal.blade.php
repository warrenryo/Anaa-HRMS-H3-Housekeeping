<!-- Modal toggle -->
<div id="view-details{{$task->id}}"
    class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto">
        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-between items-center py-3 px-4 dark:border-gray-700">
                <h3 class="font-bold text-gray-800 dark:text-white">
                    # {{$task->h3_housekeeping_task_id}} {{$task->h3_room_no}}
                </h3>
                <button type="button"
                    class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#view-details{{$task->id}}">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
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
                <div class="grid grid-cols-2 gap-2 mt-3">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border overflow-hidden dark:border-gray-700">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    Housekeeping Request</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach(json_decode($task->h3_housekeeping_request) as $requests)
                                            <tr
                                                class="bg-white border-b text-sm dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td scope="row"
                                                    class="px-6 text-primary py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$requests}}
                                                    <input type="hidden" value="{{$requests}}"
                                                        name="housekeeping_request[]">
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border overflow-hidden dark:border-gray-700">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    Items and Services</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach(json_decode($task->h3_items_services) as $requests)
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td scope="row"
                                                    class="px-6 py-4 text-primary whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
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
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                ITEM</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                QTY
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach($task->workOrderItem as $item)
                                        <tr
                                            class="bg-white border-b text-sm dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td
                                                class="px-6 py-4 text-primary whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{$item->h3_items}}</td>
                                                <td
                                                class="px-6 py-4 text-primary whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{$item->h3_quantity}}</td>
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
                    <textarea readonly id="hs-about-hire-us-2" name="hs-about-hire-us-2" rows="4"
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">@if($task->h3_additional_request == null) No request found @else{{$task->h3_additional_request}} @endif</textarea>
                </div>

                <div class="mt-6">
                <label for="hs-about-hire-us-2" class="block mb-2 text-xs text-gray-500 dark:text-white">PROOF OF COMPLETION</label>
                <img src="{{ asset($task->h3_proof_image) }}" alt="">
                </div>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 dark:border-gray-700">
                <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#view-details{{$task->id}}">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>



<!--CANCEL TASK MODAL -->
<div id="cancel-task{{$task->id}}" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto ">
    <div class="relative flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
      <div class="absolute top-2 end-2">
        <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#cancel-task{{$task->id}}">
          <span class="sr-only">Close</span>
          <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 sm:p-10 text-center overflow-y-auto">
        <!-- Icon -->
        <span class="mb-4 inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-yellow-50 bg-yellow-100 text-yellow-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100">
          <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
        </span>
        <!-- End Icon -->

        <h3 class="mb-2 text-2xl font-bold text-gray-800 dark:text-gray-200">
          Cancel Task
        </h3>
        <p class="text-gray-500">
          Are you sure you want to cancel {{$task->h3_housekeeping_task_id}} - {{$task->h3_room_no}} task? the quantity of items selected will be retrieve to the inventory
        </p>

        <div class="mt-6 flex justify-center gap-x-4">
          <a href="{{ url('HousekeepingAdmin/cancel-task/id='.$task->h3_housekeeping_task_id) }}" class="btn btn-danger" >
            Cancel Task
          </a>
          <button type="button" class="btn btn-secondary" data-hs-overlay="#cancel-task{{$task->id}}">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


<!--DELETE TASK MODAL -->
<div id="delete-task{{$task->id}}" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
  <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto ">
    <div class="relative flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
      <div class="absolute top-2 end-2">
        <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#delete-task{{$task->id}}">
          <span class="sr-only">Close</span>
          <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>

      <div class="p-4 sm:p-10 text-center overflow-y-auto">
        <!-- Icon -->
        <span class="mb-4 inline-flex justify-center items-center w-[62px] h-[62px] rounded-full border-4 border-yellow-50 bg-yellow-100 text-yellow-500 dark:bg-yellow-700 dark:border-yellow-600 dark:text-yellow-100">
          <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
        </span>
        <!-- End Icon -->

        <h3 class="mb-2 text-2xl font-bold text-gray-800 dark:text-gray-200">
          Delete Completed Task
        </h3>
        <p class="text-gray-500">
          Are you sure you want to delete {{$task->h3_housekeeping_task_id}} - {{$task->h3_room_no}} completed task? the quantity of items selected will be retrieve to the inventory
        </p>

        <div class="mt-6 flex justify-center gap-x-4">
          <a href="{{ url('HousekeepingAdmin/delete-completed-task/id='.$task->h3_housekeeping_task_id) }}" class="btn btn-danger" >
            Delete Task
          </a>
          <button type="button" class="btn btn-secondary" data-hs-overlay="#delete-task{{$task->id}}">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</div>