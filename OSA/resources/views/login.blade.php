<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{asset('css/login.css')}}" media="screen, projection"/>

<div id="login-modal" class="modal modal-fixed-header">
    <div class="modal-header">
        <span>Account Login</span>
        <i class="right material-icons modal-close">close</i>
    </div>

    <div class="slide">
        <div class="row">
            <h5 class="center-align">Use your OBF Account</h5>
        </div>
        <div class="row center-align">
            <a class="black-text valign-wrapper g-btn z-depth-1" href="/redirect/google">
                <img src="{{asset('img/btn_google_light_normal_ios.svg')}}">
                <span>Sign in with Google</span>
            </a>
        </div>
        <div class="row center-align" style="bottom:10px; position:relative;" >
          <span>New Here?</span>
          <a href="/redirect/google">Create Account</a>
        </div>
    </div>
</div>
