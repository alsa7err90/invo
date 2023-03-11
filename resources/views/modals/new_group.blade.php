<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_ajax_post" class="fabrikForm"
                    data-action="{{ route('groups.store') }}">
                    @csrf
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
                                aria-label="default input add">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary button _">
                        ارسال</button>

                </form>
            </div>
        </div>
    </div>
</div>
