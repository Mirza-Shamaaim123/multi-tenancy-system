@extends('frontend.layout.main')

@section('content')
<div class="page-wrapper">
    <div class="content">

        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="fw-bold mb-0">Salesman Dashboard</h4>
            <p class="text-muted mb-0">Welcome back, {{ Auth::user()->name ?? 'Salesman' }}</p>
        </div>

        <!-- Summary Cards -->
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-center p-3 shadow-sm">
                    <h6 class="text-muted mb-1">Total Sales</h6>
                    <h3>₨ 152,000</h3>
                    <a href="#" class="small text-primary">View Sales</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3 shadow-sm">
                    <h6 class="text-muted mb-1">Total Customers</h6>
                    <h3>82</h3>
                    <a href="#" class="small text-primary">View Customers</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3 shadow-sm">
                    <h6 class="text-muted mb-1">Total Invoices</h6>
                    <h3>67</h3>
                    <a href="#" class="small text-primary">View Invoices</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3 shadow-sm">
                    <h6 class="text-muted mb-1">Pending Payments</h6>
                    <h3>₨ 14,500</h3>
                    <a href="#" class="small text-primary">View Pending</a>
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
                    <a href="#" class="btn btn-primary"><i class="ti ti-shopping-cart me-1"></i>Create New Sale (POS)</a>
                    <a href="#" class="btn btn-success"><i class="ti ti-users me-1"></i>View Customers</a>
                    <a href="#" class="btn btn-info text-white"><i class="ti ti-file-invoice me-1"></i>View Invoices</a>
                    <a href="#" class="btn btn-secondary"><i class="ti ti-receipt me-1"></i>Generate Invoice</a>
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
                                <td>#INV-3001</td>
                                <td>Ahmed Raza</td>
                                <td>15 Oct 2025</td>
                                <td>₨ 4,500</td>
                                <td><span class="badge bg-success">Paid</span></td>
                            </tr>
                            <tr>
                                <td>#INV-3002</td>
                                <td>Sana Malik</td>
                                <td>14 Oct 2025</td>
                                <td>₨ 2,800</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Top Customers -->
        <div class="card mt-4 shadow-sm mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Top Customers</h5>
                <a href="#" class="btn btn-sm btn-outline-success">View All</a>
            </div>
            <div class="card-body">
                <ul class="mb-0">
                    <li>Ali Khan — <strong>₨ 45,000</strong> total purchases</li>
                    <li>Fatima Noor — <strong>₨ 31,200</strong> total purchases</li>
                    <li>Bilal Ahmed — <strong>₨ 28,700</strong> total purchases</li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection
