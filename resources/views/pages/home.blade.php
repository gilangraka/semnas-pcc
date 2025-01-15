@extends('layouts.app') @section('title', 'Seminar Nasional 2025')
@section('content')
<x-sections.about-section />
<section class="p-4" id="fillers">
    <div class="flex justify-between items-center"></div>
</section>
<x-sections.speaker-section :speakerItems="$speakerItems" />
<x-sections.benefit-section :benefitItems="$benefitItems" />
<section id="sponsor" class="my-12">
    <h2 class="text-3xl md:text-4xl font-bold text-center my-8" data-aos="fade-down" data-aos-duration="1000">Sponsor</h2>
    <div
        class="group relative m-auto w-full overflow-hidden bg-white before:absolute before:left-0 before:top-0 before:z-[2] before:h-full before:w-[100px] before:bg-[linear-gradient(to_right,white_0%,rgba(255,255,255,0)_100%)] before:content-[''] after:absolute after:right-0 after:top-0 after:z-[2] after:h-full after:w-[100px] after:-scale-x-100 after:bg-[linear-gradient(to_right,white_0%,rgba(255,255,255,0)_100%)] after:content-['']"
        data-aos="fade-up"
        data-aos-duration="1000"
    >
        <div class="flex justify-center flex-wrap gap-6 p-4">
            @foreach ($sponsorItems as $sponsorItem)
                <div class="p-2 rounded-lg transition-all hover:scale-105 duration-300 text-center">
                    <img 
                        src="{{ asset('img/sponsor/'.$sponsorItem->imgUrl) }}" 
                        alt="{{ $sponsorItem->name }}" 
                        class="w-20 h-20 md:w-28 md:h-28 object-contain mx-auto transition-transform duration-300"
                    >
                </div>
            @endforeach
        </div>
    </div>
</section>
<section id="media-partner" class="my-12">
    <h2 class="text-3xl md:text-4xl font-bold text-center my-8" data-aos="fade-down" data-aos-duration="1000">Media Partner</h2>
    <div
        class="group relative m-auto w-full overflow-hidden bg-white before:absolute before:left-0 before:top-0 before:z-[2] before:h-full before:w-[100px] before:bg-[linear-gradient(to_right,white_0%,rgba(255,255,255,0)_100%)] before:content-[''] after:absolute after:right-0 after:top-0 after:z-[2] after:h-full after:w-[100px] after:-scale-x-100 after:bg-[linear-gradient(to_right,white_0%,rgba(255,255,255,0)_100%)] after:content-['']"
    data-aos="fade-up"
    data-aos-duration="1000"
    >
        <div class="group-hover:paused animate-infinite-slider flex w-[calc(250px*10)]">
        @foreach ($medpartItems as $medpartItem)
            <div class="slide flex w-[125px] items-center justify-center">
              <img src={{ asset('img/medpart/'.$medpartItem->imgUrl)}} alt={{$medpartItem->name}} class="w-[100px] rounded-full">
            </div>
        @endforeach
        </div>
    </div>
</section>
<x-sections.faq-section :faqItems="$faqItems" />
@endsection
