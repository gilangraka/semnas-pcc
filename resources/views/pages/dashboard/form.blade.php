<form id="profile_form"
    action="{{ $data->ref_peserta->foto_profil == null ? route('profile.update') : route('profile.delete') }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <label for="foto_profil" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
        <div class="col-md-8 col-lg-9">
            @if ($data->ref_peserta->foto_profil == null)
                <button type="button" class="btn btn-primary d-flex gap-2"
                    onclick="document.getElementById('foto_profil').click();"><i
                        class="nav-icon bi bi-upload"></i><span>Upload
                        Foto</span></button>
                <input type="file" accept=".jpeg, .jpg, .png" id="foto_profil" name="foto_profil"
                    style="display: none;" onchange="document.getElementById('profile_form').submit();" />
            @else
                <button class="btn btn-danger d-flex gap-2"><i class="nav-icon bi bi-trash"></i><span>Hapus
                        Foto</span></button>
            @endif
        </div>
    </div>
</form>

<form action="{{ route('dashboard.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
        <div class="col-md-8 col-lg-9">
            <input name="email" type="email" class="form-control" value="{{ $data->email }}" disabled>
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
        <div class="col-md-8 col-lg-9">
            <input name="name" type="text" class="form-control" value="{{ $data->name }}" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="nomor_hp" class="col-md-4 col-lg-3 col-form-label">Nomor WA</label>
        <div class="col-md-8 col-lg-9">
            <input name="nomor_hp" type="text" class="form-control" value="{{ $data->ref_peserta->nomor_hp }}"
                required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="instansi" class="col-md-4 col-lg-3 col-form-label">Asal Instansi</label>
        <div class="col-md-8 col-lg-9">
            <input name="instansi" type="text" class="form-control" value="{{ $data->ref_peserta->instansi }}"
                required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="profesi" class="col-md-4 col-lg-3 col-form-label">Profesi</label>
        <div class="col-md-8 col-lg-9">
            <input name="profesi" type="text" class="form-control" value="{{ $data->ref_peserta->profesi }}"
                required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="link_facebook" class="col-md-4 col-lg-3 col-form-label">Facebook</label>
        <div class="col-md-8 col-lg-9">
            <input name="link_facebook" type="url" class="form-control" placeholder="https://facebook.com/nama_akun"
                value="{{ $data->ref_peserta->link_facebook }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="link_instagram" class="col-md-4 col-lg-3 col-form-label">Instagram</label>
        <div class="col-md-8 col-lg-9">
            <input name="link_instagram" type="url" class="form-control"
                placeholder="https://instagram.com/nama_akun" value="{{ $data->ref_peserta->link_instagram }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="link_twitter" class="col-md-4 col-lg-3 col-form-label">Twitter (X)</label>
        <div class="col-md-8 col-lg-9">
            <input name="link_twitter" type="url" class="form-control" placeholder="https://x.com/nama_akun"
                value="{{ $data->ref_peserta->link_twitter }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="link_tiktok" class="col-md-4 col-lg-3 col-form-label">Tiktok</label>
        <div class="col-md-8 col-lg-9">
            <input name="link_tiktok" type="url" class="form-control" placeholder="https://tiktok.com/nama_akun"
                value="{{ $data->ref_peserta->link_tiktok }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12"><button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
    </div>
</form>
