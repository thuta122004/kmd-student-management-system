@php
    $level = $level ?? null;
@endphp

<div class="mb-3">
    <label class="form-label">Program</label>
    <select name="program_id" class="form-control">
        <option value="" disabled selected>Select Program</option>
        @foreach($programs as $program)
            <option value="{{ $program->id }}"
                @selected(old('program_id', $level?->program_id) == $program->id)>
                {{ $program->program_name }}
            </option>
        @endforeach
    </select>
    @error('program_id') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Level Number</label>
    <input type="number"
           name="level_number"
           class="form-control"
           min="1"
           value="{{ old('level_number', $level?->level_number) }}">
    @error('level_number') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Semester Count</label>
    <input type="number"
           name="semester_count"
           class="form-control"
           min="1"
           value="{{ old('semester_count', $level?->semester_count) }}">
    @error('semester_count') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label">NQF Level</label>
    <input type="text"
           name="nqf_level"
           class="form-control"
           value="{{ old('nqf_level', $level?->nqf_level) }}">
    @error('nqf_level') <div class="text-danger">{{ $message }}</div> @enderror
</div>
