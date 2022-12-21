<div class="container" x-data="window.TJPlQeqplTFcTQC" x-init="init()">

    {{-- Loading indicator --}}
    <div class="fixed top-10 right-10 z-[99]" wire:loading>
        <div role="status"> <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-primary-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/> <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/> </svg> <span class="sr-only">Loading...</span> </div>
    </div>

    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        {{-- Left side --}}
        <div class="col-span-12 lg:col-span-4">

            {{-- Profile header --}}
            <div class="flex flex-col text-center bg-white dark:bg-zinc-800 rounded-md shadow-sm mb-6">

                {{-- Profile --}}
                <div class="flex-1 flex flex-col p-8">

                    {{-- Avatar --}}
                    <div class="relative rounded-full overflow-hidden flex-shrink-0 mx-auto" wire:ignore>
                        <img id="profile-avatar-preview" class="relative rounded-full w-28 h-28 object-cover" src="{{ src(auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}">
                        <label for="profile-avatar-container" class="absolute inset-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100">
                            <span>{{ __('messages.t_change') }}</span>
                            <input type="file" id="profile-avatar-container" wire:model="avatar" @change="avatar" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                        </label>
                    </div>

                    {{-- Username --}}
                    <div class="mt-4 text-gray-900 dark:text-gray-200 text-sm font-medium flex items-center justify-center">
                        <span class="text-[15px] font-extrabold text-gray-700 dark:text-gray-100">{{ auth()->user()->username }}</span>  
                        @if (auth()->user()->status === 'verified')
                            <svg data-tooltip-target="account-verified-badge" class="ltr:ml-0.5 rtl:mr-0.5" width="16px" height="16px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
                            <div id="account-verified-badge" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                {{ __('messages.t_account_verified') }}
                            </div>
                        @endif  
                    </div>

                    {{-- Fullname --}}
                    <div class="mt-2 text-xs text-gray-500 dark:text-gray-300">
                        {{ auth()->user()->fullname }}
                    </div>

                    {{-- Divider --}}
                    <div class="w-[20%] h-0.5 bg-gray-100 dark:bg-zinc-700 flex items-center justify-center mx-auto mt-4"></div>

                    {{-- Headline --}}
                    <div class="my-4">

                        {{-- Edit headline (Preview) --}}
                        <div class="flex items-center justify-center cursor-pointer" @click="toggleEditingHeadline" x-show="!isHeadlineEditing" x-cloak>

                            {{-- Headline --}}
                            <p class="text-gray-500 dark:text-gray-300 text-sm">{{ auth()->user()->headline }}</p>

                            {{-- Edit icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px] ltr:ml-2 rtl:mr-2 text-gray-400 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>

                        </div>

                        {{-- Edit headline (Form) --}}
                        <div x-show="isHeadlineEditing" x-cloak>

                            <input type="text" wire:model.defer="headline" @keydown.enter="disableEditing" @keydown.window.escape="disableEditing" class="w-full bg-white dark:bg-zinc-800 focus:outline-none focus:shadow-outline border border-gray-200 dark:border-zinc-600 dark:text-gray-100 rounded-sm py-1 px-2 appearance-none leading-normal text-xs font-medium" x-ref="edit_headline" maxlength="100">

                            <div class="ltr:text-right rtl:text-left space-x-2 rtl:space-x-reverse flex items-center justify-end pt-1">

                                {{-- Approve editing --}}
                                <button wire:click="setHeadline" wire:loading.attr="disabled" wire:target="setHeadline" class="text-xs font-medium text-green-600 hover:text-green-800 flex items-center">

                                    {{-- Loading indicator --}}
                                    <div wire:loading wire:target="setHeadline">
                                        <svg role="status" class="inline w-3 h-3 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                    {{-- Icon --}}
                                    <div wire:loading.remove wire:target="setHeadline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    </div>

                                    <span class="text-[10px] font-medium ltr:ml-1 rtl:mr-1">{{ __('messages.t_approve') }}</span>
                                </button>

                                {{-- Cancel editing --}}
                                <button @click="disableEditing" class="text-xs font-medium text-red-600 hover:text-red-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                    <span class="text-[10px] font-medium ltr:ml-1 rtl:mr-1">{{ __('messages.t_cancel') }}</span>
                                </button>

                            </div>

                        </div>
                        
                    </div>

                    {{-- User status --}}
                    <dl class="mt-1 flex-grow flex flex-col justify-between">
                        <dd>
                            
                            @if (auth()->user()->isOnline() && !$availability)
                                <span class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full">{{ __('messages.t_online') }}</span>
                            @elseif ($availability)
                                <span class="px-2 py-1 text-gray-800 text-xs font-medium bg-gray-100 rounded-full">{{ __('messages.t_unavailable') }}</span>
                            @else
                                <span class="px-2 py-1 text-red-800 text-xs font-medium bg-red-100 rounded-full">{{ __('messages.t_unavailable') }}</span>
                            @endif

                        </dd>
                    </dl>

                </div>

                {{-- Quick stats --}}
                <dl class="mt-2 divide-y divide-gray-50 dark:divide-zinc-600 border-t border-gray-50 dark:border-zinc-600">

                    {{-- Member since --}}
                    <div class="flex justify-between text-sm font-medium px-5 py-4">
                        <dt class="text-gray-400 font-normal">{{ __('messages.t_member_since') }}</dt>
                        <dd class="text-gray-700 dark:text-gray-300">{{ format_date(auth()->user()->created_at, 'F j, Y H:i') }}</dd>
                    </div>

                    {{-- Current level --}}
                    <div class="flex justify-between text-sm font-medium px-5 py-4">
                        <dt class="text-gray-400 font-normal">{{ __('messages.t_current_level') }}</dt>
                        <dd class="text-gray-700 dark:text-gray-300">{{ auth()->user()->level?->title }}</dd>
                    </div>

                    {{-- Country --}}
                    <div class="flex justify-between text-sm font-medium px-5 py-4">
                        <dt class="text-gray-400 font-normal">{{ __('messages.t_country') }}</dt>
                        <dd class="text-gray-700 dark:text-gray-300 flex items-center">
                            @if (auth()->user()->country)
                                <img src="{{ countryFlag(auth()->user()->country?->code) }}" alt="{{ auth()->user()->country?->name }}" class="h-5 w-5 ltr:mr-2 rtl:ml-2">  
                                <span>{{ auth()->user()->country?->name }}</span> 
                            @else
                                {{ __('messages.t_n_a') }} 
                            @endif
                        </dd>
                    </div>
                    
                </dl>

            </div>

            {{-- Set availability --}}
            @if (auth()->user()->account_type === 'seller')
                <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border {{ $availability ? 'border-b-0' : '' }} border-gray-200 dark:border-zinc-600">

                    {{-- Section title --}}
                    <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-4 {{ $availability ? 'rounded-t-md' : 'rounded-md' }}">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-100">{{ __('messages.t_availability') }}</h3>
                                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_when_unavailable_u_wont_receive_orders') }}</p>
                            </div>
                            @if (!$availability)
                                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                                    <button id="modal-set-availability-button" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" viewBox="0 0 20 20" fill="currentColor"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                        <span class="text-xs font-medium text-primary-600 hover:text-primary-700"> 
                                            {{ __('messages.t_set_availability') }}
                                        </span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Check if user has availability status --}}
                    @if ($availability)
                        <div class="px-5 py-6">
                            <div class="rounded-lg bg-gray-50 dark:bg-zinc-700 px-6 py-8 sm:p-10 gird mb-4">
                                <div class="flex-1 mb-4">
                                    <div>
                                        <h3 class="inline-flex px-4 py-1 rounded-full text-xs font-semibold tracking-wide uppercase bg-red-100 text-red-800">
                                            {{ __('messages.t_unavailable') }}
                                        </h3>
                                    </div>
                                    <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                                        {!! __('messages.t_u_wont_be_able_to_receive_orders_until_date', ['date' => format_date($availability->expected_available_date, 'F j, Y')]) !!}
                                    </div>
                                </div>
                                <blockquote class="relative ltr:border-l-4 rtl:border-r-4 ltr:pl-4 rtl:pr-4 sm:ltr:pl-6 sm:rtl:pr-6 bg-gray-100 dark:bg-zinc-600 py-4 rounded dark:border-zinc-500">
                                    <p class="text-gray-800 text-sm dark:text-white"><em>
                                        {{ $availability->message }}
                                    </p></em>
                                
                                    <footer class="mt-2">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                        <img class="h-5 w-5 rounded-full object-cover" src="{{ src(auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}">
                                        </div>
                                        <div class="ltr:ml-4 rtl:mr-4">
                                            <div class="text-xs font-semibold text-gray-800 dark:text-gray-300">{{ auth()->user()->username }}</div>
                                        </div>
                                    </div>
                                    </footer>
                                </blockquote>
                            </div>

                            <x-forms.button :text="__('messages.t_change')" action="removeAvailability" :block="true" />
                        </div>
                    @endif

                </div>
            @endif

            {{-- Description --}}
            <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                {{-- Section title --}}
                <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-4 rounded-t-md">
                    <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-100">{{ __('messages.t_description') }}</h3>
                            <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_tell_us_more_about_ur_self') }}</p>
                        </div>
                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                            <button @click="isDescriptionEditing = !isDescriptionEditing" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" viewBox="0 0 20 20" fill="currentColor"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                <span class="text-xs font-medium text-primary-600 hover:text-primary-700"> 
                                    {{ __('messages.t_edit') }}
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Section content --}}
                <div class="px-5 py-6" x-cloak>

                    {{-- Edit form --}}
                    <div x-show="isDescriptionEditing" class="w-full">
                        <div class="mb-4">
                            <x-forms.textarea
                                :label="__('messages.t_description')"
                                :placeholder="__('messages.t_pls_tell_us_about_ur_hobbies_etc')"
                                model="description"
                                icon="clipboard-text-outline" />
                        </div>
                        <div class="flex items-center justify-end">
                            <div></div>
                            <div class="flex items-center">
                                <span @click="isDescriptionEditing = false" class="ltr:mr-4 rtl:ml-4 font-medium text-sm text-gray-500 hover:text-gray-600 cursor-pointer">{{ __('messages.t_cancel') }}</span>
                                <x-forms.button action="updateDescription" :text="__('messages.t_update')" :block="false" />
                            </div>
                        </div>
                    </div>

                    {{-- User description --}}
                    <div class="italic text-sm font-medium text-gray-400" x-show="!isDescriptionEditing">
                        {{ $description }}
                    </div>

                </div>

            </div>

            {{-- Social media accounts --}}
            <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                {{-- Section title --}}
                <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-4 rounded-t-md">
                    <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-100">{{ __('messages.t_linked_accounts') }}</h3>
                            <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_connect_ur_social_media_accounts') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Section content --}}
                <div class="grid grid-cols-12 gap-4 py-6">

                    {{-- Facebook --}}
                    <div class="col-span-12 px-5">
                        <x-forms.text-input 
                            :label="__('messages.t_facebook')"
                            :placeholder="__('messages.t_enter_facebook_profile')"
                            model="facebook_profile"
                            icon="link-variant" />
                    </div>

                    {{-- Twitter --}}
                    <div class="col-span-12 px-5">
                        <x-forms.text-input 
                            :label="__('messages.t_twitter')"
                            :placeholder="__('messages.t_enter_twitter_profile')"
                            model="twitter_profile"
                            icon="link-variant" />
                    </div>

                    {{-- Dribbble --}}
                    <div class="col-span-12 px-5">
                        <x-forms.text-input 
                            :label="__('messages.t_dribbble')"
                            :placeholder="__('messages.t_enter_dribbble_profile')"
                            model="dribbble_profile"
                            icon="link-variant" />
                    </div>

                    {{-- Stackoverflow --}}
                    <div class="col-span-12 px-5">
                        <x-forms.text-input 
                            :label="__('messages.t_stackoverflow')"
                            :placeholder="__('messages.t_enter_stackoverflow_profile')"
                            model="stackoverflow_profile"
                            icon="link-variant" />
                    </div>

                    {{-- Github --}}
                    <div class="col-span-12 px-5">
                        <x-forms.text-input 
                            :label="__('messages.t_github')"
                            :placeholder="__('messages.t_enter_github_profile')"
                            model="github_profile"
                            icon="link-variant" />
                    </div>

                    {{-- Youtube --}}
                    <div class="col-span-12 px-5">
                        <x-forms.text-input 
                            :label="__('messages.t_youtube')"
                            :placeholder="__('messages.t_enter_youtube_profile')"
                            model="youtube_profile"
                            icon="link-variant" />
                    </div>

                    {{-- Vimeo --}}
                    <div class="col-span-12 px-5">
                        <x-forms.text-input 
                            :label="__('messages.t_vimeo')"
                            :placeholder="__('messages.t_enter_vimeo_profile')"
                            model="vimeo_profile"
                            icon="link-variant" />
                    </div>

                    {{-- Update --}}
                    <div class="col-span-12 px-5 mt-5">
                        <x-forms.button action="updateSocial" :text="__('messages.t_update')" :block="true" />
                    </div>

                </div>

            </div>

            {{-- Skills --}}
            <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                {{-- Section title --}}
                <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-4 rounded-t-md">
                    <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-100">{{ __('messages.t_skills') }}</h3>
                            <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_let_ur_buyers_know_ur_skills') }}</p>
                        </div>
                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                            <button @click="isAddSkill = !isAddSkill" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 dark:text-gray-300 hover:text-gray-600 dark:hover:text-gray-200 rtl:mr-2 ltr:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Section content --}}
                <div class="py-6" x-cloak>

                    {{-- Create/Update new skill --}}  
                    <div class="px-5" x-show="isAddSkill">

                        {{-- Skill name --}}
                        <x-forms.text-input
                            :label="__('messages.t_add_skill')"
                            :placeholder="__('messages.t_eg_voice_talent')"
                            model="add_skill.name"
                            icon="bookmark-multiple" />

                        {{-- Experience --}}
                        <div class="mt-6">
                            <label class="text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('messages.t_experience') }}</label>
                            <fieldset class="mt-4">
                                <div class="space-y-4">
                                
                                    {{-- Beginner --}}
                                    <div class="flex items-center">
                                        <input id="skill-experience-beginner" wire:model.defer="add_skill.experience" value="beginner" name="skill_experience" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="skill-experience-beginner" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ __('messages.t_beginner') }}
                                        </label>
                                    </div>

                                    {{-- Intermediate --}}
                                    <div class="flex items-center">
                                        <input id="skill-experience-intermediate" wire:model.defer="add_skill.experience" value="intermediate" name="skill_experience" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="skill-experience-intermediate" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ __('messages.t_intermediate') }}
                                        </label>
                                    </div>

                                    {{-- Expert --}}
                                    <div class="flex items-center">
                                        <input id="skill-experience-expert" wire:model.defer="add_skill.experience" value="pro" name="skill_experience" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="skill-experience-expert" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            {{ __('messages.t_expert') }}
                                        </label>
                                    </div>
                                
                                </div>
                            </fieldset>
                        </div>

                        {{-- Add/Update skill button --}}
                        <div class="mt-6">
                            @if (isset($add_skill['id']))
                                <x-forms.button action="updateSkill" :text="__('messages.t_update_skill')" :block="true" />
                            @else
                                <x-forms.button action="addSkill" :text="__('messages.t_add_skill')" :block="true" />
                            @endif
                        </div>

                    </div>

                    {{-- List of skills --}}
                    @if (count($skills))
                        <div class="px-5" x-show="!isAddSkill" wire:key="list-of-skills">
                            <ul role="list" class="border border-gray-200 dark:border-zinc-600 rounded-md divide-y divide-gray-200 dark:divide-zinc-600">
                                @foreach ($skills as $skill)
                                    <li class="ltr:pl-3 rtl:pr-3 ltr:pr-4 rtl:pl-4 py-3 flex items-center justify-between text-sm" wire:key="skill-id-{{ $skill->id }}">

                                        {{-- Skill --}}
                                        <div class="w-0 flex-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd"/> <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"/></svg>
                                            <span class="ltr:ml-2 rtl:mr-2 flex-1 w-0 truncate font-medium text-xs dark:text-gray-200">
                                                {{ $skill->name }}
                                            </span>
                                        </div>

                                        {{-- Actions --}}
                                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 flex items-center justify-center">

                                            {{-- Delete --}}
                                            <button wire:click="deleteSkill({{ $skill->id }})" wire:loading.attr="disabled" wire:target="deleteSkill({{ $skill->id }})" data-tooltip-target="skill-tooltip-delete-{{ $skill->id }}" type="button" class="font-medium text-primary-600 hover:text-primary-600 ltr:mr-2 rtl:ml-2">

                                                {{-- Loading idicator --}}
                                                <div wire:loading wire:target="deleteSkill({{ $skill->id }})">
                                                    <svg role="status" class="inline w-4 h-4 text-primary-600 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                {{-- Icon --}}
                                                <div wire:loading.remove wire:target="deleteSkill({{ $skill->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                                </div>

                                            </button>
                                            <div id="skill-tooltip-delete-{{ $skill->id }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                {{ __('messages.t_delete_skill') }}
                                            </div>

                                            {{-- Edit --}}
                                            <button wire:click="editSkill({{ $skill->id }})" wire:loading.attr="disabled" wire:target="editSkill({{ $skill->id }})" data-tooltip-target="skill-tooltip-edit-{{ $skill->id }}" type="button" class="font-medium text-primary-600 hover:text-primary-600 ltr:mr-2 rtl:ml-2">

                                                {{-- Loading idicator --}}
                                                <div wire:loading wire:target="editSkill({{ $skill->id }})">
                                                    <svg role="status" class="inline w-4 h-4 text-primary-600 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                {{-- Icon --}}
                                                <div wire:loading.remove wire:target="editSkill({{ $skill->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                                </div>

                                            </button>
                                            <div id="skill-tooltip-edit-{{ $skill->id }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                {{ __('messages.t_edit_skill') }}
                                            </div>

                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- No skills yet --}}
                    @if (count($skills) === 0)
                        <div wire:key="no-skills-yet" x-show="!isAddSkill" class="text-center text-xs font-medium text-gray-400">{{ __('messages.t_u_dont_have_any_skills') }}</div>
                    @endif

                </div>

            </div>

            {{-- Languages --}}
            <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                {{-- Section title --}}
                <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-4 rounded-t-md">
                    <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-100">{{ __('messages.t_languages') }}</h3>
                            <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_add_languages_u_speak') }}</p>
                        </div>
                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                            <button @click="isAddLanguage = !isAddLanguage" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 dark:text-gray-300 hover:text-gray-600 dark:hover:text-gray-200 rtl:mr-2 ltr:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Section content --}}
                <div class="py-6" x-cloak>

                    {{-- Create/Update new language --}}  
                    <div class="px-5" x-show="isAddLanguage">

                        {{-- Language name --}}
                        <div class="relative {{ $errors->first('add_language.name') ? 'select2-custom-has-error' : '' }}">
                            <label class="text-xs font-medium block mb-2 {{ $errors->first('add_language.name') ? 'text-red-600 dark:text-red-500' : 'text-gray-700' }}">{{ __('messages.t_language') }}</label>
                        
                            <select data-pharaonic="select2" data-component-id="{{ $this->id }}" wire:model.defer="add_language.name" id="select2-id-add_language.name" data-placeholder="{{ __('messages.t_choose_language') }}" data-search-off class="select2" data-dir="{{ config()->get('direction') }}" wire:ignore>
                                <option value=""></option>
                                @foreach (config('languages') as $code => $name)
                                    <option value="{{ $name }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('add_language.name')
                                <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('add_language.name') }}</p>
                            @enderror
                        
                        </div>

                        {{-- Level --}}
                        <div class="mt-6">
                            <fieldset class="mt-4">
                                <div class="space-y-4">
                                
                                    {{-- Basic --}}
                                    <div class="flex items-center">
                                        <input id="languages-level-basic" wire:model.defer="add_language.level" value="basic" name="languages_level" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="languages-level-basic" class="ltr:ml-3 rtl:mr-3 block text-xs font-medium text-gray-700 dark:text-gray-400">
                                            {{ __('messages.t_basic') }}
                                        </label>
                                    </div>
                                    
                                    {{-- Conversational --}}
                                    <div class="flex items-center">
                                        <input id="languages-level-conversational" wire:model.defer="add_language.level" value="conversational" name="languages_level" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="languages-level-conversational" class="ltr:ml-3 rtl:mr-3 block text-xs font-medium text-gray-700 dark:text-gray-400">
                                            {{ __('messages.t_conversational') }}
                                        </label>
                                    </div>

                                    {{-- Fluent --}}
                                    <div class="flex items-center">
                                        <input id="languages-level-fluent" wire:model.defer="add_language.level" value="fluent" name="languages_level" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="languages-level-fluent" class="ltr:ml-3 rtl:mr-3 block text-xs font-medium text-gray-700 dark:text-gray-400">
                                            {{ __('messages.t_fluent') }}
                                        </label>
                                    </div>

                                    {{-- Native --}}
                                    <div class="flex items-center">
                                        <input id="languages-level-native" wire:model.defer="add_language.level" value="native" name="languages_level" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="languages-level-native" class="ltr:ml-3 rtl:mr-3 block text-xs font-medium text-gray-700 dark:text-gray-400">
                                            {{ __('messages.t_native') }}
                                        </label>
                                    </div>
                                
                                </div>
                            </fieldset>
                        </div>

                        {{-- Add/Update language button --}}
                        <div class="mt-6">
                            @if (isset($add_language['id']))
                                <x-forms.button action="updateLanguage" :text="__('messages.t_update_language')" :block="true" />
                            @else
                                <x-forms.button action="addLanguage" :text="__('messages.t_add_language')" :block="true" />
                            @endif
                        </div>

                    </div>

                    {{-- List of languages --}}
                    @if (count($languages))
                        <div class="px-5" x-show="!isAddLanguage" wire:key="list-of-languages">
                            <ul role="list" class="border border-gray-200 dark:border-zinc-600 rounded-md divide-y divide-gray-200 dark:divide-zinc-600">
                                @foreach ($languages as $language)
                                    <li class="ltr:pl-3 rtl:pr-3 ltr:pr-4 rtl:pl-4 py-3 flex items-center justify-between text-sm" wire:key="language-id-{{ $language->id }}">

                                        {{-- Language --}}
                                        <div class="w-0 flex-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-gray-400 dark:text-gray-300" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.02.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z" clip-rule="evenodd"/></svg>
                                            <span class="ltr:ml-2 rtl:mr-2 flex-1 w-0 truncate font-medium text-xs dark:text-gray-100">
                                                {{ $language->name }} ⚊ <span class="font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_' . $language->level) }}</span>
                                            </span>
                                        </div>

                                        {{-- Actions --}}
                                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 flex items-center justify-center">

                                            {{-- Delete --}}
                                            <button wire:click="deleteLanguage({{ $language->id }})" wire:loading.attr="disabled" wire:target="deleteLanguage({{ $language->id }})" data-tooltip-target="language-tooltip-delete-{{ $language->id }}" type="button" class="font-medium text-primary-600 hover:text-primary-600 ltr:mr-2 rtl:ml-2">

                                                {{-- Loading idicator --}}
                                                <div wire:loading wire:target="deleteLanguage({{ $language->id }})">
                                                    <svg role="status" class="inline w-4 h-4 text-primary-600 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                {{-- Icon --}}
                                                <div wire:loading.remove wire:target="deleteLanguage({{ $language->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                                </div>

                                            </button>
                                            <div id="language-tooltip-delete-{{ $language->id }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                {{ __('messages.t_delete_language') }}
                                            </div>

                                            {{-- Edit --}}
                                            <button wire:click="editLanguage({{ $language->id }})" wire:loading.attr="disabled" wire:target="editLanguage({{ $language->id }})" data-tooltip-target="language-tooltip-edit-{{ $language->id }}" type="button" class="font-medium text-primary-600 hover:text-primary-600 ltr:mr-2 rtl:ml-2">

                                                {{-- Loading idicator --}}
                                                <div wire:loading wire:target="editLanguage({{ $language->id }})">
                                                    <svg role="status" class="inline w-4 h-4 text-primary-600 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                {{-- Icon --}}
                                                <div wire:loading.remove wire:target="editLanguage({{ $language->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                                </div>

                                            </button>
                                            <div id="language-tooltip-edit-{{ $language->id }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                {{ __('messages.t_edit_language') }}
                                            </div>

                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- No languages yet --}}
                    @if (count($languages) === 0)
                        <div wire:key="no-languages-yet" x-show="!isAddLanguage" class="text-center text-xs font-medium text-gray-400">{{ __('messages.t_u_dont_have_any_languages') }}</div>
                    @endif

                </div>

            </div>

        </div>

        {{-- Right side --}}
        <div class="col-span-12 lg:col-span-8">

            {{-- Empty states --}}
            <div class="border-dashed border-2 dark:border-zinc-600 rounded-md mb-6">
                <div class="py-14 px-6 text-center text-sm sm:px-14">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    <p class="mt-4 font-semibold text-gray-900 dark:text-gray-300">{{ __('messages.t_update_profile') }}</p>
                    <p class="mt-2 text-gray-500 max-w-md mx-auto">{{ __('messages.t_these_info_will_appear_on_ur_public_profile') }}</p>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-center">
                <span class="relative z-0 inline-flex shadow-sm rounded-md">

                    {{-- Account settings --}}
                    <a href="{{ url('account/settings') }}" class="relative inline-flex items-center px-4 py-1 ltr:rounded-l-md rtl:rounded-r-md border border-gray-300 dark:border-zinc-600 dark:hover:bg-zinc-700 dark:text-gray-200 bg-white dark:bg-zinc-800 text-xs font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-600 focus:border-primary-600">
                        <i class="mdi mdi-account-edit ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 text-lg text-gray-400"></i>
                        {{ __('messages.t_account_settings') }}
                    </a>

                    {{-- Change password --}}
                    <a href="{{ url('account/password') }}" class="ltr:-ml-px rtl:-mr-px relative inline-flex items-center px-4 py-1 border border-gray-300 dark:border-zinc-600 dark:hover:bg-zinc-700 dark:text-gray-200 bg-white dark:bg-zinc-800 text-xs font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-600 focus:border-primary-600">
                        <i class="mdi mdi-key-variant ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 text-[16px] text-gray-400"></i>
                        {{ __('messages.t_change_password') }}
                    </a>

                    {{-- Get verified --}}
                    @if (auth()->user()->status !== 'verified')
                        <a href="{{ url('account/verification') }}" class="ltr:-ml-px rtl:-mr-px relative inline-flex items-center px-4 py-1 border border-gray-300 dark:border-zinc-600 dark:hover:bg-zinc-700 dark:text-gray-200 bg-white dark:bg-zinc-800 text-xs font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-600 focus:border-primary-600">
                            <i class="mdi mdi-check-decagram ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 text-[16px] text-gray-400"></i>
                            {{ __('messages.t_get_verified') }}
                        </a>
                    @endif

                    {{-- View profile --}}
                    <a href="{{ url('profile', auth()->user()->username) }}" class="ltr:-ml-px rtl:-mr-px relative ltr:rounded-r-md rtl:rounded-l-md inline-flex items-center px-4 py-1 border border-gray-300 dark:border-zinc-600 dark:hover:bg-zinc-700 dark:text-gray-200 bg-white dark:bg-zinc-800 text-xs font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-600 focus:border-primary-600">
                        <i class="mdi mdi-account-circle ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 text-lg text-gray-400"></i>
                        {{ __('messages.t_view_profile') }}
                    </a>
                </span>
            </div>

        </div>

    </div>

    {{-- Set availability modal --}}
    @if (auth()->user()->account_type === 'seller' && !$availability)
        <x-forms.modal id="modal-set-availability-container" target="modal-set-availability-button" uid="modal_{{ uid() }}" placement="center-center" size="max-w-md">

            {{-- Header --}}
            <x-slot name="title">{{ __('messages.t_change_availability') }}</x-slot>

            {{-- Content --}}
            <x-slot name="content">
                <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                    {{-- Expected available date --}}
                    <div class="col-span-12">
                        <x-forms.text-input 
                            :label="__('messages.t_when_do_u_expect_tobe_ready_for_new_work')"
                            :placeholder="__('messages.t_mm_dd_yyyy_example', ['example' => now()->addDay()->format('m/d/Y')])"
                            model="availability_date"
                            icon="calendar" />
                    </div>

                    {{-- Message --}}
                    <div class="col-span-12">
                        <x-forms.textarea
                            :label="__('messages.t_add_a_message')"
                            :placeholder="__('messages.t_buyers_will_see_ur_message_when_visiting_ur_gigs')"
                            model="availability_message"
                            icon="message-reply-text" />
                    </div>

                </div>
            </x-slot>

            {{-- Footer --}}
            <x-slot name="footer">
                <x-forms.button action="setAvailability" text="{{ __('messages.t_set_availability') }}" :block="0"  />
            </x-slot>

        </x-forms.modal>
    @endif

