@extends('layouts.admin-layout')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                </div>
            </div>

            <!-- Start Main Widgets -->
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="widget-first">

                                <div class="d-flex align-items-center mb-2">
                                    <div
                                        class="p-2 border border-primary border-opacity-10 bg-primary-subtle rounded-2 me-2">
                                        <div class="bg-primary rounded-circle widget-size text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-dark fs-15">Total Customers</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="mb-0 fs-22 text-dark me-3">3,456</h3>
                                    <div class="text-center">
                                        <span class="text-primary fs-14"><i class="mdi mdi-trending-up fs-14"></i>
                                            12.5%</span>
                                        <p class="text-dark fs-13 mb-0">Last 7 days</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="widget-first">

                                <div class="d-flex align-items-center mb-2">
                                    <div
                                        class="p-2 border border-secondary border-opacity-10 bg-secondary-subtle rounded-2 me-2">
                                        <div class="bg-secondary rounded-circle widget-size text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="m10 17l-5-5l1.41-1.42L10 14.17l7.59-7.59L19 8m-7-6A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-dark fs-15">Task Pending</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="mb-0 fs-22 text-dark me-3">2,839</h3>
                                    <div class="text-center">
                                        <span class="text-danger fs-14 me-2"><i class="mdi mdi-trending-down fs-14"></i>
                                            1.5%</span>
                                        <p class="text-dark fs-13 mb-0">Last 7 days</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="widget-first">

                                <div class="d-flex align-items-center mb-2">
                                    <div class="p-2 border border-danger border-opacity-10 bg-danger-subtle rounded-2 me-2">
                                        <div class="bg-danger rounded-circle widget-size text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M22 19H2v2h20zM4 15c0 .5.2 1 .6 1.4s.9.6 1.4.6V6c-.5 0-1 .2-1.4.6S4 7.5 4 8zm9.5-9h-3c0-.4.1-.8.4-1.1s.6-.4 1.1-.4c.4 0 .8.1 1.1.4c.2.3.4.7.4 1.1M7 6v11h10V6h-2q0-1.2-.9-2.1C13.2 3 12.8 3 12 3q-1.2 0-2.1.9T9 6zm11 11c.5 0 1-.2 1.4-.6s.6-.9.6-1.4V8c0-.5-.2-1-.6-1.4S18.5 6 18 6z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-dark fs-15">Total Deals</p>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="mb-0 fs-22 text-dark me-3">2,254</h3>
                                    <div class="text-center">
                                        <span class="text-primary fs-14 me-2"><i class="mdi mdi-trending-up fs-14"></i>
                                            12.8%</span>
                                        <p class="text-dark fs-13 mb-0">Last 7 days</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="widget-first">

                                <div class="d-flex align-items-center mb-2">
                                    <div
                                        class="p-2 border border-warning border-opacity-10 bg-warning-subtle rounded-2 me-2">
                                        <div class="bg-warning rounded-circle widget-size text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M7 15h2c0 1.08 1.37 2 3 2s3-.92 3-2c0-1.1-1.04-1.5-3.24-2.03C9.64 12.44 7 11.78 7 9c0-1.79 1.47-3.31 3.5-3.82V3h3v2.18C15.53 5.69 17 7.21 17 9h-2c0-1.08-1.37-2-3-2s-3 .92-3 2c0 1.1 1.04 1.5 3.24 2.03C14.36 11.56 17 12.22 17 15c0 1.79-1.47 3.31-3.5 3.82V21h-3v-2.18C8.47 18.31 7 16.79 7 15" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-dark fs-15">Total Revenue</p>
                                </div>


                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="mb-0 fs-22 text-dark me-3">$4,578</h3>

                                    <div class="text-muted">
                                        <span class="text-danger fs-14 me-2"><i class="mdi mdi-trending-down fs-14"></i>
                                            18%</span>
                                        <p class="text-dark fs-13 mb-0">Last 7 days</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 col-xl">
                    <div class="card">
                        <div class="card-body">
                            <div class="widget-first">

                                <div class="d-flex align-items-center mb-2">
                                    <div
                                        class="p-2 border border-success border-opacity-10 bg-success-subtle rounded-2 me-2">
                                        <div class="bg-success rounded-circle widget-size text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <g fill="none" stroke="#ffffff" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2">
                                                    <path d="M5 19L19 5" />
                                                    <circle cx="7" cy="7" r="3" />
                                                    <circle cx="17" cy="17" r="3" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mb-0 text-dark fs-15">Conversion Rate</p>
                                </div>


                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 class="mb-0 fs-22 text-dark me-3">14.57%</h3>

                                    <div class="text-muted">
                                        <span class="text-primary fs-14 me-2"><i class="mdi mdi-trending-up fs-14"></i>
                                            5.8%</span>
                                        <p class="text-dark fs-13 mb-0">Last 7 days</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Main Widgets -->



            <div class="row">


                {{-- <div class="col-xl-9">
                        <div class="card overflow-hidden">

                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title mb-0">Leads Report</h5>
                                </div>
                            </div>

                            <div class="card-body mt-0">
                                <div class="table-responsive table-card mt-0">
                                    <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                        <thead class="text-muted table-light">
                                            <tr>
                                                <th scope="col" class="cursor-pointer">Lead</th>
                                                <th scope="col" class="cursor-pointer">Email</th>
                                                <th scope="col" class="cursor-pointer">Phone No</th>
                                                <th scope="col" class="cursor-pointer">Campany</th>
                                                <th scope="col" class="cursor-pointer">Status</th>
                                                <th scope="col" class="cursor-pointer">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="assets/images/users/user-22.jpg"
                                                        class="avatar avatar-sm rounded-circle me-3">
                                                    John Hamilton
                                                </td>
                                                <td>johnehamilton@gmail.com</td>
                                                <td>+48, 65610085</td>
                                                <td>Mufti</td>
                                                <td>
                                                    <span class="badge bg-primary-subtle text-primary fw-semibold">New
                                                        Lead</span>
                                                </td>
                                                <td>
                                                    <a aria-label="anchor"
                                                        class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                        <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                    </a>
                                                    <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                        <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="assets/images/users/user-23.jpg"
                                                        class="avatar avatar-sm rounded-circle me-3">
                                                    Janice Reese
                                                </td>
                                                <td>janicecreese@gmail.com</td>
                                                <td>+45, 32678972</td>
                                                <td>Gucci</td>
                                                <td>
                                                    <span class="badge bg-secondary-subtle text-secondary fw-semibold">In
                                                        Progress</span>
                                                </td>
                                                <td>
                                                    <a aria-label="anchor"
                                                        class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                        <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                    </a>
                                                    <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                        <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="assets/images/users/user-19.jpg"
                                                        class="avatar avatar-sm rounded-circle me-3">
                                                    Andrew Kim
                                                </td>
                                                <td>andrewekim@gmail.com</td>
                                                <td>+30, 84787124</td>
                                                <td>Vans</td>
                                                <td>
                                                    <span
                                                        class="badge bg-danger-subtle text-danger fw-semibold">Loss</span>
                                                </td>
                                                <td>
                                                    <a aria-label="anchor"
                                                        class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                        <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                    </a>
                                                    <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                        <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="assets/images/users/user-20.jpg"
                                                        class="avatar avatar-sm rounded-circle me-3">
                                                    Kathryn Sanchez
                                                </td>
                                                <td>kathryntsanchez@gmail.com</td>
                                                <td>+30, 23794209</td>
                                                <td>Myntra</td>
                                                <td>
                                                    <span
                                                        class="badge bg-success-subtle text-success fw-semibold">Won</span>
                                                </td>
                                                <td>
                                                    <a aria-label="anchor"
                                                        class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                        <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                    </a>
                                                    <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                        <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="assets/images/users/user-21.jpg"
                                                        class="avatar avatar-sm rounded-circle me-3">
                                                    Diane Richards
                                                </td>
                                                <td>dianetrichards@gmail.com</td>
                                                <td>+78, 37569176</td>
                                                <td>HCLTech</td>
                                                <td>
                                                    <span
                                                        class="badge bg-warning-subtle text-warning fw-semibold">Converted</span>
                                                </td>
                                                <td>
                                                    <a aria-label="anchor"
                                                        class="btn btn-icon btn-sm bg-primary-subtle me-1"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                        <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                    </a>
                                                    <a aria-label="anchor" class="btn btn-icon btn-sm bg-danger-subtle"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                        <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div>
                            </div>

                        </div>
                    </div> --}}

            </div>
        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection
