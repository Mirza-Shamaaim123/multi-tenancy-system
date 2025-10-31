<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About | Inventory Admin Dashboard</title>
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

    .logout-btn {
      position: absolute;
      bottom: 30px;
      left: 25px;
      background: #dc3545;
      border: none;
      color: #fff;
      padding: 10px 25px;
      border-radius: 5px;
      transition: 0.3s;
    }

    .logout-btn:hover {
      background: #bb2d3b;
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

    /* About Section */
    .about-section {
      background: #fff;
      border-radius: 10px;
      padding: 40px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.1);
    }

    .about-section h3 {
      font-weight: 600;
      margin-bottom: 20px;
      color: #fd7e14;
    }

    .feature {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .feature i {
      font-size: 20px;
      color: #fd7e14;
      margin-right: 10px;
    }

    .team-section {
      margin-top: 40px;
    }

    .team-member {
      text-align: center;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      transition: 0.3s;
    }

    .team-member:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 16px rgba(0,0,0,0.15);
    }

    .team-member img {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 10px;
    }

    .text-orange {
      color: #fd7e14 !important;
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
    <a href="{{ route('home') }}"><i class="fa-solid fa-chart-line me-2"></i> Home</a>
    <a href="{{ route('about') }}" class="active"><i class="fa-solid fa-circle-info me-2"></i> About</a>
    <a href="#"><i class="fa-solid fa-tags me-2"></i> Categories</a>
    <a href="#"><i class="fa-solid fa-file-invoice-dollar me-2"></i> Reports</a>
    <a href="#"><i class="fa-solid fa-truck me-2"></i> Suppliers</a>
    <button class="logout-btn"><i class="fa-solid fa-right-from-bracket me-2"></i> Logout</button>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="topbar">
      <h5>About This System</h5>
      <div>
        <i class="fa-solid fa-bell me-3 text-secondary"></i>
        <i class="fa-solid fa-user-circle fa-lg text-orange"></i>
      </div>
    </div>

    <!-- About Section -->
    <div class="about-section">
      <h3>📦 Inventory Management System</h3>
      <p>
        The Inventory Management System is built to help businesses efficiently handle products, suppliers, and sales using an intuitive admin interface. 
        It ensures better stock control, faster decision-making, and a smoother workflow.
      </p>

      <h5 class="mt-4 mb-3 text-orange">✨ Key Features</h5>
      <div class="feature"><i class="fa-solid fa-check-circle"></i> Real-time stock tracking</div>
      <div class="feature"><i class="fa-solid fa-check-circle"></i> Detailed sales & supplier reports</div>
      <div class="feature"><i class="fa-solid fa-check-circle"></i> Low-stock alert notifications</div>
      <div class="feature"><i class="fa-solid fa-check-circle"></i> Secure admin & role-based login</div>
      <div class="feature"><i class="fa-solid fa-check-circle"></i> Clean, responsive dashboard UI</div>

      <!-- Team Section -->
      <div class="team-section">
        <h4 class="mt-5 mb-4 text-orange">👨‍💻 Developed By</h4>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="team-member">
              <img src="https://i.pravatar.cc/150?img=3" alt="Dev 1">
              <h6>Ali Khan</h6>
              <p class="text-muted mb-0">Frontend Developer</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <img src="https://i.pravatar.cc/150?img=5" alt="Dev 2">
              <h6>Hassan Ahmed</h6>
              <p class="text-muted mb-0">Backend Developer</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <img src="https://i.pravatar.cc/150?img=7" alt="Dev 3">
              <h6>Sara Malik</h6>
              <p class="text-muted mb-0">UI/UX Designer</p>
            </div>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="mt-5">
          <h5 class="text-orange mb-3">📩 Contact Us</h5>
          <p><i class="fa-solid fa-envelope me-2 text-orange"></i> support@inventoryadmin.com</p>
          <p><i class="fa-solid fa-phone me-2 text-orange"></i> +92 300 1234567</p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
