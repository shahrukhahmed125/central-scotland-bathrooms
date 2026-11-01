@extends('layouts.app')

@section('title', $servicesContent->meta_title ?: 'Services | Scotland Bathrooms')
@if(!empty($servicesContent->meta_description))
@section('meta_description', $servicesContent->meta_description)
@endif
@if(!empty($servicesContent->meta_keywords))
@section('meta_keywords', $servicesContent->meta_keywords)
@endif
@if(!empty($servicesContent->og_title))
@section('og_title', $servicesContent->og_title)
@endif
@if(!empty($servicesContent->og_description))
@section('og_description', $servicesContent->og_description)
@endif
@if(!empty($servicesContent->og_image))
@section('og_image', asset('storage/' . $servicesContent->og_image))
@section('twitter_image', asset('storage/' . $servicesContent->og_image))
@endif

@section('css')

@endsection

@section('content')

<main id="main">
<section class="page-hero on-dark" aria-labelledby="page-title">
  <div class="container page-hero__grid">
    <div class="page-hero__copy">
      <nav aria-label="Breadcrumb"><ol class="crumbs"><li><a href="{{ route('home') }}">Home</a></li><li aria-current="page">Services</li></ol></nav>
      <h1 id="page-title">{{ $servicesContent->hero_title }}</h1>
      <p class="lead">{{ $servicesContent->hero_lead }}</p>
    </div>
    <div class="samples" aria-hidden="true">
      <span style="--c:#24918a;--i:0"></span><span style="--c:#ff7759;--i:1"></span><span style="--c:#a9ddd2;--i:2"></span>
      <span style="--c:#f4f8f6;--i:3"></span><span style="--c:#13605a;--i:4"></span><span style="--c:#f2b441;--i:5"></span>
      <span style="--c:#5bbfaf;--i:6"></span><span style="--c:#ffd3c7;--i:7"></span><span style="--c:#1a7a72;--i:8"></span>
    </div>
  </div>
</section>

