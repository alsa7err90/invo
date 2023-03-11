
 
    <div class="modal fade" id="modal_edit_group" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form_ajax_post_edit" class="fabrikForm"
                        data-action="" data-id="" enctype="application/x-www-form-urlencoded">
                        @csrf
                        {{ method_field('PUT') }}
                      
                        
                        <div class="row">
                            <div class="col-md-12">
                                <p> اللون</p>
    
                                <input type="text" name="color" class="coloris instance1" data-coloris
                                    value="rgb(255, 0, 0)">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p> الاسم</p>
                                <input class="form-control" name="name" type="text"
                                    aria-label="default input example">
                            </div>
                        </div>
                         
                    
                        <button type="submit" class="btn btn-primary button _">تعديل</button>
                            
                    </form>
                </div>
            </div> 
        </div>
    </div> 