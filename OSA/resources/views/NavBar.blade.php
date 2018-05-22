<div class="navbar-fixed">
  <nav class="black">
    <div class="nav-wrapper">
    <div class="container">

      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

      <a href="/" class="brand-logo">Blue Pages</a>

      @if(\Auth::check())
      <ul id="nav-mobile" class="right hide-on-med-and-down valign-wrapper">
        @if(\Auth::user()->account_type == 'User')
        <li><a class="btn blue lighten-1" href="/suggestion">Suggest</a></li>
        @elseif(\Auth::user()->account_type="Admin")
        <li><a class="btn blue lighten-1" href="/admin/view/Suggestion">Admin View</a></li>
        @endif
        <li>
          <a id="user_dropdown" class="valign-wrapper" href="#" data-target="user_options">
            <img class="logged_avatar" src="{{\Auth::user()->avatar}}">
          </a>
        </li>
      </ul>
      @else
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="btn blue lighten-1 modal-trigger" href="#login-modal">Suggest</a></li>
        <li><a class="modal-trigger" href="#login-modal">Log In</a></li>
        <li><a class="modal-trigger" href="#login-modal">Sign In</a></li>
      </ul>
      @endif
    </div>
    </div>
  </nav>
</div>

@if(\Auth::check())
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
@endif
  <!-- SideNav -->
  <ul id="slide-out" class="sidenav">
    @if(\Auth::check())
    <li>
      <div class="user-view blue">
        <a href="/" class="white-text brand-logo center"><h4>Blue Pages</h4></a>
        <a href="#"><img class="circle" src="{{\Auth::user()->avatar}}"></a>
        <a href="#"><span class="white-text name">{{\Auth::user()->first_name}} {{\Auth::user()->last_name}}</span></a>
        <a href="#"><span class="white-text email">{{\Auth::user()->email}}</span></a>
      </div>
    </li>

      @if(\Auth::user()->account_type == 'User')
      <li><a class="btn blue lighten-1" href="/suggestion">Suggest</a></li>
      @elseif(\Auth::user()->account_type="Admin")
      <li><a class="btn blue lighten-1" href="/admin/view/Suggestion">Admin View</a></li>
      @endif

    <li><a href="/logout" class="collection-item">Log Out</a></li>
    @else
    <a href="/" class="brand-logo center"><h4>Blue Pages</h4></a>

    <li><a class="modal-trigger" href="#login-modal">Log In</a></li>
    <li><a class="modal-trigger" href="#login-modal">Sign In</a></li>
    @endif
  </ul>

<!-- Login Modal -->
@include('login')
