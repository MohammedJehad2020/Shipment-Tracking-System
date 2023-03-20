<div class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bolder">{{ t('Add a Role') }}</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-lg-5 my-7">
                <form id="add-role" class="form" action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_role_header" data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
                        <x-fields.input title="{{ t('Role Name') }}" type="text" name="name" id="name" value="" placeholder="{{ t('Enter a role name') }}" />

                        <div class="fv-row">
                            <label class="fs-5 fw-bolder form-label mb-2">{{ t('Role Permissions') }}</label>
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <tbody class="text-gray-600 fw-bold">
                                        <tr>
                                            <td class="text-gray-800">{{ t('Administrator Access') }}
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
                                            <td>
                                                <label class="form-check form-check-custom form-check-solid me-9">
                                                    <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
                                                    <span class="form-check-label" for="kt_roles_select_all">{{ t('Select all') }}</span>
                                                </label>
                                            </td>
                                        </tr>
                                        @foreach($menus as $menu)
                                        <tr>
                                            <td class="text-gray-800">{{ t($menu?->name) }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    @foreach($menu->permissions as $permission)
                                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissions[]" />
                                                        <span class="form-check-label">{{ t($permission->name) }}</span>
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
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