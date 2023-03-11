<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="form_delete">
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <h5 class="text-center">تحذير </h5>
                </div>


                <div class="modal-body">
                    <p>Are you sure you want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">نعم , احذف</button>
                </div>
            </form>
        </div>
    </div>
</div>
