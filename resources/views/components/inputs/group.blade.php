<div class="{{ $className }}"> 
    <label for="mobile">الفئة</label>
    <select class="form-select" aria-label="Default select example">
        <option selected value>الرجاء الاختياء</option>
        @forelse ($list_groups as $group)
            <option value="{{ $group->id }}">{{ $group->name }}</option>
        @empty
        @endforelse
    </select>
</div>