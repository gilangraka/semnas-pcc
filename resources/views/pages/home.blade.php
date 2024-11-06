@extends('layouts.app')

@section('content')
    <x-sections.benefit-section :benefitItems="$benefitItems" />
    <x-sections.faq-section :faqItems="$faqItems" />
@endsection
