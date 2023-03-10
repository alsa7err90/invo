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

                        <table class="table table-striped table-hover" id="table_attentions">
                            <thead>
                                <tr>
                                    <th>م</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكتروني </th>

                                    <th><input type="checkbox" /></th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td> 
                                        <td>{{ $item->nickname }}</td> 
                                        <td>{{ $item->email }}</td>
                                        <td> <input type="checkbox"></td>
                                        <td>
                                            <a href="#" class="settings" title="تحرير" data-toggle="tooltip"><i
                                                    class="material-icons">&#xe3c9;</i></a>
                                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                    class="material-icons">&#xE5C9;</i></a>
                                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"> الصلاحيات</a>
    
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
                        data-action="{{ route('users.store') }}">
                        @csrf
                        
                        <div class="row g-3 align-items-center p-2">
                            <div class="col-3">
                                <label for="nickname" class="col-form-label">اسم الموظف</label>
                            </div>
                            <div class="col-4">
                                <input type="text" name="nickname" id="nickname"class="form-control" > 
                            </div>
                        </div>

                        
                        <div class="row g-3 align-items-center p-2">
                            <div class="col-3">
                                <label for="email" class="col-form-label">البريد الالكتروني</label>
                            </div>
                            <div class="col-4">
                                <input type="email" name="email" id="email"class="form-control" > 
                            </div>
                        </div>


                        
                        <div class="row g-3 align-items-center p-2">
                            <div class="col-3">
                                <label for="password" class="col-form-label">كلمة السر</label>
                            </div>
                            <div class="col-4">
                                <input type="password" name="password" id="password"class="form-control" > 
                            </div>
                        </div>


                        
                        <div class="row g-3 align-items-center p-2">
                            <div class="col-3">
                                <label for="password2" class="col-form-label">تأكيد كلمة السر</label>
                            </div>
                            <div class="col-4">
                                <input type="password" name="password2" id="password2"class="form-control" > 
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
