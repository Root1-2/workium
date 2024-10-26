<x-layout>
    <x-slot name="title">View Jobs</x-slot>

    <div class="bg-blue-900 h-24 px-4 mb-4 flex justify-center items-center rounded">
        <x-search />
    </div>
    {{-- Back Button --}}
    @if (request()->has('keywords') || request()->has('location'))
        <a class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded mb-4 inline-block"
            href="{{ route('jobs.index') }}">
            <i class="fa fa-arrow-left mr-2"></i>Back
        </a>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @forelse ($jobs as $job)
            <x-job-card :job="$job" />
        @empty
            <p>No Jobs Available</p>
        @endforelse
    </div>

    {{-- Pagination Link --}}
    {{ $jobs->links() }}
</x-layout>
