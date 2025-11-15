@props(['tag', 'color'])

@if ($tag == 'btn')
    <button {{ $attributes }} class="btn {{ $color }} px-1 py-1">{{ $slot }}</button>
@elseif($tag == 'link')
    <a {{ $attributes }} class="btn {{ $color }} px-1 py-1">{{ $slot }}</a>
@endif
