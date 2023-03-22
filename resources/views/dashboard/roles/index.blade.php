<x-master>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
        <x-roles.all-roles :roles="$roles"/>
        <x-roles.add-new />
    </div>
    <x-roles.add-role :menus="$menus" />
    <div id="kt_modal_update_role"></div>
</x-master>
<script>
    $('#add-role').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('roles.store') }}",
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
                $('#kt_modal_add_role').modal('hide')
                document.getElementById('add-role')
            .reset(); //reset all inputs in form after storing data
                //console.log(data);
                $('.error-msg').text('');


                Swal.fire({
                    text: "Role Created Successfully",
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
     $('#kt_roles_select_all').click(function() {
        if ($(this).prop('checked')) {
            $('.form-check-input').prop('checked', true);
        } else {
            $('.form-check-input').prop('checked', false);
        }
    });
</script>
<script>
    $(document).ready(function() {
      $('body').on('click', '#editRoleButton', function() {
          var id = $(this).data('id');
          url = '{{ route('roles.edit', ':id') }}',
              url = url.replace(':id', id);
          $.ajax({
              type: "GET",
              url: url,
              data:{},
              success: function(response) {
                  $('#kt_modal_update_role').replaceWith(response);
                  $('#kt_modal_update_role').modal('show');
              }
          });
      });
  });
</script>