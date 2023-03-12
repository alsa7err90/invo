<?php
$route = \Request::route()->getName();
// invitations.index
// invitations.attentions
// invitations.public
//
?>

<div class="modal fade" id="modal_edit_public" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="row"> 
                            <x-inputs.radio_group className="col-md-6" />
                            <x-inputs.radio_group2 className="col-lg-6" /> 
                        </div>
                        <div class="row">
                            <x-inputs.fullname className="col-lg-6" />
                            <x-inputs.email className="col-lg-6" />



                        </div>
                        <div class="row">
                            <x-inputs.email2 className="col-lg-6" />
                            <x-inputs.side className="col-lg-6" />
                        </div>


                        @if ($route == 'invitations.attentions')
                            <x-inputs.mobile className="col-lg-6" />
                        @endif
                        <x-inputs.position className="col-lg-6" />

                        <x-inputs.group className="col-lg-6" />

                        @if ($route == 'invitations.public')
                            <x-inputs.send_email_with_change_status className="col-lg-6" />
                        @endif

                        @if ($route != 'invitations.attentions')
                            <x-inputs.attendconfirm className="col-lg-6" />
                            <x-inputs.attend className="col-lg-6" />
                        @endif
                        @if ($route == 'invitations.attentions')
                            <x-inputs.lang className="col-lg-6" />
                            <x-inputs.send_email className="col-lg-6" />
                            <x-inputs.send_whatsapp className="col-lg-6" />
                            <x-inputs.radio_attend_confirm className="col-lg-6" />
                            <input type="hidden" name="is_attentions" value="1" />
                        @endif
                </div>
                <x-buttons.submit label="تعديل" className="col-lg-6" />
           
            </form> </div>
        </div>
    </div>
</div>
</div>
