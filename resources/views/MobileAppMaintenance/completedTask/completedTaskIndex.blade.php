@extends('layouts.mobileApp.mobileApp')

@section('content')
<div class="panel flex-1 overflow-auto h-full">
    <div class="min-h-[200px] sm:min-h-[100px]">
        <div class="grid 2xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-5">

            @forelse($work_order as $task)
            @include('MobileAppMaintenance.workOrder.workOrderModal')
            <div data-hs-overlay="#view-details{{$task->id}}" class="panel @if($task->h3_status == 'Pending') bg-warning-light shadow-warning @elseif($task->h3_status == 'In-Progress') bg-primary-light shadow-primary @else bg-success-light shadow-success @endif pb-12">
                <div class="min-h-[142px]">
                    <div class="flex justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="">
                                <div class="font-semibold">{{$task->h3_maintenance_staff_code}}</div>
                                <div class="text-xs text-white-dark">created by Admin {{$task->created_at->diffForHumans()}}</div>
                            </div>
                        </div>

                    </div>
                    @if($task->h3_status == 'Completed')
                    <div>
                        <h4 class="font-semibold mt-4">Task Completed</h4>
                        <p class="text-white-dark mt-2"> Completed Time:
                            <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                <svg class="flex-shrink-0 w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                    <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z" />
                                    <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1" />
                                </svg>
                                {{$task->updated_at->format('g:i a')}}
                            </span>
                        </p>
                    </div>
                    @else
                    <div>
                        <h4 class="font-semibold mt-4">Room {{$task->h3_room_no}}</h4>
                        <p class="text-white-dark mt-2"> Scheduled Time:
                            <span class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                <svg class="flex-shrink-0 w-3 h-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                                    <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9z" />
                                    <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1zm1.038 3.018a6 6 0 0 1 .924 0 6 6 0 1 1-.924 0M0 3.5c0 .753.333 1.429.86 1.887A8.04 8.04 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5M13.5 1c-.753 0-1.429.333-1.887.86a8.04 8.04 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1" />
                                </svg>
                                {{$task->h3_scheduled_time}}
                            </span>
                        </p>
                    </div>
                    @endif
                    <div class="mt-2">
                        <p class="text-white-dark"></p>
                    </div>
                </div>
            </div>
            @empty
            <div class="flex justify-center place-items-center items-center sm:min-h-[300px] min-h-[400px] font-semibold text-lg h-full">
                No Work Order Available
            </div>
            @endforelse
        </div>

    </div>
    <div class="mt-8">
        {{$work_order->links()}}
    </div>
</div>
@endsection