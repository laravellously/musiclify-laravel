<div class="w-full md:max-w-xl mx-auto grid items-center justify-center">
	
	{{-- Check if not files generated before --}}
	@if ($is_generated)
		
		{{-- Message --}}
		<div class="text-sm font-medium text-gray-400 mb-8 text-center">
			Please use the following commands to set up a Cron Jobs in your server.<br>
			If you have any problem, please contact the author.
		</div>

		{{-- Commands --}}
		<div class="grid space-y-4 mb-8">
			
			{{-- Queue commands --}}
			<kbd class="px-2 py-1.5 text-sm font-semibold text-gray-800 bg-gray-200 border border-gray-300 rounded-md">
				{{ $queue_command }}
			</kbd>
	
			{{-- Schedule commands --}}
			<kbd class="px-2 py-1.5 text-sm font-semibold text-gray-800 bg-gray-200 border border-gray-300 rounded-md">
				{{ $schedule_command }}
			</kbd>

		</div>

		{{-- Regenrate shell files --}}
		<x-forms.button action="generate" :text="__('messages.t_regenerate_commands')" :block="true" />

	@else

		{{-- Generate shell files --}}
		<x-forms.button action="generate" :text="__('messages.t_generate_commands')" :block="true" />

	@endif

</div>
