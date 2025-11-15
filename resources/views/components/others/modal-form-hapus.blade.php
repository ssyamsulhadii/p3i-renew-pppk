{{-- Modal --}}
<div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="" id="form-hapus" method="POST">
            @csrf @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin menghapus data ini ?</p>
                </div>
                <div class="modal-footer">
                    <x-forms.btn-link type="button" tag='btn' color='btn-secondary me-auto px-3'
                        data-bs-dismiss="modal">Batal</x-forms.btn-link>
                    <x-forms.btn-link type="submit" tag='btn' color='btn-danger px-3' data-bs-dismiss="modal">Ya,
                        Hapus</x-forms.btn-link>
                </div>
            </div>
        </form>
    </div>
</div>



@push('script')
    <script>
        $('.btn-hapus').click(function() {
            let url = $(this).attr('data-url');
            $("#form-hapus").attr('action', url);
        })
        // Jika tombol "Ya, Hapus" di klik, submit form
        // $('#form-hapus [type="submit"]').click(function(){
        //     $("#form-hapus").submit();
        // })
    </script>
@endpush
