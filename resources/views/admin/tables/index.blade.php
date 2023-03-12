@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center  pt-5">

            <x-other.title target="addModal">
                <x-slot name="title">الكراسي </x-slot>
            </x-other.title>
            <x-alert.success />
            <x-alert.error />
            <form class="row g-3" id="form_ajax_post_search" method="post" data-action="{{ route('search.table') }}">
                @csrf
                <x-inputs.fullname label="المدعو" className="col-4" /> 
               <x-inputs.tabletype  className="col-4" /> 
               <x-buttons.submit label="بحث" className="col-4" />
               
            </form>

            <div class="table-responsive">
                <table class="table table-striped table-hover" id="table_attentions">
                    <thead>
                        <tr>
                            <th>م</th>
                            <th>رمز الكرسي</th>
                            <th>المدعو </th>
                            <th>فئة الكرسي </th>
                            <th>حالة الكرسي </th>

                            <th><input type="checkbox" /></th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($tables as $item)
                            <tr class="{{ $item->id }}">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ getUsernameById($item->invitation) }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ getStatusTable($item->status) }}</td>
                                <td> <input type="checkbox"></td>
                                <td>
                                    <x-buttons.edit target="modal_edit_table" :id="$item->id" :url="route('tables.edit', $item->id)"
                                        modal="editTable" />
                                    <x-buttons.delete target="deleteModal" :url="route('tables.destroy', $item->id)" />
                                    <x-buttons.show target="modal_show_invo" :url="route('tables.show', $item->id)"  title="سجل التحديثات" />
                                </td>
                            </tr>
                        @empty
                        @endforelse


                    </tbody>
                </table>
                <x-paginate :items='$tables' />
            </div>
        </div>
    </div>

    <!-- Modal -->

    @include('modals.new_table')
    @include('modals.edit_table')
    @include('modals.delete_invo')
    @include('modals.show_invo')
    @include('modals.image')
@endsection
