@extends('frontend.layout.main')

@section('content')
<div class="page-wrapper">
    <div class="content">

        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="fw-bold mb-0">Manager Dashboard</h4>
            <p class="text-muted mb-0">Welcome back, {{ Auth::user()->name ?? 'Manager' }}</p>
        </div>

        <!-- Summary Cards -->
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-center p-3 shadow-sm">
                    <h6 class="text-muted mb-1">Total Products</h6>
                    <h3>128</h3>
                    <a href="#" class="small text-primary">Manage Products</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3 shadow-sm">
                    <h6 class="text-muted mb-1">Total Sales</h6>
                    <h3>₨ 245,000</h3>
                    <a href="#" class="small text-primary">View Sales</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3 shadow-sm">
                    <h6 class="text-muted mb-1">Total Purchases</h6>
                    <h3>₨ 180,000</h3>
                    <a href="#" class="small text-primary">View Purchases</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3 shadow-sm">
                    <h6 class="text-muted mb-1">Reports Generated</h6>
                    <h3>12</h3>
                    <a href="#" class="small text-primary">View Reports</a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card mt-4 shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-3">
                    <a href="#" class="btn btn-primary"><i class="ti ti-plus me-1"></i>Create Sale</a>
                    <a href="#" class="btn btn-success"><i class="ti ti-plus me-1"></i>Create Purchase</a>
                    <a href="#" class="btn btn-secondary"><i class="ti ti-package me-1"></i>Manage Products</a>
                    <a href="#" class="btn btn-info text-white"><i class="ti ti-report me-1"></i>View Reports</a>
                </div>
            </div>
        </div>

        <!-- Recent Sales Table -->
        <div class="card mt-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Sales</h5>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Invoice ID</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#INV-1001</td>
                                <td>Ali Khan</td>
                                <td>15 Oct 2025</td>
                                <td>₨ 5,000</td>
                                <td><span class="badge bg-success">Paid</span></td>
                            </tr>
                            <tr>
                                <td>#INV-1002</td>
                                <td>Fatima Noor</td>
                                <td>14 Oct 2025</td>
                                <td>₨ 3,200</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Purchases Table -->
        <div class="card mt-4 shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Purchases</h5>
                <a href="#" class="btn btn-sm btn-outline-success">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Purchase ID</th>
                                <th>Supplier</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#PUR-2001</td>
                                <td>ABC Traders</td>
                                <td>14 Oct 2025</td>
                                <td>₨ 12,500</td>
                                <td><span class="badge bg-success">Paid</span></td>
                            </tr>
                            <tr>
                                <td>#PUR-2002</td>
                                <td>XYZ Supplies</td>
                                <td>12 Oct 2025</td>
                                <td>₨ 9,400</td>
                                <td><span class="badge bg-danger">Unpaid</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Reports Summary -->
        <div class="card mt-4 shadow-sm mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Reports Overview</h5>
                <a href="#" class="btn btn-sm btn-outline-info">View Detailed Reports</a>
            </div>
            <div class="card-body">
                <p class="text-muted mb-2">Monthly Summary:</p>
                <ul class="mb-0">
                    <li>Sales Growth: <strong>+15%</strong></li>
                    <li>Purchases Growth: <strong>+8%</strong></li>
                    <li>Profit Margin: <strong>₨ 65,000</strong></li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection
