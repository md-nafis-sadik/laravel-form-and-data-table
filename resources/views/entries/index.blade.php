@extends('layouts.app')

@section('content')
    <div class="mt-4">
        <a href="{{ route('entries.create') }}" class="btn btn-primary">Add New</a>
        <table id="entriesTable" class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                    <tr>
                        <td>{{ $entry->name }}</td>
                        <td>{{ $entry->description }}</td>
                        <td>
                            <a href="{{ route('entries.edit', $entry) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('entries.destroy', $entry) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#entriesTable').DataTable();
        });
    </script>
@endsection
