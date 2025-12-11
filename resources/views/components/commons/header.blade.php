{{-- resources/views/components/header.blade.php --}}
@php
    $navItems = [
        ['label' => 'Treatments', 'href' => 'treatments'],
        ['label' => 'Pain Relief', 'href' => '/pain-relief'],
        ['label' => 'Our Healers', 'href' => '/OurHealers'],
        ['label' => 'Our Story', 'href' => '/our-story'],
        ['label' => 'Blogs', 'href' => '/blogs'],
        ['label' => 'Contact', 'href' => '/contact'],
    ];
@endphp

<header
    x-data="{ isScrolled: false, isMobileMenuOpen: false }"
    x-init="() => {
        isScrolled = window.scrollY > 50;
        const onScroll = () => isScrolled = window.scrollY > 50;
        window.addEventListener('scroll', onScroll);
    }"
    :class="isScrolled
        ? 'bg-white/95 backdrop-blur-xl shadow-md py-3 border-b border-[var(--border)]'
        : 'bg-transparent py-5'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
>
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex items-center justify-between gap-4">

            {{-- Logo --}}
            <div
                class="flex items-center gap-3 cursor-pointer transform transition-transform duration-200 hover:scale-[1.02]"
            >
                <div
                    class="h-14 px-4  s  flex items-center justify-center   "
                >
                    <img
                        src="{{ asset('images/logo-title.png') }}"
                        alt="Chyavana Ayurveda Hospital"
                        class="h-10 w-auto object-contain"
                    />
                </div>
            </div>

            {{-- Desktop Navigation --}}
            <nav class="hidden lg:flex items-center gap-8">
                @foreach ($navItems as $item)
                    <a
                        href="{{ $item['href'] }}"
                        class="text-sm tracking-wide uppercase text-[var(--neutral-800)] hover:text-[var(--primary-sage)] transition-colors relative group"
                        style="font-family: var(--font-accent)"
                    >
                        {{ $item['label'] }}
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[var(--primary-sage)] transition-all group-hover:w-full"
                        ></span>
                    </a>
                @endforeach
            </nav>

            {{-- CTA Buttons (Desktop) --}}
            <div class="hidden lg:flex items-center gap-3">
                <a
                    href="tel:+91-0000000000"
                    class="inline-flex items-center px-4 py-2 text-sm rounded-full text-[var(--primary-deep)] hover:bg-[var(--neutral-100)] border border-transparent hover:border-[var(--border)] transition-all"
                    style="font-family: var(--font-accent)"
                >
                    {{-- Phone icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <path
                            d="M22 16.92V21a2 2 0 0 1-2.18 2A19.78 19.78 0 0 1 3 5.18 2 2 0 0 1 5 3h4.09a1 1 0 0 1 1 .75c.12.66.36 1.3.69 1.88a1 1 0 0 1-.24 1L9.91 9.91a14 14 0 0 0 4.18 4.18l1.28-1.28a1 1 0 0 1 1-.24c.58.33 1.22.57 1.88.69a1 1 0 0 1 .75 1V21z">
                        </path>
                    </svg>
                    Call Us
                </a>

                <a
                    href="#book"
                    class="inline-flex items-center px-4 py-2 text-sm rounded-full bg-[var(--primary-deep)] hover:bg-[var(--primary-sage)] text-black shadow-md shadow-[var(--primary-deep)]/20"
                    style="font-family: var(--font-accent)"
                >
                    {{-- Calendar icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    Book Consultation
                </a>
            </div>

            {{-- MOBILE: Book button + Hamburger --}}
            <div class="flex items-center gap-2 lg:hidden">
                {{-- Small Book button on mobile --}}
                <a
                    href="#book"
                    class="inline-flex items-center px-3 py-1.5 text-xs rounded-full bg-[var(--primary-deep)] hover:bg-[var(--primary-sage)] text-black shadow-sm"
                    style="font-family: var(--font-accent)"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1.5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    Book
                </a>

                {{-- Mobile Menu Button --}}
                <button
                    @click="isMobileMenuOpen = !isMobileMenuOpen"
                    class="p-2 rounded-full border border-[var(--border)] bg-white/70 text-[var(--primary-deep)] shadow-sm"
                    :aria-expanded="isMobileMenuOpen.toString()"
                    aria-controls="mobile-menu"
                >
                    <template x-if="!isMobileMenuOpen">
                        {{-- Menu icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            aria-hidden="true">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </template>
                    <template x-if="isMobileMenuOpen">
                        {{-- X icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            aria-hidden="true">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </template>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div
            id="mobile-menu"
            x-show="isMobileMenuOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="lg:hidden overflow-hidden"
            style="display: none;"
        >
            <nav class="flex flex-col gap-4 py-6 border-t border-[var(--border)] mt-4 bg-white/95 backdrop-blur-xl rounded-b-2xl">
                @foreach ($navItems as $item)
                    <a
                        href="{{ $item['href'] }}"
                        class="text-[var(--neutral-800)] hover:text-[var(--primary-sage)] transition-colors py-2 px-1"
                        style="font-family: var(--font-accent)"
                        @click="isMobileMenuOpen = false"
                    >
                        {{ $item['label'] }}
                    </a>
                @endforeach

                <div class="flex flex-col gap-3 pt-4">
                    <a
                        href="tel:+91-0000000000"
                        class="inline-flex items-center justify-center px-4 py-2 border rounded-full w-full"
                        style="font-family: var(--font-accent)"
                        @click="isMobileMenuOpen = false"
                    >
                        {{-- Phone icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            aria-hidden="true">
                            <path
                                d="M22 16.92V21a2 2 0 0 1-2.18 2A19.78 19.78 0 0 1 3 5.18 2 2 0 0 1 5 3h4.09a1 1 0 0 1 1 .75c.12.66.36 1.3.69 1.88a1 1 0 0 1-.24 1L9.91 9.91a14 14 0 0 0 4.18 4.18l1.28-1.28a1 1 0 0 1 1-.24c.58.33 1.22.57 1.88.69a1 1 0 0 1 .75 1V21z">
                            </path>
                        </svg>
                        Call Us
                    </a>

                    <a
                        href="#book"
                        class="inline-flex items-center justify-center px-4 py-2 rounded-full w-full text-white bg-[var(--primary-deep)] hover:bg-[var(--primary-sage)] shadow-md"
                        style="font-family: var(--font-accent)"
                        @click="isMobileMenuOpen = false"
                    >
                        {{-- Calendar icon --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            aria-hidden="true">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        Book Consultation
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>
