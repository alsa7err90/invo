@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-7">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        اضافة
                                    </button>
                                </div>
                            </div>
                        </div>
                        <form class="row g-3" id="form_ajax_post_search" method="post"
                            data-action="{{ route('search.table') }}">
                            @csrf
                            <div class="col-auto">
                                <label for="inputname">الاسم </label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>


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
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ getUsernameById($item->invitation) }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ getStatusTable($item->status) }}</td>
                                        <td> <input type="checkbox"></td>
                                        <td>
                                            <a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i
                                                    class="material-icons">&#xe3c9;</i></a>
                                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                    class="material-icons">&#xE5C9;</i></a>
                                            <a href="#" data-toggle="tooltip">
                                                سجل التغييرات
                                            </a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="form_ajax_post" class="fabrikForm"
                        data-action="{{ route('tables.store') }}" enctype="application/x-www-form-urlencoded">
                        @csrf

                        <div class="row g-3 align-items-center p-2">
                            <div class="col-3">
                                <label for="code" class="col-form-label">رمز الكرسي </label>
                            </div>
                            <div class="col-4">
                                <input type="text" name="code" id="code"class="form-control">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center p-2">
                            <div class="col-3">
                                <label for="code" class="col-form-label">نوع الكرسي</label>
                            </div>
                            <div class="col-4">
                                <select name="type">
                                    <option value>غير محدد</option>
                                    <option value="vip">vip</option>
                                    <option value="normal">عادي</option>
                                </select>
                            </div>
                        </div>


                        <div class="row g-3 align-items-center p-2">
                            <div class="col-3">
                                <label for="image" class="col-form-label">صورة لموقع الكرسي</label>
                            </div>
                            <div class="col-4">
                                <input type="file" name="image" id="image"class="form-control">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary button _">
                            ارسال</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
