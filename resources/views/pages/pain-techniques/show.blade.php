@extends('components.layouts.app')

@section('content')
    <section class="my-20">

        <div class="container mx-auto px-4 max-w-7xl pt-10">

            {{-- Breadcrumbs --}}
            <nav class="text-sm text-gray-600 mb-8">
                <a href="{{ url('/') }}" class="hover:underline">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ url('/pain-relief') }}" class="hover:underline">Pain Techniques</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900">{{ $technique->title }}</span>
            </nav>

            {{-- HERO IMAGE --}}
            <div class="relative w-full h-64 md:h-80 lg:h-96 rounded-xl overflow-hidden shadow-sm mb-10">
                @if($technique->image)
                    <img src="{{ asset('storage/' . $technique->image) }}" 
                         alt="{{ $technique->title }}"
                         class="w-full h-full object-cover">
                @endif

                <div class="absolute bottom-0 left-0 w-full px-6 py-6 bg-gradient-to-t from-black/70 to-transparent">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-white drop-shadow-xl">
                        {{ $technique->title }}
                    </h1>
                </div>
            </div>

            {{-- CONTENT + ASIDE WRAPPER --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                {{-- LEFT: MAIN CONTENT --}}
                <div class="md:col-span-2 space-y-14 pr-2">

                    {{-- Overview --}}
                    <section class="prose max-w-none leading-relaxed">
                        <h2 class="text-2xl font-semibold mb-4">Overview</h2>
                        <div class="mt-2">
                            {!! $technique->description !!}
                        </div>
                    </section>

                    {{-- Details & Therapies --}}
                    <section class="prose max-w-none leading-relaxed">
                        <h2 class="text-2xl font-semibold mb-4">Details & Therapies</h2>
                        <div class="mt-2">
                            {!! $technique->more_info !!}
                        </div>
                    </section>

                </div>

                {{-- RIGHT: STICKY SCROLLING SIDEBAR --}}
                <aside class="relative">
                    <div class="sticky top-24 max-h-[80vh] overflow-y-auto space-y-8 pr-2 custom-scrollbar">

                        {{-- Quick Facts --}}
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-5 shadow-sm">
                            <h3 class="text-lg font-semibold mb-4">Quick Facts</h3>

                            @if($technique->duration)
                                <div class="mb-5">
                                    <div class="text-sm text-gray-500">Duration</div>
                                    <div class="text-md font-medium">{{ $technique->duration }}</div>
                                </div>
                            @endif

                            @if(!empty($technique->benefits))
                                <div class="mb-5">
                                    <div class="text-sm text-gray-500 mb-2">Benefits</div>
                                    <ul class="list-disc ml-5 text-sm text-gray-700 space-y-1">
                                        @foreach($technique->benefits as $b)
                                            <li>{{ $b['value'] ?? $b }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mt-5 space-y-3">
                            <button type="button" onclick="window.dispatchEvent(new CustomEvent('open-booking'))"
                                   class="block w-full text-center px-4 py-2 rounded-md bg-green-600 text-white font-medium hover:bg-green-700">
                                    Book Consultation
</button>

                                <a href="tel:+91-0000000000"
                                   class="block w-full text-center px-4 py-2 rounded-md border border-gray-300 text-gray-600 hover:bg-gray-100">
                                    Request Info
                                </a>
                            </div>
                        </div>

                        {{-- Recommended Small Cards --}}
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Recommended Techniques</h3>

                            <div class="space-y-4">
                                @foreach($related as $r)
                                    <a href="{{ route('pain-techniques.show', $r->slug) }}"
                                       class="block bg-white border rounded-lg shadow-sm overflow-hidden hover:shadow-md transition duration-200">

                                        @if($r->image)
                                            <img src="{{ asset('storage/' . $r->image) }}"
                                                 class="h-24 w-full object-cover">
                                        @endif

                                        <div class="p-3">
                                            <h4 class="text-sm font-semibold">{{ $r->title }}</h4>
                                            <p class="text-xs text-gray-600 mt-1">
                                                {{ Str::limit(strip_tags($r->description ?? $r->more_info), 80) }}
                                            </p>
                                        </div>

                                    </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </aside>

            </div>


        </div>

    </section>

    {{-- Custom Scrollbar Styling --}}
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #d1d5db; /* gray-300 */
            border-radius: 4px;
        }
    </style>

@endsection
