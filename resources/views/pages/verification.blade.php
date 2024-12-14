@extends('layouts.dashboard')

@section('title', 'DDashboard')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">    
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Simple Datatable
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        @if ($user->role !== 'superadmin')
                        <!-- Tombol Ubah Role -->
                        <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editRoleModal{{ $user->id }}">
                            <i class="bi bi-pencil"></i> Ubah Role
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="editRoleModal{{ $user->id }}" tabindex="-1" aria-labelledby="editRoleLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editRoleLabel">Ubah Role</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('users.updateRole', $user->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <label for="role" class="form-label">Pilih Role:</label>
                                            <select name="role" id="role" class="form-select">
                                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (auth()->user()->role === 'superadmin' && $user->id !== auth()->id())
                        <!-- Tombol Hapus -->
                        <form action="{{ route('users.softDelete', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    @endif

                    </td>
                </tr>
            @endforeach
                        
                    </tbody>
                </table>            
            </div>
        </div>

        </section>
    </div>
@endsection
