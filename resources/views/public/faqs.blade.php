@extends('layouts.public')

@section('title', 'FAQs')

@section('content')
    
{{-- contact card --}}
<section class="mt-12 mb-12">
    <x-faq-list :faqs="$faqs" />
</section>

@endsection
