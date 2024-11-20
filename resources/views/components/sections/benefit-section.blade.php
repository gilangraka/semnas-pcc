<section id="benefit" class="relative px-4">
    <div class="text-center my-4 text-slate-800" data-aos="fade-down" data-aos-duration="1000">
        <h2
            class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-co-pink via-semnas-pink to-semnas-light-pink text-transparent bg-clip-text drop-shadow-2xl transform hover:scale-105 transition-transform duration-300 ease-in-out">
            Benefit
        </h2>
        <p class="font-semibold text-lg text-co-pink-blue mt-3 mb-12">
            Benefit apa saja sih yang akan kalian dapatkan?
        </p>
    </div>
    <ul class="flex flex-wrap justify-center gap-12 px-12 py-6 md:px-4" data-aos="fade-up" data-aos-duration="1000">
        @foreach ($benefitItems as $item)
            <li class="relative w-full sm:w-1/2 md:w-1/4">
                <div
                    class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center transition-all duration-300 ease-in-out transform hover:scale-105">
                    <img src="{{ asset('img/' . $item->imgUrl) }}" alt="{{ $item->title }}" class="max-w-[150px]" />
                    <p class="text-co-pink font-semibold text-xl text-center">{{ $item->title }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</section>
