@extends('layouts.app')

@section('title', 'Services | Scotland Bathrooms')

@section('css')

@endsection

@section('content')

<main id="main">
<section class="page-hero on-dark" aria-labelledby="page-title">
  <div class="container page-hero__grid">
    <div class="page-hero__copy">
      <nav aria-label="Breadcrumb"><ol class="crumbs"><li><a href="{{ route('home') }}">Home</a></li><li aria-current="page">Services</li></ol></nav>
      <h1 id="page-title">Bathroom refits, from <span class="nowrap">strip-out</span> to <span class="nowrap">sign-off</span>.</h1>
      <p class="lead">Wet wall and tiled bathrooms across Central Scotland, handled by one team that keeps you updated every day.</p>
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
      <h2 id="included-title">What every job includes</h2>
      <p class="lead">You deal with one team from the day the old bathroom comes out to the day you sign off the new one.</p>
    </div>
    <div class="bento">
      <article class="cell bezel" id="wet-wall" style="--span:7" data-reveal>
        <div class="bezel__core">
          <div class="cell__art" aria-hidden="true"><svg viewBox="0 0 600 220" preserveAspectRatio="xMidYMid slice" focusable="false"><defs><linearGradient id="bn-marble" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#f8fbfa"/><stop offset="1" stop-color="#e2edea"/></linearGradient></defs><rect width="600" height="220" fill="url(#bn-marble)"/><path d="M-67.4 219.8C53.0 214.3 213.4 173.2 333.8 167.5" stroke="#9db8b1" stroke-width="0.89" stroke-opacity="0.55" fill="none" stroke-linecap="round"/><path d="M141.8 193.7Q218.4 187.7 295.1 215.7" stroke="#a9c2bb" stroke-width="0.50" stroke-opacity="0.65" fill="none" stroke-linecap="round"/><path d="M156.5 10.5C261.3 8.9 401.0 -5.0 505.7 -16.3" stroke="#9db8b1" stroke-width="0.96" stroke-opacity="0.65" fill="none" stroke-linecap="round"/><path d="M340.0 -2.9Q416.3 -1.4 492.6 20.6" stroke="#a9c2bb" stroke-width="0.48" stroke-opacity="0.37" fill="none" stroke-linecap="round"/><path d="M138.0 83.1C334.2 67.3 595.8 149.7 792.0 143.6" stroke="#9db8b1" stroke-width="0.93" stroke-opacity="0.64" fill="none" stroke-linecap="round"/><path d="M374.8 113.3Q444.6 108.5 514.4 91.8" stroke="#a9c2bb" stroke-width="0.76" stroke-opacity="0.59" fill="none" stroke-linecap="round"/><path d="M-5.2 88.6C191.2 97.6 453.0 50.7 649.4 57.4" stroke="#9db8b1" stroke-width="1.01" stroke-opacity="0.58" fill="none" stroke-linecap="round"/><path d="M306.4 73.0Q351.3 76.6 396.2 76.4" stroke="#a9c2bb" stroke-width="0.67" stroke-opacity="0.57" fill="none" stroke-linecap="round"/><path d="M-72.3 54.4C99.7 45.2 329.1 129.2 501.1 142.8" stroke="#9db8b1" stroke-width="0.99" stroke-opacity="0.63" fill="none" stroke-linecap="round"/><path d="M299.7 98.6Q364.1 90.6 428.5 101.0" stroke="#a9c2bb" stroke-width="0.43" stroke-opacity="0.57" fill="none" stroke-linecap="round"/><path d="M-30.5 217.8C153.9 198.1 399.7 203.2 584.1 187.1" stroke="#9db8b1" stroke-width="0.97" stroke-opacity="0.61" fill="none" stroke-linecap="round"/><path d="M333.6 202.5Q399.7 207.7 465.8 211.3" stroke="#a9c2bb" stroke-width="0.80" stroke-opacity="0.53" fill="none" stroke-linecap="round"/><rect x="0" y="0" width="6" height="220" fill="#c9d9d5"/></svg></div>
          <h3>Wet wall bathrooms</h3>
          <p>Large waterproof wall panels give you a smooth finish with no grout lines. They wipe clean with a cloth and suit showers and full bathroom walls alike.</p>
        </div>
      </article>
      <article class="cell bezel" id="tiled" style="--span:5" data-reveal>
        <div class="bezel__core">
          <div class="cell__art" aria-hidden="true"><svg viewBox="0 0 400 220" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="400" height="240" fill="#d6e8e3"/><rect class="bt" x="1.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:170"/><rect class="bt" x="41.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:192"/><rect class="bt" x="81.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:214"/><rect class="bt" x="121.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:236"/><rect class="bt" x="161.5" y="1.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:258"/><rect class="bt" x="201.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:280"/><rect class="bt" x="241.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:302"/><rect class="bt" x="281.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:324"/><rect class="bt" x="321.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:346"/><rect class="bt" x="361.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:368"/><rect class="bt" x="1.5" y="41.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:136"/><rect class="bt" x="41.5" y="41.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:158"/><rect class="bt" x="81.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:180"/><rect class="bt" x="121.5" y="41.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:202"/><rect class="bt" x="161.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:224"/><rect class="bt" x="201.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:246"/><rect class="bt" x="241.5" y="41.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:268"/><rect class="bt" x="281.5" y="41.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:290"/><rect class="bt" x="321.5" y="41.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:312"/><rect class="bt" x="361.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:334"/><rect class="bt" x="1.5" y="81.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:102"/><rect class="bt" x="41.5" y="81.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:124"/><rect class="bt" x="81.5" y="81.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:146"/><rect class="bt" x="121.5" y="81.5" width="37" height="37" rx="3" fill="#24918A" style="--d:168"/><rect class="bt" x="161.5" y="81.5" width="37" height="37" rx="3" fill="#24918A" style="--d:190"/><rect class="bt" x="201.5" y="81.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:212"/><rect class="bt" x="241.5" y="81.5" width="37" height="37" rx="3" fill="#9AD6CA" style="--d:234"/><rect class="bt" x="281.5" y="81.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:256"/><rect class="bt" x="321.5" y="81.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:278"/><rect class="bt" x="361.5" y="81.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:300"/><rect class="bt" x="1.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:68"/><rect class="bt" x="41.5" y="121.5" width="37" height="37" rx="3" fill="#24918A" style="--d:90"/><rect class="bt" x="81.5" y="121.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:112"/><rect class="bt" x="121.5" y="121.5" width="37" height="37" rx="3" fill="#24918A" style="--d:134"/><rect class="bt" x="161.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:156"/><rect class="bt" x="201.5" y="121.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:178"/><rect class="bt" x="241.5" y="121.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:200"/><rect class="bt" x="281.5" y="121.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:222"/><rect class="bt" x="321.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:244"/><rect class="bt" x="361.5" y="121.5" width="37" height="37" rx="3" fill="#9AD6CA" style="--d:266"/><rect class="bt" x="1.5" y="161.5" width="37" height="37" rx="3" fill="#24918A" style="--d:34"/><rect class="bt" x="41.5" y="161.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:56"/><rect class="bt" x="81.5" y="161.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:78"/><rect class="bt" x="121.5" y="161.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:100"/><rect class="bt" x="161.5" y="161.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:122"/><rect class="bt" x="201.5" y="161.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:144"/><rect class="bt" x="241.5" y="161.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:166"/><rect class="bt" x="281.5" y="161.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:188"/><rect class="bt" x="321.5" y="161.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:210"/><rect class="bt" x="361.5" y="161.5" width="37" height="37" rx="3" fill="#24918A" style="--d:232"/><rect class="bt" x="1.5" y="201.5" width="37" height="37" rx="3" fill="#24918A" style="--d:0"/><rect class="bt" x="41.5" y="201.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:22"/><rect class="bt" x="81.5" y="201.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:44"/><rect class="bt" x="121.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:66"/><rect class="bt" x="161.5" y="201.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:88"/><rect class="bt" x="201.5" y="201.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:110"/><rect class="bt" x="241.5" y="201.5" width="37" height="37" rx="3" fill="#7FCABD" style="--d:132"/><rect class="bt" x="281.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:154"/><rect class="bt" x="321.5" y="201.5" width="37" height="37" rx="3" fill="#9AD6CA" style="--d:176"/><rect class="bt" x="361.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:198"/></svg></div>
          <h3>Tiled bathrooms</h3>
          <p>Tiles fitted neatly, in the colour, size and pattern you choose. A good fit for feature walls and a classic finish.</p>
        </div>
      </article>
      <article class="cell bezel" id="strip-out" style="--span:5" data-reveal>
        <div class="bezel__core">
          <span class="cell__icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-strip"/></svg></span>
          <h3>Bathroom strip-out</h3>
          <p>We take out your old bathroom, ready for the new one to go in. You don’t need to clear anything before we start.</p>
        </div>
      </article>
      <article class="cell bezel cell--coral" id="fitting" style="--span:7" data-reveal>
        <div class="bezel__core">
          <span class="cell__icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-bath"/></svg></span>
          <h3>Fitting your new bathroom</h3>
          <p>Every part of your new bathroom fitted to a high standard, using goods from trusted, well-known brands.</p>
          <ul class="chips"><li>Baths</li><li>Showers</li><li>Toilets</li><li>Basins</li><li>Taps</li><li>Furniture</li></ul>
        </div>
      </article>
      <article class="cell bezel" id="rubbish" style="--span:6" data-reveal>
        <div class="bezel__core">
          <span class="cell__icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-van"/></svg></span>
          <h3>Rubbish removal</h3>
          <p>We take all the rubbish away, from the old suite to the last offcut, so there’s nothing left for you to clear.</p>
        </div>
      </article>
      <article class="cell bezel cell--brand on-dark" id="updates" style="--span:6" data-reveal>
        <div class="bezel__core">
          <span class="cell__icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-chat"/></svg></span>
          <h3>Daily updates</h3>
          <p>Robert calls every morning and at the end of each day, and pops in once a day to check the work.</p>
          <ul class="chips"><li><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-sun"/></svg>Morning call</li><li><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-home"/></svg>Daily visit</li><li><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-sunset"/></svg>End-of-day call</li></ul>
        </div>
      </article>
    </div>
  </div>
