<div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Door Lock UID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Accessed
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Time Stamps
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$log->h3_doorLockUID}}
                    </th>
                    <td class="px-6 py-4">
                        {{$log->created_at->diffForHumans()}}
                    </td>
                    <td class="px-6 py-4">
                        {{$log->created_at->format('F j, Y g:i A')}}
                    </td>
                </tr>
                @empty 
                <tr>
                    <td class="p-10 text-center"></td>
                    <td class="p-10 text-center">No Data Found</td>
                </tr>
                
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
        {{$logs->links()}}
        </div>
   
    </div>
</div>