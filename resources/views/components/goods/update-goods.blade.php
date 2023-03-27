<div class="modal fade" id="kt_modal_update_goods" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_update_goods_header">
                <h2 class="fw-bolder">{{ t('Update Goods') }}</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <form  id="update-goods-form" class="form" method="POST" action="{{ route('goods.store') }}" enctype="multipart/form-data">
                    @csrf
                   <input type="text" name="id" value="{{ $goods->id }}" hidden>
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_goods_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_goods_header" data-kt-scroll-wrappers="#kt_modal_update_goods_scroll" data-kt-scroll-offset="300px">
                        <x-fields.input title="{{ t('Name') }}" type="text" name="name" id="name" value="{{ $goods->name }}" placeholder="{{ t('name') }}" />
                        <x-fields.textarea title="{{ t('Decsription') }}" type="text" name="description" id="description" value="{{ $goods?->description ?? ''  }}" placeholder="{{ t('description') }}" />
                        <x-fields.input title="{{ t('Price from city to city') }}" type="number" name="price_from_city_to_city" id="price_from_city_to_city" value="{{ $goods->price_from_city_to_city }}" placeholder="{{ t('Price from city to city') }}" />
                        <x-fields.input title="{{ t('Price inside city') }}" type="number" name="price_inside_city" id="price_inside_city" value="{{ $goods->price_inside_city }}" placeholder="{{ t('Price inside city') }}" />
                        <x-fields.input title="{{ t('Price from country to country') }}" type="number" name="price_from_country_to_country" id="price_from_country_to_country" value="{{ $goods->price_from_country_to_country }}" placeholder="{{ t('Price from country to country') }}" />
                        <x-fields.input-status status="{{ $goods->status }}" /> 
                    </div>
                    <div class="text-center pt-15">
                        <x-buttons.discard-button />
                        <x-buttons.submit-button />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#update-goods-form').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('goods.store') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (data) => {
                var index = data;
                $.each(data, function(index, value) {
                    $('#' + value).removeClass('invalid-border');
                    $('#' + value + "_valid").removeClass('d-block');
                    $('#' + value + "_valid").html();
                });
                $('#kt_modal_update_goods').modal('hide')
                $('#datatable').DataTable().ajax.reload();
                $('.modal-backdrop').remove();
                 document.getElementById('update-goods-form')
            .reset();  //reset all inputs in form after storing data
                //console.log(data);
                $('.error-msg').text('');
                Swal.fire({
                    text: "Goods Edited Successfully",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            },
            error: function(data) {
                $('.error-msg').text('');
                var errors = data.responseJSON.errors;
            var erorr_arr = [];
            $.each(errors, function(index, value) {
                var id_error = index+'-error';
                 $('#'+ id_error).text(value[0]);
            });
            }
        });
    });
</script>