@extends('layouts.app_home')

@section('content')
    <div class="container">
        <div class="title_session">
            <h3>الجلسة الحوارية لتدشين برنامج تحول القطاع الصحي</h3>
        </div>

        <table class="table table-striped ">
            <tbody>
                <tr>
                    <td colspan="2">مرحبًا بكم في صفحة التسجيل لحضور الجلسة الحوارية لتدشين برنامج تحول القطاع الصحي،
                        هذه
                        الجلسة التي ستعرف بدور البرنامج في تحول القطاع الصحي في المملكة واستعراض مستهدفاته وطموحاته.
                    </td>
                </tr>
                <tr>
                    <td>التاريخ :</td>
                    <td> الإثنين 14/3/2022م الموافق 10/08/1443هـ
                    </td>
                </tr>
                <tr>
                    <td>الوقت :</td>
                    <td>20:00 - 21:00 مساءً
                    </td>
                </tr>

                <tr>
                    <td>الموقع :</td>
                    <td>القاعة الرئيسية بفندق كراون بلازا في المدينة الرقمية - الرياض.
                    </td>
                </tr>
            </tbody>
        </table>
 
        <div class="card">
            <div class="card-title">
                <h2>سجل الأن</h2>
            </div>

            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <x-inputs.selectSurname className="col-12"/>
                    @error('surname')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <x-inputs.fullname className="col-12"  :value="old('name')" />
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <x-inputs.mobile className="col-12" :value="old('mobile')" />
                    @error('mobile')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <x-inputs.email className="col-12"  :value="old('email')"/>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <x-inputs.side className="col-12"  :value="old('side')"/>
                    @error('side')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <x-inputs.position className="col-12" :value="old('position')"/>
                    @error('position')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <x-buttons.submit className="col-12" label="سجل" />
                </form>
            </div>
        </div>
    </div>
@endsection
