<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <title>Ideas</title>
</head>
<body>
   <div class="container">
     @yield('message')
     @yield('content')
   </div>


   <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
