<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Inventory System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .bg-orange {
            background-color: #ff7a00;
        }
        .text-orange {
            color: #ff7a00;
        }
        .btn-orange {
            background-color: #ff7a00;
            color: #fff;
        }
        .btn-orange:hover {
            background-color: #e56e00;
            color: #fff;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="py-3 bg-orange text-white position-relative">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <h3 class="fw-bold mb-0">POS Inventory System</h3>
                <small>Smart way to manage sales, products & reports</small>
            </div>

            <div>
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm fw-semibold">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light btn-sm fw-semibold me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm fw-semibold">Register</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section class="py-5 text-center">
        <div class="container">
            <h2 class="text-orange mb-3">Welcome to Our System</h2>
            <p class="text-muted w-75 mx-auto">
                This POS and Inventory Management System helps you handle your shop efficiently —
                from billing to inventory control, supplier management, and sales reports — all in one platform.
            </p>
        </div>
    </section>

    <!-- Features -->
    <section class="py-4 bg-light">
        <div class="container">
            <h3 class="text-center text-orange mb-4">Main Features</h3>
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4">
                    <div class="p-3 shadow-sm bg-white rounded">
                        <h6 class="fw-semibold mb-2">POS Billing</h6>
                        <p class="text-muted small mb-0">Fast & easy checkout process</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="p-3 shadow-sm bg-white rounded">
                        <h6 class="fw-semibold mb-2">Inventory Control</h6>
                        <p class="text-muted small mb-0">Track stock & low alerts</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="p-3 shadow-sm bg-white rounded">
                        <h6 class="fw-semibold mb-2">Supplier Management</h6>
                        <p class="text-muted small mb-0">Handle supplier records</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="p-3 shadow-sm bg-white rounded">
                        <h6 class="fw-semibold mb-2">Sales Reports</h6>
                        <p class="text-muted small mb-0">Get daily & monthly reports</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="text-center py-5">
        <div class="container">
            <h4 class="mb-3">Ready to Get Started?</h4>
            <a href="/register" class="btn btn-orange px-4 py-2">Create Your Store</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-orange text-white text-center py-3">
        <p class="mb-0 small">© {{ date('Y') }} POS Inventory System. All Rights Reserved.</p>
    </footer>

</body>
</html>
