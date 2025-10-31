<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plans | Inventory Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6f9;
      margin: 0;
      overflow-x: hidden;
    }

    /* Sidebar */
    .sidebar {
      width: 240px;
      background: linear-gradient(180deg, #fd7e14, #b34700);
      color: #fff;
      position: fixed;
      height: 100vh;
      padding-top: 20px;
    }

    .sidebar h4 {
      text-align: center;
      margin-bottom: 40px;
      font-weight: 600;
    }

    .sidebar a {
      color: #fff;
      display: block;
      padding: 12px 25px;
      text-decoration: none;
      font-size: 15px;
      border-left: 4px solid transparent;
      transition: 0.3s;
    }

    .sidebar a:hover, .sidebar a.active {
      background-color: rgba(255, 255, 255, 0.15);
      border-left: 4px solid #fff3cd;
    }

    /* Main Content */
    .main-content {
      margin-left: 240px;
      padding: 25px;
    }

    .topbar {
      background-color: #fff;
      padding: 15px 25px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 25px;
    }

    .topbar h5 {
      margin: 0;
      font-weight: 600;
      color: #333;
    }

    /* Plans Section */
    .plans-section {
      background: #fff;
      border-radius: 10px;
      padding: 40px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.1);
    }

    .plans-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .plans-header h3 {
      font-weight: 600;
      color: #fd7e14;
    }

    .plan-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      padding: 30px;
      text-align: center;
      transition: all 0.3s ease;
    }

    .plan-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }

    .plan-card h5 {
      font-weight: 600;
      color: #333;
    }

    .plan-card .price {
      font-size: 32px;
      color: #fd7e14;
      font-weight: 700;
      margin: 10px 0;
    }

    .plan-card ul {
      list-style: none;
      padding: 0;
      text-align: left;
      margin: 20px 0;
    }

    .plan-card ul li {
      margin: 8px 0;
      font-size: 15px;
    }

    .plan-card ul li i {
      color: #fd7e14;
      margin-right: 8px;
    }

    .btn-plan {
      background: #fd7e14;
      color: #fff;
      border: none;
      padding: 10px 25px;
      border-radius: 5px;
      transition: 0.3s;
    }

    .btn-plan:hover {
      background: #b34700;
    }

    @media (max-width: 992px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .main-content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h4><i class="fa-solid fa-boxes-stacked me-2"></i>Inventory Admin</h4>
    <a href="{{ route('dashboard') }}"><i class="fa-solid fa-chart-line me-2"></i> Dashboard</a>
    <a href="{{ route('about') }}"><i class="fa-solid fa-circle-info me-2"></i> About</a>
    <a href="{{ route('plan') }}" class="active"><i class="fa-solid fa-layer-group me-2"></i> Plans</a>
    {{-- <a href="#"><i class="fa-solid fa-tags me-2"></i> Categories</a>
    <a href="#"><i class="fa-solid fa-file-invoice-dollar me-2"></i> Reports</a>
    <a href="#"><i class="fa-solid fa-truck me-2"></i> Suppliers</a> --}}

    @guest
      <a href="{{ route('login') }}" class="logout-btn">
        <i class="fa-solid fa-right-to-bracket me-2"></i> Login
      </a>
    @endguest

    {{-- @auth
      <form action="{{ route('dashboard') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">
          <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
        </button>
      </form>
    @endauth --}}
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="topbar">
      <h5>Subscription Plans</h5>
      <div>
        <i class="fa-solid fa-bell me-3 text-secondary"></i>
        <i class="fa-solid fa-user-circle fa-lg" style="color:#fd7e14;"></i>
      </div>
    </div>

    <!-- Plans Section -->
    <div class="plans-section">
      <div class="plans-header">
        <h3>Choose the Right Plan for Your Business</h3>
        <p class="text-muted">Upgrade anytime to access more features 🚀</p>
      </div>

      <div class="row g-4 justify-content-center">
        <!-- Basic Plan -->
        <div class="col-md-4">
          <div class="plan-card">
            <h5>Basic</h5>
            <p class="price">$9<span class="fs-6 text-muted">/mo</span></p>
            <ul>
              <li><i class="fa-solid fa-check"></i> 100 Products</li>
              <li><i class="fa-solid fa-check"></i> 1 Admin Account</li>
              <li><i class="fa-solid fa-check"></i> Basic Reports</li>
              <li><i class="fa-solid fa-xmark text-danger"></i> No Supplier Access</li>
            </ul>
            <button class="btn-plan">Select Plan</button>
          </div>
        </div>

        <!-- Standard Plan -->
        <div class="col-md-4">
          <div class="plan-card border border-warning">
            <h5>Standard</h5>
            <p class="price">$19<span class="fs-6 text-muted">/mo</span></p>
            <ul>
              <li><i class="fa-solid fa-check"></i> 500 Products</li>
              <li><i class="fa-solid fa-check"></i> 3 Admin Accounts</li>
              <li><i class="fa-solid fa-check"></i> Advanced Reports</li>
              <li><i class="fa-solid fa-check"></i> Supplier Access</li>
            </ul>
            <button class="btn-plan">Select Plan</button>
          </div>
        </div>

        <!-- Premium Plan -->
        <div class="col-md-4">
          <div class="plan-card">
            <h5>Premium</h5>
            <p class="price">$39<span class="fs-6 text-muted">/mo</span></p>
            <ul>
              <li><i class="fa-solid fa-check"></i> Unlimited Products</li>
              <li><i class="fa-solid fa-check"></i> Unlimited Admins</li>
              <li><i class="fa-solid fa-check"></i> Full Analytics Dashboard</li>
              <li><i class="fa-solid fa-check"></i> 24/7 Support</li>
            </ul>
            <button class="btn-plan">Select Plan</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
