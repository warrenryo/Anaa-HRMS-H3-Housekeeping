@extends('logistic.logisticLayout.logisticIndex')

@section('content')
@section('title', 'BBOX EXPRESS Logistics')
<div class="panel xl:mx-[30vh]">
    <div class="table-responsive mt-4">
        <table class="table-hover">
            <thead>
                <tr>
                    <th class="text-xs">CONSUMER</th>
                    <th class="text-xs">CATEGORY</th>
                    <th class="text-xs">ITEM NAME</th>
                    <th class="text-xs">QUANTITY</th>
                    <th class="text-xs">STATUS</th>
                    <th class="text-center text-xs">ACTION</th>

                </tr>
            </thead>
            <tbody>
                @foreach($reorder as $order)
                <tr>
                    <td class="whitespace-nowrap">
                        {{$order->consumer}}
                    </td>
                    <td class="whitespace-nowrap">
                        {{$order->category}}
                    </td>
                    <td class="whitespace-nowrap">
                        {{$order->item_name}}
                    </td>
                    <td class="whitespace-nowrap">
                        <span class="badge bg-primary rounded-full">{{$order->quantity}}</span>
                    </td>
                    <td class="whitespace-nowrap">
                        @if($order->status == 'Pending')
                        <div class="text-center">
                            <div class="flex items-center ">
                                <div class="mr-4 animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
                                    <span class="sr-only">Loading...</span>
                                </div> Pending Order
                            </div>
                        </div>
                        @endif
                    </td>
                    <td class="flex items-center justify-center">
                        <button id="loading" type="button" class="hidden btn btn-info">
                            <div class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-white rounded-full dark:text-blue-500" role="status" aria-label="loading">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <span class="ml-2">Loading...</span>
                        </button>

                        <a href="{{ url('approve/id='.$order->id) }}" class="btn btn-info" id="approve">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.0303 10.0303C16.3232 9.73744 16.3232 9.26256 16.0303 8.96967C15.7374 8.67678 15.2626 8.67678 14.9697 8.96967L10.5 13.4393L9.03033 11.9697C8.73744 11.6768 8.26256 11.6768 7.96967 11.9697C7.67678 12.2626 7.67678 12.7374 7.96967 13.0303L9.96967 15.0303C10.2626 15.3232 10.7374 15.3232 11.0303 15.0303L16.0303 10.0303Z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z" fill="currentColor" />
                            </svg>

                            <span class="ml-2">Approve</span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    const loading = document.getElementById('loading');
    const approve = document.getElementById('approve');

    approve.addEventListener('click', function(){
        loading.classList.remove('hidden');
        approve.classList.add('hidden');
        setTimeout(() => {
            approve.click();
        }, 3000);
    })
</script>
@endsection