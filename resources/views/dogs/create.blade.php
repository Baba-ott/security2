
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-light">
                        <h2 class="text-center text-dark mb-4">Add a New Dog</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dogs.store') }}" method="POST" style="text-align: center;">
                            @csrf
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="name" class="text-dark">Dog's Name:</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="e.g. Rover" required style="margin-top: 10px;">
                                @error('name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="age" class="text-dark">Dog's Age:</label>
                                <input type="number" id="age" name="age" class="form-control @error('age') is-invalid @enderror" placeholder="e.g. 5" required style="margin-top: 10px;">
                                @error('age')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="breed" class="text-dark">Dog's Breed:</label>
                                <input type="text" id="breed" name="breed" class="form-control @error('breed') is-invalid @enderror" placeholder="e.g. Bulldog" required style="margin-top: 10px;">
                                @error('breed')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-top: 50px;">
                                <button type="submit" class="btn btn-outline-dark px-4 py-2">Submit</button>
                                <a href="{{ route('dogs.index') }}" class="btn btn-outline-secondary ml-3 px-4 py-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

