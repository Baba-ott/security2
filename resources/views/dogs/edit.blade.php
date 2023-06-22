@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Dog</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dogs.update', $dog->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $dog->name }}">
                            </div>

                            <div class="form-group">
                                <label for="age">Age:</label>
                                <input type="number" name="age" id="age" class="form-control" value="{{ $dog->age }}">
                            </div>

                            <div class="form-group">
                                <label for="breed">Breed:</label>
                                <input type="text" name="breed" id="breed" class="form-control" value="{{ $dog->breed }}">
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Dog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
