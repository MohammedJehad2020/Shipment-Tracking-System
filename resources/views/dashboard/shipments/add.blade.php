<x-master>
    <form id="add-shipment" method="POST" action="{{ route('shipments.store') }}" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo9/dist/apps/ecommerce/catalog/category.html">
       @csrf
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ t('Add New Shipment') }}</h2>
                    </div>
                </div>
                <div class="card-body text-center pt-0">
                    <div class="text-muted fs-7">{{-- t('') --}}</div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <x-shipment.sender />
            <x-shipment.recipient />
            <x-shipment.items :goods="$goods"/>
            <div class="d-flex justify-content-end">
                <a href="{{ route('shipments.index') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">{{ t('Cancel') }}</a>
                <x-buttons.submit-button />
            </div>
        </div>
    </form>
</x-master>
<script>
    $('#add-shipment').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('shipments.store') }}",
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
                $('#datatable').DataTable().ajax.reload();
                // $('#kt_modal_add_role').modal('hide')
                document.getElementById('add-shipment')
            .reset(); //reset all inputs in form after storing data
                //console.log(data);
                $('.error-msg').text('');


                Swal.fire({
                    text: "Shipment Created Successfully",
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