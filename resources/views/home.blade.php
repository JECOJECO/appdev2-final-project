@extends('layouts.app')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
  @section('content')
    <div class="container py-4">
      <div class="row">
          <!-- <div class="col-md-8">
            <div class="container">
              <h1> Welcome, {{ Auth::user()->name }}</h1>
            </div>
              <div class="card">
                  <div class="card-header">{{ __('Dashboard') }}</div>
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      {{ __('You are logged in!') }}
                  </div>
              </div>
          </div> -->
            @include('shared.left-sidebar')
            <div class="col-6">
              @include('shared.success-message')
              @include('shared.submit-story')
              <hr>
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
  @endsection
</body>
</html>