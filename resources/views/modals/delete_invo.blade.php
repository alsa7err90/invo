<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" id="form_delete">
                @csrf
                @method('DELETE') 
               <x-other.textdelete />
                <div class="modal-footer">
                    <x-buttons.cancel className="col-auto" label="الغاء"  />  
                   <x-buttons.submit className="col-auto" label="حذف"  />  
                </div>
            </form>
        </div>
    </div>
</div>
