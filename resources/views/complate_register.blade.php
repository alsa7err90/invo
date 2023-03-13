@extends('layouts.app_home')

@section('content')
<div class="container1">
    
    @if ($complated)
        <div class="complate">
            <h5> الجلسة الحوارية لتدشين برنامج تحول القطاع الصحي </h3>
            <p> تم استلام طلبكم بنجاح، وسيتم التواصل معكم لتأكيد حالة التسجيل قريبًا..
            </p>
            <p> شكرًا لكم ولاهتمامكم ببرنامج تحول القطاع الصحي</p>
        </div>
    @else
        <div class="complate">
            <h5>  عذرا حدث خطأ يرجى المحالة مجددا </h5>
            <p>  شكرًا لكم ولاهتمامكم ببرنامج تحول القطاع الصحي</p>
        </div>
    @endif
</div>
@endsection
