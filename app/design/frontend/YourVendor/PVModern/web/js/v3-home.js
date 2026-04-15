define(['jquery'], function ($) {
    'use strict';

    function parseNumber(value) {
        var parsed = parseFloat(value);
        return isNaN(parsed) ? null : parsed;
    }

    return function (config, element) {
        var $root = $(element),
            $grid = $root.find('[data-product-grid]'),
            $filterButtons = $root.find('[data-filter]'),
            $categorySelect = $root.find('[data-category-filter]'),
            $sort = $root.find('[data-sort]'),
            $availability = $root.find('[data-availability]'),
            $priceMin = $root.find('[data-price-min]'),
            $priceMax = $root.find('[data-price-max]'),
            $search = $root.find('[data-product-search]'),
            $viewButtons = $root.find('[data-view]'),
            $pagination = $root.find('[data-pagination]'),
            $recentSlider = $root.find('[data-recent-slider]'),
            $recentPrev = $root.find('[data-recent-prev]'),
            $recentNext = $root.find('[data-recent-next]'),
            pageSize = parseInt($grid.data('page-size'), 10) || 8,
            currentPage = 1;

        function getInitialQuery() {
            try {
                return String(new URLSearchParams(window.location.search).get('q') || '');
            } catch (error) {
                return '';
            }
        }

        function getCards() {
            return $grid.children('.pv3-product-card');
        }

        function getActiveCategory() {
            if ($categorySelect.length) {
                return String($categorySelect.val() || 'all').toLowerCase();
            }
            return String($filterButtons.filter('.is-active').data('filter') || 'all').toLowerCase();
        }

        function updateStats() {
            var $cards = getCards().not('.is-filtered-out'),
                inStock = 0,
                lowStock = 0;

            $cards.each(function () {
                var stock = String($(this).data('stock'));
                if (stock === 'in_stock') {
                    inStock += 1;
                }
                if (stock === 'low_stock') {
                    lowStock += 1;
                }
            });

            $root.find('[data-stat="count"]').text($cards.length);
            $root.find('[data-stat="instock"]').text(inStock);
            $root.find('[data-stat="lowstock"]').text(lowStock);
        }

        function renderPagination(totalItems) {
            var totalPages = Math.max(1, Math.ceil(totalItems / pageSize)),
                page,
                $button;

            if (!$pagination.length) {
                return;
            }

            $pagination.empty();

            if (totalPages <= 1) {
                $pagination.attr('hidden', 'hidden');
                return;
            }

            $pagination.removeAttr('hidden');

            for (page = 1; page <= totalPages; page += 1) {
                $button = $('<button/>', {
                    type: 'button',
                    'class': 'pv3-pagination-button' + (page === currentPage ? ' is-active' : ''),
                    'data-page': page,
                    text: page
                });
                $pagination.append($button);
            }
        }

        function applyPagination() {
            var $matched = getCards().not('.is-filtered-out'),
                totalPages = Math.max(1, Math.ceil($matched.length / pageSize)),
                startIndex;

            if (currentPage > totalPages) {
                currentPage = totalPages;
            }

            $matched.hide();
            startIndex = (currentPage - 1) * pageSize;
            $matched.slice(startIndex, startIndex + pageSize).show();
            getCards().filter('.is-filtered-out').hide();

            renderPagination($matched.length);
            updateStats();
        }

        function sortCards() {
            var mode = $sort.val(),
                cards = getCards().get();

            cards.sort(function (a, b) {
                var $a = $(a),
                    $b = $(b),
                    priceA = parseFloat($a.data('price')) || 0,
                    priceB = parseFloat($b.data('price')) || 0,
                    nameA = String($a.data('name') || '').toLowerCase(),
                    nameB = String($b.data('name') || '').toLowerCase(),
                    stockA = parseInt($a.data('stock-order'), 10) || 0,
                    stockB = parseInt($b.data('stock-order'), 10) || 0;

                if (mode === 'price_asc') {
                    return priceA - priceB;
                }
                if (mode === 'price_desc') {
                    return priceB - priceA;
                }
                if (mode === 'name_asc') {
                    return nameA.localeCompare(nameB);
                }
                if (mode === 'stock') {
                    return stockA - stockB;
                }
                return 0;
            });

            $.each(cards, function (_, card) {
                $grid.append(card);
            });
        }

        function applyFilters(resetLimit) {
            var activeCategory = getActiveCategory(),
                availability = String($availability.val() || 'all').toLowerCase(),
                minPrice = parseNumber($priceMin.val()),
                maxPrice = parseNumber($priceMax.val()),
                search = String($search.val() || '').toLowerCase();

            getCards().each(function () {
                var $card = $(this),
                    categories = String($card.data('categories') || '').toLowerCase().split(/\s+/),
                    stock = String($card.data('stock') || '').toLowerCase(),
                    price = parseFloat($card.data('price')) || 0,
                    haystack = [
                        String($card.data('name') || ''),
                        String($card.data('brand') || ''),
                        String($card.data('category') || '')
                    ].join(' ').toLowerCase(),
                    matches = true;

                if (activeCategory !== 'all' && $.inArray(activeCategory, categories) === -1) {
                    matches = false;
                }
                if (availability !== 'all' && availability !== stock) {
                    matches = false;
                }
                if (minPrice !== null && price < minPrice) {
                    matches = false;
                }
                if (maxPrice !== null && price > maxPrice) {
                    matches = false;
                }
                if (search && stock === 'out_of_stock') {
                    matches = false;
                }
                if (search && haystack.indexOf(search) === -1) {
                    matches = false;
                }

                $card.toggleClass('is-filtered-out', !matches);
            });

            if (resetLimit) {
                currentPage = 1;
            }

            applyPagination();
        }

        function updateRecentArrows() {
            if (!$recentSlider.length) {
                return;
            }
            var el = $recentSlider.get(0),
                maxScroll = Math.max(0, el.scrollWidth - el.clientWidth),
                current = el.scrollLeft;

            $recentPrev.prop('disabled', current <= 8);
            $recentNext.prop('disabled', current >= maxScroll - 8);
        }

        function scrollRecent(direction) {
            if (!$recentSlider.length) {
                return;
            }
            var amount = Math.round($recentSlider.innerWidth() * 0.86);
            $recentSlider.stop().animate({
                scrollLeft: $recentSlider.scrollLeft() + (direction * amount)
            }, 260, updateRecentArrows);
        }

        $filterButtons.on('click', function () {
            $filterButtons.removeClass('is-active');
            $(this).addClass('is-active');
            applyFilters(true);
        });

        $categorySelect.on('change', function () {
            applyFilters(true);
        });

        $sort.on('change', function () {
            sortCards();
            applyFilters(false);
        });

        $availability.on('change', function () {
            applyFilters(true);
        });

        $priceMin.add($priceMax).on('input change', function () {
            applyFilters(true);
        });

        $search.on('input', function () {
            applyFilters(true);
        });

        $viewButtons.on('click', function () {
            var view = $(this).data('view');
            $viewButtons.removeClass('is-active');
            $(this).addClass('is-active');
            $grid.toggleClass('is-list', view === 'list');
        });

        $pagination.on('click', '[data-page]', function () {
            currentPage = parseInt($(this).data('page'), 10) || 1;
            applyPagination();
            try {
                document.getElementById('pv3-products').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            } catch (error) {
            }
        });

        $recentPrev.on('click', function () {
            scrollRecent(-1);
        });

        $recentNext.on('click', function () {
            scrollRecent(1);
        });

        $recentSlider.on('scroll', updateRecentArrows);
        $(window).on('resize', updateRecentArrows);

        if ($search.length) {
            $search.val(getInitialQuery());
        }

        sortCards();
        applyFilters(true);
        updateRecentArrows();
    };
});
