@use('Illuminate\Support\Number')
@extends('layouts.admin-layout')
@section('content')
    <div class="container-fluid">
        <div class="row py-3">
            {{-- USER INFORMATION SECTION --}}
            <div class="col-xl-12">
                <div class="card overflow-hidden">
                    {{-- Header Section --}}
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="card-title mb-0">Information : {{ $user->name }}</h5>
                                <p class="text-muted mb-0">
                                    Details of user {{ $user->name }}
                                </p>
                            </div>
                            <div class="action-button">
                                {{-- Sync --}}
                                <a href="{{ url('admin/users/sync') }}" class="btn btn-secondary ms-1">
                                    <i class="mdi mdi-sync me-1"></i> Sync Users
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body mt-0">

                    </div>
                </div>
            </div>

            {{-- DOMAIN SECTION --}}
            <div class="col-xl-12">
                <div class="card overflow-hidden">
                    {{-- Header Section --}}
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h5 class="card-title mb-0">Domains of {{ $user->name }}</h5>
                                <p class="text-muted mb-0">List of all domains owned by {{ $user->name }}</p>
                            </div>
                            <div class="action-button">
                                {{-- Create Domain for This User --}}
                                <button type="button" class="btn btn-primary ms-1" data-bs-toggle="modal"
                                    data-bs-target="#createDomainModal">
                                    <i class="mdi mdi-plus me-1"></i> New Domain
                                </button>

                                <!-- Create Domain Modal -->
                                <div class="modal fade" id="createDomainModal" tabindex="-1"
                                    aria-labelledby="createDomainModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createDomainModalLabel">Create New Domain for
                                                    {{ $user->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ url('admin/users/create/domain') }}">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <div class="modal-body">
                                                    <div class="row">

                                                        {{-- Domain Input --}}
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Domain
                                                                    Name</label>
                                                                <div class="input-group">
                                                                    <input type="text"
                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                        id="name" name="name"
                                                                        value="{{ old('name') }}"
                                                                        placeholder="yourdomain">
                                                                    <span class="input-group-text">
                                                                        .{{ config('app.hosting.host') }}
                                                                    </span>
                                                                </div>
                                                                @error('name')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        {{-- Username Input --}}
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="username" class="form-label">Username</label>
                                                                <input type="text"
                                                                    class="form-control @error('username') is-invalid @enderror"
                                                                    id="username" name="username"
                                                                    value="{{ old('username') }}"
                                                                    placeholder="Enter username">
                                                                @error('username')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            {{-- Package Selection --}}
                                                            <div class="mb-3">
                                                                <label for="package_id" class="form-label">Package</label>
                                                                <select
                                                                    class="form-select @error('package_id') is-invalid @enderror"
                                                                    id="package_id" name="package_id">
                                                                    <option value="">Select Package</option>
                                                                    @foreach ($packages as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            @if (old('package_id') == $item->id) selected @endif>
                                                                            {{ $item->name_package }} -
                                                                            {{ Number::fileSize($item->disk_space * 1024 * 1024) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('package_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="period" class="form-label">Active
                                                                    Period</label>
                                                                <select
                                                                    class="form-select @error('period') is-invalid @enderror"
                                                                    id="period" name="period">
                                                                    <option value="">Select Active Period</option>
                                                                    @foreach ($periods as $period)
                                                                        <option value="{{ $period }}"
                                                                            @if (old('period') == $period) selected @endif>
                                                                            {{ $period }} days
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('period')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Create Domain</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body mt-0">
                        {{-- Table Content --}}
                        <div class="table-responsive table-card mt-0" style="min-height: 400px;">
                            <table
                                class="table table-borderless table-centered align-middle table-nowrap mb-0 table-striped">
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
                                        <th scope="col" class="cursor-pointer text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($domains->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-center">
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


{{-- Script --}}
@section('scripts')
    @if (session('modal-show'))
        <script>
            $(document).ready(function() {
                $('#createDomainModal').modal('show');

                // Tampilkan error validasi di dalam modal
                @if ($errors->any())
                    // Scroll ke bagian error pertama
                    const firstError = $('.is-invalid').first();
                    if (firstError.length) {
                        $('html, body').animate({
                            scrollTop: firstError.offset().top - 100
                        }, 200);
                    }
                @endif
            });
        </script>
    @endif
@endsection
