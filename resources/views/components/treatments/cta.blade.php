@props([
    'headline' => 'Not Sure Which Program Is Right for You?',
    'text' => 'Schedule a consultation with our expert healers to discuss your health concerns and receive personalized program recommendations.',
    'buttonText' => 'Book Free Consultation',
    'buttonUrl' => '#'
])

<section class="py-20 bg-[var(--neutral-light)]">
    <div class="container mx-auto px-4 lg:px-8">
        
        <div class="max-w-3xl mx-auto text-center bg-white rounded-2xl shadow-lg p-10 border border-[var(--border)]">
            
            {{-- Icon --}}
            <div class="text-[var(--primary-green)] text-5xl mb-6">
                <i class="fas fa-hand-holding-heart"></i>
            </div>

            {{-- Headline --}}
            <h2 class="text-3xl lg:text-4xl text-[var(--neutral-dark)] mb-4"
                style="font-family: var(--font-headline); font-weight:700;">
                {{ $headline }}
            </h2>

            {{-- Text --}}
            <p class="text-lg text-[var(--muted-foreground)] mb-8"
                style="font-family: var(--font-body);">
                {{ $text }}
            </p>

            {{-- Button --}}
            <a href="{{ $buttonUrl }}"
               class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-[var(--primary-green)] text-white hover:bg-[var(--primary-green-hover)] transition-all shadow-md hover:shadow-lg text-lg font-medium"
               style="font-family: var(--font-body);">
                <i class="fas fa-calendar-check text-xl"></i>
                {{ $buttonText }}
            </a>

        </div>

    </div>
</section>
