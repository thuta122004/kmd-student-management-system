@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Programs List</h4>
    <a href="{{ route('programs.create') }}" class="btn btn-primary">Add Program</a>
</div>

<form method="GET" action="{{ route('programs.index') }}" class="card card-body mb-3">
    <div class="row g-3 align-items-end">
        <div class="col-md-4">
            <label class="form-label">Program Code</label>
            <input type="text"
                   name="program_code"
                   value="{{ request('program_code') }}"
                   class="form-control"
                   placeholder="Search by code">
        </div>

        <div class="col-md-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="" selected disabled>Status</option>
                <option value="active" @selected(request('status') === 'active')>Active</option>
                <option value="closed" @selected(request('status') === 'closed')>Closed</option>
            </select>
        </div>

        <div class="col-md-5">
            <button class="btn btn-primary me-2">Search</button>
            <a href="{{ route('programs.index') }}" class="btn btn-secondary">
                Reset
            </a>
        </div>
    </div>
</form>

<div class="mb-2 text-muted">
    Showing {{ $programs->total() }} result(s)
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Code</th>
            <th>Name</th>
            <th>Governing Body</th>
            <th>Status</th>
            <th width="180">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($programs as $program)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $program->program_code }}</td>
                <td>{{ $program->program_name }}</td>
                <td>{{ $program->governing_body }}</td>
                <td>
                    <span class="badge bg-{{ $program->status == 'active' ? 'success' : 'secondary' }}">
                        {{ ucfirst($program->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('programs.show', $program) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('programs.edit', $program) }}" class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('programs.destroy', $program) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this program?')" class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted py-4">
                    <strong>No programs found.</strong>
                    @if(request()->hasAny(['program_code', 'status']))
                        <div>Try changing your search or filter.</div>
                    @endif
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

{{ $programs->links() }}
@endsection
