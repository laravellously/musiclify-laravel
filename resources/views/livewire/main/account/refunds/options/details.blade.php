<main class="w-full" x-data>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow overflow-hidden">
            <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                {{-- Sidebar --}}
                <aside class="lg:col-span-3 py-6" wire:ignore>
                    <x-main.account.sidebar />
                </aside>

                {{-- Section content --}}
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">

                    <div class="xl:grid xl:grid-cols-3 py-10 px-8">
                        <div class="xl:col-span-2 xl:ltr:pr-8 xl:rtl:pl-8 xl:ltr:border-r xl:rtl:border-l xl:border-gray-200 dark:xl:border-zinc-700">
                            <div>
                                <div>
                                    <div class="md:flex md:items-center md:justify-between md:space-x-4 md:rtl:space-x-reverse xl:border-b xl:pb-6 dark:xl:border-zinc-700">
                                        <div>
                                            <h1 class="text-base font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_refund_details') }}</h1>
                                            <div class="mt-2 text-xs font-medium tracking-wide text-primary-600 hover:text-primary-600 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 -mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>
                                                <a href="{{ url('service', $refund->item->gig->slug) }}" target="_blank" class="ltr:ml-2 rtl:mr-2">{{ $refund->item->gig->title }}</a>
                                            </div>
                                        </div>
                                        <div class="mt-4 flex md:mt-0">
                                            @if ($refund->status === 'rejected_by_seller' && !$refund->request_admin_intervention)
                                                <button x-on:click="confirm('{{ __('messages.t_are_u_sure_raise_dispute_refund', ['app_name' => config('app.name')]) }}') ? $wire.raise : ''" wire:loading.attr="disabled" wire:target="raise" type="button" class="inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">

                                                    {{-- Loading indicator --}}
                                                    <div wire:loading wire:target="raise">
                                                        <svg role="status" class="ltr:-ml-1 rtl:-mr-1 ltr:mr-2 rtl:ml-2 h-4 w-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>

                                                    {{-- Icon --}}
                                                    <div wire:loading.remove wire:target="raise">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 rtl:-mr-1 ltr:mr-2 rtl:ml-2 h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/></svg>
                                                    </div>

                                                    <span class="text-xs font-medium">{{ __('messages.t_raise_a_dispute') }}</span>
                                                </button>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Refund && Item details (Mobile) --}}
                                    <aside class="mt-8 xl:hidden">
                                        <div class="space-y-5">

                                            {{-- Refund status --}}
                                            @switch($refund->status)

                                                {{-- Pending --}}
                                                @case('pending')
                                                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/></svg>
                                                        <span class="text-amber-600 text-sm font-medium">{{ __('messages.t_in_progress') }}</span>
                                                    </div>
                                                    @break

                                                {{-- Rejected by seller --}}
                                                @case('rejected_by_seller')
                                                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                                                        <span class="text-red-600 text-sm font-medium">{{ __('messages.t_declined_by_seller') }}</span>
                                                    </div>
                                                    @break

                                                {{-- Rejected by admin --}}
                                                @case('rejected_by_admin')
                                                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                                                        <span class="text-red-600 text-sm font-medium">{{ __('messages.t_declined_by_admin', ['app_name' => config('app.name')]) }}</span>
                                                    </div>
                                                    @break

                                                {{-- Approved by seller --}}
                                                @case('accepted_by_seller')
                                                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                                        <span class="text-green-600 text-sm font-medium">{{ __('messages.t_approved_by_seller') }}</span>
                                                    </div>
                                                    @break

                                                {{-- Approved by admin --}}
                                                @case('accepted_by_admin')
                                                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                                        <span class="text-green-600 text-sm font-medium">{{ __('messages.t_approved_by_admin', ['app_name' => config('app.name')]) }}</span>
                                                    </div>
                                                    @break
                                                    
                                                {{-- Closed --}}
                                                @case('closed')
                                                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                                                        <span class="text-gray-600 text-sm font-medium">{{ __('messages.t_closed') }}</span>
                                                    </div>
                                                    @break
                                                    
                                            @endswitch

                                            {{-- Amount --}}
                                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/> <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/></svg>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm font-black tracking-wide ">@money($refund->item->total_value, settings('currency')->code, true)</span>
                                            </div>

                                            {{-- Created on --}}
                                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                                                <span class="text-gray-700 dark:text-gray-300 text-sm font-medium">{{ __('messages.t_created_on_date', ['date' => format_date($refund->created_at, 'F j, Y')]) }}</span>
                                            </div>

                                        </div>
                                    </aside>


                                    {{-- Refund reason --}}
                                    <div class="py-3 xl:pt-6 xl:pb-0">
                                        <div class="prose max-w-none mb-10">
                                            <p class="text-sm text-gray-400 dark:text-gray-200">
                                                {{ $refund->reason }}
                                            </p>
                                        </div>

                                        @if ($refund->status === 'rejected_by_seller' && $refund->request_admin_intervention)
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01"/></svg>
                                                <p class="ltr:ml-2 rtl:mr-2 text-xs font-medium text-amber-600">
                                                    {{ __('messages.t_our_team_investigate_refund_request_now') }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>

                            {{-- Conversation --}}
                            <section class="mt-8 xl:mt-10">
                                <div>
                                    <div class="divide-y divide-gray-200 dark:divide-zinc-700">
                                        <div class="pb-4">
                                            <h2 class="text-base font-extrabold tracking-wider text-gray-900 dark:text-gray-100">
                                                {{ __('messages.t_conversation') }}
                                            </h2>
                                        </div>
                                        <div class="pt-6">
                                            <div class="flow-root">

                                                @if (count($messages))
                                                    <ul role="list" class="-mb-8">
                                                        @foreach ($messages as $msg)
                                                            <li>
                                                                <div class="relative pb-8">
                                                                    @if (!$loop->last)
                                                                        <span class="absolute top-5 ltr:left-5 rtl:right-5 ltr:-ml-px rtl:-mr-px h-full w-0.5 bg-gray-200 dark:bg-zinc-700"></span>
                                                                    @endif
                                                                    <div class="relative flex items-start space-x-3 rtl:space-x-reverse">

                                                                        <div class="relative">
                                                                            <img class="h-10 w-10 rounded-full bg-gray-400 dark:bg-zinc-800 flex items-center justify-center ring-8 ring-white dark:ring-transparent object-cover" src="{{ $msg->author_type === 'buyer' ? src($msg->buyer->avatar) : src($msg->seller->avatar) }}" alt="{{ $msg->author_type === 'buyer' ? $msg->buyer->username : $msg->seller->username }}">
                                                                        </div>
                                                                        <div class="min-w-0 flex-1">
                                                                            <div>
                                                                                <div class="text-sm">
                                                                                    <a href="{{ url('profile', $msg->author_type === 'buyer' ? $msg->buyer->username : $msg->seller->username) }}"
                                                                                        target="_blank" class="font-medium text-gray-900 dark:text-gray-200 dark:hover:text-primary-600 hover:text-primary-600">{{ $msg->author_type === 'buyer' ? $msg->buyer->username : $msg->seller->username }}</a>
                                                                                </div>
                                                                                <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                                                                    {{ format_date($msg->created_at, 'ago') }}
                                                                                </p>
                                                                            </div>
                                                                            <div class="mt-2 text-sm text-gray-700 dark:text-gray-100">
                                                                                <p>
                                                                                    {{ $msg->message }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <span class="text-center text-gray-400 dark:text-gray-300 block py-12 font-extrabold text-xs tracking-wider">{{ __('messages.t_no_messages_in_this_refund_conversation') }}</span>
                                                @endif

                                            </div>
                                            @if ($refund->status === 'pending')
                                                <div class="mt-6">
                                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-shrink-0">
                                                            <div class="relative">
                                                                <img class="h-10 w-10 rounded-full bg-gray-400 dark:bg-zinc-800 flex items-center justify-center ring-8 ring-white dark:ring-transparent object-cover" src="{{ src(auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}">
                                                            </div>
                                                        </div>
                                                        <div class="min-w-0 flex-1">
                                                            <div>
                                                                <textarea wire:model.defer="message" rows="4" class="shadow-sm block w-full dark:bg-transparent focus:ring-gray-900 dark:focus:ring-primary-600 focus:border-gray-900 dark:focus:border-primary-600 sm:text-sm border border-gray-300 dark:border-zinc-700 dark:text-gray-200 rounded-md resize-none" placeholder="{{ __('messages.t_enter_your_message') }}" maxlength="500"></textarea>
                                                            </div>
                                                            <div class="mt-6 flex items-center justify-end space-x-4 rtl:space-x-reverse">
                                                                <button x-on:click="confirm('{{ __('messages.t_are_u_sure_close_refund_dispute') }}') ? $wire.close : ''" wire:loading.attr="disabled" wire:target="close" type="button" class="inline-flex justify-center px-4 py-2 border border-gray-300 dark:border-zinc-700 shadow-sm text-sm font-medium rounded-md text-gray-700 dark:text-gray-200 bg-white dark:bg-zinc-700 hover:bg-gray-50 dark:hover:bg-zinc-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 h-12 items-center">
                                                                    <svg class="ltr:-ml-1 rtl:-mr-1 ltr:mr-2 rtl:ml-2 h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path> </svg>
                                                                    <span class="text-xs font-medium">{{ __('messages.t_close_refund') }}</span>
                                                                </button>
                                                                
                                                                <x-forms.button action="send" :text="__('messages.t_send')" :block="false" />

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                        {{-- Refund details --}}
                        <aside class="hidden xl:block xl:ltr:pl-8 xl:rtl:pr-8">
                            <div class="space-y-5">

                                {{-- Refund status --}}
                                @switch($refund->status)

                                    {{-- Pending --}}
                                    @case('pending')
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/></svg>
                                            <span class="text-amber-600 text-sm font-medium">{{ __('messages.t_in_progress') }}</span>
                                        </div>
                                        @break

                                    {{-- Rejected by seller --}}
                                    @case('rejected_by_seller')
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                                            <span class="text-red-600 text-sm font-medium">{{ __('messages.t_declined_by_seller') }}</span>
                                        </div>
                                        @break

                                    {{-- Rejected by admin --}}
                                    @case('rejected_by_admin')
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                                            <span class="text-red-600 text-sm font-medium">{{ __('messages.t_declined_by_admin', ['app_name' => config('app.name')]) }}</span>
                                        </div>
                                        @break

                                    {{-- Approved by seller --}}
                                    @case('accepted_by_seller')
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                            <span class="text-green-600 text-sm font-medium">{{ __('messages.t_approved_by_seller') }}</span>
                                        </div>
                                        @break

                                    {{-- Approved by admin --}}
                                    @case('accepted_by_admin')
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                            <span class="text-green-600 text-sm font-medium">{{ __('messages.t_approved_by_admin', ['app_name' => config('app.name')]) }}</span>
                                        </div>
                                        @break
                                        
                                    {{-- Closed --}}
                                    @case('closed')
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                                            <span class="text-gray-600 text-sm font-medium">{{ __('messages.t_closed') }}</span>
                                        </div>
                                        @break
                                        
                                @endswitch

                                {{-- Amount --}}
                                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/> <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/></svg>
                                    <span class="text-gray-700 dark:text-gray-200 text-sm font-black tracking-wide ">@money($refund->item->total_value, settings('currency')->code, true)</span>
                                </div>

                                {{-- Created on --}}
                                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                                    <span class="text-gray-700 dark:text-gray-200 text-sm font-medium">{{ __('messages.t_created_on_date', ['date' => format_date($refund->created_at, 'F j, Y')]) }}</span>
                                </div>

                            </div>
                        </aside>
                    </div>

                </div>

            </div>
        </div>
    </div>
</main>
