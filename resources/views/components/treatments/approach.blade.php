@props([
  'image' => 'https://images.unsplash.com/photo-1601839777132-b3f4e455c369?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080',
  'headline' => 'Our Holistic Treatment Approach',
  'intro' => 'At Chyavana Ayurveda Hospital, we believe in treating the root cause rather than just symptoms. Our integrated approach combines multiple therapeutic modalities to create lasting wellness.',
  // items: array of ['icon' => 'target'|'users'|'microscope'|'check', 'text' => '...']
  'items' => [
    ['icon' => 'target', 'text' => 'Root Cause Analysis - Identify underlying imbalances'],
    ['icon' => 'users', 'text' => 'Personalized Plans - Tailored to your unique constitution'],
    ['icon' => 'microscope', 'text' => 'Evidence-Based - Traditional wisdom meets modern science'],
    ['icon' => 'check', 'text' => 'Ongoing Support - Regular monitoring and adjustments'],
  ]
])

<section class="py-20 bg-[var(--neutral-light)]">
  <div class="container mx-auto px-4 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
      <div class="relative">
        <img src="{{ $image }}" alt="{{ $headline }}" class="w-full h-[500px] object-cover rounded-2xl shadow-xl" loading="lazy">
      </div>

      <div>
        <h2 class="text-4xl lg:text-5xl text-[var(--neutral-dark)] mb-6" style="font-family:var(--font-body);font-weight:700">
          {{ $headline }}
        </h2>

        <p class="text-lg text-[var(--muted-foreground)] mb-6" style="font-family:var(--font-body)">
          {{ $intro }}
        </p>

        <div class="space-y-4">
          @foreach($items as $item)
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 rounded-full bg-[var(--primary-green)]/10 flex items-center justify-center mt-1">
                @switch($item['icon'])
                  @case('target')
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[var(--primary-green)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <circle cx="12" cy="12" r="8" />
                      <circle cx="12" cy="12" r="4" />
                    </svg>
                    @break
                  @case('users')
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[var(--primary-green)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                      <circle cx="9" cy="7" r="4" />
                    </svg>
                    @break
                  @case('microscope')
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[var(--primary-green)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M6 18h8" />
                      <path d="M3 22h18" />
                      <path d="M10 2h4v6" />
                    </svg>
                    @break
                  @case('check')
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[var(--primary-green)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <circle cx="12" cy="12" r="10" />
                      <path d="M9 12l2 2 4-4" />
                    </svg>
                    @break
                  @default
                    <span class="text-sm text-[var(--primary-green)]">{{ $item['icon'] }}</span>
                @endswitch
              </div>

              <p class="text-[var(--neutral-dark)] text-lg" style="font-family:var(--font-body)">{{ $item['text'] }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
