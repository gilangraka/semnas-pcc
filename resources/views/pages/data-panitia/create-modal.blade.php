<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('manage-panitia.store') }}" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Panitia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <br> <span class="text-secondary">(default :
                                semnastechcompfest2025)</span></label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="semnastechcompfest2025">
                    </div>
                    <div class="mb-3">
                        <label for="nomor_hp" class="form-label">Nomor WA</label>
                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp">
                    </div>
                    <div class="mb-3">
                        <label for="instansi" class="form-label">Instansi</label>
                        <input type="text" class="form-control" id="instansi" name="instansi"
                            value="Politeknik Negeri Semarang">
                    </div>
                    <div class="mb-3">
                        <label for="profesi" class="form-label">Profesi</label>
                        <input type="text" class="form-control" id="profesi" name="profesi" value="Mahasiswa">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-grad w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
