@push('style')
    <style>
        .cross-x {
            font-size: 22px;
            border-radius: 50%;
            top: 12px;
            right: 20px;
            cursor: pointer;
        }

        .cross-x:hover {
            opacity: .7;
        }
    </style>
@endpush
<div class="mb-3">
    <label class="form-label">Foto</label>
    <div class="card card-body bg-secondary-lt d-flex justify-content-center container-upload-foto"
        style="height: 180px; border: 2px dashed #d5d5e1;">
        <span class="text-center inner-text">
            Drag & Drop foto here or <span class="text-primary" style="cursor: pointer"
                onclick="document.getElementById('foto').click()">Browser</span>
        </span>
    </div>
    <input type="file" accept=".jpg,.jpeg,.png" name="foto[]" class="foto" id="foto" multiple hidden>

    <div class="row container-foto">
        {{-- @for ($i = 0; $i < 3; $i++)
            <div class="col-3 position-relative my-3">
                <img class="img img-fluid p-1" style="border-radius: 10px"
                    src="{{ asset('assets/img/galeri-foto/example-9.jpg') }}">
                <span class="position-absolute bg-danger px-2 text-white cross-x">&times;</span>
            </div>
        @endfor --}}
    </div>
</div>

@push('script')
    <script>
        let files = [];
        let form = document.querySelector('form');
        let containerFoto = document.querySelector('.container-foto');
        let containerUploadFoto = document.querySelector('.container-upload-foto');
        let inputFoto = document.querySelector('.foto');

        inputFoto.addEventListener('change', () => {
            // alert("OK");
            let file = inputFoto.files;
            for (let i = 0; i < file.length; i++) {
                if (files.every(e => e.name !== file[i].name)) files.push(file[i]);
            }
            form.reset();
            showFoto();
        });

        const showFoto = () => {
            let images = '';
            files.forEach((e, i) => {
                if (['jpg', 'jpeg', 'png'].includes(e.name.split(".").pop())) { //jpg jpeg png
                    images += `<div class="col-3 position-relative my-3">
                            <img class="img img-fluid p-1" style="border-radius: 10px"
                                src="${URL.createObjectURL(e)}">
                            <span onclick="delFoto(${i})" class="position-absolute bg-danger px-2 text-white cross-x">&times;</span>
                        </div>`
                }
            })
            containerFoto.innerHTML = images;
        }

        const delFoto = index => {
            files.splice(index, 1);
            showFoto();
        }

        containerUploadFoto.addEventListener('dragover', e => {
            e.preventDefault();
            containerUploadFoto.classList.remove('bg-secondary-lt');
            containerUploadFoto.classList.add('bg-secondary-subtle');
        })

        containerUploadFoto.addEventListener('dragleave', e => {
            e.preventDefault();
            containerUploadFoto.classList.remove('bg-secondary-subtle');
            containerUploadFoto.classList.add('bg-secondary-lt');
        })

        containerUploadFoto.addEventListener('drop', e => {
            e.preventDefault();
            let file = e.dataTransfer.files;
            for (let i = 0; i < file.length; i++) {
                if (files.every(e => e.name !== file[i].name)) files.push(file[i])
            }
            showFoto();
        })
    </script>
@endpush
