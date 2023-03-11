
<div class="{{ $className }}">
    <p> 2 اللقب</p>
    <select class="form-select" name="surname2" aria-label="Default select example">
        <option selected>Open this select menu</option>
        @forelse ($list_usrnames as $surname)
            <option value="{{ $surname->title }}">{{ $surname->title }}</option>
        @empty
        @endforelse
    </select>
</div>