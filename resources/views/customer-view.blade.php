<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      @if(session()->has('user_name'));
        {{session()->get('user_name')}}
      @else 
        Guest
      @endif
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/register')}}">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/customer')}}">Customer</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
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
    <div class="container">
      <div class="row m-2">
        <form action="" class="col-9">
          <div class="form-group">
            <input type="search" name="search" id="" class="form-control" placeholder="Search here" aria-describedby="helpId" value="{{$search}}">
            <small id="helpId" class="text-muted">Help text</small>
          </div>
          <button class="btn btn-primary">Search</button>
          <a href="{{url('/customer')}}">
            <button class="btn btn-primary" type="button">Reset</button>
          </a>
        </form>
        <a href="{{route('customer.create')}}">
          <button class="btn btn-primay d-inline-block m-2 float-right">Add</button>
        </a>
        <a href="{{url('/customer/trash')}}">
          <button class="btn btn-danger d-inline-block m-2 float-right">Go to Trash</button>
        </a>

      </div>
      <table class="table">
        <pre>
          
        </pre>
        <thead>
          <tr>
            <th>name</th>
            <th>email</th>
            <th>Gender</th>
            <th>dob</th>
            <th>Address</th>
            <th>state</th>
            <th>country</th>
            <th>status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($customer as $item)
          <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->gender}}</td>
            <td>{{$item->dob}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->country}}</td>
            <td>{{$item->state}}</td>
            <td>{{$item->state}}</td>
            <td>
              @if($item->status == 1)
              <button class="btn">
                <span class="badge badge-success">Active</span>
              </button>
              @else
              
              <button class="btn">
                <span class="badge badge-primary">Inactive</span>
              </button>
                @endif
            </td>
            <td>
              <a href="{{route('customer.delete', ['id' => $item->customer_id])}}" >
                <button class="btn btn-danger">Delete</button>
              </a>
              <a href="{{route('customer.edit', ['id' => $item->customer_id])}}">
                <button class="btn btn-primary">Edit</button>
              </a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
      <div class="row">
        {{$customer->links()}}
      </div>
    </div>
  </body>
</html>