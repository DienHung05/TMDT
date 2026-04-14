/**
 * PVModern v7.0 — Header RequireJS Widget
 * ==========================================
 * MEGA MENU: Removed entirely — pure CSS :hover handles it (see _extend.less).
 * UNDERLINE: Fires on mouseenter of each nav-item (mirrors CSS :hover perfectly).
 * MOBILE: Slide toggle.
 * CART: Real-time via customerData KO observable.
 */
define([
    'jquery',
    'Magento_Customer/js/customer-data'
], function ($, customerData) {
    'use strict';

    return function (config, element) {
        var $root    = $(element);
        var $nav     = $root.find('#pv3-nav');
        var $ind     = $root.find('#pv3-nav-indicator');
        var $toggle  = $root.find('[data-role="menu-toggle"]');
        var $mobMenu = $root.find('[data-role="mobile-menu"]');

        /* ── Page context from PHP data-* attributes ──────────────────────── */
        var isCategoryPage = ($nav.data('cat-page') === 'true');
        var activeCat      = ($nav.data('active') || '').trim();
        var $activeLink    = activeCat
            ? $nav.find('a[data-cat="' + activeCat + '"]')
            : $();

        /* ═══════════════════════════════════════════════════════════════════
           CARET ROTATION — mirrors CSS :hover (visual feedback only)
           The mega-menu itself is shown/hidden by pure CSS :hover.
           JS only rotates the caret SVG to match hover state.
        ═══════════════════════════════════════════════════════════════════ */
        $nav.find('.pv3-nav-item').each(function () {
            var $item  = $(this);
            var $caret = $item.find('.pv3-nav-caret');
            $item.on('mouseenter.pvCaret', function () { $caret.addClass('is-open'); });
            $item.on('mouseleave.pvCaret', function () { $caret.removeClass('is-open'); });
        });

        /* ═══════════════════════════════════════════════════════════════════
           SLIDING UNDERLINE v7.0 — strict state machine
           ─────────────────────────────────────────────────────────────────
           Rules (matching user spec):
           A) Hover any nav item  → indicator slides to that link instantly
           B) Leave entire nav    → (i)  Category page: snap back to activeCat
                                    (ii) Other page: hide indicator
           C) Page load (cat pg)  → indicator at activeCat
           D) Page load (other)   → indicator hidden
        ═══════════════════════════════════════════════════════════════════ */

        function getNavLeft() {
            return $nav[0] ? $nav[0].getBoundingClientRect().left : 0;
        }

        function moveIndicatorTo($link) {
            if (!$link || !$link.length) { return; }
            var rect   = $link[0].getBoundingClientRect();
            var padL   = parseInt($link.css('paddingLeft'),  10) || 0;
            var padR   = parseInt($link.css('paddingRight'), 10) || 0;
            var $caret = $link.find('.pv3-nav-caret');
            /* Subtract caret width from the text-only zone */
            var caret  = $caret.length ? ($caret[0].getBoundingClientRect().width + 3) : 0;
            var indL   = rect.left - getNavLeft() + padL;
            var indW   = Math.max(0, rect.width - padL - padR - caret);
            $ind.css({ left: indL + 'px', width: indW + 'px', opacity: 1 });
        }

        function hideIndicator()  { $ind.css('opacity', 0); }
        function snapToActive()   {
            if ($activeLink && $activeLink.length) {
                moveIndicatorTo($activeLink);
            } else {
                hideIndicator();
            }
        }

        /* Init */
        if (isCategoryPage && $activeLink.length) {
            $activeLink.addClass('is-active');
            setTimeout(snapToActive, 0);
        } else {
            hideIndicator();
        }

        /* Resize: recalculate */
        $(window).on('resize.pvNav', function () {
            if (isCategoryPage && $activeLink.length) { snapToActive(); }
        });

        /* Hover per nav-item (mirrors pure CSS :hover exactly) */
        $nav.find('.pv3-nav-item').each(function () {
            var $item = $(this);
            var $link = $item.find('> a.pv3-nav-link');
            $item.on('mouseenter.pvNav', function () { moveIndicatorTo($link); });
        });

        /* Deals link */
        $nav.find('a.pv3-nav-link.is-deals').on('mouseenter.pvNav', function () {
            moveIndicatorTo($(this));
        });

        /* Cursor leaves entire nav: snap or hide */
        $nav.on('mouseleave.pvNav', function () {
            if (isCategoryPage && $activeLink.length) {
                snapToActive();
            } else {
                hideIndicator();
            }
        });

        /* Click: update active state for SPA-style navigation */
        $nav.find('a[data-cat]').on('click.pvNav', function () {
            var catKey = $(this).data('cat');
            if (catKey && catKey !== 'deals') {
                activeCat      = catKey;
                isCategoryPage = true;
                $activeLink    = $(this);
                $nav.find('a.pv3-nav-link').removeClass('is-active');
                $activeLink.addClass('is-active');
                moveIndicatorTo($activeLink);
            }
        });

        /* ═══════════════════════════════════════════════════════════════════
           MOBILE MENU TOGGLE
        ═══════════════════════════════════════════════════════════════════ */
        if ($toggle.length && $mobMenu.length) {
            $toggle.on('click.pvMobile', function () {
                var isOpen = $toggle.attr('aria-expanded') === 'true';
                $toggle.attr('aria-expanded', isOpen ? 'false' : 'true')
                       .toggleClass('is-open', !isOpen);
                if (isOpen) {
                    $mobMenu.slideUp(200, function () { $mobMenu.attr('hidden', ''); });
                } else {
                    $mobMenu.removeAttr('hidden').hide().slideDown(200);
                }
            });
            $(document).on('click.pvMobile', function (e) {
                if (!$(e.target).closest('.pv3-header-shell').length) {
                    if ($toggle.attr('aria-expanded') === 'true') {
                        $toggle.attr('aria-expanded', 'false').removeClass('is-open');
                        $mobMenu.slideUp(160, function () { $mobMenu.attr('hidden', ''); });
                    }
                }
            });
        }

        /* ═══════════════════════════════════════════════════════════════════
           REAL-TIME CART BADGE (Magento customerData KO observable)
        ═══════════════════════════════════════════════════════════════════ */
        (function initCartBadge() {
            var $badge   = $root.find('[data-cart-badge]');
            if (!$badge.length) return;
            var cartData = customerData.get('cart');
            function refreshBadge(data) {
                var count = parseInt((data && data.summary_count) || 0, 10);
                if (count > 0) { $badge.text(count).css('display', ''); }
                else           { $badge.text('').css('display', 'none'); }
            }
            cartData.subscribe(refreshBadge);
            refreshBadge(cartData());
        }());

        /* ═══════════════════════════════════════════════════════════════════
           REAL-TIME GRAPHQL SEARCH AUTOSUGGEST
        ═══════════════════════════════════════════════════════════════════ */
        (function initSearchGraphQL() {
            var $input = $root.find('.pv3-search-input');
            var $drop  = $root.find('#pv3-search-dropdown');
            if (!$input.length || !$drop.length) return;
            
            var debounceTimer;
            $input.on('input', function() {
                var q = $(this).val().trim();
                // Escape quotes in query
                q = q.replace(/"/g, '');
                
                if (q.length < 2) {
                    $drop.hide();
                    return;
                }
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(function() {
                    $drop.html('<div class="pv3-search-loading">Searching...</div>').show();
                    
                    var gqlBody = JSON.stringify({
                        query: '{ products(search: "' + q + '", pageSize: 5) { items { name, url_key, price_range { minimum_price { regular_price { value } } }, small_image { url } } } }'
                    });
                    
                    $.ajax({
                        url: '/graphql',
                        method: 'POST',
                        contentType: 'application/json',
                        data: gqlBody,
                        success: function(res) {
                            var items = res.data && res.data.products && res.data.products.items ? res.data.products.items : [];
                            if (!items.length) {
                                $drop.html('<div class="pv3-search-loading">No products found.</div>');
                                return;
                            }
                            var html = '';
                            items.forEach(function(item) {
                                var priceVal = 0;
                                if (item.price_range && item.price_range.minimum_price && item.price_range.minimum_price.regular_price) {
                                    priceVal = item.price_range.minimum_price.regular_price.value * 25000;
                                }
                                var pFmt = new Intl.NumberFormat('vi-VN', {style: 'currency', currency: 'VND'}).format(priceVal).replace('₫','').trim() + ' ₫';
                                
                                html += '<a href="/' + item.url_key + '.html" class="pv3-search-item">' +
                                        '<img src="' + item.small_image.url + '" class="pv3-search-img" alt=""/>' +
                                        '<div class="pv3-search-info">' +
                                        '<span class="pv3-search-name">' + item.name + '</span>' +
                                        '<span class="pv3-search-price">' + pFmt + '</span>' +
                                        '</div></a>';
                            });
                            $drop.html(html);
                        },
                        error: function() {
                            $drop.html('<div class="pv3-search-loading">Error connecting. Try again.</div>');
                        }
                    });
                }, 400);
            });
            
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.pv3-search').length) {
                    $drop.hide();
                }
            });
        }());
    };
});