<section class="section" aria-labelledby="included-title">
  <div class="container">
    <div class="section-head" data-reveal>
      <h2 id="included-title">{{ $servicesContent->services_title }}</h2>
      <p class="lead">{{ $servicesContent->services_lead }}</p>
    </div>
    <div class="bento">
      @forelse($services as $service)
        <article class="cell bezel {{ $service->card_style == 'coral' ? 'cell--coral' : '' }} {{ $service->card_style == 'brand' ? 'cell--brand on-dark' : '' }}" id="{{ $service->slug }}" style="--span:{{ $service->card_span ?? 6 }}" data-reveal>
          <div class="bezel__core">
            @if($service->icon_type == 'svg' && $service->icon_name == 'wet-wall')
              <div class="cell__art" aria-hidden="true"><svg viewBox="0 0 600 220" preserveAspectRatio="xMidYMid slice" focusable="false"><defs><linearGradient id="bn-marble" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#f8fbfa"/><stop offset="1" stop-color="#e2edea"/></linearGradient></defs><rect width="600" height="220" fill="url(#bn-marble)"/><path d="M-67.4 219.8C53.0 214.3 213.4 173.2 333.8 167.5" stroke="#9db8b1" stroke-width="0.89" stroke-opacity="0.55" fill="none" stroke-linecap="round"/><path d="M141.8 193.7Q218.4 187.7 295.1 215.7" stroke="#a9c2bb" stroke-width="0.50" stroke-opacity="0.65" fill="none" stroke-linecap="round"/><path d="M156.5 10.5C261.3 8.9 401.0 -5.0 505.7 -16.3" stroke="#9db8b1" stroke-width="0.96" stroke-opacity="0.65" fill="none" stroke-linecap="round"/><path d="M340.0 -2.9Q416.3 -1.4 492.6 20.6" stroke="#a9c2bb" stroke-width="0.48" stroke-opacity="0.37" fill="none" stroke-linecap="round"/><path d="M138.0 83.1C334.2 67.3 595.8 149.7 792.0 143.6" stroke="#9db8b1" stroke-width="0.93" stroke-opacity="0.64" fill="none" stroke-linecap="round"/><path d="M374.8 113.3Q444.6 108.5 514.4 91.8" stroke="#a9c2bb" stroke-width="0.76" stroke-opacity="0.59" fill="none" stroke-linecap="round"/><path d="M-5.2 88.6C191.2 97.6 453.0 50.7 649.4 57.4" stroke="#9db8b1" stroke-width="1.01" stroke-opacity="0.58" fill="none" stroke-linecap="round"/><path d="M306.4 73.0Q351.3 76.6 396.2 76.4" stroke="#a9c2bb" stroke-width="0.67" stroke-opacity="0.57" fill="none" stroke-linecap="round"/><path d="M-72.3 54.4C99.7 45.2 329.1 129.2 501.1 142.8" stroke="#9db8b1" stroke-width="0.99" stroke-opacity="0.63" fill="none" stroke-linecap="round"/><path d="M299.7 98.6Q364.1 90.6 428.5 101.0" stroke="#a9c2bb" stroke-width="0.43" stroke-opacity="0.57" fill="none" stroke-linecap="round"/><path d="M-30.5 217.8C153.9 198.1 399.7 203.2 584.1 187.1" stroke="#9db8b1" stroke-width="0.97" stroke-opacity="0.61" fill="none" stroke-linecap="round"/><path d="M333.6 202.5Q399.7 207.7 465.8 211.3" stroke="#9db8b1" stroke-width="0.80" stroke-opacity="0.53" fill="none" stroke-linecap="round"/><rect x="0" y="0" width="6" height="220" fill="#c9d9d5"/></svg></div>
            @elseif($service->icon_type == 'svg' && $service->icon_name == 'tiled')
              <div class="cell__art" aria-hidden="true"><svg viewBox="0 0 400 220" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="400" height="240" fill="#d6e8e3"/><rect class="bt" x="1.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:170"/><rect class="bt" x="41.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:192"/><rect class="bt" x="81.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:214"/><rect class="bt" x="121.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:236"/><rect class="bt" x="161.5" y="1.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:258"/><rect class="bt" x="201.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:280"/><rect class="bt" x="241.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:302"/><rect class="bt" x="281.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:324"/><rect class="bt" x="321.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:346"/><rect class="bt" x="361.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:368"/><rect class="bt" x="1.5" y="41.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:136"/><rect class="bt" x="41.5" y="41.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:158"/><rect class="bt" x="81.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:180"/><rect class="bt" x="121.5" y="41.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:202"/><rect class="bt" x="161.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:224"/><rect class="bt" x="201.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:246"/><rect class="bt" x="241.5" y="41.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:268"/><rect class="bt" x="281.5" y="41.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:290"/><rect class="bt" x="321.5" y="41.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:312"/><rect class="bt" x="361.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:334"/><rect class="bt" x="1.5" y="81.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:102"/><rect class="bt" x="41.5" y="81.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:124"/><rect class="bt" x="81.5" y="81.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:146"/><rect class="bt" x="121.5" y="81.5" width="37" height="37" rx="3" fill="#24918A" style="--d:168"/><rect class="bt" x="161.5" y="81.5" width="37" height="37" rx="3" fill="#24918A" style="--d:190"/><rect class="bt" x="201.5" y="81.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:212"/><rect class="bt" x="241.5" y="81.5" width="37" height="37" rx="3" fill="#9AD6CA" style="--d:234"/><rect class="bt" x="281.5" y="81.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:256"/><rect class="bt" x="321.5" y="81.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:278"/><rect class="bt" x="361.5" y="81.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:300"/><rect class="bt" x="1.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:68"/><rect class="bt" x="41.5" y="121.5" width="37" height="37" rx="3" fill="#24918A" style="--d:90"/><rect class="bt" x="81.5" y="121.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:112"/><rect class="bt" x="121.5" y="121.5" width="37" height="37" rx="3" fill="#24918A" style="--d:134"/><rect class="bt" x="161.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:156"/><rect class="bt" x="201.5" y="121.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:178"/><rect class="bt" x="241.5" y="121.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:200"/><rect class="bt" x="281.5" y="121.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:222"/><rect class="bt" x="321.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:244"/><rect class="bt" x="361.5" y="121.5" width="37" height="37" rx="3" fill="#9AD6CA" style="--d:266"/><rect class="bt" x="1.5" y="161.5" width="37" height="37" rx="3" fill="#24918A" style="--d:34"/><rect class="bt" x="41.5" y="161.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:56"/><rect class="bt" x="81.5" y="161.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:78"/><rect class="bt" x="121.5" y="161.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:100"/><rect class="bt" x="161.5" y="161.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:122"/><rect class="bt" x="201.5" y="161.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:144"/><rect class="bt" x="241.5" y="161.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:166"/><rect class="bt" x="281.5" y="161.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:188"/><rect class="bt" x="321.5" y="161.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:210"/><rect class="bt" x="361.5" y="161.5" width="37" height="37" rx="3" fill="#24918A" style="--d:232"/><rect class="bt" x="1.5" y="201.5" width="37" height="37" rx="3" fill="#24918A" style="--d:0"/><rect class="bt" x="41.5" y="201.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:22"/><rect class="bt" x="81.5" y="201.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:44"/><rect class="bt" x="121.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:66"/><rect class="bt" x="161.5" y="201.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:88"/><rect class="bt" x="201.5" y="201.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:110"/><rect class="bt" x="241.5" y="201.5" width="37" height="37" rx="3" fill="#7FCABD" style="--d:132"/><rect class="bt" x="281.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:154"/><rect class="bt" x="321.5" y="201.5" width="37" height="37" rx="3" fill="#9AD6CA" style="--d:176"/><rect class="bt" x="361.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:198"/></svg></div>
            @elseif($service->icon_type == 'image' && $service->image)
              <div class="cell__art" aria-hidden="true">
                <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" loading="lazy">
              </div>
            @else
              <span class="cell__icon {{ $service->icon_color == 'orange' ? 'cell__icon--orange' : '' }} {{ $service->icon_color == 'coral' ? 'cell__icon--coral' : '' }} {{ $service->icon_color == 'brand' ? 'cell__icon--brand' : '' }}">
                <svg class="icon" aria-hidden="true" focusable="false">
                  <use href="#i-{{ $service->icon_name ?? 'wrench' }}"></use>
                </svg>
              </span>
            @endif
            <h3>{{ $service->title }}</h3>
            <p>{{ $service->short_description }}</p>
            @if($service->description)
              <div>{!! $service->description !!}</div>
            @endif
            @php
              $chips = is_array($service->chips)
                ? $service->chips
                : (is_string($service->chips) ? array_filter(array_map('trim', explode(',', $service->chips))) : []);
              $chipIcons = is_array($service->chip_icons) ? $service->chip_icons : [];
              $chipIconMap = [];
              foreach($chipIcons as $ci) {
                if(isset($ci['label']) && isset($ci['icon'])) {
                  $chipIconMap[$ci['label']] = $ci['icon'];
                }
              }
            @endphp
            @if(!empty($chips))
              <ul class="chips">
                @foreach($chips as $chip)
                  <li>
                    @if(isset($chipIconMap[$chip]))
                      <svg class="icon" aria-hidden="true" focusable="false"><use href="#i-{{ $chipIconMap[$chip] }}"></use></svg>
                    @endif
                    {{ $chip }}
                  </li>
                @endforeach
              </ul>
            @endif
          </div>
        </article>
      @empty
        <p class="text-center">No services available at the moment.</p>
      @endforelse
    </div>
  </div>
