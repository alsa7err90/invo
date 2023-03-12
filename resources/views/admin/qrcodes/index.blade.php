@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <x-other.title target="addModal">
                            <x-slot name="title">Qrcode</x-slot>
                        </x-other.title>

                        <x-alert.success />
                        <x-alert.error /> 

                        <div class="col-12"> 
                            <label for="mobile">qrcode</label>
                            <input class="form-control" id="input_qrcode" name="qrcode" type="text"  >
                        </div>
                        
                        <button type="button" class="btn btn-primary button _" id="createQrcode"  name="Submit"   data-bs-toggle="modal" data-bs-target="#qrcodeModal" style="opacity: 1;">
                            ارسال</button>

                            <div class="modal fade" id="qrcodeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">انشاء باركود</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="generate_qrcode" >
                                    
                                </div>
                                </div>
                            </div>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->



    @include('modals.new_user')
    @include('modals.edit_user')
    @include('modals.delete_invo')
    @include('modals.new_permission')
    
@endsection