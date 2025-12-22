{{-- resources/views/components/footer.blade.php --}}
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
  ['icon' => 'mail', 'label' => 'Email Us', 'value' => 'jeevanamwellnessdigital@gmail.com'],
  [
    'icon' => 'location',
    'label' => 'Address',
    'value' =>
      'Chyavana Ayur Retreat Ayurveda Hospital, near Thethana Temple, Thekkumthara, Kerala 673124'
  ],
];
@endphp

<style>
  .chyavana-footer {
    --bg1: #f5faf6;
    --bg2: #e9f5ec;
    --text: #10391f;
    --muted: #4b6956;
    --accent: #3db67e;
    --accent-light: #d8f3e7;
    --border: #dfe7e1;
    --accent-dark: #2a8b5f;
  }

  .contact-card-hover {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .contact-card-hover:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 24px -8px rgba(61, 182, 126, 0.2);
    border-color: var(--accent);
  }

  .social-hover {
    transition: all 0.3s ease;
  }

  .social-hover:hover {
    transform: scale(1.1) translateY(-2px);
    box-shadow: 0 8px 16px -4px rgba(61, 182, 126, 0.3);
    color: var(--accent);
  }

  .badge-pulse {
    animation: badge-pulse 4s ease-in-out infinite;
  }

  @keyframes badge-pulse {

    0%,
    100% {
      box-shadow: 0 0 0 0 rgba(61, 182, 126, 0.2);
    }

    50% {
      box-shadow: 0 0 0 8px rgba(61, 182, 126, 0);
    }
  }

  .leaf-float {
    animation: leaf-float 6s ease-in-out infinite;
  }

  @keyframes leaf-float {

    0%,
    100% {
      transform: translateY(0) rotate(0deg);
    }

    50% {
      transform: translateY(-8px) rotate(5deg);
    }
  }

  .divider-glow {
    position: relative;
  }

  .divider-glow::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 25%;
    right: 25%;
    height: 2px;
    background: linear-gradient(90deg,
        transparent,
        var(--accent),
        transparent);
    border-radius: 2px;
  }
</style>

