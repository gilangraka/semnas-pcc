@extends('layouts.layout')

@section('title')
    Peserta
@endsection

@section('content')
    <table id="peserta_table" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">No WA</th>
                <th class="text-center">Email</th>
                <th class="text-center">Instansi</th>
                <th class="text-center">Profesi</th>
                <th class="text-center">Keterangan QRCode</th>
                @can('Reset Password')
                    <th class="text-center">Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td class="text-center">{{ $item->name }}</td>
                    <td class="text-center">{{ $item->ref_peserta->nomor_hp }}</td>
                    <td class="text-center">{{ $item->email }}</td>
                    <td class="text-center">{{ $item->ref_peserta->instansi }}</td>
                    <td class="text-center">{{ $item->ref_peserta->profesi }}</td>
                    <td class="text-center">
                        @if (!$item->ref_peserta->ref_qrcode)
                            <span class="text-danger">Belum Memiliki QRCode</span>
                        @else
                            <span class="{{ $item->ref_peserta->ref_qrcode->ref_status->css }}">
                                {{ $item->ref_peserta->ref_qrcode->ref_status->nama_status }}
                            </span>
                        @endif

                    </td>
                    @can('Reset Password')
                        <td class="text-center">
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
