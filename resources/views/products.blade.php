<?php
/**
 * Created by PhpStorm.
 * User: mehed
 * Date: 31-Jul-18
 * Time: 5:14 AM
 */
?>
@extends('layouts.dash')

@section('customCSS')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endsection

@section('title')
    Products
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
    <div class="panel panel-default">
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
                </tbody>
                {{$products->links()}}
            </table>
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
        } );
    </script>
@endsection
