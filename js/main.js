/**
 * Proofix Technologies - Site script (jQuery)
 * Header, mobile drawer, back-to-top, FAQ accordion,
 * and contact form. Icon and WhatsApp URLs come from wp_localize_script (proofix).
 */
jQuery(function ($) {
  'use strict';

  var $win = $(window);
  var $header = $('.site-header');
  var $nav = $('#nav');
  var $toggle = $('#menuToggle');
  var $toTop = $('#backToTop');

  // Sticky header shadow + back-to-top visibility
  function onScroll() {
    var y = $win.scrollTop();
    $header.toggleClass('scrolled', y > 8);
    $toTop.toggleClass('visible', y > 500);
  }
  $win.on('scroll', onScroll);
  onScroll();
  $toTop.on('click', function () { $('html, body').animate({ scrollTop: 0 }, 400); });

  // Mobile drawer (slides in from the right, with a dimmed overlay)
  var $overlay = $('<div class="nav-overlay"></div>').appendTo($header);
  function setDrawer(open) {
    $nav.toggleClass('open', open);
    $overlay.toggleClass('show', open);
    $toggle.attr('aria-expanded', open).find('img').attr('src', open ? proofix.iconUrl + 'xmark.svg' : proofix.iconUrl + 'bars.svg');
    $('body').css('overflow', open ? 'hidden' : '');
  }
  $toggle.on('click', function () { setDrawer(!$nav.hasClass('open')); });
  $overlay.add('#navClose').on('click', function () { setDrawer(false); });
  $nav.find('a').on('click', function () { setDrawer(false); });
  $win.on('resize', function () { if ($win.width() > 1050) setDrawer(false); });
  $('.has-menu > .nav-link').on('click', function () {
    if ($win.width() <= 1050) $(this).parent().toggleClass('open');
  });

  // FAQ accordion
  $('.faq-q').on('click', function () {
    var $item = $(this).closest('.faq-item');
    var $answer = $item.find('.faq-a');
    var open = $item.toggleClass('open').hasClass('open');
    $(this).attr('aria-expanded', open);
    $answer.css('max-height', open ? $answer[0].scrollHeight : 0);
  });

  // Contact form
  var $form = $('#contactLeadForm');
  if ($form.length) {
    var qs = new URLSearchParams(window.location.search);
    if (qs.get('service')) $('#inquiryService').val(qs.get('service'));
    if (qs.get('domain')) $('#inquiryDomain').val(qs.get('domain'));

    $form.on('submit', function (e) {
      e.preventDefault();
      var bad = false;
      var errMsg = 'Please complete the required fields with a valid email.';
      $('#fullName, #emailAddr, #phoneNum, #inquiryDomain, #researchStage').each(function () {
        var empty = !$.trim($(this).val());
        $(this).toggleClass('invalid', empty);
        bad = bad || empty;
      });
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($.trim($('#emailAddr').val()))) {
        $('#emailAddr').addClass('invalid');
        bad = true;
      }
      if (!/^[0-9+\-\s()]{7,20}$/.test($.trim($('#phoneNum').val()))) {
        $('#phoneNum').addClass('invalid');
        errMsg = 'Please enter a valid phone number (7-20 digits).';
        bad = true;
      }
      $('#formError').text(errMsg).toggle(bad);
      if (bad) return;

      var $btn = $form.find('button[type=submit]');
      if ($btn.prop('disabled')) return;
      var btnHtml = $btn.html();
      $btn.prop('disabled', true).addClass('is-loading').text('Submitting…');
      $.post(proofix.ajaxUrl, {
        action: 'proofix_contact',
        nonce: proofix.nonce,
        website: $('#website').val(),
        name: $.trim($('#fullName').val()),
        email: $.trim($('#emailAddr').val()),
        phone: $.trim($('#phoneNum').val()),
        domain: $('#inquiryDomain').val(),
        stage: $('#researchStage').val(),
        service: $('#inquiryService option:selected').text(),
        message: $.trim($('#inquiryMessage').val())
      }).done(showSuccess).fail(function (xhr) {
        var msg = xhr.responseJSON && xhr.responseJSON.data && xhr.responseJSON.data.message;
        $('#formError').text(msg || 'Something went wrong. Please try again or use WhatsApp.').show();
      }).always(function () {
        $btn.prop('disabled', false).removeClass('is-loading').html(btnHtml);
      });
    });

    $form.on('input change', '.invalid', function () { $(this).removeClass('invalid'); });

    function showSuccess() {
      var name = $.trim($('#fullName').val());
      var waText = encodeURIComponent(
        'Hello Proofix Technologies,\n\nName: ' + name +
        '\nEmail: ' + $.trim($('#emailAddr').val()) + '\nPhone: ' + $.trim($('#phoneNum').val()) +
        '\nDomain: ' + $('#inquiryDomain').val() + '\nStage: ' + $('#researchStage').val() +
        '\nService: ' + $('#inquiryService option:selected').text() + '\nMessage: ' + $.trim($('#inquiryMessage').val())
      );
      var $box = $('#formSuccessBox').empty();
      $('<img>', { 'class': 'icon big', src: proofix.iconUrl + 'circle-check.svg', alt: '' }).appendTo($box);
      $('<h3>').text('Thank you, ' + name + '!').appendTo($box);
      $('<p>').text('Your requirement has been received and a confirmation email is on its way. To reach our consultant fastest, send it on WhatsApp — we will schedule a consultation with a subject matter expert from your domain.').appendTo($box);
      $('<a>', { 'class': 'btn btn-whatsapp', target: '_blank', rel: 'noopener', href: proofix.whatsapp + '?text=' + waText })
        .html('<img class="icon" src="' + proofix.iconUrl + 'whatsapp.svg" alt=""> Continue on WhatsApp').appendTo($box);
      $form.hide();
      $box.fadeIn(250);
      $('html, body').animate({ scrollTop: $box.offset().top - 160 }, 400);
    }
  }
});
