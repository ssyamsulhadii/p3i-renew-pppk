@props(['post'])
@if ($post->path_singgle_dokumen)
    <a href="{{ $post->path_singgle_dokumen }}" target="_blank" title="{{ $post->listPostDokumen()->first()->judul }}">
        <x-icons.icon-filepdf></x-icons.icon-filepdf>
    </a>
@else
    <x-icons.icon-nofile></x-icons.icon-nofile>
@endif
