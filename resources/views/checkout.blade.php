@extends('admin.layout.main')

@section('content')
    <section class="page-header padding">
        <div class="container text-center text-white">
            <h2 class="fw-bold text-white">Checkout</h2>
            <p>Complete your purchase and get started instantly!</p>
        </div>
    </section>

    <section class="checkout-section padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg rounded-3 p-4">

                        {{-- Selected Plan --}}
                        <h4 class="text-center text-primary mb-3">Selected Plan</h4>
                        <div class="border rounded p-3 mb-4 bg-light text-center">
                            {{-- Static Image --}}
                            <img src="{{ asset('admin_assets/img/pricing-head-1.jpg') }}" alt="Plan"
                                class="img-fluid rounded mb-3" style="max-width:200px;">

                            {{-- Dynamic Data --}}
                            <h5 class="fw-bold">{{ $plan->plan ?? 'Starter Plan' }}</h5>
                            <p class="text-muted mb-1">{{ $plan->duration ?? 'Monthly' }} Plan</p>
                            <h3 class="text-success mb-0">${{ number_format($plan->price ?? 0, 2) }}</h3>

                            <ul class="list-unstyled mt-3">
                                @foreach (explode(',', $plan->description ?? '') as $feature)
                                    <li>✅ {{ trim($feature) }}</li>
                                @endforeach
                            </ul>
                        </div>



                        {{-- Checkout Form --}}
                        <h4 class="mb-3 text-center text-primary">Billing Details</h4>
                        <form action="{{ route('checkout.store') }}" method="POST" class="p-3 border rounded bg-light">
                            @csrf

                            <input type="hidden" name="plan_name" value="{{ $plan->plan }}">
                            <input type="hidden" name="plan_type" value="{{ $plan->duration }}">
                            <input type="hidden" name="amount" value="{{ $plan->price }}">

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="John Doe" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="example@email.com" required>
                            </div>

                              <div class="mb-3">
                                <label for="store_name" class="form-label">Store Name</label>
                                <input type="text" id="store_name" name="store_name" class="form-control"
                                    placeholder="mystore" required>
                            </div>

                            <div class="mb-3">
                                <label for="domain" class="form-label">Domain Name</label>
                                <input type="text" id="domain" name="domain" class="form-control"
                                    placeholder="mystore" required>
                            </div>

                            <div class="mb-3">
                                <label for="payment" class="form-label">Payment Method</label>
                                <select id="payment" name="payment_method" class="form-control" required>
                                    <option value="" selected disabled>Select Payment Method</option>
                                    <option value="stripe">Stripe</option>
                                    <option value="bank">Bank Transfer</option>
                                </select>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary px-4 py-2">Pay Now</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');
        const form = document.querySelector("form");
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const {
                token,
                error
            } = await stripe.createToken(card);
            if (error) {
                alert(error.message);
            } else {
                const hiddenInput = document.createElement("input");
                hiddenInput.setAttribute("type", "hidden");
                hiddenInput.setAttribute("name", "stripeToken");
                hiddenInput.setAttribute("value", token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    </script>

    <style>
        .form-control {
            width: 100%;
        }

        .btn {
            margin: 20px;
        }
    </style>
@endsection
