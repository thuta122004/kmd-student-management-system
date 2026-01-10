@extends('layouts.app')

@section('content')
<h4>Academic Cycle Details</h4>

<table class="table table-bordered">
    <tr><th>Program</th><td>{{ $academicCycle->program->program_name }}</td></tr>
    <tr><th>Exam Cycle</th><td>{{ $academicCycle->exam_cycle }}</td></tr>
    <tr><th>Academic Year</th><td>{{ $academicCycle->academic_year }}</td></tr>
    <tr><th>Start Date</th><td>{{ $academicCycle->cycle_start->format('d M Y') }}</td></tr>
    <tr><th>End Date</th><td>{{ $academicCycle->cycle_end->format('d M Y') }}</td></tr>
    <tr><th>Status</th><td>{{ ucfirst($academicCycle->cycle_status) }}</td></tr>
    <tr><th>Locked</th><td>{{ $academicCycle->is_locked ? 'Yes' : 'No' }}</td></tr>
</table>

<a href="{{ route('academic-cycles.index') }}" class="btn btn-secondary">Back</a>
@endsection
