@extends('layouts.InventoryLayout.inventory')

@section('content')
@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Inventory Category Edit') }}
</h2>
@endsection

<div class="py-12">
    <div class="max-w-screen sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-4 md:p-5 space-y-4">
                    <form action="{{ url('inventory-admin/update-h-category/id='.$h_category_id->id) }}" method="POST" class="max-w-sm mx-auto">
                        @csrf
                        @method('PUT')
                        <div class="mb-5">
                            <label for="hcategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Housekeeping Category
                            </label>
                            <input type="text" id="hcategory" value="{{$h_category_id->h3_h_category}}" name="hCategory"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Enter Category" required>
                        </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    <button data-modal-hide="addCategory" type="button"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection