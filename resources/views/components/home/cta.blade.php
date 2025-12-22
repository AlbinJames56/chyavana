<section id="contact-cta" class="py-20 bg-[var(--primary-green)] text-white">
        <div class="container mx-auto px-4 lg:px-8 text-center">
            <div class="max-w-3xl mx-auto">
                <h2
                    class="text-4xl lg:text-5xl mb-6 text-white"
                    style="font-family: var(--font-body); font-weight: 700;"
                >
                    Ready to Begin Your Healing Journey?
                </h2>
                <p
                    class="text-xl text-white/70 mb-8"
                    style="font-family: var(--font-body);"
                >
                    Schedule your initial consultation and discover how Ayurveda can transform your health naturally and holistically.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-booking'))"
                        class="inline-flex items-center justify-center bg-white text-[var(--primary-green)] hover:bg-white/90 text-lg px-8 py-4 rounded-lg"
                        style="font-family: var(--font-body);"
                    >
                        {{-- Phone --}}
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92V21a2 2 0 0 1-2.18 2A19.78 19.78 0 0 1 3 5.18 2 2 0 0 1 5 3h4.09a1 1 0 0 1 1 .75c.12.66.36 1.3.69 1.88a1 1 0 0 1-.24 1L9.91 9.91a14 14 0 0 0 4.18 4.18l1.28-1.28a1 1 0 0 1 1-.24c.58.33 1.22.57 1.88.69a1 1 0 0 1 .75 1V21z" />
                        </svg>
                        Book Consultation
</button>

                    <a
                        href="/treatments"
                        class="inline-flex items-center justify-center border-2 border-white text-white hover:bg-white hover:text-[var(--primary-green)] text-lg px-8 py-4 rounded-lg"
                        style="font-family: var(--font-body);"
                    >
                        {{-- Book / Browse icon --}}
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                            <path d="M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5z" />
                        </svg>
                        Browse Treatments
                    </a>
                </div>
            </div>
        </div>
    </section>
