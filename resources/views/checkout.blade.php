@extends('admin.layout.main')

@section('content')
    <section class="page-header padding">
        <div class="container text-center">
            <h2>Checkout</h2>
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
                            <img src="{{ asset('admin_assets/img/pricing-head-1.jpg') }}" alt="Plan"
                                class="img-fluid rounded mb-3" style="max-width:200px;">
                            <h5 class="fw-bold">Starter Plan</h5>
                            <p class="text-muted mb-1">Monthly Plan</p>
                            <h3 class="text-success mb-0">$29.00</h3>

                            <ul class="list-unstyled mt-3">
                                <li>✅ 1024 MB Memory</li>
                                <li>✅ 10 Websites</li>
                                <li>✅ Unlimited Bandwidth</li>
                                <li>✅ 24/7 Support</li>
                            </ul>
                        </div>

                        {{-- Checkout Form --}}
                        <h4 class="mb-3 text-center text-primary">Billing Details</h4>
                        <form action="#" method="POST">
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
                                <label for="domain" class="form-label">Store / Domain Name</label>
                                <input type="text" id="domain" name="domain" class="form-control"
                                    placeholder="mystore" required>
                            </div>
{{-- 
                            <div class="payment-method-container">
                                <label for="payment" class="form-label">Payment Method</label>
                                <select id="payment" class="form-select">
                                    <option selected disabled>Select Method</option>
                                    <option>Credit / Debit Card</option>
                                    <option>PayPal</option>
                                    <option>Bank Transfer</option>
                                </select>
                            </div> --}}




                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill">
                                    Complete Purchase
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


<style>
    .form-label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
        color: #333;
    }

    .form-select {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        background-color: #fff;
        font-size: 15px;
        color: #333;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 4px rgba(0, 123, 255, 0.3);
    }

    .payment-method-container {
        max-width: 350px;
        margin-bottom: 16px;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
    }

    .form-select {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fff;
        font-size: 15px;
        color: #333;
        outline: none;
        transition: all 0.25s ease;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.05);
    }

    .form-select:hover {
        border-color: #007bff;
    }

    .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
    }
</style>
