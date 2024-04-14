@extends('layouts.maintenanceLayout.maintenance')


@section('content')
@section('title', 'Maintenance Staff')
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ url('HousekeepingAdmin/dashboard')}}" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] before:mr-1 rtl:before:ml-1">
            <span>Housekeeping Requests</span>
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
                        <th>STAFF CODE</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>POSITION</th>
                        <!--<th class="text-center">ACTIONS</th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach($staff_lists as $staffRow)
                    <tr>
                        <td>{{$staffRow->user_code}}</td>
                        <td>{{$staffRow->name}}</td>
                        <td>{{$staffRow->email}}</td>
                        <td>{{$staffRow->role}}</td>
                        <!--<td class="">-->
                           @include('HousekeepingAdmin.housekeepingStaff.housekeepingStaffEdit')
                          <!--   <button data-hs-overlay="#edit-staff{{$staffRow->id}}"
                                class="text-success hover:animate-rotate" x-tooltip="Edit">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 text-success">
                                    <path
                                        d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path opacity="0.5"
                                        d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                        stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </button>-->
                            @include('HousekeepingAdmin.housekeepingStaff.housekeepingStaffModal')
                            <!--<button data-hs-overlay="#delete-staff{{$staffRow->id}}" type="button"
                                class="text-danger hover:animate-rotate" x-tooltip="Delete">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 m-auto">
                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path
                                        d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5"
                                        d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                        stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </button>-->
                        <!--</td>-->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection