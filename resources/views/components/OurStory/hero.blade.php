<section class="relative py-16 md:py-28 mt-12 md:mt-0 overflow-hidden">
  
  <!-- Soft background gradient wash -->
  <div class="absolute inset-0 bg-gradient-to-br from-[var(--primary-green)]/5 via-white to-[var(--primary-green)]/10"></div>

  <!-- Organic decorative shape -->
  <div class="absolute top-20 -left-32 w-96 h-96 bg-[var(--primary-green)]/10 rounded-full blur-3xl opacity-40"></div>

  <div class="container mx-auto px-8 md:px-14 lg:px-28 relative z-10">
    <div class="grid lg:grid-cols-2 gap-16 items-center">

      <!-- LEFT CONTENT -->
      <div class="space-y-6">

        <!-- Vertical Accent Bar -->
        <div class="flex items-center gap-4">
          <div class="w-1.5 h-8 bg-[var(--primary-green)] rounded-full"></div>
          <span class="text-sm font-semibold text-[var(--primary-green)] tracking-wider uppercase">
            <i class="fa-solid fa-seedling mr-2"></i>
            Our Journey
          </span>
        </div>

        <!-- Large premium headline -->
        <h1 class="text-5xl   font-bold leading-tight text-[var(--neutral-dark)]"
            style="font-family:var(--font-headline)">
          Healing That Honors  
          <span class="text-[var(--primary-green)]">Tradition</span><br />
          & Embraces the Future
        </h1>

        <!-- Body text -->
        <p class="  text-[var(--muted-foreground)] max-w-xl leading-relaxed"
           style="font-family:var(--font-body)">
          Since 2010, ArogyaSathi Ayurveda has helped thousands reclaim their health through
          personalized healing rooted in knowledge that has endured for over 5,000 years.
        </p>

        <p class="  text-[var(--muted-foreground)] max-w-xl leading-relaxed"
           style="font-family:var(--font-body)">
          We combine ancient Ayurvedic wisdom with modern wellness science to create care that
          is natural, authentic, and deeply transformative.
        </p>

        <!-- Minimal elegant CTAs -->
        <div class="flex flex-wrap gap-4 pt-4">
          <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-booking'))"
             class="px-7 py-3 rounded-full bg-[var(--primary-green)] text-white font-medium shadow-md hover:shadow-lg transition-all flex items-center gap-2">
            <i class="fa-solid fa-calendar-check"></i>
            Book a Consultation
</button>

          <a href="/OurHealers"
             class="px-7 py-3 rounded-full border border-[var(--primary-green)] text-[var(--primary-green)] font-medium hover:bg-[var(--primary-green)]/10 transition-all flex items-center gap-2">
            <i class="fa-solid fa-user-doctor"></i>
            Meet Our Healers
          </a>
        </div>
      </div>

      <!-- RIGHT IMAGE WITH LAYERED DESIGN -->
      <div class="relative">

        <!-- Soft shadow & frame border -->
        <div class="absolute inset-0 rounded-3xl border border-[var(--primary-green)]/20 scale-100 translate-x-3 translate-y-3"></div>

        <img src="https://images.unsplash.com/photo-1760696473939-88db0835c908?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
             alt="Ayurvedic herbs and healing"
             class="w-full h-[520px] object-cover rounded-3xl shadow-xl">

        <!-- Floating organic badge -->
        <div class="absolute bottom-6 left-6 bg-white/80 backdrop-blur-md border border-[var(--border)] rounded-xl p-5 shadow-md">
          <div class="flex items-center gap-4">
            <i class="fa-solid fa-leaf text-[var(--primary-green)] text-3xl"></i>
            <div>
              <p class="font-semibold text-[var(--neutral-dark)]">Authentic Ayurveda</p>
              <p class="text-xs text-[var(--muted-foreground)]">Rooted in classical texts</p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>
