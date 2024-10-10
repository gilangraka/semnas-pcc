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
                <th class="text-center">No</th>
                <th class="text-center">Email</th>
                <th class="text-center">Nama</th>
                <th class="text-center">No WA</th>
                <th class="text-center">Instansi</th>
                <th class="text-center">Profesi</th>
                @can('Reset Password')
                    <th class="text-center">Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td class="text-center">{{ $item->email }}</td>
                    <td class="text-center">{{ $item->name }}</td>
                    <td class="text-center">{{ $item->ref_peserta->nomor_hp }}</td>
                    <td class="text-center">{{ $item->ref_peserta->instansi }}</td>
                    <td class="text-center">{{ $item->ref_peserta->profesi }}</td>
                    @can('Reset Password')
                        <td class="text-center">
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#resetModal"
                                onclick="open_resetModal({{ $item->id }})"><span>Reset
                                    Password</span>
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
