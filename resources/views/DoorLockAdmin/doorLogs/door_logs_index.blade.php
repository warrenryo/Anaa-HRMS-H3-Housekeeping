@extends('layouts.doorLockLayout.doorLock')

<title>Door Logs</title>
@section('content')
@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Door Logs') }}
</h2>
@endsection

<div class="">
    <div class="max-w-screen sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="grid grid-cols-4 gap-4">
                    @foreach($door_key as $doorKey)
                    <div class="bg-white shadow-lg rounded-lg dark:bg-boxdark">
                        <h1 class="font-semibold text-center py-2 px-4 mt-4">{{$doorKey->h3_room_no}}</h1>
                        <div class="flex justify-center py-2 mb-2">
                            <button data-modal-target="default-modal{{$doorKey->id}}"
                                data-modal-toggle="default-modal{{$doorKey->id}}"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                View Logs
                            </button>
                        </div>
                        @include('DoorLockAdmin.doorLogs.door_logs_modal')
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection