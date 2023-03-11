
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">اضافة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_ajax_post" class="fabrikForm" data-action="{{ route('surnames.store') }}">
                    @csrf
                    <x-inputs.surname className="col-12 " />
                    <x-inputs.lang className="col-12 pt-2" />
                   <x-buttons.submit className="col-3" label="اضافة" /> 

                </form>
            </div>
        </div>
    </div>
</div>