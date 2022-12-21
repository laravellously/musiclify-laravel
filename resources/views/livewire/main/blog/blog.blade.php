<div class="relative pt-12 pb-20 px-4 sm:px-6 lg:pb-28 lg:px-8">
	<div class="relative max-w-6xl mx-auto">
		<div class="text-center">
			<h2 class="text-3xl tracking-tight font-extrabold text-gray-900 dark:text-gray-100 sm:text-4xl">
                {{ __('messages.t_blog') }}    
            </h2>
			<p class="mt-3 max-w-2xl mx-auto text-base text-gray-500 dark:text-gray-300 sm:mt-4">
                {{ __('messages.t_latest_appname_news', ['app_name' => config('app.name')]) }}
            </p>
		</div>
		<div class="mt-12 max-w-lg mx-auto grid gap-8 lg:grid-cols-4 lg:max-w-none">

            @forelse ($articles as $article)
                <div class="flex flex-col rounded-lg shadow-sm overflow-hidden">
                    <a href="{{ url('blog', $article->slug) }}" class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" src="{{ src($article->image) }}" alt="{{ $article->title }}">
                    </a>
                    <div class="flex-1 bg-white dark:bg-zinc-800 p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-xs font-medium text-gray-400">
                                {{ __('messages.t_x_min_read', ['x' => $article->reading_time]) }}
                            </p>
                            <a href="{{ url('blog', $article->slug) }}" class="block mt-2 truncate overflow-hidden" style="text-overflow: ellipsis;">
                                <p class="text-base font-semibold text-gray-900 dark:text-gray-200 hover:text-primary-600 truncate">{{ $article->title }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                
                {{-- No data right now --}}
                <div class="rounded-md bg-blue-50 p-4 col-span-12">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/> </svg>
                        </div>
                        <div class="ltr:ml-3 rtl:mr-3 flex-1 md:flex md:justify-between">
                            <p class="text-sm text-blue-700">
                                {{ __('messages.t_no_data_to_show_now') }}
                            </p>
                        </div>
                    </div>
                </div>

            @endforelse
            
		</div>

        {{-- Pagination --}}
        @if ($articles->hasPages())
            <div class="w-full flex justify-center items-center mt-24">
                {!! $articles->links('pagination::tailwind') !!}
            </div>
        @endif

	</div>
</div>