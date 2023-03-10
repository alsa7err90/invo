@extends('layouts.app')

@section('content')
    <div class="container">
        <form id="member-profile" action="{{ route('profile.updateMyProfile') }}" method="post">
            @csrf
            <p> تعديل ملفك الشخصي </p>
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
            <div class="row g-3 align-items-center p-2">
                <div class="col-3">
                    <label for="nickname" class="col-form-label">الاسم</label>
                </div>
                <div class="col-4">
                    <input type="text" name="nickname" id="nickname"class="form-control"
                        value="{{ auth()->user()->nickname }}" placeholder="أدخل اسمك الكامل">
                    @error('nickname')
                        <div class="error">{{ $errors->first('nickname') }}</div>
                    @enderror
                </div>
            </div>

            <div class="row g-3 align-items-center p-2">
                <div class="col-3">
                    <label for="name" class="col-form-label">اسم المستخدم (اختياري )</label>
                </div>
                <div class="col-4">
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ auth()->user()->name }}" disabled>
                    @error('name')
                        <div class="error">{{ $errors->first('name') }}</div>
                    @enderror
                </div>
            </div>

            <div class="row g-3 align-items-center p-2">
                <div class="col-3">
                    <label for="password" class="col-form-label"> كلمة السر (اختياري )</label>
                </div>
                <div class="col-4">
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>

            <div class="row g-3 align-items-center p-2">
                <div class="col-3">
                    <label for="password2" class="col-form-label"> تأكيد كلمة المرور (اختياري )</label>
                </div>
                <div class="col-4">
                    <input type="password" name="password2" id="password2" class="form-control">
                </div>
            </div>


            <div class="row g-3 align-items-center p-2">
                <div class="col-3">
                    <label for="email" class="col-form-label">عنوان البريد الإلكتروني</label>
                </div>
                <div class="col-4">
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ auth()->user()->email }}">
                    @error('email')
                        <div class="error">{{ $errors->first('email') }}</div>
                    @enderror
                </div>
            </div>


            <div class="row g-3 align-items-center p-2">
                <div class="col-3">
                    <label for="email2" class="col-form-label"> تأكيد عنوان البريد الإلكتروني</label>
                </div>
                <div class="col-4">
                    <input type="email" name="email2" id="email2" class="form-control"
                        value="{{ auth()->user()->email }}">

                    @error('email2')
                        <div class="error">{{ $errors->first('email2') }}</div>
                    @enderror
                </div>
            </div> 
            <button type="submit" class="btn btn-primary">حفظ</button> 
        </form>

    </div>
@endsection
