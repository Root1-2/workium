<x-layout>
    <x-slot name="title">View Job</x-slot>
    <h1 class="text-2xl">{{ $job->title }}</h1>
    <p>{{ $job->description }}</p>
</x-layout>
