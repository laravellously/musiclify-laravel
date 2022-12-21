<div class="w-full">

    {{-- Section title --}}
    <div class="max-w-xl mx-auto mb-12 text-center block">
        <h1 class="text-xl md:text-3xl font-black text-black dark:text-gray-100 tracking-wide">{{ __('messages.t_hire_the_best_skill_name_experts', ['skill' => $skill->name]) }}</h1>
        <p class="text-xs md:text-sm text-gray-400 dark:text-gray-300 font-medium mt-2">{{ __('messages.t_hire_the_best_skill_name_experts_subtitle', ['skill' => $skill->name]) }}</p>
    </div>

    {{-- List of sellers --}}
    <ul role="list" class="grid grid-cols-1 md:gap-x-6 gap-y-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($sellers as $seller)
            <li class="col-span-1 flex flex-col text-center bg-white dark:bg-zinc-800 rounded-lg shadow divide-y divide-gray-200 dark:divide-zinc-700">
                <div class="flex-1 flex flex-col p-8">

                    {{-- Avatar --}}
                    <img class="w-28 h-28 flex-shrink-0 mx-auto rounded-full object-cover" src="{{ src($seller->avatar) }}" alt="{{ $seller->username }}">
                    <h3 class="mt-6 text-gray-900 dark:text-gray-200 text-base font-bold tracking-wider flex items-center justify-center">
                        {{ $seller->username }}
                        @if ($seller->status === 'verified')
                            <svg data-tooltip-target="account-verified-badge" class="ltr:ml-0.5 rtl:mr-0.5" width="17px" height="17px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
                            <div id="account-verified-badge" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                {{ __('messages.t_account_verified') }}
                            </div>
                        @endif
                    </h3>
                    <dl class="mt-1 flex-grow flex flex-col justify-between">
                        <dt class="sr-only">Level</dt>
                        <dd class="text-sm font-medium" style="color:{{ $seller->level->level_color }}">{{ $seller->level->title }}</dd>
                        <dt class="sr-only">Skills</dt>
                        <dd class="mt-5 space-x-2 rtl:space-x-reverse">
                            @foreach ($seller->skills()->limit(3)->get() as $skill)
                                <span class="inline-flex mb-2 px-3 py-1.5 items-center text-gray-800 dark:text-zinc-400 text-xs font-medium bg-gray-100 dark:bg-zinc-700 rounded-full">
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </dd>
                    </dl>

                </div>

                {{-- Actions --}}
                <div>
                    <div class="-mt-px flex divide-x divide-gray-200 dark:divide-zinc-700 rtl:divide-x-reverse">

                        {{-- Contact me --}}
                        <div class="w-0 flex-1 flex">
                            <a href="{{ url('messages/new', $seller->username) }}" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-xs text-gray-700 dark:text-gray-200 dark:hover:text-gray-100 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/> <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/> </svg>
                                <span class="ltr:ml-2 rtl:mr-2">{{ __('messages.t_contact_me') }}</span>
                            </a>
                        </div>

                        {{-- View my profile --}}
                        <div class="-ml-px w-0 flex-1 flex">
                            <a href="{{ url('profile', $seller->username) }}" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-xs text-gray-700 dark:text-gray-200 dark:hover:text-gray-100 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/></svg>
                                <span class="ltr:ml-2 rtl:mr-2">{{ __('messages.t_view_profile') }}</span>
                            </a>
                        </div>

                    </div>
                </div>

            </li>
        @endforeach
    </ul>

    {{-- Pages --}}
    @if ($sellers->hasPages())
        <div class="flex justify-center pt-12">
            {!! $sellers->links('pagination::tailwind') !!}
        </div>
    @endif

</div>