<section class="py-20 bg-[var(--neutral-light)]">
  <div class="container mx-auto mx-auto px-8 md:px-14 lg:px-28">
    <div class="text-center max-w-2xl mx-auto mb-16">
      <h2 class="  text-[var(--neutral-dark)] mb-4">Our Core Values</h2>
      <p class="text-[var(--muted-foreground)]">The principles that guide our practice every day</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
      @foreach($values as $v)
        <div class="border-[var(--border)] bg-white rounded-2xl hover:shadow-lg transition p-8 text-center">
          <div class="w-16 h-16 rounded-full bg-[var(--primary-green)]/10 flex items-center justify-center mx-auto mb-4">
            <i class="fa-solid {{ $v['icon'] }} text-[var(--primary-green)] text-2xl"></i>
          </div>
          <h6 class=" text-[var(--neutral-dark)] mb-2">{{ $v['title'] }}</h3>
          <p class=" text-[var(--muted-foreground)]">{{ $v['description'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
