<div class="container mx-auto" x-data="window.hlvgNLbhDViwiil">
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
                ['href' => "seller/withdrawals", 'text' => __('messages.t_withdrawals'), 'active' => false],
                ['href' => "seller/refunds", 'text' => __('messages.t_refunds'), 'active' => true],
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
                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 dark:text-gray-100 sm:text-2xl sm:truncate">{{ __('messages.t_refunds') }}</h1>

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
                            <table class="w-full divide-y divide-gray-200 dark:divide-zinc-600">
                                <thead class="bg-gray-50 dark:bg-zinc-600">
                                    <tr class="divide-x divide-gray-50 dark:divide-zinc-600">
                                        <th scope="col" class="px-10 py-3 ltr:text-left rtl:text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.t_item') }}</th>
                                        <th scope="col" class="px-10 py-3 ltr:text-left rtl:text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.t_buyer') }}</th>
                                        <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.t_status') }}</th>
                                        <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.t_date') }}</th>
                                        <th scope="col" class="px-3 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('messages.t_options') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-zinc-700 divide-y divide-gray-200 dark:divide-zinc-600">

                                    @forelse ($refunds as $refund)                                        
                                        <tr wire:key="seller-refunds-id-{{ $refund->uid }}">

                                            {{-- Item --}}
                                            <td class="whitespace-nowrap py-4 ltr:pl-10 rtl:pr-10 ltr:pr-3 rtl:pl-3 text-sm font-medium text-gray-900 sm:ltr:pl-10 sm:rtl:pr-10">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full" src="{{ src($refund->item->gig->thumbnail) }}" alt="{{ $refund->item->gig->title }}">
                                                    </div>
                                                    <div class="ltr:ml-4 rtl:mr-4">
                                                        <a href="{{ url('service', $refund->item->gig->slug) }}" target="_blank" class="font-medium text-gray-900 dark:text-gray-200 pb-1 hover:text-primary-600 block">{{ $refund->item->gig->title }}</a>
                                                        <div class="font-black text-black dark:text-gray-200 text-xs">
                                                            @money($refund->item->profit_value, settings('currency')->code, true)
                                                        </div>
                                                    </div>
                                                </div>    
                                            </td>

                                            {{-- Buyer --}}
                                            <td class="whitespace-nowrap py-4 ltr:pl-10 rtl:pr-10 ltr:pr-3 rtl:pl-3 text-sm font-medium text-gray-900 sm:ltr:pl-10 sm:rtl:pr-10">
                                                <div class="flex items-center">
                                                    <div class="h-10 w-10 flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full" src="{{ src($refund->buyer->avatar) }}" alt="{{ $refund->buyer->username }}">
                                                    </div>
                                                    <div class="ltr:ml-4 rtl:mr-4">
                                                        <a href="{{ url('profile', $refund->buyer->username) }}" target="_blank" class="font-medium text-gray-900 dark:text-gray-200 pb-1 hover:text-primary-600 block text-sm">{{ $refund->buyer->username }}</a>
                                                        <div class="font-normal text-gray-500 dark:text-gray-300 text-xs">
                                                            @if ($refund->buyer->fullname)
                                                                {{ $refund->buyer->username }}
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>    
                                            </td>

                                            {{-- Status --}}
                                            <td class="whitespace-nowrap text-center py-4 px-3">
                                                @switch($refund->status)

                                                    {{-- Pending --}}
                                                    @case('pending')
                                                        <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-amber-500 bg-amber-50">
                                                            {{ __('messages.t_pending') }}
                                                        </span>
                                                        @break

                                                    {{-- Closed --}}
                                                    @case('closed')
                                                        <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-gray-500 bg-gray-50">
                                                            {{ __('messages.t_closed') }}
                                                        </span>
                                                        @break

                                                    {{-- Rejected by seller --}}
                                                    @case('rejected_by_seller')
                                                        <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-red-500 bg-red-50">
                                                            {{ __('messages.t_declined_by_seller') }}
                                                        </span>
                                                        @break

                                                    {{-- Rejected by admin --}}
                                                    @case('rejected_by_admin')
                                                        <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-red-500 bg-red-50">
                                                            {{ __('messages.t_declined_by_admin', ['app_name' => config('app.name')]) }}
                                                        </span>
                                                        @break

                                                    {{-- Approved by seller --}}
                                                    @case('accepted_by_seller')
                                                        <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                                            {{ __('messages.t_approved_by_seller') }}
                                                        </span>
                                                        @break

                                                    {{-- Approved by admin --}}
                                                    @case('accepted_by_admin')
                                                        <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                                            {{ __('messages.t_approved_by_admin', ['app_name' => config('app.name')]) }}
                                                        </span>
                                                        @break
                                                        
                                                @endswitch
                                            </td>

                                            {{-- Date --}}
                                            <td class="text-center">
                                                <span class="text-[11px] font-normal text-gray-400 dark:text-gray-200">{{ format_date($refund->created_at, 'ago') }}</span>
                                            </td>

                                            {{-- Options --}}
                                            <td class="text-center">
                                                <div class="relative inline-block text-left">
                                                    <div>
                                                        <a href="{{ url('seller/refunds/details', $refund->uid) }}" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white dark:bg-zinc-600 dark:hover:bg-zinc-700 hover:bg-gray-50 focus:outline-none focus:ring-0" aria-expanded="true" aria-haspopup="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-zinc-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                        </a>
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
            @if ($refunds->hasPages())
                <div class="flex justify-center pt-12">
                    {!! $refunds->links('pagination::tailwind') !!}
                </div>
            @endif

        </main>
        
    </div>
</div>

@push('scripts')
    
    {{-- AlpineJs --}}
    <script>
        function hlvgNLbhDViwiil() {
            return {

            }
        }
        window.hlvgNLbhDViwiil = hlvgNLbhDViwiil();
    </script>

@endpush