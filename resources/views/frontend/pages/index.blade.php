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
                  <a href="{{ route('front.contact') }}" class="common-btn">Enquiry Now</a>
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
                  <a href="{{ route('front.contact') }}" class="common-btn">Enquiry Now</a>
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
                  <a href="{{ route('front.contact') }}" class="common-btn">Enquiry Now</a>
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
          <div data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" class="about-content">
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
            <a href="{{ route('front.about') }}" class="common-btn">Explore our company</a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 abpic">
          <div  class="about-image">
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
        {{-- <div class="d-flex justify-content-center align-items-center">
          <img src="{{ asset('front-assets/chemtix_images/our_services.png') }}" class="img-fluid service_img" alt="">
        </div> --}}
        <div data-aos="fade-in" class="row">
          <div class="col-lg-4 mt-5 service-parent">
            <div class="service">
              <div class="Solutions_title_container d-flex flex-row align-items-center justify-content-center">
                  <div>
                      <div class="Solutions_icon"><img src="{{('front-assets/chemtix_images/importexport.png')}}" alt=""></div>
                  </div>
                  <div class="Solutions_title">Import & Export</div>
              </div>
          </div>
          </div>
          <div class="col-lg-4 mt-5 service-parent">
            <div class="service">
              <div class="Solutions_title_container d-flex flex-row align-items-center justify-content-center">
                  <div>
                      <div class="Solutions_icon"><img src="{{('front-assets/chemtix_images/sourcing.png')}}" alt=""></div>
                  </div>
                  <div class="Solutions_title">Sourcing & Distribution</div>
              </div>
          </div>
          </div>
          <div class="col-lg-4 mt-5 service-parent">
            <div class="service">
              <div class="Solutions_title_container d-flex flex-row align-items-center justify-content-center">
                  <div>
                      <div class="Solutions_icon"><img src="{{('front-assets/chemtix_images/marketing.png')}}" alt=""></div>
                  </div>
                  <div class="Solutions_title">Marketing Analysis & Intelligence</div>
              </div>
          </div>
          </div>
          <div class="col-lg-4 mt-5 service-parent">
            <div class="service">
              <div class="Solutions_title_container d-flex flex-row align-items-center justify-content-center">
                  <div>
                      <div class="Solutions_icon"><img src="{{('front-assets/chemtix_images/material.png')}}" alt=""></div>
                  </div>
                  <div class="Solutions_title">Best Quality of Material</div>
              </div>
          </div>
          </div>
          <div class="col-lg-4 mt-5 service-parent">
            <div class="service">
              <div class="Solutions_title_container d-flex flex-row align-items-center justify-content-center">
                  <div>
                      <div class="Solutions_icon"><img src="{{('front-assets/chemtix_images/time.png')}}" alt=""></div>
                  </div>
                  <div class="Solutions_title">Quick Material at Time</div>
              </div>
          </div>
          </div>
          <div class="col-lg-4 mt-5 service-parent">
            <div class="service">
              <div class="Solutions_title_container d-flex flex-row align-items-center justify-content-center">
                  <div>
                      <div class="Solutions_icon"><img src="{{('front-assets/chemtix_images/quality.png')}}" alt=""></div>
                  </div>
                  <div class="Solutions_title">Trouble Free Experience</div>
              </div>
          </div>
          </div>
          <div class="col-lg-4 mt-5 service-parent">
            <div class="service">
              <div class="Solutions_title_container d-flex flex-row align-items-center justify-content-center">
                  <div>
                      <div class="Solutions_icon"><img src="{{('front-assets/chemtix_images/documentation.png')}}" alt=""></div>
                  </div>
                  <div class="Solutions_title">Documentation and compliance</div>
              </div>
          </div>
          </div>
          <div class="col-lg-4 mt-5 service-parent">
            <div class="service">
              <div class="Solutions_title_container d-flex flex-row align-items-center justify-content-center">
                  <div>
                      <div class="Solutions_icon"><img src="{{('front-assets/chemtix_images/support.png')}}" alt=""></div>
                  </div>
                  <div class="Solutions_title">After sales support</div>
              </div>
          </div>
          </div>
          <div class="col-lg-4 mt-5 service-parent">
            <div class="service">
              <div class="Solutions_title_container d-flex flex-row align-items-center justify-content-center">
                  <div>
                      <div class="Solutions_icon"><img src="{{('front-assets/chemtix_images/technical-support.png')}}" alt=""></div>
                  </div>
                  <div class="Solutions_title">Analytical data support</div>
              </div>
          </div>
          </div>
         
        </div>
        {{-- <div class="row">
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
        </div> --}}
      </div>
    </section>

  <section class="hire sec-space-both">
    <div class="container">
      <div class="sec-title text-center">
        <h2>Exclusive Marketing Of Several Category</h2>
      </div>
      <div data-aos="fade-right" class="row mt-5 d-flex justify-content-center align-items-center">
        {{-- @foreach ($products as $item) --}}
        <div  class="col-md-4 col-lg-2 d-flex justify-content-center align-items-center mb-5 text-center" >
          <div class="icon-box">
            <img src="{{asset('front-assets/chemtix_images/chemicals_cat.png')}}" class="card-img-top product-image" alt="...">
            <hr>
            <a href="{{ route('front.cate-prod','chemical') }}"><h5 class="card-title">Chemicals</h5></a>
          </div>
        </div>
        <div class="col-md-4 col-lg-2 d-flex justify-content-center align-items-center mb-5 text-center">
          <div class="icon-box">
            <img src="{{asset('front-assets/chemtix_images/intermediate_cat.png')}}" class="card-img-top product-image" alt="...">
            <hr>
            <a href="{{ route('front.cate-prod','intermediates') }}"><h5 class="card-title">Intermediate</h5></a>
          </div>
        </div>
        <div class="col-md-4 col-lg-2 d-flex justify-content-center align-items-center mb-5 text-center">
          <div class="icon-box">
            <img src="{{asset('front-assets/chemtix_images/solvent_cat.png')}}" class="card-img-top product-image" alt="...">
            <hr>
            <a href="{{ route('front.cate-prod','solvent') }}"><h5 class="card-title">Solvent</h5></a>
          </div>
        </div>
        <div class="col-md-4 col-lg-2 d-flex justify-content-center align-items-center mb-5 text-center">
          <div class="icon-box">
            <img src="{{asset('front-assets/chemtix_images/api_cat.png')}}" class="card-img-top product-image" alt="...">
            <hr>
            <a href="{{ route('front.cate-prod','api') }}"><h5 class="card-title">API</h5></a>
          </div>
        </div>
        <div class="col-md-4 col-lg-2 d-flex justify-content-center align-items-center mb-5 text-center">
          <div class="icon-box">
            <img src="{{asset('front-assets/chemtix_images/rice field-rafiki.png')}}" class="card-img-top product-image" alt="...">
            <hr>
            <a href="{{ route('front.cate-prod','agro-industries') }}"><h5 class="card-title">Agro Industries</h5></a>
          </div>
        </div>
        <div class="col-md-4 col-lg-2 d-flex justify-content-center align-items-center mb-5 text-center">
          <div class="icon-box">
            <img src="{{asset('front-assets/chemtix_images/beaker chemistry-rafiki.png')}}" class="card-img-top product-image" alt="...">
            <hr>
            <a href="{{ route('front.cate-prod','fine-chemicals') }}"><h5 class="card-title">Fine Chemicals</h5></a>
          </div>
        </div>
        {{-- @endforeach --}}
    
      </div>
     
      
      <div class="text-center">
        <a href="{{ route('front.product') }}" class="common-btn">All Products</a>
      </div>
    </div>
  </section>
  @endsection