</section>

<section class="section section--flush-top" aria-labelledby="ribbon-title">
  <div class="container">
    <div class="ribbon" data-reveal>
      <p class="ribbon__amount" aria-hidden="true">{{ $servicesContent->guarantee_amount }}</p>
      <div>
        <h2 id="ribbon-title">{{ $servicesContent->guarantee_title }}</h2>
        <p>{{ $servicesContent->guarantee_lead }}</p>
      </div>
      <a class="btn btn--brand" href="tel:{{ preg_replace('/[^0-9]/', '', $siteSettings->phone ?? '+447549348636') }}">Call {{ $siteSettings->phone ?? '+44 7549 348636' }} <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg></span></a>
    </div>
  </div>
</section>

<section class="section section--flush-top faq" id="faq" aria-labelledby="faq-title">
  <div class="container faq__grid">
    <div class="faq__intro" data-reveal>
      <h2 id="faq-title">{{ $servicesContent->faq_title }}</h2>
      <p class="lead">{{ $servicesContent->faq_lead }}</p>
      @if($faqs->count() > 0)
        <p class="faq__updated">Last updated <time datetime="{{ $faqs->max('updated_at')->format('Y-m-d') }}">{{ $faqs->max('updated_at')->format('j F Y') }}</time></p>
      @endif
    </div>
    <div class="faq__list" data-reveal style="--i:1">
      @forelse($faqs as $index => $faq)
        <details class="faq__item" id="{{ $faq->slug }}" {{ $index === 0 ? 'open' : '' }}>
          <summary>{{ $faq->question }}<span class="faq__toggle" aria-hidden="true"></span></summary>
          <div class="faq__answer">{!! $faq->answer !!}</div>
        </details>
      @empty
        <p>No FAQs available at the moment.</p>
      @endforelse
    </div>
  </div>
