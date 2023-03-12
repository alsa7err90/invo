<div class="modal fade" id="modal_edit_group" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="loader_model"></span>
                <div class="modal_body" style="display: none"> 
                    <form method="post" id="form_ajax_post_edit" class="fabrikForm" data-action="" data-id=""
                        enctype="application/x-www-form-urlencoded">
                        @csrf
                        {{ method_field('PUT') }}
                        <x-inputs.color className="col-md-12" value="rgb(0,0,0,1)" />
                        <x-inputs.fullname className="col-md-12" />
                        <x-buttons.submit label="تعديل" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
