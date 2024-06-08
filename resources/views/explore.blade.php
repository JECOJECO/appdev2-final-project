@extends('layouts.app')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Explore</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    @section('content')
        <div class="container py-4">
            <div class="row">
                @include('shared.left-sidebar')
                <div class="col-6">
                    <div class="card">
                        <div class="card-header pb-0 border-0">
                            <h5>Search</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('explorepage') }}" method="GET">
                                <input value="{{ request('search', '') }}" placeholder="..." class="form-control w-100" name="search" type="text">
                                <button class="btn btn-darl mt-2" style="text-decoration:none">Search</button>
                            </form>
                        </div>
                    </div>
                    @forelse ( $stories as $story )
                        @foreach ($stories as $story)
                            <div class="mt-3">
                                @include('shared.story-card')
                            </div>
                        @endforeach
                    @empty
                        <p class="text-center mt-10">No Results Found</p>
                    @endforelse
                    <div>
                        {{ $stories->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>
