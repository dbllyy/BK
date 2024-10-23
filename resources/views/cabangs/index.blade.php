@extends('layouts.app')

@section('content')
    <!-- table -->
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

            <!-- Tombol Tambah Cabang -->
            <button type="button" class="btn btn-primary btn-custom mb-1" data-toggle="modal"
                data-target="#tambahCabangModal">
                <i class="fa fa-plus"></i> Tambah Cabang
            </button>

            <!-- Tombol Refresh -->
            <button class="btn btn-outline-primary btn-custom mb-1" type="button" onClick="window.location.reload()">
                <i class="fa fa-refresh"></i> Refresh
            </button>

            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Cabang</th>
                            <th scope="col">Nama Cabang</th>
                            <th style="width: 123px;" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cabangs as $cabang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cabang->No_Cabang }}</td>
                                <td>{{ $cabang->Nama_Cabang }}</td>
                                <td>
                                    <!-- Tombol Lihat Cabang -->
                                    <a href="javascript:void(0)" class="btn btn-info btn-sm p-1" title="Lihat"
                                        onclick="lihatCabang('{{ $cabang->No_Cabang }}', '{{ $cabang->Nama_Cabang }}')">
                                        <i class="ti-eye" style="font-size: 14px;"></i> <!-- Ikon Themify untuk "Lihat" -->
                                    </a>

                                    <!-- Tombol Edit Cabang -->
                                    <a href="javascript:void(0)" class="btn btn-warning btn-sm p-1" title="Edit"
                                        onclick="editCabang('{{ $cabang->No_Cabang }}', '{{ $cabang->Nama_Cabang }}', '{{ route('cabangs.update', $cabang->No_Cabang) }}')">
                                        <i class="ti-pencil" style="font-size: 14px;"></i>
                                        <!-- Ikon Themify untuk "Edit" -->
                                    </a>

                                    <!-- Tombol Hapus Cabang dengan AJAX -->
                                    <form action="javascript:void(0);" method="POST" style="display:inline;"
                                        id="form-hapus-{{ $cabang->No_Cabang }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm p-1" title="Hapus"
                                            onclick="konfirmasiHapusCabang('{{ route('cabangs.destroy', $cabang->No_Cabang) }}')">
                                            <i class="ti-trash" style="font-size: 14px;"></i>
                                            <!-- Ikon Themify untuk "Hapus" -->
                                        </a>
                                    </form>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Modal Tambah Cabang -->
            <div class="modal fade" id="tambahCabangModal" tabindex="-1" role="dialog"
                aria-labelledby="tambahCabangModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahCabangModalLabel">Tambah Data Cabang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="tambahCabangForm" action="{{ route('cabangs.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="No_Cabang">No Cabang</label>
                                    <input type="text" name="No_Cabang" class="form-control" id="No_Cabang" required>
                                </div>
                                <div class="form-group">
                                    <label for="Nama_Cabang">Nama Cabang</label>
                                    <input type="text" name="Nama_Cabang" class="form-control" id="Nama_Cabang" required>
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

            <!-- Modal Lihat Cabang -->
            <div class="modal fade" id="lihatCabangModal" tabindex="-1" role="dialog"
                aria-labelledby="lihatCabangModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="lihatCabangModalLabel">Lihat Data Cabang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="lihatNo_Cabang">No Cabang</label>
                                <input type="text" class="form-control" id="lihatNo_Cabang" readonly>
                            </div>
                            <div class="form-group">
                                <label for="lihatNama_Cabang">Nama Cabang</label>
                                <input type="text" class="form-control" id="lihatNama_Cabang" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Cabang -->
            <div class="modal fade" id="editCabangModal" tabindex="-1" role="dialog"
                aria-labelledby="editCabangModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editCabangModalLabel">Edit Data Cabang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editCabangForm" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="editNo_Cabang">No Cabang</label>
                                    <input type="text" name="No_Cabang" class="form-control" id="editNo_Cabang"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="editNama_Cabang">Nama Cabang</label>
                                    <input type="text" name="Nama_Cabang" class="form-control" id="editNama_Cabang"
                                        required>
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

            <!-- Modal Konfirmasi Hapus Cabang -->
            <div class="modal fade" id="hapusCabangModal" tabindex="-1" role="dialog"
                aria-labelledby="hapusCabangModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusCabangModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus cabang ini?</p>
                        </div>
                        <div class="modal-footer">
                            <form id="hapusCabangForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- JavaScript untuk Mengelola Modal Cabang -->
            <script>
                // Fungsi untuk menampilkan modal lihat cabang
                function lihatCabang(no_cabang, nama_cabang) {
                    $('#lihatNo_Cabang').val(no_cabang);
                    $('#lihatNama_Cabang').val(nama_cabang);
                    $('#lihatCabangModal').modal('show');
                }

                // Fungsi untuk menampilkan modal edit cabang
                function editCabang(no_cabang, nama_cabang, updateUrl) {
                    $('#editNo_Cabang').val(no_cabang);
                    $('#editNama_Cabang').val(nama_cabang);
                    $('#editCabangForm').attr('action', updateUrl);
                    $('#editCabangModal').modal('show');
                }

                // Fungsi untuk menampilkan modal konfirmasi hapus cabang
                function konfirmasiHapusCabang(deleteUrl) {
                    $('#hapusCabangForm').attr('action', deleteUrl);
                    $('#hapusCabangModal').modal('show');
                }
            </script>
        @endsection
