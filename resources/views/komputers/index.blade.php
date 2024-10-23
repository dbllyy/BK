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
       onclick="lihatDetailKomputerModal('{{ $komputer->cabang->Nama_Cabang }}', '{{ $komputer->perangkat }}', '{{ $komputer->merk }}', '{{ $komputer->jumlah }}', '{{ $komputer->kondisi }}', '{{ $komputer->keterangan }}', '{{ $komputer->diterima }}')">
       <i class="ti-eye" style="font-size: 14px;"></i> <!-- Ikon Themify untuk "Lihat" -->
    </a>
    <a href="{{ route('komputers.edit', $komputer->id) }}" class="btn btn-warning btn-sm p-1" title="Edit">
        <i class="ti-pencil" style="font-size: 14px;"></i> <!-- Ikon Themify untuk "Edit" -->
    </a>
    <form action="{{ route('komputers.destroy', $komputer->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm p-1" title="Hapus">
            <i class="ti-trash" style="font-size: 14px;"></i> <!-- Ikon Themify untuk "Hapus" -->
        </button>
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
<div class="modal fade" id="lihatDetailKomputerModal" tabindex="-1" aria-labelledby="lihatDetailKomputerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lihatDetailKomputerLabel">Detail Komputer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Cabang:</strong> <span id="detailCabang"></span></p>
                <p><strong>Perangkat:</strong> <span id="detailPerangkat"></span></p>
                <p><strong>Merk:</strong> <span id="detailMerk"></span></p>
                <p><strong>Jumlah:</strong> <span id="detailJumlah"></span></p>
                <p><strong>Kondisi:</strong> <span id="detailKondisi"></span></p>
                <p><strong>Keterangan:</strong> <span id="detailKeterangan"></span></p>
                <p><strong>Di Terima:</strong> <span id="detailDiterima"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


    </div>

   <script>
    // Fungsi untuk menampilkan modal lihat komputer
    function lihatDetailKomputerModal(cabang, perangkat, merk, jumlah, kondisi, keterangan, diterima) {
        $('#lihatCabang').text(cabang);
        $('#lihatPerangkat').text(perangkat);
        $('#lihatMerk').text(merk);
        $('#lihatJumlah').text(jumlah);
        $('#lihatKondisi').text(kondisi);
        $('#lihatKeterangan').text(keterangan);
        $('#lihatDiterima').text(diterima);
        $('#lihatDetailKomputerModal').modal('show');
    }

    // Fungsi untuk menampilkan modal edit komputer
    function editKomputer(cabang, perangkat, merk, jumlah, kondisi, keterangan, updateUrl) {
        $('#editCabang').val(cabang);
        $('#editPerangkat').val(perangkat);
        $('#editMerk').val(merk);
        $('#editJumlah').val(jumlah);
        $('#editKondisi').val(kondisi);
        $('#editKeterangan').val(keterangan);
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
