<div class="container mx-auto" x-data>

    {{-- Section header --}}
    <div class="min-h-full bg-white dark:bg-zinc-800 shadow rounded-md mb-8">

        @php
            
            // Set links
            $links = [['href' => 'seller/home', 'text' => __('messages.t_home'), 'active' => false], ['href' => 'seller/gigs', 'text' => __('messages.t_orders_history'), 'active' => false], ['href' => 'seller/gigs', 'text' => __('messages.t_my_gigs'), 'active' => false],
            ['href' => "seller/reviews", 'text' => __('messages.t_reviews'), 'active' => false],
            
            ['href' => 'seller/portfolio', 'text' => __('messages.t_portfolio'), 'active' => false], ['href' => 'seller/earnings', 'text' => __('messages.t_earnings'), 'active' => false], ['href' => 'seller/withdrawals', 'text' => __('messages.t_withdrawals'), 'active' => false], ['href' => 'seller/refunds', 'text' => __('messages.t_refunds'), 'active' => true]];
            
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
                                    <a href="{{ url($link['href']) }}"
                                        class="{{ $link['active'] ? 'bg-gray-100 dark:bg-zinc-700' : 'hover:text-gray-700 hover:bg-gray-50 dark:hover:bg-zinc-700 dark:hover:text-gray-200' }} px-3 py-2 rounded-md text-sm font-medium text-gray-900 dark:text-gray-300"
                                        aria-current="page">{{ $link['text'] }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    {{-- Header links mobile --}}
                    <div class="flex lg:hidden">

                        {{-- Burger menu button --}}
                        <button type="button"
                            class="bg-gray-50 dark:bg-zinc-700 p-2 inline-flex items-center justify-center rounded-md text-gray-400 dark:text-gray-400 hover:text-gray-500 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-zinc-600 focus:outline-none"
                            @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                            <span class="sr-only">Open main menu</span>
                            <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 hidden"
                                :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg> <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 block"
                                :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>


                    </div>

                    {{-- Pending orders --}}
                    @if (auth()->user()->sales->where('status', 'pending')->count())
                        <div class="hidden lg:block">
                            <span class="relative inline-flex">
                                <span
                                    class="inline-flex items-center px-4 py-2 font-medium leading-6 text-xs transition ease-in-out duration-150 text-amber-600">
                                    {{ __('messages.t_number_pending_orders', ['number' => number_format(auth()->user()->sales->where('status', 'pending')->count())]) }}
                                </span>
                                <span class="flex absolute h-3 w-3 top-[13px] ltr:-left-1 rtl:-right-1">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-500 opacity-75"></span>
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
                        <a href="{{ url($link['href']) }}"
                            class="{{ $link['active'] ? 'bg-gray-200 dark:bg-zinc-600' : 'hover:bg-gray-200 dark:hover:bg-zinc-600' }} block px-3 py-2 rounded-md font-bold tracking-wide text-gray-900 dark:text-gray-200 text-xs">
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
                                    <a href="{{ url('/') }}"
                                        class="text-sm font-medium text-gray-500 dark:text-gray-300 dark:hover:text-gray-200 hover:text-gray-700">{{ __('messages.t_home') }}</a>
                                </div>
                            </li>

                            {{-- Seller dashboard --}}
                            <li>
                                <div class="flex items-center">

                                    {{-- LTR --}}
                                    <svg class="hidden ltr:block flex-shrink-0 h-5 w-5 text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    {{-- RTL --}}
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="hidden rtl:block flex-shrink-0 h-5 w-5 text-gray-400 viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    <a href="{{ url('seller/home') }}"
                                        class="ltr:ml-4 rtl:mr-4 text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-200">{{ __('messages.t_dashboard') }}</a>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    {{-- Title --}}
                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 dark:text-gray-100 sm:text-2xl sm:truncate">
                        {{ __('messages.t_refund_details') }}</h1>

                    {{-- Quick stats --}}
                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-8 rtl:space-x-reverse">

                        {{-- User level --}}
                        <div class="mt-2 flex items-center text-xs font-medium"
                            style="color: {{ auth()->user()->level->level_color }}">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4"
                                style="color: {{ auth()->user()->level->level_color }};margin-top: -3px;"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                            </svg>
                            {{ auth()->user()->level->title }}
                        </div>

                        {{-- Succeeded sales --}}
                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ __('messages.t_total_sales_number', ['number' => number_format(auth()->user()->sales->where('status', 'delivered')->where('is_finished', true)->count())]) }}
                        </div>

                        {{-- Country --}}
                        @if (auth()->user()->country)
                            <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                                <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd" />
                                </svg>
                                {{ auth()->user()->country->name }}
                            </div>
                        @endif

                        {{-- Sign up date --}}
                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ __('messages.t_signed_up_on_date', ['date' => format_date(auth()->user()->created_at, 'F j, Y')]) }}
                        </div>

                    </div>

                </div>
                <div class="mt-5 flex xl:mt-0 xl:ltr:ml-4 xl:rtl:mr-4">

                    @if ($refund->status === 'pending')
                        {{-- Give refund --}}
                        <span class="ltr:ml-3 rtl:mr-3">
                            <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_give_refund') }}') ? $wire.accept() : ''" wire:loading.attr="disabled" wire:target="accept()" type="button" class="inline-flex items-center px-4 py-3 border border-transparent text-xs leading-4 font-bold tracking-wide rounded-sm text-green-700 bg-green-200 hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                {{ __('messages.t_give_refund') }}
                            </button>
                        </span>

                        {{-- Decline refund --}}
                        <span class="ltr:ml-3 rtl:mr-3">
                            <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_decline_refund') }}') ? $wire.decline() : ''" wire:loading.attr="disabled" wire:target="decline()" type="button" class="inline-flex items-center px-4 py-3 border border-transparent text-xs leading-4 font-bold tracking-wide rounded-sm text-red-700 bg-red-200 hover:bg-red-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                {{ __('messages.t_decline_refund') }}
                            </button>
                        </span>
                    @endif

                </div>
            </div>
        </header>

    </div>

    {{-- Section content --}}
    <main class="pb-16">

        <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

            {{-- Conversation --}}
            <div class="col-span-12 lg:col-span-8">
                <div class="bg-white dark:bg-zinc-800 dark:border-zinc-700 shadow-sm rounded-md overflow-hidden border border-gray-100">
                    <div class="divide-y divide-gray-200 dark:divide-zinc-700">
                        <div class="px-4 py-5 sm:px-6">
                            <h2 class="text-sm font-semibold tracking-wide text-gray-700 dark:text-gray-100">{{ __('messages.t_conversation') }}</h2>
                        </div>
                        <div class="px-4 py-6 sm:px-6">
                            <ul role="list" class="space-y-8">
                          
                                @forelse ($refund->conversation()->latest()->get() as $msg)
                                    <li>
                                        <div class="relative pb-8">
                                            @if (!$loop->last)
                                                <span class="absolute top-5 ltr:left-5 rtl:right-5 ltr:-ml-px rtl:-mr-px h-full w-0.5 bg-gray-200 dark:bg-zinc-700"></span>
                                            @endif
                                            <div class="relative flex items-start space-x-3 rtl:space-x-reverse">

                                                <div class="relative">
                                                    <img class="h-10 w-10 rounded-full bg-gray-400 dark:bg-zinc-700 flex items-center justify-center ring-8 ring-white dark:ring-transparent object-cover" src="{{ $msg->author_type === 'buyer' ? src($msg->buyer->avatar) : src($msg->seller->avatar) }}" alt="{{ $msg->author_type === 'buyer' ? $msg->buyer->username : $msg->seller->username }}">
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <div>
                                                        <div class="text-sm">
                                                            <a href="{{ url('profile', $msg->author_type === 'buyer' ? $msg->buyer->username : $msg->seller->username) }}"
                                                                target="_blank" class="font-medium text-gray-900 dark:text-gray-100 hover:text-primary-600">{{ $msg->author_type === 'buyer' ? $msg->buyer->username : $msg->seller->username }}</a>
                                                        </div>
                                                        <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                                            {{ format_date($msg->created_at, 'ago') }}
                                                        </p>
                                                    </div>
                                                    <div class="mt-2 text-sm text-gray-700 dark:text-gray-200">
                                                        <p>
                                                            {{ $msg->message }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <span class="text-center text-gray-400 dark:text-gray-300 block py-12 font-extrabold text-xs tracking-wider">{{ __('messages.t_no_messages_in_this_refund_conversation') }}</span>
                                @endforelse
                          
                            </ul>
                        </div>
                    </div>
                    @if ($refund->status === 'pending')
                        <div class="bg-white dark:bg-zinc-700 px-4 py-6 sm:px-6 border-t dark:border-zinc-700">
                            <div class="mt-6">
                                <div class="flex space-x-3 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <div class="relative">
                                            <img class="h-10 w-10 rounded-full bg-gray-400 dark:bg-zinc-700 flex items-center justify-center object-cover" src="{{ src(auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}">
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div>
                                            <textarea wire:model.defer="message" rows="4" class="shadow-sm block w-full focus:ring-gray-900 focus:border-gray-900 sm:text-sm border border-gray-300 dark:bg-transparent dark:border-zinc-600 dark:focus:bg-primary-600 dark:focus:ring-primary-600 dark:text-gray-300 rounded-md resize-none" placeholder="{{ __('messages.t_enter_your_message') }}" maxlength="500"></textarea>
                                        </div>
                                        <div class="mt-6 flex items-center justify-end space-x-4 rtl:space-x-reverse">
                                            
                                            <x-forms.button action="send" :text="__('messages.t_send')" :block="false" />

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                  </div>
            </div>

            {{-- Refund details --}}
            <div class="col-span-12 lg:col-span-4">
                <div class="space-y-6 pb-16">

                    {{-- Gig details --}}
                    <div class="mb-14">
                        <div class="aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-md">
                            <img src="{{ src($refund->item->gig->thumbnail) }}" alt="{{ $refund->item->gig->title }}" class="object-cover">
                        </div>
                        <div class="mt-4">
                            <div>
                                <a href="{{ url('service', $refund->item->gig->slug) }}" target="_blank" class="text-base font-bold tracking-wide text-gray-900 dark:text-gray-200 hover:text-primary-600">
                                    {{ $refund->item->gig->title }}
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Item details --}}
                    <div>
                        <h3 class="text-gray-900 dark:text-gray-300 text-sm font-bold tracking-wide">{{ __('messages.t_details') }}</h3>
                        <dl class="mt-2 divide-y divide-gray-200 border-t border-b border-gray-200 dark:divide-zinc-700 dark:border-zinc-700">

                            {{-- Status --}}
                            <div class="flex justify-between py-3 text-sm font-medium">
                                <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_refund_status') }}</dt>
                                <dd class="text-gray-900 dark:text-gray-200">
                                    @switch($refund->status)

                                        {{-- Pending --}}
                                        @case('pending')
                                            <span class="text-amber-600 text-sm font-medium">{{ __('messages.t_in_progress') }}</span>
                                            @break

                                        {{-- Rejected by seller --}}
                                        @case('rejected_by_seller')
                                            <span class="text-red-600 text-sm font-medium">{{ __('messages.t_declined_by_seller') }}</span>
                                            @break

                                        {{-- Rejected by admin --}}
                                        @case('rejected_by_admin')
                                            <span class="text-red-600 text-sm font-medium">{{ __('messages.t_declined_by_admin', ['app_name' => config('app.name')]) }}</span>
                                            @break

                                        {{-- Approved by seller --}}
                                        @case('accepted_by_seller')
                                            <span class="text-green-600 text-sm font-medium">{{ __('messages.t_approved_by_seller') }}</span>
                                            @break

                                        {{-- Approved by admin --}}
                                        @case('accepted_by_admin')
                                            <span class="text-green-600 text-sm font-medium">{{ __('messages.t_approved_by_admin', ['app_name' => config('app.name')]) }}</span>
                                            @break
                                            
                                        {{-- Closed --}}
                                        @case('closed')
                                            <span class="text-gray-600 text-sm font-medium">{{ __('messages.t_closed') }}</span>
                                            @break
                                            
                                    @endswitch
                                </dd>
                            </div>

                            {{-- Amount --}}
                            <div class="flex justify-between py-3 text-sm font-medium">
                                <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_amount') }}</dt>
                                <dd class="text-gray-900 dark:text-gray-200  font-extrabold">@money($refund->item->profit_value, settings('currency')->code, true)</dd>
                            </div>

                            {{-- Refund date --}}
                            <div class="flex justify-between py-3 text-sm font-medium">
                                <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_refund_date') }}</dt>
                                <dd class="text-gray-900 dark:text-gray-200">{{ format_date($refund->created_at, 'ago') }}</dd>
                            </div>

                            {{-- Buyer --}}
                            <div class="flex justify-between py-3 text-sm font-medium">
                                <dt class="text-gray-500 dark:text-gray-400">{{ __('messages.t_buyer') }}</dt>
                                <dd class="text-primary-700">
                                    <a href="{{ url('profile', $refund->buyer->username) }}" target="_blank">{{ $refund->buyer->username }}</a>
                                </dd>
                            </div>
                            
                        </dl>
                    </div>

                    {{-- Reason --}}
                    <div>
                        <h3 class="text-gray-900 dark:text-gray-300 text-sm font-bold tracking-wide">{{ __('messages.t_refund_reason') }}</h3>
                        <div class="mt-2">
                            <p class="text-sm italic text-gray-500 dark:text-gray-200">
                                {{ $refund->reason }}
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>

    </main>

</div>
