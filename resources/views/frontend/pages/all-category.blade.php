@extends('frontend.layouts.app')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="about-title d-flex justify-content-center align-items-center">
                <h1 style="color: #0f4989;">All Categories</h1>
            </div>
        </div>
    </section>


    <section class="sec-space-both">
        <div class="container">
            <div class="row">
                @if($categories)
                @foreach ($categories as $item)
                <div class="col-lg-4">
                    <div class="cat-card">
                        <a class="card1" href="{{ route('front.cate-prod',$item->slug) }}">
                         <p>{{ $item->name }}</p>
                         <div class="go-corner" href="#">
                           <div class="go-arrow">
                             →
                           </div>
                         </div>
                       </a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            
        </div>
    </section>

@endsection
