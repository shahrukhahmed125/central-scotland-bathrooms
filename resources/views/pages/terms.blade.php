@extends('layouts.app')

@section('title', $termsContent->meta_title ?: 'Terms of Use | Central Scotland Bathroom Consultancy')
@if(!empty($termsContent->meta_description))
@section('meta_description', $termsContent->meta_description)
@endif
@if(!empty($termsContent->meta_keywords))
@section('meta_keywords', $termsContent->meta_keywords)
@endif
@if(!empty($termsContent->og_title))
@section('og_title', $termsContent->og_title)
@endif
@if(!empty($termsContent->og_description))
@section('og_description', $termsContent->og_description)
@endif
@if(!empty($termsContent->og_image))
@section('og_image', asset('storage/' . $termsContent->og_image))
@section('twitter_image', asset('storage/' . $termsContent->og_image))
@endif

@section('css')

@endsection

@section('content')

<main id="main">
<section class="page-hero page-hero--slim on-dark" aria-labelledby="page-title">
  <div class="container">
    <div class="page-hero__copy">
      <nav aria-label="Breadcrumb"><ol class="crumbs"><li><a href="{{ route('home') }}">Home</a></li><li aria-current="page">{{ $termsContent->hero_title }}</li></ol></nav>
      <h1 id="page-title">{{ $termsContent->hero_title }}</h1>
    </div>
  </div>
</section>
<section class="section">
  <div class="container">
    <article class="prose">
      @if(!empty($termsContent->last_updated))
        <p class="prose__meta">Last updated <time>{{ $termsContent->last_updated }}</time></p>
      @endif
      {!! $termsContent->content !!}
    </article>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection