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
        <h1 class="text-center section-title">Know us Better</h1>
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="card mt-2 know-card">
                    <div class="card-header card-head ">
                        Company philosofy
                    </div>
                    <div class="card-body">
                        We believe "Undertaking Ethical Dealing ". constant accomplishments are made to
                        emphasize perfect consistency to these ethical standards. We have taken ways to chase
                        total consistency to the Management of Business Ethics system in our organisation.
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mt-2 know-card">
                    <div class="card-header card-head">
                        Our values
                    </div>
                    <div class="card-body">
                        Jigs Chemical is keeping all promises made within and outside the organisation and we
                        are a benchmark company with respect to our products and services.
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mt-2 know-card">
                    <div class="card-header card-head">
                        Quality
                    </div>
                    <div class="card-body">
                        Quality has been a major focus of Jigs Chemical both in terms of human resources and
                        products of Pharmaceutical bulk drugs. We supply our clients with the array of
                        documentation required with new drug applications (NDA) and DMF registration for generic
                        API's and their respective Intermediates .
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mt-2 know-card">
                    <div class="card-header card-head">
                        How we work
                    </div>
                    <div class="card-body">
                        We act as a complete facilitating associate between our client Pharmaceutical companies
                        and our trustworthy and most reliable partner of supplier companies. We recognize the
                        specific requirements with exceeding expectations of our client Pharmaceutical companies
                        for API - Active Pharmaceutical Ingredients, Intermediates & Chemicals, other
                        Pharmaceutical Raw materials, chemicals and Excipients.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="import-export sec-space-both">
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
    <img src="{{asset('front-assets/chemtix_images/image-002.jpg')}}" alt="" class="img-fluid">
</section>
@endsection