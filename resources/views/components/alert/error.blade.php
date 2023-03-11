@if (session()->has('error2'))
    <div class="alert alert-danger">
        {{ session()->get('error2') }}
    </div>
@endif
