<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>{{ t('Sender information') }}</h2>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <x-fields.input title="{{ t('Sender Name') }}" type="text" name="sender_name" id="sender_name" value="{{ $shipment?->shipmentData?->sender_name }}" placeholder="{{ t('Enter sender name') }}" />
        <x-fields.input title="{{ t('Sender Phone') }}" type="text" name="sender_phone" id="sender_phone" value="{{ $shipment?->shipmentData?->sender_phone }}" placeholder="{{ t('Enter sender phone') }}" />
        <x-fields.input title="{{ t('Sender Address') }}" type="text" name="sender_address" id="sender_address" value="{{ $shipment?->shipmentData?->sender_address }}" placeholder="{{ t('Enter sender address') }}" />
        <x-fields.input title="{{ t('Sender Location') }}" type="text" name="sender_location" id="sender_location" value="{{ $shipment?->shipmentData?->sender_location }}" placeholder="{{ t('Enter sender location') }}" />
     

    </div>
    <!--end::Card header-->
</div>