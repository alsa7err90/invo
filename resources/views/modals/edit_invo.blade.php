
 
    <div class="modal fade" id="modal_edit_public" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_ajax_post_edit" class="fabrikForm"
                    data-action="" data-id="" enctype="application/x-www-form-urlencoded">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-6">
                            <p> اللقب</p>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="surname" id="surname1"
                                    autocomplete="off" checked>
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
                            <p>
                                المنصب</p>
                            <input class="form-control" name="position" type="text"
                                aria-label="default input example">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p> الفئة </p>
                            <select class="form-select" name="group_id" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                @forelse ($list_groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-6">
                            <p>ارسال بريد مع تغيير حالة الطلب</p>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" value="1" class="btn-check" name="send_email_with_change"
                                    id="lang" autocomplete="off" checked>
                                <label class="btn btn-outline-success" for="lang">نعم</label>

                                <input type="radio" value="0" class="btn-check" name="send_email_with_change"
                                    id="lang2" autocomplete="off">
                                <label class="btn btn-outline-success" for="lang2">لا</label>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p>هل حضر الحفل</p>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" value="1" class="btn-check" name="attend"
                                    id="attend" autocomplete="off" checked>
                                <label class="btn btn-outline-success" for="attend">نعم</label>

                                <input type="radio" value="0" class="btn-check" name="attend"
                                    id="attend2" autocomplete="off">
                                <label class="btn btn-outline-success" for="attend2">لا</label>

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
                        <div class="col-md-6">
                            <p> حالة الطلب </p>
                            <select id="status" class="form-select" name="status">
                                <option value="1">قيد الدراسة</option>
                                <option value="2">تم التأكيد</option>
                                <option value="3">تم الاعتذار</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary button _">تعديل</button>
                        
                </form>
            </div>
        </div> 
    </div>
</div> 