<div class="container mx-auto" x-data="window.ifXFGCJDwVUeODj">

    {{-- Success --}}
    @if (session()->has('success'))
        <div class="w-full mb-8">
            <div class="rounded-md bg-green-50 dark:bg-zinc-700 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400 dark:text-zinc-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ltr:ml-3 rtl:mr-3">
                        <p class="text-sm font-medium text-green-800 dark:text-zinc-400">{{ session()->get('success') }}</p>
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
                ['href' => "seller/gigs", 'text' => __('messages.t_my_gigs'), 'active' => true],
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
                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 dark:text-gray-100 sm:text-2xl sm:truncate">{{ __('messages.t_my_gigs') }}</h1>

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

                    {{-- Withdrawal earnings --}}
                    <span class="block ltr:mr-3 rtl:ml-4">
                        <a href="{{ url('seller/withdrawals/create') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-500 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-primary-600">
                            {{ __('messages.t_withdrawal_earnings') }}
                        </a>
                    </span>
        
                    {{-- Publish new gig --}}
                    <span class="block ltr:mr-3 rtl:ml-4 spacere">
                        <a href="{{ url('create') }}" class="inline-flex items-center px-4 py-2 border border-primary-600 rounded-sm shadow-sm text-[13px] font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-50 focus:ring-primary-600">
                            {{ __('messages.t_publish_new_gig') }}
                        </a>
                    </span>
                    
                </div>
            </div>
        </header>
      
        {{-- Section content --}}
        <main class="pb-16">
            
            {{-- gigs --}}
            <div class="w-full">
                <div class="flex flex-col">
                    <div class="-my-2">
                        <div class="inline-block w-full py-2 align-middle overflow-y-auto">
                            <table class="w-full divide-y divide-gray-200 dark:divide-zinc-600"dark:divide-zinc-700">
                                <thead class="bg-gray-50 dark:bg-zinc-600">
                                    <tr class="divide-x divide-gray-50 dark:divide-zinc-600"dark:divide-zinc-600">
                                        <th scope="col" class="px-10 py-3 ltr:text-left rtl:text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.t_gig') }}</th>
                                        <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.t_price') }}</th>
                                        <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.t_rating') }}</th>
                                        <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.t_sales') }}</th>
                                        <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.t_clicks') }}</th>
                                        <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.t_status') }}</th>
                                        <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.t_options') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-zinc-700 divide-y divide-gray-200 dark:divide-zinc-600">

                                    @forelse ($gigs as $gig)                                        
                                        <tr wire:key="seller-gigs-id-{{ $gig->uid }}">

                                            {{-- Gig --}}
                                            <td class="whitespace-nowrap py-4 ltr:pl-10 rtl:pr-10 ltr:pr-3 rtl:pl-3 text-sm font-medium text-gray-900 dark:text-gray-200 sm:ltr:pl-10 sm:rtl:pr-10">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ src($gig->thumbnail) }}" alt="{{ $gig->title }}">
                                                    </div>
                                                    <div class="ltr:ml-4 rtl:mr-4">
                                                        <a href="{{ url('service', $gig->slug) }}" target="_blank" class="font-medium text-gray-900 dark:text-gray-200 pb-1 hover:text-primary-600 block">{{ $gig->title }}</a>
                                                        <div class="text-gray-500 font-normal">
                                                            <nav class="flex" aria-label="Breadcrumb">
                                                                <ol role="list" class="flex items-center space-x-4 rtl:space-x-reverse">
                                                                    
                                                                    {{-- Parent category --}}
                                                                    <li>
                                                                        <div class="flex items-center">
                                                                            <a href="{{ url('categories', $gig->category->slug) }}" target="_blank" class="text-xs font-normal text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">{{ $gig->category->name }}</a>
                                                                        </div>
                                                                    </li>
                                                            
                                                                    {{-- Subcategory --}}
                                                                    <li>
                                                                        <div class="flex items-center">

                                                                            {{-- LTR --}}
                                                                            <svg class="hidden ltr:block flex-shrink-0 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/> </svg>

                                                                            {{-- RTL --}}
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                                                            <a href="{{ url('categories/' . $gig->category->slug . '/' . $gig->subcategory->slug) }}" target="_blank" class="ltr:ml-4 rtl:mr-4 text-xs font-normal text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200" aria-current="page">{{ $gig->subcategory->name }}</a>
                                                                        </div>
                                                                    </li>
                                                                </ol>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </td>

                                            {{-- Price --}}
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">
                                                <div class="text-gray-900 dark:text-gray-100 text-sm font-black ">@money($gig->price, settings('currency')->code, true)</div>
                                                <div class="text-gray-500 dark:text-gray-300 text-xs">{{ __('messages.t_number_days_for_delivery', ['number' => $gig->delivery_time]) }}</div>
                                            </td>

                                            {{-- Rating --}}
                                            <td class="text-center">
                                                <div class="gig_rating_container mx-auto mb-1 z-0" data-rating-value="{{ $gig->rating }}"></div>
                                                <div class="text-xs text-gray-400">{{ __('messages.t_number_reviews', ['number' => number_format($gig->counter_reviews)]) }}</div>
                                            </td>

                                            {{-- Sales --}}
                                            <td class="text-center font-medium text-sm text-gray-800 dark:text-gray-300">
                                                {{ number_format($gig->counter_sales) }}
                                                <p class="text-xs text-gray-400 tracking-wide font-normal">{{ __('messages.t_number_orders_in_queue', ['number' => $gig->orders_in_queue]) }}</p>
                                            </td>

                                            {{-- Clicks --}}
                                            <td class="text-center font-medium text-sm text-gray-800 dark:text-gray-300">
                                                {{ number_format($gig->counter_visits) }}
                                            </td>

                                            {{-- Status --}}
                                            <td class="whitespace-nowrap text-center py-4 px-3">
                                                @switch($gig->status)

                                                    {{-- Pending --}}
                                                    @case('pending')
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                            {{ __('messages.t_pending') }}
                                                        </span>
                                                        @break
                                                    
                                                    {{-- Active --}}
                                                    @case('active')
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                            {{ __('messages.t_active') }}
                                                        </span>
                                                        @break

                                                    {{-- Deleted --}}
                                                    @case('deleted')
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                            {{ __('messages.t_deleted') }}
                                                        </span>
                                                        @break

                                                    {{-- Featured --}}
                                                    @case('featured')
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                            {{ __('messages.t_featured') }}
                                                        </span>
                                                        @break

                                                    {{-- Trending --}}
                                                    @case('trending')
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                            {{ __('messages.t_trending') }}
                                                        </span>
                                                        @break

                                                    {{-- Boosted --}}
                                                    @case('boosted')
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                            {{ __('messages.t_boosted') }}
                                                        </span>
                                                        @break

                                                    @default
                                                        
                                                @endswitch
                                            </td>

                                            {{-- Options --}}
                                            <td class="text-center">
                                                <div class="relative inline-block text-left">
                                                    <div class="z-0">
                                                        <button data-dropdown-toggle="seller-gigs-options-{{ $gig->uid }}" data-dropdown-placement="left-start" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white dark:bg-zinc-600 dark:hover:bg-zinc-700 hover:bg-gray-50 focus:outline-none focus:ring-0 z-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                                        </button>
                                                    </div>
                                                    <div id="seller-gigs-options-{{ $gig->uid }}" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white dark:bg-zinc-800 dark:divide-zinc-700 ring-1 ring-black ring-opacity-5 divide-y divide-gray-100ing-opacity-5 divide-gray-100 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                                        <div class="py-1" role="none">

                                                            {{-- Edit --}}
                                                            <a href="{{ url('seller/gigs/edit/' . $gig->uid . '?step=overview') }}" class="text-gray-800 dark:text-gray-300 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                                                <svg class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/> <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"/> </svg>
                                                                <span class="text-xs font-medium">{{ __('messages.t_edit_gig') }}</span>
                                                            </a>

                                                            {{-- Analytics --}}
                                                            <a href="{{ url('seller/gigs/analytics', $gig->uid) }}" class="text-gray-800 dark:text-gray-300 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/></svg>
                                                                <span class="text-xs font-medium">{{ __('messages.t_gig_analytics') }}</span>
                                                            </a>

                                                        </div>

                                                        {{-- Delete --}}
                                                        <div class="py-1" role="none">
                                                                <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_delete_gig') }}') ? $wire.delete('{{ $gig->uid }}') : ''" wire:loading.attr="disabled" wire:target="delete('{{ $gig->uid }}')" type="button" class="text-gray-800 dark:text-gray-300 dark:hover:text-gray-400 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >

                                                                    {{-- Loading indicator --}}
                                                                    <div wire:loading wire:target="delete('{{ $gig->uid }}')">
                                                                        <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                        </svg>
                                                                    </div>

                                                                    {{-- Icon --}}
                                                                    <div wire:loading.remove wire:target="delete('{{ $gig->uid }}')">
                                                                        <svg class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                                                                    </div>

                                                                    <span class="text-xs font-medium">{{ __('messages.t_delete_gig') }}</span>

                                                                </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                        
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pages --}}
            @if ($gigs->hasPages())
                <div class="flex justify-center pt-12">
                    {!! $gigs->links('pagination::tailwind') !!}
                </div>
            @endif

        </main>
        
    </div>
</div>

@push('scripts')

    {{-- Rating plugin --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        const rating_containers = document.getElementsByClassName('gig_rating_container');
        
        for (let index = 0; index < rating_containers.length; index++) {

            const element = rating_containers[index];

            $(element).rateYo({
                rating    : element.getAttribute('data-rating-value'),
                starWidth : "16px",
                ratedFill : "#111827",
                normalFill: "#b8b8b8",
                halfStar  : true,
                readOnly  : true,
                rtl: true,
                "starSvg": '<svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>'
            });
            
            var show = document.getElementsByClassName('showandhide');
        }
        
    </script>

    {{-- AlpineJs --}}
    <script>
        function ifXFGCJDwVUeODj() {
            return {

            }
        }
        window.ifXFGCJDwVUeODj = ifXFGCJDwVUeODj();
    </script>

@endpush

@push('styles')

    {{-- Rating Plugin --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

@endpush