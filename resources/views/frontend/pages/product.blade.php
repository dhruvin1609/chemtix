@extends('frontend.layouts.app')
@section('content')

<section>
    <div class="container-fluid">
        <div class="about-title d-flex justify-content-center align-items-center">
            <h1 style="color: #0f4989;">Products</h1>
        </div>
    </div>
</section>

<section class="products sec-space-both">
    <div class="container">
        <div class="sec-title text-center">
            <h2 style="color: #0f4989;">Explore Our products</h2>
        </div>
        <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="row mt-5">
            <!-- Product 1 -->
            @foreach ($products as $item)
            <div class="col-lg-4 mt-3">
                <div class="card product-card-detail" data-aos="zoom-out" style="width: 24rem;">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="{{asset('images/product/'.$item->image)}}" alt="" class="product-img">
                            <div class="button d-flex justify-content-center align-items-center">
                                <a href="" class="btn btn-sm product-btn">Inquiry this product</a>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-4 product-detail">
                            <span>Product :{{ $item->title }}</span>
                            <p>{{$item->chemical_name}}</p>
                            <span>CAS NO:</span>
                            <p>{{$item->cas_number}}</p>
                            <span>Molecular Weight</span>
                            <p>{{$item->molecular_weight}}</p>
                            <span>Molecular Formula</span>
                            <p>{{$item->molecular_formula}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="d-flex justify-content-center mt-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
        </div>
    </div>
</section>
@endsection