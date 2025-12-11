<div class="border rounded-xl bg-white shadow p-8 text-center space-y-4">
    <div class="w-16 h-16 mx-auto rounded-full bg-green-100 flex items-center justify-center">
        <i class="{{ $icon }} text-green-600 text-3xl"></i>
    </div>

    <h3 class="text-xl font-bold text-gray-800">{{ $title }}</h3>

    <p class="text-gray-600">{{ $slot }}</p>
</div>
