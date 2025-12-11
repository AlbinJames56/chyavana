@php
  $quickLinks = [
    ['label' => 'About Us', 'href' => '#about'],
    ['label' => 'Practitioners', 'href' => '#practitioners'],
    ['label' => 'Contact', 'href' => '#contact'],
  ];

  $socialLinks = [
    ['icon' => 'facebook', 'href' => 'https://www.facebook.com/ayurretreat/', 'label' => 'Facebook'],
    ['icon' => 'instagram', 'href' => 'https://www.instagram.com/chyavana_ayur_retreat/', 'label' => 'Instagram'],
  ];

  $contactInfo = [
    ['icon' => 'phone', 'label' => 'Call Us', 'value' => '+91 94970 76557'],
    ['icon' => 'mail',  'label' => 'Email Us', 'value' => 'jeevanamwellnessdigital@gmail.com'],
    ['icon' => 'location', 'label' => 'Address', 'value' =>
        'Chyavana Ayur Retreat Ayurveda Hospital, near Thethana Temple, Thekkumthara, Kerala 673124'],
  ];
@endphp

<style>
  footer.chyavana-footer {
    --bg1: #f5faf6;
    --bg2: #e9f5ec;
    --text: #10391f;
    --muted: #4b6956;
    --accent: #3db67e;
    --accent-light: #d8f3e7;
    --border: #dfe7e1;
  }
</style>

<footer class="chyavana-footer bg-gradient-to-br from-[var(--bg1)] to-[var(--bg2)] text-[var(--text)] pt-16 pb-10 relative">

  <div class="max-w-[1200px] mx-auto px-6">

    <!-- TOP SECTION -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mb-16">

      <!-- BRAND COLUMN -->
      <div>
        <img src="/images/logo.png" alt="Chyavana Ayur Retreat"
             class="w-64 mb-4 drop-shadow-sm">

        <p class="text-sm text-[var(--muted)] leading-relaxed mb-4">
          Experience authentic Ayurveda rooted in ancient wisdom and enhanced with modern holistic care —  
          restoring balance, vitality and natural wellness.
        </p>

        <div class="flex flex-wrap gap-3 text-xs mt-4">
          <span class="inline-flex items-center gap-2 px-3 py-1 bg-[var(--accent-light)] text-[var(--text)] rounded-full">
            <i class="fa-solid fa-leaf text-[var(--accent)]"></i>
            Certified Practitioners
          </span>

          <span class="inline-flex items-center gap-2 px-3 py-1 bg-[var(--accent-light)] text-[var(--text)] rounded-full">
            <i class="fa-solid fa-seedling text-[var(--accent)]"></i>
            100% Natural Treatments
          </span>
        </div>
      </div>

      <!-- CONTACT COLUMN -->
      <div>
        <h3 class="text-lg font-semibold mb-4">Get In Touch</h3>

        <div class="space-y-4">
          @foreach ($contactInfo as $item)
            <div class="flex items-start gap-3 p-3 rounded-lg border border-[var(--border)] bg-white shadow-sm hover:shadow-md transition">
              <div class="w-10 h-10 rounded-md bg-[var(--accent-light)] flex items-center justify-center">
                @if($item['icon'] === 'phone')
                  <i class="fa-solid fa-phone text-[var(--accent)]"></i>
                @elseif($item['icon'] === 'mail')
                  <i class="fa-solid fa-envelope text-[var(--accent)]"></i>
                @else
                  <i class="fa-solid fa-location-dot text-[var(--accent)]"></i>
                @endif
              </div>

              <div class="text-sm">
                <div class="font-medium">{{ $item['label'] }}</div>
                <div class="text-[var(--muted)]">{{ $item['value'] }}</div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- QUICK LINKS -->
      <div>
        

        <!-- PARTNER BADGE -->
        <div class="mt-8 border border-[var(--border)] rounded-lg bg-white p-3 shadow-sm">
          <p class="text-xs mb-2 text-[var(--muted)]">Our Trusted Partner</p>
          <img src="{{ asset('images/kotakllogo.jpg') }}"
               alt="Kotak Partner"
               class="w-full rounded-lg shadow">
        </div>
      </div>

    </div>

    <!-- SOCIAL + CTA -->
    <div class="border-t border-[var(--border)] pt-6">
      <div class="flex flex-col md:flex-row items-center justify-between gap-4">

        <div>
          <h4 class="text-lg font-semibold">Stay Connected</h4>
          <p class="text-sm text-[var(--muted)]">Follow us for wellness tips & clinic updates.</p>
        </div>

        <div class="flex gap-3">
          @foreach($socialLinks as $s)
            <a href="{{ $s['href'] }}" target="_blank"
               class="w-10 h-10 flex items-center justify-center bg-white border border-[var(--border)] rounded-lg text-[var(--text)] hover:text-[var(--accent)] hover:shadow-md transition">
              @if($s['icon'] === 'facebook')
                <i class="fab fa-facebook-f"></i>
              @else
                <i class="fab fa-instagram"></i>
              @endif
            </a>
          @endforeach
        </div>

      </div>
    </div>

    <!-- BOTTOM ROW -->
    <div class="pt-4 mt-6 border-t border-[var(--border)] text-xs flex flex-col md:flex-row justify-between gap-3 text-[var(--muted)]">
      <span>© {{ date('Y') }} Chyavana Ayur Retreat — All rights reserved.</span>

      <div class="flex gap-4">
        <a href="#" class="hover:text-[var(--accent)]">Privacy Policy</a>
        <a href="#" class="hover:text-[var(--accent)]">Terms of Service</a>
        <a href="#" class="hover:text-[var(--accent)]">Cookie Policy</a>
      </div>
    </div>

  </div>
</footer>
