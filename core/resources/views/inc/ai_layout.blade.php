<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Maxprofit-Licence Activation</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/img/logo.png" type="image/x-icon"/>
    <!-- CSS Files -->
    <link rel="stylesheet" href="/atlantis/css/bootstrap.min.css">
    <link rel="stylesheet" href="/atlantis/css/atlantis.min.css">
    <link rel="stylesheet" href="/atlantis/style.css">

    <!-- font -->
    <link rel="stylesheet" href="/atlantis/css/fonts.min.css">
    <!-- jquery lib -->
    <script src="/atlantis/js/core/jquery.3.2.1.min.js"></script>
    
</head>

@yield('content')

<!-- Footer Start-->
<div class="footer-copyright-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-copy-right" style="text-align:center; color:#222">
                    <p>Copyright &#169; <a href="/" >Maxprofit</a> {{ date("Y")}} {{ __('messages.all_rght_resrvd') }} </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="p_loading" class="container ploading">
  <div class="row">
    <div class="col-md-4">&emps;</div>
    <div class="col-md-4 ploading_img_cont" align="Center">
      <img src="/img/loader.gif" class="ploading_img">
      <br>
      Loading....
    </div>
  </div>
</div>
<!-- Footer End-->

</div>
<script src="/atlantis/js/core/popper.min.js"></script>
<script src="/atlantis/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="/atlantis/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="/atlantis/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="/atlantis/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


<!-- Chart JS -->
<script src="/atlantis/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="/atlantis/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="/atlantis/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="/atlantis/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="/atlantis/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="/atlantis/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="/atlantis/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

<!-- Sweet Alert -->
<script src="/atlantis/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Atlantis JS -->
<script src="/atlantis/js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="/atlantis/js/setting-demo.js"></script>
<!-- <script src="/atlantis/js/demo.js"></script>    -->
<script src="/atlantis/js/moment.js"></script>
<!-- <script src="/atlantis/main.js"></script> -->

@stack('scripts')
    
</body>

</html>

@include('user.inc.alert')

@if(Session::has('status')  && Session::get('msgType') == 'suc')         
    <script type="text/javascript">
        $('#succ_msg').html('{{Session::get('status')}}');
        $('#succ').show();
    </script>
    {{Session::forget('status')}}
    {{Session::forget('msgType')}}         
@elseif(Session::has('status')  && Session::get('msgType') == 'err')        
    <script type="text/javascript">
        $('#errr_msg').html('{{Session::get('status')}}');
        $('#errr').show();
    </script>
    {{Session::forget('status')}}
    {{Session::forget('msgType')}}
@endif

@include('sweetalert::alert')