<!-- Main modal -->
<div id="edit-staff{{$staffRow->id}}"
    class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-[#121c2c] dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                <h3 class="font-bold text-gray-800 dark:text-white">
                    Edit Staff # {{$staffRow->h3_staff_code}}
                </h3>
                <button type="button"
                    class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#edit-staff{{$staffRow->id}}">
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
                <form action="{{ url('HousekeepingAdmin/update-staff/id='.$staffRow->id) }}" method="POST"
                    class="p-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Name
                        </label>
                        <input id="name" type="text" placeholder="" value="{{$staffRow->h3_staffName}}" name="staff_name" class="form-input" required />
    
                    </div>
                    <div class="mb-5">
                        <label for="email" class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Email
                        </label>
                        <input id="email" class="form-input" type="text" placeholder="" name="staff_email" value="{{$staffRow->h3_email}}"
                            required />
                    
                    </div>
                    <div class="mb-5">
                        <label for="staffposition" class="mb-3 block text-sm font-medium text-black dark:text-white">
                            Position
                        </label>
                        <input id="staffposition" class="form-input" type="text" placeholder="" name="staff_position"
                            value="{{$staffRow->h3_position}}" required />
                
                    </div>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 dark:border-gray-700">
                <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#edit-staff{{$staffRow->id}}">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>



