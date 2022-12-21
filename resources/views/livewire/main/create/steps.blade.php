<div class="w-full mb-10">    
    <nav aria-label="Progress">
        <ol role="list" class="space-y-4 md:flex md:space-y-0 md:space-x-8">

            {{-- Overview --}}
            <li class="md:flex-1">
                <button type="button" class="group ltr:pl-4 rtl:pr-4 py-2 w-full flex flex-col ltr:border-l-4 rtl:border-r-4 {{ $current_step >= 1 ? 'border-primary-500 hover:border-primary-600' : 'dark:border-zinc-600' }} ltr:md:pl-0 rtl:md:pr-0 md:pt-4 md:pb-0 ltr:md:border-l-0 rtl:md:border-r-0 md:border-t-4">
                    <span class="text-xs font-semibold tracking-wide uppercase  {{ $current_step >= 1 ? 'text-primary-500 group-hover:text-primary-600' : 'text-gray-400 dark:text-gray-200 dark:group-hover:text-gray-100 group-hover:text-gray-500' }}">{{ __('messages.t_step_number_1') }}</span>
                    <span class="text-sm font-medium dark:text-gray-400">{{ __('messages.t_overview') }}</span>
                </button>
            </li>
        
            {{-- Pricing --}}
            <li class="md:flex-1">
                <button type="button" class="group ltr:pl-4 rtl:pr-4 py-2 w-full flex flex-col ltr:border-l-4 rtl:border-r-4 {{ $current_step >= 2 ? 'border-primary-500 hover:border-primary-600' : 'dark:border-zinc-600' }} ltr:md:pl-0 rtl:md:pr-0 md:pt-4 md:pb-0 ltr:md:border-l-0 rtl:md:border-r-0 md:border-t-4">
                    <span class="text-xs font-semibold tracking-wide uppercase  {{ $current_step >= 2 ? 'text-primary-500 group-hover:text-primary-600' : 'text-gray-400 dark:text-gray-200 dark:group-hover:text-gray-100 group-hover:text-gray-500' }}">{{ __('messages.t_step_number_2') }}</span>
                    <span class="text-sm font-medium dark:text-gray-400">{{ __('messages.t_pricing') }}</span>
                </button>
            </li>
        
            {{-- Requirements --}}
            <li class="md:flex-1">
                <button type="button" class="group ltr:pl-4 rtl:pr-4 py-2 w-full flex flex-col ltr:border-l-4 rtl:border-r-4 {{ $current_step >= 3 ? 'border-primary-500 hover:border-primary-600' : 'dark:border-zinc-600' }} ltr:md:pl-0 rtl:md:pr-0 md:pt-4 md:pb-0 ltr:md:border-l-0 rtl:md:border-r-0 md:border-t-4">
                    <span class="text-xs font-semibold tracking-wide uppercase  {{ $current_step >= 3 ? 'text-primary-500 group-hover:text-primary-600' : 'text-gray-400 dark:text-gray-200 dark:group-hover:text-gray-100 group-hover:text-gray-500' }}">{{ __('messages.t_step_number_3') }}</span>
                    <span class="text-sm font-medium dark:text-gray-400">{{ __('messages.t_requirements') }}</span>
                </button>
            </li>

            {{-- Gallery --}}
            <li class="md:flex-1">
                <button type="button" class="group ltr:pl-4 rtl:pr-4 py-2 w-full flex flex-col ltr:border-l-4 rtl:border-r-4 {{ $current_step >= 4 ? 'border-primary-500 hover:border-primary-600' : 'dark:border-zinc-600' }} ltr:md:pl-0 rtl:md:pr-0 md:pt-4 md:pb-0 ltr:md:border-l-0 rtl:md:border-r-0 md:border-t-4">
                    <span class="text-xs font-semibold tracking-wide uppercase  {{ $current_step >= 4 ? 'text-primary-500 group-hover:text-primary-600' : 'text-gray-400 dark:text-gray-200 dark:group-hover:text-gray-100 group-hover:text-gray-500' }}">{{ __('messages.t_step_number_4') }}</span>
                    <span class="text-sm font-medium dark:text-gray-400">{{ __('messages.t_gallery') }}</span>
                </button>
            </li>

        </ol>
    </nav>
</div>