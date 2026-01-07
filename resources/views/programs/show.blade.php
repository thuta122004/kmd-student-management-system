@extends('layouts.app')

@section('content')
<h4>Program Details</h4>

<table class="table table-bordered">
    <tr><th>Code</th><td>{{ $program->program_code }}</td></tr>
    <tr><th>Name</th><td>{{ $program->program_name }}</td></tr>
    <tr><th>Governing Body</th><td>{{ $program->governing_body }}</td></tr>
    <tr><th>Status</th><td>{{ ucfirst($program->status) }}</td></tr>
</table>

<a href="{{ route('programs.index') }}" class="btn btn-secondary">Back</a>
@endsection
