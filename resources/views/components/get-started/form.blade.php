<div class="border-[var(--border)] shadow-lg rounded-2xl p-8 bg-white mt-6">
  <h2 class="text-2xl text-[var(--neutral-dark)] mb-2">Book Your Consultation</h2>
  <p class="text-[var(--muted-foreground)] mb-6">
    Fill out the form below and we'll get back to you shortly
  </p>

  <form method="POST" action="#" class="space-y-6" novalidate>
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      {{-- Full Name --}}
      <label class="relative block">
        <span class="sr-only">Full name</span>
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <i class="fa-solid fa-user text-[var(--primary-green)]"></i>
        </div>
        <input
          name="name"
          value="{{ old('name') }}"
          type="text"
          required
          aria-required="true"
          placeholder="Full name"
          class="w-full pl-10 pr-3 py-3 rounded-lg border border-[var(--border)] bg-white focus:outline-none focus:ring-2 focus:ring-[var(--primary-green)] transition"
        />
        @error('name')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </label>

      {{-- Email --}}
      <label class="relative block">
        <span class="sr-only">Email</span>
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <i class="fa-solid fa-envelope text-[var(--primary-green)]"></i>
        </div>
        <input
          name="email"
          value="{{ old('email') }}"
          type="email"
          required
          aria-required="true"
          placeholder="you@domain.com"
          class="w-full pl-10 pr-3 py-3 rounded-lg border border-[var(--border)] bg-white focus:outline-none focus:ring-2 focus:ring-[var(--primary-green)] transition"
        />
        @error('email')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </label>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      {{-- Phone --}}
      <label class="relative block">
        <span class="sr-only">Phone</span>
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <i class="fa-solid fa-phone text-[var(--primary-green)]"></i>
        </div>
        <input
          name="phone"
          value="{{ old('phone') }}"
          type="tel"
          required
          aria-required="true"
          placeholder="+91 98765 43210"
          class="w-full pl-10 pr-3 py-3 rounded-lg border border-[var(--border)] bg-white focus:outline-none focus:ring-2 focus:ring-[var(--primary-green)] transition"
        />
        @error('phone')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </label>

      {{-- Concern (select) --}}
      <label class="relative block">
        <span class="sr-only">Primary Health Concern</span>
        <select
          name="concern"
          required
          aria-required="true"
          class="w-full appearance-none pl-4 pr-10 py-3 rounded-lg border border-[var(--border)] bg-white focus:outline-none focus:ring-2 focus:ring-[var(--primary-green)] transition"
        >
          <option value="" disabled selected>Select primary concern</option>
          <option value="pain" {{ old('concern') == 'pain' ? 'selected' : '' }}>Pain Management</option>
          <option value="mental" {{ old('concern') == 'mental' ? 'selected' : '' }}>Mental Wellness</option>
          <option value="digestive" {{ old('concern') == 'digestive' ? 'selected' : '' }}>Digestive Health</option>
          <option value="skin" {{ old('concern') == 'skin' ? 'selected' : '' }}>Skin & Beauty</option>
          <option value="sleep" {{ old('concern') == 'sleep' ? 'selected' : '' }}>Sleep Issues</option>
          <option value="weight" {{ old('concern') == 'weight' ? 'selected' : '' }}>Weight Management</option>
          <option value="chronic" {{ old('concern') == 'chronic' ? 'selected' : '' }}>Chronic Disease</option>
          <option value="general" {{ old('concern') == 'general' ? 'selected' : '' }}>General Wellness</option>
          <option value="other" {{ old('concern') == 'other' ? 'selected' : '' }}>Other</option>
        </select>

        {{-- custom dropdown arrow --}}
        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
          <i class="fa-solid fa-chevron-down text-[var(--muted-foreground)]"></i>
        </div>

        @error('concern')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </label>
    </div>

    {{-- Message --}}
    <label class="block">
      <span class="sr-only">Additional details</span>
      <textarea
        name="message"
        placeholder="Tell us more about your health concerns (optional)"
        class="w-full p-4 rounded-lg border border-[var(--border)] bg-white min-h-[140px] focus:outline-none focus:ring-2 focus:ring-[var(--primary-green)] transition"
      >{{ old('message') }}</textarea>
      @error('message')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
      @enderror
    </label>

    {{-- Privacy / consent --}}
    <div class="flex items-start gap-3">
      <input id="consent" name="consent" type="checkbox" class="mt-1 w-4 h-4 rounded border-[var(--border)] focus:ring-[var(--primary-green)]" {{ old('consent') ? 'checked' : '' }}>
      <label for="consent" class="text-sm text-[var(--muted-foreground)]">
        I agree to the <a href="/privacy" class="text-[var(--primary-green)] underline">privacy policy</a> and terms. You may receive appointment-related messages.
      </label>
    </div>

    {{-- Submit --}}
    <div>
      <button
        type="submit"
        class="w-full inline-flex items-center justify-center gap-3 px-6 py-3 rounded-lg bg-[var(--primary-green)] text-white font-medium shadow hover:shadow-lg transform transition"
      >
        <i class="fa-solid fa-paper-plane"></i>
        Submit Consultation Request
      </button>

      <p class="text-xs text-center text-[var(--muted-foreground)] mt-3">
        We’ll respond within 24 hours. Unsubscribe anytime.
      </p>
    </div>
  </form>
</div>
