<section id="treatments" class="py-20 bg-[var(--neutral-light)]">
    <div class="container px-8 md:px-14 lg:px-28   mx-auto ">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl lg:text-5xl text-[var(--neutral-dark)] mb-4"
                style="font-family: var(--font-body); font-weight: 700;">
                Our Treatment Programs
            </h2>
            <p class="text-lg text-[var(--muted-foreground)]" style="font-family: var(--font-body);">
                Comprehensive Ayurvedic therapies designed to restore balance and promote natural healing
            </p>
        </div>



        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($treatments as $treatment)
                <x-cards.treatment-card :title="$treatment->title"
                    :description="Str::limit(strip_tags($treatment->description), 110)" :image="$treatment->image_url"
                    :category="$treatment->category ?? 'therapy'" :duration="$treatment->duration ?? null"
                    :effectiveness="$treatment->effectiveness ?? null" :includes="$treatment->includes ?? []"
                    :url="route('treatment.show', $treatment->slug)">
                    <x-slot:icon>
                        <i class="fa-solid fa-leaf"></i>
                    </x-slot:icon>
                </x-cards.treatment-card>
            @endforeach
        </div>



        <div class="text-center mt-12">
            <a href="/treatments"
                class="inline-flex items-center bg-[var(--primary-green)] hover:bg-[var(--primary-green)]/90 text-white px-8 py-3 rounded-lg"
                style="font-family: var(--font-body);">
                View All Programs
                <svg class="w-5 h-5 ml-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>
        </div>
    </div>
</section>