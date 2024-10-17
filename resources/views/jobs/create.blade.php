<x-layout>
    <x-slot name="title">Create Job</x-slot>
    <h2>Create New Job</h2>
    <form action="/jobs" method="POST">
        @csrf
        <input type="text" name="title" placeholder="title">
        <input type="text" name="description" placeholder="description">
        <button type="submit">Submit</button>
    </form>
</x-layout>
