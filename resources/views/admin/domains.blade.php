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
                            <table
                                class="table table-borderless table-centered align-middle table-nowrap mb-0 table-striped">
                                <thead class="text-muted table-light">
                                    <tr>
                                        <th scope="col" class="cursor-pointer">No</th>
                                        <th scope="col" class="cursor-pointer">Domain</th>
                                        <th scope="col" class="cursor-pointer text-center">Code</th>
                                        <th scope="col" class="cursor-pointer">Username</th>
                                        <th scope="col" class="cursor-pointer text-center">Bandwidth</th>
                                        <th scope="col" class="cursor-pointer text-center">Disk Space</th>
                                        <th scope="col" class="cursor-pointer text-center">Package</th>
                                        <th scope="col" class="cursor-pointer text-center">Expired At</th>
                                        <th scope="col" class="cursor-pointer text-center">Status</th>
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
                                            </td>
                                            <td>
                                                @if ($item->status == 'active')
                                                    <a href="{{ 'http://' . $item->name }}" target="_blank">
                                                        {{ $item->name }}
                                                        <i class="mdi mdi-open-in-new"></i>
                                                    </a>
                                                @else
                                                    {{ $item->name ?? '-' }}
                                                @endif
                                            </td>
                                            <td class="code-font text-center">
                                                <span
                                                    class="badge bg-secondary-subtle text-primary fw-semibold text-uppercase">
                                                {{ $item->code ?? '-' }}
                                                </span>
                                            </td>
                                            <td>
                                                {{ $item->username ?? '-' }}
                                            </td>
                                            <td class="text-uppercase text-center">{{ $item->package->bandwidth ?? '-' }}</td>
                                            <td class="text-center">
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
                                                    class="badge bg-secondary-subtle text-secondary fw-semibold text-uppercase">
                                                    {{ $item->package->name_package ?? '-' }}
                                                </span>
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
                                            <td class="text-center">
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
                                            <td>
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-light btn-sm" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            style="position: absolute; z-index: 9950;">
                                                            <li>
                                                                @if ($item->status === 'pending' || $item->status === 'inactive')
                                                                    <form
                                                                        action="{{ url('admin/domains/activate/' . $item->id) }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="dropdown-item text-success">
                                                                            <i class="mdi mdi-play me-2"></i>Activate
                                                                        </button>
                                                                    </form>
                                                                @elseif($item->status === 'active')
                                                                    <form
                                                                        action="{{ 'https://' . $item->name . ':' . config('app.hosting.port') . '/CMD_LOGIN' }}"
                                                                        method="POST" name="form">
                                                                        <input type=hidden name=referer value="/">
                                                                        <input type=hidden name=FAIL_URL value="">
                                                                        <input type=hidden name=LOGOUT_URL
                                                                            value="{{ 'http://' . $item->name . ':' . config('app.hosting.port') . '/logged_out.html' }}">
                                                                        <input type=hidden name='username'
                                                                            value="{{ $item->username }}">
                                                                        <input type=hidden name='password'
                                                                            value="{{ $item->code . config('app.hosting.client_code') }}">

                                                                        <button type="submit"
                                                                            class="dropdown-item text-primary">
                                                                            <i class="mdi mdi-login me-2"></i>Login
                                                                            Dashboard
                                                                        </button>
                                                                    </form>
                                                                    <form
                                                                        action="{{ url('admin/users/' . $item->id . '/deactivate') }}"
                                                                        method="POST" style="display: inline;">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="dropdown-item text-danger">
                                                                            <i class="mdi mdi-pause me-2"></i>Deactivate
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </li>

                                                            {{-- Regenerate Password --}}
                                                            <li>
                                                                <a class="dropdown-item text-warning" href="#">
                                                                    <i class="mdi mdi-refresh me-2"></i>Regenerate Password
                                                                </a>
                                                            </li>

                                                            {{-- Get Password --}}
                                                            <li>
                                                                <a class="dropdown-item text-info" href="#">
                                                                    <i class="mdi mdi-key me-2"></i>Get Password
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
                                                </div>
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
