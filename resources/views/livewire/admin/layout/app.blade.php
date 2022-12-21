<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ config()->get('direction') }}" class="darkl">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Generate seo tags --}}
        {!! SEO::generate() !!}

        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="{{ src( settings('general')->favicon ) }}"/>

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="{{ url('node_modules/@mdi/font/css/materialdesignicons.min.css') }}">

        {{-- Livewire styles --}}
        @livewireStyles

        {{-- Styles --}}
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">

        {{-- Toastr Plugin --}}
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        {{-- Select2 --}}
        <link href="{{ url('node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" />

        {{-- Rating Plugin --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

        {{-- Custom fonts --}}
		{!! settings('appearance')->font_link !!}

        {{-- Custom css --}}
        <style>
            :root {
                --color-primary-h: {{ hex2hsl( settings('appearance')->colors['primary'] )[0] }};
                --color-primary-s: {{ hex2hsl( settings('appearance')->colors['primary'] )[1] }}%;
                --color-primary-l: {{ hex2hsl( settings('appearance')->colors['primary'] )[2] }}%;
            }
            html {
                font-family: @php echo settings('appearance')->font_family @endphp, sans-serif !important;
            }
        </style>

        {{-- Custom css --}}
        @stack('styles')

    </head>

    <body class="antialiased bg-gray-100 text-gray-600 min-h-full flex flex-col application application-ltr overflow-x-hidden overflow-y-hidden" x-data="window.QCwuToAKMICZSdT">

        {{-- Loading page --}}
        <div class="bg-[#f9f9f9] fixed h-full w-full z-[999] flex items-center justify-center" id="screen-loader">
            <div class="text-center">
                <div role="status">
                    <svg class="inline w-16 h-16 text-gray-200 animate-spin fill-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>         
        </div>

        <div class="bg-gray-100 dark:bg-black dark:bg-opacity-60" :class="{ 'overflow-hidden': isSideMenuOpen }">

            {{-- Header --}}
            @livewire('admin.includes.header')

            <div class="flex flex-1 h-full w-full">
                
                {{-- Sidebar --}}
                @livewire('admin.includes.sidebar')
                
                {{-- Content --}}
                <main class="h-full overflow-y-auto w-full">
                    <div class="container !max-w-full py-12 px-6 lg:px-20">
                        @yield('content')
                    </div>  
                </main> 

            </div> 

        </div>

        {{-- Livewire scripts --}}
        @livewireScripts

        {{-- App.Js --}}
        <script defer src="{{ url('public/js/app.js') }}"></script>

        {{-- jQuery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        {{-- Select2 --}}
        <script src="{{ url('node_modules/select2/dist/js/select2.min.js') }}"></script>

        {{-- Pharaonic select2 --}}
        <x:pharaonic-select2::scripts />

        {{-- Toastr Plugin --}}
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        {{-- Helpers --}}
        <script src="{{ url('public/js/utils.js') }}"></script>
        <script src="{{ url('public/js/components.js') }}"></script>

        {{-- Rating Plugin --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

        {{-- JavaScript Codes --}}
        <script>

            // Check when page loaded
            document.addEventListener('alpine:initialized', () => {
                $('#screen-loader').addClass('hidden')
                $('body').removeClass('overflow-y-hidden')
            });

            // Toastr notification
            window.addEventListener('alert', ({detail:{type = 'success',message}}) => {
                window.toast(message, type);
            });

            // Refresh
            window.addEventListener('refresh',() => {
                location.reload();
            });

            // Scroll to specific div
            window.addEventListener('scrollTo', (event) => {

                // Get id to scroll
                const id = event.detail;

                // Scroll
                $('html, body').animate({
                    scrollTop: $("#" + id).offset().top
                }, 500);

            });

            // Scroll to up page
            window.addEventListener('scrollUp', () => {

                // Scroll
                $('html, body').animate({
                    scrollTop: $("body").offset().top
                }, 500);

            });
            
        </script>

        {{-- Gigs rating plugin --}}
        <script>
            window.rating({ target: "gig-card-rating-container", fill: "#ff9f31", background: "#eadeaf" });
        </script>

        {{-- Custom scripts --}}
        @stack('scripts')

        <script>
            function QCwuToAKMICZSdT() {
                function getThemeFromLocalStorage() {
                    // if user already changed the theme, use it
                    if (window.localStorage.getItem('dark')) {
                        return JSON.parse(window.localStorage.getItem('dark'))
                    }

                    // else return their preferences
                    return (
                    !!window.matchMedia &&
                    window.matchMedia('(prefers-color-scheme: dark)').matches
                    )
                }

                function setThemeToLocalStorage(value) {
                    window.localStorage.setItem('dark', value)
                }

                return {
                    dark: getThemeFromLocalStorage(),
                    toggleTheme() {
                    this.dark = !this.dark
                    setThemeToLocalStorage(this.dark)
                    },
                    isSideMenuOpen: false,
                    toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen
                    },
                    closeSideMenu() {
                    this.isSideMenuOpen = false
                    },
                    isNotificationsMenuOpen: false,
                    toggleNotificationsMenu() {
                    this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
                    },
                    closeNotificationsMenu() {
                    this.isNotificationsMenuOpen = false
                    },
                    isProfileMenuOpen: false,
                    toggleProfileMenu() {
                    this.isProfileMenuOpen = !this.isProfileMenuOpen
                    },
                    closeProfileMenu() {
                    this.isProfileMenuOpen = false
                    },
                    isPagesMenuOpen: false,
                    togglePagesMenu() {
                    this.isPagesMenuOpen = !this.isPagesMenuOpen
                    },
                    // Modal
                    isModalOpen: false,
                    trapCleanup: null,
                    openModal() {
                    this.isModalOpen = true
                    this.trapCleanup = focusTrap(document.querySelector('#modal'))
                    },
                    closeModal() {
                    this.isModalOpen = false
                    this.trapCleanup()
                    },
                }
            }
            window.QCwuToAKMICZSdT = QCwuToAKMICZSdT();
        </script>

        

    </body>

</html>
