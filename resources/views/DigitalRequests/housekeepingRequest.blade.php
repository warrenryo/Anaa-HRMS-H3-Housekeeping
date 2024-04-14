@extends('layouts.digitalRequestLayout.digitalRequest')

@section('content')
@section('title', 'Housekeeping Request')
<div class="relative overflow-hidden">
    <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">
        <div class="bg-gradient-to-r from-violet-300/50 to-purple-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem] dark:from-violet-900/50 dark:to-purple-900"></div>
        <div class="bg-gradient-to-r from-[#DFBA86] to-[#9C603B] dark:from-[#DFBA86] dark:from-[#6C4121] blur-3xl w-[90rem] h-[50rem] rounded-fulls origin-top-left -rotate-20 -translate-x-[4rem] "></div>
    </div>
    <!-- Hire Us -->
    <div class="max-w-[85rem] relative top-10 z-99 px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid md:grid-cols-2 items-center gap-12">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 sm:text-4xl lg:text-5xl lg:leading-tight dark:text-white">
                    Housekeeping Request
                </h1>
                <p class="mt-1 md:text-lg text-gray-800 dark:text-gray-200">
                    We make homes and spaces neat and clean. Our team is good at organizing and cleaning up. We can tidy your living room or make your workspace look nice. We focus on details and do more than just clean – we make your place feel comfortable and good.
                </p>

                <div class="mt-8">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                        What can you expect?
                    </h2>

                    <ul class="mt-2 space-y-2">
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 mt-0.5 size-5 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-400">
                                Comprehensive Cleaning
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 mt-0.5 size-5 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-400">
                                Timely and Reliable
                            </span>
                        </li>

                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 mt-0.5 size-5 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-400">
                                Flexible Options
                            </span>
                        </li>
                    </ul>
                </div>

                <!-- Brands -->
                <div class="mt-8">

                    <div class="mt-4 flex items-center gap-x-8">
                        <div class="flex items-center">
                            <img src="{{ asset('img/NEWLOGO.png') }}" class="w-12" alt="">
                            <h1 class="font-bold text-gray-500 ml-2 relative top-1">ANAA</h1>
                        </div>

                        <svg class="py-3 lg:py-5 w-16 h-auto md:w-20 lg:w-24 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 151 32">
                            <path d="M.7 7.6v7.6h15.1V0H.7v7.6ZM17.4 0v15.2h15.1V0H17.4ZM139.3 5.1a5 5 0 0 0-3 2.2c-.6 1-.8 1.8-.8 3.2v1.3h-2.2v1.4l-.1 1.3h2.3v11.1h3.3V14.5h4.8V18c0 4.2.1 5 .6 6 .4.9 1.1 1.5 2 1.7a8 8 0 0 0 3.2 0l.7-.3v-2.6l-.6.2c-1 .4-2 .2-2.4-.6-.1-.3-.2-.8-.2-4.2v-3.7h3.2v-2.7H147v-4h-.3l-1.7.6-1.3.4v3.1h-2.4l-2.4-.1v-1.4c0-1.5.2-2 .9-2.4.4-.3 1.4-.4 2-.1l.6.1V6.7c0-1.2 0-1.4-.2-1.5-.3-.1-2.3-.2-2.8 0ZM66.6 6.3c-.6.4-1 .9-1 1.6 0 1.1 1 1.9 2.2 1.8 1-.1 1.7-.8 1.7-1.8 0-.7-.2-1.1-.9-1.6-.5-.3-1.5-.3-2 0ZM42.1 16v9.6h3.2V10.9l3 7.3 3 7.4h2.3l2.9-7.4 3-7.3v14.7h3.3V6.4h-4.5L55.6 13l-2.9 7-.2.6-1-2.6-2.8-7-1.8-4.6H42V16ZM76.8 11.7a6.8 6.8 0 0 0-5 4.7c-.4 1-.5 3.3-.2 4.4a6.8 6.8 0 0 0 3.2 4.3c1.8 1 4.5 1 6.5.2l.7-.2v-3l-.7.4c-2 1-4.1.9-5.4-.5-1-1-1.3-2.4-1-4.1a4 4 0 0 1 2.4-3.4 5 5 0 0 1 4.3.5l.5.3v-3.1l-.8-.3c-1-.3-3.4-.4-4.5-.2ZM90.7 11.7c-1.1.2-2 .8-2.6 2l-.3.5v-2.4h-3.2v13.8h3.2V17l.4-.7c.5-1 1-1.6 2-1.8a4 4 0 0 1 2 .3l.4.2v-1.6c0-1.1 0-1.6-.2-1.7a4 4 0 0 0-1.7-.1ZM98 11.7a6.4 6.4 0 0 0-5 5c-.3 1-.3 3.1 0 4.3.5 2.3 2.3 4 4.6 4.7 1 .2 3 .2 4.1 0 2.1-.6 3.8-2 4.5-4 .5-1.1.7-2.4.6-3.7a6.6 6.6 0 0 0-1.9-4.6c-.7-.8-1.3-1.1-2.4-1.5-.9-.3-3.5-.4-4.5-.2Zm3.4 2.8c.8.4 1.5 1.2 1.8 2 .1.6.2 1 .2 2.3 0 1.4 0 1.7-.3 2.3-.3.8-.8 1.4-1.6 1.8-.5.2-.7.3-1.6.3-1.2 0-1.8-.2-2.5-.8-1.1-1-1.6-3.2-1.2-5.2.4-1.4 1-2.2 2-2.7.9-.4 2.4-.4 3.2 0ZM111.8 11.7a4.9 4.9 0 0 0-3.1 2.5c-.4.8-.4 2.4 0 3.3.5 1 1 1.4 3 2.4L114 21c.3.3.4 1.2.1 1.6-.7 1-3.1 1-5-.2l-.7-.4V25l.5.2c1.3.5 3.8.7 5.1.3a4.6 4.6 0 0 0 3.2-2.3c.2-.5.3-.8.3-1.7 0-1 0-1.2-.3-1.6-.6-1-1.3-1.7-3.4-2.6-1.5-.7-2-1-2-1.7-.3-1.6 2.1-2.1 4.5-1l.6.4v-1.5l-.1-1.5-.7-.2a11 11 0 0 0-4.2-.2ZM124 11.8c-1.7.4-3.2 1.4-4 2.7a9 9 0 0 0-.6 7.3c1 2.8 4 4.4 7.4 4 1.9-.2 3-.7 4.1-2 1.5-1.3 2-2.8 2-5.2 0-2.4-.5-4-1.8-5.2a5.6 5.6 0 0 0-2.9-1.6c-1.1-.3-3.1-.3-4.3 0Zm3.7 2.8c.6.3 1.2 1 1.6 1.8.2.6.2 1 .2 2.2 0 2.4-.5 3.5-1.8 4.2-.6.3-.8.4-1.7.4-1.3 0-2-.3-2.7-1-.8-1-1-1.7-1-3.4 0-2.3.5-3.5 2-4.2.6-.4.7-.4 1.8-.3.8 0 1.2 0 1.6.3ZM66 18.7v6.9h3.2V11.9h-1.6l-1.7-.1v6.9ZM.7 24.4V32h15.1V16.8H.7v7.6ZM17.4 24.4v7.5H25l7.5.1V16.8H17.4v7.6Z" fill="currentColor" />
                        </svg>
                    </div>
                </div>
                <!-- End Brands -->


            </div>
            <!-- End Col -->

            <div class="relative mb-4 md:mb-0">
                <!-- Card -->
                <div class="flex panel flex-col border rounded-xl p-4 sm:p-6 lg:p-10 dark:border-gray-700">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        Fill in the form
                    </h2>

                    <form action="{{ url('submit-housekeeping-request') }}" method="POST" id="form">
                        @csrf
                        <div class="mt-6 grid gap-4 lg:gap-6">
                            <!-- Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                                <div>
                                    <div>
                                        <label for="room_no" class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Room Number</label>
                                        <input id="ctnEmail" type="email" name="room_no" value="{{$user->guestRooms->room_no}}" readonly class="form-input form-input-lg text-white-dark" required />
                                    </div>
                                </div>
                                <div>
                                    <label for="room_no" class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">What time?</label>
                                    <input name="time_issue" min="{{ now()->addMinutes(20)->format('H:i') }}" value="{{ now()->addMinutes(20)->format('H:i') }}" class="dark:border-[#17263c] dark:bg-[#121e32] dark:text-white-dark dark:focus:border-primary border-gray-300 rounded-md py-2.5 focus:border-primary" type="time">
                                    <p class="text-xs text-gray-500 mt-2">Note: Please wait 30mins maximum for your requests</p>
                                </div>

                            </div>
                            <!-- End Grid -->

                            <div>


                                <div class="grid grid-cols-2 ">
                                    <div class="w-[25vh]">
                                        <label for="hs-work-email-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Housekeeping Request</label>
                                        <label class="inline-flex mt-4">
                                            <input type="checkbox" name="housekeeping_request[]" value="Cleaning Bathrooms" class="form-checkbox text-info rounded-full peer" />
                                            <span class="peer-checked:text-info dark:text-gray-400 text-sm font-medium">Cleaning Bathrooms</span>
                                        </label>

                                        <label class="inline-flex mt-2">
                                            <input type="checkbox" name="housekeeping_request[]" value="Dispose Trash" class="form-checkbox text-info rounded-full peer" />
                                            <span class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Dispose Trash</span>
                                        </label>
                                        <label class="inline-flex mt-2">
                                            <input type="checkbox" name="housekeeping_request[]" value="Dusting and Vacuuming" class="form-checkbox text-info rounded-full peer" />
                                            <span class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Dusting and Vacuuming</span>
                                        </label>
                                        <label class="inline-flex mt-2">
                                            <input type="checkbox" name="housekeeping_request[]" value="Sweeping and Mopping Floors" class="form-checkbox text-info rounded-full peer" />
                                            <span class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Sweeping and Mopping Floors</span>
                                        </label>
                                        <label class="inline-flex mt-2">
                                            <input type="checkbox" name="housekeeping_request[]" value="Linen Change" class="form-checkbox text-info rounded-full peer" />
                                            <span class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Linen Change</span>
                                        </label>
                                    </div>
                                    <div class="w-[22vh]">
                                        <label for="hs-work-email-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Items & Services</label>
                                        <label class="inline-flex">
                                            <label class="inline-flex mt-4">
                                                <input type="checkbox" name="items_services[]" value="Laundry Services" class="form-checkbox text-info rounded-full peer" />
                                                <span class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Laundry Services</span>
                                            </label>
                                        </label>
                                        <label class="inline-flex">
                                            <label class="inline-flex mt-1">
                                                <input type="checkbox" name="items_services[]" value="Amenities Refill" class="form-checkbox text-info rounded-full peer" />
                                                <span class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Amenities Refill</span>
                                            </label>
                                        </label>
                                        <label class="inline-flex">
                                            <label class="inline-flex mt-1">
                                                <input type="checkbox" name="items_services[]" value="Extra Blankets" class="form-checkbox text-info rounded-full peer" />
                                                <span class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Extra Blankets</span>
                                            </label>
                                        </label>
                                        <label class="inline-flex">
                                            <label class="inline-flex mt-1">
                                                <input type="checkbox" name="items_services[]" value="Extra Pillows" class="form-checkbox text-info rounded-full peer" />
                                                <span class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Extra Pillows</span>
                                            </label>
                                        </label>
                                        <label class="inline-flex">
                                            <label class="inline-flex mt-1">
                                                <input type="checkbox" name="items_services[]" value="Extra Towels" class="form-checkbox text-info rounded-full peer" />
                                                <span class="dark:text-gray-400 peer-checked:text-info text-sm font-medium">Extra Towels</span>
                                            </label>
                                        </label>
                                    </div>

                                </div>

                            </div>

                            <div>
                                <label for="hs-about-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium dark:text-white">Additional Request</label>
                                <textarea id="hs-about-hire-us-1" name="additional_request" rows="4" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"></textarea>
                            </div>
                        </div>
                        <!-- End Grid -->

                        <!-- Checkbox -->
                        <div class="mt-3 flex">
                            <label class="inline-flex">
                                <input type="checkbox" id="privacy_policy" class="form-checkbox" />
                                <span class="dark:text-white-light text-sm font-medium">By submitting this form I have read and acknowledged the <a class="text-blue-600 decoration-2 hover:underline font-medium" href="#">Privacy policy</a></span>
                            </label>

                        </div>
                        <div>
                            <p id="errorMsg" class="text-danger text-sm hidden ml-6">* You haven't accept or read the Privacy Policy yet.</p>
                        </div>
                        <!-- End Checkbox -->

                        <div class="mt-6 grid">
                            <button type="submit" class="btn btn-primary">Submit Request</button>
                        </div>
                    </form>

                    <div class="mt-3 text-center">
                        <p class="text-sm text-gray-500">
                            We'll get back to you as soon as possible.
                        </p>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Hire Us -->
</div>
<script>
    const privacyBtn = document.getElementById('privacy_policy');
    const form = document.getElementById('form');

    form.addEventListener('submit', function(event) {
        if (!privacyBtn.checked) {
            document.getElementById('errorMsg').classList.remove('hidden');
            event.preventDefault();
        }
    });
</script>

@endsection