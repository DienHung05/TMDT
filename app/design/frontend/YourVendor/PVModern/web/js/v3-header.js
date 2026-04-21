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
           SEARCH AUTOSUGGEST
           Uses the PVModern controller endpoint so live Magento products
           added in admin show in the main header as the customer types.
        ═══════════════════════════════════════════════════════════════════ */
        (function initSearchSuggest() {
            var $form  = $root.find('.pv3-search');
            var $input = $form.find('.pv3-search-input');
            var $drop  = $form.find('#pv3-search-dropdown');
            var suggestUrl = String($form.data('suggest-url') || '');
            var searchUrl  = String($form.data('search-url') || '');
            var minLength  = parseInt($form.data('min-length'), 10) || 1;
            var debounceTimer = null;
            var activeIdx = -1;
            var request = null;
            var cache = {};

            if (!$form.length || !$input.length || !$drop.length || !suggestUrl) {
                return;
            }

            function normalizeQuery(value) {
                return String(value || '').replace(/\s+/g, ' ').trim();
            }

            function escHtml(value) {
                return String(value)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#39;');
            }

            function highlight(text, query) {
                var safeQuery = $.trim(query || '');
                if (!safeQuery) {
                    return text;
                }

                return text.replace(
                    new RegExp('(' + safeQuery.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + ')', 'ig'),
                    '<mark class="pv3-search-highlight">$1</mark>'
                );
            }

            function getLinks() {
                return $drop.find('.pv3-search-item');
            }

            function showDrop() {
                $form.attr('aria-expanded', 'true');
                $drop.prop('hidden', false).show();
            }

            function hideDrop() {
                activeIdx = -1;
                $form.attr('aria-expanded', 'false');
                $drop.prop('hidden', true).hide();
            }

            function syncActiveItem() {
                var $links = getLinks();
                $links.removeClass('is-active');
                if (activeIdx >= 0 && $links.eq(activeIdx).length) {
                    $links.eq(activeIdx).addClass('is-active');
                    $links.eq(activeIdx)[0].scrollIntoView({block: 'nearest'});
                }
            }

            function renderItems(items, query) {
                var html = '';

                if (!items.length) {
                    html =
                        '<div class="pv3-search-loading">' +
                            'No products found for "<strong>' + escHtml(query) + '</strong>"' +
                        '</div>';
                } else {
                    html = $.map(items, function (item, index) {
                        var oldPrice = item.original_price
                            ? '<del class="pv3-sd-old">' + escHtml(item.original_price) + '</del>'
                            : '';
                        var discount = item.discount
                            ? '<span class="pv3-sd-disc">-' + escHtml(item.discount) + '%</span>'
                            : '';
                        var sku = item.sku
                            ? '<span class="pv3-search-sku">' + escHtml(item.sku) + '</span>'
                            : '';

                        return (
                            '<a href="' + escHtml(item.url) + '" class="pv3-search-item" role="option" data-idx="' + index + '">' +
                                '<span class="pv3-search-thumb">' +
                                    '<img class="pv3-search-img" src="' + escHtml(item.image) + '" alt="' + escHtml(item.name) + '" loading="lazy" />' +
                                '</span>' +
                                '<span class="pv3-search-info">' +
                                    '<span class="pv3-search-name">' + highlight(escHtml(item.name), query) + '</span>' +
                                    sku +
                                    '<span class="pv3-search-price">' + oldPrice + escHtml(item.price) + discount + '</span>' +
                                '</span>' +
                            '</a>'
                        );
                    }).join('');

                    html +=
                        '<a href="' + escHtml(searchUrl + '?q=' + encodeURIComponent(query)) + '" class="pv3-search-item pv3-sd-all" role="option">' +
                            '<span class="pv3-search-info pv3-search-info--all">' +
                                'View all results for "' + escHtml(query) + '" ->' +
                            '</span>' +
                        '</a>';
                }

                activeIdx = -1;
                $drop.html(html);
                showDrop();
            }

            function fetchSuggestions(query) {
                if (request && request.readyState !== 4) {
                    request.abort();
                }

                if (cache[query]) {
                    renderItems(cache[query], query);
                    return;
                }

                $drop.html('<div class="pv3-search-loading">Searching...</div>');
                showDrop();

                request = $.ajax({
                    url: suggestUrl,
                    method: 'GET',
                    dataType: 'json',
                    data: {q: query}
                }).done(function (response) {
                    var currentQuery = normalizeQuery($input.val());
                    var items = response && $.isArray(response.items) ? response.items : [];

                    cache[query] = items;
                    if (currentQuery === query) {
                        renderItems(items, query);
                    }
                }).fail(function (xhr) {
                    if (xhr && xhr.statusText === 'abort') {
                        return;
                    }

                    $drop.html('<div class="pv3-search-loading">Search is temporarily unavailable.</div>');
                    showDrop();
                });
            }

            $input.on('input', function () {
                var query = normalizeQuery($(this).val());

                clearTimeout(debounceTimer);
                if (query.length < minLength) {
                    hideDrop();
                    return;
                }

                debounceTimer = setTimeout(function () {
                    fetchSuggestions(query);
                }, 220);
            });

            $input.on('focus', function () {
                var query = normalizeQuery($input.val());
                if (query.length >= minLength && $drop.children().length) {
                    showDrop();
                }
            });

            $input.on('keydown', function (event) {
                var $links = getLinks();

                if (!$links.length) {
                    return;
                }

                if (event.key === 'ArrowDown') {
                    event.preventDefault();
                    activeIdx = Math.min(activeIdx + 1, $links.length - 1);
                    syncActiveItem();
                } else if (event.key === 'ArrowUp') {
                    event.preventDefault();
                    activeIdx = Math.max(activeIdx - 1, -1);
                    syncActiveItem();
                } else if (event.key === 'Enter' && activeIdx >= 0) {
                    event.preventDefault();
                    $links.eq(activeIdx)[0].click();
                } else if (event.key === 'Escape') {
                    hideDrop();
                }
            });

            $drop.on('mouseenter', '.pv3-search-item', function () {
                activeIdx = parseInt($(this).data('idx'), 10);
                if (isNaN(activeIdx)) {
                    activeIdx = -1;
                }
                syncActiveItem();
            });

            $(document).on('click.pvSearch', function (event) {
                if (!$(event.target).closest('.pv3-search').length) {
                    hideDrop();
                }
            });
        }());
    };
});
