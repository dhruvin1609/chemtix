<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">.
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front-assets/chemtix_images/fav-icon.png') }}" />
    <title>
        Chemtix
    </title>
    <style>
        #newInput {
            display: none;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"
        data-async />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" data-async />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}" data-async />
    <link rel="stylesheet" href="{{ asset('front-assets/css/responsive.css') }}" data-async />
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <!-- End Google Tag Manager (noscript) -->
    <header id="main-header qsd">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ route('front.index') }}">
                    <img
                        src="@if (!empty(genrealSetting())) {{ asset('images/setting/' . genrealSetting()->primary_logo) }}" @endif alt="">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-content">
                    <span class="hamburger-toggle">
                        <span class="hamburger">
                            <svg aria-hidden="true" tabindex="0" class="e-font-icon-svg e-fas-align-justify"
                                viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M432 416H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-128H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-128H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-128H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z">
                                </path>
                            </svg>
                        </span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-content" style="margin-top: 20px;">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 justify-content-end" id="menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.about') }}">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.industry') }}">Industry We Serve</a>
                        </li>
                        <li class="nav-item" id="menu_3">
                            <a href="javascript:void(0)" class="nav-link">Products <i
                                    class="fa-solid fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('front.all-cat') }}">All Categories</a></li>
                                @foreach (getCategory() as $item)
                                    <li><a href="{{ route('front.cate-prod', $item->slug) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                                <!--<li><a href="our-team">Our Team</a></li>-->
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.contact') }}">Contact Us</a>
                        </li>
                        <li class="nav-item" id="searchLi">
                            <button class="btn btn-primary" id="searchBtn"><i class="fa fa-search"
                                    aria-hidden="true"></i></button>
                        </li>
                        <li class="nav-item" id="search_bar">
                            <form action="{{ route('search.product.home') }}" id="product_search" method="POST">
                                @csrf
                            </form>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <div id="content">
        <div id='whatsapp-chat' class='hide'>
            <div class='header-chat'>
                <div class='head-home'>
                    <h3>Hello!</h3>
                    <p>Click one of our representatives below to chat on WhatsApp or send us an email to
                        info@chemtix.in</p>
                </div>
                <div class='get-new hide'>
                    <div id='get-label'></div>
                    <div id='get-nama'></div>
                </div>
            </div>
            <div class='home-chat'>
                <!-- Info Contact Start -->
                <a class='informasi' href='javascript:void' title='Chat Whatsapp'>
                    <div class='info-avatar'><img
                            src='https://2.bp.blogspot.com/-y6xNA_8TpFo/XXWzkdYk0MI/AAAAAAAAA5s/RCzTBJ_FbMwVt5AEZKekwQqiDNqdNQJjgCLcBGAs/s70/supportmale.png' />
                    </div>
                    <div class='info-chat'>
                        <span class='chat-label'>Support</span>
                        <span class='chat-nama'>Customer Service 1</span>
                    </div><span class='my-number'>9723402903</span>
                </a>
                <!-- Info Contact End -->
                <div class='blanter-msg'>Call us to <b>+919723402903</b> from <i>0:00hs a 24:00hs</i></div>
            </div>
            <div class='start-chat hide'>
                <div class='first-msg'><span>Hello! What can I do for you?</span></div>
                <div class='blanter-msg'>
                    <textarea id='chat-input' placeholder='Write a response' maxlength='120' row='1'></textarea>
                    <a href='javascript:void;' id='send-it'>Send</a>
                </div>
            </div>
            <div id='get-number'></div><a class='close-chat' href='javascript:void'>×</a>
        </div>
        <a class='blantershow-chat' href='javascript:void' title='Show Chat'><i class='fab fa-whatsapp'></i></a>
        @yield('content')
        {{-- <div class="footer-career sec-space-both">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 mt-4">
                        <div class="career-lt">
                            <div class="sec-title text-left">
                                <h2>Looking for <span>Chemicals? </span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
                        <div class="career-rt text-right">
                            <a href="{{ route('front.contact') }}" class="common-btn">Contact us now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <footer>
            <div class="foot-link sec-space-both">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5845.984503451503!2d72.54224691847274!3d23.095147047394853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e83fedef840d9%3A0x2291a16bd1dd7896!2sChemtix!5e0!3m2!1sen!2sin!4v1711895093222!5m2!1sen!2sin"
                                width="200" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <h4 class="menu_title">Company Details</h4>
                            <ul class="footlink-inner">
                                <li>
                                    <p>{{ genrealSetting()->company_name }}</p>
                                </li>
                                <li>
                                    <a>{{ genrealSetting()->company_email }}</a>
                                </li>
                                <li>
                                    <a href="">{{ genrealSetting()->address }}</a>
                                </li>
                                <li>
                                    <a href="">{{ genrealSetting()->contact_no }}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <h4 class="menu_title">Our Products</h4>
                            <ul class="footlink-inner">
                                @foreach (getProducts() as $item)
                                    <li><a href="{{ route('front.product') }}">{{ $item->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="let_talk">
                                <p>Lets Talk</p>
                            </div>
                            <div class="email-div">
                                <p>email</p>
                            </div>
                            <div class="inquiry-now">
                                <p>inquiry-now</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <div class="foot-btm">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright">
                                <p>© 2023 Chemtix. All rights reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <ul class="pagelink">
                                <li><a href="">About</a></li>
                                <li><a href="">Career</a></li>
                                <li><a href="">Portfolio</a></li>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Sitemap</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li>
                                    <a href="">Terms and Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 	<div class="protection">
        <a href="//www.dmca.com/Protection/Status.aspx?ID=95343330-4902-4781-9e66-4ae9962d7cdc" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca-badge-w150-5x1-06.png?ID=95343330-4902-4781-9e66-4ae9962d7cdc"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
    </div> -->
        </footer>
        <a id="back-button"><img loading="lazy" src="{{ asset('image/top.webp') }}" alt="top-scroll" /></a>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js">
        </script>
        <script defer src="https://kit.fontawesome.com/b1100a39cb.js" crossorigin="anonymous"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
            integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
        <script defer src="{{ asset('front-assets/js/main.js') }}"></script>

        <script>
            $(document).ready(function() {
                $(document).on('click', '#searchBtn', function(e) {
                    $("#searchLi").hide();
                    $("#product_search").append(
                        '<input type="text" name="product_search" class="form-control" placeholder="search...">'
                        )
                })
            })
        </script>
        @yield('customJS')
    </div>
</body>

</html>
