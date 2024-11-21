@props(['id', 'maxWidth', 'title'])

@php
$id = $id ?? md5($attributes->wire('model'));
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth ?? '2xl'];
@endphp

<div
    x-data="{ show: @entangle($attributes->wire('model')) }"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    class="fixed inset-0 z-50 px-4 py-6 overflow-y-auto sm:px-0"
    style="display: none"
>
    <div class="fixed inset-0 transform transition-all" x-on:click="show = false">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto"
        x-show="show"
        x-trap.inert.noscroll="show"
    >
        <div class="px-3 py-3 bg-indigo-600 text-white">
           <div class="font-medium text-lg">{{ $title }}</div>
        </div>

        {{ $slot }}
    </div>
</div>