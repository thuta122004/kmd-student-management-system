@extends('layouts.app')

@section('content')
<h4>Add Academic Cycle</h4>

<form method="POST" action="{{ route('academic-cycles.store') }}">
    @csrf
    @include('academic_cycles.partials.form')
    <button class="btn btn-success">Save</button>
    <a href="{{ route('academic-cycles.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
