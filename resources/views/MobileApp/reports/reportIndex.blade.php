@extends('layouts.mobileApp.mobileApp')

@section('content')

<ul class="flex space-x-2 rtl:space-x-reverse">
    <li>
        <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
    </li>
    <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
        <span>Create Report</span>
    </li>
</ul>
<div class="panel mt-4">
    <div>
        <h1 class="text-xl mb-6">Create a Report</h1>
    </div>
    <form action="{{ url('housekeeper/submit-report') }}" method="POST">
        @csrf
        <div>
            <div class="max-w-sm">
                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Housekeeper</label>
                <input type="text" name="housekeeper" id="input-label" value="{{ $user->name }}" readonly class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                @error('housekeeper')
                <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4 max-w-sm">
                <label for="input-label" class="block text-sm font-medium mb-2 dark:text-white">Report Type</label>
                <select name="report_type" required class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option selected disabled>Select Report Type</option>
                    <option value="Lost Key Report">Lost Key Report</option>
                    <option value="Lost and Found Report">Lost and Found Report</option>
                    <option value="Maintenance Report">Maintenance Report</option>
                    <option value="Others">Others</option>
                </select>
                @error('report_type')
                <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="max-w-sm mt-4">
                <label for="textarea-label" class="block text-sm font-medium mb-2 dark:text-white">Specify Report</label>
                <textarea name="specify" id="textarea-label" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="3" placeholder="Specify your report here"></textarea>
            </div>

        </div>
        <div class="flex justify-end mt-4">
            <div x-data="modal">
                <!-- button -->
                <div class="flex items-center justify-center">
                    <button type="button" class="btn btn-primary" @click="toggle">Submit</button>
                </div>

                <!-- modal -->
                <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                    <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                            <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                <button type="button" class="text-white-dark hover:text-dark" @click="toggle">
                                </button>
                            </div>
                            <div class="p-5">
                                <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                    <div class="flex items-center justify-center">
                                        <img src="{{ asset('img/animatedIcons/check.gif') }}" class="w-[16vh]" alt="">
                                    </div>
                                    <p class="text-center mt-4">Are you sure you want to submit this report to Admin?</p>
                                </div>
                                <div class="flex justify-center items-center mt-8">
                                    <button type="button" class="btn btn-outline-danger" @click="toggle">Cancel</button>
                                    <button type="submit" class="btn btn-success ltr:ml-4 rtl:mr-4">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
</div>
@endsection