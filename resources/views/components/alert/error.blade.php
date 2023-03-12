@if (session()->has('error2'))
    <div class="alert alert-danger">
        {{ session()->get('error2') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger"> 
        {{ implode('', $errors->all(':message')) }}
    </div>
@endif
