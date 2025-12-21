<section class="py-20">
  <div class="container mx-automx-auto px-8 md:px-14 lg:px-28">
    <div class="grid md:grid-cols-4 gap-8 text-center">
      @foreach($stats as $s)
        <div>
          <p class="text-4xl lg:text-5xl text-[var(--primary-green)] mb-2">{{ $s['value'] }}</p>
          <p class="text-[var(--muted-foreground)]">{{ $s['label'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
