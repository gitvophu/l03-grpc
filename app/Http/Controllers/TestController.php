<?php

namespace App\Http\Controllers;

use GPBMetadata\Helloworld;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Phuvo\CustomGrpc\Helloworld\HelloRequest;

class TestController extends Controller
{
    function getListProduct(){

        $client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient('localhost:50051', [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);
        
        // $request = new \Phuvo\CustomGrpc\Helloworld\HelloRequest();
        // $request->setName('asdasdasd');
        
        // list($reply, $status) = $client->SayHello($request)->wait();
        // $message = $reply->getMessage();
            $request = new \Phuvo\CustomGrpc\Helloworld\GetProductListRequest();
        list($reply,$status) = $client->GetProductList($request)->wait();
        $message = $reply->getMessage();
        $list_products = json_decode($message,true);
        return view('products.product_list',compact('list_products'));
    }


    function addProduct(Request $req,$id){
        

        $validator = Validator::make($req->all(),[
            'txtName'=>'required|max:255',
            'txtPrice'=>'required|numeric|min:0'
        ],[
            'txtName.required'=>'Không được bỏ trống tên sản phẩm',
            'txtName.max'=>'Tên sản phẩm tối đa 255 ký tự',
            'txtPrice.required'=>'Giá sản phẩm không được bỏ trống',
            'txtPrice.numeric'=>'Giá sản phẩm phải là số',
            'txtPrice.min'=>'Giá sản phẩm phải lớn hơn hoặc bằng 0',
        ]);
        if($validator->fails()){
            return redirect()->route('listProductView')->withErrors($validator)->withInput();
        }
        
        $client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient('localhost:50051', [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);
        if(empty($id)){
            $request = new \Phuvo\CustomGrpc\Helloworld\AddProductRequest();
            $request->setName("Sản phẩm demo " . rand(1,10000));
            $request->setPrice(rand(1,10000));
            list($reply,$status) = $client->AddProduct($request)->wait();
        }else{
            // kiem tra id co ton tai hay khong

        }
        
        $response = [];
        $response['message'] = $reply->getMessage();
        $response['code'] = $reply->getCode();
        $response['id'] = $reply->getId();
        if($response['code'] != 1000){
            $validator->errors()->add('code_err','Xảy ra lỗi, Server không thể thêm sản phẩm');
            return redirect()->route('listProductView')->withErrors($validator)->withInput();
        }
        return redirect()->route('listProductView')->with('success','Thêm sản phẩm thành công');
    }

    function addProductView(){

        return view('products.product_add');
    }
    function deleteProduct(Request $request,$id){
        
        /* $validator = Validator::make($id,
            ['id'=>'required|integer|min:1'],
            [
                'id.required'=>'id không được bỏ trống',
                'id.min'=>'id phải lớn hơn 0'
            ]
        ); */
        $validator = Validator::make([],[],[]);
        if(empty($id)){
            $validator->errors()->add('id.required','id không được bỏ trống');
        }
        if($id < 0){
            $validator->errors()->add('id.min','id phải lớn hơn 0');
        }
        if($validator->fails()){
            return redirect()->route('listProduct')->withErrors($validator)->withInput();
        }
        $client = new \Phuvo\CustomGrpc\Helloworld\GreeterClient('localhost:50051', [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);
        $deleteRequest = new \Phuvo\CustomGrpc\Helloworld\DeleteProductRequest();
        $deleteRequest->setId($id);
        list($reply,$status) = $client->DeleteProduct($deleteRequest)->wait();
        dd($reply->getMessage());
        return redirect()->route('listProduct')->with('success','Đã xóa sản phẩm thành công');
    }
}
