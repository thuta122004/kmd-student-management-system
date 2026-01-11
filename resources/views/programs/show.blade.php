@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Program Details</h4>
    <a href="{{ route('programs.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered mb-0">
            <tr>
                <th width="200">Code</th>
                <td>{{ $program->program_code }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $program->program_name }}</td>
            </tr>
            <tr>
                <th>Governing Body</th>
                <td>{{ $program->governing_body }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ ucfirst($program->status) }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $program->created_at->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $program->updated_at->format('d M Y') }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
