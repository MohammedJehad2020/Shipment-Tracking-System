<div class="modal fade" id="kt_modal_add_permission" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bolder">{{ t('Add a Permission') }}</h2>
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
                <form class="form" method="post" id="add-permission" action="{{ route('permissions.store') }}">
                    @csrf
                    <x-fields.input title="{{ t('Permission Name') }}" type="text" name="name" id="name" value="" placeholder="{{ t('Enter a permission name') }}" />
                    
                    <div class="text-center pt-15">
                        <x-buttons.discard-button />
                        <x-buttons.submit-button />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>