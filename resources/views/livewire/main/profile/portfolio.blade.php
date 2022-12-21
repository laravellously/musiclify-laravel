<div class="w-full px-2">
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        {{-- User details --}}
        <div class="col-span-12 lg:col-span-4">
            <div class="border border-gray-100 rounded-lg bg-white dark:bg-zinc-800 dark:border-zinc-700">
                <div class="flex flex-col items-center py-10">
                    <img class="mb-3 w-24 h-24 rounded-full object-cover" src="{{ src($user->avatar) }}" alt="{{ $user->username }}">
                    <h5 class="mb-1 text-base font-black text-gray-900 dark:text-gray-200 tracking-wide flex items-center">
                        {{ $user->username }}
                        @if ($user->status === 'verified')
                            <svg data-tooltip-target="account-verified-badge" class="ltr:ml-0.5 rtl:mr-0.5" width="17px" height="17px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
                            <div id="account-verified-badge" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                {{ __('messages.t_account_verified') }}
                            </div>
                        @endif
                    </h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $user->headline }}</span>
                    <div class="flex mt-4 space-x-3 rtl:space-x-reverse lg:mt-6">

                        {{-- Contact me --}}
                        <a href="{{ url('messages/new', $user->username) }}" class="inline-flex items-center py-3 px-4 text-xs font-medium text-center text-white bg-primary-600 rounded-sm hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300">{{ __('messages.t_contact_me') }}</a>

                        {{-- View profile --}}
                        <a href="{{ url('profile', $user->username) }}" class="inline-flex items-center py-2 px-4 text-xs font-medium text-center text-gray-900 bg-white dark:bg-zinc-700 dark:text-zinc-400 dark:border-zinc-700 dark:hover:bg-zinc-600 rounded-sm border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200">{{ __('messages.t_view_profile') }}</a>

                    </div>
                </div>
            </div>
        </div>

        {{-- Projects --}}
        <div class="col-span-12 lg:col-span-8">
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                @forelse ($projects as $project)
                    <div class="col-span-12 lg:col-span-6">
                        <a href="{{ url('projects', $project->slug) }}" class="relative block p-8 overflow-hidden rounded-lg bg-white dark:bg-zinc-800">

                            <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>

                            <div class="justify-between sm:flex">
                                <div>
                                    <h5 class="text-base font-bold text-gray-900 dark:text-white">
                                        {{ $project->title }}
                                    </h5>
                                    @if ($project->project_link)
                                        <p class="mt-1 text-xs font-normal text-gray-400 dark:text-gray-300 italic">{{ $project->project_link }}</p>
                                    @endif
                                </div>

                                <div class="flex-shrink-0 hidden ltr:ml-3 rtl:mr-3 sm:block">
                                    <img class="object-cover w-16 h-16 rounded-lg shadow-sm" src="{{ src($project->thumbnail) }}" alt="{{ $project->title }}" />
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    
                    {{-- No projects yet --}}
                    <div class="col-span-12">
                        <div class="border-dashed border-2 rounded-md mb-6">
                            <div class="py-14 px-6 text-center text-sm sm:px-14">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <p class="mt-4 font-semibold text-gray-900">{{ __('messages.t_no_projects') }}</p>
                                <p class="mt-2 text-gray-500 max-w-md mx-auto">{{ __('messages.t_this_user_has_no_projects_yet') }}</p>
                                <a href="{{ url('profile', $user->username) }}" class="mt-4 font-medium text-xs text-primary-600 hover:underline block">Back to profile</a>
                            </div>
                        </div>
                    </div>

                @endforelse

            </div>
        </div>

    </div>
</div>