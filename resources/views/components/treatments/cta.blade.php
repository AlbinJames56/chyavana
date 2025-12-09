@props([
    'headline' => 'Not Sure Which Program Is Right for You?',
    'text' => 'Schedule a consultation with our expert healers to discuss your health concerns and receive personalized program recommendations.',
    'buttonText' => 'Book Free Consultation',
    'buttonUrl' =>   '#'
])
    
            
    <section class="py-20 bg-[var(
           --neutral-light)] text-center">
        <div class="container mx-auto px-4 lg:px-8">
        <h2 class="text-3xl lg:text-4xl text-[var(--neutral-dark)] mb-6" style="font-family:var(--font-headline)">{{ $headline }}</h2>
      <p class="text-lg text-[var(--muted-foreground)] mb-8 max-w-2xl mx-auto" style="font-family:var(--font-body)">{{ $text }}</p>

    <a href="{{ $buttonUrl }}" class="inline-flex items-center px-6 py-3 rounded-lg bg-[var(--primary-green)] text-white">
      {{ $buttonText }}
    </a>
  </div>
</section>
