<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <style>
        body{
        background-color:royalblue;
        color : white
            }
        a {
            text-decoration: none;
            background-color: aquamarine;
            color:black;
        }
        a:hover{
            text-decoration: none;
            background-color: aliceblue;
            color:black;
        }
    </style>
</head>
<body>
    @include('layouts/navigation')
    @yield('content')
</body>
</html>