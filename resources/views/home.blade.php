@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                    <div class="card-toolbar">
                        <a href="{{ route('color.index') }}" class="btn btn-primary">Create Color</a>
                        <a href="{{ route('type.index') }}" class="btn btn-primary">Create Type</a>
                        <a href="{{ route('item.create') }}" class="btn btn-primary">Add Item</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Created At</th>
                              <th scope="col">Updated At</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>{{ $item->updated_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('item.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ route('item.show', $item) }}" class="btn btn-sm btn-success">View</a>
                                    <button item="button" class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $item->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="deleteModalLabel{{ $item->id }}">Confirm Delete
                                                    </h5>
                                                    <button item="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    Are you sure you want to delete this item
                                                    {{ $item->name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button item="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('item.destroy', $item) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button item="submit"
                                                            class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @empty
                            <tr colspan='4'>No item found</tr>
                        @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
