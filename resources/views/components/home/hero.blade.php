 <section id="hero" class="relative h-[600px] lg:h-[700px] overflow-hidden">
        <div class="absolute inset-0">
            <img
                src="https://images.unsplash.com/photo-1536690179483-7a0f1d0efc05?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
                alt="Chyavana Ayurveda Hospital Banner"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/30"></div>
        </div>

        <div class="relative container mx-auto px-4 lg:px-8 h-full flex items-center">
            <div class="max-w-2xl text-white">
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full bg-white/20 text-white border border-white/30 mb-6 backdrop-blur-sm text-sm"
                    style="font-family: var(--font-body);"
                >
                    Wellness Through Ayurveda
                </span>

                <h1
                    class="text-5xl lg:text-7xl mb-6 leading-tight"
                    style="font-family: var(--font-body); font-weight: 700;"
                >
                    Experience Authentic Ayurvedic Healing
                </h1>

                <p
                    class="text-xl lg:text-2xl mb-8 text-white/90"
                    style="font-family: var(--font-body);"
                >
                    Traditional wisdom meets modern care. Restore balance and vitality through time-tested natural therapies.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    {{-- Book Consultation --}}
                    <a
                        href="#contact-cta"
                        class="inline-flex items-center justify-center bg-[var (--primary-green)] hover:bg-[var (--primary-green)]/90 text-white text-lg px-8 py-4 rounded-lg"
                        style="font-family: var(--font-body);"
                    >
                        Book Consultation
                        <svg class="w-5 h-5 ml-2" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12" />
                            <polyline points="12 5 19 12 12 19" />
                        </svg>
                    </a>

                    {{-- Explore Treatments --}}
                    <a
                        href="#treatments"
                        class="inline-flex items-center justify-center border-2 border-white text-white hover:bg-white hover:text-[var(--primary-green)] text-lg px-8 py-4 rounded-lg"
                        style="font-family: var(--font-body);"
                    >
                        Explore Treatments
                    </a>
                </div>
            </div>
        </div>
    </section>