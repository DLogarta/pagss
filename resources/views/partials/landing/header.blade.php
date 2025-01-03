<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>PAGSS</title>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="{{ asset('/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.green.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.green.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
</head>

<body>
    <header class="d-flex justify-content-between align-items-center header-div">
        <div>
            <a class="nav-brand" href="#">
                <img id="brand-logo" src="{{ asset('/img/logo/logo.png') }}">
            </a>
        </div>
        <a class="nav-item menu" href="#">
            <i class="fa fa-bars"></i>
        </a>
        <div id="nav-links" class="nav-links">
            <a class="nav-item {{ request()->is('/') ? 'active' : '' }}" href="/">HOME</a>
            <a class="nav-item {{ request()->is('about-us') ? 'active' : '' }}" href="about-us">ABOUT US</a>
            <a class="nav-item {{ request()->is('people') ? 'active' : '' }}" href="people">PEOPLE</a>
            <a class="nav-item {{ request()->is('services') || request()->is('service') ? 'active' : '' }}" href="services">SERVICES</a>
            <a class="nav-item {{ request()->is('awards') ? 'active' : '' }}" href="awards">AWARDS</a>
            <a class="nav-item {{ request()->is('clients') ? 'active' : '' }}" href="clients">CLIENTS</a>
        </div>
    </header>