<section class="py-8 md:py-16 bg-[var(--neutral-light)]">
  <div class="container mx-auto px-8 md:px-14 lg:px-28">

    <!-- Section Header -->
    <div class="text-center max-w-2xl mx-auto mb-12" data-aos="fade-up">
      <span
        class="inline-block px-4 py-1 rounded-full bg-[var(--primary-green)]/10 text-[var(--primary-green)] text-sm font-semibold">
        <i class="fa-solid fa-leaf mr-1"></i> Why Us
      </span>

      <h2 class="text-4xl text-[var(--neutral-dark)] mt-4 font-semibold">
        Why Choose ArogyaSathi?
      </h2>

      <p class="text-[var(--muted-foreground)] mt-3 text-lg">
        The perfect blend of ancient Ayurvedic wisdom and modern clinical expertise.
      </p>
    </div>

    <!-- Card -->
    <div class="max-w-4xl mx-auto">
      <div class="bg-white rounded-3xl border border-[var(--border)] shadow-md overflow-hidden" data-aos="fade-up"
        data-aos-delay="200">

        <!-- decorative top strip -->
        <div class="h-1.5 bg-gradient-to-r from-[var(--primary-green)] to-[var(--accent-warm)]"></div>

        <div class="p-10 grid sm:grid-cols-2 gap-6">

          @foreach($whyChoose as $reason)
            <div class="flex items-start gap-4 group" data-aos="fade-right" data-aos-delay="{{ $loop->iteration * 50 }}">
              <div class="mt-1 w-7 h-7 flex items-center justify-center rounded-full 
                            bg-[var(--primary-green)]/10 group-hover:bg-[var(--primary-green)]/20 
                            transition-all duration-300">
                <i class="fa-solid fa-check text-[var(--primary-green)]"></i>
              </div>

              <span class="text-[var(--neutral-dark)] leading-relaxed">
                {{ $reason }}
              </span>
            </div>
          @endforeach

        </div>
      </div>
    </div>

  </div>
</section>