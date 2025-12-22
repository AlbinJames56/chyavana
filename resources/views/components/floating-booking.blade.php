<div x-data="{
        open: false,
        init() {
            window.__bookingListenerReady = true;

            window.addEventListener('open-booking', () => {
                this.open = true;
                document.body.classList.add('overflow-hidden');
            });

            window.addEventListener('close-booking', () => {
                this.open = false;
                document.body.classList.remove('overflow-hidden');
            });
        }
    }" x-init="init()" x-cloak>
    @php
        // Fetch treatments (published) to show in the dropdown
        try {
            $therapies = \App\Models\Treatment::query()
                ->when(Schema::hasColumn((new \App\Models\Treatment)->getTable(), 'status'), function ($q) {
                    $q->where('status', 'published');
                })
                ->orderBy('title', 'asc')
                ->get();
        } catch (\Throwable $e) {
            \Log::error('Failed to load treatments for booking dropdown: ' . $e->getMessage());
            $therapies = collect();
        }

        // Optional: fetch clinics if you have a Clinic model/table
        try {
            $clinics = \App\Models\Clinic::orderBy('city')->get();
        } catch (\Throwable $e) {
            $clinics = collect();
        }
    @endphp

    <!-- Overlay -->
    <div x-show="open"
     class="fixed inset-0 z-[80] bg-black/50"
     @click="open = false; document.body.classList.remove('overflow-hidden')">
</div>

    <!-- Modal -->
   <div x-show="open"
     x-transition
     class="fixed inset-0 z-[100] flex items-center justify-center px-4">
        <div @click.stop class="bg-white w-full max-w-2xl rounded-2xl shadow-xl p-6 relative mt-6">
            <!-- Close -->
            <button class="absolute top-4 right-4 text-gray-500 hover:text-black"
                @click="open = false; document.body.classList.remove('overflow-hidden')">
                ✕
            </button>

            <h2 class="text-2xl font-semibold mb-4 text-center">
                Book Consultation
            </h2>

            {{-- FORM --}}
            <form method="POST" action="{{ route('appointments.store') }}" class="space-y-6">
                @csrf

                {{-- Full name + Phone --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Full name</label>
                        <input type="text" name="name" required placeholder="Your full name"
                            class="w-full rounded-lg border px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Phone</label>
                        <input type="text" name="phone" required placeholder="+91 00000 00000"
                            class="w-full rounded-lg border px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" />
                    </div>
                </div>

                {{-- Email + Preferred Date --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Email</label>
                        <input type="email" name="email" placeholder="you@example.com"
                            class="w-full rounded-lg border px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Preferred date</label>
                        <input type="date" name="preferred"
                            class="w-full rounded-lg border px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" />
                    </div>
                </div>

                {{-- Therapy --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Choose therapy (optional)</label>
                    <select name="therapy_slug"
                        class="w-full rounded-lg border px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none">
                        <option value="">— Select therapy —</option>
                        @foreach($therapies ?? [] as $therapy)
                            <option value="{{ $therapy->slug }}">{{ $therapy->title }}</option>
                        @endforeach
                    </select>
                    <p class="text-xs text-gray-500 mt-1">
                        Selecting a therapy helps us prepare before your consultation.
                    </p>
                </div>



                {{-- Notes --}}
                <div>
                    <label class="block text-sm font-medium mb-1">Notes (optional)</label>
                    <textarea name="notes" rows="4" placeholder="Briefly describe your concern or goals"
                        class="w-full rounded-lg border px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none"></textarea>
                </div>

                {{-- Hidden source --}}
                <input type="hidden" name="source_page" value="{{ request()->path() }}">

                {{-- Actions --}}
                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" class="px-4 py-2 rounded-lg border"
                        onclick="window.dispatchEvent(new Event('close-booking'))">
                        Cancel
                    </button>

                    <button type="submit" class="px-5 py-2 rounded-lg bg-green-600 text-white hover:bg-green-700">
                        Request Booking
                    </button>
                </div>

                <p class="text-xs text-gray-500">
                    We respect your privacy. Our team will contact you to confirm your appointment.
                </p>
            </form>
        </div>
    </div>
</div>