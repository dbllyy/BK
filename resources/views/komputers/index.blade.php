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
                            <h3 class="font-weight-bold">Data Perangkat</h3>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-primary btn-custom mb-1" data-toggle="modal"
                data-target="#tambahBankSoalModal">
                <i class="fa fa-plus"></i> Tambah Data Perangkat
            </button>
            <button class="btn btn-outline-primary btn-custom mb-1" type="button" onClick="window.location.reload()">
                <i class="fa fa-refresh"></i> Refresh
            </button>

            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cabang</th>
                        <th>Perangkat</th>
                        <th>Merk</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Keterangan</th>
                        <th>Di Terima</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($komputers as $komputer)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $komputer->cabang->Nama_Cabang }}</td>
                            <td>{{ $komputer->perangkat }}</td>
                            <td>{{ $komputer->merk }}</td>
                            <td>{{ $komputer->jumlah }}</td>
                            <td>{{ $komputer->kondisi }}</td>
                            <td>{{ $komputer->keterangan }}</td>
                            <td>{{ $komputer->diterima }}</td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-info btn-sm p-1" title="Lihat"
                                    onclick="lihatDetailKomputerModal(
                                        '{{ $komputer->cabang->Nama_Cabang }}', 
                                        '{{ $komputer->perangkat }}', 
                                        '{{ $komputer->merk }}', 
                                        '{{ $komputer->jumlah }}', 
                                        '{{ $komputer->kondisi }}', 
                                        '{{ $komputer->keterangan ?? 'Tidak ada' }}', 
                                        '{{ $komputer->diterima }}'
                                    )">
                                    <i class="ti-eye" style="font-size: 14px;"></i> <!-- Ikon Themify untuk "Lihat" -->
                                </a>

                                <a href="javascript:void(0)" class="btn btn-warning btn-sm p-1" title="Edit"
                                    onclick="editKomputer(
                                    '{{ $komputer->cabang_id }}', 
                                    '{{ $komputer->perangkat }}', 
                                    '{{ $komputer->merk }}', 
                                    '{{ $komputer->jumlah }}', 
                                    '{{ $komputer->kondisi }}', 
                                    '{{ $komputer->keterangan ?? 'Tidak ada' }}', 
                                    '{{ route('komputers.update', $komputer->id) }}'
                                )">
                                    <i class="ti-pencil" style="font-size: 14px;"></i>
                                    <!-- Ikon Themify untuk "Edit" -->
                                </a>

                                <form action="javascript:void(0);" method="POST" style="display:inline;"
                                    id="form-hapus-{{ $komputer->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm p-1" title="Hapus"
                                        onclick="konfirmasiHapusKomputer('{{ route('komputers.destroy', $komputer->id) }}')">
                                        <i class="ti-trash" style="font-size: 14px;"></i>
                                        <!-- Ikon Themify untuk "Hapus" -->
                                    </a>
                                </form>
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Tambah Data Perangkat -->
        <div class="modal fade" id="tambahBankSoalModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Perangkat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form untuk menambahkan data perangkat -->
                        <form action="{{ route('komputers.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="cabang_id">Cabang</label>
                                <select class="form-control" id="cabang_id" name="cabang_id" required>
                                    <option value="" disabled selected>Pilih Cabang</option>
                                    @foreach ($cabangs as $cabang)
                                        <option value="{{ $cabang->No_Cabang }}">{{ $cabang->Nama_Cabang }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="perangkat">Perangkat</label>
                                <select class="form-control" id="perangkat" name="perangkat" required>
                                    <option value="" disabled selected>Pilih Perangkat</option>
                                    <option value="PC">PC</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="Printer">Printer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="merk">Merk</label>
                                <input type="text" class="form-control" id="merk" name="merk"
                                    placeholder="Masukkan merk perangkat" required>
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                    placeholder="Masukkan jumlah perangkat" required>
                            </div>

                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <select class="form-control" id="kondisi" name="kondisi" required>
                                    <option value="" disabled selected>Pilih Kondisi</option>
                                    <option value="baru">Baru</option>
                                    <option value="baru rakitan">Baru Rakitan</option>
                                    <option value="second">Second</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"
                                    placeholder="Masukkan keterangan (opsional)"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Lihat Data Perangkat -->
        <div class="modal fade" id="lihatPerangkatModal" tabindex="-1" aria-labelledby="lihatPerangkatModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatPerangkatModalLabel">Detail Data Perangkat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Display device details in a read-only format -->
                        <div class="form-group">
                            <label for="lihatCabang">Cabang</label>
                            <input type="text" class="form-control" id="lihatCabang" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lihatPerangkat">Perangkat</label>
                            <input type="text" class="form-control" id="lihatPerangkat" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lihatMerk">Merk</label>
                            <input type="text" class="form-control" id="lihatMerk" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lihatJumlah">Jumlah</label>
                            <input type="text" class="form-control" id="lihatJumlah" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lihatKondisi">Kondisi</label>
                            <input type="text" class="form-control" id="lihatKondisi" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lihatKeterangan">Keterangan</label>
                            <textarea class="form-control" id="lihatKeterangan" rows="3" readonly></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lihatDiterima">Diterima</label>
                            <input type="text" class="form-control" id="lihatDiterima" readonly>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Komputer -->
        <div class="modal fade" id="editKomputerModal" tabindex="-1" aria-labelledby="editKomputerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKomputerModalLabel">Edit Data Perangkat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for editing a device -->
                        <form id="editKomputerForm" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="editCabang">Cabang</label>
                                <select class="form-control" id="editCabang" name="cabang_id" required>
                                    <option value="" disabled selected>Pilih Cabang</option>
                                    @foreach ($cabangs as $cabang)
                                        <option value="{{ $cabang->No_Cabang }}">{{ $cabang->Nama_Cabang }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="editPerangkat">Perangkat</label>
                                <select class="form-control" id="editPerangkat" name="perangkat" required>
                                    <option value="" disabled selected>Pilih Perangkat</option>
                                    <option value="PC">PC</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="Printer">Printer</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="editMerk">Merk</label>
                                <input type="text" class="form-control" id="editMerk" name="merk"
                                    placeholder="Masukkan merk perangkat" required>
                            </div>

                            <div class="form-group">
                                <label for="editJumlah">Jumlah</label>
                                <input type="number" class="form-control" id="editJumlah" name="jumlah"
                                    placeholder="Masukkan jumlah perangkat" required>
                            </div>

                            <div class="form-group">
                                <label for="editKondisi">Kondisi</label>
                                <select class="form-control" id="editKondisi" name="kondisi" required>
                                    <option value="" disabled selected>Pilih Kondisi</option>
                                    <option value="baru">Baru</option>
                                    <option value="baru rakitan">Baru Rakitan</option>
                                    <option value="second">Second</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="editKeterangan">Keterangan</label>
                                <textarea class="form-control" id="editKeterangan" name="keterangan" rows="3"
                                    placeholder="Masukkan keterangan (opsional)"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Hapus Komputer -->
        <div class="modal fade" id="hapusKomputerModal" tabindex="-1" role="dialog"
            aria-labelledby="hapusKomputerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusKomputerModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus data perangkat ini?</p>
                    </div>
                    <div class="modal-footer">
                        <form id="hapusKomputerForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        // Fungsi untuk menampilkan modal lihat komputer
        function lihatDetailKomputerModal(cabang, perangkat, merk, jumlah, kondisi, keterangan, diterima) {
            $('#lihatCabang').val(cabang);
            $('#lihatPerangkat').val(perangkat);
            $('#lihatMerk').val(merk);
            $('#lihatJumlah').val(jumlah);
            $('#lihatKondisi').val(kondisi);
            $('#lihatKeterangan').val(keterangan || 'Tidak ada');
            $('#lihatDiterima').val(diterima);
            $('#lihatPerangkatModal').modal('show');
        }

        // Fungsi untuk menampilkan modal edit komputer
        function editKomputer(No_Cabang, perangkat, merk, jumlah, kondisi, keterangan, updateUrl) {
            // Set the dropdown to the selected cabang
            $('#editCabang').val(No_Cabang);
            $('#editPerangkat').val(perangkat).change(); // Use .change() to trigger any event listeners
            $('#editMerk').val(merk);
            $('#editJumlah').val(jumlah);
            $('#editKondisi').val(kondisi);
            $('#editKeterangan').val(keterangan || 'Tidak ada');
            $('#editKomputerForm').attr('action', updateUrl);
            $('#editKomputerModal').modal('show');
        }



        // Fungsi untuk menampilkan modal konfirmasi hapus
        function konfirmasiHapusKomputer(deleteUrl) {
            $('#hapusKomputerForm').attr('action', deleteUrl);
            $('#hapusKomputerModal').modal('show');
        }
    </script>
@endsection
