<div class="mb-7 fv-row">
    <label for="role_id" class="required fs-5 fw-bold mb-2 @error('title') is-invalid @enderror">{{ t('Language') }}</label>
    <select name="language" id="language" data-control="select2" data-hide-search="true" data-placeholder="{{ t('Select Language') }}" class="form-select form-select-solid">
            <option value="null">{{ t('Select Language') }}</option>
           @foreach(Symfony\Component\Intl\Languages::getNames(App::getLocale()) as $code => $name)
            <option value="{{ $code }}" {{ $user->language == $code ? 'selected' : '' }}>{{ $name }}</option>
           @endforeach
        </select>
        @error('language')
        <div class="text-danger">{{ $message }}</div>
        @enderror
</div>