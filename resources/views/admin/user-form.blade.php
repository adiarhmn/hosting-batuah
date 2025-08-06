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
                                <h5 class="card-title mb-0">{{ isset($user) ? 'Edit User' : 'Add New User' }}</h5>
                                <p class="text-muted mb-0">
                                    {{ isset($user) ? 'Update user information' : 'Create a new user account' }}</p>
                            </div>
                            <a href="{{ url('admin/users') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Users
                            </a>
                        </div>
                    </div>

                    {{-- Form Section --}}
                    <div class="card-body">
                        <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($user))
                                @method('PUT')
                            @endif

                            <div class="row">
                                {{-- Name Field --}}
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $user->name ?? '') }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email Field --}}
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $user->email ?? '') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Password Field --}}
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">
                                        Password
                                        @if (!isset($user))
                                            <span class="text-danger">*</span>
                                        @endif
                                    </label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" {{ isset($user) ? '' : '' }}>
                                    @if (isset($user))
                                        <small class="text-muted">Leave blank to keep current password</small>
                                    @endif
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                {{-- Phone Field --}}
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Role Field --}}
                                <div class="col-md-6 mb-3">
                                    <label for="role_id" class="form-label">Role <span class="text-danger">*</span></label>
                                    <select class="form-select @error('role_id') is-invalid @enderror" id="role_id"
                                        name="role_id">
                                        <option value="">Select Role</option>
                                        <option value="admin"
                                            {{ old('role_id', $user->role_id ?? '') == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="user"
                                            {{ old('role_id', $user->role_id ?? '') == 'user' ? 'selected' : '' }}>User
                                        </option>
                                    </select>
                                    @error('role_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Address Field --}}
                                <div class="col-md-6 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="1">{{ old('address', $user->address ?? '') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Submit Buttons --}}
                            <div class="d-flex gap-2 mt-4">
                                <a href="{{ url('admin/users') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($user) ? 'Update User' : 'Create User' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
