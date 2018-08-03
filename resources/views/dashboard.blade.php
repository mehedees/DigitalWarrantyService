<?php
/**
 * Created by PhpStorm.
 * User: mehed
 * Date: 31-Jul-18
 * Time: 4:40 AM
 */
?>
@extends('layouts.dash')

@section('customCSS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endsection

@section('title')
    Dashboard
@endsection

@section('content')
    @if(session('successMsg'))
        <div class="alert alert-success">
            {{session('successMsg')}}
        </div>
    @endif
    @if(session('errMsg'))
        <div class="alert alert-danger">
            {{session('errMsg')}}
        </div>
    @endif
    <div class="panel panel-default" id="productDetails">
        <div class="panel-heading">
            Product Details
        </div>
        <div class="panel-body">
            <table id="productDetail" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Product Name</th>
                    <th>Validity</th>
                    <th>Product Type</th>
                    <th>Enter Product Purchase</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->validity/12}} Years</td>
                        <td>{{$product->product_type}}</td>
                        <td><a class="btn btn-success" href="{{route('recordPurchase', [$product->id])}}">Record Purchase</a></td>
                    </tr>
                @endforeach
                {{$products->links()}}
                </tbody>

            </table>

        </div>
    </div>

    <div class="panel panel-default" id="addProduct">
        <div class="panel-heading">
            Add New Product
        </div>
        <div class="panel-body">
            <form action="{{route('addProduct')}}" method="POST">
                @csrf
                Product Name: <input class="form-control" type="text" name="product_name" required>
                @if ($errors->has('product_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_name') }}</strong>
                    </span>
                @endif
                <br>
                Validity (in months): <input class="form-control" type="number" name="validity" required>
                @if ($errors->has('validity'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('validity') }}</strong>
                    </span>
                @endif
                <br>
                Type of Product: <input class="form-control" type="text" name="product_type" required>
                @if ($errors->has('product_type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_type') }}</strong>
                    </span>
                @endif
                <br>
                <input class="form-control btn-info" type="submit" value="Add Product" >
            </form>
        </div>
    </div>

    <div class="panel panel-default" id="searchProduct">
        <div class="panel-heading">
            Search Product
        </div>
        <div class="panel-body">
            <form action="{{route('getProduct')}}" method="POST">
                @csrf
                Product Name: <input type="text" name="product_name" class="form-control"  required>
                @if ($errors->has('product_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_name') }}</strong>
                    </span>
                @endif
                <br>
                <input class="form-control btn-success" type="submit" value="Search">
            </form>
        </div>
    </div>

    <div class="panel panel-default" id="histories">
        <div class="panel-heading">
            History
        </div>
        <div class="panel-body">
            <table id="history" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Unique ID</th>
                    <th>Product Name</th>
                    <th>Customer Phone No</th>
                    <th>Purchase Date</th>
                    <th>Expiry Date</th>
                    <th>Replace Date</th>
                    <th>Status</th>
                    <th>Replace Product</th>
                </tr>
                </thead>
                <tbody>
                @foreach($histories as $history)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$history->uid}}</td>
                        <td>{{$history->product_name}}</td>
                        <td>{{$history->customer_phone}}</td>
                        <td>{{$history->purchase_date}}</td>
                        <td>{{$history->expiry_date}}</td>
                        <td>{{$history->replace_date}}</td>
                        <td>{{$history->status}}</td>
                        <td>
                            @if($history->expiry_date >= date('Y-m-d'))
                                <a class="btn btn-success" href="{{route('replaceProduct', [$history->id])}}">Replace</a>
                            @else
                                <a class="btn btn-danger">Expired</a>
                            @endif
                        </td>
                        {{--<a class="btn btn-success" href="{{route('replaceProduct', [$history->id])}}">Replace</a>--}}
                    </tr>
                @endforeach
                </tbody>
                {{$histories->links()}}
            </table>
        </div>
    </div>

    <div class="panel panel-default" id="searchUID">
        <div class="panel-heading">
            Search History by UID
        </div>
        <div class="panel-body">
            <form action="{{route('searchHistory')}}" method="POST">
                @csrf
                Product UID: <input type="text" name="uid" class="form-control" required>
                @if ($errors->has('uid'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('uid') }}</strong>
                    </span>
                @endif
                <input type="submit" class="form-control btn btn-success" value="Search">
            </form>
        </div>
    </div>
@endsection

@section('customScripts')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productDetail').DataTable();
            $('#history').DataTable();
        } );
    </script>
@endsection
