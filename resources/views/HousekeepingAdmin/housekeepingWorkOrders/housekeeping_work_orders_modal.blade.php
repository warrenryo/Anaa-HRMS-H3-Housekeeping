<!-- ADD ITEMS MODAL -->
<div id="addCart"
    class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center"">
    <div class=" flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800
        dark:border-gray-700 dark:shadow-slate-700/[.7]">
        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
            <h3 class="font-bold text-gray-800 dark:text-white">
                Add Items
            </h3>
            <button type="button"
                class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                data-hs-overlay="#addCart">
                <span class="sr-only">Close</span>
                <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </button>
        </div>
        <div class="p-4 overflow-y-auto">
            <div>
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search" name="item_search"
                        class="block w-[40vh] p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Items">
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3">
                <table id="data-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Item Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Select Quantity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="overflow-y-auto">
                        @foreach($inventory_items as $item)
                        <tr
                            class="bg-white border-b  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$item->id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$item->h3_category_name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$item->h3_item_name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$item->h3_quantity}} Items Left
                            </td>
                            <form
                                action="{{ url('HousekeepingAdmin/add-items-cart/'.$item->id.'/'.$h_request_id->h3_request_code) }}"
                                method="POST">
                                @csrf
                                <td class="px-6 py-4">
                                    <label for="number-input"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                                        Quantity:</label>
                                        
                                    <input type="number" id="number-input" aria-describedby="helper-text-explanation"
                                        value="{{ $item->h3_quantity > 0 ? 1 : 0 }}" max="{{$item->h3_quantity}}" name="quantity"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[15vh] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button
                                        class="btn btn-primary px-2">
                                        <i class="hover:animate-rotate fa-solid fa-plus"></i>
                                    </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
            <button type="button"
                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                data-hs-overlay="#addCart">
                Close
            </button>
        </div>
    </div>
</div>
</div>
<script>
    const search = document.getElementById('search');
    const dataTable = document.getElementById('data-table');
    const tableRow = document.getElementsByTagName('tr');

    search.addEventListener('keyup', function () {
        const searchValue = search.value.toLowerCase();

        for (let i = 1; i < tableRow.length; i++) {
            const rowData = tableRow[i].innerText.toLowerCase();

            if (rowData.includes(searchValue)) {
                tableRow[i].style.display = '';
            } else {
                tableRow[i].style.display = 'none';
            }
        }
    });

</script>