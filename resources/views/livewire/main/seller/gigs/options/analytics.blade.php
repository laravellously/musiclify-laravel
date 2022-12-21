<div class="container mx-auto" x-data="window.qGzhGNlrGCLxvXf">

    {{-- Top section --}}
    <div class="min-h-full bg-white dark:bg-zinc-800 shadow rounded-md mb-8">
        
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
        <nav class="" x-data="{ open: false }">
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
        <header class="bg-gray-50 dark:bg-zinc-700 py-8 rounded-b-md">
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
                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 dark:text-gray-100 sm:text-2xl sm:truncate">{{ __('messages.t_gig_analytics') }}</h1>

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

                     {{-- Back to gigs --}}
                     <span class="block ltr:mr-3 rtl:ml-4">
                        <a href="{{ url('seller/gigs') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-500 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-primary-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 ltr:mr-2 rtl:ml-2" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>

                            {{ __('messages.t_back_to_gigs') }}
                        </a>
                    </span>
        
                    {{-- Share gig --}}
                    <span class="block ltr:mr-3 rtl:ml-4">
                        <button id="modals-share-btn" class="inline-flex items-center px-4 py-2 border border-primary-600 rounded-sm shadow-sm text-[13px] font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-50 focus:ring-primary-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-50 ltr:mr-2 rtl:ml-2" viewBox="0 0 20 20" fill="currentColor"> <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/></svg>

                            {{ __('messages.t_share_gig') }}
                        </button>
                    </span>
                    
                </div>
            </div>
        </header>

    </div>

    {{-- Analytics section --}}
    <main class="pb-12">
        <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

            {{-- Quick stats --}}
            <div class="col-span-12 z-[1]">
                <div class="grid grid-cols-12 sm:gap-x-6 gap-y-4">

                    {{-- Total sales --}}
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3">
                        <div class="relative block border border-gray-100 dark:border-zinc-700 p-5 mt-6 bg-white dark:bg-zinc-800 rounded-lg intro-x">
                            <div class="flex flex-wrap gap-3">
                                <div class="ltr:mr-auto rtl:ml-auto">
                                    <div class="text-gray-500 dark:text-gray-300 flex items-center leading-3 text-sm font-bold">
                                        {{ __('messages.t_total_sales') }}
                                    </div>
                                    <div class="text-black dark:text-gray-100 relative text-2xl font-black leading-5 mt-4">
                                        {{ number_format($gig->counter_sales) }}
                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400 dark:bg-zinc-700 dark:text-zinc-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Total visits --}}
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3">
                        <div class="relative block overflow-hidden border border-gray-100 dark:border-zinc-700 p-5 mt-6 bg-white dark:bg-zinc-800 rounded-lg intro-x">
                            <div class="flex flex-wrap gap-3">
                                <div class="ltr:mr-auto rtl:ml-auto">
                                    <div class="text-gray-500 dark:text-gray-300 flex items-center leading-3 text-sm font-bold">
                                        {{ __('messages.t_total_clicks') }}
                                    </div>
                                    <div class="text-black dark:text-gray-100 relative text-2xl font-black leading-5 mt-4">
                                        {{ number_format($gig->counter_visits) }}
                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400 dark:bg-zinc-700 dark:text-zinc-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M6.672 1.911a1 1 0 10-1.932.518l.259.966a1 1 0 001.932-.518l-.26-.966zM2.429 4.74a1 1 0 10-.517 1.932l.966.259a1 1 0 00.517-1.932l-.966-.26zm8.814-.569a1 1 0 00-1.415-1.414l-.707.707a1 1 0 101.415 1.415l.707-.708zm-7.071 7.072l.707-.707A1 1 0 003.465 9.12l-.708.707a1 1 0 001.415 1.415zm3.2-5.171a1 1 0 00-1.3 1.3l4 10a1 1 0 001.823.075l1.38-2.759 3.018 3.02a1 1 0 001.414-1.415l-3.019-3.02 2.76-1.379a1 1 0 00-.076-1.822l-10-4z" clip-rule="evenodd"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Total impressions --}}
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3">
                        <div class="relative block overflow-hidden border border-gray-100 dark:border-zinc-700 p-5 mt-6 bg-white dark:bg-zinc-800 rounded-lg intro-x">
                            <div class="flex flex-wrap gap-3">
                                <div class="ltr:mr-auto rtl:ml-auto">
                                    <div class="text-gray-500 dark:text-gray-300 flex items-center leading-3 text-sm font-bold">
                                        {{ __('messages.t_total_impressions') }}
                                    </div>
                                    <div class="text-black dark:text-gray-100 relative text-2xl font-black leading-5 mt-4">
                                        {{ number_format($gig->counter_impressions) }}
                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400 dark:bg-zinc-700 dark:text-zinc-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/> <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Total reviews --}}
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3">
                        <div class="relative block overflow-hidden border border-gray-100 dark:border-zinc-700 p-5 mt-6 bg-white dark:bg-zinc-800 rounded-lg intro-x">
                            <div class="flex flex-wrap gap-3">
                                <div class="ltr:mr-auto rtl:ml-auto">
                                    <div class="text-gray-500 dark:text-gray-300 flex items-center leading-3 text-sm font-bold">
                                        {{ __('messages.t_total_reviews') }}
                                    </div>
                                    <div class="text-black dark:text-gray-100 relative text-2xl font-black leading-5 mt-4">
                                        {{ number_format($gig->counter_reviews) }}
                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400 dark:bg-zinc-700 dark:text-zinc-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Left side --}}
            <div class="col-span-12 lg:col-span-5">

                {{-- Gig preview --}}
                <div class="bg-white dark:bg-zinc-800 relative block p-8 overflow-hidden border border-gray-100 dark:border-zinc-700 rounded-lg mb-6">
                    <span
                        class="absolute inset-x-0 bottom-0 h-2  bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"
                    ></span>

                    <div class="justify-between sm:flex">
                        <div>
                            <a href="{{ url('service', $gig->slug) }}" target="_blank" class="text-lg font-bold text-gray-900 dark:text-gray-100 hover:text-purple-700">
                                {{ $gig->title }}
                            </a>
                            <p class="text-[11px] font-[400] text-gray-400 dark:text-gray-300">{{ url('service', $gig->slug) }}</p>
                        </div>

                        <div class="flex-shrink-0 hidden ltr:ml-3 rtl:mr-3 sm:block">
                            <img
                                class="object-cover w-16 h-16 rounded-lg shadow-sm"
                                src="{{ src($gig->thumbnail) }}"
                                alt="{{ $gig->title }}"
                            />
                        </div>
                    </div>

                    <div class="border-t border-gray-50 dark:border-zinc-700 mt-6"></div>

                    {{-- Quick gig stats --}}
                    <dl class="flex mt-6">

                        {{-- Date published --}}
                        <div class="flex flex-col-reverse">
                            <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ format_date($gig->created_at, 'ago') }}</dt>
                            <dd class="text-[10px] uppercase tracking-widest text-gray-500 dark:text-gray-300">{{ __('messages.t_published') }}</dd>
                        </div>

                        {{-- Status --}}
                        <div class="flex flex-col-reverse ltr:ml-3 rtl:mr-3 ltr:sm:ml-6 rtl:sm:mr-6">
                            <dt class="text-sm font-medium text-gray-600 dark:text-gray-400">
                                @switch($gig->status)

                                    {{-- Pending --}}
                                    @case('pending')
                                        <span class="text-yellow-500">
                                            {{ __('messages.t_pending') }}
                                        </span>
                                        @break
                                    
                                    {{-- Active --}}
                                    @case('active')
                                        <span class="text-green-500">
                                            {{ __('messages.t_active') }}
                                        </span>
                                        @break

                                    {{-- Deleted --}}
                                    @case('deleted')
                                        <span class="text-red-500">
                                            {{ __('messages.t_deleted') }}
                                        </span>
                                        @break

                                    {{-- Featured --}}
                                    @case('featured')
                                        <span class="text-purple-500">
                                            {{ __('messages.t_featured') }}
                                        </span>
                                        @break

                                    {{-- Trending --}}
                                    @case('trending')
                                        <span class="text-blue-500">
                                            {{ __('messages.t_trending') }}
                                        </span>
                                        @break

                                    {{-- Boosted --}}
                                    @case('boosted')
                                        <span class="text-gray-500">
                                            {{ __('messages.t_boosted') }}
                                        </span>
                                        @break

                                    @default
                                        
                                @endswitch
                            </dt>
                            <dd class="text-[10px] uppercase tracking-widest text-gray-500 dark:text-gray-300">{{ __('messages.t_status') }}</dd>
                        </div>
                        
                    </dl>

                </div>

                {{-- Devices types --}}
                <div class="w-full">
                    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                        {{-- Section title --}}
                        <div class="bg-slate-50 px-8 py-4 rounded-t-md dark:bg-zinc-700">
                            <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                                <div class="ml-4 mt-4">
                                    <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_devices') }}</h3>
                                    <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_devices_chart_subtitle') }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Section content --}}
                        <div class="px-8 py-6">
                            <div id="chart-devices"></div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- Right side --}}
            <div class="col-span-12 lg:col-span-7">

                {{-- Country map --}}
                <div class="col-span-7">
                    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">
    
                        {{-- Section title --}}
                        <div class="bg-slate-50 px-8 py-4 rounded-t-md dark:bg-zinc-700">
                            <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                                <div class="ml-4 mt-4">
                                    <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_visitors_map') }}</h3>
                                    <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_visitors_map_subtitle') }}</p>
                                </div>
                            </div>
                        </div>
    
                        {{-- Section content --}}
                        <div class="px-8 py-6 min-h-[500px] grid">
                            <div id="world-map-visitors" class="w-full h-full"></div>
                        </div>
    
                    </div>
                </div>

            </div>

            {{-- Browsers --}}
            <div class="col-span-12 lg:col-span-7">
                <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                    {{-- Section title --}}
                    <div class="bg-slate-50 px-8 py-4 rounded-t-md dark:bg-zinc-700">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_browsers') }}</h3>
                                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_browsers_chart_subtitle') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Section content --}}
                    <div class="px-8 py-6">
                        <div id="chart-browsers"></div>
                    </div>

                </div>
            </div>

            {{-- Os --}}
            <div class="col-span-12 lg:col-span-5">
                <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                    {{-- Section title --}}
                    <div class="bg-slate-50 px-8 py-4 rounded-t-md dark:bg-zinc-700">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_os') }}</h3>
                                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_os_chart_subtitle') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Section content --}}
                    <div class="px-8 py-6">
                        <div id="chart-os"></div>
                    </div>

                </div>
            </div>

            {{-- Recent orders --}}
            <div class="col-span-12 lg:col-span-4 mt-3 2xl:mt-8">

                {{-- Section title --}}
                <div class="mb-6 bg-white shadow-sm rounded-md border border-gray-200 dark:bg-zinc-800 dark:border-zinc-700">
                    <div class="bg-slate-50 px-6 py-4 rounded-md dark:bg-zinc-700">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_recent_orders') }}</h3>
                                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_recent_orders_subtitle') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- List of recent orders --}}
                @forelse ($orders as $order)
                    <div class="intro-x">
                        <div class="bg-white rounded-lg px-5 py-3 mb-3 flex items-center zoom-in dark:bg-zinc-700">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="{{ $order->order->buyer->username }}" src="{{ src($order->order->buyer->avatar) }}">
                            </div>
                            <div class="ltr:ml-4 ltr:mr-auto rtl:mr-4 rtl:ml-auto">
                                <a href="{{ url('profile', $order->order->buyer->username) }}" class="block font-medium text-[13px] pb-0.5 dark:text-gray-200">{{ $order->order->buyer->username }}</a>
                                <div class="text-slate-500 text-xs mt-0.5 text-[11px]">{{ format_date($order->placed_at, 'F j Y') }}</div>
                            </div>
                            <div class="text-green-500 text-xs font-medium">+ @money($order->profit_value, settings('currency')->code, true)</div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-sm font-medium text-gray-400 p-5 dark:text-gray-300">
                        {{ __('messages.t_no_data_to_show_now') }}
                    </div>
                @endforelse

            </div>

            {{-- Top referrers --}}
            <div class="col-span-12 lg:col-span-4 mt-3 2xl:mt-8">

                {{-- Section title --}}
                <div class="mb-6 bg-white shadow-sm rounded-md border border-gray-200 dark:bg-zinc-800 dark:border-zinc-700">
                    <div class="bg-slate-50 px-6 py-4 rounded-md dark:bg-zinc-700">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_referrers') }}</h3>
                                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_referrers_subtitle') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- List of referrers --}}
                @forelse ($referrers as $ref)

                    <div class="intro-x">
                        <div class="flex space-x-3 rtl:space-x-reverse bg-white rounded-lg px-5 py-3 mb-3 justify-between items-center zoom-in">
                            <div class="w-10 h-10 flex justify-center items-center rounded-md overflow-hidden" style="background-color: {{ fake()->hexcolor() }}">
                                <span class="text-base font-black text-white">{{ getWebsiteFirstLetter($ref->visit_from) }}</span>
                            </div>
                            <div class="flex-1 space-y-1">
                                <div class="flex items-center justify-between">

                                    {{-- Check if our website or external website --}}
                                    @if (parse_url(url('/'))['host'] == $ref->visit_from)
                                        <div class="block font-medium text-[13px] pb-0.5 dark:text-gray-200">{{ $ref->visit_from }}</div>
                                    @else
                                        <a href="{{ url('redirect?to=' . safeEncrypt($ref->referrer)) }}" target="_blank" class="block font-medium text-[13px] pb-0.5 dark:text-gray-200">{{ $ref->visit_from }}</a>
                                    @endif

                                    <div class="text-gray-400 text-xs font-medium">{{ $ref->count }}</div>
                                </div>
                                <div class="text-slate-500 text-xs mt-0.5 text-[11px]">{{ $ref->referrer }}</div>
                            </div>
                        </div>
                    </div>
                    
                @empty
                    <div class="text-center text-sm font-medium text-gray-400 p-5 dark:text-gray-300">
                        {{ __('messages.t_no_data_to_show_now') }}
                    </div>
                @endforelse

            </div>

            {{-- Top visits by cities --}}
            <div class="col-span-12 lg:col-span-4 mt-3 2xl:mt-8">

                {{-- Section title --}}
                <div class="mb-6 bg-white shadow-sm rounded-md border border-gray-200 dark:bg-zinc-800 dark:border-zinc-700">
                    <div class="bg-slate-50 px-6 py-4 rounded-md dark:bg-zinc-700">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_cities') }}</h3>
                                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_most_visits_by_cities') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- List of cities --}}
                @forelse ($cities as $city)
                    <div class="intro-x">
                        <div class="bg-white rounded-lg px-5 py-3 mb-3 flex items-center zoom-in dark:bg-zinc-700">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden ring-gray-100 ring-1">
                                <img alt="{{ $city->country_name }}" src="{{ url('public/img/flags', strtolower("$city->country_code.svg")) }}">
                            </div>
                            <div class="ltr:ml-4 ltr:mr-auto rtl:mr-4 rtl:ml-auto">
                                <div class="block font-medium text-[13px] pb-0.5 dark:text-gray-200">{{ $city->city }}</div>
                                <div class="text-slate-500 text-xs mt-0.5 text-[11px]">{{ $city->country_name }}</div>
                            </div>
                            <div class="text-gray-500 text-xs font-medium">{{ $city->count }}</div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-sm font-medium text-gray-400 p-5 dark:text-gray-300">
                        {{ __('messages.t_no_data_to_show_now') }}
                    </div>
                @endforelse

            </div>

        </div>

    </main>
    
    {{-- Modals (Share gig) --}}
    <x-forms.modal id="modals-share-container" target="modals-share-btn" uid="modal_{{ uid() }}" placement="center-center" size="max-w-2xl">

        {{-- Header --}}
        <x-slot name="title">{{ __('messages.t_share_this_gig') }}</x-slot>

        {{-- Content --}}
        <x-slot name="content">
            <div class="flex items-center justify-center">

                {{-- Facebook --}}
                <div class="grid items-center justify-center mx-4">
                    <a href="https://www.facebook.com/share.php?u={{ url('service', $gig->slug) }}&t={{ $gig->title }}" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#3b5998] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M374.244,285.825l14.105,-91.961l-88.233,0l0,-59.677c0,-25.159 12.325,-49.682 51.845,-49.682l40.116,0l0,-78.291c0,0 -36.407,-6.214 -71.213,-6.214c-72.67,0 -120.165,44.042 -120.165,123.775l0,70.089l-80.777,0l0,91.961l80.777,0l0,222.31c16.197,2.541 32.798,3.865 49.709,3.865c16.911,0 33.511,-1.324 49.708,-3.865l0,-222.31l74.128,0Z"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest">{{ __('messages.t_facebook') }}</span>
                </div>

                {{-- Twitter --}}
                <div class="grid items-center justify-center mx-4">
                    <a href="https://twitter.com/intent/tweet?text={{ $gig->title }}%20-%20{{ url('service', $gig->slug) }}%20" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#1da1f2] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M161.014,464.013c193.208,0 298.885,-160.071 298.885,-298.885c0,-4.546 0,-9.072 -0.307,-13.578c20.558,-14.871 38.305,-33.282 52.408,-54.374c-19.171,8.495 -39.51,14.065 -60.334,16.527c21.924,-13.124 38.343,-33.782 46.182,-58.102c-20.619,12.235 -43.18,20.859 -66.703,25.498c-19.862,-21.121 -47.602,-33.112 -76.593,-33.112c-57.682,0 -105.145,47.464 -105.145,105.144c0,8.002 0.914,15.979 2.722,23.773c-84.418,-4.231 -163.18,-44.161 -216.494,-109.752c-27.724,47.726 -13.379,109.576 32.522,140.226c-16.715,-0.495 -33.071,-5.005 -47.677,-13.148l0,1.331c0.014,49.814 35.447,93.111 84.275,102.974c-15.464,4.217 -31.693,4.833 -47.431,1.802c13.727,42.685 53.311,72.108 98.14,72.95c-37.19,29.227 -83.157,45.103 -130.458,45.056c-8.358,-0.016 -16.708,-0.522 -25.006,-1.516c48.034,30.825 103.94,47.18 161.014,47.104" style="fill-rule:nonzero;"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest">{{ __('messages.t_twitter') }}</span>
                </div>

                {{-- Linkedin --}}
                <div class="grid items-center justify-center mx-4">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url('service', $gig->slug) }}&title={{ $gig->title }}&summary={{ $gig->title }}" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#0a66c2] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M473.305,-1.353c20.88,0 37.885,16.533 37.885,36.926l0,438.251c0,20.393 -17.005,36.954 -37.885,36.954l-436.459,0c-20.839,0 -37.773,-16.561 -37.773,-36.954l0,-438.251c0,-20.393 16.934,-36.926 37.773,-36.926l436.459,0Zm-37.829,436.389l0,-134.034c0,-65.822 -14.212,-116.427 -91.12,-116.427c-36.955,0 -61.739,20.263 -71.867,39.476l-1.04,0l0,-33.411l-72.811,0l0,244.396l75.866,0l0,-120.878c0,-31.883 6.031,-62.773 45.554,-62.773c38.981,0 39.468,36.461 39.468,64.802l0,118.849l75.95,0Zm-284.489,-244.396l-76.034,0l0,244.396l76.034,0l0,-244.396Zm-37.997,-121.489c-24.395,0 -44.066,19.735 -44.066,44.047c0,24.318 19.671,44.052 44.066,44.052c24.299,0 44.026,-19.734 44.026,-44.052c0,-24.312 -19.727,-44.047 -44.026,-44.047Z" style="fill-rule:nonzero;"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest">{{ __('messages.t_linkedin') }}</span>
                </div>
                
                {{-- Whatsapp --}}
                <div class="grid items-center justify-center mx-4">
                    <a href="https://api.whatsapp.com/send?text={{ $gig->title }}%20{{ url('service', $gig->slug) }}" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#25d366] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M373.295,307.064c-6.37,-3.188 -37.687,-18.596 -43.526,-20.724c-5.838,-2.126 -10.084,-3.187 -14.331,3.188c-4.246,6.376 -16.454,20.725 -20.17,24.976c-3.715,4.251 -7.431,4.785 -13.8,1.594c-6.37,-3.187 -26.895,-9.913 -51.225,-31.616c-18.935,-16.89 -31.72,-37.749 -35.435,-44.126c-3.716,-6.377 -0.397,-9.824 2.792,-13c2.867,-2.854 6.371,-7.44 9.555,-11.16c3.186,-3.718 4.247,-6.377 6.37,-10.626c2.123,-4.252 1.062,-7.971 -0.532,-11.159c-1.591,-3.188 -14.33,-34.542 -19.638,-47.298c-5.171,-12.419 -10.422,-10.737 -14.332,-10.934c-3.711,-0.184 -7.963,-0.223 -12.208,-0.223c-4.246,0 -11.148,1.594 -16.987,7.969c-5.838,6.377 -22.293,21.789 -22.293,53.14c0,31.355 22.824,61.642 26.009,65.894c3.185,4.252 44.916,68.59 108.816,96.181c15.196,6.564 27.062,10.483 36.312,13.418c15.259,4.849 29.145,4.165 40.121,2.524c12.238,-1.827 37.686,-15.408 42.995,-30.286c5.307,-14.882 5.307,-27.635 3.715,-30.292c-1.592,-2.657 -5.838,-4.251 -12.208,-7.44m-116.224,158.693l-0.086,0c-38.022,-0.015 -75.313,-10.23 -107.845,-29.535l-7.738,-4.592l-80.194,21.037l21.405,-78.19l-5.037,-8.017c-21.211,-33.735 -32.414,-72.726 -32.397,-112.763c0.047,-116.825 95.1,-211.87 211.976,-211.87c56.595,0.019 109.795,22.088 149.801,62.139c40.005,40.05 62.023,93.286 62.001,149.902c-0.048,116.834 -95.1,211.889 -211.886,211.889m180.332,-392.224c-48.131,-48.186 -112.138,-74.735 -180.335,-74.763c-140.514,0 -254.875,114.354 -254.932,254.911c-0.018,44.932 11.72,88.786 34.03,127.448l-36.166,132.102l135.141,-35.45c37.236,20.31 79.159,31.015 121.826,31.029l0.105,0c140.499,0 254.87,-114.366 254.928,-254.925c0.026,-68.117 -26.467,-132.166 -74.597,-180.352" id="WhatsApp-Logo"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest">{{ __('messages.t_whatsapp') }}</span>
                </div>

                {{-- Copy link --}}
                <div class="grid items-center justify-center mx-4">
                    <button type="button" x-on:click="copy" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-gray-400 focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title/><path d="M17.3,13.35a1,1,0,0,1-.7-.29,1,1,0,0,1,0-1.41l2.12-2.12a2,2,0,0,0,0-2.83L17.3,5.28a2.06,2.06,0,0,0-2.83,0L12.35,7.4A1,1,0,0,1,10.94,6l2.12-2.12a4.1,4.1,0,0,1,5.66,0l1.41,1.41a4,4,0,0,1,0,5.66L18,13.06A1,1,0,0,1,17.3,13.35Z" /><path d="M8.11,21.3a4,4,0,0,1-2.83-1.17L3.87,18.72a4,4,0,0,1,0-5.66L6,10.94A1,1,0,0,1,7.4,12.35L5.28,14.47a2,2,0,0,0,0,2.83L6.7,18.72a2.06,2.06,0,0,0,2.83,0l2.12-2.12A1,1,0,1,1,13.06,18l-2.12,2.12A4,4,0,0,1,8.11,21.3Z" /><path d="M8.82,16.18a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42l6.37-6.36a1,1,0,0,1,1.41,0,1,1,0,0,1,0,1.42L9.52,15.89A1,1,0,0,1,8.82,16.18Z" /></svg>
                    </button>
                    <template x-if="!isCopied">
                        <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest">{{ __('messages.t_copy_link') }}</span>
                    </template>
                    <template x-if="isCopied">
                        <span class="uppercase font-normal text-xs text-green-500 mt-4 tracking-widest">{{ __('messages.t_copied') }}</span>
                    </template>
                </div>

            </div>
        </x-slot>

    </x-forms.modal>

