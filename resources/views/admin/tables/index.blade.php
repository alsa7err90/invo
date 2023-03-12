@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <x-other.title target="addModal">
                            <x-slot name="title">الكراسي </x-slot>
                        </x-other.title>
                        <x-alert.success />
                        <x-alert.error />
                        <form class="row g-3" id="form_ajax_post_search" method="post"
                            data-action="{{ route('search.table') }}">
                            @csrf
                           <x-inputs.fullname label="المدعو" className="col-auto" />


                            <div class="col-auto">
                                <label for="mobile">فئة الكرسي</label>
                                <select id="type" class="form-select" name="type">
                                    <option value>الكل</option>
                                    <option value="vip">vip</option>
                                    <option value="normal">عادي</option>
                                    <option value="empty">لم يتم التعيين</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <label for="mobile">حالة الكرسي</label>
                                <select id="state" class="form-select" name="state">
                                    <option value>الكل</option>
                                    <option value="1">محجوز</option>
                                    <option value="0">فارغ</option> 
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">بحث</button>
                            </div>
                        </form>
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
                                            <x-buttons.edit target="modal_edit_table" :id="$item->id" :url="route('tables.edit', $item->id)"  modal="editTable" />
                                            <x-buttons.delete target="deleteModal" :url="route('tables.destroy', $item->id)" />
    
                                           <a href="#" data-toggle="tooltip">
                                                سجل التغييرات
                                            </a>
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
        </div>
    </div>

    <!-- Modal -->
   
    @include('modals.new_table')
    @include('modals.edit_table')
    @include('modals.delete_invo')
@endsection
