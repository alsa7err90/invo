<div class="modal fade" id="modal_edit_user" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">تعديل</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <span class="loader_model"></span>
                <div class="modal_body" style="display: none">
                    <form method="post" id="form_ajax_post_edit" class="fabrikForm" data-action="" data-id=""
                        enctype="application/x-www-form-urlencoded">
                        @csrf
                        {{ method_field('PUT') }}
                        <x-inputs.nickname className="col-auto" />
                        <x-inputs.email className="col-auto" />
                        <x-inputs.password className="col-auto" />
                        <x-inputs.password2 className="col-auto" />
                        <x-buttons.submit className="col-auto" label="تحديث" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
