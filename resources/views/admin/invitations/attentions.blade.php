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
                                        data-bs-target="#exampleModal">
                                        اضافة
                                    </button>
                                    <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i>
                                        <span>Export to Excel</span></a>
                                </div>
                            </div>
                        </div>
                        <form class="row g-3" id="search_attentions" method="post"  data-action="{{ route('search.attentions') }}">
                            @csrf
                            <div class="col-auto">
                              <label for="inputname" class="visually-hidden">الاسم </label>
                              <input type="text" class="form-control" name="name" id="name" >
                            </div>
                            <div class="col-auto">
                              <label for="email" class="visually-hidden">البريد الالكتروني</label>
                              <input type="email" class="form-control" name="email" id="email" >
                            </div>
                            <div class="col-auto">
                              <label for="mobile" class="visually-hidden">رقم الجوال</label>
                              <input type="text" class="form-control" name="mobile" id="mobile">
                            </div>
                            <div class="col-auto">
                                <label for="mobile" class="visually-hidden">تأكيد الحضور</label> 
                                <select id="attend_confirm" class="form-select" name="attend_confirm" >
                                    <option value="2">الكل</option>
                                    <option value="0">لا</option>
                                    <option value="1">نعم</option>
                                </select>
                              </div>
                            <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-3">بحث</button>
                            </div>
                          </form>
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
                                            <a href="#" class="settings" title="طباعة مع حلفية" data-toggle="tooltip"><i
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="send-invitation-form" class="fabrikForm"
                        data-action="{{ route('send.attentions') }}" enctype="application/x-www-form-urlencoded">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <p> اللقب</p>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="surname" id="surname1" autocomplete="off"
                                        checked>
                                    <label class="btn btn-outline-primary" for="surname1">معالي</label>

                                    <input type="radio" class="btn-check" name="surname" id="surname2"
                                        autocomplete="off">
                                    <label class="btn btn-outline-primary" for="surname2">سعادة</label>

                                    <input type="radio" class="btn-check" name="surname" id="surname3"
                                        autocomplete="off">
                                    <label class="btn btn-outline-primary" for="surname3">Mr</label>

                                    <input type="radio" class="btn-check" name="surname" id="surname4"
                                        autocomplete="off">
                                    <label class="btn btn-outline-primary" for="surname4">Your Excellency</label>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <p> 2 اللقب</p>
                                <select class="form-select" name="surname2" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @forelse ($list_usrnames as $surname)
                                        <option value="{{ $surname->title }}">{{ $surname->title }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p> الاسم الكامل</p>
                                <input class="form-control" name="name" type="text" placeholder=" الاسم الكامل"
                                    aria-label="default input example">

                            </div>
                            <div class="col-md-6">
                                <p> البريد الالكتروني</p>
                                <input class="form-control" name="email" type="text" placeholder=" الاسم الكامل"
                                    aria-label="default input example">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>بريد الكتروني اضافي</p>
                                <input class="form-control" name="email2" type="text"
                                    placeholder="بريد الكتروني اضافي" aria-label="default input example">

                            </div>
                            <div class="col-md-6">
                                <p> الجهة</p>
                                <input class="form-control" name="side" type="text" placeholder="الجهة"
                                    aria-label="default input example">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p> رقم الواتس آب</p>
                                <input class="form-control" name="mobile" type="text"
                                    aria-label="default input example">

                            </div>
                            <div class="col-md-6">
                                <p>
                                    المنصب</p>
                                <input class="form-control" name="position" type="text"
                                    aria-label="default input example">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <p> الفئة </p>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    @forelse ($list_groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-6">
                                <p> لغة الدعوة </p>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" value="1" class="btn-check" name="lang"
                                        id="lang" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="lang">عربي</label>

                                    <input type="radio" value="0" class="btn-check" name="lang"
                                        id="lang2" autocomplete="off">
                                    <label class="btn btn-outline-success" for="lang2">انكليزي</label>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <p> ارسال بريد الكتروني</p>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" value="1" class="btn-check" name="send_email"
                                        id="send_email" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="send_email">نعم</label>

                                    <input type="radio" value="0" class="btn-check" name="send_email"
                                        id="send_email2" autocomplete="off">
                                    <label class="btn btn-outline-success" for="send_email2">لا</label>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <p> ارسال واتساب</p>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" value="1" class="btn-check" name="send_whatsapp"
                                        id="send_whatsapp" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="send_whatsapp">نعم</label>

                                    <input type="radio" value="0" class="btn-check" name="send_whatsapp"
                                        id="send_whatsapp2" autocomplete="off">
                                    <label class="btn btn-outline-success" for="send_whatsapp2">لا</label>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p> تأكيد الحضور</p>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" value="1" class="btn-check" name="attend_confirm"
                                        id="attend_confirm1" autocomplete="off" checked>
                                    <label class="btn btn-outline-success" for="attend_confirm1">نعم</label>

                                    <input type="radio" value="0" class="btn-check" name="attend_confirm"
                                        id="attend_confirm2" autocomplete="off">
                                    <label class="btn btn-outline-success" for="attend_confirm2">لا</label>

                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary button _">
                            ارسال</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
