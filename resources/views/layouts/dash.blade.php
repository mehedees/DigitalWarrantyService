<?php
/**
 * Created by PhpStorm.
 * User: mehed
 * Date: 31-Jul-18
 * Time: 4:27 AM
 */
?>

{{--@extends('layouts.dash')

@section('customCSS')
@endsection

@section('title')
@endsection

@section('content')
@endsection

@section('customScripts')
@endsection--}}

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
    @yield('customCSS')
    <title>
        @yield('title')
    </title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('home')}}">Digital Warranty Service</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="#productDetails">All Products</a></li>
            <li><a href="#addProduct">Add New Product</a></li>
            <li><a href="#searchProduct">Search Product</a></li>
            <li><a href="#histories">History</a></li>
            <li><a href="#searchUID">Search UID</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}
                    <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a>{{Auth::user()->shop_name}}</a></li>
                </ul>
            </li>
            <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    @yield('content')
</div>
@yield('customScripts')
</body>
</html>
