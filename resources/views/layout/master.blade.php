<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="{{route('listProduct')}}">Ví dụ demo về API gRPC</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{route('listProduct')}}">Danh sách sản phẩm</a></li>
            <li><a href="{{route('addProductView')}}">Thêm sản phẩm</a></li>
          </ul>
        </div>
      </nav>
    @yield('content')
</body>
</html>