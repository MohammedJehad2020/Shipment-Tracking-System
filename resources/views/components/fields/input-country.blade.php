<div class="mb-7 fv-row">
    <label for="role_id" class="required fs-5 fw-bold mb-2 @error('title') is-invalid @enderror">{{ t('Country') }}</label>
    <select name="country_code" id="country_code" data-control="select2" data-hide-search="true" data-placeholder="{{ t('Select Country') }}" class="form-select form-select-solid">
            <option value="null">{{ t('Select Country') }}</option>
           @foreach(Symfony\Component\Intl\Countries::getNames(App::getLocale()) as $code => $name)
            <option value="{{ $code }}" {{ $user?->address?->country_code == $code ? 'selected' : '' }}>{{ $name }}</option>
           @endforeach
        </select>
        @error('country_code')
        <div class="text-danger">{{ $message }}</div>
        @enderror
</div>