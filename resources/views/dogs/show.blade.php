<!DOCTYPE html>
<html>
<head>
    <title>Dogs</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="text-center mb-5">Dogs</h1>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <a class="btn btn-primary" href="/dashboard">Dashboard</a>
                </div>
            </div>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <a class="btn btn-success" href="/dogs/create">Create a Dog</a>
                </div>
            </div>
            <div class="card shadow-sm my-5">
                <div class="card-header bg-light">
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
<!-- Add Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>
</html>
