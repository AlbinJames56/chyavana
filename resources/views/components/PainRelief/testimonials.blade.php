@php use Illuminate\Support\Facades\Storage; @endphp

{{-- Swiper CSS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<div x-data="{ open: false, src: null, isEmbed: false }" x-cloak>

    <section class="py-10 md:py-20">
        <div class="container mx-auto px-8 lg:px-28">

            {{-- Section header --}}
            <div class="text-center max-w-2xl mx-auto mb-10">
                <h2 class="text-3xl lg:text-4xl text-[var(--neutral-dark)]">
                    Success Stories
                </h2>
                <p class="text-[var(--muted-foreground)]">
                    Real patients, real results
                </p>
            </div>

            {{-- Slider wrapper --}}
            <div class="relative">

                {{-- Left Arrow --}}
                <button class="swiper-button-prev absolute left-0 -translate-x-16 top-1/2 -translate-y-1/2 z-40
               w-14 h-14 rounded-full bg-white shadow-lg
               flex items-center justify-center
               hover:bg-[var(--primary-green)] hover:text-white transition" aria-label="Previous testimonial">
                    <i class="fa-solid fa-angle-left text-xl"></i>
                </button>

                {{-- Swiper --}}
                <div class="swiper testimonials-swiper">
                    <div class="swiper-wrapper">

                        @foreach($testimonials as $t)
                                @php
                                    $hasUpload = !empty($t->video_file) && Storage::disk('public')->exists($t->video_file);
                                    $uploadUrl = $hasUpload ? Storage::url($t->video_file) : null;

                                    $hasEmbed = !empty($t->video_embed_url);
                                    $embedUrl = $hasEmbed ? $t->video_embed_url : null;

                                    $playable = ($hasUpload || $hasEmbed);
                                    $thumbnail = $t->thumbnail_url ?? asset('images/default-testimonial.jpg');
                                @endphp

                                <div class="swiper-slide">
                                    <div class="border border-[var(--border)] bg-white rounded-xl
                               p-5 flex flex-col gap-4
                               h-[30rem] overflow-hidden" @if($playable) role="button" tabindex="0" @click="
                                src = {{ json_encode($uploadUrl ?? $embedUrl) }};
                                isEmbed = {{ json_encode((bool) $embedUrl) }};
                                open = true;
                              " @endif>

                                        {{-- Meta --}}
                                        <div class="flex items-center justify-between">
                                            <!-- <span class="text-sm px-3 py-1 rounded
                                       bg-[var(--primary-green)]/10
                                       text-[var(--primary-green)]">
                                                {{ $t->improvement ?? '—' }} Improvement
                                            </span> -->
                                            <span class="text-sm text-[var(--muted-foreground)]">
                                                {{ $t->duration ?? '—' }}
                                            </span>
                                        </div>

                                        {{-- Video OR Text --}}
                                        @if($playable)
                                            <div
                                                class="flex-1 relative rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                                <img src="{{ $thumbnail }}" alt="{{ $t->name }}"
                                                    class="w-full h-full object-cover" />

                                                {{-- Play overlay --}}
                                                <div class="absolute inset-0 flex items-center justify-center">
                                                    <div class="bg-black/50 rounded-full p-4">
                                                        <i class="fa-solid fa-play text-white text-2xl"></i>
                                                    </div>
                                                </div>

                                                {{-- Name overlay --}}
                                                <div class="absolute bottom-3 left-3 right-3
                                            text-center text-sm text-white
                                            bg-black/40 backdrop-blur rounded px-3 py-1">
                                                    {{ $t->name }}
                                                </div>
                                            </div>
                                        @else
                                            <div class="flex-1 overflow-auto pr-1">
                                                <p class="italic text-[var(--muted-foreground)] leading-relaxed">
                                                    “{{ $t->quote }}”
                                                </p>
                                            </div>
                                        @endif

                                        {{-- Footer --}}
                                        <div class="pt-3 border-t border-[var(--border)]">
                                            <p class="font-medium text-[var(--neutral-dark)]">
                                                {{ $t->name }}
                                            </p>
                                            @if($t->condition)
                                                <p class="text-sm text-[var(--muted-foreground)]">
                                                    {{ $t->condition }}
                                                </p>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                        @endforeach

                    </div>

                    {{-- Pagination --}}
                    <div class="swiper-pagination mt-8 flex justify-center"></div>
                </div>

                {{-- Right Arrow --}}
                <button class="swiper-button-next absolute right-0 translate-x-16 top-1/2 -translate-y-1/2 z-40
               w-14 h-14 rounded-full bg-white shadow-lg
               flex items-center justify-center
               hover:bg-[var(--primary-green)] hover:text-white transition" aria-label="Next testimonial">
                    <i class="fa-solid fa-angle-right text-xl"></i>
                </button>

            </div>
        </div>
    </section>

    {{-- Fullscreen Video Modal --}}
    <div x-show="open" x-transition.opacity class="fixed inset-0 z-50 bg-black/80 flex items-center justify-center p-4"
        @keydown.window.escape="open = false; src = null;" x-cloak>
        <div class="relative w-full max-w-4xl">

            {{-- Close --}}
            <button @click="open = false; src = null" class="absolute -top-12 right-0 text-white text-2xl">
                <i class="fa-solid fa-xmark"></i>
            </button>

            {{-- Embed --}}
            <template x-if="src && isEmbed">
                <div class="relative rounded-lg overflow-hidden" style="padding-top:56.25%;">
                    <iframe :src="src" class="absolute inset-0 w-full h-full" frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </template>

            {{-- Uploaded video --}}
            <template x-if="src && !isEmbed">
                <video controls class="w-full max-h-[80vh] rounded-lg bg-black">
                    <source :src="src" type="video/mp4">
                </video>
            </template>

        </div>
    </div>

</div>

{{-- Swiper JS --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        new Swiper('.testimonials-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: { el: '.swiper-pagination', clickable: true },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    });
</script>