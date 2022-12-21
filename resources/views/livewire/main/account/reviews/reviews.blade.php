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

                    {{-- Form --}}
                    <div class="w-full">

                        {{-- Section header --}}
                        <div class="mb-14 py-6 px-4 sm:p-4">
                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_reviews') }}</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ __('messages.t_account_reviews_subtitle') }}</p>
                        </div>

                        {{-- Session message --}}
                        @if (session()->has('message'))
                            <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 mx-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/></svg>
                                    </div>
                                    <div class="ltr:ml-3 rtl:mr-3 flex items-center">
                                        <p class="text-xs font-bold tracking-wide text-red-700">
                                            {{ session()->get('message') }}
                                        </p>
                                    </div>
                                </div>
                            </div>  
                        @endif
                        
                        <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
                            <table class="w-full whitespace-nowrap">
                                <thead class="bg-gray-100 dark:bg-zinc-700">
                                    <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white">
                                        <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">{{ __('messages.t_gig') }}</th>
                                        <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">{{ __('messages.t_message') }}</th>
                                        <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">{{ __('messages.t_rating') }}</th>
                                        <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">{{ __('messages.t_date') }}</th>
                                        <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">{{ __('messages.t_options') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="w-full">
                    
                                    @foreach ($reviews as $review)
                                        <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" wire:key="reviews-{{ $review->id }}">
                    
                                            {{-- Gig --}}
                                            <td class="ltr:pl-4 rtl:pr-4">
                                                <a href="{{ url('service', $review->gig->slug) }}" target="_blank" class="flex items-center">
                                                    <div class="w-8 h-8">
                                                        <img class="w-full h-full rounded object-cover" src="{{ src($review->gig->thumbnail) }}" alt="{{ $review->gig->title }}" />
                                                    </div>
                                                    <div class="ltr:pl-4 rtl:pr-4">
                                                        <p class="font-medium text-xs truncate max-w-[200px] block overflow-hidden dark:text-gray-100">{{ $review->gig->title }}</p>
                                                        <p class="text-[11px] leading-3 text-gray-600 dark:text-gray-300 pt-2">@money($review->gig->price, settings('currency')->code, true)</p>
                                                    </div>
                                                </a>
                                            </td>
                    
                                            {{-- Message --}}
                                            <td class="ltr:pl-4 rtl:pr-4 dark:text-gray-200">
                                                @if ($review->message)
                                                    <span class="text-xs font-medium break-words block overflow-hidden max-w-[200px] truncate">{{ $review->message }}</span>
                                                @else
                                                    <span class="text-xs font-medium text-center">-</span>
                                                @endif
                                            </td>
                    
                                            {{-- Rating --}}
                                            <td class="text-center" wire:ignore>
                                                <span class="gig-card-rating-container mx-auto" data-rating-value="{{ $review->rating }}" wire:ingore></span>
                                            </td>
                    
                                            {{-- Date --}}
                                            <td class="text-center">
                                                <span class="text-[11px] font-normal text-gray-400 dark:text-gray-200">{{ format_date($review->created_at, 'ago') }}</span>
                                            </td>
                    
                                            {{-- Options --}}
                                            <td class="text-center">
                                                <div class="relative inline-block text-left">
                                                    <div>
                                                        <button data-dropdown-toggle="table-options-dropdown-{{ $review->id }}" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white dark:bg-zinc-700 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                                        </button>
                                                    </div>
                                                    <div id="table-options-dropdown-{{ $review->id }}" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 dark:divide-zinc-700 focus:outline-none" role="menu"  aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                                        <div class="py-1" role="none">

                                                            {{-- Preview review --}}
                                                            <a href="{{ url('account/reviews/preview/' . $review->uid) }}" class="text-gray-800 dark:text-gray-300 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                                                <span class="text-xs font-medium">{{ __('messages.t_preview_review') }}</span>
                                                            </a>

                                                            {{-- Edit review --}}
                                                            <a href="{{ url('account/reviews/edit/' . $review->uid) }}" class="text-gray-800 dark:text-gray-300 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                                <span class="text-xs font-medium">{{ __('messages.t_edit_review') }}</span>
                                                            </a>
                    
                                                            {{-- Delete --}}
                                                            <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_delete_this_review') }}') ? $wire.delete('{{ $review->id }}') : ''" wire:loading.attr="disabled" wire:target="delete('{{ $review->id }}')" type="button" class="text-gray-800 dark:text-gray-300 dark:hover:text-gray-400 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >
                    
                                                                {{-- Loading indicator --}}
                                                                <div wire:loading wire:target="delete('{{ $review->id }}')">
                                                                    <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                    </svg>
                                                                </div>
                    
                                                                {{-- Icon --}}
                                                                <div wire:loading.remove wire:target="delete('{{ $review->id }}')">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                                </div>
                    
                                                                <span class="text-xs font-medium">{{ __('messages.t_delete_review') }}</span>
                    
                                                            </button>
                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                    
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    
                        {{-- Pagination --}}
                        @if ($reviews->hasPages())
                            <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
                                {!! $reviews->links('pagination::tailwind') !!}
                            </div>
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>
</main>