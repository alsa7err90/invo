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
                    <div class="col-12">
                        <label>رمز الكرسي </label>
                        <div id="code" type="text"> </div>
                    </div>
 
                    <x-inputs.list_users_invo className="col-auto" />
                    <div class="col-12">
                        <label>رمز الكرسي </label>
                        <div  id="type" type="text"> </div>
                    </div>  
                     <x-buttons.submit className="col-auto" label="تحديث" />

                </form>
               
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" id="postition_table" data-src=""> مخطط الكرسي</button>
            </div>
        </div>
    </div>
</div>
