<nav class="navbar navbar-expand-sm navbar-light" id="neubar">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('logo.png') }}"
                height="60" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">

                <li class="nav-item dropdown active">
                    <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        لوحة التحكم
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li> 
                            <a class="dropdown-item" href="{{ route('invitations.attentions') }}" >
                                ارسال الدعوات
                            </a>
                            <a class="dropdown-item" href="{{ route('invitations.public') }}" >
                             الدعوات العامة
                            </a>
                            <a class="dropdown-item" href="{{ route('surnames.index') }}" >
                             الألقاب
                            </a>
                            <a class="dropdown-item" href="{{ route('groups.index') }}" >
                             الفئات
                            </a>
                            <a class="dropdown-item" href="{{ route('profile.myProfile') }}" >
                             تعديل معلومات الدخول
                            </a>
                            <a class="dropdown-item" href="{{ route('users.index') }}" >
                             اضافة موظفين
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       يوم الحفل
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li> 
                            <a class="dropdown-item" href="{{ route('invitations.index') }}" >
                             جميع الدعوات
                            </a>
                            <a class="dropdown-item" href="{{ route('tables.index') }}" >
                            الكراسي
                            </a>
                            <a class="dropdown-item" href="{{ route('tables.empty') }}" >
                            الكراسي الفارغة
                            </a>
                            <a class="dropdown-item" href="{{ route('tables.report') }}" >
                             تقارير الكراسي
                            </a>
                            
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link  mx-2" href="{{ route('qrcode.index') }}">qrcode</a>
                </li>
                
                    

            </ul>
        </div>
    </div>
</nav>