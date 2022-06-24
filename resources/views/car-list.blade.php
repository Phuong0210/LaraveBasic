<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }
        .table-wrapper {
            width: 700px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;	
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }
        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }
        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }
        .table-title .add-new i {
            margin-right: 4px;
        }
        table.table {
            table-layout: fixed;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table th:last-child {
            width: 100px;
        }
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }    
        table.table td a.add {
            color: #27C46B;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #E34724;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table td a.add i {
            font-size: 24px;
            margin-right: -1px;
            position: relative;
            top: 3px;
        }    
        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }
        table.table .form-control.error {
            border-color: #f50000;
        }
        table.table td .add {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        {{-- @foreach ($cars as $car) 
    @foreach ($car->Manufacturers as $caritem)
       echo $caritem->id
    @endforeach
 @endforeach --}}
        <div class="alert">
            @if (Session::has ('success'))
            {{ Session::get('success')}}
            @endif
        </div>
           <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Car<b>Details</b></h2></div>
                        <div class="col-sm-4">
                            <a href="{{ route('cars.create') }}">   <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>
                        </div>
                    </div>
                </div>
               
                <table class="table table-bordered">
                   
                    <thead style="width:300px;">
                        <tr>
                            <th>ID</th>
                            <th style="width:110px;">Image</th>
                            <th>Description</th>
                            <th >Model</th>
                            <th style="width:120px;">Produced_on</th>
                            <th>Ma_name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cars as $car)
                        <form method="post" action="{{ route('cars.destroy',$car->id) }}" >
                            @csrf
                            @method('delete')
                        <tr>
                            
                            <td>{{ $car['id'] }}</td>
                            <td><img src="/image/{{ $car['image'] }}"  class="card-img-top" alt="..." width="100px"></td>
                            <td>{{ $car['description'] }}</td>
                            <td>{{ $car['model'] }}</td>
                            <td>{{ $car['produced_on'] }}</td>
                            <td>{{ $car->manufacturer->name}}</td>
                            <td>
                                <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                <a href="{{ route('cars.edit',$car->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
            
                              <a href=""class="delete" title="Delete" name="delete" data-toggle="tooltip">
                                <button type="submit" onclick="return confirm('Bạn có chắc chắn là muốn xóa sản phẩm này!!?')"><i class="material-icons">&#xE872;</i></button></a>
                            </td>
                           

                        </tr>
                    </form>
                        @endforeach
                                                </form>
                </tbody>
            </table>
        </div> 
  
     {{-- <div class="w-5/6 py-10">
        @foreach ($cars as $car)
            <div class="m-auto">
                        <form action="cars/{{ $car->id }}" class="pt-3" method="POST">
                            @csrf
                            @method('delete')
                            <button 
                                type="submit"
                                class="border-b-2 pb-2 border-dotted italic text-red-500">
                                    Delete &rarr;
                            </button>
                        </form>
                    </div>
               

                <img 
                    src="{{ asset('image/'. $car->image) }}"
                    class="w-40 mb-8 shadow-xl" 
                />
                <span 
                class="uppercase text-blue-500 font-bold text-xs italic">
                    model: {{ $car->model}}
                </span>

                <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                    <a href="/cars/{{ $car->id }}">
                        {{ $car->name }}
                    </a>
                </h2>

                <p class="text-lg text-gray-700 py-6">
                    {{ $car->description }}
                </p>

                <hr class="mt-4 mb-8">
            </div>
        @endforeach
    </div> --}} 
     </div>       
    </body>
</html>