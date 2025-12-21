@extends('components.layouts.app')

@section('content')

{{-- Hero Section --}}
<section class="relative py-32 mt-20">
    {{-- Background Image --}}
    <div class="absolute inset-0">
        <img src="/images/bg-4.jpg"
             class="w-full h-full object-cover opacity-40">
    </div>

    {{-- Dark Overlay --}}
    <!-- <div class="absolute inset-0 bg-gradient-to-b from-black/30 to-black/60"></div> -->

    <div class="relative container mx-auto text-center max-w-3xl px-6 text-white space-y-8">

    <span class="px-4 py-1.5 bg-green-50 text-green-700 border border-green-200 rounded-full 
                     text-xs font-semibold tracking-wider uppercase">
            Expert Ayurvedic Practitioners
        </span>

        <h1 class="mt-6 text-5xl md:text-6xl font-bold text-gray-900 leading-tight">
            Meet Our Healing Team
        </h1>

        <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
            A dedicated group of certified Ayurvedic doctors committed to restoring your 
            natural balance through personalized holistic care.
        </p>

        <div class="mt-10 w-24 h-1 bg-green-500 mx-auto rounded-full"></div>

    </div>
</section>



{{-- Healers Grid --}}
<section class="py-20">
    <div class="container mx-auto px-8 md:px-14 lg:px-28 grid lg:grid-cols-2 gap-10">

        @foreach($healers as $healer)
            <x-healers.card :healer="$healer" />
        @endforeach

    </div>
</section>

{{-- Why Section --}}
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-8 md:px-14 lg:px-28">
        
        <h2 class="text-3xl text-center font-bold text-gray-900 mb-14">
            What Sets Our Healers Apart
        </h2>

        <div class="grid md:grid-cols-3 gap-8">
            <x-healers.why-card icon="fa-solid fa-graduation-cap" title="Certified Experts">
                All practitioners hold advanced degrees (BAMS, MD)…
            </x-healers.why-card>

            <x-healers.why-card icon="fa-solid fa-heart" title="Patient-Centered Care">
                Every treatment plan is personalized to your lifestyle…
            </x-healers.why-card>

            <x-healers.why-card icon="fa-solid fa-book-open" title="Continuous Learning">
                We stay updated with the latest Ayurvedic research…
            </x-healers.why-card>
        </div> 
    </div>
</section>

{{-- CTA --}}
<section class="py-20 text-center">
    <h2 class="text-3xl font-bold text-gray-900 mb-4">
        Ready to Start Your Healing Journey?
    </h2>

    <p class="text-gray-600 mb-8 max-w-xl mx-auto">
        Choose a healer that resonates with your needs…
    </p>

    <a href="/contact" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg text-lg">
        Book Consultation <i class="fa-solid fa-arrow-right ml-2"></i>
    </a>
</section>

@endsection
