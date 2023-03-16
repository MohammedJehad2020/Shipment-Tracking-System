 <div class="modal fade" id="kt_modal_update_permission" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bolder">{{ t('Update Permission') }}</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-permissions-modal-action="close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
                        </svg>
                    </span>
                    <div class="d-flex flex-stack flex-grow-1">
                        <div class="fw-bold">
                            <div class="fs-6 text-gray-700">
                            <strong class="me-1">{{ t('Warning!') }}</strong>{{ t('By editing the permission name, you might break the system permissions functionality. Please ensure you are absolutely certain before proceeding.') }}</div>
                        </div>
                    </div>
                </div>
                <form class="form" id="update-permission-form" method="post" action="{{ route('permissions.store') }}">
                    @csrf
                    <input type="text" name="id" value="{{ $permission->id }}" hidden>
                    <x-fields.input title="{{ t('Permission Name') }}" type="text" name="updateName" id="name" value="{{ $permission->name }}" placeholder="{{ t('Enter a permission name') }}" />
                    
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
    $('#update-permission-form').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('permissions.store') }}",
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
                // $('#datatable').DataTable().ajax.reload();
                $('#kt_modal_update_permission').modal('hide')
                document.getElementById('update-permission-form')
            .reset(); //reset all inputs in form after storing data
                //console.log(data);
                $('.error-msg').innerHTML = "";

                Swal.fire({
                    text: "Edited Permission Successfully",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });

            },
            error: function(data) {
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