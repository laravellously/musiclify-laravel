<div class="w-full" x-data="window.CQjwMygsGRWknEn" x-init="initialize">

    {{-- Overview --}}
    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">
    
        {{-- Section title --}}
        <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-4">
                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_overview') }}</h3>
                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_create_gig_overview_subtitle') }}</p>
                </div>
                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                    <a href="{{ url('/') }}" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                        <span class="text-xs font-medium text-primary-600 hover:text-primary-700"> 
                            {{ __('messages.t_back_to_homepage') }}
                        </span>
                    </a>
                </div>
            </div>
        </div>
        
        {{-- Section content --}}
        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 px-8 py-6">
        
            {{-- Service title --}}
            <div class="col-span-12">
                <x-forms.text-input 
                    label="{{ __('messages.t_i_will') }}" 
                    placeholder="{{ __('messages.t_do_something_im_really_good_at') }}" 
                    model="title"
                    icon="format-title" />
            </div>
        
            {{-- Category --}}
            <div class="col-span-12 md:col-span-6">
                <label class="mb-3 block text-xs font-medium {{ $errors->first('category') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-200' }}">{{ __('messages.t_choose_parent_category') }}</label>
                <div class="min-w-0">
                    <ul class="max-h-52 flex-auto space-y-1 overflow-y-auto border-2 rounded {{ $errors->first('category') ? 'border-red-500' : 'border-gray-100 dark:border-zinc-700' }}">

                        @foreach ($categories as $cat)
                            <li wire:click="$set('category', {{ $cat->id }})" class="group flex cursor-pointer items-center rounded-0 p-2 hover:bg-gray-50 dark:hover:bg-zinc-700 text-gray-900 dark:text-gray-200 {{ $category === $cat->id ? 'bg-gray-50 dark:bg-zinc-700' : '' }}">
                                <img src="{{ src($cat->icon) }}" alt="{{ $cat->name }}" class="h-6 w-6 flex-none rounded-full">
                                <span class="ltr:ml-3 rtl:mr-3 flex-auto truncate text-xs font-medium">{{ $cat->name }}</span>
                                <div wire:loading.remove wire:target="$set('category', {{ $cat->id }})">
                                    @if ($category === $cat->id)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:ml-3 rtl:mr-3 h-4 w-4 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    @else
                                        <svg class="ltr:ml-3 rtl:mr-3 h-4 w-4 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path> </svg>
                                    @endif
                                </div>

                                {{-- Loading --}}
                                <div wire:loading wire:target="$set('category', {{ $cat->id }})">
                                    <svg class="animate-spin ltr:-ml-3 rtl:-mr-3 h-4 w-4 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path> </svg>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
                {{-- Error --}}
                @error('category')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('category') }}</p>
                @enderror
            </div>
        
            {{-- Subcategory --}}
            <div class="col-span-12 md:col-span-6">

                <label class="mb-3 block text-xs font-medium {{ $errors->first('subcategory') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-200' }}">{{ __('messages.t_choose_subcategory') }}</label>
                <div class="min-w-0">
                    <ul class="max-h-52 flex-auto space-y-1 overflow-y-auto {{ count($subcategories) ? 'border-2 rounded' : '' }} {{ $errors->first('subcategory') ? 'border-red-500' : 'border-gray-100 dark:border-zinc-700' }}">

                        @foreach ($subcategories as $subcat)
                            <li wire:click="$set('subcategory', {{ $subcat->id }})" class="group flex cursor-pointer items-center rounded-0 p-2 hover:bg-gray-50 dark:hover:bg-zinc-700 text-gray-900 dark:text-gray-200 {{ $subcategory === $subcat->id ? 'bg-gray-50 dark:bg-zinc-700' : '' }}">
                                <img src="{{ src($subcat->icon) }}" alt="{{ $subcat->name }}" class="h-6 w-6 flex-none rounded-full">
                                <span class="ltr:ml-3 rtl:mr-3 flex-auto truncate text-xs font-medium">{{ $subcat->name }}</span>
                                <div wire:loading.remove wire:target="$set('subcategory', {{ $subcat->id }})">
                                    @if ($subcategory === $subcat->id)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:ml-3 rtl:mr-3 h-4 w-4 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    @endif
                                </div>

                                {{-- Loading --}}
                                <div wire:loading wire:target="$set('subcategory', {{ $subcat->id }})">
                                    <svg class="animate-spin ltr:-ml-3 rtl:-mr-3 h-4 w-4 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path> </svg>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
                {{-- Error --}}
                @error('subcategory')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('subcategory') }}</p>
                @enderror
            </div>
        
            {{-- Desciption --}}
            <div class="col-span-12">
                <x-forms.ckeditor 
                    :label="__('messages.t_description')"
                    :placeholder="__('messages.t_briefly_describe_ur_gig')"
                    model="description" />
            </div>

            {{-- Search tags --}}
            <div class="col-span-12">
                <x-forms.tags-input
                    :label="__('messages.t_search_tags')"
                    :placeholder="__('messages.t_press_enter_to_add_tags')"
                    model="tags"
                    :tags="$tags" />
            </div>
        
        </div>
    
    </div>

    {{-- SEO --}}
    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">
    
        {{-- Section title --}}
        <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4" :class="seo.is_enabled ? 'rounded-t-md' : 'rounded-md'">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-4">
                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_seo') }}</h3>
                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_search_engine_gig_preview') }}</p>
                </div>
                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                    <button x-on:click="seo.is_enabled = !seo.is_enabled" type="button" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
                        <span class="text-xs font-medium text-primary-600 hover:text-primary-700"> 
                            {{ __('messages.t_upgrade_seo') }}
                        </span>
                    </button>
                </div>
            </div>
        </div>
        
        {{-- Section content --}}
        <div class="px-8 py-6" x-show="seo.is_enabled">
            <div class="w-full flex flex-col justify-center">
                <div class="relative">
                    <div class="grid sm:grid-cols-2 gap-4">

                        {{-- SEO Form --}}
                        <div class="border-b sm:border-b-0 sm:border-r sm:pr-12 relative pb-12 sm:mb-0 dark:border-zinc-700">
                            <div class="w-full space-y-6">
                                
                                {{-- SEO Title --}}
                                <x-forms.text-input 
                                    label="{{ __('messages.t_seo_title') }}" 
                                    placeholder="{{ __('messages.t_enter_seo_title') }}" 
                                    model="seo_title"
                                    icon="google"
                                    x-model="seo.title"
                                    maxlength="100" />

                                {{-- SEO Description --}}
                                <x-forms.textarea 
                                    label="{{ __('messages.t_seo_description') }}" 
                                    placeholder="{{ __('messages.t_enter_seo_description') }}" 
                                    model="seo_description"
                                    icon="folder-text" 
                                    rows="6" 
                                    x-model="seo.description"
                                    maxlength="150" />
                                    
                            </div>

                            {{-- Middle icon --}}
                            <div class="hidden sm:block absolute right-0 transform translate-x-7 top-1/2 -translate-y-7">
                                <p class="font-bold text-gray-500 rounded-full bg-gray-50 dark:bg-zinc-800 flex items-center justify-center text-xs" style="height: 50px; width: 50px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                </p>
                            </div>
                            <div class="sm:hidden absolute transform bottom-0 left-1/2 translate-y-6 -translate-x-7">
                                <p class="font-bold text-gray-500 rounded-full bg-gray-50 dark:bg-zinc-800 flex items-center justify-center text-xs" style="height: 50px; width: 50px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                                </p>
                            </div>
                        </div>

                        {{-- SEO Preview --}}
                        <div class="pt-6 sm:pt-8 sm:px-8 sm:pb-8 flex items-center justify-start sm:!justify-center">
                        
                            <template x-if="seo.title && seo.description">
                                <div class="relative max-w-full">
                                    <span class="text-xs font-normal truncate block text-green-700" x-text="seoUrlPreview"></span>
                                    <h2 class="text-sm text-primary-700 font-medium truncate block" x-text="seo.title"></h2>
                                    <div class="text-xs text-gray-600 font-normal pt-1">
                                        <span class="text-gray-400" x-text="today"></span> — <span x-text="seo.description"></span>
                                    </div>
                                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                                        <div class="mt-2 flex items-center text-sm text-gray-500">

                                            {{-- Stars --}}
                                            <div class="flex items-center flex-shrink-0">
                                                <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                                <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                                <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                                <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                                <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                            </div>

                                            <div class="text-xs font-normal text-gray-400 ml-2">
                                                4.8 <span class="px-1">•</span> 702 {{ strtolower(__('messages.t_reviews')) }} <span class="px-1">•</span> $5.00
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </template>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- FAQ --}}
    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">
    
        {{-- Section title --}}
        <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 {{ count($faqs) ? 'rounded-t-md' : 'rounded-md' }}">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-4">
                    <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_faq') }}</h3>
                    <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_create_gig_faq_subtitle') }}</p>
                </div>
                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                    <button id="modal-add-service-faq-button" type="button" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        <span class="text-xs font-medium text-primary-600 hover:text-primary-700"> 
                            {{ __('messages.t_add_faq') }}
                        </span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Section content --}}
        @if (count($faqs))
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 p-8">
                <div class="col-span-12">
                    <div class="space-y-4">
                        
                        {{-- List of faq --}}
                        @foreach ($faqs as $key => $faq)
                            <details class="px-6 py-4 rounded-lg bg-gray-50 dark:bg-zinc-700 group relative" wire:key="faq-list-id-{{ $key }}">
                                <summary class="flex items-center justify-between cursor-pointer focus:outline-none">

                                    {{-- Question --}}
                                    <h5 class="text-sm font-medium text-gray-900 dark:text-gray-200 focus:outline-none flex items-center">
                                        {{ $faq['question'] }}
                                        <button wire:click="removeFaq({{ $key }})" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                            <span class="text-xs font-medium text-red-500 hover:text-red-600"> 
                                                {{ __('messages.t_remove') }}
                                            </span>
                                        </button>
                                    </h5>
                            
                                    <span class="relative flex-shrink-0 ml-1.5 w-5 h-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-5 h-5 opacity-100 group-open:opacity-0 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" > <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/> </svg>
                            
                                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-5 h-5 opacity-0 group-open:opacity-100 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" > <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/> </svg>
                                    </span>
                                </summary>
                            
                                <p class="mt-4 leading-relaxed text-gray-700 dark:text-gray-100 text-xs">
                                    {{ $faq['answer'] }}
                                </p>
                            </details>
                        @endforeach

                    </div>
                </div>
            </div>
        @endif

    </div>
    
    {{-- Actions --}}
    <div class="flex justify-end">
        <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}"  />
    </div> 
    
    {{-- Create FAQ Modal --}}
    <x-forms.modal id="modal-add-service-faq-container" target="modal-add-service-faq-button" uid="modal_{{ uid() }}" placement="center-center" size="max-w-md">

        {{-- Header --}}
        <x-slot name="title">{{ __('messages.t_add_faq') }}</x-slot>

        {{-- Content --}}
        <x-slot name="content">
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                {{-- Question --}}
                <div class="col-span-12">
                    <div class="mt-2 relative">
                        <input type="text" placeholder="{{ __('messages.t_faq_question_example') }}" wire:model.defer="question" class="dark:bg-transparent block w-full text-xs rounded border-2 pr-10 py-3 pl-3 font-normal {{ $errors->first('question') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 dark:border-zinc-600 placeholder-gray-400 dark:placeholder-gray-200 focus:ring-primary-600 focus:border-primary-600 dark:text-gray-100' }}" maxlength="100">
                        {{-- Icon --}}
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="mdi mdi-file-question {{ $errors->first('question') ? 'text-red-400' : 'text-gray-400' }}"></i>
                        </div>
                    </div>
                
                    {{-- Error --}}
                    @error('question')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('question') }}</p>
                    @enderror
                </div>

                {{-- Answer --}}
                <div class="col-span-12">
                    <div>
                        <div class="relative">
                            <textarea placeholder="{{ __('messages.t_faq_answer_example') }}" wire:model.defer="answer" rows="8" class="dark:bg-transparent block w-full text-xs rounded border-2 pr-10 py-3 pl-3 font-normal resize-none {{ $errors->first('answer') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 dark:border-zinc-600 placeholder-gray-400 dark:placeholder-gray-200 focus:ring-primary-600 focus:border-primary-600 dark:text-gray-100' }}" maxlength="300"></textarea>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="mdi mdi-receipt-text-check {{ $errors->first('answer') ? 'text-red-400' : 'text-gray-400' }}"></i>
                            </div>
                        </div>
                    
                        {{-- Error --}}
                        @error('answer')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('answer') }}</p>
                        @enderror
                    </div>
                </div>

            </div>
        </x-slot>

        {{-- Footer --}}
        <x-slot name="footer">
            <x-forms.button action="addFaq" text="{{ __('messages.t_add') }}"  />
        </x-slot>

    </x-forms.modal>

</div>

@push('scripts')

    {{-- Slugify Plugin --}}
    <script src="https://cdn.jsdelivr.net/npm/slugify@1.6.5/slugify.min.js"></script>
    
    {{-- AlpineJS --}}
    <script>
        function CQjwMygsGRWknEn() {
            return {
                seo: {
                    is_enabled : false,
                    title      : null,
                    description: null
                },

                // Initialize
                initialize() {

                },

                // Get seo today date
                today() {
                    const date     = new Date();
                    const strArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    const d        = date.getDate();
                    const m        = strArray[date.getMonth()];
                    const y        = date.getFullYear();
                    return '' + m + ' ' + (d <= 9 ? '0' + d : d) + ', ' + y;
                },

                // Set seo url preview
                seoUrlPreview() {
                    if (this.seo.title) {
                        return "{{ url('service') }}/" + slugify(this.seo.title) 
                    }
                }
            }
        }
        window.CQjwMygsGRWknEn = CQjwMygsGRWknEn();
    </script>

@endpush