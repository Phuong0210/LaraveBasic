<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>Tính toán</title>
</head>
<body>
    <div class="container">
    <h1>Tính toán thui nào</h1>
    <div class="row">
        <div class="col-8">
            <form action="{{ route('calculate.post') }}" method="post">
                @if ( $errors->any() )
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ( $errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="col-6">
                    <input type="text" style="width: 400px" name="a" value="{{ isset($a)?$a:'' }}"/>
                    <br>
                    <br>
                    <input type="text" style="width: 400px" name="b" value="{{ isset($b)?$b:'' }}"/>
                    <br>
                    <br>
                    <button type="submit" name="" class="btn btn-primary">Tính</button>
            </div>
        </div>
        <div class="col-4">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Cong" {{ $check=='Cong'? "checked": '' }}>
                <label class="form-check-label" for="exampleRadios1">
                 +
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Tru" {{ $check=='Tru'? "checked": '' }}>
                <label class="form-check-label" for="exampleRadios2">
                  -
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="Nhan" {{ $check=='Nhan'? "checked": '""' }}>
                <label class="form-check-label" for="exampleRadios3">
                  x
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="Chia" {{ $check=='Chia'? "checked": '' }}>
                <label class="form-check-label" for="exampleRadios4">
                  :
                </label>
              </div>

        </div>
      </div>
    </form>
    <h3>{{isset($kq)?$kq:''}}</h3>

      </div>
</body>
</html>