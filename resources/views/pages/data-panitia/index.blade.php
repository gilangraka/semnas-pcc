@extends('layouts.layout')

@section('title')
    Panitia
@endsection

@section('content')
    @can('Tambah Panitia')
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Panitia</button>
    @endcan
    <table id="panitia_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No WA</th>
                <th>Instansi</th>
                <th>Profesi</th>
                @can('Reset Password')
                    <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->ref_peserta->nomor_hp }}</td>
                    <td>{{ $item->ref_peserta->instansi }}</td>
                    <td>{{ $item->ref_peserta->profesi }}</td>
                    @can('Reset Password')
                        <td>
                            <button class="btn btn-warning d-flex gap-2" data-bs-toggle="modal" data-bs-target="#resetModal"
                                onclick="open_resetModal({{ $item->id }})"><span>Reset Password</span>
                            </button>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('pages.data-peserta.reset-modal')
    @include('pages.data-panitia.create-modal')
@endsection

@push('js')
    <script>
        new DataTable('#panitia_table');
    </script>
@endpush
