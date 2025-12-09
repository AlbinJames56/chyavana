<section id="treatments" class="py-20 bg-[var(--neutral-light)]">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2
                    class="text-4xl lg:text-5xl text-[var(--neutral-dark)] mb-4"
                    style="font-family: var(--font-body); font-weight: 700;"
                >
                    Our Treatment Programs
                </h2>
                <p
                    class="text-lg text-[var(--muted-foreground)]"
                    style="font-family: var(--font-body);"
                >
                    Comprehensive Ayurvedic therapies designed to restore balance and promote natural healing
                </p>
            </div>

            @php
                $treatments = [
                    [
                        'title' => 'Panchakarma Therapy',
                        'description' => 'Complete detoxification and rejuvenation through traditional five-step purification process',
                        'image' => 'https://images.unsplash.com/photo-1760696473939-88db0835c908?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080',
                        'icon' => 'leaf',
                    ],
                    [
                        'title' => 'Pain Management',
                        'description' => 'Natural relief from chronic pain through specialized Ayurvedic therapies and herbal medicine',
                        'image' => 'https://images.unsplash.com/photo-1731597076108-f3bbe268162f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080',
                        'icon' => 'heart',
                    ],
                    [
                        'title' => 'Wellness Programs',
                        'description' => 'Customized wellness plans for preventive care and lifestyle enhancement',
                        'image' => 'https://images.unsplash.com/photo-1635545999375-057ee4013deb?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080',
                        'icon' => 'sparkles',
                    ],
                    [
                        'title' => 'Chronic Disease Care',
                        'description' => 'Holistic management of diabetes, arthritis, respiratory and digestive disorders',
                        'image' => 'https://images.unsplash.com/photo-1659328376647-52ec39d1a5cf?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080',
                        'icon' => 'activity',
                    ],
                ];
            @endphp

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($treatments as $treatment)
                    <x-cards.treatment-card
                        :title="$treatment['title']"
                        :description="$treatment['description']"
                        :image="$treatment['image']"
                    >
                        <x-slot:icon>
                            {{-- Simple generic icon; replace if needed --}}
                            <svg class="w-6 h-6 text-[var(--primary-green)]" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                            </svg>
                        </x-slot:icon>
                    </x-cards.treatment-card>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a
                    href="#treatments"
                    class="inline-flex items-center bg-[var(--primary-green)] hover:bg-[var(--primary-green)]/90 text-white px-8 py-3 rounded-lg"
                    style="font-family: var(--font-body);"
                >
                    View All Programs
                    <svg class="w-5 h-5 ml-2" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </a>
            </div>
        </div>
    </section>