<div class="{{ $className }}">
    <label for="mobile"> {{ $label ?? "قائمة المدعوين"  }}</label>
    <select id="invitation" class="form-select" name="invitation">
        <option value>اختار</option>
      @forelse ($list_users_invo as $user)
          <option value="{{ $user->id }}" > {{ $user->name }}</option>
      @empty 
      @endforelse
    </select>
</div>