<footer
  class="chyavana-footer bg-gradient-to-br from-[var(--bg1)] to-[var(--bg2)] text-[var(--text)] pt-14 pb-8  relative overflow-hidden">

  <!-- Background decorative elements -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-20">
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-[var(--accent-light)] rounded-full blur-3xl"></div>
    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-[var(--accent-light)] rounded-full blur-3xl"></div>
  </div>

  <div class="relativepx-8 md:px-14 lg:px-28   mx-auto px-6  ">

    <!-- Top Section with unique three-column layout -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-6 mb-14">


      <!-- Brand Column with enhanced design -->
      <div class="relative">
        <!-- Floating leaf decoration -->
        <div class="absolute -top-6 -left-6 text-[var(--accent)] opacity-20 leaf-float">
          <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M17 8C8 10 5.9 16.17 3.82 21.34l1.89.66 1.4-4.05c.48.28.98.54 1.49.78l-1.35 4.07 1.9.66 2.57-7.49C14.38 15.56 17 8 17 8M22 6C19 4 14 4 14 4s-1 3-1 3-2 0-3.33.5-3.5 1-4.5 2S2 10 2 10l7 4s4-1 5-1 3 1 3 1c0 0 4.5-2.5 5.5-4S22 8 22 6Z" />
          </svg>
        </div>

        <div class="relative z-10">
          <div class="mb-8 transform transition-transform duration-500 hover:scale-[1.02]  ">
          <img src="/images/logo-title.png" alt="Chyavana Ayur Retreat" class="w-54 mb-6 drop-shadow-lg filter brightness-110 contrast-110
                   mx-auto lg:mx-0
                   block" />

          </div>

          <p
            class="text-[var(--muted)] leading-relaxed mb-8 text-lg font-light italic border-l-4 border-[var(--accent)] pl-4 py-2 bg-white/50 rounded-r-lg">
            "Experience authentic Ayurveda rooted in ancient wisdom and enhanced with modern holistic care —
            restoring balance, vitality and natural wellness."
          </p>

          <!-- Animated badges -->
          <!-- <div class="flex   gap-3">
            <span
              class="inline-flex items-center gap-3 px-2 py-1 bg-white border border-[var(--border)] rounded-xl shadow-sm hover:shadow-md transition-all duration-300 group">
              <div
                class="w-8 h-8 rounded-lg bg-gradient-to-br from-[var(--accent-light)] to-white flex items-center justify-center badge-pulse">
                <i class="fa-solid fa-leaf text-[var(--accent)] text-sm"></i>
              </div>
              <span class="font-medium text-[var(--text)] text-sm">Certified Practitioners</span>
            </span>

            <span
              class="inline-flex items-center gap-3 px-2 py-1 bg-white border border-[var(--border)] rounded-xl shadow-sm hover:shadow-md transition-all duration-300 group">
              <div
                class="w-8 h-8 rounded-lg bg-gradient-to-br from-[var(--accent-light)] to-white flex items-center justify-center">
                <i class="fa-solid fa-seedling text-[var(--accent)] text-sm"></i>
              </div>
              <span class="font-medium text-[var(--text)] text-sm">Natural Treatments</span>
            </span>
          </div> -->
        </div>
      </div>

      <!-- Contact Column with card design -->
      <div class="lg:col-span-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Contact Info Section -->
          <div>
            <h3 class="text-2xl font-bold text-[var(--text)] mb-4 relative inline-block">
              Get In Touch
              <span
                class="absolute -bottom-2 left-0 w-12 h-1 bg-gradient-to-r from-[var(--accent)] to-transparent rounded-full"></span>
            </h3>

            <div class="space-y-2">
              @foreach ($contactInfo as $item)
                <div
                  class="contact-card-hover flex items-start gap-4 p-2 rounded-xl border border-[var(--border)] bg-white shadow-sm hover:shadow-xl backdrop-blur-sm">
                  <div class="flex-shrink-0">
                    <div
                      class="w-12 h-12 rounded-lg bg-gradient-to-br from-[var(--accent-light)] to-white flex items-center justify-center shadow-sm">
                      @if($item['icon'] === 'phone')
                        <i class="fa-solid fa-phone text-[var(--accent)] text-lg"></i>
                      @elseif($item['icon'] === 'mail')
                        <i class="fa-solid fa-envelope text-[var(--accent)] text-lg"></i>
                      @else
                        <i class="fa-solid fa-location-dot text-[var(--accent)] text-lg"></i>
                      @endif
                    </div>
                  </div>

                  <div class="flex-1 min-w-0">
                    <div class="font-bold text-[var(--text)] mb-1 text-sm uppercase tracking-wide">{{ $item['label'] }}
                    </div>
                    <div class="text-[var(--muted)] leading-relaxed text-sm">{{ $item['value'] }}</div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
 
          <div class="space-y-8"> 
            

            <!-- Partner Badge with unique design -->
            <div class="mt-6">
              <div
                class="relative overflow-hidden rounded-2xl border border-[var(--border)] bg-gradient-to-br from-white to-[var(--accent-light)]/30 p-5 shadow-sm hover:shadow-lg transition-all duration-500">
                <!-- Background pattern -->
                <div class="absolute top-0 right-0 w-24 h-24 opacity-10">
                  <svg viewBox="0 0 100 100" fill="currentColor" class="text-[var(--accent)]">
                    <circle cx="50" cy="50" r="45" />
                  </svg>
                </div>

                <div class="relative z-10">
                  <p
                    class="text-sm font-semibold text-[var(--muted)] mb-3 uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-handshake text-[var(--accent)]"></i>
                    Our Trusted Partner
                  </p>
                  <div class="flex items-center justify-center  bg-white rounded-xl shadow-inner">

                   <img src="{{ asset('images/kotakllogo.jpg') }}" alt="Kotak Partner"
  class="max-h-46 w-auto object-contain rounded-xl   hover:grayscale-0 transition-all duration-300">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Social & Bottom Section with unique divider -->
    <div class="pt-3 border-t border-[var(--border)] divider-glow">

    <div class="flex flex-col lg:flex-row items-center justify-between gap-6 mb-3">

        <!-- Social Media -->
        <div class="text-center lg:text-left">
          <h4 class="text-xl font-bold text-[var(--text)] mb-2">Stay Connected</h4>
          <p class="text-[var(--muted)] max-w-md">Follow us for wellness tips & clinic updates</p>
        </div>

        <div class="flex gap-4">
          @foreach($socialLinks as $s)
            <a href="{{ $s['href'] }}" target="_blank" aria-label="{{ $s['label'] }}"
              class="social-hover w-14 h-14 flex items-center justify-center bg-white border border-[var(--border)] rounded-xl text-[var(--text)] shadow-sm hover:shadow-lg">
              <div class="relative">
                @if($s['icon'] === 'facebook')
                  <i class="fab fa-facebook-f text-lg"></i>
                @else
                  <i class="fab fa-instagram text-lg"></i>
                @endif
                <!-- Hover effect circle -->
                <span
                  class="absolute inset-0 rounded-full border-2 border-transparent group-hover:border-[var(--accent)]/30 transition-all duration-300"></span>
              </div>
            </a>
          @endforeach

          <!-- Call to Action Button -->
          <a href="tel:+919497076557"
            class="group flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-[var(--accent)] to-[var(--accent-dark)] text-white rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
            <i class="fa-solid fa-phone"></i>
            <span class="font-bold">Call Now</span>
          </a>
        </div>
      </div>

      <!-- Copyright & Links with unique design -->
      <div class="pt-4 border-t border-[var(--border)]">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
          <!-- Copyright -->
          <div class="text-center lg:text-left">
            <div class="text-[var(--muted)] text-sm mb-2 flex items-center justify-center lg:justify-start gap-2">
              <i class="fa-regular fa-copyright"></i>
              <span>{{ date('Y') }} Chyavana Ayur Retreat — All rights reserved</span>
            </div>
            <div class="text-xs text-[var(--muted)] italic">
              Ancient Wisdom • Modern Care • Natural Healing
            </div>
          </div>

          <!-- Policy Links -->
          <div class="flex items-center gap-6">
            <div class="flex gap-6 text-sm">
              <a href="#"
                class="text-[var(--muted)] hover:text-[var(--accent)] transition-colors duration-300 relative group">
                Privacy Policy
                <span
                  class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[var(--accent)] group-hover:w-full transition-all duration-300"></span>
              </a>
              <a href="#"
                class="text-[var(--muted)] hover:text-[var(--accent)] transition-colors duration-300 relative group">
                Terms of Service
                <span
                  class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[var(--accent)] group-hover:w-full transition-all duration-300"></span>
              </a>
              <a href="#"
                class="text-[var(--muted)] hover:text-[var(--accent)] transition-colors duration-300 relative group">
                Cookie Policy
                <span
                  class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[var(--accent)] group-hover:w-full transition-all duration-300"></span>
              </a>
            </div>

            <!-- Ayurvedic Symbol -->
            <div class="hidden lg:block text-[var(--accent)] opacity-50">
              <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6Z" />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Floating back to top button -->
  <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
    class="fixed bottom-8 right-8 w-12 h-12 flex items-center justify-center bg-white border border-[var(--border)] text-[var(--accent)] rounded-full shadow-xl hover:shadow-2xl hover:bg-[var(--accent)] hover:text-white transition-all duration-300 z-50">
    <i class="fa-solid fa-chevron-up"></i>
  </button>
</footer>