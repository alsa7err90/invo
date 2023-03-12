<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_ajax_post" class="fabrikForm" data-action="{{ route('groups.store') }}">
                    @csrf
                    <x-inputs.color className="col-md-12" value="rgb(0,0,0,1)" />
                    <x-inputs.fullname className="col-md-12" />
                    <x-buttons.submit label="تعديل" />
                </form>
            </div>
        </div>
    </div>
</div>
