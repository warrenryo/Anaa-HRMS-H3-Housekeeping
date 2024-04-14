<aside :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="absolute left-0 top-0 z-30 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black2 duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
    @click.outside="sidebarToggle = false">
    <!-- SIDEBAR HEADER -->
    <div class="flex items-center justify-between gap-2 px-6 ">
        <a href="index.html">
            <!--<img src="./images/logo/logo.svg" alt="Logo" />-->
        </a>

        <button class="block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
            <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                    fill="" />
            </svg>
        </button>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
        <!-- Sidebar Menu -->
        <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6" x-data="{selected: $persist('Dashboard')}">
            <!-- Menu Group -->
            <div>
                <p class="mb-4 ml-4 text-sm font-medium text-bodydark2">MENU</p>

                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- Menu Item Dashboard -->
                    <li id="dashboard">
                        <a class="@if(request()->is('HousekeepingAdmin/dashboard')) bg-[#333A48] dark:bg-meta-4 @endif group relative flex items-center gap-2.5 rounded-sm px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-[#333A48] dark:hover:bg-meta-4"
                            href="{{ url('HousekeepingAdmin/dashboard') }}">
                            <span class="hover:translate-x-2 flex items-center pr-30 py-2 duration-300">
                                <i id="dashIcon" class="lni lni-grid-alt mr-2 text-xl"></i>

                                Dashboard
                            </span>
                        </a>
                    </li>
                    <!--HOUSEKEEPING STAFF -->
                    <li id="staff">
                        <a class="@if(request()->is('HousekeepingAdmin/housekeepingStaff')) bg-[#333A48] dark:bg-meta-4 @endif group relative flex items-center gap-2.5 rounded-sm px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-[#333A48] dark:hover:bg-meta-4"
                            href="{{ url('HousekeepingAdmin/housekeepingStaff') }}">
                            <span class="hover:translate-x-2 flex items-center pr-8 py-2 duration-300">
                                <i id="staffIcon" class="lni lni-users mr-2 text-xl"></i>

                                Housekeeping Staff
                            </span>
                        </a>
                    </li>
                    <!-- HOUSEKEEPING MENU -->
                    <h3 class="mb-4 mt-4 ml-4 text-sm font-medium text-bodydark2">HOUSEKEEPING</h3>
                    <li id="hrequest">
                        <a class="@if(request()->is('HousekeepingAdmin/housekeeping-request-list')) bg-[#333A48] dark:bg-meta-4 @endif group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-[#333A48] dark:hover:bg-meta-4"
                            href="{{ url('HousekeepingAdmin/housekeeping-request-list') }}">
                            <div class="hover:translate-x-2 flex items-center  duration-300">
                                <i id="hrequestIcon" class="lni lni-support mr-2 text-xl"></i>

                                Housekeeping Requests
                            </div>
                        </a>
                    </li>
                    <li id="progress">
                        <a class="@if(request()->is('HousekeepingAdmin/housekeeping-progress')) bg-[#333A48] dark:bg-meta-4 @endif group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-[#333A48] dark:hover:bg-meta-4"
                            href="{{ url('HousekeepingAdmin/housekeeping-progress') }}">
                            <div class="hover:translate-x-2 flex items-center pr-20 duration-300">
                                <i id="progressIcon" class="lni lni-timer mr-2 text-xl"></i>

                                Task Progress
                            </div>
                        </a>
                    </li>
                    <!-- Menu Item ROOM AND DOOR KEYS -->
                </ul>
            </div>

            <!-- Others Group -->
            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">HOUSEKEEPING INVENTORY</h3>

                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- Menu Item Chart -->
                    <li id="item">
                        <a class="@if(request()->is('HousekeepingAdmin/items-lists')) bg-[#333A48] dark:bg-meta-4 @endif group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-[#333A48] dark:hover:bg-meta-4"
                            href="{{ url('HousekeepingAdmin/items-lists') }}">
                            <div class="hover:translate-x-2 flex items-center  pr-36 duration-300">
                                <i id="itemIcon" class="lni lni-archive mr-2 text-xl"></i>

                                Items
                            </div>
                        </a>
                    </li>
                    <!-- Menu Item Chart -->
                </ul>
            </div>

            <div>
                <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">OTHERS</h3>

                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- Menu Item Chart -->
                    <li id="settings">
                        <a href="{{ route('profile.edit') }}"
                            class="@if(request()->is('profile.edit')) bg-[#333A48] dark:bg-meta-4 @endif group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-[#333A48] dark:hover:bg-meta-4">
                            <div class="hover:translate-x-2 flex items-center  pr-12 duration-300">
                                <svg id="settingsIcon" class="fill-current mr-2" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.8656 8.86874C20.5219 8.49062 20.0406 8.28437 19.525 8.28437H19.4219C19.25 8.28437 19.1125 8.18124 19.0781 8.04374C19.0437 7.90624 18.975 7.80312 18.9406 7.66562C18.8719 7.52812 18.9406 7.39062 19.0437 7.28749L19.1125 7.21874C19.4906 6.87499 19.6969 6.39374 19.6969 5.87812C19.6969 5.36249 19.525 4.88124 19.1469 4.50312L17.8062 3.12812C17.0844 2.37187 15.8469 2.33749 15.0906 3.09374L14.9875 3.16249C14.8844 3.26562 14.7125 3.29999 14.5406 3.23124C14.4031 3.16249 14.2656 3.09374 14.0937 3.05937C13.9219 2.99062 13.8187 2.85312 13.8187 2.71562V2.54374C13.8187 1.47812 12.9594 0.618744 11.8937 0.618744H9.96875C9.45312 0.618744 8.97187 0.824994 8.62812 1.16874C8.25 1.54687 8.07812 2.02812 8.07812 2.50937V2.64687C8.07812 2.78437 7.975 2.92187 7.8375 2.99062C7.76875 3.02499 7.73437 3.02499 7.66562 3.05937C7.52812 3.12812 7.35625 3.09374 7.25312 2.99062L7.18437 2.88749C6.84062 2.50937 6.35937 2.30312 5.84375 2.30312C5.32812 2.30312 4.84687 2.47499 4.46875 2.85312L3.09375 4.19374C2.3375 4.91562 2.30312 6.15312 3.05937 6.90937L3.12812 7.01249C3.23125 7.11562 3.26562 7.28749 3.19687 7.39062C3.12812 7.52812 3.09375 7.63124 3.025 7.76874C2.95625 7.90624 2.85312 7.97499 2.68125 7.97499H2.57812C2.0625 7.97499 1.58125 8.14687 1.20312 8.52499C0.824996 8.86874 0.618746 9.34999 0.618746 9.86562L0.584371 11.7906C0.549996 12.8562 1.40937 13.7156 2.475 13.75H2.57812C2.75 13.75 2.8875 13.8531 2.92187 13.9906C2.99062 14.0937 3.05937 14.1969 3.09375 14.3344C3.12812 14.4719 3.09375 14.6094 2.99062 14.7125L2.92187 14.7812C2.54375 15.125 2.3375 15.6062 2.3375 16.1219C2.3375 16.6375 2.50937 17.1187 2.8875 17.4969L4.22812 18.8719C4.95 19.6281 6.1875 19.6625 6.94375 18.9062L7.04687 18.8375C7.15 18.7344 7.32187 18.7 7.49375 18.7687C7.63125 18.8375 7.76875 18.9062 7.94062 18.9406C8.1125 19.0094 8.21562 19.1469 8.21562 19.2844V19.4219C8.21562 20.4875 9.075 21.3469 10.1406 21.3469H12.0656C13.1312 21.3469 13.9906 20.4875 13.9906 19.4219V19.2844C13.9906 19.1469 14.0937 19.0094 14.2312 18.9406C14.3 18.9062 14.3344 18.9062 14.4031 18.8719C14.575 18.8031 14.7125 18.8375 14.8156 18.9406L14.8844 19.0437C15.2281 19.4219 15.7094 19.6281 16.225 19.6281C16.7406 19.6281 17.2219 19.4562 17.6 19.0781L18.975 17.7375C19.7312 17.0156 19.7656 15.7781 19.0094 15.0219L18.9406 14.9187C18.8375 14.8156 18.8031 14.6437 18.8719 14.5406C18.9406 14.4031 18.975 14.3 19.0437 14.1625C19.1125 14.025 19.25 13.9562 19.3875 13.9562H19.4906H19.525C20.5562 13.9562 21.4156 13.1312 21.45 12.0656L21.4844 10.1406C21.4156 9.72812 21.2094 9.21249 20.8656 8.86874ZM19.8344 12.1C19.8344 12.3062 19.6625 12.4781 19.4562 12.4781H19.3531H19.3187C18.5281 12.4781 17.8062 12.9594 17.5312 13.6469C17.4969 13.75 17.4281 13.8531 17.3937 13.9562C17.0844 14.6437 17.2219 15.5031 17.7719 16.0531L17.8406 16.1562C17.9781 16.2937 17.9781 16.5344 17.8406 16.6719L16.4656 18.0125C16.3625 18.1156 16.2594 18.1156 16.1906 18.1156C16.1219 18.1156 16.0187 18.1156 15.9156 18.0125L15.8469 17.9094C15.2969 17.325 14.4719 17.1531 13.7156 17.4969L13.5781 17.5656C12.8219 17.875 12.3406 18.5625 12.3406 19.3531V19.4906C12.3406 19.6969 12.1687 19.8687 11.9625 19.8687H10.0375C9.83125 19.8687 9.65937 19.6969 9.65937 19.4906V19.3531C9.65937 18.5625 9.17812 17.8406 8.42187 17.5656C8.31875 17.5312 8.18125 17.4625 8.07812 17.4281C7.80312 17.2906 7.52812 17.2562 7.25312 17.2562C6.77187 17.2562 6.29062 17.4281 5.9125 17.8062L5.84375 17.8406C5.70625 17.9781 5.46562 17.9781 5.32812 17.8406L3.9875 16.4656C3.88437 16.3625 3.88437 16.2594 3.88437 16.1906C3.88437 16.1219 3.88437 16.0187 3.9875 15.9156L4.05625 15.8469C4.64062 15.2969 4.8125 14.4375 4.50312 13.75C4.46875 13.6469 4.43437 13.5437 4.36562 13.4406C4.09062 12.7187 3.40312 12.2031 2.6125 12.2031H2.50937C2.30312 12.2031 2.13125 12.0312 2.13125 11.825L2.16562 9.89999C2.16562 9.76249 2.23437 9.69374 2.26875 9.62499C2.30312 9.59062 2.40625 9.52187 2.54375 9.52187H2.64687C3.4375 9.55624 4.15937 9.07499 4.46875 8.35312C4.50312 8.24999 4.57187 8.14687 4.60625 8.04374C4.91562 7.35624 4.77812 6.49687 4.22812 5.94687L4.15937 5.84374C4.02187 5.70624 4.02187 5.46562 4.15937 5.32812L5.53437 3.98749C5.6375 3.88437 5.74062 3.88437 5.80937 3.88437C5.87812 3.88437 5.98125 3.88437 6.08437 3.98749L6.15312 4.09062C6.70312 4.67499 7.52812 4.84687 8.28437 4.53749L8.42187 4.46874C9.17812 4.15937 9.65937 3.47187 9.65937 2.68124V2.54374C9.65937 2.40624 9.72812 2.33749 9.7625 2.26874C9.79687 2.19999 9.9 2.16562 10.0375 2.16562H11.9625C12.1687 2.16562 12.3406 2.33749 12.3406 2.54374V2.68124C12.3406 3.47187 12.8219 4.19374 13.5781 4.46874C13.6812 4.50312 13.8187 4.57187 13.9219 4.60624C14.6437 4.94999 15.5031 4.81249 16.0875 4.26249L16.1906 4.19374C16.3281 4.05624 16.5687 4.05624 16.7062 4.19374L18.0469 5.56874C18.15 5.67187 18.15 5.77499 18.15 5.84374C18.15 5.91249 18.1156 6.01562 18.0469 6.11874L17.9781 6.18749C17.3594 6.70312 17.1875 7.56249 17.4625 8.24999C17.4969 8.35312 17.5312 8.45624 17.6 8.55937C17.875 9.28124 18.5625 9.79687 19.3531 9.79687H19.4562C19.5937 9.79687 19.6625 9.86562 19.7312 9.89999C19.8 9.93437 19.8344 10.0375 19.8344 10.175V12.1Z"
                                        fill="" />
                                    <path
                                        d="M11 6.32498C8.42189 6.32498 6.32501 8.42186 6.32501 11C6.32501 13.5781 8.42189 15.675 11 15.675C13.5781 15.675 15.675 13.5781 15.675 11C15.675 8.42186 13.5781 6.32498 11 6.32498ZM11 14.1281C9.28126 14.1281 7.87189 12.7187 7.87189 11C7.87189 9.28123 9.28126 7.87186 11 7.87186C12.7188 7.87186 14.1281 9.28123 14.1281 11C14.1281 12.7187 12.7188 14.1281 11 14.1281Z"
                                        fill="" />
                                </svg>
                                Account Settings
                            </div>

                        </a>
                    </li>
                    <li id="module">
                        <a href="{{ url('modules') }}"
                            class="@if(request()->is('profile.edit')) bg-[#333A48] dark:bg-meta-4 @endif group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-[#333A48] dark:hover:bg-meta-4">
                            <div class="hover:translate-x-2 flex items-center  pr-30 duration-300">
                                <svg id="moduleIcon" class="fill-current mr-2" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.2875 0.506226H3.7125C2.75625 0.506226 1.96875 1.29373 1.96875 2.24998V15.75C1.96875 16.7062 2.75625 17.5219 3.74063 17.5219H14.3156C15.2719 17.5219 16.0875 16.7344 16.0875 15.75V2.24998C16.0313 1.29373 15.2438 0.506226 14.2875 0.506226ZM14.7656 15.75C14.7656 16.0312 14.5406 16.2562 14.2594 16.2562H3.7125C3.43125 16.2562 3.20625 16.0312 3.20625 15.75V2.24998C3.20625 1.96873 3.43125 1.74373 3.7125 1.74373H14.2875C14.5688 1.74373 14.7938 1.96873 14.7938 2.24998V15.75H14.7656Z"
                                        fill=""></path>
                                    <path
                                        d="M12.7965 2.6156H9.73086C9.22461 2.6156 8.80273 3.03748 8.80273 3.54373V7.25623C8.80273 7.76248 9.22461 8.18435 9.73086 8.18435H12.7965C13.3027 8.18435 13.7246 7.76248 13.7246 7.25623V3.5156C13.6965 3.03748 13.3027 2.6156 12.7965 2.6156ZM12.4309 6.8906H10.0684V3.88123H12.4309V6.8906Z"
                                        fill=""></path>
                                    <path
                                        d="M4.97773 4.35938H7.03086C7.36836 4.35938 7.67773 4.07812 7.67773 3.7125C7.67773 3.34687 7.39648 3.09375 7.03086 3.09375H4.94961C4.61211 3.09375 4.30273 3.375 4.30273 3.74063C4.30273 4.10625 4.61211 4.35938 4.97773 4.35938Z"
                                        fill=""></path>
                                    <path
                                        d="M4.97773 7.9312H7.03086C7.36836 7.9312 7.67773 7.64995 7.67773 7.28433C7.67773 6.9187 7.39648 6.63745 7.03086 6.63745H4.94961C4.61211 6.63745 4.30273 6.9187 4.30273 7.28433C4.30273 7.64995 4.61211 7.9312 4.97773 7.9312Z"
                                        fill=""></path>
                                    <path
                                        d="M13.0789 10.2374H4.97891C4.64141 10.2374 4.33203 10.5187 4.33203 10.8843C4.33203 11.2499 4.61328 11.5312 4.97891 11.5312H13.0789C13.4164 11.5312 13.7258 11.2499 13.7258 10.8843C13.7258 10.5187 13.4164 10.2374 13.0789 10.2374Z"
                                        fill=""></path>
                                    <path
                                        d="M13.0789 13.8093H4.97891C4.64141 13.8093 4.33203 14.0906 4.33203 14.4562C4.33203 14.8218 4.61328 15.1031 4.97891 15.1031H13.0789C13.4164 15.1031 13.7258 14.8218 13.7258 14.4562C13.7258 14.0906 13.4164 13.8093 13.0789 13.8093Z"
                                        fill=""></path>
                                </svg>
                                Modules
                            </div>
                        </a>
                    </li>

                    <!-- Menu Item Chart -->
                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
    <script>

        //ANIMATION FOR DASHBOARD
        document.getElementById('dashboard').addEventListener('mouseover', function () {
            document.getElementById('dashIcon').classList.add('animate-rotate');
        });
        document.getElementById('dashboard').addEventListener('mouseout', function () {
            document.getElementById('dashIcon').classList.remove('animate-rotate');
        });
        //staff
        document.getElementById('staff').addEventListener('mouseover', function () {
            document.getElementById('staffIcon').classList.add('animate-rotate');
        });
        document.getElementById('staff').addEventListener('mouseout', function () {
            document.getElementById('staffIcon').classList.remove('animate-rotate');
        });
        //request
        document.getElementById('hrequest').addEventListener('mouseover', function () {
            document.getElementById('hrequestIcon').classList.add('animate-rotate');
        });
        document.getElementById('hrequest').addEventListener('mouseout', function () {
            document.getElementById('hrequestIcon').classList.remove('animate-rotate');
        });
        //progress
        document.getElementById('progress').addEventListener('mouseover', function () {
            document.getElementById('progressIcon').classList.add('animate-rotate');
        });
        document.getElementById('progress').addEventListener('mouseout', function () {
            document.getElementById('progressIcon').classList.remove('animate-rotate');
        });
        //items
        document.getElementById('item').addEventListener('mouseover', function () {
            document.getElementById('itemIcon').classList.add('animate-rotate');
        });
        document.getElementById('item').addEventListener('mouseout', function () {
            document.getElementById('itemIcon').classList.remove('animate-rotate');
        });
        //account
        document.getElementById('settings').addEventListener('mouseover', function () {
            document.getElementById('settingsIcon').classList.add('animate-rotate');
        });
        document.getElementById('settings').addEventListener('mouseout', function () {
            document.getElementById('settingsIcon').classList.remove('animate-rotate');
        });
        //modules
        document.getElementById('module').addEventListener('mouseover', function () {
            document.getElementById('moduleIcon').classList.add('animate-rotate');
        });
        document.getElementById('module').addEventListener('mouseout', function () {
            document.getElementById('moduleIcon').classList.remove('animate-rotate');
        });
    </script>
</aside>