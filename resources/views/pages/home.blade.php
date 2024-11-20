@extends('layouts.app') @section('title', 'Seminar Nasional 2025')
@section('content')
<x-sections.hero-section />
<x-sections.about-section />
<section class="p-4" id="fillers">
    <div class="flex justify-between items-center"></div>
</section>
<x-sections.speaker-section :speakerItems="$speakerItems" />
<x-sections.benefit-section :benefitItems="$benefitItems" />
<x-sections.faq-section :faqItems="$faqItems" />
@endsection
