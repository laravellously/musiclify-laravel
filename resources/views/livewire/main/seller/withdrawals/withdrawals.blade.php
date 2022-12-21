<div class="container mx-auto" x-data="window.xXYTvEuUwBxUJgG">

    {{-- Session Messages --}}
    @if (session()->has('success'))
        <div class="rounded-md bg-green-100 dark:bg-zinc-700/40 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400 dark:text-zinc-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/> </svg>
                </div>
                <div class="ltr:ml-3 rtl:mr-3">
                    <h3 class="text-sm font-medium text-green-800 dark:text-zinc-400">{{ __('messages.t_congratulations') }}</h3>
                    <div class="mt-2 text-sm text-green-700 dark:text-zinc-500">
                        <p>{{ session()->get('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Error --}}
    @if (session()->has('message'))
        <div class="rounded-md bg-yellow-100 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                </div>
                <div class="ltr:ml-3 rtl:mr-3">
                    <h3 class="text-sm font-medium text-yellow-800">{{ __('messages.t_attention_needed') }}</h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <p>{{ session()->get('message') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="min-h-full bg-white dark:bg-zinc-800 shadow rounded-md">
        
        @php
            
            // Set links
            $links = [
                ['href' => "seller/home", 'text' => __('messages.t_home'), 'active' => false],
                ['href' => "seller/orders", 'text' => __('messages.t_orders_history'), 'active' => false],
                ['href' => "seller/gigs", 'text' => __('messages.t_my_gigs'), 'active' => false],
                ['href' => "seller/reviews", 'text' => __('messages.t_reviews'), 'active' => false],
                ['href' => "seller/portfolio", 'text' => __('messages.t_portfolio'), 'active' => false],
                ['href' => "seller/earnings", 'text' => __('messages.t_earnings'), 'active' => false],
                ['href' => "seller/withdrawals", 'text' => __('messages.t_withdrawals'), 'active' => true],
                ['href' => "seller/refunds", 'text' => __('messages.t_refunds'), 'active' => false],
            ]

        @endphp
        
        {{-- Section Navbar --}}
        <nav class="" x-data="{ open:false }">
            <div class="mx-auto border-b border-gray-200 dark:border-zinc-700 px-4 sm:px-6 lg:px-8">
                <div class="relative h-16 flex items-center justify-between">

                    {{-- Header links (Desktop) --}}
                    <div class="flex items-center">
                        <div class="hidden lg:block lg:ml-10">
                            <div class="flex space-x-4 rtl:space-x-reverse">

                                @foreach ($links as $link)
                                    <a href="{{ url($link['href']) }}" class="{{ $link['active'] ? 'bg-gray-100 dark:bg-zinc-700' : 'hover:text-gray-700 hover:bg-gray-50 dark:hover:bg-zinc-700 dark:hover:text-gray-200' }} px-3 py-2 rounded-md text-sm font-medium text-gray-900 dark:text-gray-300" aria-current="page">{{ $link['text'] }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>
        
                    {{-- Header links mobile --}}
                    <div class="flex lg:hidden">
                        
                        {{-- Burger menu button --}}
                        <button type="button" class="bg-gray-50 dark:bg-zinc-700 p-2 inline-flex items-center justify-center rounded-md text-gray-400 dark:text-gray-400 hover:text-gray-500 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-zinc-600 focus:outline-none" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                            <span class="sr-only">Open main menu</span>
                            <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 hidden" :class="{'hidden': open, 'block': !(open)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path> </svg> <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 block" :class="{'block': open, 'hidden': !(open)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> </svg>
                        </button>

                          
                    </div>
        
                    {{-- Pending orders --}}
                    @if (auth()->user()->sales->where('status', 'pending')->count())
                        <div class="hidden lg:block">
                            <span class="relative inline-flex">
                                <span class="inline-flex items-center px-4 py-2 font-medium leading-6 text-xs transition ease-in-out duration-150 text-amber-600">
                                    {{ __('messages.t_number_pending_orders', ['number' => number_format(auth()->user()->sales->where('status', 'pending')->count())]) }}
                                </span>
                                <span class="flex absolute h-3 w-3 top-[13px] ltr:-left-1 rtl:-right-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-500 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-600"></span>
                                </span>
                            </span>
                        </div>
                    @endif

                </div>
            </div>

            {{-- Mobile menu --}}
            <div class="bg-gray-100 dark:bg-zinc-700 border-b border-gray-200 dark:border-zinc-700 lg:hidden" x-show="open">
                <div class="px-2 pt-2 pb-3 space-y-1">
                  
                    @foreach ($links as $link)
                        <a href="{{ url($link['href']) }}" class="{{ $link['active'] ? 'bg-gray-200 dark:bg-zinc-600' : 'hover:bg-gray-200 dark:hover:bg-zinc-600' }} block px-3 py-2 rounded-md font-bold tracking-wide text-gray-900 dark:text-gray-200 text-xs">
                            {{ $link['text'] }}
                        </a>
                    @endforeach
                  
                </div>
            </div>

        </nav>
      
        {{-- Section heading --}}
        <header class="bg-gray-50 dark:bg-zinc-700 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-between">
                <div class="flex-1 min-w-0">

                    {{-- Breadcrumb --}}
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol role="list" class="flex items-center space-x-4 rtl:space-x-reverse">

                            {{-- Main homepage --}}
                            <li>
                                <div>
                                    <a href="{{ url('/') }}" class="text-sm font-medium text-gray-500 dark:text-gray-300 dark:hover:text-gray-200 hover:text-gray-700">{{ __('messages.t_home') }}</a>
                                </div>
                            </li>

                            {{-- Seller dashboard --}}
                            <li>
                                <div class="flex items-center">

                                    {{-- LTR --}}
                                    <svg class="hidden ltr:block flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>

                                    {{-- RTL --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-5 w-5 text-gray-400 viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                    <a href="{{ url('seller/home') }}" class="ltr:ml-4 rtl:mr-4 text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-200">{{ __('messages.t_dashboard') }}</a>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    {{-- Title --}}
                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 dark:text-gray-100 sm:text-2xl sm:truncate">{{ __('messages.t_withdrawals') }}</h1>

                    {{-- Quick stats --}}
                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-8 rtl:space-x-reverse">

                        {{-- User level --}}
                        <div class="mt-2 flex items-center text-xs font-medium" style="color: {{ auth()->user()->level->level_color }}">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4" style="color: {{ auth()->user()->level->level_color }};margin-top: -3px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/> <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/> </svg>
                            {{ auth()->user()->level->title }}
                        </div>

                        {{-- Succeeded sales --}}
                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>
                            {{ __('messages.t_total_sales_number', ['number' => number_format(auth()->user()->sales->where('status', 'delivered')->where('is_finished', true)->count())]) }}
                        </div>

                        {{-- Country --}}
                        @if (auth()->user()->country)
                            <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                                <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/> </svg>
                                {{ auth()->user()->country->name }}
                            </div>
                        @endif

                        {{-- Sign up date --}}
                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/> </svg>
                            {{ __('messages.t_signed_up_on_date', ['date' => format_date(auth()->user()->created_at, 'F j, Y')]) }}
                        </div>
                    
                    </div>

                </div>
                <div class="mt-5 flex xl:mt-0 xl:ltr:ml-4 xl:rtl:mr-4">

                    {{-- Make withdrawal --}}
                    <span class="block ltr:ml-3 rtl:pr-3">
                        <a href="{{ url('seller/withdrawals/create') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-500 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-primary-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            {{ __('messages.t_make_withdrawal') }}
                        </a>
                    </span>
        
                    {{-- Withdrawal settings --}}
                    <span class="block ltr:ml-3 rtl:pr-3">
                        <a href="{{ url('seller/withdrawals/settings') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-500 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-primary-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/> <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ __('messages.t_withdrawal_settings') }}
                        </a>
                    </span>
                    
                </div>
            </div>
        </header>
      
        <main class="pb-12">
            <div class="bg-transparent sm:overflow-hidden">
                <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-zinc-700">
                            <thead class="bg-gray-50 dark:bg-zinc-600">
                                <tr>

                                    {{-- Date --}}
                                    <th scope="col" class="px-10 py-3 ltr:text-left rtl:text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('messages.t_date') }}
                                    </th>

                                    {{-- For --}}
                                    <th scope="col" class="px-10 py-3 ltr:text-left rtl:text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                            {{ __('messages.t_for') }}
                                    </th>

                                    {{-- Amount --}}
                                    <th scope="col" class="px-10 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                            {{ __('messages.t_amount') }}
                                    </th>

                                    {{-- Status --}}
                                    <th scope="col" class="px-10 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                            {{ __('messages.t_status') }}
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-zinc-700 divide-y divide-gray-200 dark:divide-zinc-600">
                                
                                @foreach ($withdrawals as $w)
                                    <tr>

                                        {{-- Date --}}
                                        <td class="px-10 py-6 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-300">
                                            {{ format_date($w->created_at, 'F j, Y') }}
                                        </td>

                                        {{-- For --}}
                                        <td class="px-10 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200 flex items-center">
                                            
                                            {{-- PayPal --}}
                                            @if ($w->gateway_provider_name === 'paypal')
                                                <svg class="h-4 w-4 ltr:mr-2 rtl:ml-2" viewBox="-23 0 302 302" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid"><g><path d="M217.168476,23.5070146 C203.234077,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.3030619,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.076601 C-0.637664968,263.946149 3.13311322,268.357876 8.06925331,268.357876 L65.804612,268.357876 L80.3050438,176.385849 L79.8555471,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.46841,167.970272 C174.366398,167.970272 216.569147,146.078116 228.897012,82.7490197 C229.263268,80.8761167 229.579581,79.0531577 229.854273,77.2718188 C228.297683,76.4477414 228.297683,76.4477414 229.854273,77.2718188 C233.525163,53.8646924 229.829301,37.9325302 217.168476,23.5070146" fill="#27346A"></path><path d="M102.396976,68.8395929 C103.936919,68.1070797 105.651665,67.699203 107.449652,67.699203 L180.767565,67.699203 C189.449511,67.699203 197.548776,68.265236 204.948824,69.4555699 C207.071448,69.7968545 209.127479,70.1880831 211.125242,70.6375799 C213.123006,71.0787526 215.062501,71.5781934 216.943728,72.1275783 C217.884341,72.4022708 218.808307,72.6852872 219.715624,72.9849517 C223.353218,74.2002577 226.741092,75.61534 229.854273,77.2718188 C233.525163,53.8563683 229.829301,37.9325302 217.168476,23.5070146 C203.225753,7.62479651 178.045612,0.815753338 145.823355,0.815753338 L52.2947379,0.815753338 C45.7104431,0.815753338 40.1083819,5.6103852 39.0762042,12.1114399 L0.136468302,259.068277 C-0.637664968,263.946149 3.13311322,268.349552 8.0609293,268.349552 L65.804612,268.349552 L95.8875974,77.5798073 C96.5035744,73.6675208 99.0174265,70.4627756 102.396976,68.8395929 Z" fill="#27346A"></path><path d="M228.897012,82.7490197 C216.569147,146.069792 174.366398,167.970272 120.46841,167.970272 L93.0241367,167.970272 C86.4398419,167.970272 80.8794007,172.764903 79.8555471,179.265958 L61.8174095,293.621258 C61.1431644,297.883153 64.4394738,301.745495 68.7513129,301.745495 L117.421821,301.745495 C123.182038,301.745495 128.084882,297.550192 128.983876,291.864891 L129.458344,289.384335 L138.631407,231.249423 L139.222412,228.036354 C140.121406,222.351053 145.02425,218.15575 150.784467,218.15575 L158.067979,218.15575 C205.215193,218.15575 242.132193,199.002194 252.920115,143.605884 C257.423406,120.456802 255.092683,101.128442 243.181019,87.5519756 C239.568397,83.4399129 235.081754,80.0437153 229.854273,77.2718188 C229.571257,79.0614817 229.263268,80.8761167 228.897012,82.7490197 L228.897012,82.7490197 Z" fill="#2790C3"></path><path d="M216.952052,72.1275783 C215.070825,71.5781934 213.13133,71.0787526 211.133566,70.6375799 C209.135803,70.1964071 207.071448,69.8051785 204.957148,69.4638939 C197.548776,68.265236 189.457835,67.699203 180.767565,67.699203 L107.457976,67.699203 C105.651665,67.699203 103.936919,68.1070797 102.4053,68.8479169 C99.0174265,70.4710996 96.5118984,73.6675208 95.8959214,77.5881313 L80.3133678,176.385849 L79.8638711,179.265958 C80.8877248,172.764903 86.4481659,167.970272 93.0324607,167.970272 L120.476734,167.970272 C174.374722,167.970272 216.577471,146.078116 228.905336,82.7490197 C229.271592,80.8761167 229.579581,79.0614817 229.862597,77.2718188 C226.741092,75.623664 223.361542,74.2002577 219.723948,72.9932757 C218.816631,72.6936112 217.892665,72.4022708 216.952052,72.1275783" fill="#1F264F"></path></g></svg>
                                                <span class="font-medium text-sm">{{ $w->gateway_provider_id }}</span>
                                            @elseif ($w->gateway_provider_name === 'offline')
                                                @if (settings('offline_payment')->logo)
                                                    <img class="h-5 ltr:mr-2 rtl:ml-2" src="{{ src(settings('offline_payment')->logo) }}" alt="{{ settings('offline_payment')->name }}">
                                                @endif
                                                <span class="font-medium text-sm">{{ $w->gateway_provider_id }}</span>
                                            @endif

                                        </td>

                                        {{-- Amount --}}
                                        <td class="px-10 py-6 whitespace-nowrap text-sm text-gray-900 dark:text-white font-black text-center">
                                            @money($w->amount, settings('currency')->code, true)
                                        </td>

                                        {{-- Status --}}
                                        <td class="px-10 py-4 whitespace-nowrap text-center text-sm font-bold">
                                            @switch($w->status)

                                                @case('pending')
                                                    <span class="text-amber-500">{{ __('messages.t_pending') }}</span>
                                                    @break
                                                @case('paid')
                                                    <span class="text-green-500">{{ __('messages.t_paid') }}</span>
                                                    @break
                                                @case('rejected')
                                                    <span class="text-red-500">{{ __('messages.t_rejected') }}</span>
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                        </td>

                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            {{-- Pages --}}
            @if ($withdrawals->hasPages())
                <div class="flex justify-center pt-12">
                    {!! $withdrawals->links('pagination::tailwind') !!}
                </div>
            @endif

        </main>

    </div>
</div>

@push('scripts')
    
    {{-- AlpineJs --}}
    <script>
        function xXYTvEuUwBxUJgG() {
            return {

            }
        }
        window.xXYTvEuUwBxUJgG = xXYTvEuUwBxUJgG();
    </script>

@endpush