<?php
$route = \Request::route()->getName();
// invitations.index
// invitations.attentions
// invitations.public
//
?>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">{{ $route }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_ajax_post" class="fabrikForm"
                    data-action="{{ route('invitations.store') }}" enctype="application/x-www-form-urlencoded">
                    @csrf
                    <div class="row">
                        <x-inputs.radio_group  className="col-6"/>
                        <x-inputs.radio_group2  className="col-6"/>
                        <x-inputs.fullname className="col-6"/>
                        <x-inputs.email  className="col-6"/>

                        <x-inputs.email2  className="col-6"/>
                        <x-inputs.side  className="col-6"/>

                        @if ($route == 'invitations.attentions')
                            <x-inputs.mobile className="col-6" />
                        @endif
                        <x-inputs.position className="col-6" />

                        <x-inputs.group  className="col-6"/>

                        @if ($route == 'invitations.public')
                            <x-inputs.send_email_with_change_status className="col-6" />
                        @endif

                        @if ($route != 'invitations.attentions')
                            <x-inputs.attend  className="col-6"/>
                            <x-inputs.attend_confirm  className="col-6"/>
                        @endif
                        @if ($route == 'invitations.attentions')
                            <div class="row">
                                <x-inputs.lang className="col-6" />


                                <x-inputs.send_email  className="col-6"/>
                                <x-inputs.send_whatsapp  className="col-6"/>
                                <x-inputs.radio_attend_confirm  className="col-6"/>
                                <input type="hidden" name="is_attentions" value="1" />
                        @endif
                    </div>
                  <x-buttons.submit label="اضافة" className="col-6" />

                </form>
            </div>
        </div>
    </div>
</div>
