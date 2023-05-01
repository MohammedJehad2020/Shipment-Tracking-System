<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ t('Shipping Items') }}</h2>
        </div>
    </div>
    <div class="card-body pt-0">

        <div class="mb-7 fv-row">
            <label for="shipment_type"
                class="required fs-5 fw-bold mb-2 @error('title') is-invalid @enderror">{{ t('Shipment Type') }}</label>
            <select name="shipment_type" id="shipment_type" data-control="select2" data-hide-search="true"
                class="form-select form-select-solid shipment_type">
                <option value="{{ null }}">{{ t('Select shipment type') }}</option>
                <option value="city_to_city" {{ $shipment->shipment_type == 'city_to_city' ? 'selected' : '' }}>{{ t('City to City') }}</option>
                <option value="inside_city" {{ $shipment->shipment_type == 'inside_city' ? 'selected' : '' }}>{{ t('Inside City') }}</option>
                <option value="country_to_country" {{ $shipment->shipment_type == 'country_to_country' ? 'selected' : '' }}>{{ t('Country to Country') }}</option>
            </select>
            <div id="shipment_type-error" class="text-danger error-msg">{{-- $message --}}</div>
        </div>

        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="fs-6 fw-bold form-label mb-2">
                <span class="required">{{ t('Delivery Date') }}</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Select a date &amp; time."></i>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-solid" placeholder="Pick date &amp; time" name="delivery_date" id="shipment_datepicker" value="{{ $shipment->delivery_date }}"/>
            <!--end::Input-->
        </div>

        <div class="mt-10" data-kt-ecommerce-catalog-add-category="auto-options">
            <div id="kt_ecommerce_add_category_conditions">
                <div class="form-group">
                    <label for="goods"
                    class="required fs-5 fw-bold mb-2">{{ t('Goods') }}</label>
                    <input type="text" name="finalTotal" id="finalTotal" value="{{ $shipment->total_amount }}" class="form-control form-control-solid mb-3 mb-lg-0 finalTotal" placeholder="{{ t('Final Total') }}"  />

                    <div data-repeater-list="kt_ecommerce_add_category_conditions" class="d-flex flex-column gap-3">
                       @foreach($shipmentGoods as $shipment_goods)
                        <div data-repeater-item="" class="form-group d-flex flex-wrap gap-5">
                            <div class="w-100 w-md-200px">
                                <select class="form-select" name="goods_id"
                                    data-kt-ecommerce-catalog-add-category="goods_id">
                                    <option value="{{ null }}">{{ t('Select Goods') }}</option>
                                    @foreach ($goods as $good)
                                        <option value="{{ $good->id }}" {{ $shipment_goods->goods_id == $good->id ? 'selected' : '' }}>{{ $good->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                          

                            <input type="text" class="form-control mw-100 w-150px price" name="price" value="{{ $shipment_goods->price }}" id="price" onchange="Calc(this);"
                                placeholder="{{ t('price') }}" />

                            <input type="text" class="form-control mw-100 w-150px weight" name="weight" value="{{ $shipment_goods->weight }}" id="weight" onchange="Calc(this);"
                                placeholder="{{ t('amount') }}" />
                            <input type="text" class="form-control mw-100 w-150px total" name="total" id="total" value="{{ $shipment_goods->total }}" placeholder="{{ t('total') }}"
                                readonly />

                            <button type="button" data-repeater-delete="" onclick="BtnDelete(this);" class="btn btn-sm btn-icon btn-light-danger">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2"
                                            rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                                        <rect x="8.46447" y="7.05029" width="12" height="2" rx="1"
                                            transform="rotate(45 8.46447 7.05029)" fill="black" />
                                    </svg>
                                </span>
                            </button>
                        </div>

                    @endforeach

                    </div>
                </div>
                <div class="form-group mt-5">
                    <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11" y="18" width="12" height="2"
                                    rx="1" transform="rotate(-90 11 18)" fill="black" />
                                <rect x="6" y="11" width="12" height="2" rx="1"
                                    fill="black" />
                            </svg>
                        </span>
                        {{ t('Add goods') }}</button>
                </div>

            </div>
        </div> 
    </div>
</div>
