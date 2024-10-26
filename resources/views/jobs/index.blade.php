<x-layout>
    <div class="bg-blue-900 h-24 px-4 mb-4 flex justify-center items-center rounded">
        <x-search />
    </div>
    <x-slot name="title">View Jobs</x-slot>
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
