{{-- resources/views/components/header.blade.php --}}
@php
    $navItems = [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'Treatments', 'href' => '/treatments'],
        ['label' => 'Pain Relief', 'href' => '/pain-relief'],
        ['label' => 'Our Healers', 'href' => '/OurHealers'],
        ['label' => 'Our Story', 'href' => '/our-story'],
        ['label' => 'Blogs', 'href' => '/blogs'],
        ['label' => 'Contact', 'href' => '/contact'],
    ];
@endphp

<header x-data="{ 
        isScrolled: false, 
        isMobileMenuOpen: false,
        activeNav: window.location.pathname,
        isHoveringLogo: false
    }" x-init="() => {
        isScrolled = window.scrollY > 20;
        const onScroll = () => isScrolled = window.scrollY > 20;
        window.addEventListener('scroll', onScroll);
        
        window.addEventListener('popstate', () => {
            activeNav = window.location.pathname;
        });
    }" :class="isScrolled 
        ? '  backdrop-blur-lg shadow-lg py-3  border-[var(--border)]' 
        : '  backdrop-blur-sm py-5'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-out">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex items-center justify-between gap-6">

            {{-- Logo with enhanced hover effect --}}
            <a href="/" @mouseenter="isHoveringLogo = true" @mouseleave="isHoveringLogo = false"
                class="group relative flex items-center gap-3 transition-all duration-300">
                <div class="relative">
                    {{-- Logo background with pulse animation on hover --}}
                    <div :class="isHoveringLogo ? 'opacity-100 scale-110' : 'opacity-0 scale-100'"
                        class="absolute -inset-2 bg-gradient-to-r from-[var(--primary-green)]/10 to-emerald-100 rounded-2xl transition-all duration-500">
                    </div>

                    {{-- Logo glow effect --}}
                    <div :class="isHoveringLogo ? 'opacity-100' : 'opacity-0'"
                        class="absolute -inset-1 bg-gradient-to-r from-[var(--primary-green)]/20 to-transparent blur-xl transition-opacity duration-500 rounded-2xl">
                    </div>

                    <div class="relative overflow-hidden rounded-2xl p-1">
                        <img src="{{ asset('images/logo-title.png') }}" alt="Chyavana Ayurveda Hospital"
                            class="relative h-12 w-auto object-contain drop-shadow-sm transition-transform duration-300 group-hover:scale-105" />
                    </div>
                </div>

            </a>
            <div class="flex gap-6">


                {{-- Desktop Navigation with enhanced green theme --}}
                <nav
                    class="hidden lg:flex items-center gap-1 bg-white/80 backdrop-blur-sm rounded-full px-3 py-1.5 border border-[var(--border)] shadow-sm">
                    @foreach ($navItems as $item)
                        <a href="{{ $item['href'] }}"
                            :class="activeNav === '{{ $item['href'] }}' 
                                        ? 'text-[var(--primary-green)] bg-emerald-50/80 border border-emerald-100 shadow-sm' 
                                        : 'text-[var(--neutral-dark)] hover:text-[var(--primary-green)] hover:bg-emerald-50/50 border border-transparent'"
                            class="group relative px-3 py-2.5 text-sm font-medium tracking-wide uppercase rounded-full transition-all duration-300"
                            style="font-family: var(--font-headline); letter-spacing: 0.5px;">
                            <span class="relative z-10">{{ $item['label'] }}</span>



                            {{-- Hover glow effect --}}
                            <span
                                class="absolute inset-0 rounded-full bg-gradient-to-r from-[var(--primary-green)]/0 via-[var(--primary-green)]/5 to-[var(--primary-green)]/0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
                        </a>
                    @endforeach
                </nav>

                {{-- CTA Buttons (Desktop) with green theme --}}
                <div class="hidden lg:flex items-center gap-3">
                    <a href="tel:+91-0000000000"
                        class="group relative inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-full text-[var(--primary-green)] hover:text-white border border-emerald-200 hover:border-[var(--primary-green)] bg-white hover:bg-gradient-to-r hover:from-[var(--primary-green)] hover:to-emerald-600 transition-all duration-300 active:scale-95 shadow-sm"
                        style="font-family: var(--font-headline)">
                        {{-- Animated ring on hover --}}
                        <span
                            class="absolute inset-0 rounded-full border-2 border-transparent group-hover:border-[var(--primary-green)]/30 group-hover:animate-ping-slow transition-all duration-300"></span>

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 mr-2 text-emerald-500 group-hover:text-white transition-colors duration-300"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path
                                d="M22 16.92V21a2 2 0 0 1-2.18 2A19.78 19.78 0 0 1 3 5.18 2 2 0 0 1 5 3h4.09a1 1 0 0 1 1 .75c.12.66.36 1.3.69 1.88a1 1 0 0 1-.24 1L9.91 9.91a14 14 0 0 0 4.18 4.18l1.28-1.28a1 1 0 0 1 1-.24c.58.33 1.22.57 1.88.69a1 1 0 0 1 .75 1V21z">
                            </path>
                        </svg>
                        Call Us
                    </a>

                    <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-booking'))"
                        class="group relative inline-flex items-center px-6 py-3 text-sm font-medium rounded-full bg-gradient-to-r from-[var(--primary-green)] to-emerald-600 hover:from-emerald-500 hover:to-emerald-700 text-white shadow-lg shadow-emerald-500/30 hover:shadow-emerald-600/40 transition-all duration-300 active:scale-95"
                        style="font-family: var(--font-headline)">
                        {{-- Shine effect on hover --}}
                        <span class="absolute inset-0 rounded-full overflow-hidden">
                            <span
                                class="absolute -inset-x-10 -inset-y-5 bg-gradient-to-r from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 group-hover:animate-shine transition-opacity duration-700"></span>
                        </span>

                        {{-- Ripple effect --}}
                        <span
                            class="absolute inset-0 rounded-full bg-white/0 group-hover:bg-white/10 transition-colors duration-300"></span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="relative z-10 w-5 h-5 mr-2" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" aria-hidden="true">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <span class="relative z-10">Book Consultation</span>
                    </button>
                </div>
            </div>
            {{-- MOBILE: Book button + Hamburger --}}
            <div class="flex items-center gap-3 lg:hidden">
                {{-- Small Book button on mobile with enhanced hover --}}
                <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-booking'))"
                    class="group relative inline-flex items-center px-4 py-2.5 text-xs font-medium rounded-full bg-gradient-to-r from-[var(--primary-green)] to-emerald-600 text-white shadow-md active:scale-95 transition-all duration-200"
                    style="font-family: var(--font-headline)">
                    <span
                        class="absolute inset-0 rounded-full bg-white/0 group-active:bg-white/20 transition-colors duration-150"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="relative z-10 w-4 h-4 mr-1.5" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span class="relative z-10">Book Now</span>
                </button>

                {{-- Mobile Menu Button with green theme animation --}}
                <button @click="isMobileMenuOpen = !isMobileMenuOpen"
                    :class="isMobileMenuOpen 
                        ? 'bg-emerald-50 border-emerald-200 text-[var(--primary-green)]' 
                        : 'bg-white border-[var(--border)] text-[var(--neutral-dark)] hover:text-[var(--primary-green)]'"
                    class="group p-2.5 rounded-full border shadow-sm transition-all duration-300 active:scale-95"
                    :aria-expanded="isMobileMenuOpen.toString()" aria-controls="mobile-menu">
                    <div class="relative w-6 h-5">
                        {{-- Top bar --}}
                        <span :class="isMobileMenuOpen 
                                ? 'top-1/2 -translate-y-1/2 rotate-45 bg-[var(--primary-green)]' 
                                : 'top-0 bg-current group-hover:bg-[var(--primary-green)]'"
                            class="absolute left-0 w-6 h-0.5 rounded-full transition-all duration-300"></span>
                        {{-- Middle bar --}}
                        <span :class="isMobileMenuOpen 
                                ? 'opacity-0' 
                                : 'opacity-100 bg-current group-hover:bg-[var(--primary-green)]'"
                            class="absolute left-0 top-1/2 -translate-y-1/2 w-6 h-0.5 rounded-full transition-all duration-300"></span>
                        {{-- Bottom bar --}}
                        <span :class="isMobileMenuOpen 
                                ? 'top-1/2 -translate-y-1/2 -rotate-45 bg-[var(--primary-green)]' 
                                : 'top-full bg-current group-hover:bg-[var(--primary-green)]'"
                            class="absolute left-0 w-6 h-0.5 rounded-full transition-all duration-300"></span>
                    </div>
                </button>
            </div>
        </div>

        {{-- Mobile Menu with green theme --}}
        <div id="mobile-menu" x-show="isMobileMenuOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4" class="lg:hidden overflow-hidden" style="display: none;">
            <div class="py-5 mt-3 bg-white/95 backdrop-blur-xl rounded-2xl border border-[var(--border)] shadow-xl">
                <nav class="flex flex-col gap-1 px-3">
                    @foreach ($navItems as $item)
                        <a href="{{ $item['href'] }}"
                            :class="activeNav === '{{ $item['href'] }}' 
                                            ? 'text-[var(--primary-green)] bg-emerald-50 border-emerald-100' 
                                            : 'text-[var(--neutral-dark)] hover:text-[var(--primary-green)] hover:bg-emerald-50/50 border-transparent'"
                            class="group flex items-center justify-between px-4 py-3.5 rounded-xl border transition-all duration-200 active:scale-[0.98]"
                            style="font-family: var(--font-headline)" @click="isMobileMenuOpen = false">
                            <span class="font-medium tracking-wide uppercase text-sm">{{ $item['label'] }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 text-emerald-400 group-hover:text-[var(--primary-green)] transition-colors duration-200"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @endforeach
                </nav>

                <div class="flex flex-col gap-3 px-3 mt-6 pt-6 border-t border-[var(--border)]">
                    <a href="tel:+91-0000000000"
                        class="group flex items-center gap-3 px-4 py-3.5 rounded-xl border border-emerald-200 hover:border-[var(--primary-green)] hover:bg-gradient-to-r hover:from-emerald-50 hover:to-white transition-all duration-200 active:scale-[0.98]"
                        style="font-family: var(--font-headline)" @click="isMobileMenuOpen = false">
                        <div
                            class="p-2 rounded-full bg-emerald-100 group-hover:bg-emerald-200 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[var(--primary-green)]"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path
                                    d="M22 16.92V21a2 2 0 0 1-2.18 2A19.78 19.78 0 0 1 3 5.18 2 2 0 0 1 5 3h4.09a1 1 0 0 1 1 .75c.12.66.36 1.3.69 1.88a1 1 0 0 1-.24 1L9.91 9.91a14 14 0 0 0 4.18 4.18l1.28-1.28a1 1 0 0 1 1-.24c.58.33 1.22.57 1.88.69a1 1 0 0 1 .75 1V21z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1 text-left">
                            <div
                                class="text-xs text-[var(--muted-foreground)] group-hover:text-[var(--primary-green)] transition-colors duration-200">
                                Call us now</div>
                            <div
                                class="font-medium text-[var(--neutral-dark)] group-hover:text-[var(--primary-green)] transition-colors duration-200">
                                +91-0000000000</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 text-emerald-400 opacity-0 group-hover:opacity-100 transition-opacity duration-200"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-booking'))"
                        class="group flex items-center gap-3 px-4 py-3.5 rounded-xl bg-gradient-to-r from-[var(--primary-green)] to-emerald-600 hover:from-emerald-500 hover:to-emerald-700 text-white shadow-md transition-all duration-200 active:scale-[0.98]"
                        style="font-family: var(--font-headline)" @click="isMobileMenuOpen = false">
                        <div
                            class="p-2 rounded-full bg-white/20 group-hover:bg-white/30 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                aria-hidden="true">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <div class="flex-1 text-left">
                            <div class="text-xs text-white/80 group-hover:text-white transition-colors duration-200">
                                Book Appointment</div>
                            <div class="font-medium">Consultation</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 text-white/60 opacity-0 group-hover:opacity-100 transition-opacity duration-200"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

{{-- Add custom animations for the header --}}
<style>
    @keyframes ping-slow {
        0% {
            transform: scale(1);
            opacity: 1;
        }

        75%,
        100% {
            transform: scale(1.5);
            opacity: 0;
        }
    }

    @keyframes shine {
        0% {
            transform: translateX(-100%) rotate(45deg);
        }

        100% {
            transform: translateX(100%) rotate(45deg);
        }
    }

    .animate-ping-slow {
        animation: ping-slow 2s cubic-bezier(0, 0, 0.2, 1) infinite;
    }

    .animate-shine {
        animation: shine 2s ease-in-out infinite;
    }
</style>