<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namaste Techie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

</head>

<body>
    <nav class="fixed bg-blue-500 shadow-md  z-50 w-full px-3 py-3 flex justify-between items-center">
        <div class="btn-group absolute right-0 h-12 mt-2 mb-2 px-3 rounded" role="group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Join Community
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
            </ul>
        </div>
        <ul class="flex space-x-4">
            <li class="mx-2 cursor-pointer"><a href="/">Home</a></li>
            <li class="mx-2 cursor-pointer"><a href="{{ route('login') }}"> Services</a></li>
            <li class="mx-2 cursor-pointer"><a href="{{ route('login') }}">Contact</a></li>
            <li class="mx-2 cursor-pointer"><a href="{{ route('login') }}">About Us</a></li>
        </ul>
    </nav>

    <main>
        <section class="header relative pt-16 items-center flex h-screen border" style="max-height:860px">
            <div class="container mx-auto items-center flex flex-wrap">
                <div class="w-full md:w-8/12 lg:w-6/12 xl:w-6/12 px-4">
                    <div class="pt-32 sm:pt-0">
                        <h2 class="font-semibold text-4xl text-blueGray-600"> Namaste Techie - I'm My self Competitor.!!
                        </h2>
                        <p class="mt-4 text-lg leading-relaxed text-blueGray-500"> Namaste Techie is a : Lorem ipsum
                            dolor sit, amet consectetur adipisicing elit. Facere, dolor veniam, ea quia sit, illo minima
                            dicta suscipit fuga ut accusamus nisi. Mollitia ullam, recusandae similique distinctio animi
                            cum blanditiis. 
                        </p>
                            <a href="https://stalktechie.com/" target="_blank" class="text-blueGray-600">
                                <div class="mt-12"><a href="https://stalktechie.com/" target="_blank"
                                class="get-started text-white font-bold px-6 py-4 rounded mr-1 mb-1 bg-red-600 active:bg-red-700 uppercase text-sm shadow hover:shadow-lg ease-linear transition-all duration-150">
                                Get started 
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <img src="https://source.unsplash.com/1200x900/?technology" alt="..."
                class="absolute top-0 b-auto right-0 pt-16 sm:w-6/12  sm:mt-0 w-10/12 max-h-860-px">
        </section>
    </main>
        <div class="container">
            <div class="row my">
               <div class="col p-2">
                <h1> <center><div class="p-2 bg-primary text-white">Post Publish</div></center></h1>
               </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    @foreach ($posts as $post)
                    <div class="card my-2">
                       <div class="card-body">
                        {{-- <h4 class="text-success"><b>{{$post->users->firstname}}</b></h4> --}}
                        <h3 class="text-success"><b>{{$post->title}}</b></h3>
                        <h4 class="text-success"><b>{{$post->meta_title}}</b></h4>
                        <div class="card-text">{{$post->body}}</div>
                        <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    <footer>
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: gray;">
            © 2022 Copyright:
            <a class="text-dark" href="https://stalktechie.com/">Namaste Techie</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>
</html>