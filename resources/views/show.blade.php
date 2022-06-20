<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tèo</title>
</head>
<body>
    <img src="/image/{{ $car['image'] }}" alt="">
    <h1>Car {{ $car['id'] }}</h1>
    <ul>
    <li>Discription: {{ $car['description'] }}</li>
    <li>Model: {{ $car['model'] }}</li>
    <li>Produced on: {{ $car['produced_on'] }}</li>
    </ul>
</body>
</html>