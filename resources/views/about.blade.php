@extends('admin.layout.main')
@section('content')
    <section class="page-header padding">
        <div class="anim-elements">
            <div class="anim-element"></div>
            <div class="anim-element"></div>
            <div class="anim-element"></div>
            <div class="anim-element"></div>
            <div class="anim-element"></div>
        </div>
        <div class="container">
            <div class="page-content text-center">
                <h2>About Us</h2>
                <p>Multipurpose Saas Startup HTML Template.</p>
            </div>
        </div>
    </section><!--/. page-header -->

    <section class="promo-section bd-bottom padding">
        <div class="container">
            <div class="row promo-wrap">
                <div class="col-lg-3 col-sm-6 sm-padding">
                    <div class="promo-item wow fadeInUp" data-wow-delay="200ms">
                        <i class="sb sb-chart"></i>
                        <i class="sb sb-chart transparent"></i>
                        <h3>Data Analytics</h3>
                        <p>We provide marketing service to startups businesses to looking for a partner digital media.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 sm-padding">
                    <div class="promo-item wow fadeInUp" data-wow-delay="300ms">
                        <i class="sb sb-stats"></i>
                        <i class="sb sb-stats transparent"></i>
                        <h3>Digital Marketing</h3>
                        <p>We provide marketing service to startups businesses to looking for a partner digital media.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 sm-padding">
                    <div class="promo-item wow fadeInUp" data-wow-delay="400ms">
                        <i class="sb sb-hours"></i>
                        <i class="sb sb-hours transparent"></i>
                        <h3>Customer Care</h3>
                        <p>We provide marketing service to startups businesses to looking for a partner digital media.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 sm-padding">
                    <div class="promo-item wow fadeInUp" data-wow-delay="500ms">
                        <i class="sb sb-target"></i>
                        <i class="sb sb-target transparent"></i>
                        <h3>Email Marketing</h3>
                        <p>We provide marketing service to startups businesses to looking for a partner digital media.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/.promo-section-->

    <section class="content-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="row content-wrap">
                <div class="col-lg-6 sm-padding">
                    <div class="content-info wow fadeInLeft" data-wow-delay="300ms">
                        <span>Features</span>
                        <h2>Revolutionize Your Online <br>Business Today!</h2>
                        <p>We provide marketing services to startups and small businesses to looking for a partner of their
                            digital media, design &amp; development, lead generation and communications requirents.</p>
                        <ul class="content-feature">
                            <li class="content-feature-item">
                                <i class="sb sb-stats color-red"></i>
                                <div class="content-details">
                                    <h3>Digital Data Analysis</h3>
                                    <p>We provide marketing service to startups businesses to looking for a partner digital
                                        media.</p>
                                </div>
                            </li>
                            <li class="content-feature-item">
                                <i class="sb sb-chart color-green"></i>
                                <div class="content-details">
                                    <h3>Marketing Automation</h3>
                                    <p>We provide marketing service to startups businesses to looking for a partner digital
                                        media.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 sm-padding wow fadeInRight" data-wow-delay="300ms">
                    <img src="{{ asset('admin_assets/img/content-1.png') }}" alt="content-img">
                </div>
            </div>
        </div>
    </section><!--/.content-section-->

    <section class="tophic-team padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <span>Team Members</span>
                <h2>Our Expert Team Would Like <br> To Hear From You!</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 sm-padding">
                    <div class="team-wrap">
                        <div class="team-box">
                            <div class="overlay"></div>
                            <img src="{{ asset('admin_assets/img/team-1.html') }}" alt="img">
                            <ul class="team-social">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-youtube"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3>Fiorella Ibáñez<span>Developer</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 sm-padding">
                    <div class="team-wrap">
                        <div class="team-box">
                            <div class="overlay"></div>
                            <img src="{{ asset('admin_assets/img/team-2.html') }}" alt="img">
                            <ul class="team-social">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-youtube"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3>José Carpio<span>Developer</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 sm-padding">
                    <div class="team-wrap">
                        <div class="team-box">
                            <div class="overlay"></div>
                            <img src="{{ asset('admin_assets/img/team-3.html') }}" alt="img">
                            <ul class="team-social">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-youtube"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3>Jhon Castellon<span>Developer</span></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 sm-padding">
                    <div class="team-wrap">
                        <div class="team-box">
                            <div class="overlay"></div>
                            <img src="{{ asset('admin_assets/img/team-4.html') }}" alt="img">
                            <ul class="team-social">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-youtube"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h3>Kyle Frederick<span>Developer</span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/.tophic-team-->

    <section class="cta-section cta-3">
        <div class="animate-elements">
            <div class="animate-element circle"></div>
            <div class="animate-element triangle"></div>
            <div class="animate-element circle"></div>
            <div class="animate-element circle-fill"></div>
            <div class="animate-element triangle"></div>
            <div class="animate-element triangle"></div>
        </div>
        <div class="container">
            <div class="cta-content section-heading text-center">
                <span>Get Help With The Advanced Support!</span>
                <h2>We're Here To Help You! <br>Can't Find What You're Looking For?</h2>
                <p>We provide marketing services to startups and small businesses to <br>looking for a partner of their
                    digital media.</p>
                <a href="#" class="default-btn btn-pink">Request A Quote</a>
            </div>
        </div>
    </section><!--/.cta-section-->

    <div class="sponsor-section padding-60">
        <div class="container">
            <div id="sponsor-carousel" class="sponsor-carousel owl-carousel">
                <div class="sponsor-item">
                    <img src="{{ asset('admin_assets/img/sponsor-1.png') }}" alt="sponsor">
                </div>
                <div class="sponsor-item">
                    <img src="{{ asset('admin_assets/img/sponsor-2.png') }}" alt="sponsor">
                </div>
                <div class="sponsor-item">
                    <img src="{{ asset('admin_assets/img/sponsor-3.png') }}" alt="sponsor">
                </div>
                <div class="sponsor-item">
                    <img src="{{ asset('admin_assets/img/sponsor-4.png') }}" alt="sponsor">
                </div>
                <div class="sponsor-item">
                    <img src="{{ asset('admin_assets/img/sponsor-5.png') }}" alt="sponsor">
                </div>
                <div class="sponsor-item">
                    <img src="{{ asset('admin_assets/img/sponsor-6.png') }}" alt="sponsor">
                </div>
                <div class="sponsor-item">
                    <img src="{{ asset('admin_assets/img/sponsor-3.png') }}" alt="sponsor">
                </div>
            </div>
        </div>
    </div><!--/. sponsor-section -->
@endsection
