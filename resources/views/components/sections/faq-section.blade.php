<section id="faq" class="relative">
    <div class="text-center my-4 text-slate-800" data-aos="fade-down" data-aos-duration="1000">
        <h2
            class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-co-pink via-semnas-pink to-semnas-light-pink text-transparent bg-clip-text drop-shadow-2xl transform hover:scale-105 transition-transform duration-300 ease-in-out">
            Frequently Asked Question
        </h2>
        <p class="font-semibold text-lg text-co-pink mt-3 mb-12">
            Yang sering ditanyakan terkait Seminar Nasional Techomfest.
        </p>
    </div>

    <ul class="px-2 md:px-24 py-6" data-aos="fade-up" data-aos-duration="1000">
        @foreach ($faqItems as $item)
            <li>
                <details class="p-2 bg-slate-100 my-3 hover:cursor-pointer rounded-md">
                    <summary class="p-2 text-co-pink font-semibold">
                        {{ $item->question }}
                    </summary>
                    <p class="p-2 text-slate-700">
                        {{ $item->answer }}
                    </p>
                </details>
            </li>
        @endforeach
    </ul>
</section>
