define(['jquery'], function ($) {
    'use strict';

    return function (config, element) {
        var $root     = $(element),
            $toggle   = $root.find('[data-role="menu-toggle"]'),
            $menu     = $root.find('[data-role="mobile-menu"]'),
            $nav      = $root.find('[data-role="category-nav"]'),
            /* Only top-level nav links (data-category), NOT mega-menu sub-links */
            $navLinks = $root.find(
                '[data-role="category-nav"] a[data-category], ' +
                '[data-role="category-nav-mobile"] a[data-category]'
            ),
            $indicator = null;

        /* ── Create sliding underline indicator ── */
        if ($nav.length) {
            $indicator = $('<span class="pv3-nav-indicator" aria-hidden="true"></span>').appendTo($nav);
        }

        function positionIndicator($link) {
            if (!$indicator || !$link.length) return;
            /* The link must be inside the desktop nav, not the mobile nav */
            var $desktopLink = $nav.find('a[data-category="' + $link.data('category') + '"]');
            if (!$desktopLink.length) return;

            var navOffset  = $nav.offset().left,
                linkOffset = $desktopLink.offset().left,
                padL       = parseInt($desktopLink.css('padding-left'),  10) || 0,
                padR       = parseInt($desktopLink.css('padding-right'), 10) || 0,
                innerW     = $desktopLink.outerWidth() - padL - padR;

            $indicator.css({
                left:    (linkOffset - navOffset + padL) + 'px',
                width:   innerW + 'px',
                opacity: 1
            });
        }

        /* ── Set a category as active and lock indicator there ── */
        function setActive(category) {
            if (!category) return;
            $navLinks.removeClass('is-active');
            var $active = $navLinks.filter('[data-category="' + category + '"]');
            $active.addClass('is-active');
            positionIndicator($active.first());
        }

        /* ── Mobile menu toggle ── */
        if ($toggle.length && $menu.length) {
            $toggle.on('click', function () {
                var isOpen = $toggle.attr('aria-expanded') === 'true';
                $toggle.attr('aria-expanded', isOpen ? 'false' : 'true')
                       .toggleClass('is-open', !isOpen);
                if (isOpen) {
                    $menu.attr('hidden', 'hidden').slideUp(180);
                } else {
                    $menu.removeAttr('hidden').hide().slideDown(180);
                }
            });
        }

        /* ── Clicking a nav link locks indicator on it ── */
        $navLinks.on('click', function () {
            setActive($(this).data('category'));
        });

        /* ── Re-position after fonts/layout settle ── */
        $(window).on('resize.pvHeader', function () {
            var $active = $nav.find('a.is-active[data-category]');
            if ($active.length) positionIndicator($active.first());
        });

        /* ── Auto-detect active category from current URL ── */
        (function detectFromUrl() {
            var path = window.location.pathname + window.location.search,
                cats = ['deals', 'apple', 'monitor', 'laptop', 'desktop'],
                found = 'desktop';

            for (var i = 0; i < cats.length; i++) {
                if (path.toLowerCase().indexOf(cats[i]) !== -1) {
                    found = cats[i];
                    break;
                }
            }

            /* Use requestAnimationFrame so layout is ready before measuring */
            requestAnimationFrame(function () {
                setActive(found);
            });
        }());
    };
});
