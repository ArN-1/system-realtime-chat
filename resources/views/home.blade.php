<!DOCTYPE html>
<html lang="en">

<head>
  <title>Laravu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link href="{{asset('icomoon/styles.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

<div id="app">
  <div class="container app">
    <div class="row app-one">

      <div class="col-sm-4 side">
        <div class="side-one">
          @include('navbar-left')
          <!-- SearchBox -->
          <div class="row searchBox">
            <div class="col-sm-12 searchBox-inner">
              <div class="form-group has-feedback">
                <input id="searchText" type="text" class="form-control" name="searchText" placeholder="Search">
              </div>
            </div>
          </div>

          <!-- List People -->
          @include('people-list')
          <!-- List People End -->
        </div>
        <div class="side-two">
          <!-- Heading -->
          <div class="row newMessage-heading">
            <div class="row newMessage-main">
              <div class="col-sm-2 col-xs-2 newMessage-back">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
              </div>
              <div class="col-sm-10 col-xs-10 newMessage-title">
                New Chat
              </div>
            </div>
          </div>
          <!-- Heading End -->

          <!-- ComposeBox -->
          <div class="row composeBox">
            <div class="col-sm-12 composeBox-inner">
              <div class="form-group has-feedback">
                <input id="composeText" type="text" class="form-control" name="searchText" placeholder="Search People">
              </div>
            </div>
          </div>
          <!-- ComposeBox End -->

          <!-- sideBar -->
          <div class="row compose-sideBar">
            <div class="row sideBar-body">
              <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                  <img src="/image/avatar.png">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">Receiver
                  </span>
                  </div>
                  <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                    <span class="time-meta pull-right">18:18
                  </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Sidebar End -->
      </div>
      <!-- New Message Sidebar End -->

      @yield('conversation')
    </div>
    <!-- App One End -->
  </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/socket.io-1.3.4.js') }}"></script>
<script>
$(function(){
  $(".heading-compose").click(function() {
    $(".side-two").css({
      "left": "0"
    });
  });

  $(".newMessage-back").click(function() {
    $(".side-two").css({
      "left": "-100%"
    });
  });
});
</script>
</body>

</html>
