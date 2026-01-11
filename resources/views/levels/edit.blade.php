@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Edit Level</h4>
    <a href="{{ route('levels.index') }}" class="btn btn-secondary">Back</a>
</div>

<form method="POST"
      action="{{ route('levels.update', $level) }}"
      class="card card-body">
    @csrf
    @method('PUT')

    @include('levels.partials.form')

    <div class="mt-3">
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('levels.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>
@endsection
