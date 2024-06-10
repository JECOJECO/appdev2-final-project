@extends('layouts.app')

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyDailies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
    @section('content')
        <body style="background-image: url('https://media.discordapp.net/attachments/1172944013372964925/1249420097039237212/Welcome-art-initial.png?ex=66673ca4&is=6665eb24&hm=bf5a3604a2d296ad176e22cc8f72666218e6df0e19bcf07ee52761d6a1446bea&=&format=webp&quality=lossless&width=550&height=288'); background-size: 200vh; background-repeat: no-repeat;">
            {{-- <div class="bg-image" style="background-image: url('https://media.discordapp.net/attachments/1172944013372964925/1249420097039237212/Welcome-art-initial.png?ex=66673ca4&is=6665eb24&hm=bf5a3604a2d296ad176e22cc8f72666218e6df0e19bcf07ee52761d6a1446bea&=&format=webp&quality=lossless&width=550&height=288'); height: 100vh;"> --}}
                <div class="container">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-10">
                            <h1>Welcome</h1>
                        </div>
                        <div class="col-md-10">
                            <h4>Share your dailies with others.</h4>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </body>
    @endsection 
</html>