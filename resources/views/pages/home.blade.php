@extends('layouts.app') @section('title', 'Seminar Nasional 2025')
@section('content')
<section class="h-screen my-auto grid place-content-center p-4">
    <div class="flex flex-col-reverse md:flex-row gap-4 items-center">
        <div
            class="bg-clip-text text-transparent bg-gradient-to-r from-sem-dark-blue to-sem-light-blue drop-shadow-lg"
        >
            <h2 class="text-6xl md:text-8xl font-medium">Seminar Nasional</h2>
            <div class="flex flex-col md:flex-row md:items-center">
                <h2 class="text-6xl font-medium">2025</h2>
                <p class="">
                    Elevate Your LinkedIn Presence <br />with Powerful Personal
                    Branding Strategies
                </p>
            </div>
            <div class="flex gap-4 mt-4">
                <x-partials.button-link
                    href="#"
                    class="bg-gradient-to-r from-sem-dark-blue to-sem-light-blue text-white"
                >
                    Daftar Sekarang
                </x-partials.button-link>
            </div>
        </div>
        <div class="drop-shadow-lg">
            <img
                src="{{ asset('img/logo-semnas.png') }}"
                alt="Logo Semnas"
                class="w-[250px] md:w-full"
            />
        </div>
    </div>
</section>
<section class="p-4" id="about">
    <h3
        class="text-4xl font-semibold text-center mb-4 bg-clip-text text-transparent bg-gradient-to-r from-sem-dark-blue to-sem-light-blue"
    >
        ABOUT SEMNAS
    </h3>
    <div class="flex flex-col md:flex-row gap-4 justify-between items-center">
        <img
            src="{{ asset('img/about.png') }}"
            alt="Logo Semnas"
            class="w-full md:w-[550px] md:drop-shadow-2xl"
        />
        <article class="prose text-base">
            <p>
                Seminar Nasional ini merupakan acara yang dilakukan sekali
                setiap tahun oleh Polytechnic Computer Club Politeknik Negeri
                Semarang atau biasa disebut PCC POLINES yang merupakan bagian
                dari acara Techcomfest 2025.
            </p>
            <p>
                Tema untuk Seminar Nasional pada tahun 2025 ini adalah
                <span class="italic font-medium">
                    Elevate Your LinkedIn Presence with Powerful Personal
                    Branding Strategies
                </span>
                , yang berisi tentang strategi branding personal yang kuat
                dengan LinkedIn.
            </p>
            <p>
                Seminar Nasional ini dilaksanakan secara hybrid dengan materi
                yang akan disampaikan adalah pengetahuan tentang LinkedIn dan
                harapannya, setelah materi yang disampaikan dalam Seminar
                Nasional ini seluruh peserta dapat memperoleh wawasan serta
                pengalaman baru dalam membuat personal branding yang kuat
                terutama pada platform LinkedIn.
            </p>
        </article>
    </div>
</section>
<section class="p-4" id="fillers">
    <div class="flex justify-between items-center">
        
    </div>
</section>
@endsection
