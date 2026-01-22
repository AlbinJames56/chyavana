@props([
  'headline' => 'Why Choose Our Treatment Programs?',
  'subtext' => 'Experience comprehensive care that addresses your complete wellbeing',
  'benefits' => [
    ['icon' => 'leaf', 'title' => 'Natural & Safe', 'description' => 'Pure herbal medicines without harmful side effects or chemical additives'],
    ['icon' => 'users', 'title' => 'Expert Guidance', 'description' => 'Certified Ayurvedic doctors with decades of combined clinical experience'],
    ['icon' => 'heart', 'title' => 'Lasting Results', 'description' => 'Focus on sustainable healing and long-term health improvement'],
  ]
])

<section class="py-10 md:py-20 bg-gradient-to-br from-[var(--primary-green)] to-[var(--primary-green)]/80 text-white">
  <div class="container mx-auto px-4 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
      <h2 class="text-4xl lg:text-5xl mb-4 text-white" style="font-family:var(--font-body);font-weight:700">
        {{ $headline }}
      </h2>
      <p class="text-lg text-white/90" style="font-family:var(--font-body)">{{ $subtext }}</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
      @foreach($benefits as $b)
        <div class="border-white/20 bg-white/10 backdrop-blur-sm text-center rounded-2xl overflow-hidden"
             data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
          <div class="p-8 space-y-4">
            <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center mx-auto">
              @php
  // map your friendly keys to Font Awesome icon classes
  $faMap = [
    'leaf' => 'fa-leaf',
    'users' => 'fa-users',
    'heart' => 'fa-heart',
  ];

  $key = strtolower($b['icon'] ?? '');
  $iconClass = $faMap[$key] ?? 'fa-circle-info';
              @endphp

              {{-- Use 'fa-solid' for Font Awesome 6+; change prefix if needed --}}
              <i class="fa-solid {{ $iconClass }} text-white text-2xl" aria-hidden="true"></i>
              <span class="sr-only">{{ $b['title'] }} icon</span>
            </div>

            <h3 class="text-xl text-white" style="font-family:var(--font-body);font-weight:600">{{ $b['title'] }}</h3>
            <p class="text-white/90" style="font-family:var(--font-body)">{{ $b['description'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