</section>

<section class="section section--flush-top" aria-labelledby="ribbon-title">
  <div class="container">
    <div class="ribbon" data-reveal>
      <p class="ribbon__amount" aria-hidden="true">£0</p>
      <div>
        <h2 id="ribbon-title">No fitting cost to pay until you’re happy with the whole job.</h2>
        <p>Check the finished bathroom first. If anything isn’t right, we put it right before you pay for the fitting.</p>
      </div>
      <a class="btn btn--brand" href="tel:+447549348636">Call +44 7549 348636 <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg></span></a>
    </div>
  </div>
</section>

<section class="section section--flush-top faq" id="faq" aria-labelledby="faq-title">
  <div class="container faq__grid">
    <div class="faq__intro" data-reveal>
      <h2 id="faq-title">Questions people ask</h2>
      <p class="lead">Straight answers about how a bathroom refit with us works.</p>
      <p class="faq__updated">Last updated <time datetime="2026-10-14">14 October 2026</time></p>
    </div>
    <div class="faq__list" data-reveal style="--i:1">
      <details class="faq__item" id="faq-types" open>
        <summary>What types of bathroom do you fit?<span class="faq__toggle" aria-hidden="true"></span></summary>
        <div class="faq__answer"><p>Central Scotland Bathroom Consultancy fits wet wall bathrooms, which use large waterproof wall panels, and fully tiled bathrooms. Every job includes stripping out the old bathroom, fitting the new goods to a high standard and taking all the rubbish away.</p></div>
      </details>
      <details class="faq__item" id="faq-wet-wall">
        <summary>What is a wet wall bathroom?<span class="faq__toggle" aria-hidden="true"></span></summary>
        <div class="faq__answer"><p>A wet wall bathroom uses large waterproof panels on the walls instead of tiles. The panels have very few joints and no grout lines, so they wipe clean with a cloth and leave fewer places for mould to build up.</p></div>
      </details>
      <details class="faq__item" id="faq-choose">
        <summary>Should I choose wet wall panels or tiles?<span class="faq__toggle" aria-hidden="true"></span></summary>
        <div class="faq__answer"><p>Choose wet wall panels if you want a grout-free finish that’s usually faster to fit. Choose tiles if you want the widest choice of colour, size and pattern. Robert can talk you through both for your bathroom and budget.</p></div>
      </details>
      <details class="faq__item" id="faq-rubbish">
        <summary>Do you take the old bathroom away?<span class="faq__toggle" aria-hidden="true"></span></summary>
        <div class="faq__answer"><p>Yes. We strip out your old bathroom and take all the rubbish away, including the old suite and any offcuts from the new fit. There’s nothing left for you to clear when the job is finished.</p></div>
      </details>
      <details class="faq__item" id="faq-updates">
        <summary>How will I know what’s happening each day?<span class="faq__toggle" aria-hidden="true"></span></summary>
        <div class="faq__answer"><p>Robert calls you every morning to explain what’s happening that day. He visits once a day to check the work and answer questions, then calls again at the end of the day to tell you what got done.</p></div>
      </details>
      <details class="faq__item" id="faq-pay">
        <summary>When do I pay for the fitting?<span class="faq__toggle" aria-hidden="true"></span></summary>
        <div class="faq__answer"><p>You pay the fitting cost once you’re happy with the whole job. Check the finished bathroom first, and if anything isn’t right, tell us and we’ll put it right before you pay for the fitting.</p></div>
      </details>
      <details class="faq__item" id="faq-brands">
        <summary>Which brands do you fit?<span class="faq__toggle" aria-hidden="true"></span></summary>
        <div class="faq__answer"><p>We fit goods from trusted, well-known bathroom brands. If you already have a brand, range or product in mind, mention it when you get in touch and Robert will talk it through with you.</p></div>
      </details>
      <details class="faq__item" id="faq-area">
        <summary>Which areas do you cover?<span class="faq__toggle" aria-hidden="true"></span></summary>
        <div class="faq__answer"><p>We fit bathrooms across Central Scotland. Call Robert on +44 7549 348636 or send a message with your town or postcode, and he’ll confirm whether we cover your area.</p></div>
      </details>
      <details class="faq__item" id="faq-since">
        <summary>How long have you been fitting bathrooms?<span class="faq__toggle" aria-hidden="true"></span></summary>
        <div class="faq__answer"><p>Central Scotland Bathroom Consultancy has fitted wet wall and tiled bathrooms since 2019. Robert Stevenson runs the business and keeps in touch with every customer personally while their bathroom is fitted.</p></div>
      </details>
      <details class="faq__item" id="faq-quote">
        <summary>How do I ask for a quote?<span class="faq__toggle" aria-hidden="true"></span></summary>
        <div class="faq__answer"><p>Call Robert on +44 7549 348636, send a WhatsApp message, email info@centralscotlandbathrooms.co.uk, or fill in the form on our contact page with a few details about your bathroom.</p></div>
      </details>
    </div>
  </div>
