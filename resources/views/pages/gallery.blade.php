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
        <button class="gallery-filter btn btn--ghost" data-filter="wet-wall" aria-pressed="false">Wet Wall Bathrooms</button>
        <button class="gallery-filter btn btn--ghost" data-filter="tiled" aria-pressed="false">Tiled Bathrooms</button>
        <button class="gallery-filter btn btn--ghost" data-filter="shower" aria-pressed="false">Shower Rooms</button>
      </div>
    </div>

    <div class="gallery-grid" data-gallery>
      <article class="gallery-item" data-category="wet-wall" data-reveal style="--i:0">
        <button class="gallery-item__trigger" aria-label="View larger image of Contemporary Wet Wall Bathroom">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-1.jpeg') }}" alt="Contemporary wet wall bathroom installation" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Wet Wall</span>
          <h3 class="gallery-item__title">Contemporary Wet Wall Bathroom</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="tiled" data-reveal style="--i:1">
        <button class="gallery-item__trigger" aria-label="View larger image of Classic Tiled Shower Room">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-2.jpeg') }}" alt="Classic tiled shower room with intricate tile work" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Tiled</span>
          <h3 class="gallery-item__title">Classic Tiled Shower Room</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="wet-wall" data-reveal style="--i:2">
        <button class="gallery-item__trigger" aria-label="View larger image of Modern Bathroom Renovation">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-3.jpeg') }}" alt="Modern bathroom renovation with wet wall panels" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Wet Wall</span>
          <h3 class="gallery-item__title">Modern Bathroom Renovation</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="tiled" data-reveal style="--i:3">
        <button class="gallery-item__trigger" aria-label="View larger image of Detailed Tile and Shower Finish">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-4.jpeg') }}" alt="Detailed tile and shower finish with precision tiling" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Tiled</span>
          <h3 class="gallery-item__title">Detailed Tile and Shower Finish</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="shower" data-reveal style="--i:4">
        <button class="gallery-item__trigger" aria-label="View larger image of Enclosed Shower Installation">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-5.jpeg') }}" alt="Enclosed shower installation with glass enclosure" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Shower Room</span>
          <h3 class="gallery-item__title">Enclosed Shower Installation</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="tiled" data-reveal style="--i:5">
        <button class="gallery-item__trigger" aria-label="View larger image of Vanity and Mirror Detail">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-6.jpeg') }}" alt="Tiled bathroom with vanity and mirror detail" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Tiled</span>
          <h3 class="gallery-item__title">Vanity and Mirror Detail</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="wet-wall" data-reveal style="--i:6">
        <button class="gallery-item__trigger" aria-label="View larger image of Family Wet Wall Bathroom">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-7.jpeg') }}" alt="Family wet wall bathroom with spacious design" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Wet Wall</span>
          <h3 class="gallery-item__title">Family Wet Wall Bathroom</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="tiled" data-reveal style="--i:7">
        <button class="gallery-item__trigger" aria-label="View larger image of Heritage-Style Tiled Bathroom">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-8.jpeg') }}" alt="Heritage-style tiled bathroom with classic design" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Tiled</span>
          <h3 class="gallery-item__title">Heritage-Style Tiled Bathroom</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="shower" data-reveal style="--i:8">
        <button class="gallery-item__trigger" aria-label="View larger image of Walk-In Shower Wet Wall">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-9.jpeg') }}" alt="Walk-in shower with wet wall panels" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Shower Room</span>
          <h3 class="gallery-item__title">Walk-In Shower Wet Wall</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="wet-wall" data-reveal style="--i:9">
        <button class="gallery-item__trigger" aria-label="View larger image of Compact Wet Wall Bathroom">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-10.jpeg') }}" alt="Compact wet wall bathroom for smaller spaces" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Wet Wall</span>
          <h3 class="gallery-item__title">Compact Wet Wall Bathroom</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="tiled" data-reveal style="--i:10">
        <button class="gallery-item__trigger" aria-label="View larger image of Modern Tiled Ensuite">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-11.jpeg') }}" alt="Modern tiled ensuite bathroom" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Tiled</span>
          <h3 class="gallery-item__title">Modern Tiled Ensuite</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="wet-wall" data-reveal style="--i:11">
        <button class="gallery-item__trigger" aria-label="View larger image of Luxury Wet Wall Finish">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-12.jpeg') }}" alt="Luxury wet wall finish with premium panels" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Wet Wall</span>
          <h3 class="gallery-item__title">Luxury Wet Wall Finish</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="tiled" data-reveal style="--i:12">
        <button class="gallery-item__trigger" aria-label="View larger image of Feature Wall Tiling">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-13.jpeg') }}" alt="Feature wall tiling with decorative tiles" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Tiled</span>
          <h3 class="gallery-item__title">Feature Wall Tiling</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="wet-wall" data-reveal style="--i:13">
        <button class="gallery-item__trigger" aria-label="View larger image of Wet Wall Panel Installation">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-14.jpeg') }}" alt="Wet wall panel installation in progress" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Wet Wall</span>
          <h3 class="gallery-item__title">Wet Wall Panel Installation</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="shower" data-reveal style="--i:14">
        <button class="gallery-item__trigger" aria-label="View larger image of Wet Wall Shower Room">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-15.jpeg') }}" alt="Wet wall shower room with modern fixtures" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Shower Room</span>
          <h3 class="gallery-item__title">Wet Wall Shower Room</h3>
        </div>
      </article>

      <article class="gallery-item" data-category="tiled" data-reveal style="--i:15">
        <button class="gallery-item__trigger" aria-label="View larger image of Complete Bathroom Transformation">
          <div class="gallery-item__image">
            <img src="{{ asset('assets/images/image-16.jpeg') }}" alt="Complete bathroom transformation with tiles" loading="lazy">
          </div>
        </button>
        <div class="gallery-item__content">
          <span class="gallery-item__category">Tiled</span>
          <h3 class="gallery-item__title">Complete Bathroom Transformation</h3>
        </div>
      </article>
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
        <a class="btn btn--primary" href="tel:+447549348636">Call +44 7549 348636 <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg></span></a>
        <a class="btn btn--wa" href="https://wa.me/447549348636?text=Hi%20Robert%2C%20I%E2%80%99d%20like%20to%20talk%20about%20a%20new%20bathroom." target="_blank" rel="noopener">WhatsApp Robert <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg></span></a>
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