</div>

@push('scripts')

    {{-- AlpineJs --}}
    <script>
        function TJPlQeqplTFcTQC() {
            return {

                isHeadlineEditing   : false,
                isAddSkill          : false,
                isAddLanguage       : false,
                isDescriptionEditing: false,

                // Edit headline
                toggleEditingHeadline() {
                    this.isHeadlineEditing = !this.isHeadlineEditing;

                    if (this.isHeadlineEditing) {
                        this.$nextTick(() => {
                            this.$refs.edit_headline.focus();
                        });
                    }
                },
                
                // Disable headline editing
                disableEditing() {
                    this.isHeadlineEditing = false;
                },

                // Avatar changed
                avatar(event) {
                    var output    = document.getElementById('profile-avatar-preview');
                    output.src    = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                    }
                },

                // Init
                init() {

                    // Headline updated
                    window.addEventListener('profile-headline-updated',() => {
                        this.disableEditing();
                    });

                    // Edit skill form
                    window.addEventListener('open-skills-edit-form',() => {
                        this.isAddSkill = true;
                    });

                    // Close edit skill form
                    window.addEventListener('close-edit-skill-form',() => {
                        this.isAddSkill = false;
                    });

                    // Edit language form
                    window.addEventListener('open-languages-edit-form',() => {
                        this.isAddLanguage = true;
                    });

                    // Close edit language form
                    window.addEventListener('close-edit-language-form',() => {
                        this.isAddLanguage = false;
                    });

                    // Close description edit form
                    window.addEventListener('close-description-edit-form',() => {
                        this.isDescriptionEditing = false;
                    });

                }

            }
        }
        window.TJPlQeqplTFcTQC = TJPlQeqplTFcTQC();
    </script>

@endpush