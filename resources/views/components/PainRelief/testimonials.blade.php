<section class="py-20">
    <div class="container mx-auto px-8 lg:px-28">

        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl lg:text-4xl text-[var(--neutral-dark)]">Success Stories</h2>
            <p class="text-[var(--muted-foreground)]">Real patients, real results</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($testimonials as $t)
                <div class="border border-[var(--border)] p-8 rounded-xl">

                    <div class="flex justify-between">
                        <span class="bg-[var(--primary-green)]/10 text-[var(--primary-green)] text-sm px-3 py-1 rounded">
                            {{ $t['improvement'] }} Improvement
                        </span>
                        <span class="text-sm text-[var(--muted-foreground)]">
                            {{ $t['duration'] }}
                        </span>
                    </div>

                    <p class="italic text-[var(--muted-foreground)] mt-4">
                        "{{ $t['quote'] }}"
                    </p>

                    <div class="pt-4 border-t border-[var(--border)] mt-4">
                        <p class="text-[var(--neutral-dark)]">{{ $t['name'] }}</p>
                        <p class="text-sm text-[var(--muted-foreground)]">{{ $t['condition'] }}</p>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
