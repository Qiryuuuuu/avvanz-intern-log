<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Avvanz Inc.</title>
    
    @vite(['resources/css/home.css', 
    'resources/js/splashAnimation.js', 
    'resources/css/app.css', 
    'resources/js/app.js'])

</head>
<body class="initial">
    @yield('content')

    @include('partials.footer')
</body>
</html>
