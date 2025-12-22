@extends('components.layouts.app')

@section('content')
  @php
    use Illuminate\Support\Str;

    // pick a featured article (first blog)
    $featured = $blogs->first() ?? null;

    // build excerpt ONLY if featured exists
    $featuredExcerpt = '';

    if ($featured) {
      $featuredExcerpt = trim($featured->excerpt ?? '');

      if (empty($featuredExcerpt)) {
        $plain = strip_tags($featured->content ?? '');
        $featuredExcerpt = Str::words($plain, 45, '...');
      } else {
        if (Str::length($featuredExcerpt) < 80) {
          $plain = strip_tags($featured->content ?? '');
          $featuredExcerpt = Str::words($featuredExcerpt . ' ' . $plain, 45, '...');
        }
      }
    }

    $tags = ['Ayurveda', 'Panchakarma', 'Herbs', 'Detox', 'Lifestyle', 'Wellness'];
  @endphp



  <!-- HERO SECTION (inline SVG pattern behind content) -->
  <section class="relative py-32 mt-12 md:mt-26 bg-white overflow-hidden">

    <!-- Background Pattern (from public folder) -->
    <div class="absolute inset-0 opacity-40" style="background-image: url('{{ asset('images/bg-1.jpg') }}');
                            background-size:cover;
                            background-repeat: no-repeat;">
    </div>

    <div class="container relative z-10 mx-auto px-8 md:px-14 lg:px-28 text-center">
      <h1 class="text-5xl font-bold text-[var(--neutral-dark)] leading-tight">
        Discover Our Blogs
      </h1>

      <p class="text-lg text-[var(--muted-foreground)] mt-4 max-w-2xl mx-auto">
        Explore Ayurvedic wisdom, natural healing tips, treatment insights, and wellness knowledge from our expert
        healers.
      </p>
    </div>
  </section>

  <!-- FEATURED ARTICLE (moved right after hero) -->
  @if($featured)
    <section class="py-12 bg-[var(--neutral-light)]">
      <div class="container mx-auto px-8 md:px-14 lg:px-28">
        <div class="rounded-2xl overflow-hidden border border-[var(--border)] bg-white shadow-lg lg:flex lg:items-stretch">

          <div class="lg:w-1/2 relative">
            <img src="{{ $featured->image_url ?? asset('images/default-blog.jpg') }}" alt="{{ $featured->title }}"
              class="w-full h-80 lg:h-full object-cover">
            <span class="absolute top-4 left-4 bg-[var(--primary-green)] text-white text-xs px-3 py-1 rounded-full">
              Featured
            </span>
          </div>

          <div class="p-8 lg:w-1/2 flex flex-col justify-between">
            <div>
              <h2 class="text-3xl font-bold text-[var(--neutral-dark)] mb-3">
                {{ $featured->title }}
              </h2>

              <div class="flex items-center gap-4 text-sm text-[var(--muted-foreground)] mb-4">
                <span><i class="fa-regular fa-user"></i> {{ $featured->author }}</span>
                <span><i class="fa-regular fa-calendar"></i>
                  {{ optional($featured->published_at)->format('d M Y') }}
                </span>
              </div>

              {{-- ✅ THIS WILL NOW SHOW --}}
              <p class="text-[var(--muted-foreground)] leading-relaxed mb-6 min-h-[6rem]">
                {{ $featuredExcerpt }}
              </p>

              <a href="{{ route('blogs.show', $featured->slug) }}"
                class="inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-[var(--primary-green)] text-white shadow">
                Read Full Article <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>

            <div class="mt-6 flex flex-wrap gap-2">
              <span class="tag">Ayurveda</span>
              <span class="tag">Wellness</span>
            </div>
          </div>

        </div>
      </div>
    </section>
  @endif


  <!-- SEARCH + FILTERS -->
  <section class="py-8 bg-white border-b border-[var(--border)]">
    <div class="container mx-auto px-8 md:px-14 lg:px-28">
      <div class="flex flex-col md:flex-row items-center justify-between gap-4">

        <!-- Search -->
        <div class="w-full md:w-2/3">
          <input type="text"
            class="w-full border border-[var(--border)] bg-white rounded-xl px-5 py-3 focus:ring-2 focus:ring-[var(--primary-green)] outline-none"
            placeholder="Search blog topics, Ayurveda, wellness tips...">
        </div>

        <!-- Filters -->
        <div class="flex gap-3">
          @foreach(['All', 'Ayurveda', 'Treatments', 'Wellness'] as $cat)
            <button
              class="px-4 py-2 bg-white border border-[var(--border)] rounded-xl text-sm hover:bg-[var(--primary-green)] hover:text-white transition duration-200">
              {{ $cat }}
            </button>
          @endforeach
        </div>

      </div>
    </div>
  </section>

  <!-- BLOG CARDS -->
  <section class="py-16 bg-[var(--neutral-light)]">
    <div class="container mx-auto px-8 md:px-14 lg:px-28">

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
        @foreach($blogs as $blog)
          <a href="{{ route('blogs.show', $blog->slug) }}" class="...">
            <div class="relative overflow-hidden">
              <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" loading="lazy" class="w-full h-56 object-cover">
              <span
                class="absolute top-4 left-4 bg-[var(--primary-green)] text-white text-xs px-3 py-1 rounded-full">Ayurveda</span>
            </div>

            <div class="p-6">
              <h3 class="text-xl font-semibold ...">{{ $blog->title }}</h3>
              <p class="text-[var(--muted-foreground)] text-sm mt-3 leading-relaxed">{{ $blog->excerpt }}</p>

              <div class="flex justify-between items-center mt-4 text-sm text-gray-500">
                <span class="flex items-center gap-2"><i class="fa-regular fa-user"></i> {{ $blog->author }}</span>
                <span class="flex items-center gap-2"><i class="fa-regular fa-calendar"></i>
                  {{ $blog->published_at?->format('d M Y') }}</span>
              </div>
            </div>
          </a>
        @endforeach

      </div>

      <!-- Pagination placeholder -->
      <div class="flex justify-center mt-12">
        <nav class="flex gap-3">
          <button
            class="px-4 py-2 bg-white border border-[var(--border)] rounded-xl hover:bg-[var(--primary-green)] hover:text-white transition">Prev</button>
          <button class="px-4 py-2 bg-[var(--primary-green)] text-white rounded-xl">1</button>
          <button
            class="px-4 py-2 bg-white border border-[var(--border)] rounded-xl hover:bg-[var(--primary-green)] hover:text-white transition">2</button>
          <button
            class="px-4 py-2 bg-white border border-[var(--border)] rounded-xl hover:bg-[var(--primary-green)] hover:text-white transition">Next</button>
        </nav>
      </div>

    </div>
  </section>

  <!-- TAGS, NEWSLETTER & CTA (compact, aligned with container) -->
  <section class="py-16 bg-white">
    <section class="py-20 bg-[var(--primary-green)] text-white text-center">
    <div class="container mx-auto px-4 lg:px-8">

        <h2 class="text-3xl lg:text-4xl mb-6 text-white">Ready to Live Pain-Free?</h2>

        <p class="text-lg text-white/60 mb-8 max-w-2xl mx-auto">
            Take the first step toward natural, lasting pain relief. Book your consultation today.
        </p>

        <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-booking'))" 
           class="bg-white text-[var(--primary-green)] px-6 py-3 rounded-lg hover:bg-white/90 inline-flex items-center gap-2">
            Book Free Consultation
            <i class="fa-solid fa-calendar-check"></i>
</button>

    </div>
</section>

  </section>

@endsection