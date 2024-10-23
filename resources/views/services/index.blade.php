@extends('layouts.app')

@section('content')
      <!-- table -->
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Data Service</h3>
                        </div>
                    </div>
                </div>
            </div>

        <button type="button" class="btn btn-primary btn-custom mb-1" data-toggle="modal" data-target="#tambahBankSoalModal">
            <i class="fa fa-plus"></i> Tambah Data Service
        </button>
        <button class="btn btn-outline-primary btn-custom mb-1" type="button" onClick="window.location.reload()">
            <i class="fa fa-refresh"></i> Refresh
        </button>


        <div class="table-responsive">
    <table class="table table-hover table-bordered" id="sampleTable">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Staff</th>
                <th scope="col">Komputer</th>
                <th scope="col">Cabang</th>
                <th scope="col">Service</th>
                <th scope="col">Status</th>
                <th style="width: 123px;" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->staff }}</td>
                <td>{{ $service->komputer }}</td>
                <td>{{ $service->cabang }}</td>
                <td>{{ $service->merek }}</td>
                <td>{{ $service->service }}</td>
                <td>{{ $service->status }}</td>
                <td>{{ $service->di_kerjakan }}</td>
                <td>
                    <a href="{{ route('services.show', $service->id) }}">Lihat</a>
                    <a href="{{ route('services.edit', $service->id) }}">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
                @endforeach

                </tbody>
            </table>
        </div>
@endsection

