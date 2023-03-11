
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
                                    <h2>الدعوات العامة </h2>
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
                        <form id="form_ajax_post_search" method="post" data-action="{{ route('search.all') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-auto">
                                    <label for="inputname">الاسم </label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="col-auto">
                                    <label for="email">البريد الالكتروني</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="col-auto">
                                    <label for="mobile">  فئة الكرسي </label>
                                    <select id="seattype" class="form-select" name="seattype">
                                        <option value>الكل</option>
                                        <option value="vip">vip</option>
                                        <option value="normal">عادي</option>
                                        <option value="empty">لم يتم التعيين</option>
                                    </select>
                                </div>


                                <div class="col-auto">
                                    <label for="mobile">رقم الجوال</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile">
                                </div>
                                 
                            </div>
                            <div class="row g-3">
                                <div class="col-auto">
                                    <label for="mobile">حالة الطلب</label>
                                    <select id="status" class="form-select" name="status">
                                        
                                        <option value>الكل</option>
                                        <option value="1">قيد الدراسة</option>
                                        <option value="2">تم التأكيد</option>
                                        <option value="3">تم الاعتذار</option>
                                    </select>
                                </div>
                                
                                <div class="col-auto">
                                    <label for="mobile">نوع الدعوة</label>
                                    <select id="is_attentions" class="form-select" name="is_attentions">
                                        <option value>الكل</option>
                                        <option value="0">دعوة</option>
                                        <option value="1">تسجيل</option>
                                    </select>
                                </div>

                                <div class="col-auto">
                                    <label for="mobile">الفئة</label>
                                    <select id="group" class="form-select" name="group">
                                        <option value>الكل</option>
                                        @forelse ( $list_groups as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>


                                <div class="col-auto">
                                    <label for="mobile">داخلي / خارجي</label>
                                    <select id="is_out" class="form-select" name="is_out">
                                        <option value>الكل</option>
                                        <option value="0">داخلي</option>
                                        <option value="1">خارجي</option>
                                    </select>
                                </div>

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
                                    <th>م</th>
                                    <th>تاريخ الارسال</th>
                                    <th>الاسم</th>
                                    <th>الجوال</th>
                                    <th>البريد الالكتروني</th>
                                    <th> نوع الدعوة</th>
                                    <th>رمز المقعد</th>
                                    <th>الفئة</th>
                                    <th>هل حضر الحفل</th>
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
                                        <td>{{ getStatusAttentions($invo->is_attentions) }}</td>
                                        <td>{{ $invo->seatcode }}</td>
                                        <td>{{ getNameGroupById($invo->group_id) }}</td> 
                                        <td>{!! getStatusAttend($invo->attend) !!}</td>
                                        
                                        <td> <input type="checkbox"></td>
                                        <td>
                                            <a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i
                                                    class="material-icons">&#xe3c9;</i></a>
                                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                    class="material-icons">&#xE5C9;</i></a>
                                            <a href="#" id="showInvo" class="settings" title="استعراض" data-toggle="tooltip"><i
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

