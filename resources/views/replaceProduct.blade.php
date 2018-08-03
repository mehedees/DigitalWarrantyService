<?php
/**
 * Created by PhpStorm.
 * User: mehed
 * Date: 01-Aug-18
 * Time: 2:58 PM
 */
?>
@extends('layouts.dash')

@section('customCSS')
@endsection

@section('title')
    Replace Product
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
    <form method="POST">
        @csrf
        Product Unique ID : <input type="text" name="uid" value="{{$history->uid}}" class="form-control" readonly required>
        @if ($errors->has('uid'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('uid') }}</strong>
            </span>
        @endif

        Product Name : <input type="text" name="product_name" value="{{$history->product_name}}" class="form-control" readonly required>
        @if ($errors->has('product_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('product_name') }}</strong>
            </span>
        @endif

        Customer Phone No : <input type="text" name="customer_phone" value="{{$history->customer_phone}}" class="form-control" readonly required>
        @if ($errors->has('customer_phone'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('customer_phone') }}</strong>
            </span>
        @endif

        Purchase Date : <input type="date" id="purchase_date" name="purchase_date" value="{{$history->purchase_date}}" class="form-control" readonly required>
        @if ($errors->has('purchase_date'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('purchase_date') }}</strong>
            </span>
        @endif

        Expiry Date : <input type="date" id="expiry_date" name="expiry_date" value="{{$history->expiry_date}}" class="form-control" readonly required>
        @if ($errors->has('expiry_date'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('expiry_date') }}</strong>
            </span>
        @endif

        Replace Date : <input type="date" id="replace_date" name="replace_date" class="form-control" readonly required>
        @if ($errors->has('replace_date'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('replace_date') }}</strong>
            </span>
        @endif

        Status : <input type="text" name="status" value="replaced" class="form-control" required>
        @if ($errors->has('status'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
        @endif
        <input class="form-control btn-success" type="submit" value="Replace Product">
    </form>
@endsection

@section('customScripts')
    <script>
        $(document).ready(function () {
            $('#replace_date').val(new Date().toISOString().slice(0,10));
            //$('#replace_date').val(new Date().toDateInputValue());
        });
    </script>
@endsection


