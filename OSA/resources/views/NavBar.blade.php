<div class="navbar-fixed">
  <nav class="black">
    <div class="nav-wrapper">
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

        <a href="/" class="brand-logo center">Blue Pages</a>

        @if(Auth::check())
        <ul id="nav-mobile" class="right hide-on-med-and-down valign-wrapper">
          <li><a class="btn blue lighten-1" href="/suggestion">Suggest</a></li>
          <li>
            <a id="user_dropdown" class="dropdown-trigger valign-wrapper" href="#" data-target="user_options">
              <img class="logged_avatar" src="{{Auth::user()->avatar}}">
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

<ul class="dropdown-content" id="user_options">
  <li><a href="/logout">Log Out</a></li>
</ul>

  <!-- SideNav -->
  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class=section>
        <a href="/" class="brand-logo center"><h4>Blue Pages</h4></a>
        <div class="collection">
          <li><a href="" class="btn blue lighten-1 collection-item">Suggest</a></li>
          @if(!Auth::check())
          <li><a class="modal-trigger" href="#login-modal">Log In</a></li>
          <li><a class="modal-trigger" href="#login-modal">Sign In</a></li>
          @else
          <li><a href="/logout" class="collection-item">Log Out</a></li>
          @endif
        </div>
      </div>
    </div></li>
  </ul>

<!-- Login Modal -->
<div id="login-modal" class="modal">
  <div class="modal-content">
    <h4 class="center-align">login</h4>
    <p>A bunch of text</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
  </div>
</div>
