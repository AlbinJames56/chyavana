@props(['values' => null, 'filters' => null])

@php
    // use the provided values (controller passes $treatments as 'values' from include),
    // otherwise fall back to an empty collection.
    $treatments = $values ?? collect();
    // If filters are not passed in, derive from treatments
    $filters = $filters ?? collect([['label' => 'All Programs', 'value' => 'all']])
        ->merge(
            $treatments->pluck('category')->filter()->unique()->map(fn($c) => ['label' => ucfirst($c), 'value' => $c])->values()
        )->toArray();
@endphp

<div x-data="{ activeFilter: 'all' }" class="space-y-8">
    <!-- Hero -->
    <section class="bg-gradient-to-br from-white to-[var(--neutral-light)] pt-16 lg:pt-24 my-16 ">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-3xl mx-auto text-center space-y-6">
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full bg-[var(--primary-green)]/10 text-[var(--primary-green)] border-[var(--primary-green)]/20">
                    Proven Ayurvedic Programs
                </span>

                <h1 class="text-4xl lg:text-5xl text-[var(--neutral-dark)]" style="font-family:var(--font-headline)">
                    Treatment Programs
                </h1>
                <p class="text-lg text-[var(--muted-foreground)]" style="font-family:var(--font-body)">
                    Comprehensive healing programs tailored to your health concerns.
                </p>
            </div>
        </div>
    </section>

    <!-- Filters -->
    <section class="pb-12 border-b border-[var(--border)]">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-wrap gap-3 justify-center">
                @foreach($filters as $filter)
                    <button x-on:click="activeFilter = '{{ $filter['value'] }}'"
                        :class="activeFilter === '{{ $filter['value'] }}' ? 'bg-[var(--primary-green)] text-white' : 'bg-[var(--neutral-light)] text-[var(--neutral-dark)] hover:bg-[var(--primary-green)]/10'"
                        class="px-6 py-2 rounded-full transition-all" style="font-family:var(--font-body)">
                        {{ $filter['label'] }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Programs Grid -->
    <section class="py-10 md:py-20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($treatments as $t)
                    {{-- Map Treatment model fields into your card props --}}
                    <x-cards.treatment-card :title="$t->title" :category="$t->category" :duration="$t->duration"
                        :effectiveness="$t->effectiveness_text ?? ($t->effectiveness ? $t->effectiveness . '%' : '')"
                        :description="$t->short_description" :includes="$t->includes ?? []" :image="$t->image_url"
                        :icon="$t->icon" :url="route('treatment.show', $t->slug)"
                        x-show="activeFilter === 'all' || activeFilter === '{{ $t->category }}'" style="display: block;" />
                @empty
                    <div class="col-span-2 text-center text-[var(--muted-foreground)] py-16">
                        No treatments available yet. Please check back later.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>