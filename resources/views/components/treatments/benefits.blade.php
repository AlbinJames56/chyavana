@props([
  'headline' => 'Why Choose Our Treatment Programs?',
  'subtext' => 'Experience comprehensive care that addresses your complete wellbeing',
  'benefits' => [
    ['icon' => 'leaf', 'title' => 'Natural & Safe', 'description' => 'Pure herbal medicines without harmful side effects or chemical additives'],
    ['icon' => 'users', 'title' => 'Expert Guidance', 'description' => 'Certified Ayurvedic doctors with decades of combined clinical experience'],
    ['icon' => 'heart', 'title' => 'Lasting Results', 'description' => 'Focus on sustainable healing and long-term health improvement'],
  ]
])

<section class="py-20 bg-gradient-to-br from-[var(--primary-green)] to-[var(--primary-green)]/80 text-white">
  <div class="container mx-auto px-4 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <h2 class="text-4xl lg:text-5xl mb-4" style="font-family:var(--font-body);font-weight:700">
        {{ $headline }}
      </h2>
      <p class="text-lg text-white/90" style="font-family:var(--font-body)">{{ $subtext }}</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
      @foreach($benefits as $b)
        <div class="border-white/20 bg-white/10 backdrop-blur-sm text-center rounded-2xl overflow-hidden">
          <div class="p-8 space-y-4">
            <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center mx-auto">
              @switch($b['icon'])
                @case('leaf')
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 11.5a8.38 8.38 0 0 0-2.5-5.5 8.38 8.38 0 0 0-5.5-2.5A8.38 8.38 0 0 0 7 4a8.38 8.38 0 0 0-2.5 5.5A8.38 8.38 0 0 0 7 15.5" />
                  </svg>
                  @break
                @case('users')
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                  </svg>
                  @break
                @case('heart')
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8L12 22.5l8.8-9.1a5.5 5.5 0 0 0 0-8.8z" />
                  </svg>
                  @break
                @default
                  <span class="text-white">{{ $b['icon'] }}</span>
              @endswitch
            </div>

            <h3 class="text-xl text-white" style="font-family:var(--font-body);font-weight:600">{{ $b['title'] }}</h3>
            <p class="text-white/90" style="font-family:var(--font-body)">{{ $b['description'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
