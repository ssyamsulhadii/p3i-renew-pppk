<div class="container">
    <div class="page-body mt-2">
        <div class="container">
            <div class="row row-cards">
                <div class="{{ $setcol ?? 'col-lg-8' }} m-auto">
                    <x-events.alert-success></x-events.alert-success>
                    <x-events.alert-warning></x-events.alert-warning>
                    <div class="card mt-4">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
