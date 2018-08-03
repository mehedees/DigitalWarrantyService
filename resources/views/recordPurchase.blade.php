<?php
/**
 * Created by PhpStorm.
 * User: mehed
 * Date: 31-Jul-18
 * Time: 4:29 PM
 */
?>
@extends('layouts.dash')

@section('customCSS')
@endsection

@section('title')
    Record Purchase
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
        Product Unique ID : <input type="text" name="uid" class="form-control" required>
        @if ($errors->has('uid'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('uid') }}</strong>
                    </span>
        @endif

        Product Name : <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" readonly required>
        @if ($errors->has('product_name'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('product_name') }}</strong>
                    </span>
        @endif

        Customer Phone No : <input type="text" name="customer_phone" class="form-control" required>
        @if ($errors->has('customer_phone'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('customer_phone') }}</strong>
                    </span>
        @endif

        Purchase Date : <input type="date" id="purchase_date" name="purchase_date" class="form-control" required>
        @if ($errors->has('purchase_date'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('purchase_date') }}</strong>
                    </span>
        @endif

        Validity: <input type="number" name="validity" value="{{$product->validity}}" class="form-control" readonly required>
        @if ($errors->has('validity'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('validity') }}</strong>
                    </span>
        @endif

        Expiry Date : <input type="date" id="expiry_date" name="expiry_date" class="form-control" readonly required>
        @if ($errors->has('expiry_date'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('expiry_date') }}</strong>
                    </span>
        @endif

        Status : <input type="text" name="status" class="form-control" required>
        @if ($errors->has('status'))
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
        @endif
        <input class="form-control btn-success" type="submit" value="Enter Purchase">
    </form>
@endsection

@section('customScripts')
    <script>
        $(document).ready(function () {
            $('#purchase_date').change(function () {
                pDate = $(this).val();
                exp = {!! $product->validity !!};
                nDate = new Date(pDate);
                nDate.setMonth(nDate.getMonth()+exp);
                //alert(nDate);
                $('#expiry_date').val(nDate.toISOString().slice(0,10));
            });
        });
    </script>
@endsection

