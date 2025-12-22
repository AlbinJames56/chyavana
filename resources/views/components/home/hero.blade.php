<section id="hero" class="relative h-[620px] lg:h-[740px] overflow-hidden">
    {{-- Background image --}}
    <img src="/images/bg-4.jpg" alt="Ayurvedic healing" class="absolute inset-0 w-full h-full object-cover">

    {{-- Soft overlay for readability --}}
    <div class="absolute inset-0 bg-white/70 lg:bg-white/60"></div>

    {{-- Content --}}
    <div class="relative container mx-auto px-4 lg:px-8 h-full flex items-center">
        <div class="max-w-2xl pt-6 ">

            {{-- Eyebrow --}}
            <span class=" inline-flex items-center px-4 py-1.5 rounded-full
                       bg-[var(--primary-green)]/10
                       text-[var(--primary-green)]
                       border border-[var(--primary-green)]/20
                       mb-6 text-sm font-medium backdrop-blur-sm">
                Wellness Through Ayurveda
            </span>

            {{-- Heading --}}
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold
                       text-[var(--neutral-dark)]
                       leading-tight mb-6">
                Experience <span class="text-[var(--primary-green)]">Authentic</span><br>
                Ayurvedic Healing
            </h1>

            {{-- Sub text --}}
            <p class="text-lg lg:text-xl text-[var(--muted-foreground)] mb-10 max-w-xl">
                Traditional wisdom meets modern care.
                Restore balance, vitality, and long-term wellness through
                time-tested natural therapies.
            </p>

            {{-- CTAs --}}
            <div class="flex flex-col sm:flex-row gap-4">
                {{-- Book Consultation --}}
                <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-booking'))" class="inline-flex items-center justify-center gap-2
                           bg-[var(--primary-green)]
                           hover:bg-[var(--primary-green)]/90
                           text-white text-base lg:text-lg
                           px-7 py-3.5 rounded-lg
                           shadow-lg shadow-emerald-900/20
                           transition-all duration-300">
                    Book Consultation
                    <i class="fa-solid fa-arrow-right-long text-sm"></i>
                </button>

                {{-- Explore Treatments --}}
                <a href="/treatments" class="inline-flex items-center justify-center
                          border border-[var(--primary-green)]
                          text-[var(--primary-green)]
                          hover:bg-[var(--primary-green)]
                          hover:text-white
                          text-base lg:text-lg
                          px-7 py-3.5 rounded-lg
                          transition-all duration-300">
                    Explore Treatments
                </a>
            </div>

        </div>
    </div>
</section>