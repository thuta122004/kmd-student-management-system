@extends('layouts.app')

@section('content')
<h4>Add Program</h4>

<form action="{{ route('programs.store') }}" method="POST">
    @csrf

    @include('programs.partials.form')

    <button class="btn btn-success">Save</button>
    <a href="{{ route('programs.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
