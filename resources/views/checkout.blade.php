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

                            <div class="mb-3 ">
                                <label for="payment" class="form-label hello">Payment Method</label>
                                <select id="payment" name="payment_method" class="form-control hello" required>
                                    <option value="" selected disabled>Select Payment Method</option>
                                    <option value="stripe">Stripe</option>
                                    <option value="bank">Bank Transfer</option>
                                </select>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary px-4 py-2">Complete Purchase</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


<style>
 
    



    .hello{
        width: 100%;
       
        
    }

  

    

</style>
