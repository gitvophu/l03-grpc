@extends('layout.master')
@section('content')
    <div class="container">
        @foreach ($errors->all() as $err)
        <div class="alert alert-danger">{{$err}}</div>
        @endforeach
        @if(Session::has('success')) 
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <h2>Nhập thông tin sản phẩm</h2>
        <form action="{{route('addProduct')}}" >
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input name="txtName" type="text" class="form-control" value="{{old('txtName')}}">
                </div>
                <div class="form-group">
                    <label for="">Giá tiền</label>
                    <input name="txtPrice" type="text" class="form-control" value="{{old('txtPrice')}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Lưu">
                </div>
            </div>
            
        </form>  
    </div>
@endsection