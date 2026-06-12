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

      <h1 class="logo me-auto"><a class="xbold"  href="/">{{strtoupper($settings->site_title)}}</a></h1>
      <!-- <a href="index.html" class="logo me-auto"><img src="/atlantis/landing/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">{{__('homepage.hm')}}</a></li>
          <li><a class="nav-link scrollto" href="#about">{{__('homepage.abt_lnk')}}</a></li>
          <li><a class="nav-link scrollto" href="#services">{{__('homepage.plan_landing')}}</a></li>
          <li><a class="nav-link scrollto" href="#faq">{{__('homepage.faqq')}}</a></li>
          <li><a class="nav-link scrollto" href="/contact">{{__('homepage.hm_contact')}}</a></li>
          <li><a class="getstarted scrollto" href="{{route('login')}}">{{__('homepage.login_btn')}}</a></li>
          <li><a class="getstarted scrollto" href="{{route('register')}}">{{__('homepage.get_started')}}</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="background-color:{{$settings->header_color}}; min-height: 700px;">
    <div class="container">
      <div class="row" style="">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>{{ __('homepage.hero_title') }}</h1>
            <p class="text-white">
                {{ __('homepage.hero_text') }}
            </p>
            <div class="d-flex justify-content-center justify-content-lg-start">
                <a href="{{route('register')}}" class="btn-get-started scrollto">{{__('homepage.register')}}</a>&emsp;
                <a class="btn-get-started scrollto" href="{{route('login')}}">{{__('homepage.login_btn')}}</a>
            </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="/atlantis/landing/img/{{$settings->hero_img}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <section id="about" class="about">
      <div class="container" data-aos="">

        <div class="section-title">
          <h2>{{__('homepage.abt_us')}}</h2>
        </div>

        <div class="row content">
            <div class="col-sm-3  text-center" ></div>
            <div class="col-sm-6  text-center" >
                <p>
                    {{__('homepage.abt_us_text')}}
                </p>
            </div>
        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>{{__('homepage.plan_landing')}}</h2>
            <p>
              {{__('homepage.plan_landing_text')}}
            </p>
        </div>
        <?php $pkgs = App\Models\packages::where('status', 1)->orderby('id', 'asc')->get(); $cnt = 0; ?>
        
            @if(count($pkgs) != 0)
                @foreach($pkgs as $pkg)
                    @if($cnt == 0)
                        <div class="row d-flex flex-row justify-content-center align-items-center">
                    @endif
                          <div class="col-md-4 " data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box" style="width: 100%">
                              <div class="text-primary"><h6 class="text-center text-uppercase">{{$pkg->package_name}} {{ __('homepage.pckg') }}</h6></div>
                              <div><h4 class="text-primary text-center">{{ round($pkg->daily_interest*$pkg->period*100, 2)}}% RIO</h4></div>
                                  <table class="table_cellspacing"  width="100%">
                                      <tr class="hr_line">
                                          <td class="p_top">{{__('homepage.ivt_prd')}}</td>
                                          <td class=" text-primary">{{$pkg->period.' '.__('homepage.days_spnt')}}</td>
                                      </tr>
                                      <tr class="hr_line">
                                          <td class="p_top">{{__('homepage.min_invstm')}}</td>
                                          <td class=" text-primary">{{env('CURRENCY').' '.$pkg->min}}</h3></td>
                                      </tr>
                                      <tr class="hr_line">
                                          <td class="p_top">{{__('homepage.max_invstm')}}</td>
                                          <td class=" text-primary">{{env('CURRENCY').' '.$pkg->max}}</td>
                                      </tr>
                                      <tr class="hr_line">
                                          <td class="p_top">{{__('homepage.wthdrwls_intvl')}}</td>
                                          <td class=" text-primary">{{$pkg->days_interval.' '.__('homepage.days_spnt')}}</td>
                                      </tr>
                                  </table>
                                <div class="text-center mt-5">
                                    <a class="btn  btn_primary_color" href="{{route('register')}}">{{__('homepage.get_started')}}</a>
                                </div>
                                
                                </div>
                            </div>
                    @php($cnt += 1)
                    @if($cnt == 3 || $cnt == count($pkgs) )
                        @php($cnt = 0)
                        </div>
                    @endif
                @endforeach
            @endif
        

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq " style="background-color: #0D0D38;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 class="text-white">{{__('homepage.faqs')}}</h2>
          <p class="text-white">{{__('homepage.faqs_desc')}}</p>
        </div>

        <div class="faq-list pb-5">
          <ul>
            
                <li data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq1">{{__('homepage.faq1')}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="faq1" class="collapse hide" data-bs-parent=".faq-list">
                    <p>
                      {{__('homepage.faq_ans1')}}
                    </p>
                  </div>
                </li>
                
                <li data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq2">{{__('homepage.faq2')}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="faq2" class="collapse hide" data-bs-parent=".faq-list">
                    <p>
                      {{__('homepage.faq_ans2')}}
                    </p>
                  </div>
                </li>
                
                <li data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq3"> {{__('homepage.faq3')}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="faq3" class="collapse hide" data-bs-parent=".faq-list">
                    <p>
                        {{__('homepage.faq_ans3')}}
                    </p>
                  </div>
                </li>
                
                <li data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq4"> {{__('homepage.faq4')}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="faq4" class="collapse hide" data-bs-parent=".faq-list">
                    <p>
                      {{__('homepage.faq_ans4')}}
                    </p>
                  </div>
                </li>
                
                <li data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq5"> {{__('homepage.faq5')}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="faq5" class="collapse hide" data-bs-parent=".faq-list">
                    <p>
                        {{__('homepage.faq_ans5')}}
                    </p>
                  </div>
                </li>
               
            
          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="bg-white" >

    <div class="footer-newsletter bg-white">
        <div class="section-title">
          <h2>{{__('homepage.we_accept')}}</h2>
        </div>
      <div class="container">
        <div class="row ">
                @if(env('SWITCH_PAYPAL') == 1)
                    <div id="pm_paypal" class="col-sm-4 col-6 mt-5 ">      
                        <a href="#">
                            <img src="/img/paypal.png" height="50px" /> <br>
                        </a>
                    </div>
                @endif
                @if(env('SWITCH_STRIPE') == 1)
                <div id="pm_stripe" class="col-sm-4 col-6 mt-5 ">
                    <a href="#">
                        <img src="/img/stripe.png" height="50px" /> <br>
                    </a>
                </div>
                @endif

                @if(env('PM_SWITCH') == 1)
                <div id="pm_pm"  class="col-sm-4 col-6 mt-5 ">
                    <a href="{{route('pm.index')}}">
                        <img src="/img/pm.png" height="50px" /> <br>
                    </a>
                </div>
                @endif
               
                @if(env('PAYEER_SWITCH') == 1)
                <div id="pm_payeer" class="col-sm-4 col-6 mt-5 ">
                    <a href="#">
                        <img src="/img/payeer.png" height="50px" /> <br>  
                    </a>
                </div>
                @endif

                @if(env('SWITCH_BTC') == 1)
                <div id="pm_btc" class="col-sm-4 col-6 mt-5 ">   
                    <a href="#">
                        <img src="/img/cpm.jpg" height="50px" /> <br>  
                    </a>
                </div>
                @endif

                @if(env('COINBASE_SWITCH') == 1)                                                    
                <div id="pm_coinbase" class="col-sm-4 col-6 mt-5 ">   
                    <a href="#">
                        <img src="/img/cbase.png" height="50px" /> <br>
                    </a>
                </div>
                @endif


                @if(env('SWITCH_ETH') == 1)
                @php($lnk_pm = route('btc.index', ['coin' => 'ETH']))                                                    
                <!--<div id="pm_eth" onclick="sel_pm(this.id, '{{$lnk_pm}}')" class="col-sm-4 mt-5 ">-->
                <!--    <img src="/img/eth.png" height="50px" ><br>     -->
                <!--</div>-->
                @endif

                @if(env('PAYSTACK_SWITCH') == 1)
                <div id="pm_paystack" class="col-sm-4 col-6 mt-5 " >
                    <a href="#">
                        <img src="/img/paystack.png" height="50px" /> 
                    </a> 
                </div>
                @endif
                
                @if(env('FLUTTER_SWITCH') == 1)
                <div id="pm_flutter" class="col-sm-4 col-6 mt-5 " >
                    <a href="{{route('flutter_payment.index')}}">
                        <img src="/img/flutterwave.png" height="50px" width="100px" />
                    </a>   
                </div>
                @endif
                
                @if(env('RAZOR_PAY_SWITCH') == 1)
                <div id="pm_razorpay" class="col-sm-4 col-6 mt-5 " >
                    <a href="#">
                        <img src="/img/razorpay.jpg" height="50px" width="100px" />  
                     </a> 
                </div>
                @endif
                
                @if(env('MBC_SWITCH') == 1)
                <div id="" class="col-sm-4 col-6 mt-5  text-primary"> 
                    <a id='mbc_pop_btn' href="#" type="button" class="" data-toggle="modal" data-target="#mbc_pop">
                        <img src="/img/bcimg.png" alt="Blockchain" class="text-primary payment_methods_img" height="50px" width="100px"/> 
                        <span></span>
                    </a>
                </div>
               
                @endif

                @if(env('BANK_DEPOSIT_SWITCH') == 1)
                <div id="pm_bank_pop" class="col-sm-4 col-6  mt-5 "> 
                    <a id='my_bank_Modal' href="#" type="button" class="display_none" data-toggle="modal" data-target="#dp_bank_pop">
                        <img src="/img/bank.png" height="50px" width="80px" />
                    </a> 
                </div>
                @endif
            </div>
        </div>
      </div>
    </div>

    <div class="footer-top" style="background-color: #F3F5FA;">
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

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/atlantis/landing/vendor/aos/aos.js"></script>
  <script src="/atlantis/landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/atlantis/landing/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/atlantis/landing/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/atlantis/landing/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/atlantis/landing/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="/atlantis/landing/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/atlantis/landing/js/main.js"></script>
  @include('sweetalert::alert')

</body>

</html>