<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Nama Lengkap</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->name }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Email</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->email }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Nomor WA</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->ref_peserta->nomor_hp }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Asal Instansi</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->ref_peserta->instansi }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Profesi</b></p>
    <p class="col-lg-9 col-md-8">{{ $data->ref_peserta->profesi }}</p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Login Sebagai</b></p>
    <p class="col-lg-9 col-md-8">
        @foreach ($role as $index => $item)
            {{ $item }}@if (!$loop->last)
                ,
            @endif
        @endforeach
    </p>
</div>

<div class="row mt-3">
    <p class="col-lg-3 col-md-4 label "><b>Status Pembayaran</b></p>
    <p class="col-lg-9 col-md-8">
        @if (!$data->ref_peserta->ref_qrcode)
            <span class="text-danger">Belum Dibayar</span>
        @else
            <span class="text-success">Sudah Dibayar</span>
        @endif
    </p>
</div>
<div class="row mt-3">
    <div class="col-lg-3 col-md-4 label ">
        <p><b>Bukti Pembayaran</b></p>
    </div>
    <div class="col-lg-9 col-md-8">
        @if (!$data->ref_peserta->ref_qrcode)
            <form action="{{ route('pembayaran.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-grad d-flex gap-3 align-items-center">Bayar Sekarang</button>
            </form>
        @else
            <img src="{{ asset('storage/qr_code') . '/' . $data->ref_peserta->ref_qrcode->file_qrcode }}"
                width="150" />
        @endif
    </div>
</div>
