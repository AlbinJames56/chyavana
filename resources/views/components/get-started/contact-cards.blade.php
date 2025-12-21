@php
  $contacts = [
    ['icon' => 'fa-phone', 'title' => 'Call Us', 'detail' => '+91 94970 76557', 'sub' => 'Mon–Sat, 8AM – 8PM'],
    ['icon' => 'fa-envelope', 'title' => 'Email Us', 'detail' => 'care@arogyasathi.com', 'sub' => 'We reply within 24 hours'],
    ['icon' => 'fa-location-dot', 'title' => 'Visit Us', 'detail' => 'Chyavana Ayur Retreat Ayurveda Hospital, near Thethana Temple, Thekkumthara, Kerala 673124', 'sub' => 'Find us on Google Maps'],
    ['icon' => 'fa-clock', 'title' => 'Clinic Hours', 'detail' => 'Mon–Sat: 8AM – 8PM', 'sub' => 'Sunday: Closed'],
  ];
@endphp

<div class="grid grid-cols-2   gap-6 mt-10">

  @foreach($contacts as $c)
  <div class="group bg-white/80 border border-[var(--border)] rounded-2xl p-8 text-center shadow-sm hover:shadow-md transition-all duration-300">

      <div class="mx-auto w-14 h-14 rounded-full bg-[var(--primary-green)]/10 flex items-center justify-center group-hover:bg-[var(--primary-green)]/20 transition">
        <i class="fa-solid {{ $c['icon'] }} text-[var(--primary-green)] text-xl"></i>
      </div>

      <h3 class="text-xl font-semibold text-[var(--neutral-dark)] mt-4">
        {{ $c['title'] }}
      </h3>

      <p class="text-[var(--neutral-dark)] mt-2 text-sm leading-relaxed">
        {{ $c['detail'] }}
      </p>

      <p class="text-xs text-[var(--muted-foreground)] mt-3">
        {{ $c['sub'] }}
      </p>

      <div class="mt-4">
        @if($c['title'] === 'Call Us')
          <a href="tel:+919497076557" class="text-[var(--primary-green)] text-sm hover:underline">
            Call Now →
          </a>
        @elseif($c['title'] === 'Email Us')
          <a href="mailto:care@arogyasathi.com" class="text-[var(--primary-green)] text-sm hover:underline">
            Send Email →
          </a>
        @elseif($c['title'] === 'Visit Us')
          <a href="https://maps.google.com/?q=Chyavana Ayur Retreat Ayurveda Hospital" target="_blank"
             class="text-[var(--primary-green)] text-sm hover:underline">
            View Map →
          </a>
        @endif
      </div>

  </div>
  @endforeach

</div>
