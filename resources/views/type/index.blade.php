@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Type Management') }}
                        <div class="card-toolbar ">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
                                <a href="{{ route('type.create') }}" class="btn btn-primary">Add new Type</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($types as $type)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $type->name }}</td>
                                            <td>{{ $type->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('type.edit', $type) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal{{ $type->id }}">
                                                    Delete
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal{{ $type->id }}" tabindex="-1"
                                                    aria-labelledby="deleteModalLabel{{ $type->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="deleteModalLabel{{ $type->id }}">Confirm Delete
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                Are you sure you want to delete this type
                                                                {{ $type->name }}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <form action="{{ route('type.destroy', $type) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                            @empty
                        <tr colspan='4'>No type found</tr>
                        @endforelse
                        </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12">
                                {{ $types->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
