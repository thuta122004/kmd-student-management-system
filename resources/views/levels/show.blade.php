@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Level Details</h4>
    <a href="{{ route('levels.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered mb-0">
            <tr>
                <th width="200">Program</th>
                <td>{{ $level->program->program_name }}</td>
            </tr>
            <tr>
                <th>Level Number</th>
                <td>Level {{ $level->level_number }}</td>
            </tr>
            <tr>
                <th>Semester Count</th>
                <td>{{ $level->semester_count }}</td>
            </tr>
            <tr>
                <th>NQF Level</th>
                <td>{{ $level->nqf_level ?? '-' }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $level->created_at->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $level->updated_at->format('d M Y') }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
