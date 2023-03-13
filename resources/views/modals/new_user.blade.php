<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_ajax_post" class="fabrikForm" data-action="{{ route('users.store') }}">
                    @csrf

                    <x-inputs.nickname className="col-lg-6" />
                    <x-inputs.email className="col-lg-6" />
                    <x-inputs.password className="col-lg-6" />
                    <x-inputs.password2 className="col-lg-6" />

                    <x-buttons.submit className="col-lg-6" label="اضافة" />

                </form>
            </div>
        </div>
    </div>
</div>
