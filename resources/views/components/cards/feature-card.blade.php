@props([
    'title',
    'description',
])

<div {{ $attributes->merge(['class' => 'text-center space-y-4']) }}>
    <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center mx-auto backdrop-blur-sm">
        @isset($icon)
            {{ $icon }}
        @endisset
    </div>

    <h3
        class="text-xl text-white"
        style="font-family: var(--font-body); font-weight: 600;"
    >
        {{ $title }}
    </h3>

    <p
        class="text-white/70"
        style="font-family: var(--font-body);"
    >
        {{ $description }}
    </p>
</div>
