<x-layouts.app>
    {{-- Meta Data --}}
    @php
        $title = 'Gallery - Chyavana Ayurveda';
        $meta_description = 'Explore our sanctuary of healing. View images and videos of Chyavana Ayurveda Hospital, retreat facilities, treatments, and serene atmosphere.';
    @endphp

    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 overflow-hidden bg-emerald-50/50">
        <div class="absolute inset-0 pointer-events-none opacity-40">
            <div
                class="absolute top-0 right-0 w-[600px] h-[600px] bg-gradient-to-b from-emerald-100/50 to-transparent rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
            </div>
            <div
                class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-gradient-to-t from-emerald-100/50 to-transparent rounded-full blur-3xl translate-y-1/2 -translate-x-1/2">
            </div>
        </div>

        <div class="container relative mx-auto px-4 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-5xl font-bold text-[var(--neutral-dark)] mb-6"
                style="font-family: var(--font-headline)" data-aos="fade-up">
                Our Gallery
            </h1>
            <p class="max-w-2xl mx-auto text-lg text-[var(--muted-foreground)] leading-relaxed" data-aos="fade-up"
                data-aos-delay="100">
                Glimpses of tranquility and healing. Immerse yourself in the visual journey of Chyavana, where nature
                meets tradition.
            </p>
        </div>
    </section>

    {{-- Gallery Grid --}}
    <section class="py-20 bg-white" x-data="galleryLightbox()">
        <div class="container mx-auto px-4 lg:px-8">

            @if($galleries->isEmpty())
                <div class="text-center py-20">
                    <p class="text-[var(--muted-foreground)] text-lg">Our gallery is being curated. Please check back soon.
                    </p>
                </div>
            @else
                {{-- Grouped Categories or Single Grid --}}
                @foreach($galleries as $category => $items)
                    <div class="mb-16 last:mb-0" data-aos="fade-up">
                        @if($category)
                            <h2 class="text-2xl font-bold text-[var(--neutral-dark)] mb-8 border-l-4 border-[var(--primary-green)] pl-4 flex items-center gap-2"
                                style="font-family: var(--font-headline)">
                                {{ $category }}
                            </h2>
                        @endif

                        <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6">
                            @foreach($items as $item)
                                <div class="break-inside-avoid relative group rounded-2xl overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-300 bg-gray-100"
                                    @click="openLightbox(@js($item))" data-aos="zoom-in"
                                    data-aos-delay="{{ $loop->iteration * 50 }}">

                                    @if($item->type === 'video')
                                        {{-- Video Thumbnail --}}
                                        <div class="relative aspect-video w-full">
                                            <img src="{{ $item->thumbnail ? asset('storage/' . $item->thumbnail) : 'https://via.placeholder.com/640x360?text=Video' }}"
                                                alt="{{ $item->title }}"
                                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700"
                                                loading="lazy">

                                            {{-- Play Button Overlay --}}
                                            <div
                                                class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/30 transition-colors duration-300">
                                                <div
                                                    class="w-12 h-12 flex items-center justify-center rounded-full bg-white/90 text-[var(--primary-green)] shadow-lg transform group-hover:scale-110 transition-transform duration-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-0.5" viewBox="0 0 24 24"
                                                        fill="currentColor">
                                                        <path d="M8 5v14l11-7z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        {{-- Image --}}
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                            class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700"
                                            loading="lazy">
                                    @endif

                                    {{-- Overlay Info --}}
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                                        <h3
                                            class="text-white font-bold text-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                            {{ $item->title }}
                                        </h3>
                                        @if($item->category && !$category)
                                            <span
                                                class="text-white/80 text-sm translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">
                                                {{ $item->category }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- Lightbox Modal --}}
        <div x-show="isOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[100] flex items-center justify-center bg-black/95 backdrop-blur-sm p-4"
            style="display: none;" @keydown.escape.window="closeLightbox()">

            {{-- Close Button --}}
            <button @click="closeLightbox()"
                class="absolute top-6 right-6 text-white/70 hover:text-white transition-colors z-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            {{-- Content --}}
            <div class="relative w-full max-w-5xl max-h-[90vh] flex flex-col items-center justify-center p-2"
                @click.outside="closeLightbox()">

                <template x-if="activeItem?.type === 'image'">
                    <img :src="'/storage/' + activeItem?.image" :alt="activeItem?.title"
                        class="max-w-full max-h-[85vh] object-contain rounded-lg shadow-2xl">
                </template>

                <template x-if="activeItem?.type === 'video'">
                    <div class="w-full aspect-video bg-black rounded-lg overflow-hidden shadow-2xl">
                        {{-- Simple Video logic: if video_url is YouTube/Vimeo, use iframe. Else check if file is
                        uploaded --}}
                        {{-- Note: For simplicity assuming URL mostly. If implementing sophisticated upload handling,
                        would need specific logic. --}}
                        <template x-if="isVideoUrl(activeItem?.video_url)">
                            <iframe :src="getEmbedUrl(activeItem?.video_url)" class="w-full h-full" frameborder="0"
                                allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                        </template>
                        <template x-if="!isVideoUrl(activeItem?.video_url)">
                            {{-- Fallback for direct files if we supported them (Gallery model has video_url field only
                            for now based on prompt, but assuming users puts file path possibly?) --}}
                            {{-- Prompt said: video_url (string, required if type=video). Resource Form has video URL
                            string field basically. --}}
                            <video controls autoplay class="w-full h-full">
                                <source :src="activeItem?.video_url" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </template>
                    </div>
                </template>

                {{-- Caption --}}
                <div class="mt-4 text-center">
                    <h3 class="text-xl font-medium text-white" x-text="activeItem?.title"></h3>
                </div>
            </div>
        </div>
    </section>

    {{-- Lightbox Logic --}}
    <script>
        function galleryLightbox() {
            return {
                isOpen: false,
                activeItem: null,

                openLightbox(item) {
                    this.activeItem = item;
                    this.isOpen = true;
                    document.body.style.overflow = 'hidden';
                },

                closeLightbox() {
                    this.isOpen = false;
                    this.activeItem = null;
                    document.body.style.overflow = '';
                },

                isVideoUrl(url) {
                    return url && (url.includes('youtube.com') || url.includes('youtu.be') || url.includes('vimeo.com'));
                },

                getEmbedUrl(url) {
                    if (!url) return '';
                    if (url.includes('youtube.com') || url.includes('youtu.be')) {
                        let videoId = url.split('v=')[1];
                        const ampersandPosition = videoId ? videoId.indexOf('&') : -1;
                        if (ampersandPosition !== -1) {
                            videoId = videoId.substring(0, ampersandPosition);
                        }
                        if (url.includes('youtu.be')) {
                            videoId = url.split('/').pop();
                        }
                        return `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
                    }
                    if (url.includes('vimeo.com')) {
                        const videoId = url.split('/').pop();
                        return `https://player.vimeo.com/video/${videoId}?autoplay=1`;
                    }
                    return url;
                }
            }
        }
    </script>
</x-layouts.app>