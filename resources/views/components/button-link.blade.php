@props([
    'url' => '/',
    'icon' => null,
    'color' => 'bg-yellow-500',
    'hover' => 'hover:bg-yellow-600',
    'textClass' => 'text-black',
])

<a href="{{ $url }}"
    class="{{ $color }} {{ $hover }} {{ $textClass }} px-4 py-2 rounded hover:shadow-md transition duration-300 block md:inline">
    @if ($icon)
        <i class="fa fa-{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>
