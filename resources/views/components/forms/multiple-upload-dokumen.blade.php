{{-- @push('style')
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
@endpush --}}
<div class="mb-3">
    <label class="form-label">Dokumen</label>
    <div class="card card-body bg-secondary-lt d-flex justify-content-center container-upload-dokumen"
        style="height: 180px; border: 2px dashed #d5d5e1;">
        <span class="text-center inner-text">
            Drag & Drop dokumen here or <span class="text-primary" style="cursor: pointer"
                onclick="document.getElementById('dokumen').click()">Browser</span>
        </span>
    </div>
    <input type="file" accept=".doc,.docx,.pdf" name="dokumen[]" class="dokumen" id="dokumen" multiple hidden>

    <div class="card mt-3">
        <div class="list-group list-group-flush container-dokumen">
            {{-- <span class="list-group-item">
                <a href="#" class="text-decoration-none text-primary">Abcdf.pdf</a>
                <span class="position-absolute bg-danger px-2 text-white cross-x">&times;</span>
            </span> --}}
        </div>
    </div>
</div>

@push('script')
    <script>
        // let files = [];
        // let form = document.querySelector('form');
        let containerDokumen = document.querySelector('.container-dokumen');
        let containerUploadDokumen = document.querySelector('.container-upload-dokumen');
        let inputDokumen = document.querySelector('.dokumen');

        inputDokumen.addEventListener('change', () => {

            let file = inputDokumen.files;
            for (let i = 0; i < file.length; i++) {
                if (files.every(e => e.name !== file[i].name)) files.push(file[i]);
            }
            form.reset();
            showDokumen();
        });

        const showDokumen = () => {
            let dokumen = '';
            files.forEach((e, i) => {
                if (['pdf', 'docx', 'doc'].includes(e.name.split(".").pop())) { //pdf docx doc
                    dokumen += `<span class="list-group-item">
                                    <a href="${URL.createObjectURL(e)}" class="text-decoration-none text-primary">${e.name}</a>
                                    <span onclick="delDokumen(${i})" class="position-absolute bg-danger px-2 text-white cross-x">&times;</span>
                                </span>`
                }
            });
            containerDokumen.innerHTML = dokumen;
        }

        const delDokumen = index => {
            files.splice(index, 1);
            showDokumen();
        }

        containerUploadDokumen.addEventListener('dragover', e => {
            e.preventDefault();
            containerUploadDokumen.classList.remove('bg-secondary-lt');
            containerUploadDokumen.classList.add('bg-secondary-subtle');
        })

        containerUploadDokumen.addEventListener('dragleave', e => {
            e.preventDefault();
            containerUploadDokumen.classList.remove('bg-secondary-subtle');
            containerUploadDokumen.classList.add('bg-secondary-lt');
        })

        containerUploadDokumen.addEventListener('drop', e => {
            e.preventDefault();
            let file = e.dataTransfer.files;
            for (let i = 0; i < file.length; i++) {
                if (files.every(e => e.name !== file[i].name)) files.push(file[i])
            }
            showDokumen();
        })
    </script>
@endpush
