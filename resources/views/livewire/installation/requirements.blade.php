<div class="w-full px-20 pt-12">
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        {{-- Steps --}}
        <div class="col-span-12 lg:col-span-4">
            <div class="bg-white shadow rounded-lg border border-gray-50 px-6 py-8">
                <nav aria-label="Progress">
                    <ol role="list" class="overflow-hidden">

                        {{-- Get started --}}
                        <li class="relative pb-8">
                            <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-primary-600" aria-hidden="true"></div>
                            <div class="relative flex items-center group" aria-current="step">
                                <span class="h-9 flex items-center" aria-hidden="true">
                                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-primary-600 rounded-full group-hover:bg-indigo-800">
                                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    </span>
                                </span>
                                <span class="ml-4 min-w-0 flex flex-col">
                                    <span class="text-xs font-semibold tracking-wide uppercase text-primary-600">
                                        Get started
                                    </span>
                                </span>
                            </div>
                        </li>

                        {{-- Requirements --}}
                        <li class="relative pb-8">
                            <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-gray-300"></div>
                            <div class="relative flex items-center group">
                                <span class="h-9 flex items-center" aria-hidden="true">
                                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-primary-600 rounded-full">
                                        <span class="h-2.5 w-2.5 bg-primary-600 rounded-full"></span>
                                    </span>
                                </span>
                                <span class="ml-4 min-w-0 flex flex-col">
                                    <span class="text-xs font-semibold tracking-wide uppercase text-primary-600">Requirements</span>
                                </span>
                            </div>
                        </li>

                        {{-- Database --}}
                        <li class="relative pb-8">
                            <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-gray-300"></div>
                            <div class="relative flex items-center group">
                                <span class="h-9 flex items-center" aria-hidden="true">
                                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                                        <span class="h-2.5 w-2.5 bg-transparent rounded-full group-hover:bg-gray-300"></span>
                                    </span>
                                </span>
                                <span class="ml-4 min-w-0 flex flex-col">
                                    <span class="text-xs font-semibold tracking-wide uppercase text-gray-500">Database</span>
                                </span>
                            </div>
                        </li>

                        {{-- Administrator --}}
                        <li class="relative pb-8">
                            <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-gray-300"></div>
                            <div class="relative flex items-center group">
                                <span class="h-9 flex items-center" aria-hidden="true">
                                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                                        <span class="h-2.5 w-2.5 bg-transparent rounded-full group-hover:bg-gray-300"></span>
                                    </span>
                                </span>
                                <span class="ml-4 min-w-0 flex flex-col">
                                    <span class="text-xs font-semibold tracking-wide uppercase text-gray-500">Administrator</span>
                                </span>
                            </div>
                        </li>

                        {{-- Cron jobs --}}
                        <li class="relative pb-8">
                            <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-gray-300"></div>
                            <div class="relative flex items-center group">
                                <span class="h-9 flex items-center" aria-hidden="true">
                                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                                        <span class="h-2.5 w-2.5 bg-transparent rounded-full group-hover:bg-gray-300"></span>
                                    </span>
                                </span>
                                <span class="ml-4 min-w-0 flex flex-col">
                                    <span class="text-xs font-semibold tracking-wide uppercase text-gray-500">Cron jobs</span>
                                </span>
                            </div>
                        </li>

                        {{-- Finish --}}
                        <li class="relative">
                            <div class="relative flex items-center group">
                                <span class="h-9 flex items-center" aria-hidden="true">
                                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                                        <span class="h-2.5 w-2.5 bg-transparent rounded-full group-hover:bg-gray-300"></span>
                                    </span>
                                </span>
                                <span class="ml-4 min-w-0 flex flex-col">
                                    <span class="text-xs font-semibold tracking-wide uppercase text-gray-500">Finish</span>
                                </span>
                            </div>
                        </li>
                        
                    </ol>
                </nav>

            </div>
        </div>

        {{-- Content --}}
        <div class="col-span-12 lg:col-span-8">
            <div class="bg-white shadow rounded-lg mb-6">

                {{-- Section title --}}
                <div class="bg-gray-50 mb-14 px-6 py-6 rounded-t-lg border-b-2 border-gray-100">
                    <h2 class="text-xs tracking-widest uppercase leading-6 font-bold text-gray-600">
                        Requirements    
                    </h2>
                    <p class="text-xs text-gray-500">
                        Make sure that you have all requirements before you continue
                    </p>
                </div>

                {{-- Section body --}}
                <div class="w-full mb-8 px-6 pb-8">

                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                        <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">
                                If you don't have all requirements, you can change these values on your server if you have access to php.ini or contact your server provider to do that for you before you continue installation.
                            </p>
                        </div>
                        </div>
                    </div>

  
                    <ul role="list" class="-mb-8">

                        {{-- PHP --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($is_php_version)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">PHP >= 8.1.0</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Extension Bcmath --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($extension_bcmath)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">BCMath PHP Extension</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Extension Ctype --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($extension_ctype)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Ctype PHP Extension</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Extension cURL --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($extension_curl)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">cURL PHP Extension</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Extension DOM --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($extension_dom)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">DOM PHP Extension</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Extension Fileinfo --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($extension_fileinfo)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Fileinfo PHP Extension</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Extension JSON --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($extension_json)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">JSON PHP Extension</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Extension Mbstring --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($extension_mbstring)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Mbstring PHP Extension</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Extension OpenSSL --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($extension_openssl)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">OpenSSL PHP Extension</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Extension PCRE --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($extension_pcre)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">PCRE PHP Extension</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Extension PDO --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($extension_pdo)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">PDO PHP Extension</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Extension Tokenizer --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($extension_tokenizer)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Tokenizer PHP Extension</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- Extension XML --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        @if ($extension_xml)
                                            <span class="h-8 w-8 rounded-full bg-green-400 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px] text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @else
                                            <span class="h-8 w-8 rounded-full bg-red-500 flex items-center justify-center ring-8 ring-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white mt-px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">XML PHP Extension</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- upload_max_filesize --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">upload_max_filesize <span class="font-medium text-gray-900">{{ $upload_max_filesize }}</span></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="2020-09-22">As large as the maximum file you will be uploading</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- post_max_size --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">post_max_size <span class="font-medium text-gray-900">{{ $post_max_size }}</span></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="2020-09-22">As large as the maximum file you will be uploading</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- memory_limit --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">memory_limit <span class="font-medium text-gray-900">{{ $memory_limit }}</span></p>
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="2020-09-22">As large as the maximum file you will be uploading</time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- max_execution_time --}}
                        <li>
                            <div class="relative pb-8">
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">max_execution_time <span class="font-medium text-gray-900">{{ $max_execution_time }}</span> (in seconds)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- max_input_time --}}
                        <li>
                            <div class="relative pb-10">
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">max_input_time <span class="font-medium text-gray-900">{{ $max_input_time }}</span> (in seconds)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                    </ul>
                </div>

            </div>

            {{-- Actions --}}
            <div class="flex justify-end items-center">
                <div></div>
                <div>
                    <x-forms.button action="next" text="Continue" />
                </div>
            </div>
        </div>

    </div>
</div>
