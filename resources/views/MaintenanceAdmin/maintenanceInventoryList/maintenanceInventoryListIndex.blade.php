@extends('layouts.maintenanceLayout.maintenance')


@section('content')
@section('title', 'Inventory')

<ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ url('HousekeepingAdmin/dashboard')}}" class="text-primary hover:underline">Dashboard</a>
        </li>
        <li class="before:content-['/'] before:mr-1 rtl:before:ml-1">
            <span>Items Lists</span>
        </li>
    </ul>

    <div class="pt-6">
        <div class="panel">
            <div class="mb-5">
                <form id="myForm" action="" method="GET" class="flex items-center justify-between">
                    <div class="sm:col-span-1">
                        <label for="hs-as-table-product-review-search" class="sr-only">Search Items</label>
                        <div class="relative">
                            <input type="text" id="hs-as-table-product-review-search" name="search_item"
                                value="{{ old('search_item', request('search_item')) }}"
                                class="py-2 px-3 ps-11 block w-70 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                                placeholder="Search Items">
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                                <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="hs-dropdown relative inline-block" data-hs-dropdown-auto-close="inside">
                            <button id="hs-as-table-table-filter-dropdown" type="button"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                <svg class="flex-shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 6h18" />
                                    <path d="M7 12h10" />
                                    <path d="M10 18h4" />
                                </svg>
                                Category
                                <span
                                    class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200 dark:border-gray-700 dark:text-blue-500">
                                    {{$m_inventory_category->count()}}
                                </span>
                            </button>
                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-[12rem] z-10 bg-white shadow-md rounded-lg mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700"
                                aria-labelledby="hs-as-table-table-filter-dropdown">
                                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($m_inventory_category as $category)
                                    <label for="{{$category->id}}" class="flex py-2.5 px-3">
                                        <input type="checkbox" name="filter_category[]"
                                            value="{{$category->h3_m_category}}" {{ in_array($category->h3_m_category,
                                        Request::get('filter_category', [])) ? 'checked' : '' }}
                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500
                                        disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900
                                        dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500
                                        dark:focus:ring-offset-gray-800"
                                        id="{{$category->id}}">
                                        <span
                                            class="ms-3 text-sm text-gray-800 dark:text-gray-200">{{$category->h3_m_category}}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="btn btn-primary relative top-[1px] py-2 px-4 inline-flex items-center text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-filter mr-2" viewBox="0 0 16 16">
                            <path
                                d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5" />
                        </svg>
                            Filter
                        </button>
                    </div>
                </form>
            </div>
            <div class="mb-5">
                <div class="table-responsive">
                    <table class="table-hover">
                        <thead>
                            <tr>
                                <th class="text-xs">CATEGORY</th>
                                <th class="text-xs">ITEM NAME</th>
                                <th class="text-xs">QUANTITY</th>
                        </thead>
                        <tbody>
                            @foreach($m_inventory_items as $item)
                            <tr>
                                <td>
                                    {{$item->h3_category}}
                                </td>
                                <td>
                                    {{$item->h3_item_name}}
                                </td>
                                <td>

                                    @if($item->h3_quantity > 0 && $item->h3_quantity <= 5) <span
                                        class="inline-flex rounded-full bg-warning bg-opacity-10 px-3 py-1 text-sm font-medium text-warning"">{{$item->h3_quantity}}</span>
                                            @elseif($item->h3_quantity == 0)
                                            <span class=" inline-flex rounded-full bg-danger bg-opacity-10 px-3 py-1
                                        text-sm font-medium text-danger">{{$item->h3_quantity}}</span>
                                        @else
                                        <span
                                            class="inline-flex rounded-full bg-success bg-opacity-10 px-3 py-1 text-sm font-medium text-success">{{$item->h3_quantity}}</span>
                                        @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{$m_inventory_items->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection