
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$settings->site_title}} - {{$settings->site_descr}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="/img/{{$settings->favicon}}" type="image/x-icon"/>

  <!-- Google Fonts -->
    <link rel="stylesheet" href="/atlantis/css/fonts.min.css">
    
    
  <!-- Vendor CSS Files -->
  <link href="/atlantis/landing/vendor/aos/aos.css" rel="stylesheet">
  <link href="/atlantis/landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/atlantis/landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/atlantis/landing/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/atlantis/landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/atlantis/landing/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/atlantis/landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/atlantis/landing/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top " style="background-color:{{$settings->header_color}}">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/" class="xbold">{{strtoupper($settings->site_title)}}</a></h1>
      <!-- <a href="index.html" class="logo me-auto"><img src="/atlantis/landing/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="/#hero">{{__('homepage.hm')}}</a></li>
          <li><a class="nav-link scrollto" href="/#about">{{__('homepage.abt_lnk')}}</a></li>
          <li><a class="nav-link scrollto" href="/#services">{{__('homepage.plan_landing')}}</a></li>
          <li><a class="nav-link scrollto" href="/#faq">{{__('homepage.faqq')}}</a></li>
          <li><a class="nav-link scrollto active" href="#contact">{{__('homepage.hm_contact')}}</a></li>
          <li><a class="getstarted scrollto" href="{{route('login')}}">{{__('homepage.login_btn')}}</a></li>
          <li><a class="getstarted scrollto" href="{{route('register')}}">{{__('homepage.get_started')}}</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  
  <main id="main ">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact mt-5">
      <div class="container" data-aos="">
        <div class="section-title">
          <h2>{{__('contact.cont_us_ttle')}}</h2>
          <p>
              {{__('contact.cont_us_info')}}
          </p>
        </div>

        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="{{route('guest_msg')}}" method="post"  class="php-email-form">
                    @if(Session::get('toast_type') == 'err' )
                        <div class="alert alert-danger text-danger">{{__('contact.cont_msg_err')}}</div>
                    @endif
                    @if(Session::get('toast_type') == 'suc')
                        <div class="alert alert-success text-success">{{__('contact.cont_msg_suc')}}</div>
                    @endif
                
              <div class="row mt-5">
                <div class="form-group col-md-6">
                  <label for="name">{{__('contact.yr_name')}}</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">{{__('contact.yr_email')}}</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">{{__('contact.mail_subj')}}</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">{{__('contact.msg_cont')}}</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <button type="submit" class="btn btn-info">{{__('contact.send_msg')}}</button>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-contact">
          </div>
          <div class="col-md-6 text-center">
                {{ __('homepage.cpyrght') }} &#169; <a href="/">{{$settings->site_title}}</a> {{ date("Y") }}. {{ __('homepage.all_rght_resrvd') }} 
          </div>
        </div>
      </div>
    </div>

    
  </footer><!-- End Footer -->

  <!--<div id="preloader"></div>-->
  <!--<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>-->

  <!-- Vendor JS Files -->
  <!--<script src="/atlantis/landing/vendor/aos/aos.js"></script>-->
  <!--<script src="/atlantis/landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
  <!--<script src="/atlantis/landing/vendor/glightbox/js/glightbox.min.js"></script>-->
  <!--<script src="/atlantis/landing/vendor/isotope-layout/isotope.pkgd.min.js"></script>-->
  <!--<script src="/atlantis/landing/vendor/swiper/swiper-bundle.min.js"></script>-->
  <!--<script src="/atlantis/landing/vendor/waypoints/noframework.waypoints.js"></script>-->
  <!--<script src="/atlantis/landing/vendor/php-email-form/validate.js"></script>-->

  <!-- Template Main JS File -->
  <!--<script src="/atlantis/landing/js/main.js"></script>-->

</body>

</html>