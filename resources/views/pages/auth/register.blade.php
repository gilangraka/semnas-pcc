@extends('layouts.auth') @section('title', 'Seminar Nasional 2025 Register Form')

<div class="mt-8 px-12">
    <x-partials.button-link href="/" class="w-[150px] flex items-center gap-2 bg-slate-100">
        <x-partials.back-svg />
        Kembali
    </x-partials.button-link>
</div>
<div class="px-4 md:px-12 mx-auto">
    <div class="grid md:grid-cols-2 gap-8">
        <div class="grid h-full items-center" id="reg-img">
            <img src="{{ asset('img/logo-semnas.png') }}" alt="Logo Seminar Nasional 2025" class="w-full" />
        </div>
        <div class="items-center my-auto p-8 rounded-md w-full" id="reg-form">
            <div class="text-gray-800">
                <h1 class="font-bold text-3xl">Daftar</h1>
                <p>Daftar menggunakan data Anda yang valid.</p>
            </div>
            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="my-4">
                    <x-partials.form-input label="Nama" name="name" placeholder="Masukkan nama lengkap" />
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Email" name="email" placeholder="Masukkan email" />
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Password" name="password" placeholder="Masukkan password"
                        type="password" />
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Confirm Password" name="password_confirmation"
                        placeholder="Masukkan konfirmasi password" type="password" />
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Nomor HP" name="nomor_hp" placeholder="Masukkan nomor hp"
                        type="text" />
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Instansi" name="instansi" placeholder="Masukkan asal Instansi"/>
                </div>
                <div class="my-4">
                    <x-partials.form-input label="Profesi" name="profesi" placeholder="Masukkan profesi"/>
                </div>
                <button
                    class="w-full mt-4 mb-12 p-2 px-6 bg-gradient-to-r from-sem-dark-blue to-sem-light-blue text-white rounded-md">
                    Daftar
                </button>
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-800 underline">
                        <a href="/login">Sudah punya akun?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push("scripts")
<script>
const isMobile = window.matchMedia("(max-width: 768px)").matches;

const regImg = document.getElementById("reg-img");
const regForm = document.getElementById("reg-form");

if (isMobile) {
  regImg.setAttribute("data-aos", "fade-down"); 
  regImg.setAttribute("data-aos-duration", "800"); 
  regForm.setAttribute("data-aos", "fade-up"); 
  regForm.setAttribute("data-aos-duration", "800"); 
} else {
  regImg.setAttribute("data-aos", "fade-right");
  regImg.setAttribute("data-aos-duration", "1000");
  regForm.setAttribute("data-aos", "fade-left");
  regForm.setAttribute("data-aos-duration", "1000");
}

AOS.init();

</script>
@endpush