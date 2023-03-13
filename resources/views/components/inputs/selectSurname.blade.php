

<div class="{{ $className }}">
    <label for="mobile"> اللقب</label>
    <select id="status" class="form-select" name="surname"> 
        <option value>يرجى الاختيار</option>
        @forelse ($list_usrnames as $user)
        <option value="{{ $user->id }}" > {{ $user->title }}</option>
        @empty 
        @endforelse
    </select>
</div>