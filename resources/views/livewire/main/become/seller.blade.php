<div class="w-full">

	{{-- Become seller header --}}
	<div class="mb-24 container xl:max-w-7xl mx-auto px-4 lg:px-8 mt-8">
		<div class="relative bg-zinc-900 rounded-lg">
			<div class="h-80 w-full absolute bottom-0 xl:inset-0 xl:h-full">
				<div class="h-full w-full xl:grid xl:grid-cols-2">
					<div class="h-full xl:relative xl:col-start-2">
						<img class="h-full w-full object-cover opacity-25 xl:absolute xl:inset-0 ltr:rounded-r-lg rtl:rounded-r-lg" src="{{ url('public/img/start_selling/1.jpg') }}" alt="{{ __('messages.t_u_bring_the_skill_make_earn_easy') }}">
						<div aria-hidden="true" class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-zinc-900 xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r"></div>
					</div>
				</div>
			</div>
			<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 xl:grid xl:grid-cols-2 xl:grid-flow-col-dense xl:gap-x-8">
				  <div class="relative pt-12 pb-64 sm:pt-24 sm:pb-64 xl:col-start-1 xl:pb-24">
	
					<h2 class="text-sm font-semibold text-primary-300 tracking-wide uppercase">
						@lang('messages.t_work_ur_way')
					</h2>
					<p class="mt-3 text-3xl font-extrabold text-white">
						@lang('messages.t_u_bring_the_skill_make_earn_easy')
					</p>
					
					<div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2">
	
						{{-- 4 sec --}}
						<p>
							<span class="block text-xl font-bold text-white uppercase">{{ __('messages.t_4_sec') }}</span>
							<span class="mt-1 block text-base text-gray-300">{{ __('messages.t_a_gig_is_bought_every') }}</span>
						</p>
				
						{{-- Transactions --}}
						<p>
							<span class="block text-xl font-bold text-white uppercase">{{ __('messages.t_50_m_plus') }}</span>
							<span class="mt-1 block text-base text-gray-300">{{ __('messages.t_transactions') }}</span>
						</p>
				
						{{-- Price range --}}
						<p>
							<span class="block text-xl font-bold text-white uppercase">
								@money(5, settings('currency')->code, true) - @money(10000, settings('currency')->code, true)
							</span>
							<span class="mt-1 block text-base text-gray-300">{{ __('messages.t_price_range') }}</span>
						</p>
				
						{{-- Monthly visitors --}}
						<p>
							<span class="block text-xl font-bold text-white uppercase">{{ __('messages.t_5_million') }}</span>
							<span class="mt-1 block text-base text-gray-300">{{ __('messages.t_active_monthly_visits') }}</span>
						</p>
	
					</div>
	
				  </div>
			</div>
		</div>
	</div>

	{{-- Join community --}}
	<div class="mb-24 container xl:max-w-7xl mx-auto px-4 lg:px-8">
		
		{{-- Section heading --}}
		<div class="text-center mb-12">
			<h2 class="text-xl md:text-2xl font-extrabold mb-4 dark:text-gray-100">
				{{ __('messages.t_join_our_growing_freelance_community') }}
			</h2>
		</div>
	
		{{-- Generate sellers --}}
		@php
			$sellers = [
				[
					'avatar' => '2.jpg',
					'name'   => __('messages.t_fake_name_irman_norton'),
					'skill'  => __('messages.t_i_am_a_designer')
				],
				[
					'avatar' => '3.jpg',
					'name'   => __('messages.t_fake_name_alejandro_lee'),
					'skill'  => __('messages.t_i_am_a_developer')
				],
				[
					'avatar' => '4.jpg',
					'name'   => __('messages.t_fake_name_elsa_king'),
					'skill'  => __('messages.t_i_am_a_writer')
				],
				[
					'avatar' => '5.jpg',
					'name'   => __('messages.t_fake_name_herman_reese'),
					'skill'  => __('messages.t_i_am_a_video_editor')
				],
				[
					'avatar' => '5.jpg',
					'name'   => __('messages.t_fake_name_sue_keller'),
					'skill'  => __('messages.t_i_am_a_musician')
				],
			];
		@endphp

		{{-- List of sellers --}}
		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-8 md:gap-8">

			@foreach ($sellers as $seller)
				<div>
					<div class="group relative p-4 mb-5">
						<div class="absolute inset-0 rounded-lg bg-primary-100 transform transition ease-out duration-150 skew-y-2 group-hover:-rotate-2"></div>
						<img src="{{ url('public/img/start_selling/' . $seller['avatar']) }}" alt="{{ $seller['name'] }}" class="relative rounded-lg shadow">
					</div>
					<h4 class="text-base font-semibold mb-1 dark:text-gray-50">
						{{ $seller['name'] }}
					</h4>
					<p class="text-gray-600 font-medium mb-3 text-[13px] dark:text-gray-300">
						{{ $seller['skill'] }}
					</p>
				</div>
			@endforeach
			
		</div>

	</div>

	{{-- How does it work --}}
	<div class="mb-24 container xl:max-w-7xl mx-auto px-4 lg:px-8">
		<div class="bg-primary-600 shadow rounded-2xl py-16 sm:p-16">
			<div class="max-w-xl mx-auto lg:max-w-none">
				<div class="text-center">
					<h2 class="text-2xl font-extrabold tracking-tight text-gray-100">
						@lang('messages.t_how_it_works')
					</h2>
				</div>
				  <div class="mt-12 max-w-sm mx-auto grid grid-cols-1 gap-y-10 gap-x-8 sm:max-w-none lg:grid-cols-3">
	
					{{-- Create a gig --}}
					<div class="text-center sm:flex sm:text-left lg:block lg:text-center">
						<div class="sm:flex-shrink-0">
							<div class="flow-root">
								<svg class="w-16 h-16 mx-auto text-primary-200" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 011.06 0l4.5 4.5a.75.75 0 01-1.06 1.06l-3.22-3.22V16.5a.75.75 0 01-1.5 0V4.81L8.03 8.03a.75.75 0 01-1.06-1.06l4.5-4.5zM3 15.75a.75.75 0 01.75.75v2.25a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V16.5a.75.75 0 011.5 0v2.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V16.5a.75.75 0 01.75-.75z" clip-rule="evenodd"></path></svg>
							</div>
						</div>
						<div class="mt-3 sm:mt-0 sm:ml-6 lg:mt-6 lg:ml-0">
							<h3 class="text-base font-extrabold text-white">{{ __('messages.t_create_a_gig') }}</h3>
							<p class="mt-2 text-sm text-primary-100">{{ __('messages.t_start_selling_t_create_a_gig_subtitle') }}</p>
						</div>
					</div>
	
					{{-- Deliver great work --}}
					<div class="text-center sm:flex sm:text-left lg:block lg:text-center">
						<div class="sm:flex-shrink-0">
							<div class="flow-root">
								<svg class="w-16 h-16 mx-auto text-primary-200" stroke="currentColor" fill="none" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"></path></svg>
							</div>
						</div>
						<div class="mt-3 sm:mt-0 sm:ml-6 lg:mt-6 lg:ml-0">
							<h3 class="text-base font-extrabold text-white">{{ __('messages.t_deliver_great_work') }}</h3>
							<p class="mt-2 text-sm text-primary-100">{{ __('messages.t_deliver_great_work_subtitle') }}</p>
						</div>
					</div>
	
					{{-- Get paid --}}
					<div class="text-center sm:flex sm:text-left lg:block lg:text-center">
						<div class="sm:flex-shrink-0">
							<div class="flow-root">
								<svg class="w-16 h-16 mx-auto text-primary-200" stroke="currentColor" fill="none" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"></path></svg>
							</div>
						</div>
						<div class="mt-3 sm:mt-0 sm:ml-6 lg:mt-6 lg:ml-0">
							<h3 class="text-base font-extrabold text-white">{{ __('messages.t_get_paid') }}</h3>
							<p class="mt-2 text-sm text-primary-100">{{ __('messages.t_get_paid_subtitle') }}</p>
						</div>
					</div>
					
				  </div>
			</div>
		</div>
	</div>

	{{-- Sellers stories --}}
	<div class="mb-24 container xl:max-w-7xl mx-auto px-4 lg:px-8">

		{{-- Section heading --}}
		<div class="text-center mb-12">
			<h2 class="text-xl md:text-2xl font-extrabold mb-4 dark:text-gray-100">
				@lang('messages.t_buyer_stories')
			</h2>
		</div>
	
		{{-- Feedback --}}
		<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

			{{-- Story 1 --}}
			<div class="border rounded-md bg-white dark:bg-zinc-800 dark:border-zinc-700 shadow-sm relative">
					<div class="absolute top-0 right-0 text-8xl mt-1 mr-2 text-indigo-200 dark:text-zinc-500 opacity-75 font-serif">“</div>
					<div class="px-4 pt-14 pb-6 sm:px-6 sm:pb-6 relative">
						<blockquote>
							<p class="leading-7 mb-5 dark:text-gray-400 font-medium">
								@lang('messages.t_buyer_story_1')
							</p>
							<footer class="flex items-center space-x-4">
								<div class="flex-none rounded-full overflow-hidden w-16 h-16 transform transition ease-out duration-150 border-2 border-gray-50 hover:border-white dark:border-zinc-700 dark:hover:bg-zinc-700 hover:shadow-md hover:scale-125 active:border-gray-50 active:shadow-sm active:scale-110">
									<img src="{{ url('public/img/start_selling/6.jpg') }}" alt="{{ __('messages.t_fake_name_alex_saunders') }}">
								</div>
								<div>
									<div class="font-semibold text-primary-600 hover:text-primary-400">
										{{ __('messages.t_fake_name_alex_saunders') }}
									</div>
									<p class="text-gray-500 font-medium text-sm">
										{{ __('messages.t_entrepreneur') }}
									</p>
								</div>
							</footer>
						</blockquote>
					</div>
			</div>

			{{-- Story 2 --}}
			<div class="border rounded-md bg-white dark:bg-zinc-800 dark:border-zinc-700 shadow-sm relative">
				<div class="absolute top-0 right-0 text-8xl mt-1 mr-2 text-indigo-200 dark:text-zinc-500 opacity-75 font-serif">“</div>
				<div class="px-4 pt-14 pb-6 sm:px-6 sm:pb-6 relative">
					<blockquote>
						<p class="leading-7 mb-5 dark:text-gray-400 font-medium">
							@lang('messages.t_buyer_story_2')
						</p>
						<footer class="flex items-center space-x-4">
							<div class="flex-none rounded-full overflow-hidden w-16 h-16 transform transition ease-out duration-150 border-2 border-gray-50 hover:border-white dark:border-zinc-700 dark:hover:bg-zinc-700 hover:shadow-md hover:scale-125 active:border-gray-50 active:shadow-sm active:scale-110">
								<img src="{{ url('public/img/start_selling/7.jpg') }}" alt="{{ __('messages.t_fake_name_ricky_jones') }}">
							</div>
							<div>
								<div class="font-semibold text-primary-600 hover:text-primary-400">
									{{ __('messages.t_fake_name_ricky_jones') }}
								</div>
								<p class="text-gray-500 font-medium text-sm">
									{{ __('messages.t_graphic_designer') }}
								</p>
							</div>
						</footer>
					</blockquote>
				</div>
			</div>

			{{-- Story 3 --}}
			<div class="border rounded-md bg-white dark:bg-zinc-800 dark:border-zinc-700 shadow-sm relative">
				<div class="absolute top-0 right-0 text-8xl mt-1 mr-2 text-indigo-200 dark:text-zinc-500 opacity-75 font-serif">“</div>
				<div class="px-4 pt-14 pb-6 sm:px-6 sm:pb-6 relative">
					<blockquote>
						<p class="leading-7 mb-5 dark:text-gray-400 font-medium">
							@lang('messages.t_buyer_story_3')
						</p>
						<footer class="flex items-center space-x-4">
							<div class="flex-none rounded-full overflow-hidden w-16 h-16 transform transition ease-out duration-150 border-2 border-gray-50 hover:border-white dark:border-zinc-700 dark:hover:bg-zinc-700 hover:shadow-md hover:scale-125 active:border-gray-50 active:shadow-sm active:scale-110">
								<img src="{{ url('public/img/start_selling/8.jpg') }}" alt="{{ __('messages.t_fake_name_melissa_ross') }}">
							</div>
							<div>
								<div class="font-semibold text-primary-600 hover:text-primary-400">
									{{ __('messages.t_fake_name_melissa_ross') }}
								</div>
								<p class="text-gray-500 font-medium text-sm">
									{{ __('messages.t_music_producer') }}
								</p>
							</div>
						</footer>
					</blockquote>
				</div>
			</div>
			
		</div>

	</div>

	{{-- FAQ --}}
	<div class="mb-24 container xl:max-w-7xl mx-auto px-4 lg:px-8">
		<div class="bg-white dark:bg-zinc-700 px-12 py-16 rounded-2xl shadow">

			{{-- Section heading --}}
			<div class="text-center mb-12">
				<h2 class="text-xl md:text-2xl font-extrabold mb-4 dark:text-gray-100">
					@lang('messages.t_faq_full')
				</h2>
			</div>
		
			<!-- FAQ -->
			<div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
	
				{{-- Question 1 --}}
				<div class="prose prose-indigo">
					<h4 class="dark:text-gray-300">
						@lang('messages.t_what_can_i_sell_question')
					</h4>
					<p class="dark:text-gray-100">
						@lang('messages.t_what_can_i_sell_answer')
					</p>
				</div>
	
				{{-- Question 2 --}}
				<div class="prose prose-indigo">
					<h4 class="dark:text-gray-300">
						@lang('messages.t_how_much_money_can_i_make_question')
					</h4>
					<p class="dark:text-gray-100">
						@lang('messages.t_how_much_money_can_i_make_answer')
					</p>
				</div>
	
				{{-- Question 3 --}}
				<div class="prose prose-indigo">
					<h4 class="dark:text-gray-300">
						@lang('messages.t_how_much_does_it_cost_question')
					</h4>
					<p class="dark:text-gray-100">
						@lang('messages.t_how_much_does_it_cost_answer')
					</p>
				</div>
	
				{{-- Question 4 --}}
				<div class="prose prose-indigo">
					<h4 class="dark:text-gray-300">
						@lang('messages.t_how_much_time_will_i_need_invest_question')
					</h4>
					<p class="dark:text-gray-100">
						@lang('messages.t_how_much_time_will_i_need_invest_answer')
					</p>
				</div>
	
				{{-- Question 5 --}}
				<div class="prose prose-indigo">
					<h4 class="dark:text-gray-300">
						@lang('messages.t_how_do_i_price_my_service_question')
					</h4>
					<p class="dark:text-gray-100">
						@lang('messages.t_how_do_i_price_my_service_answer')
					</p>
				</div>
	
				{{-- Question 6 --}}
				<div class="prose prose-indigo">
					<h4 class="dark:text-gray-300">
						@lang('messages.t_how_do_i_get_paid_question')
					</h4>
					<p class="dark:text-gray-100">
						@lang('messages.t_how_do_i_get_paid_answer')
					</p>
				</div>
				
			</div>

		</div>
	</div>

	{{-- Get started today --}}
	<div class="mb-24 container xl:max-w-7xl mx-auto px-4 lg:px-8">
		
		{{-- Section heading --}}
		<div class="text-center mb-12">
			<div class="relative inline-flex w-20 h-20 items-center justify-center text-emerald-500 mb-10 mx-auto">
				<div class="absolute inset-0 bg-emerald-200 rounded-xl transform rotate-6 scale-105"></div>
				<div class="absolute inset-0 bg-emerald-100 rounded-xl transform -rotate-6 scale-105"></div>
				<div class="relative">
					<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="hi-solid hi-fire inline-block w-10 h-10"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path></svg>
				</div>
			</div>
			<h2 class="text-3xl md:text-4xl font-extrabold mb-4 dark:text-gray-200">
				@lang('messages.t_signup_and_create_ur_first_gig') <span class="text-primary-600">@lang('messages.t_today')</span>!
			</h2>
			<h3 class="text-lg md:text-xl md:leading-relaxed font-medium text-gray-600 dark:text-gray-400 lg:w-2/3 mx-auto">
				@lang('messages.t_become_a_seller_subtitle')
			</h3>
		</div>
	
		{{-- Check if user authenticated --}}
		@auth
			<div class="flex items-center justify-center">
				<x-forms.button action="start" :text="__('messages.t_lets_get_started')" :block="false" />
			</div>
		@endauth

		{{-- Join us --}}
		@guest
			<div class="text-center">
				<a href="{{ url('auth/register') }}" class="inline-flex justify-center items-center space-x-2 rtl:space-x-reverse border font-semibold focus:outline-none px-6 py-4 leading-6 rounded border-primary-700 bg-primary-700 text-white hover:text-white hover:bg-primary-800 hover:border-primary-800 focus:ring focus:ring-primary-500 focus:ring-opacity-50 active:bg-primary-700 active:border-primary-700">

					{{-- LTR --}}
					<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="opacity-50 hi-solid hi-arrow-right hidden ltr:inline-block w-5 h-5"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>

					{{-- RTL --}}
					<svg xmlns="http://www.w3.org/2000/svg" class="opacity-50 hi-solid hi-arrow-right hidden rtl:inline-block w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
					</svg>

					<span>@lang('messages.t_lets_get_started')</span>
				</a>
			</div>
		@endguest
		
	</div>

</div>