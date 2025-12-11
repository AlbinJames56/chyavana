@php
    // Default programs (you can pass $programs from controller too)
    $programs = $programs ?? [
        (object) [
            'icon' => 'brain',
            'title' => 'Mental Wellness Program',
            'category' => 'mental',
            'duration' => '8-12 weeks',
            'effectiveness' => '92%',
            'description' => 'Comprehensive approach to stress, anxiety, and mental clarity through Ayurvedic practices.',
            'includes' => [
                'Personalized herbal formulations',
                'Meditation and breathing techniques',
                'Diet and lifestyle counseling',
                'Regular progress monitoring'
            ],
            'image' => 'https://images.unsplash.com/photo-1618425977996-bebc5afe88f9?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080'
        ],
        (object) [
            'icon' => 'droplets',
            'title' => 'Digestive Health Program',
            'category' => 'digestive',
            'duration' => '6-10 weeks',
            'effectiveness' => '89%',
            'description' => 'Restore gut health and optimize digestion through targeted Ayurvedic therapies.',
            'includes' => [
                'Agni (digestive fire) enhancement',
                'Customized dietary protocols',
                'Herbal digestive support',
                'Panchakarma detoxification'
            ],
            'image' => 'https://images.unsplash.com/photo-1760696473939-88db0835c908?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080'
        ],
        // ... add the rest of your programs similarly
    ];
    $filters = [
        ['label' => 'All Programs', 'value' => 'all'],
        ['label' => 'Mental Health', 'value' => 'mental'],
        ['label' => 'Digestive', 'value' => 'digestive'],
        ['label' => 'Heart Health', 'value' => 'cardiovascular'],
        ['label' => 'Sleep', 'value' => 'sleep'],
        ['label' => 'Skin Care', 'value' => 'skin'],
        ['label' => 'Detox', 'value' => 'detox'],
    ];
@endphp

<div x-data="{ activeFilter: 'all' }" class="space-y-8">
    <!-- Hero -->
    <section class="bg-gradient-to-br from-white to-[var(--neutral-light)] pt-16 lg:pt-24 my-16 ">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-3xl mx-auto text-center space-y-6">
                <span
                    class="inline-flex items-center px-3 py-1 rounded-full bg-[var(--primary-green)]/10 text-[var(--primary-green)] border-[var(--primary-green)]/20">Proven
                    Ayurvedic Programs</span>

                <h1 class="text-4xl lg:text-5xl text-[var(--neutral-dark)]" style="font-family:var(--font-headline)">
                    Treatment Programs</h1>
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
    <section class="py-20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($programs as $p)
                   <x-cards.treatment-card
                        :title="$p->title"
                        :category="$p->category"
                        :duration="$p->duration"
                        :effectiveness="$p->effectiveness"
                        :description="$p->description"
                        :includes="$p->includes"
                        :image="$p->image"
                        :icon="$p->icon"
                        x-show="activeFilter === 'all' || activeFilter === '{{ $p->category }}'"
                        style="display: block;"
                    />

                @endforeach
            </div>
        </div>
    </section>

  
   
</div>