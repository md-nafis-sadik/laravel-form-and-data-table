@extends('layouts.app')

@section('content')
    <div class="mt-4">
        <h2>Edit Entry</h2>
        <form action="{{ route('entries.update', $entry) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $entry->name }}" required>
            </div>
            <div class="form-group mt-2">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ $entry->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
