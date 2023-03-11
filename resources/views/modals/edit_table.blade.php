<div class="modal fade" id="modal_edit_table" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_ajax_post_edit"  data-action="" data-id=""
                    enctype="application/x-www-form-urlencoded">
                    @csrf
                    {{ method_field('PUT') }}
                    <x-inputs.table_code className="col-auto" />
                    <x-inputs.list_users_invo className="col-auto" />
                     
                    <x-inputs.table_type className="col-auto" />
                    <x-inputs.table_image className="col-auto" />
                     <x-buttons.submit className="col-auto" label="تحديث" />

                </form>
            </div>
        </div>
    </div>
</div>
