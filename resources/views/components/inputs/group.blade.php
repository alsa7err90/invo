<div class="{{ $className }}">
    <p> الفئة </p>
    <select class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        @forelse ($list_groups as $group)
            <option value="{{ $group->id }}">{{ $group->name }}</option>
        @empty
        @endforelse
    </select>
</div>