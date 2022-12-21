<div x-data="{ open: false }" class="relative inline-block">

    {{-- Button --}}
    <button x-on:click="open = !open" type="button" class="hidden md:flex items-center text-gray-500 hover:text-primary-600 transition-colors duration-300 py-2 px-4 focus:outline-none focus:ring-0 dark:text-gray-100 dark:hover:text-white">
        <svg class="w-[18px] h-[18px]" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm7.931 9h-2.764a14.67 14.67 0 0 0-1.792-6.243A8.013 8.013 0 0 1 19.931 11zM12.53 4.027c1.035 1.364 2.427 3.78 2.627 6.973H9.03c.139-2.596.994-5.028 2.451-6.974.172-.01.344-.026.519-.026.179 0 .354.016.53.027zm-3.842.7C7.704 6.618 7.136 8.762 7.03 11H4.069a8.013 8.013 0 0 1 4.619-6.273zM4.069 13h2.974c.136 2.379.665 4.478 1.556 6.23A8.01 8.01 0 0 1 4.069 13zm7.381 6.973C10.049 18.275 9.222 15.896 9.041 13h6.113c-.208 2.773-1.117 5.196-2.603 6.972-.182.012-.364.028-.551.028-.186 0-.367-.016-.55-.027zm4.011-.772c.955-1.794 1.538-3.901 1.691-6.201h2.778a8.005 8.005 0 0 1-4.469 6.201z"></path></svg>
        <span class="ltr:ml-1 rtl:mr-1">{{ $default_language_name }}</span>
    </button>

    {{-- List of languages --}}
    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-150" 
        x-transition:enter-start="transform opacity-0 scale-75" 
        x-transition:enter-end="transform opacity-100 scale-100" 
        x-transition:leave="transition ease-in duration-100" 
        x-transition:leave-start="transform opacity-100 scale-100" 
        x-transition:leave-end="transform opacity-0 scale-75" 
        x-on:click.outside="open = false" role="menu" 
        class="absolute ltr:right-0 rtl:left-0 origin-top-right mt-2 w-48 shadow-xl rounded z-50" x-cloak>
        
        <div class="bg-white dark:bg-zinc-800 rounded p-2 space-y-1">

            {{-- List of languages --}}
            @foreach (supported_languages() as $lang)
                <div @if ($default_language_code !== $lang->language_code) wire:click="setLocale('{{ $lang->language_code }}')" @endif class="py-2 px-4 rounded-sm inline-flex items-center cursor-pointer justify-between {{ $default_language_code === $lang->language_code ? 'bg-primary-100/25 text-primary-600' : 'hover:bg-gray-50 dark:hover:bg-zinc-600' }} focus:outline-none w-full">
                    <div class="inline-flex items-center">
                        <img src="{{ countryFlag($lang->country_code) }}" alt="{{ $lang->name }}" class="w-5 ltr:mr-3 rtl:ml-3">
                        <span class="font-medium text-xs dark:text-gray-200">{{ $lang->name }}</span>
                    </div>
                    @if ($default_language_code === $lang->language_code)
                        <div class="block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                    @else
                        <div wire:loading wire:target="setLocale('{{ $lang->language_code }}')">
                            <svg role="status" class="block w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/> <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/> </svg>
                        </div>
                    @endif
                </div>
            @endforeach

        </div>
    </div>


</div>