</section>

<section class="section cta" aria-labelledby="cta-title">
  <div class="container">
    <div class="cta-band on-dark" data-reveal>
      <svg class="cta-band__art" viewBox="0 0 400 240" aria-hidden="true" focusable="false"><rect width="400" height="240" fill="#d6e8e3"/><rect class="bt" x="1.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:170"/><rect class="bt" x="41.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:192"/><rect class="bt" x="81.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:214"/><rect class="bt" x="121.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:236"/><rect class="bt" x="161.5" y="1.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:258"/><rect class="bt" x="201.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:280"/><rect class="bt" x="241.5" y="1.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:302"/><rect class="bt" x="281.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:324"/><rect class="bt" x="321.5" y="1.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:346"/><rect class="bt" x="361.5" y="1.5" width="37" height="37" rx="3" fill="#24918A" style="--d:368"/><rect class="bt" x="1.5" y="41.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:136"/><rect class="bt" x="41.5" y="41.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:158"/><rect class="bt" x="81.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:180"/><rect class="bt" x="121.5" y="41.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:202"/><rect class="bt" x="161.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:224"/><rect class="bt" x="201.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:246"/><rect class="bt" x="241.5" y="41.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:268"/><rect class="bt" x="281.5" y="41.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:290"/><rect class="bt" x="321.5" y="41.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:312"/><rect class="bt" x="361.5" y="41.5" width="37" height="37" rx="3" fill="#24918A" style="--d:334"/><rect class="bt" x="1.5" y="81.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:102"/><rect class="bt" x="41.5" y="81.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:124"/><rect class="bt" x="81.5" y="81.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:146"/><rect class="bt" x="121.5" y="81.5" width="37" height="37" rx="3" fill="#24918A" style="--d:168"/><rect class="bt" x="161.5" y="81.5" width="37" height="37" rx="3" fill="#24918A" style="--d:190"/><rect class="bt" x="201.5" y="81.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:212"/><rect class="bt" x="241.5" y="81.5" width="37" height="37" rx="3" fill="#9AD6CA" style="--d:234"/><rect class="bt" x="281.5" y="81.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:256"/><rect class="bt" x="321.5" y="81.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:278"/><rect class="bt" x="361.5" y="81.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:300"/><rect class="bt" x="1.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:68"/><rect class="bt" x="41.5" y="121.5" width="37" height="37" rx="3" fill="#24918A" style="--d:90"/><rect class="bt" x="81.5" y="121.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:112"/><rect class="bt" x="121.5" y="121.5" width="37" height="37" rx="3" fill="#24918A" style="--d:134"/><rect class="bt" x="161.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:156"/><rect class="bt" x="201.5" y="121.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:178"/><rect class="bt" x="241.5" y="121.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:200"/><rect class="bt" x="281.5" y="121.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:222"/><rect class="bt" x="321.5" y="121.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:244"/><rect class="bt" x="361.5" y="121.5" width="37" height="37" rx="3" fill="#9AD6CA" style="--d:266"/><rect class="bt" x="1.5" y="161.5" width="37" height="37" rx="3" fill="#24918A" style="--d:34"/><rect class="bt" x="41.5" y="161.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:56"/><rect class="bt" x="81.5" y="161.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:78"/><rect class="bt" x="121.5" y="161.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:100"/><rect class="bt" x="161.5" y="161.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:122"/><rect class="bt" x="201.5" y="161.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:144"/><rect class="bt" x="241.5" y="161.5" width="37" height="37" rx="3" fill="#3AA99C" style="--d:166"/><rect class="bt" x="281.5" y="161.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:188"/><rect class="bt" x="321.5" y="161.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:210"/><rect class="bt" x="361.5" y="161.5" width="37" height="37" rx="3" fill="#24918A" style="--d:232"/><rect class="bt" x="1.5" y="201.5" width="37" height="37" rx="3" fill="#24918A" style="--d:0"/><rect class="bt" x="41.5" y="201.5" width="37" height="37" rx="3" fill="#2C9C92" style="--d:22"/><rect class="bt" x="81.5" y="201.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:44"/><rect class="bt" x="121.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:66"/><rect class="bt" x="161.5" y="201.5" width="37" height="37" rx="3" fill="#1A6E68" style="--d:88"/><rect class="bt" x="201.5" y="201.5" width="37" height="37" rx="3" fill="#4DB3A6" style="--d:110"/><rect class="bt" x="241.5" y="201.5" width="37" height="37" rx="3" fill="#7FCABD" style="--d:132"/><rect class="bt" x="281.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:154"/><rect class="bt" x="321.5" y="201.5" width="37" height="37" rx="3" fill="#9AD6CA" style="--d:176"/><rect class="bt" x="361.5" y="201.5" width="37" height="37" rx="3" fill="#1F7F76" style="--d:198"/></svg>
      <div class="cta-band__copy">
        <h2 id="cta-title">Talk to Robert about your bathroom.</h2>
        <p class="lead">Fitting wet wall and tiled bathrooms across Central Scotland since <span class="since">2019</span>.</p>
      </div>
      <div class="cta-band__actions">
        <a class="btn btn--primary" href="tel:+447549348636">Call +44 7549 348636 <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg></span></a>
        <a class="btn btn--wa" href="https://wa.me/447549348636?text=Hi%20Robert%2C%20I%E2%80%99d%20like%20to%20talk%20about%20a%20new%20bathroom." target="_blank" rel="noopener">WhatsApp Robert <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg></span></a>
        <a class="btn btn--ghost" href="{{ route('contact') }}#quote">Ask for a quote <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></span></a>
      </div>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection