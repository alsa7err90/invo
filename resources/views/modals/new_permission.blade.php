 <div class="modal fade" id="addModalPermission" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addModalLabel"> الصلاحيات</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="post" id="form_ajax_post_edit_1"  data-action="" data-id > 
                     @csrf
                     <div class="checkboxes">
                         @forelse ($list_permission as $item)
                             <x-inputs.checkbox :label="$item->title_ar" :value="$item->id" name="permissions[]" />
                         @empty
                         @endforelse
                     </div>
                     <x-buttons.submit label="اضافة" className="col-6" />

                 </form>
             </div>
         </div>
     </div>
 </div>
