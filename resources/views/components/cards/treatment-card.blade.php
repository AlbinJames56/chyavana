@props([
    'title',
    'description',
    'image',
    'icon' => null,        // optional
    'includes' => [],      // this is an array
])

<div {{ $attributes->merge([
    'class' => 'border-[var(--border)] hover:shadow-xl transition-all overflow-hidden group rounded-2xl bg-white'
]) }}>
    <div class="relative h-48 overflow-hidden">
        <img
            src="{{ $image }}"
            alt="{{ $title }}"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
            loading="lazy"
        >
    </div>

    <div class="p-6 space-y-3">
        @if($icon)
            <div class="w-12 h-12 rounded-full bg-[var(--primary-green)]/10 flex items-center justify-center">
                {{-- if icon is a name like "brain", you can switch here or just print text/icon --}}
                {{ $icon }}
            </div>
        @endif

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

        @if(!empty($includes))
            <ul class="mt-3 space-y-1">
                @foreach($includes as $item)
                    <li class="text-sm text-[var(--muted-foreground)]" style="font-family: var(--font-body);">
                        • {{ $item }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
