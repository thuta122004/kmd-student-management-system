@extends('layouts.app')

@section('content')
<h4>Edit Program</h4>

<form action="{{ route('programs.update', $program) }}" method="POST">
    @csrf
    @method('PUT')

    @include('programs.partials.form')

    <button class="btn btn-success">Update</button>
    <a href="{{ route('programs.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
