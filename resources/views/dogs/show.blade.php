@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        <h3>Name: {{ $dog->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Age:</strong> {{ $dog->age }}
                        </div>
                        <div class="mb-3">
                            <strong>Breed:</strong> {{ $dog->breed }}
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="{{ route('dogs.edit', $dog->id) }}" class="btn btn-primary mr-2">Edit Dog</a>
                        <a href="{{ route('dogs.index') }}" class="btn btn-secondary mr-2">Back</a>
                        <form action="{{ route('dogs.destroy', $dog->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this dog?')">Delete Dog</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
