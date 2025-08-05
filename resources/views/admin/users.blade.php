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
                                {{-- Sync --}}
                                <a href="{{ url('admin/users/sync') }}" class="btn btn-secondary ms-1">
                                    <i class="mdi mdi-sync me-1"></i> Sync Users
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--
                                NOTE:
                                - Card body contains the main content of the card.
                            -->
                    <div class="card-body mt-0">
                        <div class="table-responsive table-card mt-0">
                            <!--
                                            NOTE:
                                            - The table is designed to be responsive and will adjust based on the screen size.
                                        -->
                            <table
                                class="table table-borderless table-centered align-middle table-nowrap mb-0 table-hover table-striped">
                                <thead class="text-muted table-light mb-2">
                                    <tr>
                                        <th scope="col" class="cursor-pointer">No</th>
                                        <th scope="col" class="cursor-pointer">Name</th>
                                        <th scope="col" class="cursor-pointer">Email</th>
                                        <th scope="col" class="cursor-pointer">Phone</th>
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
                                            <td>
                                                {{ $item->userDetail->phone ?? '-' }}
                                            </td>
                                            <td>{{ $item->created_at ?? '-' }}</td>
                                            <td>
                                                {{-- Action Buttons --}}
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="{{ url('admin/users/' . $item->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                    <a href="{{ url('admin/users/' . $item->id . '/edit') }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <form action="{{ url('admin/users/' . $item->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button>
                                                    </form>
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
