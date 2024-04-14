@extends('layouts.maintenanceLayout.maintenance')

<title>Maintenance Dashboard</title>
@section('content')
@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Dashboard') }}
</h2>
@endsection

<div class="py-12">
    <div class="max-w-screen sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ url('maintenance-admin/update-maintenance-staff/id='.$staff->id) }}" method="POST"
                    class="max-w-sm mx-auto mt-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <label for="staff_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Staff Name
                        </label>
                        <input type="text" id="staff_name" name="staff_name" value="{{$staff->h3_staff_name}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Staff Name" required>
                    </div>
                    <div class="mb-5">
                        <label for="staff_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Staff Email
                        </label>
                        <input type="text" id="staff_email" name="staff_email" value="{{$staff->h3_email}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Staff Email" required>
                    </div>
                    <div class="mb-5">
                        <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Position
                        </label>
                        <input type="text" id="position" name="staff_position" value="{{$staff->h3_position}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Enter Position" required>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                    <a href="{{ url('HousekeepingAdmin/housekeepingStaff') }}"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection