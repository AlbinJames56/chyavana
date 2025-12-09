<section id="stats" class="py-20 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <x-cards.stat-card value="10,000+" label="Patients Healed">
                    <x-slot:icon>
                        {{-- Users --}}
                        <svg class="w-14 h-14 text-[var (--primary-green)] mx-auto"
                             viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </x-slot:icon>
                </x-cards.stat-card>

                <x-cards.stat-card value="20+" label="Years Experience">
                    <x-slot:icon>
                        <svg class="w-14 h-14 text-[var (--primary-green)] mx-auto"
                             viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 6v6l4 2" />
                        </svg>
                    </x-slot:icon>
                </x-home.stat-card>

                <x-cards.stat-card value="95%" label="Success Rate">
                    <x-slot:icon>
                        <svg class="w-14 h-14 text-[var(--primary-green)] mx-auto"
                             viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 3v18h18" />
                            <path d="M7 14l4-4 4 4 4-8" />
                        </svg>
                    </x-slot:icon>
                </x-cards.stat-card>

                <x-cards.stat-card value="15+" label="Expert Healers">
                    <x-slot:icon>
                        {{-- Stethoscope-ish --}}
                        <svg class="w-14 h-14 text-[var(--primary-green)] mx-auto"
                             viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 3v6a6 6 0 0 0 12 0V3" />
                            <circle cx="18" cy="18" r="3" />
                            <path d="M9 18h3a3 3 0 0 0 3-3v-3" />
                        </svg>
                    </x-slot:icon>
                </x-cards.stat-card>
            </div>
        </div>
    </section>