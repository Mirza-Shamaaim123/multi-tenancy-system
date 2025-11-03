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
                            @foreach ($plans as $planName => $group)
                                <li class="col-lg-4">
                                    <ul class="cd-pricing-wrapper">

                                        {{-- Monthly --}}
                                        @php $monthly = $group->firstWhere('duration', 'Monthly'); @endphp
                                        @if ($monthly)
                                            <li data-type="monthly" class="is-visible pricing-box">
                                                <div class="pricing-head">
                                                    <img src="{{ asset('admin_assets/img/pricing-head-' . $loop->iteration . '.jpg') }}"
                                                        alt="img">
                                                    <h3>${{ number_format($monthly->price, 2) }}</h3>
                                                    <span>{{ $monthly->plan }}</span>
                                                </div>
                                                <ul class="pricing-list">
                                                    @foreach (explode(',', $monthly->description) as $feature)
                                                        <li>{{ trim($feature) }}</li>
                                                    @endforeach
                                                </ul>
                                                <div class="pricing-footer">
                                                    <a href="#" class="default-btn btn-blue">Get Started</a>
                                                </div>
                                            </li>
                                        @endif

                                        {{-- Yearly --}}
                                        @php $yearly = $group->firstWhere('duration', 'Yearly'); @endphp
                                        @if ($yearly)
                                            <li data-type="yearly" class="is-hidden pricing-box">
                                                <div class="pricing-head">
                                                    <img src="{{ asset('admin_assets/img/pricing-head-' . $loop->iteration . '.jpg') }}"
                                                        alt="img">
                                                    <h3>${{ number_format($yearly->price, 2) }}</h3>
                                                    <span>{{ $yearly->plan }}</span>
                                                </div>
                                                <ul class="pricing-list">
                                                    @foreach (explode(',', $yearly->description) as $feature)
                                                        <li>{{ trim($feature) }}</li>
                                                    @endforeach
                                                </ul>
                                                <div class="pricing-footer">
                                                    <a href="#" class="default-btn btn-blue">Get Started</a>
                                                </div>
                                            </li>
                                        @endif

                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                        <!-- .cd-pricing-list -->
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
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('input[name="duration-1"]');

            // Default: show only monthly plans
            const defaultSelected = document.querySelector('input[name="duration-1"]:checked').value;
            togglePlans(defaultSelected);

            // Change event for toggle
            radios.forEach(radio => {
                radio.addEventListener('change', function() {
                    togglePlans(this.value);
                });
            });

            function togglePlans(selected) {
                document.querySelectorAll('.pricing-box').forEach(box => {
                    if (box.dataset.type === selected) {
                        box.classList.remove('is-hidden');
                        box.classList.add('is-visible');
                    } else {
                        box.classList.remove('is-visible');
                        box.classList.add('is-hidden');
                    }
                });
            }
        });
    </script>
@endsection
