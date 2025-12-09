@props(['src' => '', 'alt' => '', 'class' => 'w-full'])

<img src="{{ $src }}" alt="{{ $alt }}" class="{{ $class }}"
    onerror="this.onerror=null;this.src='/images/fallback.jpg';" />