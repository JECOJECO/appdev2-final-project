@extends('layouts.app')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $user->name }}'s Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    @section('content')
        <div class="container py-4">
            <div class="row">
                @include('shared.left-sidebar')
                <div class="col-6">
                    <div class="col-md-8">
                        <div class="container">
                            <h1>Your Profile Details</h1>
                        </div>
                    </div>
                    <div class="mx-10">
                        @include('shared.success-message')
                        <div class="mt-3">
                            @include('shared.user-card')
                        </div>
                        @foreach ( $stories as $story )
                            <div class="mt-3">
                            @include('shared.story-card')
                            </div>
                        @endforeach
                        <div>
                            {{ $stories->withQueryString()->links() }}
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    @endsection 
</body>
</html>
