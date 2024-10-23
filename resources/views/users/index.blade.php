@extends('layouts.app')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Data User</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button to trigger modal -->
            <button type="button" class="btn btn-primary btn-custom mb-1" data-toggle="modal"
                data-target="#tambahUserModal">
                <i class="fa fa-plus"></i> Tambah User
            </button>
            <button class="btn btn-outline-primary btn-custom mb-1" type="button" onClick="window.location.reload()">
                <i class="fa fa-refresh"></i> Refresh
            </button>

            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Staff</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Role</th>
                            <th style="width: 123px;" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->Nama_Staff }}</td>
                                <td>{{ $user->NIP }}</td>
                                <td>{{ $user->Role }}</td>
                                <td>
                                    <!-- Tombol Lihat -->
                                    <a href="javascript:void(0)" id="btn-view" class="btn btn-info btn-sm p-1"
                                        title="Lihat"
                                        onclick="lihatUser('{{ $user->Nama_Staff }}', '{{ $user->NIP }}', '{{ $user->Role }}')">
                                        <i class="ti-eye" style="font-size: 14px;"></i> <!-- Ikon Themify untuk "Lihat" -->
                                    </a>

                                    <!-- Tombol Edit -->
                                    <a href="javascript:void(0)" id="btn-edit" class="btn btn-warning btn-sm p-1"
                                        title="Edit"
                                        onclick="editUser('{{ $user->Nama_Staff }}', '{{ $user->NIP }}', '{{ $user->Role }}', '{{ route('users.update', $user->NIP) }}')">
                                        <i class="ti-pencil" style="font-size: 14px;"></i>
                                        <!-- Ikon Themify untuk "Edit" -->
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('users.destroy', $user->NIP) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm p-1" title="Hapus">
                                            <i class="ti-trash" style="font-size: 14px;"></i>
                                            <!-- Ikon Themify untuk "Hapus" -->
                                        </button>
                                    </form>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal Tambah User -->
            <div class="modal fade" id="tambahUserModal" tabindex="-1" role="dialog"
                aria-labelledby="tambahUserModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahUserModalLabel">Tambah Data User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Nama_Staff">Nama Staff</label>
                                    <input type="text" name="Nama_Staff" class="form-control" id="Nama_Staff" required>
                                </div>
                                <div class="form-group">
                                    <label for="NIP">NIP</label>
                                    <input type="text" name="NIP" class="form-control" id="NIP" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="Role">Role</label>
                                    <select name="Role" class="form-control" id="Role" required>
                                        <option value="" disabled selected>Pilih Role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Lihat User -->
            <div class="modal fade" id="lihatUserModal" tabindex="-1" role="dialog"
                aria-labelledby="lihatUserModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="lihatUserModalLabel">Lihat Data User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="lihatNama_Staff">Nama Staff</label>
                                <input type="text" class="form-control" id="lihatNama_Staff" readonly>
                            </div>
                            <div class="form-group">
                                <label for="lihatNIP">NIP</label>
                                <input type="text" class="form-control" id="lihatNIP" readonly>
                            </div>
                            <div class="form-group">
                                <label for="editRole">Role</label>
                                <select name="Role" class="form-control" id="editRole" required>
                                    <option value="Admin">Admin</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" value="*****" readonly>
                                <small class="text-muted">Password tidak dapat dilihat.</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Edit User -->
            <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog"
                aria-labelledby="editUserModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel">Edit Data User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editUserForm" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="editNama_Staff">Nama Staff</label>
                                    <input type="text" name="Nama_Staff" class="form-control" id="editNama_Staff"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="editNIP">NIP</label>
                                    <input type="text" name="NIP" class="form-control" id="editNIP" required>
                                </div>
                                <div class="form-group">
                                    <label for="editRole">Role</label>
                                    <select name="Role" class="form-control" id="editRole" required>
                                        <option value="Admin">Admin</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="editPassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="editPassword"
                                        placeholder="Kosongkan jika tidak ingin mengubah">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Konfirmasi Hapus -->
            <div class="modal fade" id="hapusUserModal" tabindex="-1" role="dialog"
                aria-labelledby="hapusUserModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusUserModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus user ini?</p>
                        </div>
                        <div class="modal-footer">
                            <form id="hapusUserForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                // Fungsi untuk menampilkan modal lihat user
                function lihatUser(nama, nip, role) {
                    $('#lihatNama_Staff').val(nama);
                    $('#lihatNIP').val(nip);
                    $('#lihatRole').val(role);
                    $('#lihatUserModal').modal('show');
                }

                // Fungsi untuk menampilkan modal edit user
                function editUser(nama, nip, role, updateUrl) {
                    $('#editNama_Staff').val(nama);
                    $('#editNIP').val(nip);
                    $('#editRole').val(role);
                    $('#editPassword').val(''); // Kosongkan password
                    $('#editUserForm').attr('action', updateUrl);
                    $('#editUserModal').modal('show');
                }

                // Fungsi untuk menampilkan modal konfirmasi hapus
                function konfirmasiHapus(deleteUrl) {
                    $('#hapusUserForm').attr('action', deleteUrl);
                    $('#hapusUserModal').modal('show');
                }
            </script>
        @endsection
