<?php
/**
 * Created by PhpStorm.
 * User: mehed
 * Date: 02-Aug-18
 * Time: 1:10 AM
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Search Warranty</title>
</head>
<body>
<div class="container-fluid">

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
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="well">
        <a class="btn btn-block btn-info" href="{{route('welcome')}}">Back</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#history').DataTable();
    } );
</script>
</body>
</html>

