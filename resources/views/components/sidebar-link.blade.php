@props(['href'])

@php
$isActive = request()->is(ltrim($href, '/').'*');
@endphp

<a href="{{ $href }}"
    class="flex items-center gap-3 px-4 py-2 rounded-lg transition
          {{ $isActive ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-100' }}">
    {{ $slot }}
</a>