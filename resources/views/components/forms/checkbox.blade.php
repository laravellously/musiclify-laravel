@props(['label', 'model', 'hidelabel' => false])

@if (!$hidelabel)
    <label for="" class="opacity-0">{{ $label }}</label>
@endif
<div class="relative flex items-center border-2 rounded p-3 h-11 {{ $errors->first($model) ? 'border-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 dark:border-zinc-700 focus:ring-primary-600 focus:border-primary-600' }}">
    {{-- Checkbox --}}
    <div class="flex items-center h-5">
        <input id="checkbox-input-component-id-{{ $model }}" type="checkbox" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 rounded" wire:model.defer="{{ $model }}">
    </div>

    {{-- Label --}}
    <div class="ltr:ml-3 rtl:mr-3 text-xs">
        <label for="checkbox-input-component-id-{{ $model }}" class="font-medium text-xs cursor-pointer {{ $errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-gray-500 dark:text-gray-200' }}">{{ $label }}</label>
    </div>

    {{-- Error --}}
    @error($model)
        <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first($model) }}</p>
    @enderror

</div>