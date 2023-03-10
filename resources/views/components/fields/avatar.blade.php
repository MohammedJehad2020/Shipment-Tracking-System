<div class="fv-row mb-7">
    <label class="d-block fw-bold fs-6 mb-5">{{ $title }}</label>
    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $avatar ? asset('images/'.$avatar) : asset('assets/media/avatars/300-6.jpg') }});"></div>
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="{{ t('Change avatar') }}">
            <i class="bi bi-pencil-fill fs-7"></i>
            <input type="file" name="{{ $name }}" id="{{ $id }}" accept=".png, .jpg, .jpeg" />
            {{-- <input type="hidden" name="avatar_remove" id="avatar_remove"/> --}}
        </label>
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="{{ t('Cancel avatar') }}">
            <i class="bi bi-x fs-2"></i>
        </span>
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="{{ t('Remove avatar') }}">
            <i class="bi bi-x fs-2"></i>
        </span>
    </div>
    <div class="form-text">{{ t('Allowed file types: png, jpg, jpeg.') }}</div>
</div>