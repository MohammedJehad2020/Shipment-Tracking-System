<div class="fv-row mb-7">
    <label class="required fw-bold fs-6 mb-2 @error('title') is-invalid @enderror">{{ $title }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="{{ $placeholder }}" />
    @error($name)
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>