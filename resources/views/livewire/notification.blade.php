<div>
    @forelse($user->unreadNotifications as $notification)
    @if($notification->created_at->format('m-d-y') == $date)

    <div class="">
        <li>
            <a class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 bg-[#F7F9FC]  dark:border-boxdark dark:bg-meta-4 dark:bg-boxdark"
                href="{{ url('markUnread'.$notification->id) }}">
                <p class="text-sm">
                    <span class="text-black dark:text-white">
                        <span class="text-blue-700 dark:text-blue-400"># {{$notification->data['code']}} - {{$notification->data['room_no']}} </span>
                        has requested Housekeeping
                    </span>

                </p>
                <div class="flex items-center justify-between">
                    <span class="text-[11px] dark:text-gray-400">{{$notification->created_at->diffForHumans()}}</span>
                    <span
                        class="inline-flex text-[10px] rounded-full bg-success bg-opacity-10 px-3 py-1 text-success dark:bg-green-200">New</span>
                </div>

            </a>
        </li>
    </div>
    @else
    <div class="">
        <li>
            <a class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 bg-[#F7F9FC]  dark:border-boxdark dark:bg-meta-4 dark:bg-boxdark"
                href="{{ url('markUnread'.$notification->id) }}">
                <p class="text-sm">
                    <span class="text-black dark:text-white">
                        <span class="text-blue-700 dark:text-blue-400"># {{$notification->data['code']}} - {{$notification->data['room_no']}} </span>
                        has requested Housekeeping
                    </span>

                </p>
                <div class="flex items-center justify-between">
                    <span class="text-[11px] dark:text-gray-400">{{$notification->created_at->diffForHumans()}}</span>
                    <span
                        class="inline-flex text-[10px] rounded-full bg-success bg-opacity-10 px-3 py-1 text-success dark:bg-green-200">{{$notification->created_at->format('F j, Y g:i A')}}</span>
                </div>

            </a>
        </li>
    </div>
    @endif
    @empty
    <!--<p class="text-[10px] text-gray-400 text-center py-6">No Unread Notifications yet</p>-->
    @endforelse
    <!--<div class="mt-2 relative flex py-2 px-2 items-center">
        <div class="flex-grow border-t border-gray-400"></div>
        <span class="flex-shrink mx-4 text-[12px] text-gray-400">Recent Notifications</span>
        <div class="flex-grow border-t border-gray-400"></div>
    </div>-->

    @forelse($user->readNotifications as $notification)
    <li>
        <a class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 hover:bg-[#F7F9FC]  dark:border-boxdark dark:bg-meta-4 dark:bg-boxdark"
            href="{{ url('markUnread'.$notification->id) }}">
            <p class="text-sm">
                <span class="text-black dark:text-white">
                    <span class="text-blue-700 dark:text-blue-400"># {{$notification->data['code']}} - {{$notification->data['room_no']}} </span>
                    has requested Housekeeping
                </span>

            </p>
            <div class="flex items-center justify-between">
                <span class="text-[11px] dark:text-gray-400">{{$notification->created_at->diffForHumans()}}</span>
                <span
                    class="inline-flex text-[10px] rounded-full bg-gray-500 bg-opacity-10 px-3 py-1 text-success dark:text-white dark:bg-gray-500"><i
                        class="lni lni-checkmark"></i></span>
            </div>

        </a>
    </li>
    @empty
    <p class="text-[10px] text-gray-400 text-center py-6">No Recent Notifications yet</p>
    @endforelse
</div>