<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dreams POS - Smart POS & Inventory System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f8fafc;
        }
        .navbar {
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .hero {
            background: linear-gradient(120deg, #2563eb, #1e40af);
            color: white;
            padding: 120px 0;
            text-align: center;
        }
        .hero h1 {
            font-weight: 700;
            font-size: 3rem;
        }
        .hero p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        .feature-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-4px);
        }
        .feature-icon {
            font-size: 2rem;
            color: #2563eb;
        }
        .footer {
            background: #1f2937;
            color: #cbd5e1;
            text-align: center;
            padding: 20px 0;
        }
        .btn-primary {
            background-color: #2563eb;
            border: none;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="/">Dreams POS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item ms-2">
                        <a class="btn btn-primary" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1>Manage Your Business Smarter</h1>
        <p class="mt-3">Dreams POS helps you track sales, manage inventory, and boost efficiency — all in one system.</p>
        @guest
            <a href="{{ route('register') }}" class="btn btn-light btn-lg mt-4">Get Started Free</a>
        @else
            <a href="{{ route('dashboard') }}" class="btn btn-light btn-lg mt-4">Go to Dashboard</a>
        @endguest
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-5">Everything You Need to Run Your Store</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card p-4 bg-white">
                    <div class="feature-icon mb-3"><i class="bi bi-bar-chart-line"></i></div>
                    <h5 class="fw-semibold">Smart Sales Tracking</h5>
                    <p>Track daily transactions and generate reports instantly.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card p-4 bg-white">
                    <div class="feature-icon mb-3"><i class="bi bi-box-seam"></i></div>
                    <h5 class="fw-semibold">Inventory Control</h5>
                    <p>Get automatic stock updates and low-stock alerts.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card p-4 bg-white">
                    <div class="feature-icon mb-3"><i class="bi bi-person-lines-fill"></i></div>
                    <h5 class="fw-semibold">Multi-User Access</h5>
                    <p>Manage admins, cashiers, and staff securely with roles.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light text-center">
    <div class="container">
        <h3 class="fw-bold mb-3">Start your free trial today!</h3>
        <p class="text-muted mb-4">No credit card required. Create your POS store in minutes.</p>
        @guest
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Create Your Store</a>
        @else
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">Go to Dashboard</a>
        @endguest
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <p>© {{ date('Y') }} Dreams POS — Smart Inventory & POS System</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
