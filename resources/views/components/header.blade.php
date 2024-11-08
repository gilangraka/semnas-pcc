<header class="fixed bg-white drop-shadow-sm left-0 right-0 z-20 p-2">
    <nav class="flex justify-between items-center w-[92%] mx-auto">
        <div>
            <img
                class="w-16 cursor-pointer"
                src="{{ asset('img/logo-semnas.png') }}"
                alt="Logo Techomfest"
            />
        </div>
        <div
            class="nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[60vh] left-0 -top-[800px] md:w-auto w-full flex items-center px-5"
        >
            <ul
                class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8"
            >
                @foreach ($navItems as $navItem)
                <x-nav-item :navItem="$navItem" />
                @endforeach
            </ul>
        </div>
        <div class="flex items-center gap-6">
            @auth
            <x-partials.button-link
                href="{{ route('dashboard.index') }}"
                class="bg-gradient-to-r from-co-dark-blue to-co-pink text-white"
            >
                Dashboard
            </x-partials.button-link>
            @endauth 
            @guest
            <x-partials.button-link
                href="{{ route('login') }}"
                class="bg-gradient-to-r from-sem-dark-blue to-sem-light-blue text-white"
            >
                Masuk
            </x-partials.button-link>
            @endguest
            <ion-icon
                onclick="onToggleMenu(this)"
                name="menu"
                class="text-3xl cursor-pointer md:hidden"
            ></ion-icon>
        </div>
    </nav>
</header>

@push('scripts')
<script>
    const navLinks = document.querySelector(".nav-links");
    function onToggleMenu(e) {
        e.name = e.name === "menu" ? "close" : "menu";

        if (navLinks.classList.contains("-top-[800px]")) {
            navLinks.classList.remove("-top-[800px]");
            navLinks.classList.add("top-0");
        } else {
            navLinks.classList.remove("top-0");
            navLinks.classList.add("-top-[800px]");
        }
    }
</script>
@endpush
