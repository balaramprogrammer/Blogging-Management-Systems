@extends('admin.layouts.main')
@section('main')
      <!-- Content -->
        <div class="container-fluid p-4">

            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="bi bi-box fs-2 text-primary"></i>
                            <h6 class="mt-2">Products</h6>
                            <h4>150</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="bi bi-cart-check fs-2 text-success"></i>
                            <h6 class="mt-2">Orders</h6>
                            <h4>92</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="bi bi-people fs-2 text-warning"></i>
                            <h6 class="mt-2">Customers</h6>
                            <h4>540</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <i class="bi bi-currency-rupee fs-2 text-danger"></i>
                            <h6 class="mt-2">Revenue</h6>
                            <h4>₹2.4L</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Graph + Orders -->
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header fw-bold">Monthly Sales</div>
                        <div class="card-body">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header fw-bold">Recent Orders</div>
                        <div class="card-body p-0">
                            <table class="table table-sm mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><td>101</td><td><span class="badge bg-success">Paid</span></td><td>₹1200</td></tr>
                                    <tr><td>102</td><td><span class="badge bg-warning">Pending</span></td><td>₹850</td></tr>
                                    <tr><td>103</td><td><span class="badge bg-danger">Cancelled</span></td><td>₹450</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection