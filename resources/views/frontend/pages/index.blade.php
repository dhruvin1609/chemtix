@extends('frontend.layouts.app')
@section('content')

<section class="banner-slide">
    <div class="container">
      <div class="owl-carousel owl-theme" id="banner-carousel">
        <div class="item">
          <div class="ban-slide-main">
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="banner-content col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  <h2>
                    Most Reliable
                    <span>Partner</span>
                  </h2>
                  <p>
                    A Reliable Company to Work with Then You're Onto a Good Thing, Carefully Identified the Best
                    Strategic Partners.
                  </p>
                  <a href="" class="common-btn">Contact now</a>
                </div>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="banner-image ban1">
                  <img src="{{asset('front-assets/chemtix_images/Partnership-bro.png')}}" alt="banner" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="ban-slide-main">
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="banner-content col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  <h2>
                    EXCEEDING
                    <span>EXPECTATIONS</span>
                  </h2>
                  <p>
                    Meeting Or Exceeding Customer Expectations.
                  </p>
                  <a href="" class="common-btn">Hire Our Experts</a>
                </div>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="banner-image ban2">
                  <img src="{{asset('front-assets/chemtix_images/Medical prescription-pana.png')}}" alt="banner" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="ban-slide-main">
            <div class="row">
              <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="banner-content col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  <h2>
                    FASTER
                    <span>DELIVERY</span>
                  </h2>
                  <p>
                    Faster delivery gurented across all over india.
                  </p>
                  <a href="" class="common-btn">Transform Your Business</a>
                </div>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="banner-image ban3">
                  <img src="{{asset('front-assets/chemtix_images/Mail sent-bro.png')}}" alt="banner" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="about sec-space-both">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="about-content">
            <div class="sec-title text-left">
              <h2>Welcome to <br /><span>Chemtix</span></h2>
            </div>

            <p>
              Chemtix, is a well informed, well-versed, highly competent, promptly executing, competitive
              sourcing company. We, Chemtix, form an integral part of the global chemical industry. Chemtix
              is established in 1998 with the purpose of serving the emergent pharmaceutical sector in India
              and international market. Chemtix has come a long way from being just a chemicals supplier to a big
              renowned API, Pharmaceutical Intermediate, Nutraceuticals , Herbal Extracts, Industrial Chemicals, and
              Solvents for manufacturing , supplying, sourcing and marketing company
            </p>
            <a href="" class="common-btn">Explore our company</a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 abpic">
          <div class="about-image">
            <img loading="lazy" src="{{asset('front-assets/chemtix_images/About us page-amico.png')}}" alt="about" />
          </div>
        </div>
      </div>
    </div>
  </section>

    <section class="our-service sec-space-both">
      <div class="container">
        <div class="sec-title text-center">
          <h2>Our <span>Services</span></h2>
          <p>
            Global Sourcing and Marketing Company
          </p>
        </div>
        <div class="row">
          <div class="col-lg-3">
            <div class="single-box">
              <img src="{{asset('front-assets/chemtix_images/global-search.png')}}" alt="" class="img-fluid svc-img">
              <p class="text-center mt-3">
                Sourcing & Distribution
              </p>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="single-box">
              <img src="{{asset('front-assets/chemtix_images/digital-marketing.png')}}" alt="" class="img-fluid svc-img">
              <p class="text-center mt-3">
                Exclusive Marketing
              </p>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="single-box">
              <img src="{{asset('front-assets/chemtix_images/import.png')}}" alt="" class="img-fluid svc-img">
              <p class="text-center mt-3">
                Import & Export
              </p>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="single-box">
              <img src="{{asset('front-assets/chemtix_images/light-bulb.png')}}" alt="" class="img-fluid svc-img">
              <p class="text-center mt-3">
                Indenting & House
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

  <section class="hire sec-space-both">
    <div class="container">
      <div class="sec-title text-center">
        <h2>Exclusive Marketing Of Several Category Products</h2>
      </div>
      <div class="row mt-5 d-flex justify-content-center align-items-center">
        @foreach ($products as $item)
        <div class="col-md-3 col-lg-3 d-flex align-items-stretch mb-5 text-center">
          <div class="icon-box">
            <img src="{{asset('images/product/'.$item->image)}}" class="card-img-top product-image" alt="...">
            <hr>
            <h5 class="card-title">{{ $item->title }}</h5>
          </div>
        </div>
        @endforeach
    
      </div>
     
      
      <div class="all-btn text-center">
        <a href="{{ route('front.product') }}" class="common-btn">All Products</a>
      </div>
    </div>
  </section>
  @endsection