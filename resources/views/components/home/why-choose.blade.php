 <section id="why-us" class="py-20 bg-gradient-to-br from-[var(--primary-green)] to-[var(--primary-green)]/80 text-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2
                    class="text-4xl lg:text-5xl mb-4"
                    style="font-family: var(--font-body); font-weight: 700;"
                >
                    Why Choose Chyavana Ayurveda Hospital?
                </h2>
                <p
                    class="text-lg text-white/90"
                    style="font-family: var(--font-body);"
                >
                    Experience the difference of authentic, patient-centered Ayurvedic care
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <x-cards.feature-card
                    title="Certified Practitioners"
                    description="All our healers are certified Ayurvedic doctors with extensive experience"
                >
                    <x-slot:icon>
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            <path d="M9 12l2 2 4-4" />
                        </svg>
                    </x-slot:icon>
                </x-cards.feature-card>

                <x-cards.feature-card
                    title="Natural Healing"
                    description="Pure herbal medicines and natural therapies without side effects"
                >
                    <x-slot:icon>
                        {{-- Leaf-ish icon --}}
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 3a8.5 8.5 0 0 0-8 8.5C3 15.5 5.5 19 9.5 19A8.5 8.5 0 0 0 18 10.5C18 5.5 14.5 3 11 3z" />
                            <path d="M11 3v13" />
                        </svg>
                    </x-slot:icon>
                </x-cards.feature-card>

                <x-cards.feature-card 
                    title="Personalized Care"
                    description="Individual treatment plans based on your unique body constitution"
                >
                    <x-slot:icon>
                        {{-- Clock --}}
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                    </x-slot:icon>
                </x-cards.feature-card>

                <x-cards.feature-card
                    title="Proven Results"
                    description="Decades of successful treatments with documented patient outcomes"
                >
                    <x-slot:icon>
                        {{-- Award/medal --}}
                        <svg class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="8" r="5" />
                            <path d="M8.5 14.5 7 22l5-3 5 3-1.5-7.5" />
                        </svg>
                    </x-slot:icon>
                </x-cards.feature-card>
            </div>
        </div>
    </section>