</div>

@push('scripts')
    
    {{-- jVectorMap Plugin --}}
    <script src="{{ url('public/js/plugins/jvectormap/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ url('public/js/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>

    {{-- ApexCharts Plugin --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- AlpineJs --}}
    <script>
        function qGzhGNlrGCLxvXf() {
            return {

                isCopied: false,

                // Copy link
                copy() {

                    // Set gig link
                    const url = "{{ url('service', $gig->slug) }}";

                    var _this = this;
                    navigator.clipboard.writeText(url).then(function() {
                        _this.isCopied = true;
                        setTimeout(() => {
                            _this.isCopied = false
                        }, 2000);
                    }, function(err) {
                    });

                },

                // Map
                map() {
                    $(function(){

                        // Get data
                        const data   = @json($countries);

                        const visits = [];

                        data.forEach((element, index) => {

                            const el = { [element.country_code]: element.count };

                            visits.push(el)
                        });

                        let result = visits.reduce((a, c) => {
                            let [[k, v]] = Object.entries(c);
                            a[k] = v; return a;
                        }, {});

                        $('#world-map-visitors').vectorMap({
                            map: 'world_mill',
                            backgroundColor: 'transparent',
                            regionStyle: {
                                initial: {
                                    fill: '#9d9d9d',
                                    "fill-opacity": 1,
                                    stroke: 'none',
                                    "stroke-width": 0,
                                    "stroke-opacity": 1
                                },
                                hover: {
                                    "fill-opacity": 0.8,
                                    cursor: 'pointer'
                                },
                                selected: {
                                    fill: '#9d9d9d'
                                },
                                selectedHover: {
                                }
                            },
                            series: {
                                regions: [{
                                    values: result,
                                    scale: ['#d7cbfb', '#7b3ff3'],
                                    normalizeFunction: 'polynomial'
                                }]
                            },
                            onRegionTipShow: function(e, el, code){
                                if (result[code]) {
                                    el.html(el.html()+' ({{ __("messages.t_visits") }} '+result[code]+')');
                                }
                            }
                        });

                    });
                },

                // Browsers
                browsers() {

                    // Set data
                    const data       = @json($browsers);
                    const series     = [];
                    const categories = [];

                    // Loop through data
                    data.forEach(element => {
                        series.push(element.count)
                        categories.push(element.browser_name)
                    });

                    // Set chart options
                    var options = {
                        series: [{ data: series }],
                        chart: {
                            height: 350,
                            type  : 'bar',
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: '45%',
                                distributed: true,
                            }
                        },
                        dataLabels: { enabled: false },
                        legend: { show: false },
                        xaxis: {
                            categories: categories,
                            labels: {
                                style: {
                                    fontSize: '12px'
                                }
                            }
                        },
                        grid: {
                            show: false,
                        },
                        tooltip: {
                            custom: function({series, seriesIndex, dataPointIndex, w}) {
                                return '<div class="bg-black px-4 py-2 opacity-50 text-white border-0 text-xs font-medium"> {{ __("messages.t_visits") }} ' + series[seriesIndex][dataPointIndex] + '</div>'
                            }
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#chart-browsers"), options);
                    chart.render();

                },

                // Os
                os() {

                    // Set data
                    const data   = @json($os);
                    const series = [];
                    const labels = [];

                    // Loop through data
                    data.forEach(element => {
                        series.push(element.count)
                        labels.push(element.os_name)
                    });

                    // Set chart options
                    var options = {
                        series: series,
                        labels: labels,
                        chart: {
                            width: 380,
                            type  : 'pie',
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                width: 200
                                },
                                legend: {
                                position: 'bottom'
                                }
                            }
                        }],
                        grid: {
                            show: false,
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#chart-os"), options);
                    chart.render();

                },

                // Devices
                devices() {

                    // Set data
                    const data   = @json($devices);
                    const series = [];
                    const labels = [];

                    // Loop through data
                    data.forEach(element => {
                        series.push(element.count)
                        labels.push(element.device_type)
                    });

                    // Set chart options
                    var options = {
                        series: series,
                        labels: labels,
                        chart: {
                            width: 380,
                            type  : 'pie',
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                width: 200
                                },
                                legend: {
                                position: 'bottom'
                                }
                            }
                        }],
                        grid: {
                            show: false,
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#chart-devices"), options);
                    chart.render();

                },

                // Init
                init() {

                    // Init map
                    this.map();

                    // Init browsers
                    this.browsers();

                    // Init Os
                    this.os();

                    // Init devices
                    this.devices();

                }

            }
        }
        window.qGzhGNlrGCLxvXf = qGzhGNlrGCLxvXf();
    </script>

@endpush

@push('styles')
    
    {{-- jVectorMap Plugin --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.css" />

@endpush