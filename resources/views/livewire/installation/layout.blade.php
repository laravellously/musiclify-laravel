<!DOCTYPE html>
<html dir="ltr">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Generate seo tags --}}
        {!! SEO::generate() !!}

        {{-- Favicon --}}
        <link rel="icon" type="image/png" href=""/>

        {{-- Fonts --}}
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">

        {{-- Livewire styles --}}
        @livewireStyles

        {{-- Styles --}}
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">

        {{-- Toastr Plugin --}}
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        {{-- Select2 --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css">

        {{-- Custom css --}}
        @stack('styles')

        <style>
            :root {
                --color-primary-h: {{ hex2hsl( '#4f46e5' )[0] }};
                --color-primary-s: {{ hex2hsl( '#4f46e5' )[1] }}%;
                --color-primary-l: {{ hex2hsl( '#4f46e5' )[2] }}%;
            }
            html {
                font-family: 'Heebo', sans-serif !important;
            }
        </style>

    </head>

    <body class="antialiased bg-[#fafafa] text-gray-600 min-h-full flex flex-col application application-ltr overflow-x-hidden overflow-y-hidden">

        {{-- Content --}}
        <main class="flex-grow">
            <div class="container !max-w-full py-12 px-10 lg:px-24 pt-16 pb-24 space-y-8 min-h-screen">
                @yield('content')
            </div>
        </main>

        {{-- Livewire scripts --}}
        @livewireScripts

        {{-- AlpineJS Core --}}
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        {{-- jQuery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        {{-- Select2 --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        {{-- Pharaonic select2 --}}
        <x:pharaonic-select2::scripts />

        {{-- Flowbite --}}
        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

        {{-- Toastr Plugin --}}
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        {{-- Helpers --}}
        <script src="{{ url('public/js/utils.js') }}"></script>
        <script src="{{ url('public/js/components.js') }}"></script>


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

            // Scroll up on page change
            $(document).on('click', '.page-link-scroll-to-top', function (e) {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

            // Handle error
            // window.livewire.onError(statusCode => {
            //     alert(statusCode);
            //     return false;
            // });

        </script>

        {{-- Custom scripts --}}
        @stack('scripts')

    </body>

</html>