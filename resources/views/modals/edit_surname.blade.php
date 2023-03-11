<div class="modal fade" id="modal_edit_surname" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_ajax_post_edit" class="fabrikForm" data-action="" data-id=""
                    enctype="application/x-www-form-urlencoded">
                    @csrf
                    {{ method_field('PUT') }}
                    <x-inputs.surname className="col-12 " />
                    <x-inputs.lang className="col-12 pt-2" />
                    <x-buttons.submit label="تعديل" className="col-3" />
                </form>
            </div>
        </div>
    </div>
</div>
