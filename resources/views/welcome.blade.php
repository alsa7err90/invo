@extends('layouts.app_home')

@section('content')
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

    <x-alert.success />
    <x-alert.error />
    <div class="card">
        <div class="card-title">
           <h2>سجل الأن</h2>
        </div>

        <div class="card-body">
            <form action="" method="post">
                @csrf
                <x-inputs.group className="col-12" />
                <x-inputs.fullname className="col-12" />
                <x-inputs.mobile className="col-12" />
                <x-inputs.email className="col-12" />
                <x-inputs.side className="col-12" />
                <x-inputs.position className="col-12" />
                <x-buttons.submit className="col-12" label="سجل" />
            </form>
        </div>
    </div>
   


@endsection
