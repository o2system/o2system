<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blade</title>
</head>
<body>
<!-- Variabel Usage -->
<h1>Welcome {{ $username }}</h1>
<h1>Welcome <?php echo $username; ?></h1>

<!-- Include File -->
@include($navPath)

<!-- Inlude Optional File -->
@yield('content')

</body>
</html>