<div class="mb-7 fv-row">
    <label for="role_id" class="required fs-5 fw-bold mb-2 @error('title') is-invalid @enderror">{{ $title }}</label>
    <select name="{{ $name }}" id="{{ $id }}" data-control="select2" data-hide-search="true" data-placeholder="{{ $placeholder }}" class="form-select form-select-solid">
            <option value="{{ null }}">{{ t('Select Role') }}</option>
            <option value="1">{{ t('Administrator') }}</option>
            <option value="1">{{ t('Staf') }}</option>
        </select>
    <div id="{{ $name }}-error" class="text-danger error-msg">{{-- $message --}}</div>

      {{--   @error($name)
        <div class="text-danger">{{ $message }}</div>
        @enderror --}}
</div>