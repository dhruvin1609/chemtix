@extends('frontend.layouts.app')
@section('content')
<section>
    <div class="container-fluid">
        <div class="about-title d-flex justify-content-center align-items-center">
            <h1 style="color: #0f4989;">About Chemtix</h1>
        </div>
    </div>
</section>
<section class="about sec-space-both">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 style="color: #0f4989;">We are happy to found you here</h2>
                <p class="mt-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis nesciunt
                    enim, quas
                    molestias asperiores deleniti obcaecati laborum voluptatum suscipit ea sit a repellat
                    dolorem aliquam porro facilis officiis, tempora quod. Enim inventore illum voluptatum quas
                    quos perspiciatis dignissimos magni aperiam a deserunt quisquam, aliquid ab tempora
                    laboriosam facilis accusantium dolorem blanditiis voluptatibus maxime itaque, repellat
                    aspernatur praesentium? Molestiae eligendi dignissimos quo odit reiciendis, asperiores,
                    dolor quos unde odio libero vel alias atque ratione quae consectetur inventore perspiciatis
                    consequatur. Magnam pariatur error repellat ullam! Sed exercitationem eveniet possimus qui
                    alias, tempore, ullam facilis asperiores soluta, delectus repudiandae! Doloremque nesciunt
                    autem dolorum?</p>
            </div>
            <div class="col-lg-6 d-flex justify-content-center align-items-center mb-3">
                <img src="{{asset('front-assets/chemtix_images/chemistry lab-cuate.png')}}" alt="" class="about-page-image">
            </div>
        </div>
    </div>
</section>

<section class="our-values sec-space-both">
    <div class="container">
        <div class="row">
            <div data-aos="fade-right" class="col-lg-6">
                <img class="img-fluid" src="{{ asset('front-assets/chemtix_images/vision_img.png') }}" style="height: 30rem;width:35rem;" alt="">
            </div>
            <div data-aos="fade-left" class="col-lg-6">
                <div class="sec-title text-center">
                    <h2>Our <span style="color:#0f4989">Vision</span></h2>
                </div>
                <ul  class="vision-text mt-5">
                    <li><i class="fa-solid fa-circle" style="margin-right: 15px;color:#0f4989"></i> Take a place at the edge of chemical</li>
                    <li><i class="fa-solid fa-circle" style="margin-right: 15px;color:#0f4989"></i> Expand the utility of chemical</li>
                    <li><i class="fa-solid fa-circle" style="margin-right: 15px;color:#0f4989"></i> Upgrade the user Experience with dealing with us</li>
                    <li><i class="fa-solid fa-circle" style="margin-right: 15px;color:#0f4989"></i> Making supply units for quick shipping</li>
                </ul>
            </div>
        </div>    
    </div>
</section>
<section class="our-service sec-space-both">
    <div class="container">
        <div class="row">
           
            <div data-aos="fade-right" class="col-lg-6">
                <div  class="sec-title text-center">
                    <h2>Our <span style="color:#0f4989">Mission</span></h2>
                </div>
                <ul class="vision-text mt-5">
                    <li><i class="fa-solid fa-circle" style="margin-right: 15px;color:#0f4989"></i> We aim to Provide Best Material</li>
                    <li><i class="fa-solid fa-circle" style="margin-right: 15px;color:#0f4989"></i> Competitive price with best service</li>
                    <li><i class="fa-solid fa-circle" style="margin-right: 15px;color:#0f4989"></i> Constantly improvising the supply chain to enhance the product,quality and service</li>
                    <li><i class="fa-solid fa-circle" style="margin-right: 15px;color:#0f4989"></i> We can provide integrated sourcing services for our customers</li>
                </ul>
            </div>
            <div data-aos="fade-left" class="col-lg-6">
                <img class="img-fluid" src="{{ asset('front-assets/chemtix_images/our_mission.png') }}" style="height: 30rem;width:35rem;" alt="">
            </div>
        </div>    
    </div>
</section>

<section class="import-export mt-5">
    <div class="container">
        <div class="sec-title text-center">
            <h2 style="color: #0f4989;">Import & Export</h2>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="import-export-content">
                    <p class="ie-txt border-right float-end">
                        Chemtix specialize in sourcing and importing premium materials from around the world
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="import-export-content">
                    <p class="ie-txt text-left">
                        We ensure that materials are exported quickly as well as without incident to all our
                        customers worldwide
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="ing">
        <img src="/front-assets/chemtix_images/import-export.png" class="img-fluid ie-img" alt="">
    </div>
</section>

@endsection