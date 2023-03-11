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
                        <x-inputs.radio_group />
                        <x-inputs.radio_group2 />
                        <x-inputs.fullname />
                        <x-inputs.email />

                        <x-inputs.email2 />
                        <x-inputs.side />

                        @if ($route == 'invitations.attentions')
                            <x-inputs.mobile />
                        @endif
                        <x-inputs.position />

                        <x-inputs.group />

                        @if ($route == 'invitations.public')
                            <x-inputs.send_email_with_change_status />
                        @endif

                        @if ($route != 'invitations.attentions')
                            <x-inputs.attend />
                            <x-inputs.attend_confirm />
                        @endif
                        @if ($route == 'invitations.attentions')
                            <div class="row">
                                <x-inputs.lang />


                                <x-inputs.send_email />
                                <x-inputs.send_whatsapp />
                                <x-inputs.radio_attend_confirm />
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary button _">
                        ارسال</button>

                </form>
            </div>
        </div>
    </div>
</div>
