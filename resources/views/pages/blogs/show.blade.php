@extends('components.layouts.app')

@section('content')

  <section class="py-20">
    <div class="container mx-auto px-8 md:px-14 lg:px-28 max-w-7xl">

      <a href="{{ route('blogs.index') }}" class="text-[var(--primary-green)] mb-6 inline-flex items-center gap-2">
        <i class="fa-solid fa-arrow-left"></i> Back to Blogs
      </a>

      <img src="{{ $blog->image_url }}" class="w-full h-[400px] object-cover rounded-2xl shadow-lg mb-10">

    <h1 class="text-4xl font-semibold text-[var(--neutral-dark)]">
      {{ $blog->title }}
    </h1>


      <div class="flex items-center gap-6 mt-4 text-gray-500 text-sm">
        <span><i class="fa-regular fa-user"></i> {{ $blog->author }}</span>
        <span><i class="fa-regular fa-calendar"></i> {{ $blog->published_at?->format('d M Y') }}</span>
      </div>

      <article class="prose prose-lg mt-10 max-w-none">
        {!! $blog->content !!}
      </article>
      {{-- Related posts --}}
      @if(!empty($related) && $related->count())
        <section class="mt-14">
          <h3 class="text-2xl font-semibold text-[var(--neutral-dark)] mb-6">You might also like</h3>

          <div class="grid md:grid-cols-3 gap-6">
            @foreach($related as $r)
              <a href="{{ route('blogs.show', $r->slug) }}"
                class="block bg-white rounded-lg shadow hover:shadow-md overflow-hidden transition">
                <div class="h-40 md:h-36 overflow-hidden">
                  <img src="{{ $r->image_url }}" alt="{{ $r->title }}" class="w-full h-full object-cover">
                </div>

                <div class="p-4">
                  <h4 class="text-lg font-semibold text-[var(--neutral-dark)] mb-2">
                    {{ $r->title }}
                  </h4>

                  @if($r->excerpt)
                    <p class="text-sm text-[var(--muted-foreground)] mb-3 line-clamp-2">
                      {{ Str::limit(strip_tags($r->excerpt), 100) }}
                    </p>
                  @endif

                  <div class="flex items-center justify-between text-xs text-gray-500">
                    <span class="flex items-center gap-2"><i class="fa-regular fa-user"></i> {{ $r->author }}</span>
                    <span class="flex items-center gap-2"><i class="fa-regular fa-calendar"></i>
                      {{ $r->published_at?->format('d M Y') }}</span>
                  </div>
                </div>
              </a>
            @endforeach
          </div>
        </section>
      @endif
    </div>
  </section>

@endsection