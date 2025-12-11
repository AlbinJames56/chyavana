<div class="border rounded-xl shadow-sm hover:shadow-xl transition overflow-hidden ">
    <div class="grid md:grid-cols-5">
        
        {{-- Image --}}
        <div class="md:col-span-2 relative h-64 md:h-full">
            <img src="{{ $healer['image'] }}" class="w-full h-full object-cover" />

            <div class="absolute bottom-4 left-4 right-4">
                <div class="bg-white/95 backdrop-blur-sm rounded-lg p-3 text-sm flex justify-between">
                    
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-users text-green-600"></i>
                        <span>{{ $healer['patients'] }}</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-award text-green-600"></i>
                        <span>{{ $healer['experience'] }}</span>
                    </div>

                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="md:col-span-3 p-8 space-y-6">

            <h3 class="text-2xl font-bold text-gray-800">{{ $healer['name'] }}</h3>

            <div class="flex items-center gap-2 text-sm text-gray-500">
                <i class="fa-solid fa-graduation-cap text-green-600"></i>
                {{ $healer['qualification'] }}
            </div>

            {{-- Specialties --}}
            <div>
                <h4 class="text-sm font-semibold text-gray-700 mb-2">Specialties:</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($healer['specialties'] as $spec)
                        <span class="border border-green-400/50 text-green-600 px-2 py-1 rounded text-xs">
                            {{ $spec }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- Approach --}}
            <div class="bg-gray-100 p-4 rounded-lg flex gap-3">
                <i class="fa-solid fa-heart text-green-600 text-lg"></i>
                <p class="text-sm italic text-gray-600">
                    "{{ $healer['approach'] }}"
                </p>
            </div>

            <a href="/contact" class="block w-full text-center bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg">
                Book with {{ explode(' ', $healer['name'])[1] }}
            </a>
        </div>

    </div>
</div>
