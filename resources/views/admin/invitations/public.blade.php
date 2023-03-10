@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5"> 
                        <x-other.title target="addModal" :export="route('invitations.exportPublic')">
                            <x-slot name="title"> الدعوات العامة </x-slot>
                        </x-other.title>
                        <form class="row g-3" id="form_ajax_post_search" method="post"
                            data-action="{{ route('search.public') }}">
                            @csrf 
                            <x-inputs.fullname className="col-md-3" />
                            <x-inputs.email className="col-md-3" />
                            <x-inputs.mobile className="col-md-3" />
                            <x-inputs.group className="col-md-3" />
                            <x-inputs.status className="col-md-3" />
                            <x-inputs.is_out className="col-md-3" />
                            <x-buttons.submit className="col-md-3"  label="بحث" /> 
                        </form>
                        <x-alert.success />
                        <x-alert.error />

                        <table class="table table-striped table-hover" id="table_attentions">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    <th>تاريخ الارسال</th>
                                    <th>الاسم</th>
                                    <th>الجوال</th>
                                    <th>البريد الالكتروني</th>
                                    <th>حالة الطلب</th>
                                    <th>داخلي/خارجي</th>
                                    <th><input type="checkbox"></th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($invos as $invo)
                                    <tr class="{{ $invo->id }}">
                                        <td>{{ $invo->id }}</td>
                                        <td>{{ $invo->created_at->format('Y-m-d H:m:s') }}</td>
                                        <td>{{ $invo->name }}</td>
                                        <td>{{ $invo->mobile }}</td>
                                        <td>{{ $invo->email }}</td>
                                        <td>{{ getStatus($invo->status) }}</td>
                                        <td>{{ $invo->is_out == 1 ? 'خارجي' : '' }}</td>
                                        <td> <input type="checkbox"></td>
                                        <td>
                                            <x-buttons.edit target="modal_edit_public" :id="$invo->id"
                                                :url="route('invitations.edit', $invo->id)"  modal="editInvo" />
                                            <x-buttons.delete target="deleteModal" :url="route('invitations.destroy', $invo->id)" />
                                            <x-buttons.show target="modal_show_invo" :url="route('invitations.show', $invo->id)" />
                                                <x-buttons.print_black   :url="route('invitations.print', $invo->id)" />
                                                    <x-buttons.print_colors   :url="route('invitations.print', $invo->id)" />
                                        </td>
                                    </tr>
                                @empty
                                @endforelse


                            </tbody>

                        </table> 
                        <x-paginate :items='$invos' /> 
                    </div>
                </div>
            
    <!-- Modal -->
    @include('modals.edit_invo')
    @include('modals.new_invo')
    @include('modals.delete_invo')
    @include('modals.show_invo')
@endsection
