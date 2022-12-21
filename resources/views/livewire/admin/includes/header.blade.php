<header class="z-10 relative py-4 bg-white shadow-sm dark:bg-gray-800 h-16">
    <div class="flex items-center justify-between h-full px-6 text-purple-600 dark:text-purple-300">

        {{-- Left side --}}
        <div class="h-full flex items-center">

            {{-- Mobile menu --}}
            <button class="p-1 ltr:mr-5 rtl:ml-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16"/></svg>
            </button>

            {{-- Logo --}}
            <a href="{{ admin_url() }}" class="block h-full py-1.5">
                <img src="{{ src(settings('general')->logo) }}" alt="{{ settings('general')->title }}" class="h-full hidden md:block">
            </a>
        </div>
        
        {{-- Notifications --}}
        <ul class="flex items-center flex-shrink-0 space-x-6 rtl:space-x-reverse">

            {{-- Pending gigs --}}
            @if ($pending_gigs)
                <li class="flex">
                    <a href="{{ admin_url('gigs') }}" class="flex items-center justify-center group" data-tooltip-target="tooltip-notifications-pending-gigs">
                        <span class="relative inline-flex">
                            <div class="h-8 w-8 flex items-center transition ease-in-out duration-150 justify-center rounded-md border-2 border-gray-50 bg-white group-hover:bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="21px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <polygon points="0 0 24 0 24 24 0 24"/> <path d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z" class="fill-gray-400 group-hover:fill-gray-600"/> </g></svg>
                            </div>
                            <span class="flex absolute h-2 w-2 top-0 right-0 -mt-1 -mr-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-300 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-400"></span>
                            </span>
                        </span>
                        <div id="tooltip-notifications-pending-gigs" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_pending_gigs') }}
                        </div>
                    </a>
                </li>
            @endif

            {{-- Pending verifications --}}
            @if ($pending_verifications)
                <li class="flex">
                    <a href="{{ admin_url('verifications') }}" class="flex items-center justify-center group" data-tooltip-target="tooltip-notifications-pending-verifications">
                        <span class="relative inline-flex">
                            <div class="h-8 w-8 flex items-center transition ease-in-out duration-150 justify-center rounded-md border-2 border-gray-50 bg-white group-hover:bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" class="fill-gray-400 group-hover:fill-gray-600" opacity="0.3"/> <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" class="fill-gray-400 group-hover:fill-gray-600"/> </g></svg>
                            </div>
                            <span class="flex absolute h-2 w-2 top-0 right-0 -mt-1 -mr-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-300 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-400"></span>
                            </span>
                        </span>
                        <div id="tooltip-notifications-pending-verifications" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_pending_verifications') }}
                        </div>
                    </a>
                </li>
            @endif

            {{-- Pending withdrawals --}}
            @if ($pending_withdrawals)
                <li class="flex">
                    <a href="{{ admin_url('withdrawals') }}" class="flex items-center justify-center group" data-tooltip-target="tooltip-notifications-pending-withdrawals">
                        <span class="relative inline-flex">
                            <div class="h-8 w-8 flex items-center transition ease-in-out duration-150 justify-center rounded-md border-2 border-gray-50 bg-white group-hover:bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <rect class="fill-gray-400 group-hover:fill-gray-600" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/> <rect class="fill-gray-400 group-hover:fill-gray-600" x="2" y="8" width="20" height="3"/> <rect class="fill-gray-400 group-hover:fill-gray-600" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/> </g></svg>
                            </div>
                            <span class="flex absolute h-2 w-2 top-0 right-0 -mt-1 -mr-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-300 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-400"></span>
                            </span>
                        </span>
                        <div id="tooltip-notifications-pending-withdrawals" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_pending_withdrawals') }}
                        </div>
                    </a>
                </li>
            @endif

            {{-- Pending portfolios --}}
            @if ($pending_portfolios)
                <li class="flex">
                    <a href="{{ admin_url('portfolios') }}" class="flex items-center justify-center group" data-tooltip-target="tooltip-notifications-pending-portfolios">
                        <span class="relative inline-flex">
                            <div class="h-8 w-8 flex items-center transition ease-in-out duration-150 justify-center rounded-md border-2 border-gray-50 bg-white group-hover:bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <rect class="fill-gray-400 group-hover:fill-gray-600" x="4" y="4" width="7" height="7" rx="1.5"/> <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" class="fill-gray-400 group-hover:fill-gray-600" opacity="0.3"/> </g></svg>
                            </div>
                            <span class="flex absolute h-2 w-2 top-0 right-0 -mt-1 -mr-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-300 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-400"></span>
                            </span>
                        </span>
                        <div id="tooltip-notifications-pending-portfolios" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_pending_portfolios') }}
                        </div>
                    </a>
                </li>
            @endif

            {{-- Pending users --}}
            @if ($pending_users)
                <li class="flex">
                    <a href="{{ admin_url('users') }}" class="flex items-center justify-center group" data-tooltip-target="tooltip-notifications-pending-users">
                        <span class="relative inline-flex">
                            <div class="h-8 w-8 flex items-center transition ease-in-out duration-150 justify-center rounded-md border-2 border-gray-50 bg-white group-hover:bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="19px" height="19px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"></polygon><path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" class="fill-gray-400 group-hover:fill-gray-600" fill-rule="nonzero" opacity="0.3"></path><path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" class="fill-gray-400 group-hover:fill-gray-600" fill-rule="nonzero"></path></g></svg>
                            </div>
                            <span class="flex absolute h-2 w-2 top-0 right-0 -mt-1 -mr-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-300 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-400"></span>
                            </span>
                        </span>
                        <div id="tooltip-notifications-pending-users" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_pending_users') }}
                        </div>
                    </a>
                </li>
            @endif

            {{-- Pending refunds --}}
            @if ($pending_refunds)
                <li class="flex">
                    <a href="{{ admin_url('refunds') }}" class="flex items-center justify-center group" data-tooltip-target="tooltip-notifications-pending-refunds">
                        <span class="relative inline-flex">
                            <div class="h-8 w-8 flex items-center transition ease-in-out duration-150 justify-center rounded-md border-2 border-gray-50 bg-white group-hover:bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="19px" height="19px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <rect class="fill-gray-400 group-hover:fill-gray-600" opacity="0.3" x="2" y="4" width="20" height="5" rx="1"/> <path d="M5,7 L8,7 L8,21 L7,21 C5.8954305,21 5,20.1045695 5,19 L5,7 Z M19,7 L19,19 C19,20.1045695 18.1045695,21 17,21 L11,21 L11,7 L19,7 Z" class="fill-gray-400 group-hover:fill-gray-600"/> </g></svg>
                            </div>
                            <span class="flex absolute h-2 w-2 top-0 right-0 -mt-1 -mr-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-300 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-400"></span>
                            </span>
                        </span>
                        <div id="tooltip-notifications-pending-refunds" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_pending_refunds') }}
                        </div>
                    </a>
                </li>
            @endif

            {{-- Reported gigs --}}
            @if ($reported_gigs)
                <li class="flex">
                    <a href="{{ admin_url('reports/gigs') }}" class="flex items-center justify-center group" data-tooltip-target="tooltip-notifications-reported-gigs">
                        <span class="relative inline-flex">
                            <div class="h-8 w-8 flex items-center transition ease-in-out duration-150 justify-center rounded-md border-2 border-gray-50 bg-white group-hover:bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <rect x="0" y="0" width="24" height="24"/> <path d="M2,13.1500272 L2,5.5 C2,4.67157288 2.67157288,4 3.5,4 L6.37867966,4 C6.77650439,4 7.15803526,4.15803526 7.43933983,4.43933983 L10,7 L20.5,7 C21.3284271,7 22,7.67157288 22,8.5 L22,19.5 C22,20.3284271 21.3284271,21 20.5,21 L10.9835977,21 C10.9944753,20.8347382 11,20.6680143 11,20.5 C11,16.3578644 7.64213562,13 3.5,13 C2.98630124,13 2.48466491,13.0516454 2,13.1500272 Z" class="fill-gray-400 group-hover:fill-gray-600"/> <path d="M4.5,16 C5.05228475,16 5.5,16.4477153 5.5,17 L5.5,19 C5.5,19.5522847 5.05228475,20 4.5,20 C3.94771525,20 3.5,19.5522847 3.5,19 L3.5,17 C3.5,16.4477153 3.94771525,16 4.5,16 Z M4.5,23 C3.94771525,23 3.5,22.5522847 3.5,22 C3.5,21.4477153 3.94771525,21 4.5,21 C5.05228475,21 5.5,21.4477153 5.5,22 C5.5,22.5522847 5.05228475,23 4.5,23 Z" class="fill-gray-400 group-hover:fill-gray-600" opacity="0.3"/> </g></svg>
                            </div>
                            <span class="flex absolute h-2 w-2 top-0 right-0 -mt-1 -mr-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-300 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-400"></span>
                            </span>
                        </span>
                        <div id="tooltip-notifications-reported-gigs" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_reported_gigs') }}
                        </div>
                    </a>
                </li>
            @endif

            {{-- Reported users --}}
            @if ($reported_users)
                <li class="flex">
                    <a href="{{ admin_url('reports/users') }}" class="flex items-center justify-center group" data-tooltip-target="tooltip-notifications-reported-users">
                        <span class="relative inline-flex">
                            <div class="h-8 w-8 flex items-center transition ease-in-out duration-150 justify-center rounded-md border-2 border-gray-50 bg-white group-hover:bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="19px" height="19px" viewBox="0 0 24 24" version="1.1"> <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <polygon points="0 0 24 0 24 24 0 24"/> <path d="M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z M21,8 L17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L21,6 C21.5522847,6 22,6.44771525 22,7 C22,7.55228475 21.5522847,8 21,8 Z" class="fill-gray-400 group-hover:fill-gray-600" fill-rule="nonzero" opacity="0.3"/> <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" class="fill-gray-400 group-hover:fill-gray-600" fill-rule="nonzero"/> </g></svg>
                            </div>
                            <span class="flex absolute h-2 w-2 top-0 right-0 -mt-1 -mr-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-300 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-400"></span>
                            </span>
                        </span>
                        <div id="tooltip-notifications-reported-users" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_reported_users') }}
                        </div>
                    </a>
                </li>
            @endif

            {{-- Admin profile --}}
            <li class="flex">

                {{-- Avatar --}}
                <div class="overflow-hidden relative w-8 h-8 bg-gray-100 rounded-md dark:bg-gray-600 cursor-pointer" data-dropdown-toggle="admin-dropdown" data-dropdown-placement="bottom-start">
                    <svg class="absolute -left-1 w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                </div>

                {{-- Dropdown --}}
                <div id="admin-dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 !mt-2">
                    <ul class="py-1 text-xs font-bold tracking-wide text-gray-700 dark:text-gray-200">

                        {{-- Fast support --}}
                        <li>
                            <a href="{{ url('https://wa.me/'. config('global.whatsapp') .'/?text=Hello') }}" target="_blank" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                {{ __('messages.t_fast_support') }}
                            </a>
                        </li>

                        {{-- Edit profile --}}
                        <li>
                            <a href="{{ admin_url('profile') }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                {{ __('messages.t_edit_profile') }}
                            </a>
                        </li>

                        {{-- Go to homepage --}}
                        <li>
                            <a href="{{ url('/') }}" target="_blank" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                {{ __('messages.t_go_homepage') }}
                            </a>
                        </li>
                    </ul>
                    <div class="py-1 text-xs font-bold tracking-wide">

                        {{-- Logout --}}
                        <a href="{{ admin_url('logout') }}" class="block py-2 px-4 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            {{ __('messages.t_logout') }}
                        </a>

                    </div>
                </div>
            </li>
            
        </ul>
    </div>
</header>
