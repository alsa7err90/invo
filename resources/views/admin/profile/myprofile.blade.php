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
                                    <h2> تعديل ملفك الشخصي </h2>
                                </div>

                            </div>
                        </div>
                        <x-alert.success />
                        <x-alert.error />
                        <form id="member-profile" action="{{ route('profile.updateMyProfile') }}" method="post">
                            @csrf


                            <x-inputs.nickname className="col-6" value="{{ auth()->user()->nickname }}" />
                            @error('nickname')
                                <div class="error">{{ $errors->first('nickname') }}</div>
                            @enderror
                            <div class="col-6">
                                <label for="name" class="col-form-label">اسم المستخدم (اختياري )</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ auth()->user()->name }}" disabled>
                                @error('name')
                                    <div class="error">{{ $errors->first('name') }}</div>
                                @enderror
                            </div>

                            <x-inputs.password className="col-6" />
                            <x-inputs.password2 className="col-6" />
                            <x-inputs.email className="col-6" value="{{ auth()->user()->email }}" />
                            @error('email')
                                <div class="error">{{ $errors->first('email') }}</div>
                            @enderror

                            <x-inputs.email2 className="col-6" value="{{ auth()->user()->email }}" />
                            @error('email2')
                                <div class="error">{{ $errors->first('email2') }}</div>
                            @enderror
                            <x-buttons.submit label="تعديل" className="col-6" />
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
