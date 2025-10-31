@extends('admin.layout.main')
@section('content')

    <section class="hero-section bg-grey d-flex align-items-center bd-bottom">
        <div class="hero-bg-shape"></div>
        <div class="anim-elements">
            <div class="anim-element"></div>
            <div class="anim-element"></div>
            <div class="anim-element"></div>
            <div class="anim-element"></div>
            <div class="anim-element"></div>
        </div>
          <div class="container">
            <div class="row hero-wrap d-flex align-items-center">
                <div class="col-lg-6 sm-padding">
                    <div class="hero-content">
                        <h1>Drive More Customers <br>Through Digital.</h1>
                        <p>We provide marketing services to startups and small businesses to looking for a partner of
                            their digital media, design & development, lead generation and communications requirents.
                        </p>
                        <div class="btn-group">
                            <a href="#" class="default-btn">Get Started</a>
                            <a href="#" class="play-btn"><i class="fas fa-play"></i>How It Works</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 sm-padding">
                    <img src="{{ asset('admin_assets/img/hero-1.png') }}" alt="hero">
                </div>
            </div>
        </div>
    </section><!--/.hero-section-->

    <section class="promo-section bd-bottom padding">
        <div class="container">
            <div class="row promo-wrap">
                <div class="col-lg-3 col-sm-6 sm-padding">
                    <div class="promo-item wow fadeInUp" data-wow-delay="200ms">
                        <i class="sb sb-chart"></i>
                        <i class="sb sb-chart transparent"></i>
                        <h3>Data Analytics</h3>
                        <p>We provide marketing service to startups businesses to looking for a partner digital media.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 sm-padding">
                    <div class="promo-item wow fadeInUp" data-wow-delay="300ms">
                        <i class="sb sb-stats"></i>
                        <i class="sb sb-stats transparent"></i>
                        <h3>Digital Marketing</h3>
                        <p>We provide marketing service to startups businesses to looking for a partner digital media.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 sm-padding">
                    <div class="promo-item wow fadeInUp" data-wow-delay="400ms">
                        <i class="sb sb-hours"></i>
                        <i class="sb sb-hours transparent"></i>
                        <h3>Customer Care</h3>
                        <p>We provide marketing service to startups businesses to looking for a partner digital media.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 sm-padding">
                    <div class="promo-item wow fadeInUp" data-wow-delay="500ms">
                        <i class="sb sb-target"></i>
                        <i class="sb sb-target transparent"></i>
                        <h3>Email Marketing</h3>
                        <p>We provide marketing service to startups businesses to looking for a partner digital media.
                        </p>
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
                        <p>We provide marketing services to startups and small businesses to looking for a partner of
                            their digital media, design &amp; development, lead generation and communications
                            requirents.</p>
                        <ul class="content-feature">
                            <li class="content-feature-item">
                                <i class="sb sb-stats color-red"></i>
                                <div class="content-details">
                                    <h3>Digital Data Analysis</h3>
                                    <p>We provide marketing service to startups businesses to looking for a partner
                                        digital media.</p>
                                </div>
                            </li>
                            <li class="content-feature-item">
                                <i class="sb sb-chart color-green"></i>
                                <div class="content-details">
                                    <h3>Marketing Automation</h3>
                                    <p>We provide marketing service to startups businesses to looking for a partner
                                        digital media.</p>
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

    <section class="content-section bd-bottom padding pos-rel">
        <div class="anim-elements">
            <div class="anim-element"></div>
            <div class="anim-element"></div>
            <div class="anim-element"></div>
            <div class="anim-element"></div>
            <div class="anim-element"></div>
        </div>
        <div class="container">
            <div class="row content-wrap">
                <div class="col-lg-6 sm-padding wow fadeInLeft" data-wow-delay="300ms">
                    <img src="{{ asset('admin_assets/img/content-2.png') }}" alt="content-img">
                </div>
                <div class="col-lg-6 sm-padding">
                    <div class="content-info wow fadeInRight" data-wow-delay="300ms">
                        <span>Features</span>
                        <h2>Track Productivity &amp; Keep Your Projects On The Budget!</h2>
                        <p>We provide marketing services to startups and small businesses to looking for a partner of
                            their digital media, design &amp; development, lead generation and communications
                            requirents.</p>
                        <ul class="content-feature">
                            <li class="content-feature-item">
                                <i class="sb sb-network color-yellow"></i>
                                <div class="content-details">
                                    <h3>Reporting & Analysis</h3>
                                    <p>We provide marketing service to startups businesses to looking for a partner
                                        digital media.</p>
                                </div>
                            </li>
                            <li class="content-feature-item">
                                <i class="sb sb-target color-blue"></i>
                                <div class="content-details">
                                    <h3>Technical SEO Audit</h3>
                                    <p>We provide marketing service to startups businesses to looking for a partner
                                        digital media.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/.content-section-->

    <section class="web-search-section bg-dark padding">
        <div class="left-design"></div>
        <div class="right-design"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
                        <span>Ready To Grow</span>
                        <h2>Check Your Website’s SEO!</h2>
                        <p>We provide marketing services to startups and small businesses to looking for a partner of
                            their digital media, design & development, lead generation and communications requirents.
                        </p>
                    </div>
                    <div class="search-box check-domain">
                        <form class="form-inline">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Web URL">
                            </div>
                            <button type="submit" class="default-btn">Check Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="cloud"></div>
    </section><!--/.web-search-section-->

    <section class="project-section bd-bottom padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <span>Projects</span>
                <h2>Our Case Studies</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 sm-padding">
                    <div id="project-carousel" class="project-carousel owl-carousel">
                        <div class="project-item">
                            <img src="{{ asset('admin_assets/img/portfolio-1.jpg') }}" alt="img">
                            <div class="project-content">
                                <span>Marketing</span>
                                <h3><a href="#">Twice profit than before you ever got in business.</a></h3>
                                <a href="#" class="read-more"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <div class="project-item">
                            <img src="{{ asset('admin_assets/img/portfolio-2.jpg') }}" alt="img">
                            <div class="project-content">
                                <span>Marketing</span>
                                <h3><a href="#">Conduct more customer in a fast better way.</a></h3>
                                <a href="#" class="read-more"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <div class="project-item">
                            <img src="{{ asset('admin_assets/img/portfolio-3.jpg') }}" alt="img">
                            <div class="project-content">
                                <span>Marketing</span>
                                <h3><a href="#">Help customers in real-time across all your channels.</a></h3>
                                <a href="#" class="read-more"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <div class="project-item">
                            <img src="{{ asset('admin_assets/img/portfolio-4.jpg') }}" alt="img">
                            <div class="project-content">
                                <span>Marketing</span>
                                <h3><a href="#">Twice profit than before you ever got in business.</a></h3>
                                <a href="#" class="read-more"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/.project-section-->

    <section class="testimonial-section bg-grey bd-bottom padding">
        <div class="left-design"></div>
        <div class="right-design"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 xs-padding d-none d-lg-block">
                    <div class="clients-thumb">
                        <div class="ct-thumb thumb-1"></div>
                        <div class="ct-thumb thumb-2"></div>
                        <div class="ct-thumb thumb-3"></div>
                        <div class="ct-thumb thumb-4"></div>
                        <div class="ct-thumb thumb-5"></div>
                    </div>
                </div>
                <div class="col-lg-6 xs-padding">
                    <div class="section-heading">
                        <span>Testimonial</span>
                        <h2>What Our Customer <br> Says About Us!</h2>
                    </div>
                    <div id="testimonial-carousel" class="testimonial-carousel owl-carousel">
                        <div class="testi-item">
                            <p>"Thank you for guiding us through the construction process, understanding, and always
                                ready to accommodate our needs. We love our new space and know that it was built by the
                                very best!"</p>
                            <div class="testi-thumb">
                                <img src="{{ asset('admin_assets/img/testi-1.jpg') }}" alt="img">
                                <h3>Kyle Frederick<span>Designer</span></h3>
                            </div>
                        </div>
                        <div class="testi-item">
                            <p>"Thank you for guiding us through the construction process, understanding, and always
                                ready to accommodate our needs. We love our new space and know that it was built by the
                                very best!"</p>
                            <div class="testi-thumb">
                                <img src="{{ asset('admin_assets/img/testi-2.jpg') }}" alt="img">
                                <h3>José Carpio <span>Developer</span></h3>
                            </div>
                        </div>
                        <div class="testi-item">
                            <p>"Thank you for guiding us through the construction process, understanding, and always
                                ready to accommodate our needs. We love our new space and know that it was built by the
                                very best!"</p>
                            <div class="testi-thumb">
                                <img src="{{ asset('admin_assets/img/testi-3.jpg') }}" alt="img">
                                <h3>Melania Rose <span>Marketer</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/.testimonial-section-->

    <section class="cta-section bg-dark padding">
        <div class="cta-shape-1"></div>
        <div class="cta-shape-2"></div>
        <div class="cta-shape-3"></div>
        <div class="container">
            <div class="row cta-wrap">
                <div class="col-lg-8 col-md-6 sm-padding">
                    <div class="cta-content wow fadeInLeft" data-wow-delay="300ms">
                        <h2>Build your website with Saasbiz code.</h2>
                        <p>We provide marketing services to startups and small businesses to looking for a partner of
                            their digital media, design & development, lead generation and communications requirents.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 sm-padding text-right wow fadeInRight" data-wow-delay="300ms">
                    <a href="#" class="default-btn">Get Started Now</a>
                </div>
            </div>
        </div>
    </section><!--/.cta-section-->

    <div class="sponsor-section padding">
        <div class="section-heading mb-40 text-center wow fadeInUp" data-wow-delay="100ms">
            <span>Sponsors</span>
            <h2>Trusted by over 30,000 world’s <br>leading companies!</h2>
        </div>
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