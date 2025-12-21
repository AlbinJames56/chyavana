@props([
    'steps' => [
        ['step' => '01', 'title' => 'Initial Consultation', 'description' => 'Comprehensive assessment of your health history, lifestyle, and wellness goals'],
        ['step' => '02', 'title' => 'Constitution Analysis', 'description' => 'Detailed Prakriti (body type) and Vikriti (imbalance) evaluation'],
        ['step' => '03', 'title' => 'Customized Plan', 'description' => 'Personalized treatment protocol designed specifically for you'],
        ['step' => '04', 'title' => 'Ongoing Care', 'description' => 'Regular monitoring, adjustments, and long-term wellness support'],
    ]
])
       
<section class="py-20 bg-white">
  <div class="container mx-auto px-4 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <h2 class="text-4xl lg:text-5xl text-[var(--neutral-dark)] mb-4" style="font-family:var(--font-body);font-weight:700">
        How Our Treatment Process Works
      </h2>
      <p class="text-lg text-[var(--muted-foreground)]" style="font-family:var(--font-body)">A step-by-step journey toward complete wellness</p>
    </div>
             
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 items-start">
      @foreach($steps as $process) 
        <div class="border-[var(--border)] text-center rounded-2xl overflow-hidden bg-white">
          <div class="p-6 space-y-4">
            <div class="text-5xl text-[var(--primary-green)]/20" style="font-family:var(--font-body);font-weight:700">
              {{ $process['step'] }}
            </div>
            <h3 class="text-xl text-[var(--neutral-dark)]" style="font-family:var(--font-body);font-weight:600">
              {{ $process['title'] }}
            </h3>

            <p class="text-lg text-[var(--muted-foreground)]" style="font-family:var(--font-body)">
              {{ $process['description'] }}
            </p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
