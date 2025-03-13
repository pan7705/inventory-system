@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Add Color') }}
                    <div class="card-toolbar">
                        <a href="" class="btn btn-primary">Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('color.store') }}" method="POST">
                        @csrf
                        {{-- cross site request forgery --}}

                        <div class="form-group mb-2">
                            <label for="name">Color Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <a href="{{ route('color.index') }}" class="btn btn-outline-primary">Cancel</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
