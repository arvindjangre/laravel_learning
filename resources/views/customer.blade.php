<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/data') }}">data</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <form action="{{ $url }}" method="post">
        @csrf
        <?php
        // print_r($error->all());
        ?>
        @php
            $demo = 1;
        @endphp
        <div class="container mt-4 card p-3 bg-white">
            <h3 class="text-center text-primary">
                {{ $title }}
            </h3>
        </div>
        <div class="container">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" label="enter your name" value="{{ $data->name }}">
                <span class="text-danger">
                </span>


            </div>
            <div class="form-group">
                <label for="">email</label>
                <input type="email" name="email" label="enter your name" value="{{ $data->email }}">
                <span class="text-danger">
                </span>


            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="password" name="password" label="enter your name" value="{{ $data->password }}">
                <span class="text-danger">
                </span>


            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="password_confirm" label="enter your name" value="{{ $data->password }}">
                <span class="text-danger">
                </span>


            </div>

        </div>
        <button>submit</button>
    </form>

</body>

</html>
