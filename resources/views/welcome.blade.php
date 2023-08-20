<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php echo "from welcome"; ?>
    <a href="{{url('/') }}" class="text-sm text-gray-700 underline">English</a>
    <a href="{{url('/hi') }}" class="text-sm text-gray-700 underline">Hindi</a>
    <a href="{{url('/rus') }}" class="text-sm text-gray-700 underline">Rus</a>
    {!! Form::open([
        'url' => url('storefile'),
        'method' => 'post',
        'id' => 'contact',
        'role' => 'form',
        'class' => 'bv-form',
        'enctype' => 'multipart/form-data'
         ]) !!}
         @csrf
        <?php
        // print_r($error->all());
        ?>
        @php
            $demo = 1;
        @endphp
        <div class="container">
            {{-- <x-input type="text" name="name" label="enter your name" :demo="$demo"></x-input> --}}
            {!!Form::text('name', '', [
                'id' => 'name',
                'required' => '',
                'placeholder' => 'Name',
                'data-bv-field'=> 'name'
            ])!!}
            <x-input type="email" name="email" label="enter your email"></x-input>
            <x-input type="password" name="password" label="enter your password"></x-input>
            <x-input type="password" name="password_confirm" label="enter your password"></x-input>
        </div>
        <button>Submit</button>
         {!!Form::close()!!}

         <h1 class="text-center">@lang('lang.welcome')</h1>
</body>
</html>