<div class="form-check col-sm-6 col-md-4 col-lg-3 {{ $className ?? "" }}" >
    <input class="form-check-input" type="checkbox" name="{{ $name }}" value="{{ $value }}" id="{{ $value }}">
    <label class="form-check-label" for="{{ $value }}">
     {{ $label }}
    </label>
  </div>