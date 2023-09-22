<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head id="header_aria">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="nofollow">
    <meta name="googlebot" content="noindex">
    <title>{{$title??''}} | Dashboard</title>
    <link href="{{url('favicon.ico')}}" rel="shortcut icon" />
    <link rel="stylesheet" href="{{url('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('backend/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/backend/plugins/datepicker/jquery-ui.css')}}">
    <link href="{{asset('backend/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/backend/css/style.css')}}">
    @stack('pageCss')
</head>
<body>
@auth
<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="{{url('dashboard')}}" class="list-group-item list-group-item-action py-2 ripple {{request()->is('dashboard*')?'active':''}}" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span> Dashboard</span>
                </a>
                <a href="{{url('transactions')}}" class="list-group-item list-group-item-action py-2 ripple {{request()->is('transactions*')?'active':''}} ">
                    <i class="fas fa-exchange-alt fa-fw me-3"></i><span>Transactions</span>
                </a>
                <a href="{{url('deposit')}}" class="list-group-item list-group-item-action py-2 ripple {{request()->is('deposit*')?'active':''}}">
                    <i class="fas fa-money-check-alt fa-fw me-3"></i><span>Deposit</span>
                </a>
                <a href="{{url('withdrawal')}}" class="list-group-item list-group-item-action py-2 ripple {{request()->is('withdrawal*')?'active':''}}">
                    <i class="fas fa-money-bill fa-fw me-3"></i><span>Withdrawal</span>
                </a>
                <a href="{{url('logout')}}" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-sign-out-alt fa-fw me-3"></i><span>Logout</span>
                </a>

            </div>
        </div>
    </nav>
    <!-- Sidebar -->

</header>
<!--Main Navigation-->
@endauth
