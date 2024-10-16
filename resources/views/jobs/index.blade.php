<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <ul>
        @forelse ($jobs as $job)
            {{-- @if ($job == 'Database Admin')
                @break
                @continue
            @endif --}}
            @if ($loop->first)
                <li>
                    {{-- {{ $loop->count }} --}}
                    First:
                    {{ $job }}
                </li>
            @else
                <li>Other: {{ $job }}</li>
            @endif
        @empty
            <li>No Jobs Available</li>
        @endforelse
    </ul>
</body>

</html>
