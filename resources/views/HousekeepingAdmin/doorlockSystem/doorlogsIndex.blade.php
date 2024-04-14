<x-app-layout>
<ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ url('HousekeepingAdmin/dashboard') }}" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Door Logs</span>
        </li>
    </ul>
    <div class="panel mt-6">
        <div class="max-w-screen ">

            <div class=" text-gray-900 dark:text-gray-100">
                <div class="grid grid-cols-4 gap-4">
                    <div class="panel">
                        <h1 class="font-semibold text-center py-2 px-4 mt-4">Room 101</h1>
                        <div class="flex justify-center py-2 mb-2">
                            <a href="{{ url('HousekeepingAdmin/view-logs/'. 101) }}" class="btn btn-primary" type="button">
                                View Logs
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>