 <section id="pain-relief" class="py-20 bg-white">
        <div class="container  px-8 md:px-14 lg:px-28   mx-auto ">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2
                    class="text-4xl lg:text-5xl text-[var(--neutral-dark)] mb-4"
                    style="font-family: var(--font-body); font-weight: 700;"
                >
                    Specialized Pain Relief Programs
                </h2>
                <p
                    class="text-lg text-[var(--muted-foreground)]"
                    style="font-family: var(--font-body);"
                >
                    Natural, effective solutions for chronic pain without medication dependency
                </p>
            </div>

             

           <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
    @foreach ($painPrograms as $program)
        <x-cards.pain-program-card
            :title="$program->title"
            :description="Str::limit(strip_tags($program->description), 120)"
            :duration="$program->duration ?? '—'"
        />
    @endforeach
</div>


            <div class="text-center mt-12">
                <a
                    href="/pain-relief"
                    class="inline-flex items-center border border-[var(--primary-green)] text-[var(--primary-green)] px-8 py-3 rounded-lg"
                    style="font-family: var(--font-body);"
                >
                    Explore Pain Relief Solutions
                    <svg class="w-5 h-5 ml-2" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </a>
            </div>
        </div>
    </section>