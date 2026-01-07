<div class="mb-3">
    <label>Program Code</label>
    <input type="text" name="program_code"
        value="{{ old('program_code', $program->program_code ?? '') }}"
        class="form-control @error('program_code') is-invalid @enderror">
    @error('program_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label>Program Name</label>
    <input type="text" name="program_name"
        value="{{ old('program_name', $program->program_name ?? '') }}"
        class="form-control @error('program_name') is-invalid @enderror">
    @error('program_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label>Governing Body</label>
    <input type="text" name="governing_body"
        value="{{ old('governing_body', $program->governing_body ?? '') }}"
        class="form-control @error('governing_body') is-invalid @enderror">
    @error('governing_body') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control @error('status') is-invalid @enderror">
        <option value="active" @selected(old('status', $program->status ?? '') == 'active')>Active</option>
        <option value="closed" @selected(old('status', $program->status ?? '') == 'closed')>Closed</option>
    </select>
    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
