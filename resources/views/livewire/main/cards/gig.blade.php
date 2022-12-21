<div class="gig-card" x-data="window._{{ $gig->uid }}" dir="{{ config()->get('direction') }}">
    <div class="bg-white dark:bg-zinc-800 rounded-md shadow-sm ring-1 ring-gray-200 dark:ring-zinc-800">

        {{-- Preview --}}
        <a href="{{ url('service', $gig->slug) }}" class="flex items-center justify-center overflow-hidden w-full h-52 bg-gray-100 dark:bg-zinc-700">
            <img class="object-contain max-h-52 w-full" src="{{ src($gig->thumbnail) }}" alt="{{ $gig->title }}">
        </a>

        {{-- Gig content --}}
        <div class="px-4 pb-2 mt-4">

            {{-- User --}}
            @if ($profile_visible)
                <div class="w-full mb-4 flex justify-between items-center">
                    <a href="{{ url('profile', $gig->owner->username) }}" target="_blank" class="flex-shrink-0 group block">
                        <div class="flex items-center">
                            <span class="inline-block relative">
                                <img class="h-6 w-6 rounded-full object-cover" src="{{ src($gig->owner->avatar) }}" alt="{{ $gig->owner->username }}">
                            </span>
                        <div class="ltr:ml-3 rtl:mr-3">
                            <div class="text-gray-500 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300 flex items-center mb-0.5">
                                <span class="font-extrabold tracking-wide text-[13px]">{{ $gig->owner->username }}</span>
                                @if ($gig->owner->status === 'verified')
                                    <svg data-tooltip-target="tooltip-account-verified-{{ $gig->uid }}" class="ltr:ml-0.5 rtl:mr-0.5" width="14px" height="14px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
                                    <div id="tooltip-account-verified-{{ $gig->uid }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        {{ __('messages.t_account_verified') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        </div>
                    </a>
                </div>
            @endif

            {{-- Title --}}
            <a href="{{ url('service', $gig->slug) }}" class="gig-card-title text-gray-800 dark:text-gray-100 hover:text-primary-600 dark:hover:text-white mb-4">
                {{ htmlspecialchars_decode($gig->title) }}
            </a>

            {{-- Rating --}}
            <div class="flex items-center" wire:ignore>

                {{-- Star --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>

                {{-- Rating --}}
                @if ($gig->rating == 0)
                    <div class=" text-[13px] tracking-widest text-amber-500 ltr:ml-1 rtl:mr-1 font-black">{{ __('messages.t_n_a') }}</div>
                @else
                    <div class=" text-sm tracking-widest text-amber-500 ltr:ml-1 rtl:mr-1 font-black">{{ $gig->rating }}</div>
                @endif

                {{-- Reviews --}}
                <div class="ltr:ml-2 rtl:mr-2 text-[13px] font-normal text-gray-400">
                    ( {{ number_format($gig->counter_reviews) }} )
                </div>
                
            </div>

        </div>

        {{-- Gig footer --}}
        <div class="px-3 py-3 bg-[#fdfdfd] dark:bg-zinc-800 border-t border-gray-50 dark:border-zinc-700 text-right sm:px-4 rounded-b-md flex justify-between">

            <div class="flex items-center">

                {{-- Add to favorite --}}
                <button @auth @if ($favorite) wire:click="removeFromFavorite('{{ $gig->uid }}')" wire:target="removeFromFavorite('{{ $gig->uid }}')" @else wire:click="addToFavorite('{{ $gig->uid }}')" wire:target="addToFavorite('{{ $gig->uid }}')" @endif wire:loading.attr="disabled" @endauth @guest x-on:click="loginToAddToFavorite" @endguest data-tooltip-target="tooltip-add-to-favorites-{{ $gig->uid }}" class="h-8 w-8 rounded-full flex items-center justify-center -ml-1 focus:outline-none visited:outline-none">

                    {{-- Authenticated users --}}
                    @auth
                        {{-- Loading indicator --}}
                        <div wire:loading @if ($favorite) wire:target="removeFromFavorite('{{ $gig->uid }}')" @else wire:target="addToFavorite('{{ $gig->uid }}')" @endif>
                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                            </svg>
                        </div>

                        {{-- Button icon --}}
                        <div wire:loading.remove @if ($favorite) wire:target="removeFromFavorite('{{ $gig->uid }}')" @else wire:target="addToFavorite('{{ $gig->uid }}')" @endif>
                            <i class="mdi mdi-heart {{ $favorite ? 'text-red-500 hover:text-red-600' : 'text-gray-400 hover:text-gray-500' }} text-lg"></i>
                        </div>
                    @endauth

                    {{-- Guests --}}
                    @guest
                        <i class="mdi mdi-heart text-gray-400 hover:text-gray-500 text-lg"></i>
                    @endguest
                    
                </button>
                <div id="tooltip-add-to-favorites-{{ $gig->uid }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    @if ($favorite)
                        {{ __('messages.t_remove_from_favorite') }}
                    @else
                        {{ __('messages.t_add_to_favorite') }}
                    @endif
                </div>

            </div>

            {{-- Price --}}
            <div class="gig-card-price">
                <small class="text-body-3 dark:!text-zinc-200">{{ __('messages.t_starting_at') }}</small>
                <span class=" ltr:text-right rtl:text-left dark:!text-white">@money($gig->price, settings('currency')->code, true)</span>
            </div>
            
        </div>

    </div>

</div>

@push('scripts')
    
    {{-- AlpineJs --}}
    <script>
        function _{{ $gig->uid }}() {
            return {

                // Login to add to favorite
                loginToAddToFavorite() {
                    window.toast("{{ __('messages.t_pls_login_or_register_to_add_to_favovorite') }}", "info");
                }

            }
        }
        window._{{ $gig->uid }} = _{{ $gig->uid }}();
    </script>

@endpush