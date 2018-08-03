<?php
/**
 * Created by PhpStorm.
 * User: mehed
 * Date: 02-Aug-18
 * Time: 12:42 AM
 */
?>
@extends('layouts.dash')

@section('customCSS')
@endsection

@section('title')
    Search History
@endsection

@section('content')
    <div class="panel panel-default">
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
            $('#history').DataTable();
        } );
    </script>
@endsection
