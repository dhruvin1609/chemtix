<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" sizes="16x16" href="" />
    <title>
        Chemtix
    </title>

    <link rel="canonical" href="https://quarkssystems.com/" />
    <link rel="shortcut icon" href="https://quarkssystems.com/image/favicon.svg" />
    <link rel="apple-touch-icon" href="https://quarkssystems.com/image/favicon.svg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"
        data-async />
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
                <a class="navbar-brand" href="">
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
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('front.contact') }}">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <div id="content">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Search Products</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Search Product by Name and CAS number</label>
                            <input type="text" class="form-control" name="" id=""
                                aria-describedby="helpId" placeholder="" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Search</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        @yield('content')
        <div class="footer-career sec-space-both">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12">
                        <div class="career-lt">
                            <div class="sec-title text-left">
                                <h2>Looking for <span>Chemicals? </span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
                        <div class="career-rt text-right">
                            <a href="" class="common-btn">Contact us now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="foot-link sec-space-both">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <h4 class="menu_title">Company Details</h4>
                            <ul class="footlink-inner">
                                <li><p>{{ genrealSetting()->company_name }}</p></li>
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

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <h4 class="menu_title">Our Products</h4>
                            <ul class="footlink-inner">
                                @foreach (getProducts() as $item)
                                <li><a href="{{ route('front.product') }}">{{ $item->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <h4 class="menu_title">Industries</h4>
                            <ul class="footlink-inner">
                                <li><a href="">Abrasive Agro Chemicals</a></li>
                                <li><a href="">Auxiliary chemicals</a></li>
                                <li><a href="">Food & Beverages Sector </a></li>
                                <li><a href="">Other Fine Chemical Sectors</a></li>
                                <li><a href="">Pharmaceuticals raw materials</a></li>
                                <li><a href="">Bulk drugs</a></li>
                            </ul>
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
        <a id="back-button"><img loading="lazy" src="image/top.webp" alt="top-scroll" /></a>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
            integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <script defer src="https://kit.fontawesome.com/b1100a39cb.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.js">
        </script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
            integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
            integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.websitepolicies.io/lib/cconsent/cconsent.min.js" defer></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"
            crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
            integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script defer src="{{ asset('front-assets/js/main.js') }}"></script>
        @yield('customJS')
    </div>
</body>

</html>
