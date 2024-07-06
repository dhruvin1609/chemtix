@extends('frontend.layouts.app')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="about-title d-flex justify-content-center align-items-center">
                <h1 style="color: #0f4989;">Products - {{ $category->name }}</h1>
            </div>
        </div>
    </section>

    <section class="sec-space-both">
        <div class="container">
            <div class="row">
                @foreach ($products as $item)
<div class="col-lg-4 col-md-6 mt-3">
    <div class="card product-card-detail" data-aos="zoom-out">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    @if(isset($item->image))
                    <div class="product-img-div">
                        <img src="{{asset('images/product/'.$item->image??"")}}" alt="" class="img-fluid mt-3">
                    </div>
                    @else
                    <div class="product-img-div">
                        <img class="img-fluid mt-3" style="opacity: 0.3"
                        src="@if (!empty(genrealSetting())) {{ asset('images/setting/' . genrealSetting()->primary_logo??"") }}" @endif alt="">
                    </div>
                    @endif
                    <div class="button btn-div d-flex justify-content-center align-items-center">
                        <a href="{{ route('front.contact') }}" class="btn btn-sm product-btn">Inquiry this product</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-4 product-detail">
                    <span>Product: {{ $item->title??"" }}</span>
                    <p>{{$item->chemical_name??""}}</p>
                    <span>CAS NO:</span>
                    <p>{{$item->cas_number??""}}</p>
                    <span>Molecular Weight</span>
                    <p>{{$item->molecular_weight??""}}</p>
                    <span>Molecular Formula</span>
                    <p>{{$item->molecular_formula??""}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

            </div>
        </div>
    </section>


@endsection
