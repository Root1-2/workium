@props(['type', 'message'])

@if (session()->has($type))
    <div
        class="p-4 mb-4 text-sm text-white rounded  
    @if ($type == 'success') bg-green-500 
    @elseif ($type == 'error') bg-red-500 
    @elseif ($type == 'status') bg-blue-500 @endif">
        {{ $message }}
    </div>
@endif
