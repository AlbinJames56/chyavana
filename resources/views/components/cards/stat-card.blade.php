@props([
    'value',
    'label',
])

<div {{ $attributes->merge(['class' => 'space-y-4 text-center']) }}>
    @isset($icon)
        <div class="mx-auto">
            {{ $icon }}
        </div>
    @endisset

    <p
        class="text-5xl text-[var(--neutral-dark)]"
        style="font-family: var(--font-body); font-weight: 700;"
    >
        {{ $value }}
    </p>

    <p
        class="text-lg text-[var(--muted-foreground)]"
        style="font-family: var(--font-body);"
    >
        {{ $label }}
    </p>
</div>
