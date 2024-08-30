@extends('layouts.layout')

@section('title')
    Peserta
@endsection

@section('content')
    <table id="peserta_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No WA</th>
                <th>Email</th>
                <th>Instansi</th>
                <th>Profesi</th>
                <th>Keterangan QRCode</th>
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
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->ref_peserta->instansi }}</td>
                    <td>{{ $item->ref_peserta->profesi }}</td>
                    <td>
                        @if (!$item->ref_peserta->ref_qrcode)
                            <span class="text-danger">Belum Memiliki QRCode</span>
                        @else
                            <span class="{{ $item->ref_peserta->ref_qrcode->ref_status->css }}">
                                {{ $item->ref_peserta->ref_qrcode->ref_status->nama_status }}
                            </span>
                        @endif

                    </td>
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
@endsection

@push('js')
    <script>
        new DataTable('#peserta_table');
    </script>
@endpush
