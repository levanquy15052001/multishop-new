<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset('admin_master/images/favicon.ico')}}" type="image/ico" />
  <link rel="icon" href="{{asset('admin_master/css/fontawesome.min.css')}}"/>

    <title>Admin Multi Shop</title>

    <!-- Bootstrap -->
    <link href="{{asset('admin_master/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin_master/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin_master/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin_master/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{asset('admin_master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('admin_master/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet')}}"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('admin_master/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('admin_master/build/css/custom.min.css')}}" rel="stylesheet">
    @stack('style_admin')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">