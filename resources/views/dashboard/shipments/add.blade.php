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
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ t('Status') }}</h2>
                    </div>
                    <div class="card-toolbar">
                        <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <select class="form-select mb-2 status" name="status" id="status" data-control="select2" data-hide-search="true" id="kt_ecommerce_add_product_status_select">
                        <option value="{{ null }}">{{ t('Select Status') }}</option>
                        <option value="pending">{{ t('Pending') }}</option>
                        <option value="in-progress">{{ t('In Progress') }}</option>
                        <option value="complete">{{ t('Complete') }}</option>
                    </select>
                   <div id="status-error" class="text-danger error-msg">{{-- $message --}}</div>

                    <div class="text-muted fs-7">{{ t('Set the shipment status.') }}</div>
                    <div class="d-none mt-10">
                        <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">{{ t('Select publishing date and time') }}</label>
                        <input class="form-control" id="kt_ecommerce_add_product_status_datepicker" placeholder="Pick date &amp; time" />
                    </div>
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
    $("#shipment_datepicker").flatpickr();

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
                $("#status").val("").trigger( "change" );
                $("#shipment_type").val("").trigger( "change" );

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
<script>

    function Calc(v){
        var index = $(v).parent().index();
        // alert('index : '+ index);
        var price = $(".price")[index].value;
        var weight = $(".weight")[index].value;

        var total = price * weight;
        $(".total")[index].value = total;
        GetTotal();
    }
    function BtnDelete(v)
    {
        var index = $(v).parent().remove();
        GetTotal();
    }

    function GetTotal()
    {
        var sum = 0;
        var amounts = $('.total');
        for(let index=0; index< amounts.length; index++){
            var amount = amounts[index].value;
            sum = +(sum) + +(amount);
        }
        $('.finalTotal').val(sum);
    }
</script>