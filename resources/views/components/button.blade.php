@props(['color' => 'blue'])
<button {{ $attributes(['class' => 'px-3 py-1 border border-black min-w-20 hover:text-'.$color.'-600 rounded transition transform hover:scale-105']) }} >{{ $slot }}</button>
