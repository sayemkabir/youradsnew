
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>YourAds</title>
    <!-- Favicon icon -->

    <link href="{{asset('formAd')}}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('userDashboard')}}/images/logo40.png">
    <link href="{{asset('userDashboard/fontawesome/css/all.css')}}" rel="stylesheet">    <!-- Pignose Calender -->
    <link href="{{asset('userDashboard')}}/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('userDashboard')}}/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="{{asset('userDashboard')}}/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Custom Stylesheet -->
    <link href="{{asset('userDashboard')}}/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">


</head>
{{--@dd(auth()->user())--}}
<body>
