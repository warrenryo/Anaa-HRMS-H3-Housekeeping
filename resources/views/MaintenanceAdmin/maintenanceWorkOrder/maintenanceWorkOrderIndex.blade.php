@extends('layouts.maintenanceLayout.maintenance')


@section('content')
@section('title', 'Create Maintenance Work Order')
<ul class="flex space-x-2 rtl:space-x-reverse">
    <li>
        <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
    </li>
    <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
        <span>Maintenance Work Order</span>
    </li>
</ul>

@include('MaintenanceAdmin.maintenanceWorkOrder.maintenanceWorkOrderItemModal')
<div class="pt-6">
    <div class="panel">
        <form action="{{ url('maintenance-admin/submit-maintenance-work-order/id='.$maintenance_request->h3_request_code) }} " method="POST">
            @csrf
            <!-- Invoice -->
            <div class="max-w-full px-4 sm:px-6 lg:px-8 my-4 sm:my-10">
                <!-- Grid -->
                <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200 dark:border-gray-700">
                    <div>
                        <h2 class="text-2xl  text-gray-800 dark:text-gray-200">Maintenance Work Order</h2>
                    </div>
                </div>
                <!-- End Grid -->

                <!-- Grid -->
                <div class="grid md:grid-cols-2 gap-3">
                    <div>
                        <div class="grid space-y-3">
                            <dl class="grid sm:flex gap-x-3 text-sm items-center">
                                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                                    Request Code:
                                </dt>
                                <dd class="text-gray-800 dark:text-gray-200">
                                    <span class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800/30 dark:text-blue-500">#
                                        {{$maintenance_request->h3_request_code}}</span>
                                </dd>
                            </dl>

                            <dl class="grid sm:flex gap-x-3 text-sm">
                                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                                    Room Number:
                                </dt>
                                <dd class="font-medium text-gray-800 dark:text-gray-200">
                                    <span class="block font-semibold">{{$maintenance_request->h3_room_no}}</span>
                                    <input type="hidden" id="room_no" name="room_no" readonly value="{{$maintenance_request->h3_room_no}}" class="ml-2 w-[50vh] rounded-lg border-[1px] border-stroke bg-transparent px-5 py-3 text-sm text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:text-white dark:focus:border-primary" />
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <!-- Col -->

                    <div>
                        <div class="grid space-y-3">
                            <dl class="grid sm:flex gap-x-3 text-sm items-center">
                                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                                    Status:
                                </dt>
                                <dd class="text-gray-800 dark:text-gray-200">
                                    @php
                                    $today_date = Carbon\Carbon::now()->toDateString();
                                    @endphp
                                    @if($maintenance_request->h3_status == 'Work Order Created')
                                    <div class="py-2">
                                        <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                            <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            Task Already Created
                                        </span>
                                    </div>
                                    @elseif(\Carbon\Carbon::parse($maintenance_request->created_at)->toDateString() != $today_date)
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
                                </dd>
                            </dl>
                            <dl class="grid sm:flex gap-x-3 text-sm">
                                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                                    Scheduled time:
                                </dt>
                                <dd class="font-medium text-gray-800 dark:text-gray-200">
                                    <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                        <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                            <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z" />
                                            <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1" />
                                        </svg>
                                        @php
                                        $time = Carbon\Carbon::createFromFormat('H:i',
                                        $maintenance_request->h3_time_issue);

                                        $formattedTime = $time->format('h:i A');
                                        @endphp
                                        {{$formattedTime}}
                                    </span>
                                    <input type="hidden" id="time" name="scheduled_time" readonly value="{{$formattedTime}}" class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Staff Email" required>
                                </dd>
                            </dl>

                            <dl class="grid sm:flex gap-x-3 text-sm items-center">
                                <dt class="min-w-[150px] max-w-[200px] text-gray-500">
                                    Maintenance Staff:
                                </dt>
                                <dd class="font-medium text-gray-800 dark:text-gray-200">
                                    <div x-data="{ isOptionSelected: false }" class="relative dark:bg-form-input">
                                        <select name="maintenance_staff" class="form-select text-white-dark">
                                            <option selected disabled>Select Maintenance Staff...</option>
                                            @foreach($maintenance_staff as $staff)
                                            <option class="text-black dark:text-white-dark" value="{{$staff->user_code}}">
                                                {{$staff->name}} -
                                                {{$staff->role}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('maintenance_staff'))
                                        <span id="error" class="text-red-500 text-[13px]">*{{
                                                $errors->first('maintenance_staff')
                                                }}</span>
                                        @endif
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <!-- Col -->
                </div>
                <!-- End Grid -->

                <!--DESCRIPTION OF WORK -->
                <div class="mt-10">
                    <h4 class="text-xs font-semibold uppercase text-gray-800 dark:text-gray-200">DESCRIPTION
                        OF WORK</h4>
                </div>
                <div class="grid grid-cols-2 gap-2 mt-3">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="border overflow-hidden dark:border-gray-700">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                    Maintenance Request</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach(json_decode($maintenance_request->h3_maintenance_request) as $request)
                                            <tr class="bg-white border-b text-sm dark:bg-gray-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td scope="row" class="px-6 text-primary py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$request}}
                                                    <input type="hidden" value="{{$request}}" name="maintenance_request[]">
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
                <!--ADDITIONAL REQUESTS -->
                <div class="mt-10">
                    <h4 class="text-xs font-semibold uppercase text-gray-800 dark:text-gray-200">ADDITIONAL REQUESTS</h4>
                </div>
                <div class="mt-3">
                    <textarea id="ctnTextarea" rows="3" class="form-textarea" value="{{$maintenance_request->h3_additional_request}}" name="additional_requests">{{$maintenance_request->h3_additional_request}}</textarea>
                </div>
            </div>


            <div class="flex justify-between items-center mt-6 mx-8">
                <h4 class="relative top-3 text-xs font-semibold uppercase text-gray-800 dark:text-gray-200">
                    ITEMS NEEDED</h4>
                <button data-hs-overlay="#addCart" class="btn btn-primary" type="button">
                    Add Items
                </button>
            </div>
            <!-- Table -->
            <div class="flex flex-col mx-8 mt-3">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            ITEM</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            CATEGORY</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            QTY</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class=" divide-gray-200 dark:divide-gray-700">
                                @forelse($maintenance_added_cart as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                        {{$item->maintenanceInventory->h3_item_name}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                         {{$item->maintenanceInventory->h3_category}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                         {{$item->h3_quantity}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            <a href="" class="text-red-700 ">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 text-end">
                                            No items added
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">

                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">

                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Table -->

            <div class="flex justify-end mt-6 mx-8">
                <button class="btn btn-success" type="submit">
                    Create Work Order
                </button>
            </div>
    </div>
    <!-- End Invoice -->

    </form>
</div>
<script>
    const errorHide = document.getElementById('error');

    setTimeout(() => {
        errorHide.classList.add('hidden');
    }, 7000);
</script>


@endsection