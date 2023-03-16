<x-master>

            <div class="card card-flush">
                <div class="card-header mt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                </svg>
                            </span>
                            <input type="text" data-kt-permissions-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Permissions" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_permission">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black" />
                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Add Permission</button>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="datatable" {{-- id="kt_permissions_table" --}}>
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">{{ t('Name') }}</th>
                                <th class="min-w-250px">{{ t('Assigned to') }}</th>
                                <th class="min-w-125px">{{ t('Created Date') }}</th>
                                <th >{{ t('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                           
                            {{-- <tr>
                                <!--begin::Name=-->
                                <td>Content Management</td>
                                <!--end::Name=-->
                                <!--begin::Assigned to=-->
                                <td>
                                    <a href="../../demo9/dist/apps/user-management/roles/view.html" class="badge badge-light-primary fs-7 m-1">Administrator</a>
                                    <a href="../../demo9/dist/apps/user-management/roles/view.html" class="badge badge-light-danger fs-7 m-1">Developer</a>
                                    <a href="../../demo9/dist/apps/user-management/roles/view.html" class="badge badge-light-success fs-7 m-1">Analyst</a>
                                    <a href="../../demo9/dist/apps/user-management/roles/view.html" class="badge badge-light-info fs-7 m-1">Support</a>
                                    <a href="../../demo9/dist/apps/user-management/roles/view.html" class="badge badge-light-warning fs-7 m-1">Trial</a>
                                </td>
                                <!--end::Assigned to=-->
                                <!--begin::Created Date-->
                                <td>10 Nov 2021, 6:05 pm</td>
                                <!--end::Created Date-->
                                <!--begin::Action=-->
                                <td class="text-end">
                                    <!--begin::Update-->
                                    <button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
                                                <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--end::Update-->
                                    <!--begin::Delete-->
                                    <button class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--end::Delete-->
                                </td>
                                <!--end::Action=-->
                            </tr> --}}


                        </tbody>
                    </table>
                </div>
            </div>
           <x-permissions.add-form />
            <div id="kt_modal_update_permission"></div>
           
</x-master>

@include('dashboard.permissions.scripts.datatableJs')
@include('dashboard.includes.delete_item',['route_delete'=>url("/permissions")])
@include('dashboard.includes.delete_array', ['route_delete' => route('permissions.del_ids')])


<script>
    $('#add-permission').submit(function(e) {
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
                $('#datatable').DataTable().ajax.reload();
                $('#kt_modal_add_permission').modal('hide')
                document.getElementById('add-permission')
            .reset(); //reset all inputs in form after storing data
                //console.log(data);
                $('.error-msg').val("");

                Swal.fire({
                    text: "Added Permission Successfully",
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
<script>
    $(document).ready(function() {
      $('body').on('click', '#edit-permission', function() {
          var id = $(this).data('id');
          url = '{{ route('permissions.edit', ':id') }}',
              url = url.replace(':id', id);
          $.ajax({
              type: "GET",
              url: url,
              data:{},
              success: function(response) {
                  $('#kt_modal_update_permission').replaceWith(response);
                  $('#kt_modal_update_permission').modal('show');
              }
          });
      });
  });
</script>
