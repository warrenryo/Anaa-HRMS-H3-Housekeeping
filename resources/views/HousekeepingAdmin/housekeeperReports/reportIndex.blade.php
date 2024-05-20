<x-app-layout>
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ url('HousekeepingAdmin/dashboard')}}" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] before:mr-1 rtl:before:ml-1">
            <span>Housekeeper Reports</span>
        </li>
    </ul>
    <div class="panel mt-4">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Housekeeper Name</th>
                        <th>Report Type</th>
                        <th>Specified Report</th>
                        <th>Relative Time Created</th>
                        <th>Created at </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                        <tr>
                           <td>{{$report->h3_housekeeper}}</td>
                           <td><span class="badge bg-primary">{{$report->h3_report_type}}</span></td>
                           <td>{{$report->h3_specify}}</td>
                           <td>{{$report->created_at->diffForHumans()}}</td>
                           <td>{{$report->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>