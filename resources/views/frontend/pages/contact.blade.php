@extends('frontend.layouts.app')
@section('content')
    <section>
        <div class="container-fluid">
            <div class="about-title d-flex justify-content-center align-items-center">
                <h1 style="color: #0f4989;">Contact us</h1>
            </div>
        </div>
    </section>

    <section class="contact-form sec-space-both">
        <div class="container d-flex justify-content-center align-items-center">
            @if (Session::has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!! Session::get('success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="container-contact">
                <div class="content">
                    <div class="left-side">
                        <div class="address details">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="topic">Address</div>
                            <div class="text-one">{{ genrealSetting()->address }}</div>
                        </div>
                        <div class="phone details">
                            <i class="fas fa-phone-alt"></i>
                            <div class="topic">Phone</div>
                            <div class="text-one">+91 {{ genrealSetting()->contact_no }}</div>
                        </div>
                        <div class="email details">
                            <i class="fas fa-envelope"></i>
                            <div class="topic">Email</div>
                            <div class="text-two">info@chemtix.com</div>
                        </div>
                    </div>
                    <div class="right-side">
                        <div class="topic-text">Send us a message</div>
                        <p>If you have any work from me or any types of quries related to my tutorial, you can send me
                            message from here. It's my pleasure to help you.</p>
                        <form action="{{ route('contact.submit') }}" method="POST" id="contactForm">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" id=""
                                    aria-describedby="helpId" placeholder="Enter Name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" id=""
                                    aria-describedby="helpId" placeholder="Enter Email" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="tel" name="phone_number" id="phone_number" class="form-control w-100" />
                                @error('phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="company_name" id=""
                                    aria-describedby="helpId" placeholder="Enter Company name" />
                                @error('company_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="country" id=""
                                    aria-describedby="helpId" placeholder="Enter Country name" />
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <select class="form-select select2" name="product" id="product">
                                        <option value="" selected>Select a product</option>
                                        @foreach ($products as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('product')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-3">
                                <textarea name="note" id="" cols="20" class="form-control" rows="5" placeholder="Description"></textarea>
                            </div>
                            <div class="button">
                                <input type="submit" id="contact_submit" value="Send Now">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@section('customJS')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var phone_number = window.intlTelInput(
                document.querySelector("#phone_number"), {
                    separateDialCode: true,
                    preferredCountries: ["in"],
                    hiddenInput: "full",
                    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                }
            );

            $("#contactForm").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    phone_number: {
                        required: true,
                        digits: true,
                    },
                    company_name: {
                        required: true,
                    },
                    product: {
                        required: true,
                    },
                    
                },
                messages: {
                    name: {
                        required: "Name is required",
                    },
                    email: {
                        required: "Email is required",
                        email: "please enter valid email address"
                    },
                    company_name: {
                        required: "please enter company name"
                    },
                    phone_number: {
                        required: "phone is required",
                        digits: "please enter numbers only",
                    },
                    product: {
                        required: "Product is required",
                    },
                    
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    element.closest(".mb-3").append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass("is-invalid");
                },
                submitHandler:function(){
                    $("#contactForm").submit();
                }
            });
            
        })
    </script>
@endsection
@endsection
