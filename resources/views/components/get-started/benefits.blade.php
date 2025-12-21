<div class="mt-10 rounded-2xl border border-[var(--border)] bg-white p-8 shadow-sm hover:shadow-md transition relative overflow-hidden">

    {{-- Soft decorative corner shape --}}
   

    <h3 class="text-2xl font-semibold text-[var(--neutral-dark)] mb-6 flex items-center gap-3">
        <i class="fa-solid fa-leaf text-[var(--primary-green)] text-xl"></i>
        What to Expect
    </h3>

    <ul class="space-y-4 relative z-10">

        @foreach([
            'Free 30-minute initial consultation',
            'Personalized treatment plan tailored to your condition',
            'Experienced Ayurvedic doctors & practitioners',
            'Flexible appointment scheduling',
            'Follow-up support included'
        ] as $item)

        <li class="flex items-start gap-4 p-3 rounded-xl hover:bg-[var(--primary-green)]/5 transition">
            <div class="w-8 h-8 flex items-center justify-center rounded-full bg-[var(--primary-green)]/10">
                <i class="fa-solid fa-check text-[var(--primary-green)]"></i>
            </div>
            <span class="text-[var(--neutral-dark)] leading-relaxed">{{ $item }}</span>
        </li>

        @endforeach

    </ul>
</div>
