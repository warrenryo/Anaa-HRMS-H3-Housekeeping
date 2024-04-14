<header :class="{ 'dark': $store.app.semidark && $store.app.menu === 'horizontal' }">
    <div class="shadow-sm">
        <div class="relative bg-white flex w-full items-center px-5 py-2.5 dark:bg-[#0e1726]">
            <div class="horizontal-logo flex lg:hidden justify-between items-center ltr:mr-2 rtl:ml-2">
                <a href="/" class="main-logo flex items-center shrink-0">
                    <img class="w-8 ltr:-ml-1 rtl:-mr-1 inline" src="{{ url('img/ANAA LOGO.png') }}" alt="image" />
                    <span class="text-2xl ltr:ml-1.5 rtl:mr-1.5  font-semibold  align-middle hidden md:inline dark:text-white-light transition-all duration-300">ANAA</span>
                </a>

                <a href="javascript:;" class="collapse-icon flex-none dark:text-[#d0d2d6] hover:text-primary dark:hover:text-primary flex lg:hidden ltr:ml-2 rtl:mr-2 p-2 rounded-full bg-white-light/40 dark:bg-dark/40 hover:bg-white-light/90 dark:hover:bg-dark/60" @click="$store.app.toggleSidebar()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </a>
            </div>
            <div class="ltr:mr-2 rtl:ml-2 hidden sm:block">
                <ul class="flex items-center space-x-2 rtl:space-x-reverse dark:text-[#d0d2d6]">
                    <li>
                        <a href="/apps/calendar" class="block p-2 rounded-full bg-white-light/40 dark:bg-dark/40 hover:text-primary hover:bg-white-light/90 dark:hover:bg-dark/60">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z" stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.5" d="M7 4V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M17 4V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M2 9H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('apps-todolist') }}" class="block p-2 rounded-full bg-white-light/40 dark:bg-dark/40 hover:text-primary hover:bg-white-light/90 dark:hover:bg-dark/60">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5" d="M22 10.5V12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M17.3009 2.80624L16.652 3.45506L10.6872 9.41993C10.2832 9.82394 10.0812 10.0259 9.90743 10.2487C9.70249 10.5114 9.52679 10.7957 9.38344 11.0965C9.26191 11.3515 9.17157 11.6225 8.99089 12.1646L8.41242 13.9L8.03811 15.0229C7.9492 15.2897 8.01862 15.5837 8.21744 15.7826C8.41626 15.9814 8.71035 16.0508 8.97709 15.9619L10.1 15.5876L11.8354 15.0091C12.3775 14.8284 12.6485 14.7381 12.9035 14.6166C13.2043 14.4732 13.4886 14.2975 13.7513 14.0926C13.9741 13.9188 14.1761 13.7168 14.5801 13.3128L20.5449 7.34795L21.1938 6.69914C22.2687 5.62415 22.2687 3.88124 21.1938 2.80624C20.1188 1.73125 18.3759 1.73125 17.3009 2.80624Z" stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.5" d="M16.6522 3.45508C16.6522 3.45508 16.7333 4.83381 17.9499 6.05034C19.1664 7.26687 20.5451 7.34797 20.5451 7.34797M10.1002 15.5876L8.4126 13.9" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div x-data="header" class="sm:flex-1 ltr:sm:ml-0 ltr:ml-auto sm:rtl:mr-0 rtl:mr-auto flex items-center space-x-1.5 lg:space-x-2 rtl:space-x-reverse dark:text-[#d0d2d6]">
                <div class="sm:ltr:mr-auto sm:rtl:ml-auto" x-data="{ search: false }" @click.outside="search = false">
                    <form class="sm:relative absolute inset-x-0 sm:top-0 top-1/2 sm:translate-y-0 -translate-y-1/2 sm:mx-0 mx-4 z-10 sm:block hidden" :class="{ '!block': search }" @submit.prevent="search = false">
                        <div class="relative">
                            <input type="text" class="form-input ltr:pl-9 rtl:pr-9 ltr:sm:pr-4 rtl:sm:pl-4 ltr:pr-9 rtl:pl-9 peer sm:bg-transparent bg-gray-100 placeholder:tracking-widest" placeholder="Search..." />
                            <button type="button" class="absolute w-9 h-9 inset-0 ltr:right-auto rtl:left-auto appearance-none peer-focus:text-primary">
                                <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                                    <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </button>
                            <button type="button" class="hover:opacity-80 sm:hidden block absolute top-1/2 -translate-y-1/2 ltr:right-2 rtl:left-2" @click="search = false">
                                </svg>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    <button type="button" class="search_btn sm:hidden p-2 rounded-full bg-white-light/40 dark:bg-dark/40 hover:bg-white-light/90 dark:hover:bg-dark/60" @click="search = ! search">
                        <svg class="w-4.5 h-4.5 mx-auto dark:text-[#d0d2d6]" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>

                <div>
                    <a href="javascript:;" x-cloak x-show="$store.app.theme === 'light'" href="javascript:;" class="flex items-center p-2 rounded-full bg-white-light/40 dark:bg-dark/40 hover:text-primary hover:bg-white-light/90 dark:hover:bg-dark/60" @click="$store.app.toggleTheme('dark')">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.5" />
                            <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M12 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path opacity="0.5" d="M19.7778 4.22266L17.5558 6.25424" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path opacity="0.5" d="M4.22217 4.22266L6.44418 6.25424" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path opacity="0.5" d="M6.44434 17.5557L4.22211 19.7779" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path opacity="0.5" d="M19.7778 19.7773L17.5558 17.5551" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                    <a href="javascript:;" x-cloak x-show="$store.app.theme === 'dark'" href="javascript:;" class="flex items-center p-2 rounded-full bg-white-light/40 dark:bg-dark/40 hover:text-primary hover:bg-white-light/90 dark:hover:bg-dark/60" @click="$store.app.toggleTheme('system')">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z" fill="currentColor" />
                        </svg>
                    </a>
                    <a href="javascript:;" x-cloak x-show="$store.app.theme === 'system'" href="javascript:;" class="flex items-center p-2 rounded-full bg-white-light/40 dark:bg-dark/40 hover:text-primary hover:bg-white-light/90 dark:hover:bg-dark/60" @click="$store.app.toggleTheme('light')">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z" stroke="currentColor" stroke-width="1.5" />
                            <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>

                <div class="dropdown" x-data="dropdown" @click.outside="open = false">
                    <a href="javascript:;" class="block p-2 rounded-full bg-white-light/40 dark:bg-dark/40 hover:text-primary hover:bg-white-light/90 dark:hover:bg-dark/60" @click="toggle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 10C22.0185 10.7271 22 11.0542 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <circle cx="19" cy="5" r="3" stroke="currentColor" stroke-width="1.5" />
                        </svg>
                    </a>
                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="top-11 !py-0 text-dark dark:text-white-dark w-[300px] ltr:-right-16 sm:ltr:-right-2 rtl:-left-16 sm:rtl:-left-2 sm:w-[375px] text-xs">
                        <li class="mb-5">
                            <div class="overflow-hidden relative rounded-t-md !p-5 text-white">
                                <div class="absolute h-full w-full bg-blue-600 bg-no-repeat bg-center bg-cover inset-0">
                                </div>
                                <h4 class="font-semibold relative z-10 text-lg">Messages</h4>
                            </div>
                        </li>
                        <template x-for="msg in messages">
                            <li>
                                <div class="flex items-center px-5 py-3" @click.self="toggle">
                                    <div x-html="msg.image"></div>
                                    <span class="px-3 dark:text-gray-500">
                                        <div class="font-semibold text-sm dark:text-white-light/90" x-text="msg.title">
                                        </div>
                                        <div x-text="msg.message"></div>
                                    </span>
                                    <span class="font-semibold bg-white-dark/20 rounded text-dark/60 px-1 ltr:ml-auto rtl:mr-auto whitespace-pre dark:text-white-dark ltr:mr-2 rtl:ml-2" x-text="msg.time"></span>
                                    <span class="text-neutral-300 hover:text-danger" @click="removeMessage(msg.id)">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                                            <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </span>
                                </div>
                            </li>
                        </template>
                        <template x-if="messages.length">
                            <li class="border-t border-white-light text-center dark:border-white/10 mt-5 ">
                                <div class="flex items-center px-4 py-4 text-primary font-semibold group dark:text-gray-400  justify-center cursor-pointer" @click="toggle">
                                    <span class="group-hover:underline ltr:mr-1 rtl:ml-1">VIEW ALL ACTIVITIES</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition duration-300 ltr:ml-1 rtl:mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </li>
                        </template>
                        <template x-if="!messages.length">
                            <li class="mb-5">
                                <div class="!grid place-content-center hover:!bg-transparent text-lg min-h-[200px]">
                                    <div class="mx-auto ring-4 ring-primary/30 rounded-full mb-4 text-primary">
                                        <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.5" d="M20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10Z" fill="currentColor" />
                                            <path d="M10 4.25C10.4142 4.25 10.75 4.58579 10.75 5V11C10.75 11.4142 10.4142 11.75 10 11.75C9.58579 11.75 9.25 11.4142 9.25 11V5C9.25 4.58579 9.58579 4.25 10 4.25Z" fill="currentColor" />
                                            <path d="M10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z" fill="currentColor" />
                                        </svg>
                                    </div>
                                    No data available.
                                </div>
                            </li>
                        </template>
                    </ul>
                </div>

                <!--NOTIFICATION -->
                <div class="dropdown" x-data="dropdown" @click.outside="open = false">
                    <a href="javascript:;" class="relative block p-2 rounded-full bg-white-light/40 dark:bg-dark/40 hover:text-primary hover:bg-white-light/90 dark:hover:bg-dark/60" @click="toggle">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z" stroke="currentColor" stroke-width="1.5" />
                            <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M12 6V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>

                        <span class="flex absolute w-3 h-3 ltr:right-0 rtl:left-0 top-0">
                            @if($user->unreadNotifications->count() == 0)

                            @else
                            <span class="animate-ping absolute ltr:-left-[3px] rtl:-right-[3px] -top-[3px] inline-flex h-full w-full rounded-full bg-success/50 opacity-75"></span>
                            <span class="relative inline-flex rounded-full w-[6px] h-[6px] bg-success"></span>
                            @endif
                        </span>
                    </a>
                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="ltr:-right-2 rtl:-left-2 top-11 !py-0 text-dark dark:text-white-dark w-[300px] sm:w-[350px] divide-y dark:divide-white/10">
                        <li>
                            <div class="flex items-center px-4 py-2 justify-between font-semibold hover:!bg-transparent">
                                <h4 class="text-lg">Notification</h4>
                                <div>
                                    <span class="badge bg-primary/80">{{$user->unreadNotifications->count()}} New</span>
                                </div>
                            </div>
                        </li>
                        <div class="overflow-y-auto h-[50vh] ">
                          
                            <input type="hidden" id="readNotif" value="{{$user->readNotifications->count()}}">
                        </div>
                        <div>
                            <li>
                                <div class="p-4">
                                    <a href="{{ url('markAsAllRead') }}" class="btn btn-primary block w-full btn-small text-center">Read All
                                        Notifications</a>
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="dropdown flex-shrink-0" x-data="dropdown" @click.outside="open = false">
                    <a href="javascript:;" class="relative group" @click="toggle()">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg>
                        </span>
                    </a>
                    <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="ltr:right-0 rtl:left-0 text-dark dark:text-white-dark top-11 !py-0 w-[230px] font-semibold dark:text-white-light/90">
                        <li>
                            <div class="flex items-center px-4 py-4">
                                <div class="flex-none">
                                    <img class="rounded-md w-10 h-11 object-cover" src="{{ asset('img/NEWLOGO.png') }}" alt="image" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <h4 class="text-base">
                                        {{ Auth::user()->name }}
                                    </h4>
                                    <a class="text-black/60  hover:text-primary dark:text-dark-light/60 dark:hover:text-white" href="">{{ Auth::user()->email }}</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit')}}" class="dark:hover:text-white" @click="toggle">
                                <svg class="w-4.5 h-4.5 ltr:mr-2 rtl:ml-2" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5" />
                                    <path opacity="0.5" d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                                Profile</a>
                        </li>
                        <li>
                            <a href="/apps/mailbox" class="dark:hover:text-white" @click="toggle">
                                <svg class="w-4.5 h-4.5 ltr:mr-2 rtl:ml-2" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5" d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                Inbox</a>
                        </li>
                        @if(Auth::user()->role == 'Admin')

                        <li>
                            <a href="{{url('modules')}}" class="dark:hover:text-white" @click="toggle">
                                <svg class="w-4.5 h-4.5 ltr:mr-2 rtl:ml-2" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.948 1.75C5.04954 1.74997 4.3003 1.74995 3.70552 1.82991C3.07773 1.91432 2.51093 2.09999 2.05546 2.55546C1.59999 3.01093 1.41432 3.57773 1.32991 4.20552C1.24995 4.8003 1.24997 5.54951 1.25 6.44798V8.552C1.24997 9.45047 1.24995 10.1997 1.32991 10.7945C1.41432 11.4223 1.59999 11.9891 2.05546 12.4445C2.51093 12.9 3.07773 13.0857 3.70552 13.1701C4.3003 13.2501 5.04951 13.25 5.94798 13.25H6.052C6.95047 13.25 7.69971 13.2501 8.29448 13.1701C8.92228 13.0857 9.48908 12.9 9.94455 12.4445C10.4 11.9891 10.5857 11.4223 10.6701 10.7945C10.7501 10.1997 10.75 9.4505 10.75 8.55203V6.44801C10.75 5.54954 10.7501 4.8003 10.6701 4.20552C10.5857 3.57773 10.4 3.01093 9.94455 2.55546C9.48908 2.09999 8.92228 1.91432 8.29448 1.82991C7.69971 1.74995 6.9505 1.74997 6.05203 1.75H5.948ZM3.11612 3.61612C3.24644 3.4858 3.44393 3.37858 3.9054 3.31654C4.38843 3.2516 5.03599 3.25 6 3.25C6.96401 3.25 7.61157 3.2516 8.09461 3.31654C8.55607 3.37858 8.75357 3.4858 8.88389 3.61612C9.0142 3.74644 9.12143 3.94393 9.18347 4.4054C9.24841 4.88843 9.25 5.53599 9.25 6.5V8.5C9.25 9.46401 9.24841 10.1116 9.18347 10.5946C9.12143 11.0561 9.0142 11.2536 8.88389 11.3839C8.75357 11.5142 8.55607 11.6214 8.09461 11.6835C7.61157 11.7484 6.96401 11.75 6 11.75C5.03599 11.75 4.38843 11.7484 3.9054 11.6835C3.44393 11.6214 3.24644 11.5142 3.11612 11.3839C2.9858 11.2536 2.87858 11.0561 2.81654 10.5946C2.7516 10.1116 2.75 9.46401 2.75 8.5V6.5C2.75 5.53599 2.7516 4.88843 2.81654 4.4054C2.87858 3.94393 2.9858 3.74644 3.11612 3.61612Z" fill="#1C274C" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.448 10.75C16.5495 10.75 15.8003 10.7499 15.2055 10.8299C14.5777 10.9143 14.0109 11.1 13.5555 11.5555C13.1 12.0109 12.9143 12.5777 12.8299 13.2055C12.7499 13.8003 12.75 14.5495 12.75 15.448V17.552C12.75 18.4505 12.7499 19.1997 12.8299 19.7945C12.9143 20.4223 13.1 20.9891 13.5555 21.4445C14.0109 21.9 14.5777 22.0857 15.2055 22.1701C15.8003 22.2501 16.5495 22.25 17.4479 22.25H17.552C18.4504 22.25 19.1997 22.2501 19.7945 22.1701C20.4223 22.0857 20.9891 21.9 21.4445 21.4445C21.9 20.9891 22.0857 20.4223 22.1701 19.7945C22.2501 19.1997 22.25 18.4505 22.25 17.5521V15.448C22.25 14.5496 22.2501 13.8003 22.1701 13.2055C22.0857 12.5777 21.9 12.0109 21.4445 11.5555C20.9891 11.1 20.4223 10.9143 19.7945 10.8299C19.1997 10.7499 18.4505 10.75 17.552 10.75H17.448ZM14.6161 12.6161C14.7464 12.4858 14.9439 12.3786 15.4054 12.3165C15.8884 12.2516 16.536 12.25 17.5 12.25C18.464 12.25 19.1116 12.2516 19.5946 12.3165C20.0561 12.3786 20.2536 12.4858 20.3839 12.6161C20.5142 12.7464 20.6214 12.9439 20.6835 13.4054C20.7484 13.8884 20.75 14.536 20.75 15.5V17.5C20.75 18.464 20.7484 19.1116 20.6835 19.5946C20.6214 20.0561 20.5142 20.2536 20.3839 20.3839C20.2536 20.5142 20.0561 20.6214 19.5946 20.6835C19.1116 20.7484 18.464 20.75 17.5 20.75C16.536 20.75 15.8884 20.7484 15.4054 20.6835C14.9439 20.6214 14.7464 20.5142 14.6161 20.3839C14.4858 20.2536 14.3786 20.0561 14.3165 19.5946C14.2516 19.1116 14.25 18.464 14.25 17.5V15.5C14.25 14.536 14.2516 13.8884 14.3165 13.4054C14.3786 12.9439 14.4858 12.7464 14.6161 12.6161Z" fill="#1C274C" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.4748 1.75H18.5253C18.9697 1.75 19.3408 1.74999 19.6454 1.77077C19.9625 1.79241 20.262 1.83905 20.5524 1.95933C21.2262 2.23844 21.7616 2.7738 22.0407 3.44762C22.161 3.73801 22.2076 4.03754 22.2292 4.35464C22.25 4.65925 22.25 5.03029 22.25 5.47475V5.52526C22.25 5.96972 22.25 6.34076 22.2292 6.64537C22.2076 6.96247 22.161 7.26199 22.0407 7.55238C21.7616 8.22621 21.2262 8.76156 20.5524 9.04067C20.262 9.16095 19.9625 9.2076 19.6454 9.22923C19.3408 9.25002 18.9697 9.25001 18.5253 9.25H16.4747C16.0303 9.25001 15.6592 9.25002 15.3546 9.22923C15.0375 9.2076 14.738 9.16095 14.4476 9.04067C13.7738 8.76156 13.2384 8.22621 12.9593 7.55238C12.8391 7.26199 12.7924 6.96247 12.7708 6.64537C12.75 6.34075 12.75 5.96972 12.75 5.52525V5.47475C12.75 5.03029 12.75 4.65925 12.7708 4.35464C12.7924 4.03754 12.8391 3.73801 12.9593 3.44762C13.2384 2.7738 13.7738 2.23844 14.4476 1.95933C14.738 1.83905 15.0375 1.79241 15.3546 1.77077C15.6592 1.74999 16.0303 1.75 16.4748 1.75ZM15.4567 3.26729C15.216 3.28372 15.0988 3.3132 15.0216 3.34515C14.7154 3.47202 14.472 3.71536 14.3452 4.02165C14.3132 4.0988 14.2837 4.21602 14.2673 4.45675C14.2504 4.70421 14.25 5.0238 14.25 5.5C14.25 5.97621 14.2504 6.2958 14.2673 6.54326C14.2837 6.78399 14.3132 6.9012 14.3452 6.97836C14.472 7.28464 14.7154 7.52799 15.0216 7.65485C15.0988 7.68681 15.216 7.71629 15.4567 7.73271C15.7042 7.7496 16.0238 7.75 16.5 7.75H18.5C18.9762 7.75 19.2958 7.7496 19.5433 7.73271C19.784 7.71629 19.9012 7.68681 19.9784 7.65485C20.2846 7.52799 20.528 7.28464 20.6549 6.97836C20.6868 6.9012 20.7163 6.78399 20.7327 6.54326C20.7496 6.2958 20.75 5.97621 20.75 5.5C20.75 5.0238 20.7496 4.70421 20.7327 4.45674C20.7163 4.21602 20.6868 4.0988 20.6549 4.02165C20.528 3.71536 20.2846 3.47202 19.9784 3.34515C19.9012 3.3132 19.784 3.28372 19.5433 3.26729C19.2958 3.25041 18.9762 3.25 18.5 3.25H16.5C16.0238 3.25 15.7042 3.25041 15.4567 3.26729Z" fill="#1C274C" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.97475 14.75C4.53029 14.75 4.15925 14.75 3.85464 14.7708C3.53754 14.7924 3.23801 14.8391 2.94762 14.9593C2.2738 15.2384 1.73844 15.7738 1.45933 16.4476C1.33905 16.738 1.29241 17.0375 1.27077 17.3546C1.24999 17.6592 1.25 18.0302 1.25 18.4747V18.5253C1.25 18.9697 1.24999 19.3408 1.27077 19.6454C1.29241 19.9625 1.33905 20.262 1.45933 20.5524C1.73844 21.2262 2.2738 21.7616 2.94762 22.0407C3.23801 22.161 3.53754 22.2076 3.85464 22.2292C4.15925 22.25 4.53029 22.25 4.97475 22.25H7.02526C7.46972 22.25 7.84076 22.25 8.14537 22.2292C8.46247 22.2076 8.76199 22.161 9.05238 22.0407C9.72621 21.7616 10.2616 21.2262 10.5407 20.5524C10.661 20.262 10.7076 19.9625 10.7292 19.6454C10.75 19.3408 10.75 18.9697 10.75 18.5253V18.4747C10.75 18.0303 10.75 17.6592 10.7292 17.3546C10.7076 17.0375 10.661 16.738 10.5407 16.4476C10.2616 15.7738 9.72621 15.2384 9.05238 14.9593C8.76199 14.8391 8.46247 14.7924 8.14537 14.7708C7.84075 14.75 7.46972 14.75 7.02525 14.75H4.97475ZM3.52165 16.3452C3.5988 16.3132 3.71602 16.2837 3.95675 16.2673C4.20421 16.2504 4.5238 16.25 5 16.25H7C7.47621 16.25 7.7958 16.2504 8.04326 16.2673C8.28399 16.2837 8.4012 16.3132 8.47836 16.3452C8.78464 16.472 9.02799 16.7154 9.15485 17.0216C9.18681 17.0988 9.21629 17.216 9.23271 17.4567C9.2496 17.7042 9.25 18.0238 9.25 18.5C9.25 18.9762 9.2496 19.2958 9.23271 19.5433C9.21629 19.784 9.18681 19.9012 9.15485 19.9784C9.02799 20.2846 8.78464 20.528 8.47836 20.6549C8.4012 20.6868 8.28399 20.7163 8.04326 20.7327C7.7958 20.7496 7.47621 20.75 7 20.75H5C4.5238 20.75 4.20421 20.7496 3.95674 20.7327C3.71602 20.7163 3.5988 20.6868 3.52165 20.6549C3.21536 20.528 2.97202 20.2846 2.84515 19.9784C2.8132 19.9012 2.78372 19.784 2.76729 19.5433C2.75041 19.2958 2.75 18.9762 2.75 18.5C2.75 18.0238 2.75041 17.7042 2.76729 17.4567C2.78372 17.216 2.8132 17.0988 2.84515 17.0216C2.97202 16.7154 3.21536 16.472 3.52165 16.3452Z" fill="#1C274C" />
                                </svg>
                                Modules</a>
                        </li>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            <li class="border-t border-white-light dark:border-white-light/10">
                                @csrf
                                <a href="{{ route('logout')}}" onclick="event.preventDefault();
                                        this.closest('form').submit();" class=" text-danger !py-3" @click="toggle">
                                    <svg class="w-4.5 h-4.5 ltr:mr-2 rtl:ml-2 rotate-90" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Sign Out
                                </a>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    const unread = document.getElementById('unreadNotif');
    const read = document.getElementById('readNotif');

    if (read.value > 0) {
        unread.classList.add('hidden');
    }
</script>