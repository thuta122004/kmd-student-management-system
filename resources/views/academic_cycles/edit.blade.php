@extends('layouts.app')

@section('content')
<h4>Edit Academic Cycle</h4>

<form method="POST" action="{{ route('academic-cycles.update',$academicCycle) }}">
    @csrf
    @method('PUT')
    @include('academic_cycles.partials.form')
    <button class="btn btn-success">Update</button>
    <a href="{{ route('academic-cycles.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
