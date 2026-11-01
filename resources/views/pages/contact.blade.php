@extends('layouts.app')

@section('title', 'Contact | Scotland Bathrooms')

@section('css')

@endsection

@section('content')

<main id="main">
<section class="page-hero page-hero--slim on-dark" aria-labelledby="page-title">
  <div class="container">
    <div class="page-hero__copy">
      <nav aria-label="Breadcrumb"><ol class="crumbs"><li><a href="{{ route('home') }}">Home</a></li><li aria-current="page">Contact</li></ol></nav>
      <h1 id="page-title">Let’s talk about your bathroom.</h1>
      <p class="lead">Call, WhatsApp or email Robert, or send your details with the form below.</p>
    </div>
  </div>
</section>

<section class="section contact" aria-label="Ways to get in touch">
  <div class="container contact__grid">
    <div class="contact__side" data-reveal>
      <h2>Talk to Robert directly</h2>
      <ul class="channels">
        <li><a class="channel channel--call" href="tel:{{ preg_replace('/[^0-9]/', '', $siteSettings->phone ?? '+447549348636') }}"><span class="channel__icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-phone"/></svg></span><span class="channel__text"><span class="channel__label">Call</span><span class="channel__value">{{ $siteSettings->phone ?? '+44 7549 348636' }}</span></span><svg class="icon channel__go" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></li>
        <li><a class="channel channel--wa" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteSettings->whatsapp ?? '+447549348636') }}?text=Hi%20Robert%2C%20I%E2%80%99d%20like%20to%20talk%20about%20a%20new%20bathroom." target="_blank" rel="noopener"><span class="channel__icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-whatsapp"/></svg></span><span class="channel__text"><span class="channel__label">WhatsApp</span><span class="channel__value">WhatsApp Robert</span></span><svg class="icon channel__go" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></li>
        <li><a class="channel" href="mailto:{{ $siteSettings->email ?? 'info@centralscotlandbathrooms.co.uk' }}?subject=Bathroom%20enquiry"><span class="channel__icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-mail"/></svg></span><span class="channel__text"><span class="channel__label">Email</span><span class="channel__value channel__value--email">{{ $siteSettings->email ?? 'info@centralscotlandbathrooms.co.uk' }}</span></span><svg class="icon channel__go" aria-hidden="true" focusable="false"><use href="#i-arrow"/></svg></a></li>
      </ul>
      <div class="area">
        <svg class="icon" aria-hidden="true" focusable="false"><use href="#i-pin"/></svg>
        <p><strong>We cover Central Scotland.</strong> Not sure if that includes you? Send your town or postcode and Robert will confirm.</p>
      </div>
    </div>

    <div class="form-card bezel" id="quote" data-reveal style="--i:1">
      <div class="bezel__core">
        <h2>Ask for a quote</h2>
        <p class="form-card__intro">Fill in a few details and we'll be in touch to discuss your bathroom project.</p>
        <form class="form" action="{{ route('contact.submit') }}" method="POST" data-enquiry novalidate>
          @csrf
          <input type="text" name="website" style="display:none;" tabindex="-1" autocomplete="off">
          <div class="form__row">
            <div class="field">
              <label for="name">Your name</label>
              <input id="name" name="name" type="text" autocomplete="name" required aria-describedby="name-error">
              <p class="field__error" id="name-error"></p>
            </div>
            <div class="field">
              <label for="phone">Phone number</label>
              <input id="phone" name="phone" type="tel" inputmode="tel" autocomplete="tel" required aria-describedby="phone-error">
              <p class="field__error" id="phone-error"></p>
            </div>
          </div>
          <div class="form__row">
            <div class="field">
              <label for="email">Email <span class="field__opt">(optional)</span></label>
              <input id="email" name="email" type="email" autocomplete="email" spellcheck="false" aria-describedby="email-error">
              <p class="field__error" id="email-error"></p>
            </div>
            <div class="field">
              <label for="town">Town or postcode</label>
              <input id="town" name="town" type="text" autocomplete="address-level2" required aria-describedby="town-error">
              <p class="field__error" id="town-error"></p>
            </div>
          </div>
          <fieldset class="field choices">
            <legend>Type of bathroom</legend>
            <div class="choices__row">
              <label class="choice"><input type="radio" name="bathroom_type" value="Wet wall"><span>Wet wall</span></label>
              <label class="choice"><input type="radio" name="bathroom_type" value="Tiled"><span>Tiled</span></label>
              <label class="choice"><input type="radio" name="bathroom_type" value="Not sure yet" checked><span>Not sure yet</span></label>
            </div>
          </fieldset>
          <div class="field">
            <label for="best_time_to_call">Best time to call</label>
            <select id="best_time_to_call" name="best_time_to_call">
              <option>Any time</option>
              <option>Morning</option>
              <option>Afternoon</option>
              <option>Evening</option>
            </select>
          </div>
          <div class="field">
            <label for="message">About your bathroom <span class="field__opt">(optional)</span></label>
            <textarea id="message" name="message" rows="5" autocomplete="off" aria-describedby="message-hint"></textarea>
            <p class="field__hint" id="message-hint">For example, the size of the room, what you’d like replaced and when you’d like the work done.</p>
          </div>
          <p class="form__status" data-form-status role="status" aria-live="polite"></p>
          <div class="form__actions">
            <button class="btn btn--primary" type="submit">Send enquiry <span class="btn__bubble"><svg class="icon" aria-hidden="true" focusable="false"><use href="#i-mail"/></svg></span></button>
          </div>
          <p class="form__note">Prefer to call or message directly? Use the contact options above.</p>
        </form>
      </div>
    </div>
  </div>
</section>
</main>

@endsection

@section('js')

@endsection