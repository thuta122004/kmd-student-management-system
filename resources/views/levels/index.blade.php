@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Levels</h4>
    <a href="{{ route('levels.create') }}" class="btn btn-primary">Add Level</a>
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

        <div class="col-md-4">
            <label>Level Number</label>
            <input type="number"
                   name="level_number"
                   class="form-control"
                   placeholder="3"
                   value="{{ request('level_number') }}">
        </div>

        <div class="col-md-2 align-self-end">
            <button class="btn btn-primary me-2">Search</button>
            <a href="{{ route('levels.index') }}" class="btn btn-secondary">
                Reset
            </a>
        </div>
    </div>
</form>

<div class="mb-2 text-muted">
    Showing {{ $levels->total() }} result(s)
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Program</th>
            <th>Level</th>
            <th>Semesters</th>
            <th>NQF</th>
            <th width="180">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($levels as $level)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $level->program->program_name }}</td>
            <td>Level {{ $level->level_number }}</td>
            <td>{{ $level->semester_count }}</td>
            <td>{{ $level->nqf_level ?? '-' }}</td>
            <td>
                <a href="{{ route('levels.show',$level) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('levels.edit', $level) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('levels.destroy', $level) }}"
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Delete this level?')"
                            class="btn btn-sm btn-danger">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-muted py-4">
                <strong>No levels found.</strong>
                @if(request()->hasAny(['program_id', 'level_number']))
                    <div>Try changing the filter.</div>
                @endif
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $levels->links() }}
@endsection
