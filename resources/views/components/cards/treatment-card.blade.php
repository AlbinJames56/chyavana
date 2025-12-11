@props([
    'title' => '',
    'description' => '',
    'image' => null,
    'icon' => null, 
    'includes' => [],
    'duration' => '',
    'effectiveness' => '',
    'category' => '',
])

<div {{ $attributes->merge([
    'class' => '
        group relative overflow-hidden rounded-3xl bg-white 
        shadow-md hover:shadow-2xl transition-all duration-500
        border border-[var(--border)]
    '
]) }}>

    {{-- Image Section --}}
    <div class="relative h-56 overflow-hidden">
        <img src="{{ $image }}"
             alt="{{ $title }}"
             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

        {{-- Floating Category Badge --}}
        <span class="absolute top-4 left-4 px-4 py-1.5 text-xs rounded-full 
                     bg-white/80 backdrop-blur-lg text-[var(--primary-green)]
                     font-semibold shadow-sm">
            {{ ucfirst($category) }}
        </span>

        {{-- Floating Icon --}}
        @if($icon)
            <div class="absolute bottom-4 right-4 w-auto h-12 px-6 flex items-center justify-center 
                        rounded-full bg-white/90 shadow-xl backdrop-blur-xl
                        text-[var(--primary-green)] text-xl font-bold">
                {{ $icon }}
            </div>
        @endif
    </div>

    {{-- Content Section --}}
    <div class="p-7 space-y-4">

        {{-- Title --}}
        <h3 class="text-2xl font-semibold text-[var(--neutral-dark)] leading-snug"
            style="font-family: var(--font-headline)">
            {{ $title }}
        </h3>

        {{-- Meta Info --}}
        <div class="flex flex-wrap gap-4 text-sm text-[var(--muted-foreground)]">
            @if($duration)
                <span class="flex items-center gap-2">
                    ⏳ <strong class="font-medium">{{ $duration }}</strong>
                </span>
            @endif

            @if($effectiveness)
                <span class="flex items-center gap-2">
                    ⭐ <strong class="font-medium">{{ $effectiveness }} Effective</strong>
                </span>
            @endif
        </div>

        {{-- Description --}}
        <p class="text-[var(--muted-foreground)] leading-relaxed"
           style="font-family: var(--font-body)">
            {{ $description }}
        </p>

        {{-- Includes --}}
        @if(!empty($includes))
            <ul class="mt-2 space-y-1.5">
                @foreach($includes as $item)
                    <li class="text-sm flex items-center gap-2 text-[var(--neutral-dark)]/80">
                        <span class="w-1.5 h-1.5 rounded-full bg-[var(--primary-green)]"></span>
                        {{ $item }}
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- CTA Button --}}
        <div class="pt-4">
            <button
                class="w-full py-3 rounded-xl bg-[var(--primary-green)] text-white 
                       font-semibold shadow-lg hover:shadow-xl hover:bg-[var(--primary-green)]/90 
                       transition-all"
                style="font-family: var(--font-body)">
                Explore Program →
            </button>
        </div>
    </div>
</div>
