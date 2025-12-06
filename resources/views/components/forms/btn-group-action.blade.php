@props(['linkedit', 'linkdelete'])

<a href="{{ $linkedit }}" class="btn btn-secondary px-1 py-1" {{ $attributes }}>
    <x-icons.icon-edit></x-icons.icon-edit>
</a>

@if ($linkdelete ?? '')
    <button data-url="{{ $linkdelete }}" class="btn btn-danger px-1 py-1 btn-hapus" data-bs-toggle="modal"
        data-bs-target="#modal-simple">
        <x-icons.icon-delete></x-icons.icon-delete>
    </button>
@endif

<x-others.modal-form-hapus></x-others.modal-form-hapus>
