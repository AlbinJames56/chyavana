@props([
    'title',
    'description',
    'duration',
])

<div {{ $attributes->merge([
    'class' => 'border-[var(--border)] hover:shadow-lg transition-shadow rounded-2xl bg-white'
]) }}>
    <div class="p-6 space-y-4">
        <div class="w-12 h-12 rounded-full bg-[var(--primary-green)]/10 flex items-center justify-center">
            {{-- Heart icon --}}
            <svg class="w-6 h-6 text-[var(--primary-green)]" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20.8 4.6A5.5 5.5 0 0 0 12 5.1 5.5 5.5 0 0 0 3.2 4.6 5.5 5.5 0 0 0 3.2 12l8.3 8.4a1 1 0 0 0 1.4 0L20.8 12a5.5 5.5 0 0 0 0-7.4z" />
            </svg>
        </div>

        <h3
            class="text-xl text-[var(--neutral-dark)]"
            style="font-family: var(--font-body); font-weight: 600;"
        >
            {{ $title }}
        </h3>

        <p
            class="text-[var(--muted-foreground)]"
            style="font-family: var(--font-body);"
        >
            {{ $description }}
        </p>

        <div class="flex items-center gap-2 text-sm text-[var(--primary-green)]">
            {{-- Clock icon --}}
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <polyline points="12 6 12 12 16 14" />
            </svg>
            <span style="font-family: var(--font-body);">
                {{ $duration }}
            </span>
        </div>
    </div>
</div>
