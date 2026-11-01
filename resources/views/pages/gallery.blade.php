@extends('layouts.app')

@section('title', 'Gallery | Scotland Bathrooms')

@section('css')

@endsection

@section('content')

<main id="main">
<section class="page-hero page-hero--slim on-dark" aria-labelledby="page-title">
  <div class="container">
    <div class="page-hero__copy">
      <nav aria-label="Breadcrumb"><ol class="crumbs"><li><a href="{{ route('home') }}">Home</a></li><li aria-current="page">Gallery</li></ol></nav>
      <p class="gallery__eyebrow">OUR WORK</p>
      <h1 id="page-title">Bathroom Transformations Across Central Scotland</h1>
      <p class="lead">Explore our completed bathroom installations, from contemporary wet wall panels to beautifully tiled finishes. Every project reflects our commitment to quality workmanship and keeping you informed throughout the job.</p>
      <p class="gallery__note">Wet wall and tiled bathrooms, fitted with care since 2019.</p>
    </div>
  </div>
</section>

<section class="section" aria-labelledby="gallery-title">
  <div class="container">
    <div class="gallery-controls" data-reveal>
      <h2 id="gallery-title" class="sr-only">Gallery filters</h2>
      <div class="gallery-filters" role="group" aria-label="Filter projects by type">
        <button class="gallery-filter btn btn--ghost" data-filter="all" aria-pressed="true">All Projects</button>
        @php
          $categories = $projects->pluck('category')->unique()->sort();
          $categoryLabels = [
            'wet-wall' => 'Wet Wall Bathrooms',
            'tiled' => 'Tiled Bathrooms',
            'shower' => 'Shower Rooms',
          ];
        @endphp
        @foreach($categories as $category)
          <button class="gallery-filter btn btn--ghost" data-filter="{{ $category }}" aria-pressed="false">{{ $categoryLabels[$category] ?? ucfirst($category) }}</button>
        @endforeach
      </div>
    </div>

    <div class="gallery-grid" data-gallery>
      @forelse($projects as $index => $project)
        @php
          $categoryLabels = [
            'wet-wall' => 'Wet Wall',
            'tiled' => 'Tiled',
            'shower' => 'Shower Room',
          ];
          $categoryLabel = $categoryLabels[$project->category] ?? ucfirst($project->category);
        @endphp
        <article class="gallery-item {{ $project->is_featured ? 'gallery-item--featured' : '' }}" data-category="{{ $project->category }}" data-reveal style="--i:{{ $index }}">
          <button class="gallery-item__trigger" aria-label="View larger image of {{ $project->title }}">
            <div class="gallery-item__image">
              <img src="{{ $project->image_url }}" alt="{{ $project->title }}" loading="lazy">
            </div>
          </button>
          <div class="gallery-item__content">
            <span class="gallery-item__category">{{ $categoryLabel }}</span>
            <h3 class="gallery-item__title">{{ $project->title }}</h3>
            @if($project->is_featured)
              <span class="gallery-item__badge">Featured</span>
            @endif
          </div>
        </article>
      @empty
        <p class="text-center">No projects available at the moment.</p>
      @endforelse
    </div>

    <div class="gallery-empty" data-gallery-empty hidden>
      <p>No projects found in this category. Try selecting a different filter.</p>
    </div>
  </div>
</section>

