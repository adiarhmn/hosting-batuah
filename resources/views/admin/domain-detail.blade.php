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
                                <h5 class="card-title mb-0">Domain Detail</h5>
                                <p class="text-muted mb-0">Details for {{ $domain->name }}</p>
                            </div>
                            <a href="{{ url('admin/domains') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Domains
                            </a>
                        </div>
                    </div>

                    {{-- Domain Information Section --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="action-button">
                                    <div class="d-flex flex-wrap gap-2 mb-3">

                                        {{-- View User Button --}}
                                        <a class="btn btn-outline-info btn-sm"
                                            href="{{ url('admin/users/' . $domain->user_id) }}">
                                            <i class="mdi mdi-account me-1"></i>View User
                                        </a>

                                        {{-- Activate/Deactivate/Login Buttons --}}
                                        @if ($domain->status === 'pending' || $domain->status === 'inactive')
                                            <form action="{{ url('admin/domains/activate/' . $domain->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="mdi mdi-play me-1"></i>Activate
                                                </button>
                                            </form>
                                        @elseif($domain->status === 'active')
                                            <form action="{{ url('admin/domains/login/' . $domain->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="mdi mdi-login me-1"></i>Login Dashboard
                                                </button>
                                            </form>
                                            <form action="{{ url('admin/domains/suspend/' . $domain->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="mdi mdi-close me-1"></i>
                                                    Suspend
                                                </button>
                                            </form>
                                        @elseif($domain->status === 'suspended')
                                            <form action="{{ url('admin/domains/activate/' . $domain->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="mdi mdi-play me-1"></i>Activate
                                                </button>
                                            </form>
                                        @endif

                                        {{-- Regenerate Password Button --}}
                                        <form action="{{ url('admin/domains/regenerate-password/' . $domain->id) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">
                                                <i class="mdi mdi-refresh me-1"></i>Regenerate Password
                                            </button>
                                        </form>

                                        {{-- Delete Button --}}
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="mdi mdi-delete me-1"></i>Delete
                                        </button>
                                    </div>
                                </div>
                                {{-- Row Content --}}
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <h6 class="fw-semibold mb-3 text-primary">Domain Information</h6>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-striped">
                                                <tbody>
                                                    <tr>
                                                        {{-- Owner --}}
                                                        <td class="fw-medium">Owner</td>
                                                        <td>: {{ $domain->user->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-medium">Email</td>
                                                        <td>: {{ $domain->user->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-medium">Domain</td>
                                                        <td>:
                                                            <a href="http://{{ $domain->name }}" target="_blank">{{ $domain->name }}
                                                                <i class="mdi mdi-open-in-new"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-medium">Username</td>
                                                        <td>: {{ $domain->username }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-medium">Login Check</td>
                                                        <td>:
                                                            @if (isset($subdomainDetails['error']))
                                                                <span class="text-danger">Failed to login</span>
                                                            @else
                                                                <span class="text-success">Success</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-medium">Status</td>
                                                        <td class="text-uppercase">:
                                                            <span
                                                                class="badge bg-{{ $domain->status == 'active' ? 'primary-subtle text-primary' : 'warning-subtle text-warning' }}">
                                                                {{ ucfirst($domain->status) }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <h6 class="fw-semibold mb-3 text-primary">Domain Usage</h6>
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td class="fw-medium">Disk Usage</td>
                                                        <td>:</td>
                                                        <td>
                                                            {{ Number::fileSize(intval($apiDetails['quota'] * 1024 * 1024)) }}
                                                            /
                                                            {{ Number::fileSize(intval($domain->package->disk_space) * 1024 * 1024) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-medium">Total DB Mysql</td>
                                                        <td>:</td>
                                                        <td>{{ $apiDetails['mysql'] }} /
                                                            {{ $domain->package->max_db_mysql }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-medium">Bandwidth</td>
                                                        <td>:</td>
                                                        <td>
                                                            {{ Number::fileSize(intval($apiDetails['bandwidth'] * 1024 * 1024)) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-medium text-nowrap">Total Subdomains</td>
                                                        <td>:</td>
                                                        <td>{{ $apiDetails['nsubdomains'] ?? 0 }} /
                                                            {{ $domain->package->max_subdomains }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-medium">Subdomain</td>
                                                        <td>:</td>
                                                        <td>
                                                            @if (isset($subdomainDetails['error']))
                                                                <span class="text-danger">Error loading subdomains</span>
                                                            @elseif(empty($subdomainDetails))
                                                                <span class="text-muted">No subdomains</span>
                                                            @else
                                                                @foreach ($subdomainDetails['list'] as $subdomain)
                                                                    <span
                                                                        class="badge bg-info me-1">{{ $subdomain . '.' . $domain->name }}</span>
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- API Details Section --}}
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="accordion" id="apiDetailsAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingApiDetails">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseApiDetails"
                                                aria-expanded="false" aria-controls="collapseApiDetails">
                                                <h6 class="fw-semibold mb-0">JSON Detail Domain</h6>
                                            </button>
                                        </h2>
                                        <div id="collapseApiDetails" class="accordion-collapse collapse"
                                            aria-labelledby="headingApiDetails" data-bs-parent="#apiDetailsAccordion">
                                            <div class="accordion-body">
                                                <div class="bg-light p-3 rounded">
                                                    <pre class="mb-0"><code>{{ json_encode($apiDetails, JSON_PRETTY_PRINT) }}</code></pre>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
