@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Academic Cycles</h4>
    <a href="{{ route('academic-cycles.create') }}" class="btn btn-primary">Add Cycle</a>
</div>

<form method="GET" class="card card-body mb-3">
    <div class="row g-3">
        <div class="col-md-4">
            <label>Program</label>
            <select name="program_id" class="form-control">
                <option value="" selected disabled>All Programs</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}" @selected(request('program_id') == $program->id)>
                        {{ $program->program_name }} ({{ $program->program_code}})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label>Academic Year</label>
            <input type="text" name="academic_year" class="form-control"
                   value="{{ request('academic_year') }}" placeholder="2025-2026">
        </div>

        <div class="col-md-3">
            <label>Status</label>
            <select name="cycle_status" class="form-control">
                <option value="" selected disabled>Status</option>
                <option value="planned" @selected(request('cycle_status')=='planned')>Planned</option>
                <option value="running" @selected(request('cycle_status')=='running')>Running</option>
                <option value="closed" @selected(request('cycle_status')=='closed')>Closed</option>
            </select>
        </div>

        <div class="col-md-2 align-self-end">
            <button class="btn btn-primary me-2">Search</button>
            <a href="{{ route('academic-cycles.index') }}" class="btn btn-secondary">
                Reset
            </a>
        </div>
    </div>
</form>

<div class="mb-2 text-muted">
    Showing {{ $academicCycles->total() }} result(s)
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Program</th>
            <th>Exam Cycle</th>
            <th>Academic Year</th>
            <th>Duration</th>
            <th>Status</th>
            <th>Locked</th>
            <th width="180">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($academicCycles as $cycle)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cycle->program->program_name }}</td>
                <td>{{ $cycle->exam_cycle }}</td>
                <td>{{ $cycle->academic_year }}</td>
                <td>{{ $cycle->cycle_start->format('d M Y') }} → {{ $cycle->cycle_end->format('d M Y') }}</td>
                <td>
                    <span class="badge
                        @if($cycle->cycle_status === 'planned') bg-warning
                        @elseif($cycle->cycle_status === 'running') bg-success
                        @elseif($cycle->cycle_status === 'closed') bg-secondary
                        @endif">
                        {{ ucfirst($cycle->cycle_status) }}
                    </span>
                </td>
                <td>
                    <span class="badge bg-{{ $cycle->is_locked ? 'danger' : 'success' }}">
                        {{ $cycle->is_locked ? 'Yes' : 'No' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('academic-cycles.show',$cycle) }}" class="btn btn-sm btn-info">View</a>
                    @if(!$cycle->is_locked)
                        <a href="{{ route('academic-cycles.edit',$cycle) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('academic-cycles.destroy', $cycle) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this Academic Cycle?')" class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center text-muted py-4">
                    <strong>No academic cycles found.</strong>
                    @if(request()->hasAny(['program_id','academic_year','cycle_status']))
                        <div>Try changing your search or filter.</div>
                    @endif
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $academicCycles->links() }}
@endsection
