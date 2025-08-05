@use('Illuminate\Support\Number')
@extends('layouts.admin-layout')
@section('content')
    <div class="container-fluid">
        <div class="row py-3">
            <div class="col-xl-12">
                <div class="card overflow-hidden">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="card-title mb-0">Domains</h5>
                                <p class="text-muted mb-0">List of all domains</p>
                            </div>
                            <div class="action-button">
                                {{-- Sync --}}
                                <a href="{{ url('admin/domains/sync') }}" class="btn btn-secondary ms-1">
                                    <i class="mdi mdi-sync me-1"></i> Sync Domains
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body mt-0">

                        {{-- Action [Search, Filtering, etc] --}}
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <form action="{{ url('admin/domains') }}" method="GET">
                                    <div>
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Search by domain or username" value="{{ request('search') }}">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <select name="package" class="form-select" onchange="this.form.submit()">
                                    <option value="">Filter by Package</option>
                                    {{-- Add package options here --}}
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="">Filter by Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="suspended">Suspended</option>
                                </select>
                            </div>
                        </div>

                        {{-- Table Content --}}
                        <div class="table-responsive table-card mt-0">
                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                <thead class="text-muted table-light">
                                    <tr>
                                        <th scope="col" class="cursor-pointer">No</th>
                                        <th scope="col" class="cursor-pointer">Domain</th>
                                        <th scope="col" class="cursor-pointer">Username</th>
                                        <th scope="col" class="cursor-pointer">Bandwidth</th>
                                        <th scope="col" class="cursor-pointer">Disk Space</th>
                                        <th scope="col" class="cursor-pointer text-center">Package</th>
                                        <th scope="col" class="cursor-pointer text-center">Expired At</th>
                                        <th scope="col" class="cursor-pointer">Status</th>
                                        <th scope="col" class="cursor-pointer">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($domains->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                <div class="text-muted py-5">
                                                    No domains found. Click Sync Domains to fetch from the server.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                    @foreach ($domains as $item)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            <td>
                                                {{ $item->name ?? '-' }}
                                            </td>
                                            <td>
                                                {{ $item->username ?? '-' }}
                                            </td>
                                            <td class="text-uppercase">{{ $item->package->bandwidth ?? '-' }}</td>
                                            <td>
                                                @php
                                                    $diskSize = $item->package->disk_space
                                                        ? Number::fileSize($item->package->disk_space * 1024 * 1024)
                                                        : '-';
                                                    $colorClass = '';
                                                    if ($diskSize !== '-') {
                                                        if (str_contains($diskSize, 'MB')) {
                                                            $colorClass = 'bg-warning-subtle text-warning';
                                                        } elseif (str_contains($diskSize, 'GB')) {
                                                            $colorClass = 'bg-primary-subtle text-primary';
                                                        }
                                                    }
                                                @endphp
                                                <span
                                                    class="badge {{ $colorClass }} fw-semibold text-uppercase">{{ $diskSize }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge bg-secondary-subtle text-secondary fw-semibold text-uppercase">{{ $item->package->name_package ?? '-' }}</span>
                                            </td>
                                            <td class="text-center">
                                                @if ($item->expires_at)
                                                    <span
                                                        class="badge bg-success-subtle text-success fw-semibold text-uppercase">{{ $item->expires_at->format('Y-m-d') }}</span>
                                                @else
                                                    <span
                                                        class="badge bg-danger-subtle text-danger fw-semibold text-uppercase">Expired</span>
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $statusClass = match ($item->status) {
                                                        'active' => 'bg-primary-subtle text-primary',
                                                        'inactive' => 'bg-danger-subtle text-danger',
                                                        'suspended' => 'bg-warning-subtle text-warning',
                                                        default => 'bg-secondary-subtle text-secondary',
                                                    };
                                                @endphp
                                                <span
                                                    class="badge {{ $statusClass }} fw-semibold text-uppercase">{{ $item->status }}</span>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->

                            {{-- Pagination --}}
                            <div class="mt-3">
                                {{ $domains->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
@endsection
