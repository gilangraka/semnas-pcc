@extends('layouts.layout')

@section('title')
    Scan QR Code
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-4 mb-3">
            <div class="p-5 profile-card bg-white border rounded-3 text-center">
            </div>
        </div>

        <div class="col-12 col-md-8">
            <div class="p-5 profile-card bg-white border rounded-3">
                <table id="qrcode_table" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Peserta</th>
                            <th class="text-center">Waktu Scan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td class="text-center">{{ $item->ref_peserta->user->name }}</td>
                                <td class="text-center">{{ $item->updated_at->format('d/m/Y, H.i.s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        let table = $('#qrcode_table').DataTable({
            columnDefs: [{
                className: 'text-center',
                targets: [0, 1, 2]
            }]
        });;

        function scan(id_qr) {
            fetch(`{{ url('scan-qr') }}/${id_qr}`)
                .then(response => {
                    if (!response.ok) {
                        console.error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data.data);

                    table.clear().draw();
                    data.data.forEach((item, index) => {
                        const date = new Date(item.updated_at);
                        const formattedDate = date.toLocaleString();

                        table.row.add([
                            index + 1,
                            item.ref_peserta.user.name,
                            formattedDate
                        ]).draw();
                    });
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }
    </script>
@endpush
