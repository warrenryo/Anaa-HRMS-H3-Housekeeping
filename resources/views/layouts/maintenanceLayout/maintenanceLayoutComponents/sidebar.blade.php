<div :class="{ 'dark text-white-dark': $store.app.semidark }">
    <nav x-data="sidebar" class="sidebar fixed min-h-screen h-full top-0 bottom-0 w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] z-50 transition-all duration-300">
        <div class="bg-white dark:bg-[#0e1726] h-full">
            <div class="flex justify-between items-center px-4 py-3">
                <a href="/" class="main-logo flex items-center shrink-0">
                    <img class="w-8 ml-[5px] flex-none" src="{{ URL('img/ANAA LOGO.png') }}" alt="image" />
                    <span class="text-2xl ltr:ml-1.5 rtl:mr-1.5  font-semibold  align-middle lg:inline dark:text-white-light">ANAA</span>
                </a>
                <a href="javascript:;" class="collapse-icon w-8 h-8 rounded-full flex items-center hover:bg-gray-500/10 dark:hover:bg-dark-light/10 dark:text-white-light transition duration-300 rtl:rotate-180" @click="$store.app.toggleSidebar()">
                    <svg class="w-5 h-5 m-auto" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <ul class="perfect-scrollbar relative font-semibold space-y-0.5 h-[calc(100vh-80px)] overflow-y-auto overflow-x-hidden  p-4 py-0" x-data="{ activeDropdown: null }">
                <li class="nav-item @if(request()->is('maintenance-admin/dashboard')) bg-[#000]/[0.08] text-black dark:bg-[#181f32] rounded-md dark:text-white-dark @endif">
                    <a href="{{ url('maintenance-admin/dashboard') }}" class="group">
                        <div class="flex items-center">
                            <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14 20.5V4.25C14 3.52169 13.9984 3.05091 13.9518 2.70403C13.908 2.37872 13.8374 2.27676 13.7803 2.21967C13.7232 2.16258 13.6213 2.09197 13.296 2.04823C12.9491 2.00159 12.4783 2 11.75 2C11.0217 2 10.5509 2.00159 10.204 2.04823C9.87872 2.09197 9.77676 2.16258 9.71967 2.21967C9.66258 2.27676 9.59197 2.37872 9.54823 2.70403C9.50159 3.05091 9.5 3.52169 9.5 4.25V20.5H14Z" fill="currentColor" />
                                <path opacity="0.5" d="M8 8.75C8 8.33579 7.66421 8 7.25 8H4.25C3.83579 8 3.5 8.33579 3.5 8.75V20.5H8V8.75Z" fill="#1C274C" />
                                <path opacity="0.5" d="M20 13.75C20 13.3358 19.6642 13 19.25 13H16.25C15.8358 13 15.5 13.3358 15.5 13.75V20.5H20V13.75Z" fill="#1C274C" />
                                <path opacity="0.5" d="M1.75 20.5C1.33579 20.5 1 20.8358 1 21.25C1 21.6642 1.33579 22 1.75 22H21.75C22.1642 22 22.5 21.6642 22.5 21.25C22.5 20.8358 22.1642 20.5 21.75 20.5H21.5H20H15.5H14H9.5H8H3.5H2H1.75Z" fill="currentColor" />
                            </svg>
                            <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                        </div>
                    </a>
                </li>


                <h2 class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] -mx-4 mb-1">

                    <svg class="w-4 h-5 flex-none hidden" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>MAINTENANCE MENU</span>
                </h2>

                <li class="nav-item">
                    <ul>
                        <li class="nav-item @if(request()->is('maintenance-admin/maintenance-staff')) bg-[#000]/[0.08] text-black dark:bg-[#181f32] rounded-md dark:text-white-dark @endif">
                            <a href="{{ url('maintenance-admin/maintenance-staff') }}" class="group">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="6" r="4" fill="currentColor" />
                                        <ellipse opacity="0.5" cx="12" cy="17" rx="7" ry="4" fill="currentColor" />
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Maintenance
                                        Staff</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->is('maintenance-admin/maintenance-request-lists') || request()->is('maintenance-admin/maintenance-request-lists/request-code=*')) bg-[#000]/[0.08] text-black dark:bg-[#181f32] rounded-md dark:text-white-dark @endif">
                            <a href="{{ url('maintenance-admin/maintenance-request-lists') }}" class="group">
                                <div class="flex items-center">

                                    <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z" fill="currentColor" />
                                        <path d="M16.5189 16.5013C16.6939 16.3648 16.8526 16.2061 17.1701 15.8886L21.1275 11.9312C21.2231 11.8356 21.1793 11.6708 21.0515 11.6264C20.5844 11.4644 19.9767 11.1601 19.4083 10.5917C18.8399 10.0233 18.5356 9.41561 18.3736 8.94849C18.3292 8.82066 18.1644 8.77687 18.0688 8.87254L14.1114 12.8299C13.7939 13.1474 13.6352 13.3061 13.4987 13.4811C13.3377 13.6876 13.1996 13.9109 13.087 14.1473C12.9915 14.3476 12.9205 14.5606 12.7786 14.9865L12.5951 15.5368L12.3034 16.4118L12.0299 17.2323C11.9601 17.4419 12.0146 17.6729 12.1708 17.8292C12.3271 17.9854 12.5581 18.0399 12.7677 17.9701L13.5882 17.6966L14.4632 17.4049L15.0135 17.2214L15.0136 17.2214C15.4394 17.0795 15.6524 17.0085 15.8527 16.913C16.0891 16.8004 16.3124 16.6623 16.5189 16.5013Z" fill="currentColor" />
                                        <path d="M22.3665 10.6922C23.2112 9.84754 23.2112 8.47812 22.3665 7.63348C21.5219 6.78884 20.1525 6.78884 19.3078 7.63348L19.1806 7.76071C19.0578 7.88348 19.0022 8.05496 19.0329 8.22586C19.0522 8.33336 19.0879 8.49053 19.153 8.67807C19.2831 9.05314 19.5288 9.54549 19.9917 10.0083C20.4545 10.4712 20.9469 10.7169 21.3219 10.847C21.5095 10.9121 21.6666 10.9478 21.7741 10.9671C21.945 10.9978 22.1165 10.9422 22.2393 10.8194L22.3665 10.6922Z" fill="currentColor" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.25 9C7.25 8.58579 7.58579 8.25 8 8.25H14.5C14.9142 8.25 15.25 8.58579 15.25 9C15.25 9.41421 14.9142 9.75 14.5 9.75H8C7.58579 9.75 7.25 9.41421 7.25 9ZM7.25 13C7.25 12.5858 7.58579 12.25 8 12.25H11C11.4142 12.25 11.75 12.5858 11.75 13C11.75 13.4142 11.4142 13.75 11 13.75H8C7.58579 13.75 7.25 13.4142 7.25 13ZM7.25 17C7.25 16.5858 7.58579 16.25 8 16.25H9.5C9.91421 16.25 10.25 16.5858 10.25 17C10.25 17.4142 9.91421 17.75 9.5 17.75H8C7.58579 17.75 7.25 17.4142 7.25 17Z" fill="currentColor" />
                                    </svg>

                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Maintenance
                                        Requests</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->is('maintenance-admin/maintenance-task-progress')) bg-[#000]/[0.08] text-black dark:bg-[#181f32] rounded-md dark:text-white-dark @endif">
                            <a href="{{ url('maintenance-admin/maintenance-task-progress') }}" class="group">
                                <div class="flex items-center">

                                    <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" d="M21 15.9983V9.99826C21 7.16983 21 5.75562 20.1213 4.87694C19.3529 4.10856 18.175 4.01211 16 4H8C5.82497 4.01211 4.64706 4.10856 3.87868 4.87694C3 5.75562 3 7.16983 3 9.99826V15.9983C3 18.8267 3 20.2409 3.87868 21.1196C4.75736 21.9983 6.17157 21.9983 9 21.9983H15C17.8284 21.9983 19.2426 21.9983 20.1213 21.1196C21 20.2409 21 18.8267 21 15.9983Z" fill="currentColor" />
                                        <path d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z" fill="currentColor" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.25 10.5C6.25 10.0858 6.58579 9.75 7 9.75H7.5C7.91421 9.75 8.25 10.0858 8.25 10.5C8.25 10.9142 7.91421 11.25 7.5 11.25H7C6.58579 11.25 6.25 10.9142 6.25 10.5ZM9.75 10.5C9.75 10.0858 10.0858 9.75 10.5 9.75H17C17.4142 9.75 17.75 10.0858 17.75 10.5C17.75 10.9142 17.4142 11.25 17 11.25H10.5C10.0858 11.25 9.75 10.9142 9.75 10.5ZM6.25 14C6.25 13.5858 6.58579 13.25 7 13.25H7.5C7.91421 13.25 8.25 13.5858 8.25 14C8.25 14.4142 7.91421 14.75 7.5 14.75H7C6.58579 14.75 6.25 14.4142 6.25 14ZM9.75 14C9.75 13.5858 10.0858 13.25 10.5 13.25H17C17.4142 13.25 17.75 13.5858 17.75 14C17.75 14.4142 17.4142 14.75 17 14.75H10.5C10.0858 14.75 9.75 14.4142 9.75 14ZM6.25 17.5C6.25 17.0858 6.58579 16.75 7 16.75H7.5C7.91421 16.75 8.25 17.0858 8.25 17.5C8.25 17.9142 7.91421 18.25 7.5 18.25H7C6.58579 18.25 6.25 17.9142 6.25 17.5ZM9.75 17.5C9.75 17.0858 10.0858 16.75 10.5 16.75H17C17.4142 16.75 17.75 17.0858 17.75 17.5C17.75 17.9142 17.4142 18.25 17 18.25H10.5C10.0858 18.25 9.75 17.9142 9.75 17.5Z" fill="currentColor" />
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Task
                                        Progress</span>
                                </div>
                            </a>
                        </li>
                        <h2 class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] -mx-4 mb-1">

                            <svg class="w-4 h-5 flex-none hidden" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            <span>INVENTORY</span>
                        </h2>
                        <li class="nav-item @if(request()->is('maintenance-admin/inventory-items')) bg-[#000]/[0.08] text-black dark:bg-[#181f32] rounded-md dark:text-white-dark @endif">
                            <a href="{{ url('maintenance-admin/inventory-items') }}" class="group">
                                <div class="flex items-center">
                                    <svg class="group-hover:!text-primary" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" d="M4.0828 10.8943C4.52171 8.55339 4.74117 7.38295 5.57434 6.69147C6.40752 6 7.59835 6 9.98003 6H14.0209C16.4026 6 17.5934 6 18.4266 6.69147C19.2598 7.38295 19.4792 8.55339 19.9181 10.8943L20.6681 14.8943C21.2853 18.186 21.5939 19.8318 20.6942 20.9159C19.7945 22 18.12 22 14.7709 22H9.23003C5.88097 22 4.20644 22 3.30672 20.9159C2.40701 19.8318 2.7156 18.186 3.3328 14.8943L4.0828 10.8943Z" fill="currentColor" />
                                        <path d="M9.75 5C9.75 3.75736 10.7574 2.75 12 2.75C13.2426 2.75 14.25 3.75736 14.25 5V6C14.25 5.99999 14.25 6.00001 14.25 6C14.816 6.00018 15.3119 6.00174 15.7499 6.01488C15.75 6.00993 15.75 6.00497 15.75 6V5C15.75 2.92893 14.0711 1.25 12 1.25C9.92893 1.25 8.25 2.92893 8.25 5V6C8.25 6.00498 8.25005 6.00995 8.25015 6.01491C8.68814 6.00175 9.18397 6.00021 9.75 6.00002C9.75 6.00002 9.75 6.00003 9.75 6.00002V5Z" fill="currentColor" />
                                    </svg>
                                    <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Items</span>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>
