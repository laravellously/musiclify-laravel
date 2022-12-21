<main class="w-full" x-data>
    <div class="px-4 sm:px-6 lg:px-8">

        {{-- Session success message --}}
        @if (session()->has('success'))
            <div class="p-4 relative flex bg-emerald-50 dark:bg-emerald-500 text-emerald-500 dark:text-emerald-50 text-xs font-semibold rounded-lg mb-4">
                <div class="flex items-center">
                    <span class="text-2xl text-emerald-400 dark:text-emerald-50">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <div class="ltr:ml-2 rtl:mr-2">{{ session()->get('success') }}</div>
                </div>
            </div>
        @endif

        {{-- Session error message --}}
        @if (session()->has('error'))
            <div class="p-4 relative flex bg-red-50 dark:bg-red-500 text-red-500 dark:text-red-50 text-xs font-semibold rounded-lg mb-4">
                <div class="flex items-center">
                    <span class="text-2xl text-red-400 dark:text-red-50">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                    </span>
                    <div class="ltr:ml-2 rtl:mr-2">{{ session()->get('error') }}</div>
                </div>
            </div>
        @endif

        {{-- Session warning message --}}
        @if (session()->has('warning'))
            <div class="p-4 relative flex bg-amber-50 dark:bg-amber-500 text-amber-500 dark:text-amber-50 text-xs font-semibold rounded-lg mb-4">
                <div class="flex items-center">
                    <span class="text-2xl text-amber-400 dark:text-amber-50">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                    </span>
                    <div class="ltr:ml-2 rtl:mr-2">{{ session()->get('warning') }}</div>
                </div>
            </div>
        @endif

        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow overflow-hidden">
            <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                {{-- Sidebar --}}
                <aside class="lg:col-span-3 py-6" wire:ignore>
                    <x-main.account.sidebar />
                </aside>

                {{-- Section content --}}
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">

                    {{-- Form --}}
                    <div class="w-full">

                        {{-- Section header --}}
                        <div class="mb-14 py-6 px-4 sm:p-4">
                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_deposit_history') }}</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ __('messages.t_deposit_history_subtitle') }}</p>
                        </div>
                        
                        <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
                            <table class="w-full whitespace-nowrap">
                                <thead class="bg-gray-100 dark:bg-zinc-700">
                                    <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white">
                                        <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">{{ __('messages.t_date') }}</th>
                                        <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">{{ __('messages.t_payment_method') }}</th>
                                        <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">{{ __('messages.t_amount') }}</th>
                                        <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">{{ __('messages.t_status') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="w-full">
                    
                                    @foreach ($transactions as $t)
                                        <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" wire:key="transactions-{{ $t->id }}">

                                            {{-- Date --}}
                                            <td class="ltr:pl-4 rtl:pr-4">

                                                {{-- Format date --}}
                                                @php
                                                    $formatted_date = \Carbon\Carbon::create($t->created_at);
                                                @endphp

                                                <div class="grid items-center text-center justify-center" data-tooltip-target="tooltip-year-date-{{ $t->id }}">
                                                    <span class="text-base font-medium text-gray-500 dark:text-gray-200 mb-2">
                                                        {{ $formatted_date->format('d') }}
                                                    </span>
                                                    <span class="text-[10px] text-gray-400 dark:text-gray-300 uppercase tracking-widest">
                                                        {{ $formatted_date->format('F') }}
                                                    </span>
                                                </div>

                                                <div id="tooltip-year-date-{{ $t->id }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-semibold text-white bg-gray-900 rounded-md shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    {{ $formatted_date->format('Y') }}
                                                </div>

                                            </td>

                                            {{-- Payment method --}}
                                            <td>
                                                <div class="flex items-center justify-between p-4">
                                                    <div class="flex items-center">

                                                        {{-- Logo --}}
                                                        @if (settings($t->payment_method)->logo)
                                                            <img src="{{ src( settings($t->payment_method)->logo ) }}" alt="{{ settings($t->payment_method)->name }}" class="max-w-[50px]">
                                                        @endif

                                                        <div class="ml-3 rtl:mr-3">
                                                            <div class="flex items-center">
                                                                <div class="text-gray-700 dark:text-gray-100 font-bold text-sm">
                                                                    {{ settings($t->payment_method)->name }}
                                                                </div>
                                                            </div>
                                                            <span class="text-gray-500 dark:text-gray-300 font-medium text-xs mt-2 block">{{ $t->transaction_id }}</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>

                                            {{-- Amount --}}
                                            <td class="text-center font-black text-gray-600 dark:text-white text-[13px]">
                                                {{ _price($t->amount_net) }}
                                            </td>

                                            {{-- Status --}}
                                            <td class="text-center px-4">
                                                @switch($t->status)

                                                    {{-- Paid --}}
                                                    @case('paid')
                                                        <div class="rounded-sm px-1 py-2 bg-green-50 text-green-400 text-xs font-semibold">
                                                            {{ __('messages.t_paid') }}
                                                        </div>
                                                        @break

                                                    @case('pending')
                                                        <div class="rounded-sm px-1 py-2 bg-amber-50 text-amber-400 text-xs font-semibold">
                                                            {{ __('messages.t_pending') }}
                                                        </div>
                                                        @break
                                                    @default
                                                        
                                                @endswitch
                                            </td>

                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    
                        {{-- Pagination --}}
                        @if ($transactions->hasPages())
                            <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
                                {!! $transactions->links('pagination::tailwind') !!}
                            </div>
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
</main>