@extends('components.layouts.app')

@section('content')

<section class="py-20">
  <div class="container mx-auto px-8 md:px-14 lg:px-28 max-w-4xl">

    <a href="{{ route('blogs.index') }}" class="text-[var(--primary-green)] mb-6 inline-flex items-center gap-2">
      <i class="fa-solid fa-arrow-left"></i> Back to Blogs
    </a>

    <img src="{{ $blog['image'] }}" class="w-full h-[400px] object-cover rounded-2xl shadow-lg mb-10">

    <h1 class="text-4xl font-semibold text-[var(--neutral-dark)]">
      {{ $blog['title'] }}
    </h1>

    <div class="flex items-center gap-6 mt-4 text-gray-500 text-sm">
      <span><i class="fa-regular fa-user"></i> {{ $blog['author'] }}</span>
      <span><i class="fa-regular fa-calendar"></i> {{ $blog['date'] }}</span>
    </div>

    <article class="prose prose-lg mt-10 max-w-none">
      {!! $blog['content'] !!}
    </article>

  </div>
</section>

@endsection
