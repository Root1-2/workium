<x-layout>
    <x-slot name="title">Create Job</x-slot>
    <h2>Create New Job</h2>
    <form action="/jobs" method="POST">
        @csrf
        <div class="my-5">
            <input type="text" name="title" placeholder="title" value={{ old('title') }}>
            @error('title')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="my-5">
            <input type="text" name="description" placeholder="description" value={{ old('description') }}>
            @error('description')
                <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <button class="bg-green-200 rounded-lg px-4 py-2" type="submit">Submit</button>
    </form>
</x-layout>
