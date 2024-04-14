<!-- Modal toggle -->
<div id="addStaff"
    class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                <h3 class="font-bold text-gray-800 dark:text-white">
                    Add Staff
                </h3>
                <button type="button"
                    class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#addStaff">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
            <div class="overflow-y-auto">
                <form action="{{ url('HousekeepingAdmin/add-staff') }}" method="POST" class="p-4">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Name
                        </label>
                        <input id="name" type="text" placeholder="Enter Name" name="staff_name" class="form-input" required />
                        
                    </div>
                    <div class="mb-5">
                        <label for="email" class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Email
                        </label>
                        <input id="email" type="text" placeholder="Enter Email" name="staff_email" class="form-input" required />
                        
                    </div>
                    <div class="mb-5">
                        <label for="staffposition" class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Position
                        </label>
                        <input id="staffposition" type="text" placeholder="Enter Position" name="staff_position"  class="form-input" required />
                        
                    </div>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 dark:border-gray-700">
                <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#addStaff">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>



<!--delete staff-->
<div id="delete-staff{{$staffRow->id}}"
    class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
        <div
            class="relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden dark:bg-gray-800 dark:border-gray-700">
            <div class="absolute top-2 end-2">
                <button type="button"
                    class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-transparent dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#delete-staff{{$staffRow->id}}">
                    <span class="sr-only">Close</span>
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>

            <div class="p-4 sm:p-10 overflow-y-auto">
                <div class="flex gap-x-4 md:gap-x-7">
                    <!-- Icon -->
                    <span
                        class="flex-shrink-0 inline-flex justify-center items-center w-[46px] h-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500 dark:bg-red-700 dark:border-red-600 dark:text-red-100">
                        <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                    </span>
                    <!-- End Icon -->
                    <form action="{{ url('HousekeepingAdmin/delete-staff/id='.$staffRow->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="grow">
                            <h3 class="text-left mb-2 text-xl font-bold text-gray-800 dark:text-gray-200">
                                Delete Staff # {{$staffRow->h3_staff_code}}
                            </h3>
                            <p class="text-left text-gray-500">
                                Permanently remove <span class="text-red-700">{{$staffRow->h3_staffName}}</span> and all of its contents from ANAA HOTEL Housekeeping. This action
                                is not reversible, so please continue with caution.
                            </p>
                        </div>
                </div>
            </div>

            <div
                class="flex justify-end items-center gap-x-2 py-3 px-4 dark:bg-gray-800 dark:border-gray-700">
                <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#delete-staff{{$staffRow->id}}">
                    Cancel
                </button>
                <button type="submit" class="btn btn-danger">
                    Delete Staff
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

