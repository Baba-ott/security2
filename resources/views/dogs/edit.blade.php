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
<!-- Add Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>
</html>
