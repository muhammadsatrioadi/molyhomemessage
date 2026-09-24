(function () {
    'use strict';

    var services = window.MOLY_SERVICES || [];

    function debounce(fn, wait) {
        var timeout;
        return function () {
            var args = arguments,
                ctx = this;
            clearTimeout(timeout);
            timeout = setTimeout(function () { fn.apply(ctx, args); }, wait);
        };
    }

    function handleNavbarScroll() {
        var navbar = document.getElementById('moly-navbar');
        if (!navbar) return;
        var y = window.scrollY || window.pageYOffset;
        if (y > 40) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    }

    function initSmoothScrollLinks() {
        var anchors = document.querySelectorAll('a[href^="#"]');
        anchors.forEach(function (link) {
            var targetId = link.getAttribute('href');
            if (!targetId || targetId.length < 2) return;
            var target = document.querySelector(targetId);
            if (!target) return;
            link.addEventListener('click', function (ev) {
                var bsTarget = link.getAttribute('data-bs-target');
                var bsToggle = link.getAttribute('data-bs-toggle');
                if (bsToggle && bsTarget) return;
                ev.preventDefault();
                var navbarH = (document.getElementById('moly-navbar') || {}).offsetHeight || 0;
                var pos = target.getBoundingClientRect().top + window.pageYOffset - navbarH - 16;
                window.scrollTo({ top: pos, behavior: 'smooth' });
                var mobCollapse = document.querySelector('#molyNavMenu.show');
                if (mobCollapse && typeof bootstrap !== 'undefined') {
                    var inst = bootstrap.Collapse.getInstance(mobCollapse);
                    if (inst) inst.hide();
                }
            });
        });
    }

    function initRevealAnimations() {
        var selectors = ['.reveal', '.reveal-delay-1', '.reveal-delay-2', '.reveal-delay-3'];
        var els = document.querySelectorAll(selectors.join(','));
        if (!('IntersectionObserver' in window)) {
            els.forEach(function (el) { el.classList.add('is-visible'); });
            return;
        }
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -40px 0px'
        });
        els.forEach(function (el) { io.observe(el); });
    }

    function getCurrencySymbol() {
        return 'RM';
    }

    function populateServiceOptions() {
        var serviceSel = document.getElementById('booking_service');
        if (!serviceSel) return;
        if (!services || services.length === 0) return;
        var placeholderOpt = serviceSel.querySelector('option[value=""]');
        serviceSel.innerHTML = '';
        if (placeholderOpt) serviceSel.appendChild(placeholderOpt.cloneNode(true));
        services.forEach(function (svc) {
            var opt = document.createElement('option');
            opt.value = String(svc.id);
            opt.dataset.name = svc.name;
            opt.textContent = svc.name;
            serviceSel.appendChild(opt);
        });
    }

    function updateDurationOptions(serviceId) {
        var durationSel = document.getElementById('booking_duration');
        if (!durationSel) return;
        var placeholderOpt = durationSel.querySelector('option[value=""]');
        durationSel.innerHTML = '';
        if (placeholderOpt) durationSel.appendChild(placeholderOpt.cloneNode(true));
        if (!serviceId) return;
        var svc = null;
        for (var i = 0; i < services.length; i++) {
            if (String(services[i].id) === String(serviceId)) {
                svc = services[i];
                break;
            }
        }
        if (!svc || !svc.prices || !svc.prices.length) return;
        svc.prices.forEach(function (price) {
            var opt = document.createElement('option');
            opt.value = String(price.duration);
            opt.dataset.price = String(price.price);
            opt.textContent = price.duration + ' MIN';
            durationSel.appendChild(opt);
        });
    }

    function setMinBookingDate() {
        var dateEl = document.getElementById('booking_date');
        if (!dateEl) return;
        var today = new Date();
        var yyyy = today.getFullYear();
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var dd = String(today.getDate()).padStart(2, '0');
        dateEl.setAttribute('min', yyyy + '-' + mm + '-' + dd);
        if (!dateEl.value) dateEl.value = yyyy + '-' + mm + '-' + dd;
    }

    function initBookingModal() {
        populateServiceOptions();
        setMinBookingDate();
        var bookBtns = document.querySelectorAll('.book-service-btn, .book-nav-btn, [data-bs-target="#bookingModal"]');
        bookBtns.forEach(function (btn) {
            btn.addEventListener('click', function (ev) {
                var serviceId = btn.getAttribute('data-service-id');
                var serviceName = btn.getAttribute('data-service-name');
                setTimeout(function () {
                    var serviceSel = document.getElementById('booking_service');
                    if (serviceSel && serviceId) {
                        serviceSel.value = String(serviceId);
                        updateDurationOptions(String(serviceId));
                    } else {
                        populateServiceOptions();
                    }
                }, 30);
            });
        });

        var serviceSel = document.getElementById('booking_service');
        if (serviceSel) {
            serviceSel.addEventListener('change', function () {
                updateDurationOptions(serviceSel.value);
                var durSel = document.getElementById('booking_duration');
                if (durSel) durSel.value = '';
            });
        }

        var bookingForm = document.getElementById('bookingForm');
        if (bookingForm) {
            bookingForm.addEventListener('submit', function (ev) {
                ev.preventDefault();
                var svcSel = document.getElementById('booking_service');
                var durSel = document.getElementById('booking_duration');
                var dateEl = document.getElementById('booking_date');
                var timeEl = document.getElementById('booking_time');
                var locEl = document.getElementById('booking_location');

                if (!svcSel || !durSel || !dateEl || !timeEl || !locEl) return;

                var svcId = svcSel.value;
                var durVal = durSel.value;
                var dateVal = dateEl.value;
                var timeVal = timeEl.value;
                var locVal = locEl.value.trim();

                if (!svcId || !durVal || !dateVal || !timeVal || !locVal) {
                    var firstEmpty = !svcId ? svcSel : (!durVal ? durSel : (!dateVal ? dateEl : (!timeVal ? timeEl : locEl)));
                    if (firstEmpty && typeof firstEmpty.focus === 'function') firstEmpty.focus();
                    return;
                }

                var serviceName = svcSel.options[svcSel.selectedIndex].getAttribute('data-name')
                    || svcSel.options[svcSel.selectedIndex].textContent.split('—')[0].trim();
                var durationLabel = durVal + ' minutes';
                try {
                    var d = new Date(dateVal + 'T00:00:00');
                    if (!isNaN(d.getTime())) {
                        var day = String(d.getDate()).padStart(2, '0');
                        var mmm = d.toLocaleString('en-MY', { month: 'short' });
                        var yyyy = d.getFullYear();
                        dateVal = day + ' ' + mmm + ' ' + yyyy;
                    }
                    var t = new Date('2000-01-01T' + timeVal + ':00');
                    if (!isNaN(t.getTime())) {
                        var hh = t.getHours();
                        var mi = String(t.getMinutes()).padStart(2, '0');
                        var ampm = hh >= 12 ? 'PM' : 'AM';
                        var h12 = hh % 12 || 12;
                        timeVal = String(h12) + ':' + mi + ' ' + ampm;
                    }
                } catch (e) { /* keep raw value */ }

                var waNumber = (window.MOLY_WHATSAPP || '').replace(/\D+/g, '');
                var messageLines = [
                    'Hello ' + (window.MOLY_BUSINESS_NAME || 'MOLLY KL HOME MASSAGE') + ',',
                    '',
                    'I would like to book:',
                    '',
                    'Massage: ' + serviceName,
                    'Duration: ' + durationLabel,
                    'Preferred date: ' + dateVal,
                    'Preferred time: ' + timeVal,
                    'Location: ' + locVal
                ];
                var message = messageLines.join('\n');
                var waUrl = 'https://wa.me/' + waNumber + '?text=' + encodeURIComponent(message);
                window.open(waUrl, '_blank', 'noopener,noreferrer');
            });
        }
    }

    function initMobileInteractions() {
        var navToggler = document.querySelector('.navbar-toggler');
        var navCollapse = document.getElementById('molyNavMenu');
        if (!navToggler || !navCollapse) return;
        var navLinks = navCollapse.querySelectorAll('.nav-link');
        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                if (navCollapse.classList.contains('show') && typeof bootstrap !== 'undefined') {
                    var inst = bootstrap.Collapse.getInstance(navCollapse);
                    if (inst) inst.hide();
                }
            });
        });
    }

    function setWhatsAppGlobalFromDom() {
        if (window.MOLY_WHATSAPP) return;
        var contactLinks = document.querySelectorAll('a[href*="wa.me/"], a[href*="api.whatsapp.com/"]');
        for (var i = 0; i < contactLinks.length; i++) {
            var href = contactLinks[i].getAttribute('href') || '';
            var m = href.match(/wa\.me\/(\d+)/) || href.match(/phone=(\d+)/);
            if (m && m[1]) {
                window.MOLY_WHATSAPP = m[1];
                break;
            }
        }
    }

    var floatingWhatsAppMobileQuery = window.matchMedia('(max-width: 767.98px)');
    var floatingWhatsAppSafeBottom = null;
    var floatingWhatsAppFramePending = false;

    function getFloatingWhatsAppSafeBottom() {
        if (floatingWhatsAppSafeBottom !== null) return floatingWhatsAppSafeBottom;

        floatingWhatsAppSafeBottom = 0;
        try {
            var probe = document.createElement('div');
            probe.style.cssText = 'position:absolute;visibility:hidden;pointer-events:none;padding-bottom:env(safe-area-inset-bottom,0px);';
            document.body.appendChild(probe);
            floatingWhatsAppSafeBottom = parseFloat(window.getComputedStyle(probe).paddingBottom) || 0;
            document.body.removeChild(probe);
        } catch (e) {
            floatingWhatsAppSafeBottom = 0;
        }

        return floatingWhatsAppSafeBottom;
    }

    function clearFloatingWhatsAppInlinePosition(whatsapp) {
        whatsapp.style.removeProperty('top');
        whatsapp.style.removeProperty('bottom');
        whatsapp.style.removeProperty('--wa-viewport-offset');
    }

    function updateFloatingWhatsAppPosition() {
        var whatsapp = document.querySelector('.floating-whatsapp');
        if (!whatsapp) return;

        if (!window.visualViewport || !floatingWhatsAppMobileQuery.matches) {
            clearFloatingWhatsAppInlinePosition(whatsapp);
            return;
        }

        var vv = window.visualViewport;
        var gap = Math.max(18, getFloatingWhatsAppSafeBottom());

        // Anchor with bottom (keeps pulse animation transform intact), then
        // measure-and-correct against the visual viewport. This avoids relying on
        // whether position:fixed / getBoundingClientRect use layout or visual coords.
        whatsapp.style.setProperty('top', 'auto');
        whatsapp.style.setProperty('bottom', gap + 'px');

        var rect = whatsapp.getBoundingClientRect();
        var desiredBottom = vv.height - gap;
        var overflow = rect.bottom - desiredBottom;

        if (Math.abs(overflow) > 0.5) {
            whatsapp.style.setProperty('bottom', Math.round(gap + overflow) + 'px');
        }
    }

    function scheduleFloatingWhatsAppPositionUpdate() {
        if (floatingWhatsAppFramePending) return;
        floatingWhatsAppFramePending = true;
        window.requestAnimationFrame(function () {
            floatingWhatsAppFramePending = false;
            updateFloatingWhatsAppPosition();
        });
    }

    function initFloatingWhatsAppViewport() {
        if (!window.visualViewport) return;

        updateFloatingWhatsAppPosition();

        window.visualViewport.addEventListener('resize', scheduleFloatingWhatsAppPositionUpdate);
        window.visualViewport.addEventListener('scroll', scheduleFloatingWhatsAppPositionUpdate);
        window.addEventListener('orientationchange', scheduleFloatingWhatsAppPositionUpdate);
        window.addEventListener('resize', scheduleFloatingWhatsAppPositionUpdate);

        if (typeof floatingWhatsAppMobileQuery.addEventListener === 'function') {
            floatingWhatsAppMobileQuery.addEventListener('change', scheduleFloatingWhatsAppPositionUpdate);
        } else if (typeof floatingWhatsAppMobileQuery.addListener === 'function') {
            floatingWhatsAppMobileQuery.addListener(scheduleFloatingWhatsAppPositionUpdate);
        }
    }

    function init() {
        handleNavbarScroll();
        window.addEventListener('scroll', debounce(handleNavbarScroll, 10), { passive: true });

        initSmoothScrollLinks();
        initRevealAnimations();
        setWhatsAppGlobalFromDom();
        initBookingModal();
        initMobileInteractions();
        initFloatingWhatsAppViewport();

        document.documentElement.setAttribute('data-js-ready', '1');
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    window.addEventListener('load', function () {
        document.querySelectorAll('img[loading="lazy"]').forEach(function () { /* no-op */ });
    });

})();
