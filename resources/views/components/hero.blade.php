@props(['title' => 'Find Your Dream Jobs'])

<section class="bg-[url('/public/images/hero.jpg')] relative bg-cover bg-center bg-no-repeat h-72 flex items-center">
    <div class="absolute inset-0 w-full h-full bg-black bg-opacity-70 z-10"></div>
    <div class="container mx-auto text-center z-10">
        <h2 class="text-5xl text-white font-bold mb-8">{{ $title }}</h2>
        <x-search />
    </div>
</section>
