<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>{{ t('Shipping Items') }}</h2>
        </div>
    </div>
    <div class="card-body pt-0">

        <div class="mb-7 fv-row">
            <label for="shipment_type" class="required fs-5 fw-bold mb-2 @error('title') is-invalid @enderror">{{ t('Shipment Type') }}</label>
            <select name="shipment_type" id="shipment_type" data-control="select2" data-hide-search="true" class="form-select form-select-solid">
                    <option value="{{ null }}">{{ t('Select shipment type') }}</option>
                    <option value="city_to_city">{{ t('City to City') }}</option>
                    <option value="inside_city">{{ t('Inside City') }}</option>
                    <option value="country_to_country">{{ t('Country to Country') }}</option>
                </select>
            <div id="shipment_type-error" class="text-danger error-msg">{{-- $message --}}</div>
        </div>

        <div class="mt-10" data-kt-ecommerce-catalog-add-category="auto-options">
            <div id="shipment_goods">
                <div class="form-group">
                    <div data-repeater-list="shipment_goods" class="d-flex flex-column gap-3">
                        <div data-repeater-item="" class="form-group d-flex flex-wrap gap-5">
                            <div class="w-100 w-md-200px">
                                <select class="form-select" name="goods_id" data-kt-ecommerce-catalog-add-category="goods_id">
                                    <option value="{{ null }}">{{ t('Select Goods') }}</option>
                                   @foreach($goods as $good)
                                    <option value="{{ $good->id }}">{{ $good->name }}</option>
                                   @endforeach
                                </select>
                            </div>
   
                            <input type="text" class="form-control mw-100 w-150px" name="price" placeholder="price" />

                            <input type="text" class="form-control mw-100 w-150px" name="weight" placeholder="weight" />
                            <input type="text" class="form-control mw-100 w-150px" name="total" placeholder="total" disabled/>

                            <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black" />
                                        <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-5">
                    <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                            <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                        </svg>
                    </span>
                        {{ t('Add another condition') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>