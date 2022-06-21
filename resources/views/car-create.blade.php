<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add car</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        input{
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
      <div class="alert">
        @if (Session::has ('success'))
        {{ Session::get('success')}}
        @endif
    </div>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
    <form method="post" action="{{ route('cars.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <input type="file" name="image" class="form-control" id="exampleInputEmail1" value="{{isset($image)?$image:''}}">

          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <input type="text" name="description" class="form-control" id="exampleInputPassword1" value="{{isset($b)?$b:''}}" placeholder="Input description">

        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Model</label>
            <input type="text" name="model" class="form-control" id="exampleInputPassword1" value="{{isset($b)?$b:''}}" placeholder="Input model">

          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Proceduce_on</label>
            <input type="date" name="produced_on" class="form-control" id="exampleInputPassword1" value="{{isset($b)?$b:''}}" placeholder="Input produced-on"><br>

          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <br>
      <a href="{{ route('cars.index') }}"><button type="submit" class="btn btn-danger">Back to Car-list</button></a>
    </div>
</body>
</html>