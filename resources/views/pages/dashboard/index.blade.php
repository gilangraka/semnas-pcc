@extends('layouts.layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-4 mb-3">
            <div class="p-5 profile-card bg-white border rounded-3 text-center">
                <div class="d-flex justify-content-center mb-4">
                    <div class="border rounded-circle"
                        style="height: 100px; width: 100px; background-image: url('{{ asset('storage/foto_profil/' . $data->ref_peserta->foto_profil) }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100px; width: 100px;">
                    </div>
                </div>

                <h5><b>{{ $data->name }}</b></h5>
                <h6>{{ $data->ref_peserta->instansi }}</h6>
                <div class="d-flex gap-3 justify-content-center">
                    @if (!empty($data->ref_peserta->link_facebook))
                        <a href="{{ $data->ref_peserta->link_facebook }}" target="_blank" class="facebook"><i
                                class="bi bi-facebook"></i></a>
                    @endif
                    @if (!empty($data->ref_peserta->link_instagram))
                        <a href="{{ $data->ref_peserta->link_instagram }}" target="_blank" class="instagram"><i
                                class="bi bi-instagram"></i></a>
                    @endif
                    @if (!empty($data->ref_peserta->link_twitter))
                        <a href="{{ $data->ref_peserta->link_twitter }}" target="_blank" class="twitter"><i
                                class="bi bi-twitter-x"></i></a>
                    @endif
                    @if (!empty($data->ref_peserta->link_twitter))
                        <a href="{{ $data->ref_peserta->link_twitter }}" target="_blank" class="tiktok"><i
                                class="bi bi-tiktok"></i></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="p-2 profile-card bg-white border rounded-3">
                <ul class="nav nav-tabs nav-tabs-bordered">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab"
                            data-bs-target="#profile-overview">Overview</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profil</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ubah-password">Ubah Password</button>
                    </li>
                </ul>
                <div class="tab-content pt-2 p-4">
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        @include('pages.dashboard.overview')
                    </div>

                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                        @include('pages.dashboard.form')
                    </div>

                    <div class="tab-pane fade profile-edit pt-3" id="ubah-password">
                        @include('pages.dashboard.ubah-password')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
