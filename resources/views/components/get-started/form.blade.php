<div class="border-[var(--border)] shadow-lg rounded-2xl p-8 bg-white mt-6">
  <h2 class="text-2xl text-[var(--neutral-dark)] mb-2">Book Your Consultation</h2>
  <p class="text-[var(--muted-foreground)] mb-6">
    Fill out the form below and we'll get back to you shortly
  </p>

  <form method="POST" action="{{ route('appointments.store') }}" class="space-y-3">
    @csrf

    {{-- Full name + Phone --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
      <div>
        <label class="block text-sm font-medium mb-1">Full name</label>
        <input type="text" name="name" required value="{{ old('name') }}" placeholder="Your full name"
          class="w-full rounded-lg border px-4 py-3 focus:ring-2 focus:ring-[var(--primary-green)] focus:outline-none" />
        @error('name')
          <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Phone</label>
        <input type="text" name="phone" required value="{{ old('phone') }}" placeholder="+91 98765 43210"
          class="w-full rounded-lg border px-4 py-3 focus:ring-2 focus:ring-[var(--primary-green)] focus:outline-none" />
        @error('phone')
          <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>
    </div>

    {{-- Email + Preferred Date --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-medium mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com"
          class="w-full rounded-lg border px-4 py-3 focus:ring-2 focus:ring-[var(--primary-green)] focus:outline-none" />
        @error('email')
          <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Preferred date</label>
        <input type="date" name="preferred" value="{{ old('preferred') }}"
          class="w-full rounded-lg border px-4 py-3 focus:ring-2 focus:ring-[var(--primary-green)] focus:outline-none" />
      </div>
    </div>

    {{-- Therapy --}}
    <div>
      <label class="block text-sm font-medium mb-1">Choose therapy (optional)</label>
      <select name="therapy_slug"
        class="w-full rounded-lg border px-4 py-3 focus:ring-2 focus:ring-[var(--primary-green)] focus:outline-none">
        <option value="">— Select therapy —</option>
        @foreach($therapies ?? [] as $therapy)
          <option value="{{ $therapy->slug }}" {{ old('therapy_slug') === $therapy->slug ? 'selected' : '' }}>
            {{ $therapy->title }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Notes --}}
    <div>
      <label class="block text-sm font-medium mb-1">Notes (optional)</label>
      <textarea name="notes" rows="4" placeholder="Briefly describe your concern or goals"
        class="w-full rounded-lg border px-4 py-3 focus:ring-2 focus:ring-[var(--primary-green)] focus:outline-none">{{ old('notes') }}</textarea>
    </div>

    {{-- Hidden source --}}
    <input type="hidden" name="source_page" value="{{ request()->path() }}">

    {{-- Submit --}}
    <button type="submit"
      class="w-full inline-flex items-center justify-center gap-3 px-6 py-3 rounded-lg bg-[var(--primary-green)] text-white font-medium shadow hover:shadow-lg transition">
      <i class="fa-solid fa-paper-plane"></i>
      Submit Consultation Request
    </button>

 
  </form>
</div>