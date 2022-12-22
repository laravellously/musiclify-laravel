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
                            <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-primary-600"></div>
                            <div class="relative flex items-center group">
                                <span class="h-9 flex items-center" aria-hidden="true">
                                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-primary-600 rounded-full group-hover:bg-indigo-800">
                                        <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    </span>
                                </span>
                                <span class="ml-4 min-w-0 flex flex-col">
                                    <span class="text-xs font-semibold tracking-wide uppercase text-primary-600">Requirements</span>
                                </span>
                            </div>
                        </li>

                        {{-- Database --}}
                        <li class="relative pb-8">
                            <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-primary-600"></div>
                            <div class="relative flex items-center group">
                                <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-primary-600 rounded-full group-hover:bg-indigo-800">
                                    <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                </span>
                                <span class="ml-4 min-w-0 flex flex-col">
                                    <span class="text-xs font-semibold tracking-wide uppercase text-primary-600">Database</span>
                                </span>
                            </div>
                        </li>

                        {{-- Administrator --}}
                        <li class="relative pb-8">
                            <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-gray-300"></div>
                            <div class="relative flex items-center group">
                                <span class="h-9 flex items-center" aria-hidden="true">
                                    <span class="relative z-10 w-8 h-8 flex items-center justify-center bg-white border-2 border-primary-600 rounded-full">
                                        <span class="h-2.5 w-2.5 bg-primary-600 rounded-full"></span>
                                    </span>
                                </span>
                                <span class="ml-4 min-w-0 flex flex-col">
                                    <span class="text-xs font-semibold tracking-wide uppercase text-primary-600">Administrator</span>
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
                        Administrator    
                    </h2>
                    <p class="text-xs text-gray-500">
                        Setup your admin account
                    </p>
                </div>

                {{-- Section body --}}
                <div class="w-full mb-8 px-6 pb-8">
                    
                    {{-- Email --}}
                    <div class="w-full mb-6">
                        <x-forms.text-input
                            label="E-mail address"
                            placeholder="Enter email address"
                            model="email"
                            icon="at" />
                    </div>

                    {{-- Username --}}
                    <div class="w-full mb-6">
                        <x-forms.text-input
                            label="Username"
                            placeholder="Enter username"
                            model="username"
                            icon="account" />
                    </div>

                    {{-- Password --}}
                    <div class="w-full mb-6">
                        <x-forms.text-input
                            label="Password"
                            placeholder="Enter password"
                            model="password"
                            icon="lock" />
                    </div>

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