</section>

<section class="section cta" aria-labelledby="cta-title">
  <div class="container">
    <div class="cta-band on-dark" data-reveal>
      <svg class="cta-band__art" viewBox="0 0 400 240" aria-hidden="true" focusable="false"><rect width="400" height="240" fill="#d6e8e3"/><rect class="bt" x="1.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:170"/><rect class="bt" x="41.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:192"/><rect class="bt" x="81.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:214"/><rect class="bt" x="121.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:236"/><rect class="bt" x="161.5" y="1.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:258"/><rect class="bt" x="201.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:280"/><rect class="bt" x="241.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:302"/><rect class="bt" x="281.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:324"/><rect class="bt" x="321.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:346"/><rect class="bt" x="361.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:368"/><rect class="bt" x="1.5" y="41.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:136"/><rect class="bt" x="41.5" y="41.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:158"/><rect class="bt" x="81.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:180"/><rect class="bt" x="121.5" y="41.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:202"/><rect class="bt" x="161.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:224"/><rect class="bt" x="201.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:246"/><rect class="bt" x="241.5" y="41.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:268"/><rect class="bt" x="281.5" y="41.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:290"/><rect class="bt" x="321.5" y="41.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:312"/><rect class="bt" x="361.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:334"/><rect class="bt" x="1.5" y="81.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:102"/><rect class="bt" x="41.5" y="81.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:124"/><rect class="bt" x="81.5" y="81.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:146"/><rect class="bt" x="121.5" y="81.5" width="37" height="37" rx="3" fill="#24918A" style="--d:168"/><rect class="bt" x="161.5" y="81.5" width="37" height="37" rx="3" fill="#24918A" style="--d:190"/><rect class="bt" x="201.5" y="81.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:212"/><rect class="bt" x="241.5" y="81.5" width="37" height="37" rx="3" fill="#9AD6CA" style="--d:234"/><rect class="bt" x="281.5" y="81.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:256"/><rect class="bt" x="321.5" y="81.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:278"/><rect class="bt" x="361.5" y="81.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:300"/><rect class="bt" x="1.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:68"/><rect class="bt" x="41.5" y="121.5" width="37" height="37" rx="3" fill="#24918A" style="--d:90"/><rect class="bt" x="81.5" y="121.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:112"/><rect class="bt" x="121.5" y="121.5" width="37" height="37" rx="3" fill="#24918A" style="--d:134"/><rect class="bt" x="161.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:156"/><rect class="bt" x="201.5" y="121.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:178"/><rect class="bt" x="241.5" y="121.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:200"/><rect class="bt" x="281.5" y="121.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:222"/><rect class="bt" x="321.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:244"/><rect class="bt" x="361.5" y="121.5" width="37" height="37" rx="3" fill="#9AD6CA" style="--d:266"/><rect class="bt" x="1.5" y="161.5" width="37" height="37" rx="3" fill="#24918A" style="--d:34"/><rect class="bt" x="41.5" y="161.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:56"/><rect class="bt" x="81.5" y="161.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:78"/><rect class="bt" x="121.5" y="161.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:100"/><rect class="bt" x="161.5" y="161.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:122"/><rect class="bt" x="201.5" y="161.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:144"/><rect class="bt" x="241.5" y="161.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:166"/><rect class="bt" x="281.5" y="161.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:188"/><rect class="bt" x="321.5" y="161.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:210"/><rect class="bt" x="361.5" y="161.5" width="37" height="37" rx="3" fill="#24918A" style="--d:232"/><rect class="bt" x="1.5" y="201.5" width="37" height="37" rx="3" fill="#24918A" style="--d:0"/><rect class="bt" x="41.5" y="201.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:22"/><rect class="bt" x="81.5" y="201.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:44"/><rect class="bt" x="121.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:66"/><rect class="bt" x="161.5" y="201.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:88"/><rect class="bt" x="201.5" y="201.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:110"/><rect class="bt" x="241.5" y="201.5" width="37" height="37" rx="3" fill="#7FCABD" style="--d:132"/><rect class="bt" x="281.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:154"/><rect class="bt" x="321.5" y="201.5" width="37" height="37" rx="3" fill="#9AD6CA" style="--d:176"/><rect class="bt" x="361.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:198"/></svg>
      <div class="cta-band__copy">
        <h2 id="cta-title">{{ $servicesContent->cta_title ?? 'Talk to Robert about your bathroom.' }}</h2>
        @php
          $sinceYear = $servicesContent->since_year ?? 2019;
          $ctaLead = $servicesContent->cta_lead ?? 'Fitting wet wall and tiled bathrooms across Central Scotland since ' . $sinceYear . '.';
          $sinceBadge = '<span class="since" data-count="' . e($sinceYear) . '" data-from="1989">' . e($sinceYear) . '</span>';
          if (str_contains($ctaLead, (string)$sinceYear)) {
              $ctaLeadHtml = str_replace((string)$sinceYear, $sinceBadge, e($ctaLead));
          } else {
              $ctaLeadHtml = e($ctaLead) . ' ' . $sinceBadge;
          }
        @endphp
        <p class="lead">{!! $ctaLeadHtml !!}</p>
      </div>
      <div class="cta-band__actions">
        <a class="btn btn--primary" href="tel:{{ preg_replace('/[^0-9]/', '', $siteSettings->phone ?? '+447549348636') }}">Call {{ $siteSettings->phone ?? '+44 7549 348636' }} <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg></span></a>
        <a class="btn btn--wa" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteSettings->whatsapp ?? '+447549348636') }}?text=Hi%20Robert%2C%20I%E2%80%99d%20like%20to%20talk%20about%20a%20new%20bathroom." target="_blank" rel="noopener">WhatsApp Robert <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg></span></a>
        <a class="btn btn--ghost" href="{{ route('contact') }}#quote">Ask for a quote <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></span></a>
      </div>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection
