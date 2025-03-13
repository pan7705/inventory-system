@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Item Information') }}
                    <div class="card-toolbar">
                        <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group mb-2">
                        <label for="name">Item Name</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{ $item->name }}" readonly>
                    </div>

                    <div class="form-group mb-2">
                        <label for="quantity">Enter Quantity</label>
                        <input name="quantity" type="number" class="form-control" id="quantity" value="{{ $item->quantity }}" readonly>
                    </div>

                    <div class="form-group mb-2">
                        <label for="type">Item Type</label>
                        <input name="type" type="text" class="form-control" id="type" value="{{ $item->type->name }}" readonly>
                    </div>

                    <div class="form-group mb-2">
                        <label for="color">Item Color</label>
                        <input name="color" type="text" class="form-control" id="quantity" value="{{ $item->color->name }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
