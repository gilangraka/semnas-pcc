<header class="fixed bg-transparent text-white drop-shadow-sm left-0 right-0 z-20 p-2" id="header">
    <nav class="flex justify-between items-center w-[92%] mx-auto">
        <div>
            <img
                class="w-16 cursor-pointer"
                src="{{ asset('img/logo semnas.png') }}"
                alt="Logo Techomfest"
            />
        </div>
        <div
            class="nav-links md:static absolute bg-transparent text-white md:min-h-fit min-h-[60vh] left-0 -top-[800px] md:w-auto w-full flex items-center px-5"
            id="nav-links"
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
                class="bg-gradient-to-r from-semnas-dark-pink via-semnas-pink to-semnas-light-pink text-white"
            >
                Dashboard
            </x-partials.button-link>
            @endauth 
            @guest
            <x-partials.button-link
                href="{{ route('login') }}"
                class="bg-gradient-to-r from-semnas-dark-pink via-semnas-pink to-semnas-light-pink text-white"
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

    const header = document.getElementById('header');
    const navlinks = document.getElementById('nav-links');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navlinks.classList.add('bg-white'); 
            navlinks.classList.add('text-black'); 
            navlinks.classList.remove('bg-transparent');
            navlinks.classList.remove('text-white');
            header.classList.remove('bg-transparent');
            header.classList.remove('text-white');
            header.classList.add('bg-white'); 
            header.classList.add('text-black'); 
        } else {
            navlinks.classList.add('bg-transparent');
            navlinks.classList.add('text-white'); 
            navlinks.classList.remove('bg-white');
            navlinks.classList.remove('text-black'); 
            header.classList.remove('bg-white');
            header.classList.remove('text-black'); 
            header.classList.add('bg-transparent');
            header.classList.add('text-white'); 
        }
    });
</script>
@endpush
