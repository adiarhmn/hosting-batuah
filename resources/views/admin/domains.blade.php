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
                        <div class="table-responsive table-card mt-0">
                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                <thead class="text-muted table-light">
                                    <tr>
                                        <th scope="col" class="cursor-pointer">No</th>
                                        <th scope="col" class="cursor-pointer">Name Package</th>
                                        <th scope="col" class="cursor-pointer">Bandwidth</th>
                                        <th scope="col" class="cursor-pointer">Disk Space</th>
                                        <th scope="col" class="cursor-pointer text-center">Max Subdomain</th>
                                        <th scope="col" class="cursor-pointer text-center">Max MySQL DB</th>
                                        <th scope="col" class="cursor-pointer">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($packages->isEmpty())
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <div class="text-muted py-5">
                                                    No packages found. Click Sync Packages to fetch from the server.
                                                </div>
                                            </td>
                                        </tr>
                                    @endif

                                    @foreach ($domains as $item)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            <td>
                                                {{ $item->name_package ?? '-' }}
                                            </td>
                                            <td>{{ $item->bandwidth ?? '-' }}</td>
                                            <td>
                                                @php
                                                    $diskSize = $item->disk_space ? Number::fileSize($item->disk_space * 1024 * 1024) : '-';
                                                    $colorClass = '';
                                                    if ($diskSize !== '-') {
                                                        if (str_contains($diskSize, 'MB')) {
                                                            $colorClass = 'bg-warning-subtle text-warning';
                                                        } elseif (str_contains($diskSize, 'GB')) {
                                                            $colorClass = 'bg-primary-subtle text-primary';
                                                        }
                                                    }
                                                @endphp
                                                <span class="badge {{ $colorClass }} fw-semibold text-uppercase">{{ $diskSize }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge bg-secondary-subtle text-secondary fw-semibold text-uppercase">{{ $item->max_subdomains ?? 0 }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge bg-secondary-subtle text-secondary fw-semibold text-uppercase">{{ $item->max_db_mysql ?? 0 }} DB</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-primary-subtle text-primary fw-semibold text-uppercase">{{ $item->status }}</span>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
@endsection