<section class="section cta" aria-labelledby="cta-title">
  <div class="container">
    <div class="cta-band on-dark" data-reveal>
      <svg class="cta-band__art" viewBox="0 0 400 240" aria-hidden="true" focusable="false"><rect width="400" height="240" fill="#d6e8e3"/><rect class="bt" x="1.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:170"/><rect class="bt" x="41.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:192"/><rect class="bt" x="81.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:214"/><rect class="bt" x="121.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:236"/><rect class="bt" x="161.5" y="1.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:258"/><rect class="bt" x="201.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:280"/><rect class="bt" x="241.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:302"/><rect class="bt" x="281.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:324"/><rect class="bt" x="321.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:346"/><rect class="bt" x="361.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:368"/><rect class="bt" x="1.5" y="41.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:136"/><rect class="bt" x="41.5" y="41.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:158"/><rect class="bt" x="81.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:180"/><rect class="bt" x="121.5" y="41.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:202"/><rect class="bt" x="161.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:224"/><rect class="bt" x="201.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:246"/><rect class="bt" x="241.5" y="41.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:268"/><rect class="bt" x="281.5" y="41.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:290"/><rect class="bt" x="321.5" y="41.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:312"/><rect class="bt" x="361.5" y="41.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:334"/><rect class="bt" x="1.5" y="81.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:102"/><rect class="bt" x="41.5" y="81.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:124"/><rect class="bt" x="81.5" y="81.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:146"/><rect class="bt" x="121.5" y="81.5" width="37" height="37" rx="3" fill="#24918A" style="--d:168"/><rect class="bt" x="161.5" y="81.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:190"/><rect class="bt" x="201.5" y="81.5" width="37" height="37" rx="3" fill="#24918A" style="--d:212"/><rect class="bt" x="241.5" y="81.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:234"/><rect class="bt" x="281.5" y="81.5" width="37" height="37" rx="3" fill="#7FCABD" style="--d:256"/><rect class="bt" x="321.5" y="81.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:278"/><rect class="bt" x="361.5" y="81.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:300"/><rect class="bt" x="1.5" y="121.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:68"/><rect class="bt" x="41.5" y="121.5" width="37" height="37" rx="3" fill="#24918A" style="--d:90"/><rect class="bt" x="81.5" y="121.5" width="37" height="37" rx="3" fill="#24918A" style="--d:112"/><rect class="bt" x="121.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:134"/><rect class="bt" x="161.5" y="121.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:156"/><rect class="bt" x="201.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:178"/><rect class="bt" x="241.5" y="121.5" width="37" height="37" rx="3" fill="#24918A" style="--d:200"/><rect class="bt" x="281.5" y="121.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:222"/><rect class="bt" x="321.5" y="121.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:244"/><rect class="bt" x="361.5" y="121.5" width="37" height="37" rx="3" fill="#24918A" style="--d:266"/><rect class="bt" x="1.5" y="161.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:34"/><rect class="bt" x="41.5" y="161.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:56"/><rect class="bt" x="81.5" y="161.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:78"/><rect class="bt" x="121.5" y="161.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:100"/><rect class="bt" x="161.5" y="161.5" width="37" height="37" rx="3" fill="#24918A" style="--d:122"/><rect class="bt" x="201.5" y="161.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:144"/><rect class="bt" x="241.5" y="161.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:166"/><rect class="bt" x="281.5" y="161.5" width="37" height="37" rx="3" fill="#24918A" style="--d:188"/><rect class="bt" x="321.5" y="161.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:210"/><rect class="bt" x="361.5" y="161.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:232"/><rect class="bt" x="1.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:0"/><rect class="bt" x="41.5" y="201.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:22"/><rect class="bt" x="81.5" y="201.5" width="37" height="37" rx="3" fill="#24918A" style="--d:44"/><rect class="bt" x="121.5" y="201.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:66"/><rect class="bt" x="161.5" y="201.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:88"/><rect class="bt" x="201.5" y="201.5" width="37" height="37" rx="3" fill="#24918A" style="--d:110"/><rect class="bt" x="241.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:132"/><rect class="bt" x="281.5" y="201.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:154"/><rect class="bt" x="321.5" y="201.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:176"/><rect class="bt" x="361.5" y="201.5" width="37" height="37" rx="3" fill="#24918A" style="--d:198"/></svg>
      <div class="cta-band__copy">
        <h2 id="cta-title">Planning a New Bathroom?</h2>
        <p class="lead">Talk to Robert about your bathroom, compare wet wall and tiled finishes, and get advice on the right solution for your home.</p>
      </div>
      <div class="cta-band__actions">
        <a class="btn btn--primary" href="tel:{{ preg_replace('/[^0-9]/', '', $siteSettings->phone ?? '+447549348636') }}">Call {{ $siteSettings->phone ?? '+44 7549 348636' }} <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg></span></a>
        <a class="btn btn--wa" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteSettings->whatsapp ?? '+447549348636') }}?text=Hi%20Robert%2C%20I%E2%80%99d%20like%20to%20talk%20about%20a%20new%20bathroom." target="_blank" rel="noopener">WhatsApp Robert <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg></span></a>
      </div>
    </div>
  </div>
</section>
</main>

<div class="lightbox" data-lightbox hidden aria-hidden="true" role="dialog" aria-modal="true" aria-label="Image viewer">
  <div class="lightbox__backdrop"></div>
  <div class="lightbox__content">
    <button class="lightbox__close" aria-label="Close image viewer">
      <svg class="icon" aria-hidden="true" focusable="false"><use href="#i-close"/></svg>
    </button>
    <button class="lightbox__nav lightbox__nav--prev" aria-label="Previous image">
      <svg class="icon" aria-hidden="true" focusable="false"><use href="#i-chevron-left"/></svg>
    </button>
    <div class="lightbox__stage">
      <img class="lightbox__image" src="" alt="" aria-hidden="true">
    </div>
    <button class="lightbox__nav lightbox__nav--next" aria-label="Next image">
      <svg class="icon" aria-hidden="true" focusable="false"><use href="#i-chevron-right"/></svg>
    </button>
  </div>
</div>

@endsection

@section('js')

@endsection