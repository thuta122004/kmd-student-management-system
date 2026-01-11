@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Academic Cycle Details</h4>
    <a href="{{ route('academic-cycles.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered mb-0">
            <tr>
                <th width="200">Program</th>
                <td>{{ $academicCycle->program->program_name }}</td>
            </tr>
            <tr>
                <th>Exam Cycle</th>
                <td>{{ $academicCycle->exam_cycle }}</td>
            </tr>
            <tr>
                <th>Academic Year</th>
                <td>{{ $academicCycle->academic_year }}</td>
            </tr>
            <tr>
                <th>Start Date</th>
                <td>{{ $academicCycle->cycle_start->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>End Date</th>
                <td>{{ $academicCycle->cycle_end->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ ucfirst($academicCycle->cycle_status) }}</td>
            </tr>
            <tr>
                <th>Locked</th>
                <td>{{ $academicCycle->is_locked ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $academicCycle->created_at->format('d M Y') }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $academicCycle->updated_at->format('d M Y') }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
