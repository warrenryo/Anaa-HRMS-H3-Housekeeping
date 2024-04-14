<!-- THIS IS MY HOUSEKEEPING LAYOUT -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('img/ANAA LOGO.png')}}" type="image/png">


    <!--LINEICONS -->
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
    <!--FLOWBITE-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <!--FONTAWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

    <script src="/assets/js/perfect-scrollbar.min.js"></script>
    <script defer src="/assets/js/popper.min.js"></script>
    <script defer src="/assets/js/tippy-bundle.umd.min.js"></script>
    <link rel="stylesheet" href="resources/css/nice-select.css" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="main" class="antialiased relative font-nunito text-sm font-normal overflow-x-hidden" :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme, $store.app.menu, $store.app.layout, $store.app.rtlClass]">

    <!-- sidebar menu overlay -->
    <div x-cloak class="fixed inset-0 bg-[black]/60 z-50 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }" @click="$store.app.toggleSidebar()"></div>

    <!-- screen loader -->
    <div class="screen_loader fixed inset-0 bg-[#fafafa] dark:bg-[#060818] z-[60] grid place-content-center animate__animated">
        <img src="{{ asset('img/logistics.png') }}" class="w-32 animate-rotate" alt="">
    </div>


    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("scrollToTop", () => ({
                showTopButton: false,
                init() {
                    window.onscroll = () => {
                        this.scrollFunction();
                    };
                },

                scrollFunction() {
                    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                        this.showTopButton = true;
                    } else {
                        this.showTopButton = false;
                    }
                },

                goToTop() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                },
            }));
        });
    </script>






    @include('logistic.logisticLayout.navbar')



    <div class="p-6 animate__animated" :class="[$store.app.animation]">
        @yield('content')
    </div>



    @include('sweetalert::alert')

    <!--<script>
        //DARK MODE SCRIPT 
        const themeToggle = document.getElementById('themeToggle');
        const moon = document.querySelector('.moon');
        const sun = document.querySelector('.sun');

        const toggleDarkMode = () => {
            const currentTheme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', newTheme);

            // Toggle icons
            moon.classList.toggle('hidden');
            sun.classList.toggle('hidden');
        };

        themeToggle.addEventListener('change', toggleDarkMode);

        // Initial theme check
        const userTheme = localStorage.getItem('theme');
        const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (userTheme === 'dark' || (!userTheme && systemTheme)) {
            document.documentElement.classList.add('dark');
            moon.classList.remove('hidden');
            sun.classList.add('hidden');
            themeToggle.checked = true; // Set the checkbox as checked initially
        }
    </script>-->

    <!--script for housekeeping_progress tab -->

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("notes", () => ({

                isShowNoteMenu: false,
                selectedTab: 'all',

                tabChanged(type) {
                    this.selectedTab = type;
                    this.searchNotes();
                    this.isShowNoteMenu = false;
                },
            }));
        });
    </script>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <!--FLOWBITE SCRIPT-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <!--FLOWBITE CHARTS SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>

    <script src="/assets/js/alpine-collaspe.min.js"></script>
    <script src="/assets/js/alpine-persist.min.js"></script>
    <script defer src="/assets/js/alpine-ui.min.js"></script>
    <script defer src="/assets/js/alpine-focus.min.js"></script>
    <script defer src="/assets/js/alpine.min.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script src="resources/css/nice-select.css"></script>

</body>

</html>