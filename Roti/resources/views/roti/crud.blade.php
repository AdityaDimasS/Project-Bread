@extends('layouts.cruds')

@section('content') 
@if(auth()->user()->hasRole('admin'))
    <marquee>Selamat datang, Admin!</marquee>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="text-center">Menu Management</h2>
    
</div>

<!-- Success Message -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Menu Table -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($menus as $menu)
    <tr class="{{ $menu->trashed() ? 'table-secondary' : '' }}">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $menu->name }}</td>
        <td>{{ $menu->description }}</td>
        <td>
            @if($menu->image)
                <img src="{{ asset($menu->image) }}" alt="{{ $menu->name }}" width="70" height="70">
            @else
                No Image
            @endif
        </td>
        <td>{{ $menu->price }}</td>
        <td>
            @if($menu->trashed())
                <span class="badge bg-danger">Deleted</span>
            @else
                <span class="badge bg-success">Active</span>
            @endif
        </td>
        <td>
            @if($menu->trashed())
                <!-- Tampilkan hanya tombol restore untuk item yang di-soft delete -->
                <form action="{{ route('crud.restore', $menu->id) }}" method="post" style="display:inline;">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Restore this menu?')">Restore</button>
                </form>
            @else
                <!-- Tampilkan tombol edit dan soft delete untuk item aktif -->
                <a href="{{ route('crud.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('crud.destroy', $menu->id) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Soft delete this menu?')">Soft Delete</button>
                </form>
                <form action="{{ route('crud.forceDelete', $menu->id) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Permanently delete this menu?')">Force Delete</button>
                </form>
            @endif
        </td>
    </tr>
@empty
    <tr>
        <td colspan="7">No data available</td>
    </tr>
@endforelse
    </tbody>
</table>

<!-- Add Menu Modal -->
<div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMenuModalLabel">Add New Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('crud.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Path</label>
                        <input type="text" class="form-control" id="image" name="image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-orange">Add Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
