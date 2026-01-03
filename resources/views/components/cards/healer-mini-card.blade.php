@props(['healer'])

<div
    class="group bg-white border border-[var(--border)] rounded-3xl overflow-hidden
           transition-all duration-500
           hover:-translate-y-2 hover:shadow-2xl">

    {{-- Image --}}
    <div class="relative h-90 overflow-hidden">
        <img
            src="{{ $healer->image_url }}"
            alt="{{ $healer->name }}"
            class="w-full h-full object-cover
                   transition-transform duration-700
                   group-hover:scale-110"
        />

        {{-- Soft gradient overlay --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>

        {{-- Experience badge --}}
        @if($healer->experience)
            <span
                class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs
                       bg-white/90 backdrop-blur text-[var(--primary-green)]
                       font-semibold shadow">
                {{ $healer->experience }}
            </span>
        @endif
    </div>

    {{-- Content --}}
    <div class="p-6 text-center space-y-3">

        <h3 class="text-xl font-semibold text-[var(--neutral-dark)] leading-tight">
            {{ $healer->name }}
        </h3>

        @if($healer->qualification)
            <p class="text-sm text-[var(--muted-foreground)]">
                {{ $healer->qualification }}
            </p>
        @endif

        {{-- Divider --}}
        <div class="flex justify-center">
            <span class="w-10 h-0.5 bg-[var(--primary-green)]/60 rounded-full"></span>
        </div>

        {{-- CTA --}}
         
    </div>
</div>
