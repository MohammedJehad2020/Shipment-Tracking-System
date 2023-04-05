<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ t('Recipient information') }}</h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <x-fields.input title="{{ t('Recipient Name') }}" type="text" name="recipient_name" id="recipient_name" value="" placeholder="{{ t('Enter recipient name') }}" />
        <x-fields.input title="{{ t('Recipient Phone') }}" type="text" name="recipient_phone" id="recipient_phone" value="" placeholder="{{ t('Enter recipient phone') }}" />
        <x-fields.input title="{{ t('Recipient Address') }}" type="text" name="recipient_address" id="recipient_address" value="" placeholder="{{ t('Enter recipient address') }}" />
        <x-fields.input title="{{ t('Recipient Location') }}" type="text" name="recipient_location" id="recipient_location" value="" placeholder="{{ t('Enter recipient location') }}" />
    </div>
</div>