<section
    class="h-screen my-auto grid place-content-center bg-gradient-to-r  from-semnas-pink via-semnas-blue to-semnas-light-blue px-4 md:px-24"
    data-aos="fade-down"
    data-aos-duration="1000"
>
    <div class="flex flex-col-reverse md:flex-row gap-4 items-center">
        <div
            class="xl:w-1/2 text-white drop-shadow-lg"
        >
            <h2 class="text-6xl md:text-8xl xl:text-9xl font-medium">Seminar Nasional</h2>
            <div class="flex flex-col md:flex-row md:items-center">
                <h2 class="text-6xl font-medium">2025</h2>
                <p class="">
                    Elevate Your LinkedIn Presence <br />with Powerful Personal
                    Branding Strategies
                </p>
            </div>
            <div class="flex gap-4 mt-4">
                @auth
                <x-partials.button-link
                    href="{{ route('dashboard.index') }}"
                    class="bg-gradient-to-r from-semnas-dark-pink via-semnas-pink to-semnas-light-pink text-white"
                >
                    Daftar Sekarang
                </x-partials.button-link>
                @endauth @guest
                <x-partials.button-link
                    href="{{ route('login') }}"
                    class="bg-gradient-to-r from-semnas-dark-pink via-semnas-pink to-semnas-light-pink text-white"
                >
                    Daftar Sekarang
                </x-partials.button-link>
                @endguest
            </div>
        </div>
        <div class="drop-shadow-lg mx-auto">
            <img
                src="{{ asset('img/logo semnas.png') }}"
                alt="Logo Semnas"
                class="w-[250px] md:w-full"
            />
        </div>
    </div>
</section>