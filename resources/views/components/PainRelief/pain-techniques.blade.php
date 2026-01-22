<section id="pain-techniques" class="py-10 md:py-16 container mx-auto px-8 lg:px-28">
    <div class="container mx-auto " data-aos="fade-up">
        <h2 class="text-3xl font-bold mb-6">Pain Management Techniques</h2>
        <p class="prose mb-8">Our proven techniques to manage and reduce pain — personalized to your body and dosha.</p>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse($techniques as $tech)
                <article class="bg-white rounded-lg shadow p-6 flex flex-col" data-aos="fade-up"
                    data-aos-delay="{{ $loop->iteration * 100 }}">

                    {{-- Image --}}
                    @if($tech->image)
                        <div class="w-full h-40 mb-4 overflow-hidden rounded">
                            <img src="{{ asset('storage/' . $tech->image) }}" alt="{{ $tech->title }}"
                                class="w-full h-full object-cover">
                        </div>
                    @endif

                    {{-- Title --}}
                    <h3 class="text-xl font-semibold mb-2">
                        {{ $tech->title }}
                    </h3>

                    {{-- Short summary extracted from description --}}
                    <p class="text-sm text-gray-600 mb-4">
                        {{ Str::limit(strip_tags($tech->description), 120) }}
                    </p>

                    {{-- Learn More --}}
                    <a href="{{ route('pain-techniques.show', $tech->slug) }}"
                        class="mt-auto inline-block text-primary font-medium underline">
                        Learn More
                    </a>
                </article>
            @empty
                <div class="col-span-full text-center text-muted">No techniques listed yet.</div>
            @endforelse
        </div>
    </div>
</section>