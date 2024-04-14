<x-app-layout>
<ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ url('HousekeepingAdmin/dashboard') }}" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Door Logs Room {{$room_no}}</span>
        </li>
    </ul>
    <div class="panel mt-6">
    <div class="mb-5">
            <div class="table-responsive">
                <table class="table-hover">
                    <thead>
                        <tr>
                            <th class="text-xs">DOOR KEY UID</th>
                            <th class="text-xs">ROOM NUMBER</th>
                            <th class="text-xs">ACCESSED USER</th>
                            <th class="text-xs">RELATIVE TIME</th>
                            <th class="text-xs">TIMESTAMP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                        <tr>
                            <td>
                                {{$log->key_UID}}
                            </td>
                            <td>
                                {{$log->room_no}}
                            </td>
                            <td>
                                {{$log->doorUsers->key_user}}
                            </td>
                            <td>
                                {{$log->created_at->diffForHumans()}}
                            </td>
                            <td>
                                {{$log->created_at->format('F j, Y g:i A')}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">

            </div>
        </div>
    </div>
</x-app-layout>