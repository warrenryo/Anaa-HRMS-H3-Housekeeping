@extends('layouts.doorLockLayout.doorLock')

<title>Door Key Lists</title>
@section('content')
@section('header')

{{ __('Door Key Lists') }}

@endsection

<div class="">
    <div class="max-w-screen sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-boxdark overflow-hidden shadow-md sm:rounded-md">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <div class="relative overflow-x-auto sm:rounded-sm">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Door Key UID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Room Number
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($door_keys as $doorKey)
                            <tr
                                class="bg-white border-b dark:bg-boxdark dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$doorKey->id}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$doorKey->h3_door_key_uid}}
                                </td>
                                <td class="px-6 py-4">
                                    @if($doorKey->h3_room_no == null)

                                    <!-- Modal toggle -->
                                    <button data-modal-target="default-modal{{$doorKey->id}}"
                                        data-modal-toggle="default-modal{{$doorKey->id}}"
                                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Assign Room
                                    </button>
                                    @include('DoorLockAdmin.doorKeyLists.door_key_modal')
                                    @else
                                    {{$doorKey->h3_room_no}}
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($doorKey->h3_room_no == null)

                                    <button disabled value="" class="cursor-not-allowed deleteBtn ml-4 text-blue-700 dark:text-blue-500">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    @else
                                    @include('DoorLockAdmin.doorKeyLists.door_key_modal')
                                    <button data-modal-target="edit-door-key{{$doorKey->id}}"
                                        data-modal-toggle="edit-door-key{{$doorKey->id}}" value=""
                                        class="deleteBtn ml-4 text-blue-700 dark:text-blue-500">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    @endif
                                    <button data-modal-target="delete-door-key{{$doorKey->id}}"
                                        data-modal-toggle="delete-door-key{{$doorKey->id}}" value=""
                                        class="deleteBtn ml-4 text-red-700 dark:text-red-600">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
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


@endsection