@extends('layouts.auth.layout')

@section('title')
    Register
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <script>
                        notyf.error("ads132");
                    </script>
                    <div class="card-header text-center">
                        <h4>Register</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" required />
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required />
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required />
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required />
                            </div>
                            <div class="form-group">
                                <label for="nomor_hp">Nomor HP</label>
                                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required />
                            </div>
                            <div class="form-group">
                                <label for="instansi">Instansi</label>
                                <input type="text" class="form-control" id="instansi" name="instansi" required />
                            </div>
                            <div class="form-group">
                                <label for="profesi">Profesi</label>
                                <input type="text" class="form-control" id="profesi" name="profesi" required />
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-2">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
