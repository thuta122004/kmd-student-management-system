@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Add Level</h4>
    <a href="{{ route('levels.index') }}" class="btn btn-secondary">Back</a>
</div>

<form method="POST" action="{{ route('levels.store') }}" class="card card-body">
    @csrf

    @include('levels.partials.form')

    <div class="mt-3">
        <button class="btn btn-primary">Save</button>
        <a href="{{ route('levels.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>
@endsection
