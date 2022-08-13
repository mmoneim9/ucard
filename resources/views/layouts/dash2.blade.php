<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UCard Inc. | @yield('title')</title>
  <meta name="_token" content="{!! csrf_token() !!}" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.min.css">

 <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
 <script>
 if('serviceWorker' in navigator) {
           navigator.serviceWorker.register('public/dist/js/firebase-messaging-sw.js')
         .then(function(registration) {
          console.log("Service Worker Registered");
         messaging.useServiceWorker(registration);
           });
           }
     var firebaseConfig = {
       apiKey: "AIzaSyCl2iYSHVa3PG7WfSwHFha3rEJ-pUGOa4k",
       authDomain: "ucard-d42cc.firebaseapp.com",
       projectId: "ucard-d42cc",
       storageBucket: "ucard-d42cc.appspot.com",
       messagingSenderId: "535745831710",
       appId: "1:535745831710:web:2c1799cc8223d5d5b51f0f",
       measurementId: "G-8ME3RCRKQY"
     };

     firebase.initializeApp(firebaseConfig);
     const messaging = firebase.messaging();

     function initFirebaseMessagingRegistration() {
             messaging
             .requestPermission()
             .then(function () {
                 return messaging.getToken()
             })
             .then(function(token) {

                 $.ajax({
                   url: "addtoken",
                   type:"POST",
                   data:{
                     _token: $('meta[name="_token"]').attr('content'),
                     tok: token
                   },
                   success:function(response){
                     console.log(response);
                     if(response) {
                     }
                   },
                   error: function(error) {
                    console.log(error);
                   }
                  });

             }).catch(function (err) {
                 console.log('User Chat Token Error'+ err);
             });
      }

     messaging.onMessage(function(payload) {
         const noteTitle = payload.notification.title;
         const noteOptions = {
             body: payload.notification.body,
             icon: payload.notification.icon,
         };
         new Notification(noteTitle, noteOptions);
     });
 initFirebaseMessagingRegistration()
 </script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="public/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="public/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="public/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="public/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 collapse-left">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">UCard Inc. </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Mahmoud </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                الرئيسية
              </p>
            </a>

          </li>
                    <li class="nav-item">
                      <a href='{{route('manualrechargelog2')}}' class="nav-link">
                        دليل شحن الالعاب
                                            </a>
                    </li>

                    <li class="nav-item">
                      <a href='{{route('pendingrecharges2')}}' class="nav-link">
                      الشحنات قيد الانتظار                      </a>
                    </li>
                    <li class="nav-item">
                      <a href='{{route('signout')}}' class="nav-link">
                      Signout                      </a>
                    </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  @yield('content')







<!-- ./wrapper -->

<!-- jQuery -->
<script src="public/plugins/jquery/jquery.min.js"></script>

<script src="public/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<script>
$( "#firstdate" ).datepicker({ dateFormat: 'y-m-d' });
$( "#seconddate" ).datepicker({ dateFormat: 'y-m-d' });
$( "#firstdatemanual" ).datepicker({ dateFormat: 'y-m-d' });
$( "#seconddatemanual" ).datepicker({ dateFormat: 'y-m-d' });
$("#search").keyup(function(event){
     event.preventDefault();

     $.ajax({
       url: "getusers",
       type:"POST",
       data:{
         _token: $('meta[name="_token"]').attr('content'),
         name: $("#search").val()
       },
       success:function(response){
         console.log(response);
         if(response) {
           $('.searchresult').empty();
           $('.searchresult').append(response);
         }
       },
       error: function(error) {
        console.log(error);
       }
      });
 });


 $("#searchemail").keyup(function(event){
      event.preventDefault();

      $.ajax({
        url: "getrecharge",
        type:"POST",
        data:{
          _token: $('meta[name="_token"]').attr('content'),
          email: $("#searchemail").val()
        },
        success:function(response){
          console.log(response);
          if(response) {
            $('.searchresult').empty();
            $('.searchresult').append(response);
          }
        },
        error: function(error) {
         console.log(error);
        }
       });
  });

   $("#seconddate").change(function(event){
        event.preventDefault();

        $.ajax({
          url: "getrechargedtadmin",
          type:"POST",
          data:{
            _token: $('meta[name="_token"]').attr('content'),
            firstdate: $("#firstdate").val(),
            seconddate: $("#seconddate").val()
          },
          success:function(response){
            console.log(response);
            if(response) {
              $('.searchresult').empty();
              $('.searchresult').append(response);
            }
          },
          error: function(error) {
           console.log(error);
          }
         });
    });

       $("#searchmanual").keyup(function(event){
            event.preventDefault();

            $.ajax({
              url: "getmanualrechargeadmin",
              type:"POST",
              data:{
                _token: $('meta[name="_token"]').attr('content'),
                email:$("#searchmanual").val()
              },
              success:function(response){
                console.log(response);
                if(response) {
                  $('.searchresult').empty();
                  $('.searchresult').append(response);
                }
              },
              error: function(error) {
               console.log(error);
              }
             });
        });

        $("#seconddatemanual").change(function(event){
             event.preventDefault();

             $.ajax({
               url: "getmanualrechargedtadmin",
               type:"POST",
               data:{
                 _token: $('meta[name="_token"]').attr('content'),
                 firstdate: $("#firstdatemanual").val(),
                 seconddate: $("#seconddatemanual").val()
               },
               success:function(response){
                 console.log(response);
                 if(response) {
                   $('.searchresult').empty();
                   $('.searchresult').append(response);
                 }
               },
               error: function(error) {
                console.log(error);
               }
              });
         });
         initFirebaseMessagingRegistration()
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="public/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="public/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="public/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="public/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="public/plugins/moment/moment.min.js"></script>
<script src="public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="public/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="public/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="public/dist/js/pages/dashboard.js"></script>
<script>
$(document).ready(function(){
    $("body").addClass("sidebar-collapse");
});
</script>
</body>
</html>
