@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Edit Item') }}
                    <div class="card-toolbar">
                        <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('item.update', $item) }}" method="POST">
                        @csrf
                        {{-- cross site request forgery --}}

                        <div class="form-group mb-2">
                            <label for="name">Item Name</label>
                            <input name="name" item="text" class="form-control" id="name" placeholder="Name" value="{{ $item->name }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="quantity">Enter Quantity</label>
                            <input name="quantity" item="number" class="form-control" id="quantity" placeholder="Quantity" value="{{ $item->quantity }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="type">Item Type</label>
                            <select name="type" class="form-control" id="type_id" required>
                                <option value="" selected disable>Select Type</option>
                                @foreach ($types as $type)
                                    @if ($type->id === $item->type_id)
                                        <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                    @else
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="color">Item Color</label>
                            <select name="color" class="form-control" id="color_id" required>
                                <option value="" selected disable>Select Color</option>
                                @foreach ($colors as $color)
                                    @if ($color->id === $item->color_id)
                                        <option value="{{ $color->id }}" selected>{{ $color->name }}</option>
                                    @else
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        @method('PUT')
                        <button class="btn btn-primary" item="submit">Update</button>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


