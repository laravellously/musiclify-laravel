<div class="flex-col justify-between h-screen bg-white border-r z-20 hidden w-56 overflow-y-auto md:block flex-shrink-0" x-data="window.dsEHEZaGrdFOBZQ">
    <div class="px-0 py-6">

        {{-- Logo --}}
        <span class="block w-32 h-10 bg-gray-200 rounded-lg"></span>
    
        {{-- Nav menu --}}
        <nav class="flex flex-col mt-6 space-y-1">

            {{-- Dashboard Button --}}
            <a href="{{ admin_url() }}" class="{{ request()->is(config('global.dashboard_prefix')) ? 'border-l-[3px] border-primary-600 bg-indigo-50 hover:bg-indigo-100 text-primary-700' : 'border-transparent text-gray-500' }} flex items-center px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
    
                <span class="ml-3 text-xs font-medium"> {{ __('messages.t_dashboard') }} </span>
            </a>

            {{-- Items --}}
            <template x-for="(item, index) in items" :key="`dashboard-sidebar-item-${ index }`">
                <details class="group">

                    {{-- Summary --}}
                    <summary :class="item.is_active ? 'border-l-[3px] border-primary-600 bg-indigo-50 hover:bg-indigo-100 text-primary-700' : 'border-l-[3px] border-transparent text-gray-700'" class="flex items-center px-4 py-3 cursor-pointer focus:outline-none">
                        {{-- Icon --}}
                        <div x-html="item.icon"></div>
            
                        {{-- Text --}}
                        <span class="ml-3 text-xs font-medium" x-text="item.text"></span>

                        {{-- Arrow --}}
                        <span class="ml-auto transition duration-300 shrink-0 group-open:-rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" > <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/> </svg>
                        </span>
                    </summary>

                    {{-- Submenu --}}
                    <nav class="mt-1.5 ml-8 flex flex-col">
                        <template x-for="(sub, index) in item.subs" :key="`dashboard-sidebar-subitem-${index}`">
                            <a :href="sub.to" class="flex items-center px-4 py-2 text-gray-500 rounded-none hover:text-primary-700">                            
                                <span class="ltr:ml-2 rtl:mr-2 text-xs font-medium" x-text="sub.text"></span>
                            </a>
                        </template>
                    </nav>

                </details>
            </template>

        </nav>

    </div>
</div>

@push('javascript')
    <script>
        function dsEHEZaGrdFOBZQ() {
            return {

                current_path: "{{ request()->path() }}",

                items: [

                    // Users
                    {
                        is_active: @js(request()->is( config('global.dashboard_prefix') . '/' . 'users' ) || request()->is( config('global.dashboard_prefix') . '/' . 'users/*' )),
                        text     : "{{ __('messages.t_users') }}",
                        icon     : '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>',
                        subs: [
                            {
                                to  : "{{ admin_url('users') }}",
                                text: "{{ __('messages.t_browse_all') }}"
                            },
                            {
                                to  : "{{ admin_url('users/create') }}",
                                text: "{{ __('messages.t_create_new') }}" 
                            },
                            {
                                to  : "{{ admin_url('admins') }}",
                                text: "{{ __('messages.t_admins') }}" 
                            }
                        ]
                    },

                    // Categories
                    {
                        is_active: @js(request()->is( config('global.dashboard_prefix') . '/' . 'categories' ) || request()->is( config('global.dashboard_prefix') . '/' . 'categories/*' )),
                        text     : "{{ __('messages.t_categories') }}",
                        icon     : '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>',
                        subs: [
                            {
                                to  : "{{ admin_url('categories') }}",
                                text: "{{ __('messages.t_browse_all') }}"
                            },
                            {
                                to  : "{{ admin_url('categories/create') }}",
                                text: "{{ __('messages.t_create_new') }}" 
                            }
                        ]
                    },

                    // Subcategories
                    {
                        is_active: @js(request()->is( config('global.dashboard_prefix') . '/' . 'subcategories' ) || request()->is( config('global.dashboard_prefix') . '/' . 'subcategories/*' )),
                        text     : "{{ __('messages.t_subcategories') }}",
                        icon     : '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16"/></svg>',
                        subs: [
                            {
                                to  : "{{ admin_url('subcategories') }}",
                                text: "{{ __('messages.t_browse_all') }}"
                            },
                            {
                                to  : "{{ admin_url('subcategories/create') }}",
                                text: "{{ __('messages.t_create_new') }}" 
                            }
                        ]
                    },

                    // Gigs
                    {
                        is_active: @js(request()->is( config('global.dashboard_prefix') . '/' . 'gigs' ) || request()->is( config('global.dashboard_prefix') . '/' . 'gigs/*' )),
                        text     : "{{ __('messages.t_gigs') }}",
                        icon     : '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>',
                        subs: [
                            {
                                to  : "{{ admin_url('gigs') }}",
                                text: "{{ __('messages.t_browse_all') }}"
                            }
                        ]
                    },

                    // Gigs
                    {
                        is_active: @js(request()->is( config('global.dashboard_prefix') . '/' . 'settings' ) || request()->is( config('global.dashboard_prefix') . '/' . 'settings/*' )),
                        text     : "{{ __('messages.t_settings') }}",
                        icon     : '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/> <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
                        subs: [
                            {
                                to  : "{{ admin_url('settings/currency') }}",
                                text: "{{ __('messages.t_currency_settings') }}"
                            }
                        ]
                    },

                ]

            }
        }
        window.dsEHEZaGrdFOBZQ = dsEHEZaGrdFOBZQ();
    </script>
@endpush