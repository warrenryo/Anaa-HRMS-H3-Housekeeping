<x-app-layout>
    @section('title', 'Room Details')
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ url('HousekeepingAdmin/dashboard')}}" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] before:mr-1 rtl:before:ml-1">
            <span>Room Details</span>
        </li>
    </ul>

    <div class="pt-6">

        <!-- Hover Table -->
        <div class="panel">
            <div class="justify-end flex mb-2">
                <!--<button type="button" data-hs-overlay="#addStaff" class="btn btn-primary"><i
                        class="fa-solid fa-plus mr-2"></i> Add Staff</button>-->
            </div>
            <div class="mb-5">
                <div class="table-responsive">
                    <table class="table-hover">
                        <thead>
                            <tr>
                                <th class="text-xs">ROOM TYPE ID</th>
                                <th class="text-xs">ROOM TYPE</th>
                                <th class="text-xs">ROOM NUMBER</th>
                                <th class="text-xs">ROOM STATUS</th>
                                <th class="text-xs">MAX GUEST</th>
                                <th class="text-xs">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roomData as $rooms)
                            <tr>
                                <td>{{$rooms['RoomTypeID']}}</td>
                                <td>{{$rooms['RoomType']}}</td>
                                <td>{{$rooms['RoomNumber']}}</td>
                                <td>
                                    @if($rooms['RoomStatus'] == 'Vacant')
                                    <span class="badge bg-success">{{$rooms['RoomStatus']}}</span>
                                    @elseif($rooms['RoomStatus'] == 'Inspected')
                                    <span class="badge  bg-warning">{{$rooms['RoomStatus']}}</span>
                                    @elseif($rooms['RoomStatus'] == 'Dirty')
                                    <span class="badge  bg-orange-700">{{$rooms['RoomStatus']}}</span>
                                    @elseif($rooms['RoomStatus'] == 'Out of Order')
                                    <span class="badge  bg-info">{{$rooms['RoomStatus']}}</span>
                                    @elseif($rooms['RoomStatus'] == 'Occupied')
                                    <span class="badge  bg-danger">{{$rooms['RoomStatus']}}</span>
                                    @elseif($rooms['RoomStatus'] == 'Checkout')
                                    <span class="badge  bg-dark">{{$rooms['RoomStatus']}}</span>
                                    @else
                                    <span>{{$rooms['RoomStatus']}}</span>
                                    @endif

                                </td>
                                <td>{{$rooms['MaxGuests']}}</td>
                                <td>
                                    @if($rooms['RoomStatus'] == 'Dirty')
                                    <div class="flex">
                                        <button data-hs-overlay="#workOrder{{$rooms['id']}}" class="btn btn-primary" type="button">
                                            Create Work Order
                                        </button>
                                    </div>
                                    <div id="workOrder{{$rooms['id']}}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center justify-center">
                                            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                                    <h3 class="font-bold text-gray-800 dark:text-white">
                                                        Create Work Order for Room {{$rooms['RoomNumber']}}
                                                    </h3>
                                                    <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#workOrder{{$rooms['id']}}">
                                                        <span class="sr-only">Close</span>
                                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M18 6 6 18" />
                                                            <path d="m6 6 12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="p-4 overflow-y-auto">
                                                    <form action="{{ url('HousekeepingAdmin/submit-work-order-admin') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="room_no" value="{{$rooms['RoomNumber']}}">
                                                        <div class="grid grid-cols-2 gap-4">
                                                            <div>
                                                                <label for="ctnSelect1">Housekeeper</label>
                                                                <select id="ctnSelect1" class="form-select text-white-dark" name="housekeeper_name" required>
                                                                    <option>Select Housekeeper</option>
                                                                    @foreach($housekeeper as $staff)
                                                                    <option class="text-black dark:text-white-dark" value="{{$staff->user_code}}">
                                                                        {{$staff->name}} -
                                                                        {{$staff->role}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div>
                                                                <label for="room_no" class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">What time?</label>
                                                                <input name="time_issue" min="{{ now()->addMinutes(20)->format('H:i') }}" value="{{ now()->addMinutes(20)->format('H:i') }}" class="dark:border-[#17263c] dark:bg-[#121e32] dark:text-white-dark dark:focus:border-primary border-gray-300 rounded-md py-2.5 focus:border-primary" type="time">
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <label for="ctnSelect1">Housekeeping Task</label>
                                                                <select id="ctnSelect1" class="form-select text-white-dark" name="housekeeping_task" required>
                                                                    <option value="General Cleaning">General Cleaning</option>
                                                                    <option value="Slight Cleaning">Slight Cleaning</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3">
                                                            <label for="">Additional </label>
                                                            <textarea id="ctnTextarea" rows="3" class="form-textarea" name="additional_requests"></textarea>
                                                        </div>
                                                </div>
                                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#workOrder{{$rooms['id']}}">
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
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>