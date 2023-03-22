<div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2 class="mb-0">{{ $role->name }}</h2>
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Permissions-->
        <div class="d-flex flex-column text-gray-600">
            @for ($i = 0; $i < count($role->permissions); $i++)
            <div class="d-flex align-items-center py-2">
            <span class="bullet bg-primary me-3"></span>{{ $role->permissions[$i]->name }}</div>
            @if($i > 3) 
                <div class='d-flex align-items-center py-2'>
                    <span class='bullet bg-primary me-3'></span>
                    <em>{{ t('and'). ' '.count($role->permissions)-4 . ' '. t('more...') }}</em>
                </div>
                @break
            @endif
            
           @endfor
        </div>
        <!--end::Permissions-->
    </div>
    <!--end::Card body-->
    <!--begin::Card footer-->
    <div class="card-footer pt-0">
        <button type="button" class="btn btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">{{ t('Edit Role') }}</button>
    </div>
    <!--end::Card footer-->
</div>