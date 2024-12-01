<section id="speakers" class="relative px-4">
    <div
        class="text-center my-4 text-slate-800"
        data-aos="fade-down"
        data-aos-duration="1000"
    >
        <h2
            class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-co-pink via-semnas-pink to-semnas-light-pink text-transparent bg-clip-text drop-shadow-2xl transform hover:scale-105 transition-transform duration-300 ease-in-out"
        >
            Speakers
        </h2>
        <p class="font-semibold text-lg text-co-pink mt-3 mb-12">
            Siapa sih pembicara pada acara semnas kali ini?
        </p>
    </div>
    <ul
        class="flex flex-wrap justify-center gap-12 px-12 py-6 md:px-4"
        data-aos="fade-up"
        data-aos-duration="1000"
    >
        @foreach ($speakerItems as $item)
        <li class="relative w-full sm:w-1/2 md:w-1/4">
            <div
                class="bg-gradient-to-b from-semnas-pink via-semnas-blue to-semnas-light-blue h-[450px] rounded-lg shadow-lg flex flex-col items-center transition-all duration-300 ease-in-out transform hover:scale-105"
            >
                <span
                    class="w-full absolute text-white top-3 left-3 font-semibold text-3xl"
                    >{{ $item->job }}</span
                >
                <img
                    src="{{ asset('img/' . $item->imgUrl) }}"
                    alt="{{ $item->name }}"
                    class="w-[1000px] h-full object-cover"
                />
                <p
                    class="absolute text-white bottom-0 font-semibold text-2xl bg-gradient-to-b from-black/5 to-black/50 w-full text-center"
                >
                    {{ $item->name }}
                </p>
            </div>
        </li>
        @endforeach
    </ul>
</section>
