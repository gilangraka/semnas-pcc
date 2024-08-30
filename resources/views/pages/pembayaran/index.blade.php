@extends('layouts.layout')

@section('title')
    Pembayaran
@endsection

@section('content')
    <div class="alert alert-warning" role="alert">
        Jangan tinggalkan halaman ini sampai anda mendapatkan notifikasi bahwa pembayaran berhasil dilakukan!
    </div>

    <div class="d-flex justify-content-center">
        <div class="p-5 profile-card bg-white border rounded-3 text-center d-flex flex-column gap-2">
            <span>ANDA AKAN MELAKUKAN PEMBAYARAN</span>
            <span><b>TIKET SEMNAS 2025</b></span>
            <span>DENGAN HARGA</span>
            <span><b>Rp. 35.000</b></span>
            <button class="btn btn-primary w-100 mt-4" id="pay-button">Lakukan Pembayaran</button>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('{{ $data->snap_token }}', {
                // Optional
                onSuccess: function(result) {
                    window.location.href = '{{ route('pembayaran.sukses', $data->id) }}';
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
@endpush
