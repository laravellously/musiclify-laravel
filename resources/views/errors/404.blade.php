<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('messages.t_toast_something_went_wrong') }}</title>

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

    {{-- Styles --}}
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">

</head>
<body class="h-full">

    <div class="min-h-full px-4 py-16 bg-gray-50 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
        <div class="mx-auto max-w-max">
            <main class="sm:flex">
                <p class="text-4xl font-extrabold text-primary-600 sm:text-5xl">OOPS!</p>
                <div class="sm:ml-6">
                    <div class="sm:border-l sm:border-gray-200 sm:pl-6">
                        <h1 class="text-2xl font-extrabold tracking-widest text-gray-900 uppercase sm:text-3xl">
                            @lang('messages.t_page_not_fount')
                        </h1>
                        <p class="mt-1 text-base text-gray-500">
                            @lang('messages.t_pls_check_url_address_bar_try_again')
                        </p>
                    </div>
                    <div class="flex mt-10 space-x-3 sm:border-l sm:border-transparent sm:pl-6">
                        <a href="{{ url('/') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                            @lang('messages.t_back_to_homepage')
                        </a>
                        <a href="{{ url('help/contact') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium bg-indigo-100 border border-transparent rounded-md text-primary-700 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                            @lang('messages.t_contact_us')
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>
</html>
