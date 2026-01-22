<section class="relative bg-gradient-to-b from-white to-[var(--neutral-light)] py-20 lg:py-28">
    <div class="container mx-auto px-8 lg:px-28">
        <div class="grid lg:grid-cols-2 gap-16 items-center mt-6">

            <!-- LEFT TEXT -->
            <div class="space-y-6" data-aos="fade-right">

                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5
                            bg-[var(--primary-green)]/10 text-[var(--primary-green)]
                            border border-[var(--primary-green)]/20 rounded-full text-sm font-medium">
                    <i class="fa-solid fa-leaf"></i>
                    Natural Pain Management
                </div>

                <!-- Heading -->
                <h1 class="text-4xl lg:text-5xl leading-tight text-[var(--neutral-dark)] font-semibold"
                    style="font-family:var(--font-headline)">
                    Holistic Pain Relief Programs
                </h1>

                <!-- Subtext -->
                <p class="text-lg text-[var(--muted-foreground)] max-w-xl" style="font-family:var(--font-body)">
                    Discover long-lasting relief from chronic pain through authentic Ayurvedic therapies.
                    Our holistic protocols address inflammation, nerve imbalance, and root-cause patterns.
                </p>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-2">
                    <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-booking'))" class="bg-[var(--primary-green)] hover:bg-[var(--primary-green)]/90
                              text-white px-6 py-3 rounded-xl shadow-md transition flex items-center gap-2">
                        Book Consultation <i class="fa-solid fa-arrow-right text-sm"></i>
                    </button>

                    <a href="/OurHealers" class="border border-[var(--primary-green)]
                              hover:bg-[var(--primary-green)]/5
                              text-[var(--primary-green)] px-6 py-3 rounded-xl transition flex items-center gap-2">
                        Meet Our Healers <i class="fa-solid fa-user-doctor text-sm"></i>
                    </a>
                </div>

                <!-- STATS -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 lg:gap-6 pt-8">
                    <div class="text-center bg-white shadow-sm rounded-xl py-4 border border-[var(--border)]">
                        <p class="text-3xl font-bold text-[var(--primary-green)]">2,500+</p>
                        <p class="text-sm text-[var(--muted-foreground)]">Cases Treated</p>
                    </div>

                    <div class="text-center bg-white shadow-sm rounded-xl py-4 border border-[var(--border)]">
                        <p class="text-3xl font-bold text-[var(--primary-green)]">84%</p>
                        <p class="text-sm text-[var(--muted-foreground)]">Avg Pain Relief</p>
                    </div>

                    <div class="text-center bg-white shadow-sm rounded-xl py-4 border border-[var(--border)]">
                        <p class="text-3xl font-bold text-[var(--primary-green)]">0%</p>
                        <p class="text-sm text-[var(--muted-foreground)]">Side Effects</p>
                    </div>
                </div>

            </div>

            <!-- RIGHT IMAGE -->
            <div class="relative group" data-aos="fade-left">
                <img src="https://images.unsplash.com/photo-1596178060671-7a80dc8059ea"
                    class="w-full h-[500px] object-cover rounded-3xl shadow-xl">

                <!-- subtle gradient overlay -->
                <div
                    class="absolute inset-0 rounded-3xl bg-gradient-to-t from-black/20 to-transparent pointer-events-none">
                </div>
            </div>

        </div>
    </div>
</section>