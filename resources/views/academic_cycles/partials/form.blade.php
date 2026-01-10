<div class="mb-3">
    <label>Program</label>
    <select name="program_id" class="form-control">
        @foreach($programs as $program)
            <option value="{{ $program->id }}"
                @selected(old('program_id',$academicCycle->program_id ?? '') == $program->id)>
                {{ $program->program_name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Exam Cycle</label>
    <select name="exam_cycle" class="form-control">
        @foreach(['Autumn','Winter','Spring','Summer'] as $cycle)
            <option value="{{ $cycle }}"
                @selected(old('exam_cycle',$academicCycle->exam_cycle ?? '')==$cycle)>
                {{ $cycle }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Academic Year</label>
    <input type="text" name="academic_year" class="form-control"
           value="{{ old('academic_year',$academicCycle->academic_year ?? '') }}">
</div>

@php
    $cycle = $academicCycle ?? null;
@endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label>Start Date</label>
        <input type="date"
               name="cycle_start"
               class="form-control"
               value="{{ old('cycle_start', optional($cycle?->cycle_start)->format('Y-m-d')) }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>End Date</label>
        <input type="date"
               name="cycle_end"
               class="form-control"
               value="{{ old('cycle_end', optional($cycle?->cycle_end)->format('Y-m-d')) }}">
    </div>
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="cycle_status" class="form-control">
        @foreach(['planned','running','closed'] as $status)
            <option value="{{ $status }}"
                @selected(old('cycle_status',$academicCycle->cycle_status ?? '')==$status)>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-check mb-3">
    <input type="checkbox" name="is_locked" value="1"
           class="form-check-input"
           @checked(old('is_locked',$academicCycle->is_locked ?? false))>
    <label class="form-check-label">Lock Cycle</label>
</div>
