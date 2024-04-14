
<x-app-layout>
    @section('title', 'Inventory List')
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
                                    {{$h_inventory_category->count()}}
                                </span>
                            </button>
                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-[12rem] z-10 bg-white shadow-md rounded-lg mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700"
                                aria-labelledby="hs-as-table-table-filter-dropdown">
                                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($h_inventory_category as $category)
                                    <label for="{{$category->id}}" class="flex py-2.5 px-3">
                                        <input type="checkbox" name="filter_category[]"
                                            value="{{$category->h3_h_category}}" {{ in_array($category->h3_h_category,
                                        Request::get('filter_category', [])) ? 'checked' : '' }}
                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500
                                        disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900
                                        dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500
                                        dark:focus:ring-offset-gray-800"
                                        id="{{$category->id}}">
                                        <span
                                            class="ms-3 text-sm text-gray-800 dark:text-gray-200">{{$category->h3_h_category}}</span>
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

                <script src="/assets/js/simple-datatables.js"></script>

                <div x-data="sorting">
                    <div class="panel">
                        <h5 class="md:absolute md:top-[25px] md:mb-0 mb-5 font-semibold text-lg dark:text-white-light">
                            Order Sorting
                        </h5>
                        <table id="myTable" class="whitespace-nowrap table-hover"></table>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script>
        var inventory = {!! $inventory !!};

        const items = [];
        const qty = [];

        inventory.forEach(function (val) {
            items.push(val.h3_item_name);
            qty.push(val.h3_quantity);
        });


        document.addEventListener("alpine:init", () => {
            Alpine.data("sorting", () => ({
                datatable: null,
                init() {
                    const dataRows = inventory.map(function (val) {
                        return [val.id, val.h3_item_name, val.h3_quantity, /* add more fields if needed */];
                    });
                    this.datatable = new simpleDatatables.DataTable('#myTable', {
                        data: {
                            headings:  ["ID", "Item Name", "Quantity", /* add more headings if needed */],
                            data: dataRows,
                            
                        },
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                            select: 0,
                            sort: "asc"
                        },],
                        firstLast: true,
                        firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        labels: {
                            perPage: "{select}"
                        },
                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        },
                    })
                }
            }));
        });
    </script>
</x-app-layout>