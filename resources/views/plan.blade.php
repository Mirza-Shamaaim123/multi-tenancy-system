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
		            <h4>Explore The Plans</h4>
                    <h2>No Hidden Charges! Choose <br> Your Pricing Plan.</h2>
		            <p>Multipurpose Saas Startup HTML Template.</p>
		        </div>
		    </div>
		</section><!--/. page-header -->
        
        <section class="pricing-section padding bd-bottom">
            <div class="container">
                <div class="cd-pricing-switcher-container">
                    <div class="cd-pricing-switcher text-center">
                        <p class="fieldset">
                            <input type="radio" name="duration-1" value="monthly" id="monthly-1" checked>
                            <label for="monthly-1">Monthly</label>
                            <input type="radio" name="duration-1" value="yearly" id="yearly-1">
                            <label for="yearly-1">Yearly</label>
                            <span class="cd-switch"></span>
                        </p>
                    </div>
                </div> <!-- .cd-pricing-switcher -->
                <div class="row">
                    <div class="col-lg-12 xs-padding">
                        <div class="pricing-wrap cd-pricing-container">
                            <ul class="cd-pricing-list cd-bounce-invert row">
                                <li class="cd-popular col-lg-4">
                                    <ul class="cd-pricing-wrapper">
                                        <li data-type="monthly" class="is-visible pricing-box">
                                            <div class="pricing-head">
                                                <img src="{{ asset('admin_assets/img/pricing-head-1.jpg') }}" alt="img">
                                                <h3>$29.00</h3>
                                                <span>Starter</span>
                                            </div>
                                            <ul class="pricing-list">
                                                <li>1024 MB Memory</li>
                                                <li>10 Websites</li>
                                                <li>Unlimited Bandwidth</li>
                                                <li>24/7 Support</li>
                                            </ul>
                                            <div class="pricing-footer">
                                                <a href="#" class="default-btn btn-blue">Get Started</a>
                                            </div>
                                        </li>
                                        <li data-type="yearly" class="is-hidden pricing-box">
                                            <div class="pricing-head">
                                                <img src="{{ asset('admin_assets/img/pricing-head-1.jpg') }}" alt="img">
                                                <h3>$49.00</h3>
                                                <span>Starter</span>
                                            </div>
                                            <ul class="pricing-list">
                                                <li>1024 MB Memory</li>
                                                <li>10 Websites</li>
                                                <li>Unlimited Bandwidth</li>
                                                <li>24/7 Support</li>
                                            </ul>
                                            <div class="pricing-footer">
                                                <a href="#" class="default-btn btn-blue">Get Started</a>
                                            </div>
                                        </li>
                                    </ul> <!-- .cd-pricing-wrapper -->
                                </li>
                                <li class="col-lg-4">
                                    <ul class="cd-pricing-wrapper">
                                        <li data-type="monthly" class="is-visible pricing-box">
                                           <div class="price-tag"><span>Recommended</span></div>
                                            <div class="pricing-head">
                                                <img src="{{ asset('admin_assets/img/pricing-head-2.jpg') }}" alt="img">
                                                <h3>$49.00</h3>
                                                <span>Premium</span>
                                            </div>
                                            <ul class="pricing-list">
                                                <li>1024 MB Memory</li>
                                                <li>10 Websites</li>
                                                <li>Unlimited Bandwidth</li>
                                                <li>24/7 Support</li>
                                            </ul>
                                            <div class="pricing-footer">
                                                <a href="#" class="default-btn btn-blue">Get Started</a>
                                            </div>
                                        </li>
                                        <li data-type="yearly" class="is-hidden pricing-box">
                                            <div class="pricing-head">
                                                <img src="{{ asset('admin_assets/img/pricing-head-2.jpg') }}" alt="img">
                                                <h3>$69.00</h3>
                                                <span>Premium</span>
                                            </div>
                                            <ul class="pricing-list">
                                                <li>1024 MB Memory</li>
                                                <li>10 Websites</li>
                                                <li>Unlimited Bandwidth</li>
                                                <li>24/7 Support</li>
                                            </ul>
                                            <div class="pricing-footer">
                                                <a href="#" class="default-btn btn-blue">Get Started</a>
                                            </div>
                                        </li>
                                    </ul> <!-- .cd-pricing-wrapper -->
                                </li>
                                <li class="col-lg-4">
                                    <ul class="cd-pricing-wrapper">
                                        <li data-type="monthly" class="is-visible pricing-box">
                                            <div class="pricing-head">
                                                <img src="{{ asset('admin_assets/img/pricing-head-3.jpg') }}" alt="img">
                                                <h3>$89.00</h3>
                                                <span>Business</span>
                                            </div>
                                            <ul class="pricing-list">
                                                <li>1024 MB Memory</li>
                                                <li>10 Websites</li>
                                                <li>Unlimited Bandwidth</li>
                                                <li>24/7 Support</li>
                                            </ul>
                                            <div class="pricing-footer">
                                                <a href="#" class="default-btn btn-blue">Get Started</a>
                                            </div>
                                        </li>
                                        <li data-type="yearly" class="is-hidden pricing-box">
                                            <div class="pricing-head">
                                                <img src="{{ asset('admin_assets/img/pricing-head-3.jpg') }}" alt="img">
                                                <h3>$99.00</h3>
                                                <span>Business</span>
                                            </div>
                                            <ul class="pricing-list">
                                                <li>1024 MB Memory</li>
                                                <li>10 Websites</li>
                                                <li>Unlimited Bandwidth</li>
                                                <li>24/7 Support</li>
                                            </ul>
                                            <div class="pricing-footer">
                                                <a href="#" class="default-btn btn-blue">Get Started</a>
                                            </div>
                                        </li>
                                    </ul> <!-- .cd-pricing-wrapper -->
                                </li>
                            </ul> <!-- .cd-pricing-list -->
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/. pricing-section -->
        
        <div class="sponsor-section bg-grey padding-60">
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
