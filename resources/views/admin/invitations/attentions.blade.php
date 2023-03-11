@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h2>User <b>Management</b></h2>
                                </div>
                                <div class="col-sm-7">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addModal">
                                        اضافة
                                    </button>
                                    <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i>
                                        <span>Export to Excel</span></a>
                                </div>
                            </div>
                        </div>
                        <form class="row g-3" id="form_ajax_post_search" method="post"
                            data-action="{{ route('search.attentions') }}">
                            @csrf
                            <div class="col-auto">
                                <label for="inputname" >الاسم </label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-auto">
                                <label for="email" >البريد الالكتروني</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="col-auto">
                                <label for="mobile" >رقم الجوال</label>
                                <input type="text" class="form-control" name="mobile" id="mobile">
                            </div>
                            <div class="col-auto">
                                <label for="mobile" >تأكيد الحضور</label>
                                <select id="attend_confirm" class="form-select" name="attend_confirm">
                                    <option value="2">الكل</option>
                                    <option value="0">لا</option>
                                    <option value="1">نعم</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">بحث</button>
                            </div>
                        </form>

                        
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if (session()->has('error2'))
                            <div class="alert alert-danger">
                                {{ session()->get('error2') }}
                            </div>
                        @endif

                        
                        <table class="table table-striped table-hover" id="table_attentions">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>تاريخ الارسال</th>
                                    <th>الاسم</th>
                                    <th>الجوال</th>
                                    <th>البريد الالكتروني</th>
                                    <th><input type="checkbox"></th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($invos as $invo)
                                    <tr>
                                        <td>{{ $invo->id }}</td>
                                        <td>{{ $invo->created_at->format('Y-m-d H:m:s') }}</td>
                                        <td>{{ $invo->name }}</td>

                                        <td>{{ $invo->mobile }}</td>
                                        <td>{{ $invo->email }}</td>
                                        <td> <input type="checkbox"></td>
                                        <td>
                                            <a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i
                                                    class="material-icons">&#xe3c9;</i></a>
                                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                    class="material-icons">&#xE5C9;</i></a>
                                            <a href="#" class="settings" title="استعراض" data-toggle="tooltip"><i
                                                    class="material-icons">&#xe8b6;</i></a>
                                            <a href="#" class="settings" title="طباعة" data-toggle="tooltip"><i
                                                    class="material-icons">&#xe8ad;</i></a>
                                            <a href="#" class="settings" title="طباعة مع حلفية"
                                                data-toggle="tooltip"><i
                                                    class="material-icons text-success">&#xe8ad;</i></a>

                                        </td>
                                    </tr>
                                @empty
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('modals.new_invo')
    @include('modals.edit_invo')
    @include('modals.delete_invo')
@endsection
