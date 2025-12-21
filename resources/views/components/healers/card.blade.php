<div class="border rounded-xl shadow-sm hover:shadow-xl transition overflow-hidden ">
    <div class="grid md:grid-cols-5">

        {{-- Image --}}
        <div class="md:col-span-2 relative h-64 md:h-full">
            {{-- Use the image_url accessor (see model change below) --}}
            <img src="{{ $healer->image_url }}" alt="{{ $healer->name }}" class="w-full h-full object-cover" />

            <div class="absolute bottom-4 left-4 right-4">
                <div class="bg-white/95 backdrop-blur-sm rounded-lg p-3 text-sm flex justify-between">

                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-users text-green-600"></i>
                        <span>{{ $healer->patients ?? '—' }}</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-award text-green-600"></i>
                        <span>{{ $healer->experience ?? '—' }}</span>
                    </div>

                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="md:col-span-3 p-8 space-y-6">

            <h3 class="text-2xl font-bold text-gray-800">{{ $healer->name }}</h3>

            @if(!empty($healer->qualification))
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <i class="fa-solid fa-graduation-cap text-green-600"></i>
                    {{ $healer->qualification }}
                </div>
            @endif

            {{-- Specialties --}}
            @if(!empty($healer->specialties))
                <div>
                    <h4 class="text-sm font-semibold text-gray-700 mb-2">Specialties:</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($healer->specialties ?? [] as $spec)
                            <span class="border border-green-400/50 text-green-600 px-2 py-1 rounded text-xs">
                                {{ $spec }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Approach: show only when it has actual text after stripping HTML --}}
            @php
$approachPlain = trim(strip_tags($healer->approach ?? ''));
            @endphp

            @if(!empty($approachPlain))
                <div class="bg-gray-100 p-4 rounded-lg flex gap-3">
                    <i class="fa-solid fa-heart text-green-600 text-lg mt-1"></i>

                    <div class="text-sm italic text-gray-600 prose prose-sm max-w-none">
                        {!! $healer->approach !!}
                    </div>
                </div>
            @endif

            <button type="button" onclick="window.openBookingModal()"
                class="px-6 py-3 bg-[var(--primary-green)] text-white rounded-xl shadow hover:bg-[var(--primary-green)]/90 transition flex items-center gap-2">
                <i class="fa-solid fa-calendar-check"></i> Book Consultation
            </button>
        </div>

    </div>
</div>