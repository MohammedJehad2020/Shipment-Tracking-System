@foreach($roles as $role)
<div class="col-md-4">
    <div class="card card-flush h-md-100">
        <div class="card-header">
            <div class="card-title">
                <h2>{{ t($role->name) }}</h2>
            </div>
        </div>
        <div class="card-body pt-1">
            <div class="fw-bolder text-gray-600 mb-5">{{ t('Total users with this role : '). $role->users->count() }}</div>
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
        </div>
        <div class="card-footer flex-wrap pt-0">
            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-light btn-active-primary my-1 me-2">{{ t('View Role') }}</a>
            <button type="button" id="editRoleButton" class="btn btn-light btn-active-light-primary my-1"  data-bs-toggle="modal" data-id="{{ $role->id }}">{{ t('Edit Role') }}</button>
        </div>
    </div>
</div>
@endforeach