<div class="mb-7 fv-row">
    <label for="status" class="required fs-5 fw-bold mb-2">{{ t('Status') }}</label>
    <select name="status" id="status" data-control="select2" data-hide-search="true" data-placeholder="{{ t('Select Status') }}" class="form-select form-select-solid">
            <option value="null">{{ t('Select Status') }}</option>
            <option value="Enabled">{{ t('Enabled') }}</option>
            <option value="Disabled">{{ t('Disabled') }}</option>
        </select>
</div>