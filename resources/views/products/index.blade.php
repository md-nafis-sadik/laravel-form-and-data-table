@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-between items-center mb-3"><h1>Product List</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary h-10">Add New Product</a>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Serial Number</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td  style="width: 60px;">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 50px;">
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->serial_number }}</td>
                        <td>{{ $product->date->format('Y-m-d') }}</td>
                        <td>{{ $product->type }}</td>

                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>


@endsection
