<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>

    <title>Namaste Techie..</title>
</head>
<body>
    <div class="card">
        <div class="card-header">
            Hello Reader😊,
        </div>
        <div class="card-body">
          <h5 class="card-title">All post last day written by our writer..!!</h5>
          <p class="card-text">
            <hr>
            @foreach ($post as $item)
            Post :{{$item->title}}<br>
            <hr>
            @endforeach
          </p>
          <a href="{{ route('posts.index') }}" class="btn btn-primary">Read Post..</a>
        </div>
      </div>
      Thanks,<br>
      {{ config('app.name') }}<br>
      Team.
      <footer>
          <center>
          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: gray;">
              © 2022 Copyright:
              <a class="text-dark" href="https://stalktechie.com/">Namaste Techie</a>
          </div>
          <!-- Copyright -->
      </center>
      </footer>
</body>
</html>