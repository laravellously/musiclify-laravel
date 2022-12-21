<div class="container mx-auto" x-data="window.MfknHcARakpWgCf">
    <div class="min-h-full bg-white dark:bg-zinc-800 shadow rounded-md">
        
        @php
            
            // Set links
            $links = [
                ['href' => "seller/home", 'text' => __('messages.t_home'), 'active' => false],
                ['href' => "seller/orders", 'text' => __('messages.t_orders_history'), 'active' => true],
                ['href' => "seller/gigs", 'text' => __('messages.t_my_gigs'), 'active' => false],
                ['href' => "seller/reviews", 'text' => __('messages.t_reviews'), 'active' => false],
                ['href' => "seller/portfolio", 'text' => __('messages.t_portfolio'), 'active' => false],
                ['href' => "seller/earnings", 'text' => __('messages.t_earnings'), 'active' => false],
                ['href' => "seller/withdrawals", 'text' => __('messages.t_withdrawals'), 'active' => false],
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
                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 dark:text-gray-100 sm:text-2xl sm:truncate">{{ __('messages.t_requirements') }}</h1>

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

                    {{-- Back to orders --}}
                    <span class="block ltr:mr-3 rtl:ml-4">
                        <a href="{{ url('seller/orders') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-sm shadow-sm text-[12px] font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500">

                            {{-- LTR --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="hidden ltr:block h-5 w-5 mr-2 -ml-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>

                            {{-- RTL --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block h-5 w-5 ml-2 -mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>

                            {{ __('messages.t_back_to_orders') }}
                        </a>
                    </span>
                    
                </div>
            </div>
        </header>
      
        {{-- Section content --}}
        <div class="bg-white dark:bg-zinc-800 rounded-b-md py-10 px-8">            
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                {{-- Requirements // Buyer --}}
                <div class="col-span-12 md:col-span-6 xl:col-span-4">

                    {{-- Requirements --}}
                    <div class="p-8 border-dashed border-2 rounded-sm mb-6 dark:border-zinc-700">

                        {{-- Section title --}}
                        <div class="mb-8">
                            <h3 class="font-semibold dark:text-gray-200 tracking-wide text-gray-700 text-sm text-center">
                                {{ __('messages.t_required_info') }}
                            </h3>
                        </div>

                        {{-- List of required inputs --}}
                        @foreach ($item->requirements as $req)
                                        
                            {{-- Text field --}}
                            @if ($req->form_type === 'text')
                                <div class="w-full mb-8 block">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                        {{ $req->question }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $req->form_value }}
                                    </dd>
                                </div>
                            @endif
    
                            {{-- Multiple choice --}}
                            @if ($req->form_type === 'choice')
                                <div class="w-full mb-8 block">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                        {{ $req->question }}
                                    </dt>
                                    <dd class="mt-2 text-sm text-gray-900 dark:text-gray-100">
    
                                        {{-- Check if multiple choices --}}
                                        @if ( is_array($req->form_value) && count($req->form_value) )
                                        
                                            {{-- Loop through options --}}
                                            @foreach ($req->form_value as $key => $value)
                                                <div class="flex items-center mb-3">
                                                    <div class="flex items-center h-5">
                                                        <input type="checkbox" checked disabled class="h-4 w-4 text-gray-300 border-gray-300 rounded-sm border-2">
                                                    </div>
                                                    <div class="ltr:ml-3 rtl:mr-3 text-xs">
                                                        <label class="font-medium text-gray-700 dark:text-gray-100">{{ $value }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
    
                                        @else
    
                                            <div class="flex items-center mb-3">
                                                <div class="flex items-center h-5">
                                                    <input type="checkbox" checked disabled class="h-4 w-4 text-gray-300 border-gray-300 rounded-full border-2">
                                                </div>
                                                <div class="ltr:ml-3 rtl:mr-3 text-xs">
                                                    <label class="font-medium text-gray-700 dark:text-gray-100">{{ $req->form_value }}</label>
                                                </div>
                                            </div>
    
                                        @endif
                                        
                                    </dd>
                                </div>
                            @endif
    
                            {{-- File --}}
                            @if ($req->form_type === 'file')
                                <div class="w-full mb-8 block">
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                        {{ $req->question }}
                                    </dt>
                                    <dd class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                        <ul role="list" class="border border-gray-200 dark:border-zinc-700 rounded-md divide-y divide-gray-200 dark:divide-zinc-700">
                                            <li class="ltr:pl-3 rtl:pr-3 ltr:pr-4 rtl:pl-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path> </svg>
                                                    <span class="ltr:ml-2 rtl:mr-2 flex-1 w-0 truncate">
                                                        {{ $req->form_value['id'] }}.{{ $req->form_value['extension'] }}
                                                    </span>
                                                </div>
                                                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                                                    <a href="{{ url('uploads/requirements/' . $item->order->uid . '/' . $item->uid . '/' . $req->id . '/' . $req->form_value['id']) }}" target="_blank" class="font-medium text-primary-600 hover:text-primary-500">
                                                        {{ __('messages.t_download') }}
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                </div>
                            @endif
                            
                        @endforeach

                    </div>

                    {{-- Buyer --}}
                    <div class="p-8 border-dashed border-2 rounded-sm mb-6 dark:border-zinc-700">

                        {{-- Section title --}}
                        <div class="mb-8">
                            <h3 class="font-semibold dark:text-gray-200 tracking-wide text-gray-700 text-sm text-center">
                                {{ __('messages.t_buyer') }}
                            </h3>
                        </div>

                        <ul class="mt-2 divide-y divide-gray-100 dark:divide-zinc-700">

                            {{-- Username --}}
                            <li class="flex items-center justify-between py-3">
                                <div class="flex items-center">
                                    <img src="{{ src($item->order->buyer->avatar) }}" alt="{{ $item->order->buyer->username }}" class="h-8 w-8 rounded-full object-cover">
                                    <p class="ltr:ml-4 rtl:mr-4 text-sm font-medium text-gray-900 dark:text-gray-100 flex items-center">
                                        <span>{{ $item->order->buyer->username }}</span>
                                        @if ($item->order->buyer->status === 'verified')
                                            <svg data-tooltip-target="account-verified-badge" class="ltr:ml-0.5 rtl:mr-0.5" width="17px" height="17px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
                                            <div id="account-verified-badge" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                {{ __('messages.t_account_verified') }}
                                            </div>
                                        @endif
                                    </p>
                                </div>
                                <a href="{{ url('messages/new', $item->order->buyer->username) }}" target="_blank" class="ltr:ml-6 rtl:mr-16 rounded-md bg-transparent text-sm font-medium text-primary-600 hover:text-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2">{{ __('messages.t_contact') }}</a>
                            </li>
                            
                            {{-- Country --}}
                            @if ($item->order->buyer->country)
                                <li class="flex items-center justify-between py-3">
                                    <div class="flex items-center">
                                        <img src="{{ url('public/img/flags/rounded/'. strtolower($item->order->buyer->country?->code) .'.svg') }}" alt="{{ $item->order->buyer->country?->name }}" class="h-8 w-8 rounded-full object-cover">
                                        <p class="ltr:ml-4 rtl:mr-4 text-sm font-medium text-gray-900 dark:text-gray-100 flex items-center">{{ $item->order->buyer->country?->name }}</p>
                                    </div>
                                </li>
                            @endif
                            
                        </ul>

                    </div>

                </div>

                {{-- Order details // Gig --}}
                <div class="col-span-12 md:col-span-6 xl:col-span-4">

                    {{-- Order details --}}
                    <div class="p-8 border-dashed border-2 rounded-sm mb-6 dark:border-zinc-700">
                        <h3 class="font-semibold dark:text-gray-200 tracking-wide text-gray-700 text-sm text-center">{{ __('messages.t_order_details') }}</h3>
                        <dl class="mt-[22px] divide-y divide-gray-100 dark:divide-zinc-700">

                            {{-- Posted date --}}
                            <div class="flex justify-between py-3 text-xs font-medium">
                                <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_posted_date') }}</dt>
                                <dd class="text-gray-900 dark:text-gray-200">{{ format_date($item->placed_at, 'ago') }}</dd>
                            </div>

                            {{-- Expected delivery date --}}
                            <div class="flex justify-between py-3 text-xs font-medium">
                                <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_expected_delivery_date') }}</dt>
                                <dd class="text-red-600 animate-bounce">{{ format_date($item->expected_delivery_date, 'F j, Y h:i A') }}</dd>
                            </div>

                            {{-- Status --}}
                            <div class="flex justify-between py-3 text-xs font-medium">
                                <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_order_status') }}</dt>
                                <dd class="text-gray-900 dark:text-gray-200">
                                    @switch($item->status)

                                        {{-- Pending --}}
                                        @case('pending')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                {{ __('messages.t_pending') }}
                                            </span>
                                            @break
                                        
                                        {{-- Delivered --}}
                                        @case('delivered')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ __('messages.t_delivered') }}
                                            </span>
                                            @break

                                        {{-- Refunded --}}
                                        @case('refunded')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                {{ __('messages.t_refunded') }}
                                            </span>
                                            @break

                                        {{-- Proceeded --}}
                                        @case('proceeded')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ __('messages.t_in_the_process') }}
                                            </span>
                                            @break

                                        {{-- Canceled --}}
                                        @case('canceled')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                {{ __('messages.t_canceled') }}
                                            </span>
                                            @break

                                        @default
                                            
                                    @endswitch    
                                </dd>
                            </div>

                            {{-- Earning --}}
                            <div class="flex justify-between py-3 text-xs font-medium">
                                <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_profit') }}</dt>
                                <dd class="text-gray-900 dark:text-gray-200  font-black">@money($item->profit_value, settings('currency')->code, true)</dd>
                            </div>

                            {{-- Quatity --}}
                            <div class="flex justify-between py-3 text-xs font-medium">
                                <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_quantity') }}</dt>
                                <dd class="text-gray-900 dark:text-gray-200  font-black">{{ $item->quantity }}</dd>
                            </div>
                            
                        </dl>
                    </div>

                    {{-- Gig --}}
                    <div class="p-8 border-dashed border-2 rounded-sm mb-6 dark:border-zinc-700">
                        <h3 class="font-semibold dark:text-gray-200 tracking-wide text-gray-700 text-sm text-center">{{ __('messages.t_gig_details') }}</h3>
                        <a class="block mt-[22px]" href="{{ url('service', $item->gig->slug) }}" target="_blank">
                            <img
                              class="object-cover w-full h-56 rounded-xl"
                              src="{{ src($item->gig->thumbnail) }}"
                              alt="{{ $item->gig->title }}"
                            />
                          
                            <div class="py-4">
                                <h5 class="text-sm font-bold text-gray-900 dark:text-gray-100">
                                    {{ $item->gig->title }}
                                </h5>
                            </div>
                          </a>                          
                    </div>

                </div>

                {{-- Service upgrades // Actions --}}
                <div class="col-span-12 md:col-span-6 xl:col-span-4">

                    {{-- Service upgrades --}}
                    <div class="p-8 border-dashed border-2 rounded-sm mb-6 dark:border-zinc-700">
                        <h3 class="font-semibold dark:text-gray-200 tracking-wide text-gray-700 text-sm text-center">{{ __('messages.t_service_upgrades') }}</h3>

                        {{-- Check if order has upgrades --}}
                        @if ($item->upgrades()->count())
                            <dl class="mt-[22px] divide-y divide-gray-100 dark:divide-zinc-700">

                                {{-- List of upgrades --}}
                                @foreach ($item->upgrades as $upgrade)
                                    <div class="relative flex items-start py-4">
                                        <div class="flex items-center h-5">
                                            <input type="checkbox" class="h-4 w-4 text-gray-300 border-gray-200 dark:disabled:bg-zinc-700 dark:text-zinc-300 dark:border-zinc-700 border-2 rounded-sm cursor-not-allowed pointer-events-none" checked disabled>
                                        </div>
                                        <div class="ltr:ml-3 rtl:mr-3 text-sm mt-[-3px]">
                                            <label class="font-medium text-gray-500 dark:text-gray-200 text-xs">{{ $upgrade->title }}</label>
                                            <p class="font-normal text-gray-400">
                                                <div class="mt-1 flex text-sm">
                                                    <p class="text-gray-400 text-xs">+ @money($upgrade->price, settings('currency')->code, true)</p>
                                
                                                    @if ($upgrade->extra_days)
                                                        <p class="ltr:ml-4 ltr:pl-4 ltr:border-l rtl:mr-4 rtl:pr-4 rtl:border-r border-gray-200 text-gray-400 text-xs">
                                                            {{ __('messages.t_extra_days_delivery_time_short', ['time' => delivery_time_trans($upgrade->extra_days)]) }}
                                                        </p>
                                                    @else
                                                        <p class="ltr:ml-4 ltr:pl-4 ltr:border-l rtl:mr-4 rtl:pr-4 rtl:border-r border-gray-200 dark:border-zinc-700 text-gray-400 text-xs">
                                                            {{ __('messages.t_no_changes_delivery_time') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach

                            </dl>
                        @else
                            <div class="py-14 px-6 text-center text-sm">
                                <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/> </svg>
                                <p class="mt-4 font-semibold text-gray-900 dark:text-gray-200">{{ __('messages.t_no_upgrades_selected') }}</p>
                                <p class="mt-2 text-gray-500 dark:text-gray-400">{{ __('messages.t_buyer_didnt_selected_any_upgrades_or_no_upgrades') }}</p>
                            </div>
                        @endif
                    </div>

                    {{-- Actions --}}
                    <div class="p-8 border-dashed border-2 rounded-sm dark:border-zinc-700">
                        <h3 class="font-semibold dark:text-gray-200 tracking-wide text-gray-700 text-sm text-center">{{ __('messages.t_actions') }}</h3>

                        <div class="mt-[26px] block">

                            {{-- Process the order --}}
                            @if ($item->status === 'pending' && $item->expected_delivery_date)
                                <div class="mb-4">
                                    <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_start_this_order_seller') }}') ? $wire.progress : ''" wire:target="progress" wire:loading.attr="disabled" type="button" class="px-4 py-4 w-full tracking-wide text-xs bg-indigo-100 outline-none rounded text-primary-700 font-medium active:scale-95 hover:bg-indigo-200 focus:bg-indigo-200 focus:ring-2 focus:ring-indigo-100 focus:ring-offset-2 disabled:bg-gray-400/80 disabled:cursor-not-allowed transition-colors duration-200">

                                        {{-- Loading indicator --}}
                                        <div wire:loading wire:target="progress">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                        </div>

                                        {{-- Button text --}}
                                        <div wire:loading.remove wire:target="progress">
                                            {{ __('messages.t_process_the_order') }}
                                        </div>

                                    </button>
                                </div>
                            @endif

                            {{-- Cancel order --}}
                            @if ($item->status === 'pending')
                                <div class="mb-4">
                                    <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_cancel_order') }}') ? $wire.cancel : ''" wire:target="cancel" wire:loading.attr="disabled" type="button" class="px-4 py-4 w-full tracking-wide text-xs bg-red-100 outline-none rounded text-red-700 font-medium active:scale-95 hover:bg-red-200 focus:bg-red-200 focus:ring-2 focus:ring-red-100 focus:ring-offset-2 disabled:bg-gray-400/80 disabled:cursor-not-allowed transition-colors duration-200">

                                        {{-- Loading indicator --}}
                                        <div wire:loading wire:target="cancel">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                        </div>

                                        {{-- Button text --}}
                                        <div wire:loading.remove wire:target="cancel">
                                            {{ __('messages.t_cancel_order') }}
                                        </div>

                                    </button>
                                </div>
                            @endif

                            {{-- Deliver order --}}
                            @if (in_array($item->status, ['proceeded', 'delivered']) && !$item->is_finished)
                                <div class="">
                                    <a href="{{ url('seller/orders/deliver', $item->uid) }}" class="block text-center px-4 py-4 w-full tracking-wide text-xs bg-green-100 outline-none rounded text-green-700 font-medium active:scale-95 hover:bg-green-200 focus:bg-green-200 focus:ring-2 focus:ring-green-100 focus:ring-offset-2 disabled:bg-gray-400/80 disabled:cursor-not-allowed transition-colors duration-200">
                                        {{ __('messages.t_deliver_work') }}
                                    </a>
                                </div>
                            @endif


                        </div>
                    </div>

                </div>

            </div>
        </div>
        
    </div>
</div>

@push('scripts')

    {{-- AlpineJs --}}
    <script>
        function MfknHcARakpWgCf() {
            return {

            }
        }
        window.MfknHcARakpWgCf = MfknHcARakpWgCf();
    </script>

@endpush