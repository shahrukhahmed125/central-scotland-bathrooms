@extends('layouts.app')

@section('title', $privacyContent->meta_title ?: 'Privacy Policy | Central Scotland Bathroom Consultancy')
@if(!empty($privacyContent->meta_description))
@section('meta_description', $privacyContent->meta_description)
@endif
@if(!empty($privacyContent->meta_keywords))
@section('meta_keywords', $privacyContent->meta_keywords)
@endif
@if(!empty($privacyContent->og_title))
@section('og_title', $privacyContent->og_title)
@endif
@if(!empty($privacyContent->og_description))
@section('og_description', $privacyContent->og_description)
@endif
@if(!empty($privacyContent->og_image))
@section('og_image', asset('storage/' . $privacyContent->og_image))
@section('twitter_image', asset('storage/' . $privacyContent->og_image))
@endif

@section('css')

@endsection

@section('content')

<main id="main">
<section class="page-hero page-hero--slim on-dark" aria-labelledby="page-title">
  <div class="container">
    <div class="page-hero__copy">
      <nav aria-label="Breadcrumb"><ol class="crumbs"><li><a href="{{ route('home') }}">Home</a></li><li aria-current="page">{{ $privacyContent->hero_title }}</li></ol></nav>
      <h1 id="page-title">{{ $privacyContent->hero_title }}</h1>
    </div>
  </div>
</section>
<section class="section">
  <div class="container">
    <article class="prose">
      @if(!empty($privacyContent->last_updated))
        <p class="prose__meta">Last updated <time>{{ $privacyContent->last_updated }}</time></p>
      @endif
      {!! $privacyContent->content !!}
    </article>
  </div>
</section>
</main>
@endsection

@section('js')

@endsection