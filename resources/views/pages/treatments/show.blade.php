@extends('components.layouts.app')

@push('meta')
    <title>{{ $treatment->seo_title ?? $treatment->title }}</title>
    <meta name="description" content="{{ $treatment->seo_description ?? Str::limit(strip_tags($treatment->content_section_1 ?? $treatment->short_description ?? ''), 160) }}">
    @if(!empty($treatment->meta_keywords) && is_array($treatment->meta_keywords))
        <meta name="keywords" content="{{ implode(',', $treatment->meta_keywords) }}">
    @endif
    @if(!empty($treatment->canonical_url))
        <link rel="canonical" href="{{ $treatment->canonical_url }}">
    @endif
    @if(!empty($treatment->meta_robots))
        <meta name="robots" content="{{ $treatment->meta_robots }}">
    @endif
@endpush

@section('content')
<section class="bg-gradient-to-b from-white to-[var(--neutral-light)]">
    <div class="container mx-auto px-4 lg:px-8 pt-12 pb-16 mt-12">
        {{-- HERO --}}
        <div class="bg-[var(--neutral-dark)]/5 rounded-3xl overflow-hidden shadow-sm">
            <div class="relative grid grid-cols-1 lg:grid-cols-5 gap-6 items-center">
                {{-- Left: text --}}
                <div class="lg:col-span-3 p-6 lg:p-10">
                    <nav class="text-sm mb-3" aria-label="Breadcrumb">
                        <a href="{{ url('/') }}" class="text-[var(--muted-foreground)] hover:underline">Home</a>
                        <span class="px-2 text-[var(--muted-foreground)]">/</span>
                        <a href="{{ route('treatment.programs') }}" class="text-[var(--muted-foreground)] hover:underline">Treatments</a>
                        <span class="px-2 text-[var(--muted-foreground)]">/</span>
                        <span class="font-semibold text-[var(--neutral-dark)]">{{ Str::limit($treatment->title, 60) }}</span>
                    </nav>

                    <h1 class="text-3xl lg:text-4xl font-extrabold leading-tight text-[var(--neutral-dark)]" style="font-family:var(--font-headline)">
                        {{ $treatment->title }}
                    </h1>

                    <p class="mt-4 max-w-3xl text-[var(--muted-foreground)]" style="font-family:var(--font-body)">
                        {{ $treatment->short_description }}
                    </p>

                    <div class="mt-6 flex flex-wrap items-center gap-3">
                        @if($treatment->category)
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[var(--neutral-light)] text-sm font-medium">
                                {{-- category icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[var(--primary-green)]" viewBox="0 0 20 20" fill="currentColor"><path d="M2 5a2 2 0 012-2h4v2H4v10h6v2H4a2 2 0 01-2-2V5z"/><path d="M12 7h4a2 2 0 012 2v6a2 2 0 01-2 2h-4v-2h4v-6h-4V7z"/></svg>
                                <span>{{ ucfirst($treatment->category) }}</span>
                            </span>
                        @endif

                        @if($treatment->duration)
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border text-sm text-[var(--muted-foreground)]">
                                ⏳ {{ $treatment->duration }}
                            </span>
                        @endif

                        @if($treatment->effectiveness)
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white border text-sm text-[var(--muted-foreground)]">
                                ⭐ {{ $treatment->effectiveness }}% effective
                            </span>
                        @endif
                    </div> 
                     
                </div>

                {{-- Right: hero image --}}
                <div class="relative lg:col-span-2 min-h-[220px] h-56 lg:h-full overflow-hidden">
                    @if($treatment->image_url)
                        <img src="{{ $treatment->image_url }}" alt="{{ $treatment->image_alt ?? $treatment->title }}"
                             class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                    @else
                        <div class="w-full h-full bg-[var(--neutral-light)] flex items-center justify-center text-[var(--muted-foreground)]">
                            No Image
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/25 to-transparent pointer-events-none"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- MAIN GRID: content + sidebar --}}
    <div class="container mx-auto px-4 lg:px-8 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            {{-- Left: main article --}}
            <div class="lg:col-span-8 space-y-8">
                {{-- Quick includes bar --}}
                @php
                    $includes = collect($treatment->includes ?? [])->map(function($it){
                        if (is_string($it)) return $it;
                        if (is_array($it) && array_key_exists('value', $it)) return (string)$it['value'];
                        if (is_object($it) && isset($it->value)) return (string)$it->value;
                        if (is_scalar($it)) return (string)$it;
                        return null;
                    })->filter()->values()->all();
                @endphp

                @if(count($includes))
                    <div class="flex flex-wrap gap-3">
                        @foreach($includes as $inc)
                            <span class="inline-flex items-center gap-2 px-3 py-2 rounded-xl bg-white border text-sm shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[var(--primary-green)]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                <span class="text-[var(--neutral-dark)]">{{ $inc }}</span>
                            </span>
                        @endforeach
                    </div>
                @endif

                {{-- Section cards (each content section in separate card) --}}
                <div id="content-sections" x-data="scrollSpy()" x-init="init()" class="space-y-8">
                    {{-- Section 1 --}}
                    @if($treatment->content_section_title_1 || $treatment->content_section_1)
                        <section id="section-1" class="bg-white rounded-2xl p-6 lg:p-8 shadow-sm border">
                            <header class="flex items-start justify-between gap-4">
                                <div>
                                    @if($treatment->content_section_title_1)
                                        <h2 class="text-2xl font-semibold text-[var(--neutral-dark)]">{{ $treatment->content_section_title_1 }}</h2>
                                    @else
                                        <h2 class="text-2xl font-semibold text-[var(--neutral-dark)]">Overview</h2>
                                    @endif
                                    <p class="mt-2 text-sm text-[var(--muted-foreground)]">What to expect from this section</p>
                                </div>
                                <div class="hidden sm:flex items-center gap-2 text-sm text-[var(--muted-foreground)]">
                                    <span class="px-3 py-1 rounded-full bg-[var(--neutral-light)]">Section 1</span>
                                </div>
                            </header>

                            <div class="mt-4 prose max-w-none text-[var(--neutral-dark)]">
                                {!! $treatment->content_section_1 !!}
                            </div>
                        </section>
                    @endif

                    {{-- Section 2 --}}
                    @if($treatment->content_section_title_2 || $treatment->content_section_2)
                        <section id="section-2" class="bg-white rounded-2xl p-6 lg:p-8 shadow-sm border">
                            <header class="flex items-start justify-between gap-4">
                                <div>
                                    @if($treatment->content_section_title_2)
                                        <h2 class="text-2xl font-semibold text-[var(--neutral-dark)]">{{ $treatment->content_section_title_2 }}</h2>
                                    @else
                                        <h2 class="text-2xl font-semibold text-[var(--neutral-dark)]">Therapy Details</h2>
                                    @endif
                                    <p class="mt-2 text-sm text-[var(--muted-foreground)]">Techniques, duration, and evidence</p>
                                </div>
                                <div class="hidden sm:flex items-center gap-2 text-sm text-[var(--muted-foreground)]">
                                    <span class="px-3 py-1 rounded-full bg-[var(--neutral-light)]">Section 2</span>
                                </div>
                            </header>

                            <div class="mt-4 prose max-w-none text-[var(--neutral-dark)]">
                                {!! $treatment->content_section_2 !!}
                            </div>
                        </section>
                    @endif

                    {{-- Section 3 --}}
                    @if($treatment->content_section_title_3 || $treatment->content_section_3)
                        <section id="section-3" class="bg-white rounded-2xl p-6 lg:p-8 shadow-sm border">
                            <header class="flex items-start justify-between gap-4">
                                <div>
                                    @if($treatment->content_section_title_3)
                                        <h2 class="text-2xl font-semibold text-[var(--neutral-dark)]">{{ $treatment->content_section_title_3 }}</h2>
                                    @else
                                        <h2 class="text-2xl font-semibold text-[var(--neutral-dark)]">Aftercare & Results</h2>
                                    @endif
                                    <p class="mt-2 text-sm text-[var(--muted-foreground)]">Recovery, follow-ups and outcomes</p>
                                </div>
                                <div class="hidden sm:flex items-center gap-2 text-sm text-[var(--muted-foreground)]">
                                    <span class="px-3 py-1 rounded-full bg-[var(--neutral-light)]">Section 3</span>
                                </div>
                            </header>

                            <div class="mt-4 prose max-w-none text-[var(--neutral-dark)]">
                                {!! $treatment->content_section_3 !!}
                            </div>
                        </section>
                    @endif

                    
                </div>
            </div>

            {{-- Right: sticky sidebar with contents + CTA --}}
            <aside class="lg:col-span-4">
                <div class="sticky top-24 space-y-6">
                    {{-- Contents TOC --}}
                    <div class="bg-white rounded-xl p-4 shadow-sm border">
                        <h4 class="font-semibold">Contents</h4>
                        <nav class="mt-3" x-data="{ active:'#section-1' }" aria-label="Table of contents">
                            <ul class="space-y-2 text-sm">
                                @if($treatment->content_section_1 || $treatment->content_section_title_1)
                                    <li>
                                        <a href="#section-1" @click.prevent="document.querySelector('#section-1').scrollIntoView({behavior:'smooth', block:'start'}); active = '#section-1'"
                                           :class="active === '#section-1' ? 'font-semibold text-[var(--primary-green)]' : 'text-[var(--muted-foreground)] hover:text-[var(--neutral-dark)]'">
                                            {{ $treatment->content_section_title_1 ?? 'Overview' }}
                                        </a>
                                    </li>
                                @endif
                                @if($treatment->content_section_2 || $treatment->content_section_title_2)
                                    <li>
                                        <a href="#section-2" @click.prevent="document.querySelector('#section-2').scrollIntoView({behavior:'smooth', block:'start'}); active = '#section-2'"
                                           :class="active === '#section-2' ? 'font-semibold text-[var(--primary-green)]' : 'text-[var(--muted-foreground)] hover:text-[var(--neutral-dark)]'">
                                            {{ $treatment->content_section_title_2 ?? 'Details' }}
                                        </a>
                                    </li>
                                @endif
                                @if($treatment->content_section_3 || $treatment->content_section_title_3)
                                    <li>
                                        <a href="#section-3" @click.prevent="document.querySelector('#section-3').scrollIntoView({behavior:'smooth', block:'start'}); active = '#section-3'"
                                           :class="active === '#section-3' ? 'font-semibold text-[var(--primary-green)]' : 'text-[var(--muted-foreground)] hover:text-[var(--neutral-dark)]'">
                                            {{ $treatment->content_section_title_3 ?? 'Aftercare' }}
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>

                    {{-- Quick facts & CTA --}}
                    <div class="bg-white rounded-xl p-4 shadow-sm border">
                        <div class="flex items-center justify-between">
                            <div>
                                <h5 class="font-semibold">Quick Facts</h5>
                                <p class="text-sm text-[var(--muted-foreground)]">At-a-glance details</p>
                            </div>
                            <div class="text-[var(--primary-green)] font-bold">
                                {{ $treatment->effectiveness_text ?? ($treatment->effectiveness ? $treatment->effectiveness.'%' : '') }}
                            </div>
                        </div>

                        <dl class="mt-4 text-sm space-y-3">
                            @if($treatment->duration)
                                <div class="flex justify-between">
                                    <dt class="text-[var(--muted-foreground)]">Duration</dt>
                                    <dd>{{ $treatment->duration }}</dd>
                                </div>
                            @endif
                            @if($treatment->category)
                                <div class="flex justify-between">
                                    <dt class="text-[var(--muted-foreground)]">Category</dt>
                                    <dd>{{ ucfirst($treatment->category) }}</dd>
                                </div>
                            @endif
                            <div class="flex justify-between">
                                <dt class="text-[var(--muted-foreground)]">Availability</dt>
                                <dd>{{ $treatment->status === 'published' ? 'Open' : 'Private' }}</dd>
                            </div>
                        </dl>

                        <div class="mt-4">
                           <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-booking'))"class="block text-center px-4 py-3 rounded-md bg-[var(--primary-green)] text-white font-semibold">Book Consultation</button>
                        </div>
                    </div>

                    {{-- Contact --}}
                    <div class="bg-white rounded-xl p-4 shadow-sm border">
                        <h5 class="font-semibold">Need help deciding?</h5>
                        <p class="mt-2 text-sm text-[var(--muted-foreground)]">Our practitioners will guide you through the best plan.</p>
                        <div class="mt-3 grid gap-2">
                            <a href="mailto:info@example.com" class="block text-center px-4 py-2 rounded-md border">Email us</a>
                            <a href="tel:+911234567890" class="block text-center px-4 py-2 rounded-md bg-[var(--primary-green)] text-white">Call us</a>
                        </div>
                    </div>

                    {{-- Related programs placeholder --}}
                    
                </div>
            </aside>
        </div>
       {{-- Related / You may also like (bottom of content) --}}
@if(!empty($related) && $related->count())
    <section class="mt-8">
        <h3 class="text-2xl font-semibold mb-4">You may also like</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($related as $r)
                <x-cards.treatment-card
                    :title="$r->title"
                    :category="$r->category"
                    :duration="$r->duration"
                    :effectiveness="$r->effectiveness_text ?? ($r->effectiveness ? $r->effectiveness . '%' : '')"
                     
                    :includes="$r->includes ?? []"
                    :image="$r->image_url"
                    :icon="$r->icon"
                    :url="route('treatment.show', $r->slug)"
                />
            @endforeach
        </div>
    </section>
@endif

    </div>
</section>

{{-- Alpine scroll spy helper --}}
@push('scripts')
<script>
    function scrollSpy(){
        return {
            init(){
                const sections = ['#section-1','#section-2','#section-3'].map(s => document.querySelector(s)).filter(Boolean);
                const options = { root: null, rootMargin: '0px', threshold: 0.3 };
                const obs = new IntersectionObserver((entries)=>{
                    entries.forEach(e=>{
                        if(!e.isIntersecting) return;
                        // dispatch custom event to update TOC highlight
                        document.querySelectorAll('[x-data]').forEach(el=>{
                            if(el.__x){ // only Alpine-root elements
                                // broadcast active via a global attribute fallback
                            }
                        });
                        // set active link by toggling hash (keeps it simple)
                        history.replaceState(null, null, '#'+e.target.id);
                        // also set a data attribute for local TOC usage
                        document.documentElement.dataset.activeSection = '#'+e.target.id;
                    });
                }, options);

                sections.forEach(s => obs.observe(s));
            }
        }
    }
</script>
@endpush

@endsection
