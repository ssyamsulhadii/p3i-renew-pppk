@props(['title', 'link', 'action'])
<div class="card-header bg-primary p-0 px-2 text-white">
    <h3 class="pt-3">{{ $title }}</h3>
    <x-forms.btn-link tag='link' href='{{ $link }}' color='btn-yellow ms-auto'>
        @if ($action == 'Tambah')
            <x-icons.icon-add></x-icons.icon-add>
        @elseif($action == 'Kembali')
            <x-icons.icon-back></x-icons.icon-back>
        @endif
    </x-forms.btn-link>
</div>
