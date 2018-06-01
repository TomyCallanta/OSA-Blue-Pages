<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>[Admin] OSA Blue Pages - {{$view}}</title>
        <!-- Import JQuery -->
        <script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script>

        <!-- Scripts -->
        <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/admin-jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/general.js')}}"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/materialize.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/general.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/general_admin.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
        <!-- Icon -->
        <link rel="icon" type="image/png" href="{{asset('img/BT-LogoIcon.png')}}">
    </head>
    <body>
        <div class="navbar-fixed">
            <nav>
               <div class="nav-wrapper black">
                    <a href="/admin/view/Suggestion" class="brand-logo">OSA Blue Pages</a>
                    <a href="#" data-target="mobile-sv" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                    <ul class="right hide-on-med-and-down valign-wrapper">
                        <li><a class="btn blue lighten-1" href="/">User View</a></li>
                        <li>
                            <a id="user_dropdown" class="valign-wrapper" href="#" data-target="user_options">
                                <img class="logged_avatar" src="{{\Auth::user()->avatar}}">
                            </a>
                        </li>
                    </ul>
               </div>
            </nav>
        </div>
        <ul class="transparent dropdown-content user-dropdown" id="user_options">
            <li class="transparent dropdown-triangle"><span></span></li>
            <li class="blue">
                <div class="user-view">
                    <img class="logged_avatar" src="{{\Auth::user()->avatar}}">
                    <a class="blue" href="#"><span class="white-text">{{\Auth::user()->first_name}} {{\Auth::user()->last_name}}</span></a>
                    <a class="blue email" href="#"><span class="white-text">{{\Auth::user()->email}}</span></a>
                </div>
            </li>
            <li class="white"><a class="blue-text lighten-1" href="/logout">Log Out</a></li>
        </ul>
        <ul id="mobile-sv" class="sidenav sidenav-fixed">
            <li class="hide-on-large-only">
                <div class="user-view blue">
                    <a href="/" class="white-text brand-logo center"><h4>Blue Pages</h4></a>
                    <div class="valign-wrapper" href="#">
                        <img class="circle" src="{{\Auth::user()->avatar}}">
                        <a href="/logout" style="padding-left:20px" class="white-text">Log out</a></span>
                    </div>
                    <a href="#"><span class="white-text name">{{\Auth::user()->first_name}} {{\Auth::user()->last_name}}</span></a>
                    <a href="#"><span class="white-text email">{{\Auth::user()->email}}</span></a>
                </div>
            </li>

            <li style="height:64px" class="hide-on-med-and-down valign-wrapper black"><a class="white-text brand-logo" href="/admin/view/Suggestion"> <h4 class="admin-logo">OSA Blue Pages</h4></a></li>

            <li><a class="btn blue lighten-1" href="/admin/add">Add Supplier</a></li>

            <li><div class="divider"></div></li>
            <li><a class="subheader">Settings</a></li>
            <li><a class = "{{$view == 'Edit Admin' ? 'blue-text lighten-1' : ''}}" href ="/admin/EditAdmin" style = "font-size:15px;">Edit Admin Access</a></li>
            <li><a href = "/CategorySettings" style = "font-size:15px;">FAQ</a></li>

            <li><div class="divider"></div></li>
            <li><a class="subheader">Admin Pages</a></li>
            <li><a class="{{$view == 'Suggestion' ? 'blue-text lighten-1' : ''}}" href="/admin/view/Suggestion">Suggestion Entries</a></li>
            <li><a class="{{$view == 'Accepted' ? 'blue-text lighten-1' : ''}}" href="/admin/view/Accepted">Accepted Entries</a></li>
            <li><a class="{{$view == 'Rejected' ? 'blue-text lighten-1' : ''}}" href="/admin/view/Rejected">Rejected Entries</a></li>

        </ul>

        <main class="admin-main">
            <div class="container">
                @include($page)
            </div>
        </main>
    </body>
</html>
