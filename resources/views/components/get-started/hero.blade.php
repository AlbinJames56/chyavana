<section class="relative py-24 lg:py-32 mt-24 overflow-hidden">

    {{-- Background Image --}}
    <div class="absolute inset-0">
        <div class="w-full h-full" style="
                background-image: url('{{ asset('images/bg-2.jpg') }}');
                background-size: cover;
                background-position: center;
            ">
        </div>

        {{-- Overlay for readability --}}
        <div class="absolute inset-0 bg-white/60 backdrop-blur-[1px]"></div>
    </div>

    <div class="relative container mx-auto px-8 md:px-14 lg:px-28">
        <div class="max-w-3xl mx-auto text-center space-y-6">

            {{-- Badge --}}
            <span class="px-4 py-1 inline-flex items-center gap-2 rounded-full bg-[var(--primary-green)]/10 
                         text-[var(--primary-green)] border border-[var(--primary-green)]/20 text-sm">
                <i class="fa-solid fa-hand-holding-heart text-[var(--primary-green)]"></i>
                We're Here to Help
            </span>

            {{-- Heading --}}
            <h1 class="text-4xl lg:text-5xl text-[var(--neutral-dark)] font-semibold leading-tight">
                Get Started on Your Wellness Journey
            </h1>

            {{-- Paragraph --}}
            <p class="text-lg text-[var(--muted-foreground)]">
                Schedule your free initial consultation and discover how Ayurveda can help
                you achieve optimal health naturally.
            </p>

            {{-- Optional CTA Buttons (can remove) --}}
            <div class="mt-6 flex justify-center gap-4">
                <button type="button" onclick="window.openBookingModal()"
                    class="px-6 py-3 bg-[var(--primary-green)] text-white rounded-xl shadow hover:bg-[var(--primary-green)]/90 transition flex items-center gap-2">
                    <i class="fa-solid fa-calendar-check"></i> Book Consultation
                </button>

                <a href="tel:+918045678900"
                    class="px-6 py-3 bg-white text-[var(--primary-green)] border border-[var(--primary-green)] rounded-xl shadow hover:bg-[var(--primary-green)]/10 transition flex items-center gap-2">
                    <i class="fa-solid fa-phone"></i> Call Us
                </a>
            </div>

        </div>
    </div>

</section>