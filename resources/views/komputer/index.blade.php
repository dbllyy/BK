@extends('layouts.app')

@section('content')
      <!-- table -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Data Komputer</h3>
                        </div>
                    </div>
                </div>
            </div>

        <button type="button" class="btn btn-primary btn-custom mb-1" data-toggle="modal" data-target="#tambahBankSoalModal">
            <i class="fa fa-plus"></i> Tambah Data Komputer
        </button>
        <button class="btn btn-outline-primary btn-custom mb-1" type="button" onClick="window.location.reload()">
            <i class="fa fa-refresh"></i> Refresh
        </button>


        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cabang</th>
                        <th scope="col">Komputer</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Di Terima</th>
                        <th style="width: 123px;" scope="col">Aksi</th>
                    </tr>
                </thead>
                @foreach ($komputers as $komputer)
                    <tr>
                        <td>{{ $komputer->id }}</td>
                        <td>{{ $komputer->cabang_id }}</td>
                        <td>{{ $komputer->jumlah }}</td>
                        <td>{{ $komputer->kondisi }}</td>
                        <td>{{ $komputer->keterangan }}</td>
                        <td>
                            <a href="{{ route('komputers.show', $komputer->id) }}">Lihat</a>
                            <a href="{{ route('komputers.edit', $komputer->id) }}">Edit</a>
                            <form action="{{ route('komputers.destroy', $komputer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
 </div>
@endsection
   

