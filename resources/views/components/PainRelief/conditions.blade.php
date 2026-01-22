<section class="py-10 md:py-20">
    <div class="container mx-auto px-8 lg:px-28">

        <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
            <h2 class="font-bold text-3xl lg:text-4xl text-[var(--neutral-dark)]">Conditions We Treat</h2>
            <p class="text-[var(--muted-foreground)]">Specialized treatment protocols for various pain conditions</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">

            @foreach ($conditions as $c)
                <div class="border border-[var(--border)] p-8 rounded-xl hover:shadow-lg transition" data-aos="fade-up"
                    data-aos-delay="{{ $loop->iteration * 100 }}">

                    <div class="flex gap-4">
                        <div class="w-14 h-14 bg-[var(--primary-green)]/10 rounded-full flex items-center justify-center">
                            <i class="fa-solid {{ $c['icon'] }} text-[var(--primary-green)] text-2xl"></i>
                        </div>

                        <div>
                            <h3 class="text-xl text-[var(--neutral-dark)]">{{ $c['title'] }}</h3>
                            <p class="text-sm text-[var(--muted-foreground)]">
                                {{ $c['description'] }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="text-sm text-[var(--muted-foreground)]">Average Improvement</p>
                        <p class="text-[var(--primary-green)] font-bold">{{ $c['improvement'] }}%</p>

                        <div class="w-full bg-gray-200 h-2 rounded-full mt-1">
                            <div class="h-2 bg-[var(--primary-green)] rounded-full" style="width: {{ $c['improvement'] }}%">
                            </div>
                        </div>
                    </div>

                    <div class="py-4 border-y border-[var(--border)] mt-4">
                        <p class="text-sm text-[var(--neutral-dark)]">{{ $c['duration'] }}</p>
                    </div>

                    <ul class="mt-4 space-y-2 text-sm text-[var(--muted-foreground)]">
                        @foreach ($c['features'] as $f)
                            <li>
                                <i class="fa-solid fa-check text-[var(--primary-green)]"></i>
                                {{ $f }}
                            </li>
                        @endforeach
                    </ul>

                </div>
            @endforeach

        </div>

    </div>
</section>