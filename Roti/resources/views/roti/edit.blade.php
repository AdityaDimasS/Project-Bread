@extends('layouts.cruds')

@section('content')
<div class="container">
    <h2>Edit Menu</h2>
    <form action="{{ route('crud.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $menu->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $menu->price }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image Path</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ $menu->image }}">
        </div>
        <button type="submit" class="btn btn-warning btn-sm">Update Menu</button>
        <a href="{{ route('crud.index') }}" class="btn btn-danger btn-sm">Cancel</a>
    </form>
</div>
@endsection
