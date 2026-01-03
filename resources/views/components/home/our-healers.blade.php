  <section id="healers" class="py-8 md:py-20 bg-[var(--neutral-light)]">
        <div class="container  px-8 md:px-14 lg:px-28   mx-auto ">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <img src="{{ asset('images/getting-ready-spa.jpg') }}" alt="Expert Ayurvedic Healers"
                        class="w-full h-[500px] object-cover rounded-2xl shadow-xl" />

                </div>
                 
                <div>
                    <h2
                        class="text-4xl lg:text-5xl text-[var(--neutral-dark)] mb-6"
                        style="font-family: var(--font-body); font-weight: 700;"
                    >
                        Meet Our Expert Healers
                    </h2>
                    <p
                        class="text-lg text-[var(--muted-foreground)] mb-6"
                        style="font-family: var(--font-body);"
                    >
                        Our team of certified Ayurvedic practitioners brings decades of combined experience in
                        traditional healing methods. Each healer is trained in classical Ayurvedic texts and modern diagnostic techniques.
                    </p>
                    <p
                        class="text-lg text-[var(--muted-foreground)] mb-8"
                        style="font-family: var(--font-body);"
                    >
                        They work closely with patients to understand individual constitutions, lifestyle factors, and
                        health goals to create personalized treatment plans that deliver lasting results.
                    </p>
                    <a
                        href="OurHealers"
                        class="inline-flex items-center bg-[var(--primary-green)] hover:bg-[var(--primary-green)]/90 text-white px-6 py-3 rounded-lg"
                        style="font-family: var(--font-body);"
                    >
                        Meet Our Team
                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12" />
                            <polyline points="12 5 19 12 12 19" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-12 md:py-20 bg-white">
        <div class="container mx-auto px-8 md:px-14 lg:px-28">
    
            {{-- Section Header --}}
            <div class="text-center max-w-2xl mx-auto mb-12">
                <h2 class="text-3xl lg:text-4xl text-[var(--neutral-dark)] mb-3"
                    style="font-family: var(--font-body); font-weight: 700;">
                    Our Healers
                </h2>
                <p class="text-[var(--muted-foreground)]">
                    A glimpse of our experienced Ayurvedic practitioners
                </p>
            </div>
    
            {{-- Healers Grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($homeHealers as $healer)
                    <x-cards.healer-mini-card :healer="$healer" />
                @endforeach
            </div>
    
            {{-- CTA --}}
            <div class="text-center mt-10">
                <a href="{{ url('/OurHealers') }}" class="inline-flex items-center gap-2 px-8 py-3 rounded-lg
                          bg-[var(--primary-green)] text-white
                          hover:bg-[var(--primary-green)]/90 transition" style="font-family: var(--font-body);">
                    View All Healers
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </a>
            </div>
    
        </div>
    </section>