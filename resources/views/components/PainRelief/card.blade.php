@props(['tech'])

<article class="bg-white rounded-lg shadow p-4 hover:shadow-md transition">
    <a href="{{ route('pain-techniques.show', $tech->slug) }}" class="block">
        @if(!empty($tech->image))
            <div class="h-32 w-full overflow-hidden rounded mb-3">
                <img src="{{ asset('storage/' . $tech->image) }}" alt="{{ $tech->title }}"
                    class="w-full h-full object-cover">
            </div>
        @endif

        <h4 class="text-lg font-medium mb-2">{{ $tech->title }}</h4>
        <p class="text-sm text-gray-600">
            {{ \Illuminate\Support\Str::limit(strip_tags($tech->description ?: $tech->more_info ?: ''), 100) }}
        </p>
    </a>
</article>