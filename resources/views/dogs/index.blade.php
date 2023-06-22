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
            @if ($dogs->count() > 0)
                <ul class="list-group list-group-flush">
                    @foreach ($dogs as $dog)
                        <li class="list-group-item">{{ $dog->name }}</li>
                    @endforeach
                </ul>
            @else
                <div class="alert alert-warning" role="alert">
                    No dogs found.
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Add Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>
</html>
