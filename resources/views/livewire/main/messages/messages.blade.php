<div class="container" x-data="window.mTUkVVaUJscRImp" x-init="init()">

    {{-- Check if user has conversations --}}
    @if (count($conversations))
        <div class="app rounded-md shadow-sm border border-gray-100 dark:border-zinc-700">

            {{-- Section header --}}
            <div class="header py-3 px-5">
                    
                {{-- Section title --}}
                <div class="">
                    <span class="text-sm font-semibold tracking-wide text-gray-700 dark:text-gray-100">{{ __('messages.t_messages') }}</span>
                </div>

                {{-- My Profile --}}
                <div class="user-settings rtl:!mr-auto rtl:!ml-[unset]">
                    
                    {{-- Account settings --}}
                    <div class="settings">
                        <a href="{{ url('account/settings') }}" target="_blank" data-tooltip-target="tooltip-account-settings">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3" />
                                <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" />
                            </svg>
                            <div id="tooltip-account-settings" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                {{ __('messages.t_account_settings') }}
                            </div>
                        </a>
                    </div>

                    {{-- View my profile --}}
                    <img class="user-profile object-cover rtl:!ml-0 rtl:!mr-4" src="{{ src(auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}">

                </div>

            </div>

            {{-- Section content --}}
            <div class="wrapper">

                {{-- Conversations --}}
                <div class="conversation-area rtl:!border-r-0 rtl:border-l border-gray-200 dark:border-zinc-700">

                    @foreach ($conversations as $c)
                        <a href="{{ url('messages', $c->uid) }}" class="msg {{ $c->sender->isOnline() ? 'online' : 'offline' }}" wire:key="conversation-id-{{ $c->uid }}">
                            <img class="msg-profile rtl:!mr-0 rtl:!ml-4" src="{{ src($c->sender->avatar) }}" alt="{{ $c->sender->username }}" />
                            <div class="msg-detail">
                                <div class="msg-username flex items-center">
                                    {{ $c->sender->username }}
                                    @if ($c->unreadMessages()->count() > 0)
                                        <div class="flex items-center justify-center w-5 h-5 pt-[1px] bg-primary-600 text-[11px] font-medium text-white ltr:ml-2 rtl:mr-2 rounded-full">
                                            {{ $c->unreadMessages()->count() }}
                                        </div>
                                    @endif
                                </div>
                                <div class="msg-content">

                                    @php
                                        $latest = $c->messages()->latest()->first();
                                    @endphp

                                    @if ($latest)
                                        <span class="msg-message">{{ $latest->message }}</span>
                                        <span class="msg-date rtl:!ml-0 rtl:!mr-1">{{ format_date($latest->created_at) }}</span>
                                    @else
                                    @endif

                                </div>
                            </div>
                        </a>
                    @endforeach
                    
                    <div class="overlay"></div>
                </div>

                {{-- Conversation messages --}}
                <div class="chat-area items-center justify-start pt-12" id="chat-area">
                    <div class="py-14 px-6 text-center text-sm sm:px-14">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <p class="mt-4 font-semibold text-gray-900 dark:text-gray-200">{{ __('messages.t_no_conversation_selected') }}</p>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">{{ __('messages.t_no_conversation_selected_subtitle') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        
    <div class="py-14 px-6 text-center text-sm sm:px-14 max-w-xl border-2 bg-slate-50 border-gray-200 m-auto border-dashed">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        <p class="mt-4 font-semibold text-gray-900">{{ __('messages.t_no_conversations') }}</p>
        <p class="mt-2 text-gray-500">{{ __('messages.t_u_dont_have_any_active_conversations') }}</p>
    </div>
        
    @endif

</div>

@push('scripts')

    {{-- AlpineJs --}}
    <script>
        function mTUkVVaUJscRImp() {
            return {

                init() {
                }

            }
        }
        window.mTUkVVaUJscRImp = mTUkVVaUJscRImp();
    </script>

@endpush

@push('styles')
    
    {{-- Chat style --}}
    <link rel="stylesheet" href="{{ url('public/css/chat.css') }}">

@endpush