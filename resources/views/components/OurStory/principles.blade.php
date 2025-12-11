<section class="py-20">
  <div class="container mx-auto mx-auto px-8 md:px-14 lg:px-28">
    <div class="text-center max-w-2xl mx-auto mb-16">
      <h2 class="  text-[var(--neutral-dark)] mb-4">Ayurvedic Principles We Practice</h2>
      <p class="text-[var(--muted-foreground)]">Understanding the fundamentals of Ayurvedic medicine</p>
    </div>

    <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
      @foreach($principles as $p)
        <div class="border-[var(--border)] rounded-lg hover:shadow-md transition p-6">
          <div class="flex items-start gap-4">
            <div class="p-2 rounded-full bg-[var(--primary-green)]/10 flex items-center justify-center mt-1">
              <i class="fa-solid fa-check text-[var(--primary-green)]"></i>
            </div>
            <div>
              <h6 class=" text-[var(--neutral-dark)] mb-2">{{ $p['title'] }}</h3>
              <p class=" text-[var(--muted-foreground)]">{{ $p['description'] }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
