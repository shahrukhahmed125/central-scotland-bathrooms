/* Central Scotland Bathroom Consultancy: site behaviour (jQuery 3.7.1).
   Every feature checks that its markup exists, so one file serves all pages. */
(function ($) {
  'use strict';

  // Contact details used by the enquiry form. Update these in one place.
  var CONTACT = {
    phoneDisplay: '+44 7549 348636',
    email: 'info@centralscotlandbathrooms.co.uk',
    whatsapp: '447549348636'
  };

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  var hasIO = 'IntersectionObserver' in window;

  /* Header: stronger shadow once the page has scrolled (sentinel, no scroll listener) */
  function initHeader() {
    var $header = $('[data-header]');
    var sentinel = document.querySelector('[data-header-sentinel]');
    if (!$header.length || !sentinel || !hasIO) { return; }
    new IntersectionObserver(function (entries) {
      $header.toggleClass('is-scrolled', !entries[0].isIntersecting);
    }).observe(sentinel);
  }

  /* Mobile menu: morphing toggle, staggered links, focus trap, Esc to close */
  function initMenu() {
    var $toggle = $('[data-menu-toggle]');
    var $menu = $('#mobile-menu');
    if (!$toggle.length || !$menu.length) { return; }

    function focusables() {
      return $menu.find('a, button').add($toggle).filter(':visible');
    }

    function open() {
      $menu.removeAttr('hidden');
      $toggle.attr({ 'aria-expanded': 'true', 'aria-label': 'Close menu' });
      $('body').addClass('has-menu-open');
      window.requestAnimationFrame(function () {
        window.requestAnimationFrame(function () { $menu.addClass('is-open'); });
      });
      $menu.find('a').first().trigger('focus');
    }

    function close(returnFocus) {
      $menu.removeClass('is-open');
      $toggle.attr({ 'aria-expanded': 'false', 'aria-label': 'Open menu' });
      $('body').removeClass('has-menu-open');
      window.setTimeout(function () {
        if ($toggle.attr('aria-expanded') === 'false') { $menu.attr('hidden', ''); }
      }, reduceMotion.matches ? 0 : 320);
      if (returnFocus) { $toggle.trigger('focus'); }
    }

    $toggle.on('click', function () {
      if ($toggle.attr('aria-expanded') === 'true') { close(false); } else { open(); }
    });

    $menu.on('click', 'a', function () { close(false); });

    $(document).on('keydown', function (e) {
      if ($toggle.attr('aria-expanded') !== 'true') { return; }
      if (e.key === 'Escape') { close(true); return; }
      if (e.key === 'Tab') {
        var $f = focusables();
        var first = $f.get(0);
        var last = $f.get($f.length - 1);
        if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
        else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
      }
    });

    window.matchMedia('(min-width: 901px)').addEventListener('change', function (mq) {
      if (mq.matches && $toggle.attr('aria-expanded') === 'true') { close(false); }
    });
  }

  /* Scroll reveal: IntersectionObserver adds .is-in once per element */
  function initReveal() {
    var items = document.querySelectorAll('[data-reveal]');
    if (!items.length) { return; }
    if (!hasIO) { $(items).addClass('is-in'); return; }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-in');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.18, rootMargin: '0px 0px -6% 0px' });
    items.forEach(function (el) { io.observe(el); });
  }

  /* Number counters: count up to the value already printed in the HTML */
  function initCounters() {
    var counters = document.querySelectorAll('[data-count]');
    if (!counters.length || !hasIO || reduceMotion.matches) { return; }

    function run(el) {
      var to = parseInt(el.getAttribute('data-count'), 10);
      var from = parseInt(el.getAttribute('data-from') || '0', 10);
      var duration = 1600;
      var start = null;
      function frame(now) {
        if (start === null) { start = now; }
        var t = Math.min((now - start) / duration, 1);
        var eased = t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
        el.textContent = String(Math.round(from + (to - from) * eased));
        if (t < 1) { window.requestAnimationFrame(frame); }
      }
      window.requestAnimationFrame(frame);
    }

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          run(entry.target);
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.6 });
    counters.forEach(function (el) {
      el.textContent = el.getAttribute('data-from') || '0';
      io.observe(el);
    });
  }

  /* Hero scene: pause the running shower when it is off screen */
  function initScene() {
    var scene = document.querySelector('[data-scene]');
    if (!scene || !hasIO) { return; }
    new IntersectionObserver(function (entries) {
      scene.classList.toggle('is-paused', !entries[0].isIntersecting);
    }).observe(scene);
  }

  /* Wet wall vs tiles: range input drives the --pos custom property */
  function initCompare() {
    var $compare = $('[data-compare]');
    if (!$compare.length) { return; }
    var $range = $compare.find('input[type="range"]');
    var swept = false;
    var touched = false;

    function set(value) {
      var v = Math.max(0, Math.min(100, value));
      $compare[0].style.setProperty('--pos', v + '%');
      $range.val(Math.round(v));
      $range.attr('aria-valuetext', Math.round(v) + '% tiles, ' + (100 - Math.round(v)) + '% wet wall panels');
    }

    $range.on('input', function () {
      touched = true;
      set(parseFloat(this.value));
    });

    set(parseFloat($range.val()));

    // A single gentle sweep shows the handle can move. Skipped for reduced motion.
    if (!hasIO || reduceMotion.matches) { return; }
    var io = new IntersectionObserver(function (entries) {
      if (!entries[0].isIntersecting || swept) { return; }
      swept = true;
      io.disconnect();
      var keys = [[0, 50], [700, 32], [1500, 68], [2200, 50]];
      var start = null;
      function frame(now) {
        if (touched) { return; }
        if (start === null) { start = now; }
        var t = now - start;
        var i = 0;
        while (i < keys.length - 2 && t > keys[i + 1][0]) { i++; }
        var a = keys[i];
        var b = keys[i + 1];
        var p = Math.min(Math.max((t - a[0]) / (b[0] - a[0]), 0), 1);
        var eased = p < 0.5 ? 4 * p * p * p : 1 - Math.pow(-2 * p + 2, 3) / 2;
        set(a[1] + (b[1] - a[1]) * eased);
        if (t < keys[keys.length - 1][0]) { window.requestAnimationFrame(frame); }
      }
      window.setTimeout(function () { window.requestAnimationFrame(frame); }, 500);
    }, { threshold: 0.6 });
    io.observe($compare[0]);
  }

  /* Enquiry form: validate, then open email or WhatsApp with the details filled in */
  function initForm() {
    var $form = $('[data-enquiry]');
    if (!$form.length) { return; }
    var $status = $form.find('[data-form-status]');
    var method = 'email';

    var rules = {
      name: function (v) { return v ? '' : 'Enter your name.'; },
      phone: function (v) {
        var digits = v.replace(/[^\d]/g, '');
        if (!v) { return 'Enter a phone number Robert can call you on.'; }
        return digits.length >= 10 ? '' : 'Enter a full phone number, including the area code.';
      },
      email: function (v) {
        if (!v) { return ''; }
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v) ? '' : 'Enter an email address like name@example.com, or leave it blank.';
      },
      town: function (v) { return v ? '' : 'Enter your town or postcode.'; }
    };

    function check(name) {
      var $input = $form.find('[name="' + name + '"]');
      var message = rules[name]($.trim($input.val()));
      $input.attr('aria-invalid', message ? 'true' : 'false');
      $('#' + name + '-error').text(message);
      return !message;
    }

    $.each(rules, function (name) {
      $form.find('[name="' + name + '"]').on('blur', function () {
        if ($.trim(this.value) || $(this).attr('aria-invalid') === 'true') { check(name); }
      }).on('input', function () {
        if ($(this).attr('aria-invalid') === 'true') { check(name); }
      });
    });

    $form.find('[data-send]').on('click', function () {
      method = $(this).attr('data-send');
    });

    function value(name) {
      return $.trim($form.find('[name="' + name + '"]').val() || '');
    }

    function buildMessage() {
      var type = $form.find('[name="bathroom"]:checked').val() || 'Not sure yet';
      var lines = [
        'Bathroom enquiry from the website',
        '',
        'Name: ' + value('name'),
        'Phone: ' + value('phone')
      ];
      if (value('email')) { lines.push('Email: ' + value('email')); }
      lines.push('Town or postcode: ' + value('town'));
      lines.push('Bathroom type: ' + type);
      lines.push('Best time to call: ' + (value('time') || 'Any time'));
      if (value('message')) {
        lines.push('', 'About the bathroom:', value('message'));
      }
      return lines.join('\r\n');
    }

    $form.on('submit', function (e) {
      e.preventDefault();
      $status.removeClass('is-error is-ok').text('');

      var firstBad = null;
      $.each(rules, function (name) {
        if (!check(name) && !firstBad) { firstBad = name; }
      });

      if (firstBad) {
        $status.addClass('is-error').text('Some details need fixing before you send. Check the highlighted fields.');
        $form.find('[name="' + firstBad + '"]').trigger('focus');
        return;
      }

      var body = buildMessage();
      if (method === 'whatsapp') {
        var waUrl = 'https://wa.me/' + CONTACT.whatsapp + '?text=' + encodeURIComponent(body);
        var win = window.open(waUrl, '_blank', 'noopener');
        if (!win) { window.location.href = waUrl; }
        $status.addClass('is-ok').text('WhatsApp is opening with your details. Press send in WhatsApp to message Robert.');
      } else {
        var subject = 'Bathroom enquiry: ' + value('name') + ', ' + value('town');
        window.location.href = 'mailto:' + CONTACT.email +
          '?subject=' + encodeURIComponent(subject) +
          '&body=' + encodeURIComponent(body);
        $status.addClass('is-ok').text('Your email app is opening with your details. Press send there. If nothing opens, email ' +
          CONTACT.email + ' or call ' + CONTACT.phoneDisplay + '.');
      }
    });
  }

  /* Footer year */
  function initYear() {
    $('[data-year]').text(String(new Date().getFullYear()));
  }

  /* Gallery: category filtering */
  function initGallery() {
    var $gallery = $('[data-gallery]');
    var $filters = $('.gallery-filter');
    var $items = $('.gallery-item');
    var $empty = $('[data-gallery-empty]');
    if (!$gallery.length || !$filters.length) { return; }

    $filters.on('click', function () {
      var filter = $(this).attr('data-filter');
      $filters.attr('aria-pressed', 'false');
      $(this).attr('aria-pressed', 'true');

      var visibleCount = 0;
      $items.each(function () {
        var category = $(this).attr('data-category');
        if (filter === 'all' || category === filter) {
          $(this).removeAttr('hidden');
          visibleCount++;
        } else {
          $(this).attr('hidden', '');
        }
      });

      $empty.attr('hidden', visibleCount > 0 ? '' : null);
    });
  }

  /* Lightbox: image viewer with navigation */
  function initLightbox() {
    var $lightbox = $('[data-lightbox]');
    var $triggers = $('.gallery-item__trigger');
    var $close = $lightbox.find('.lightbox__close');
    var $prev = $lightbox.find('.lightbox__nav--prev');
    var $next = $lightbox.find('.lightbox__nav--next');
    var $image = $lightbox.find('.lightbox__image');
    if (!$lightbox.length || !$triggers.length) { return; }

    var currentIndex = 0;
    var visibleItems = [];

    function getVisibleItems() {
      return $('.gallery-item:not([hidden])');
    }

    function updateImage() {
      var currentTrigger = visibleItems[currentIndex].querySelector('.gallery-item__trigger');
      var currentImg = currentTrigger.querySelector('img');
      if (currentImg) {
        $image.attr('src', currentImg.src);
        $image.attr('alt', currentImg.alt);
      }
      var currentAriaLabel = currentTrigger ? currentTrigger.getAttribute('aria-label') : '';
      $lightbox.attr('aria-label', currentAriaLabel || 'Image viewer');
      $prev.attr('aria-disabled', currentIndex === 0 ? 'true' : 'false');
      $next.attr('aria-disabled', currentIndex === visibleItems.length - 1 ? 'true' : 'false');
    }

    function open(index) {
      visibleItems = getVisibleItems();
      currentIndex = Math.max(0, Math.min(index, visibleItems.length - 1));
      updateImage();
      $lightbox.removeAttr('hidden').attr('aria-hidden', 'false');
      $close.trigger('focus');
      $('body').addClass('has-menu-open');
    }

    function close() {
      $lightbox.attr('hidden', '').attr('aria-hidden', 'true');
      $('body').removeClass('has-menu-open');
      if (visibleItems[currentIndex]) {
        visibleItems[currentIndex].querySelector('.gallery-item__trigger').trigger('focus');
      }
    }

    function next() {
      if (currentIndex < visibleItems.length - 1) {
        currentIndex++;
        updateImage();
      }
    }

    function prev() {
      if (currentIndex > 0) {
        currentIndex--;
        updateImage();
      }
    }

    $triggers.on('click', function () {
      var index = getVisibleItems().index($(this).closest('.gallery-item'));
      open(index);
    });

    $close.on('click', close);
    $next.on('click', next);
    $prev.on('click', prev);

    $lightbox.on('click', '.lightbox__backdrop', close);

    $(document).on('keydown', function (e) {
      if ($lightbox.attr('hidden')) { return; }
      if (e.key === 'Escape') { close(); return; }
      if (e.key === 'ArrowRight') { next(); return; }
      if (e.key === 'ArrowLeft') { prev(); return; }
    });
  }

  $(function () {
    initHeader();
    initMenu();
    initReveal();
    initCounters();
    initScene();
    initCompare();
    initForm();
    initYear();
    initGallery();
    initLightbox();
  });
})(jQuery);
