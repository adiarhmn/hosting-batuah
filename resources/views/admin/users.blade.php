@use('Illuminate\Support\Number')
@extends('layouts.admin-layout')
@section('content')
    <div class="container-fluid">
        <div class="row py-3">
            <div class="col-xl-12">
                <div class="card overflow-hidden">
                    {{-- Header Section --}}
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="card-title mb-0">Users</h5>
                                <p class="text-muted mb-0">List of all users</p>
                            </div>
                            <div class="action-button">
                                {{-- New User --}}
                                <a href="{{ url('admin/users/create') }}" class="btn btn-primary ms-1">
                                    <i class="mdi mdi-plus me-1"></i> New User
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body mt-0">

                        {{-- Search Form --}}
                        <form method="GET" action="{{ url('admin/users') }}" class="mb-3" style="max-width: 400px;">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by name or email" value="{{ request('search') }}">
                                <button class="btn btn-primary" type="submit">
                                    <i class="mdi mdi-magnify"></i> Search
                                </button>
                            </div>
                        </form>

                        {{-- TABLE CONTENT --}}
                        <div class="table-responsive table-card mt-0" style="min-height: 400px;">
                            <table
                                class="table table-borderless table-centered align-middle table-nowrap mb-0 table-hover table-striped text-nowrap">
                                <thead class="text-muted table-light mb-2">
                                    <tr>
                                        <th scope="col" class="cursor-pointer">No</th>
                                        <th scope="col" class="cursor-pointer">Name</th>
                                        <th scope="col" class="cursor-pointer">Email</th>
                                        <th scope="col" class="cursor-pointer text-center">Total Domains</th>
                                        <th scope="col" class="cursor-pointer">Created At</th>
                                        <th scope="col" class="cursor-pointer text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <div class="text-muted py-5">
                                                    No users found. Click Sync Users to fetch from the server.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                    @foreach ($users as $item)
                                        <tr>
                                            <td>
                                                {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $item->name ?? '-' }}
                                            </td>
                                            <td>{{ $item->email ?? '-' }}</td>
                                            <td class="text-center">
                                                {{ $item->domains_count ?? '-' }}
                                            </td>
                                            <td>{{ $item->created_at ?? '-' }}</td>
                                            <td class="text-center">
                                                {{-- Action Buttons --}}
                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-sm" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        style="position: absolute; z-index: 9950;">
                                                        {{-- View --}}
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url('admin/users/' . $item->id) }}">
                                                                <i class="mdi mdi-eye me-2"></i>View Details
                                                            </a>
                                                        </li>
                                                        {{-- Edit --}}
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ url('admin/users/' . $item->id . '/edit') }}">
                                                                <i class="mdi mdi-pencil me-2"></i>Edit
                                                            </a>
                                                        </li>
                                                        {{-- Delete --}}
                                                        <li>
                                                            <a class="dropdown-item text-danger" href="#">
                                                                <i class="mdi mdi-delete me-2"></i>Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->

                            {{-- Pagination --}}
                            <div class="mt-3">
                                {{ $users->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
@endsection
