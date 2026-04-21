define(['jquery'], function ($) {
    'use strict';

    return function (config, element) {
        var $root        = $(element),
            $slots       = $root.find('[data-slot]'),
            $sections    = $root.find('[data-section]'),
            $summaryBar  = $root.find('[data-summary-bar]'),
            $summaryList = $root.find('[data-summary-list]'),
            $totalPrice  = $root.find('[data-total-price]'),
            $addAllBtn   = $root.find('[data-add-all]'),
            $panelSearch = $root.find('[data-panel-search]'),
            LS_KEY       = 'pvmodern_pcbuild_v1',
            selected     = {}; /* { componentType: { id, name, price, url, formHtml } } */

        /* ── Restore from localStorage ── */
        try {
            var saved = JSON.parse(localStorage.getItem(LS_KEY) || '{}');
            if (saved && typeof saved === 'object') { selected = saved; }
        } catch (e) { /* ignore */ }

        /* ── Helpers ── */
        function formatPrice(n) {
            return '$' + parseFloat(n).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }

        function persist() {
            try { localStorage.setItem(LS_KEY, JSON.stringify(selected)); } catch (e) { /* ignore */ }
        }

        function activeType() {
            return $slots.filter('.is-active').data('slot') || '';
        }

        /* ── Refresh sidebar slot states ── */
        function refreshSlots() {
            $slots.each(function () {
                var type  = $(this).data('slot'),
                    item  = selected[type];
                if (item) {
                    $(this).addClass('is-selected');
                    $(this).find('[data-slot-sub]').text(item.name);
                } else {
                    $(this).removeClass('is-selected');
                    $(this).find('[data-slot-sub]').text($(this).data('empty-label') || 'Not selected');
                }
            });
        }

        /* ── Refresh product cards in active section ── */
        function refreshCards(type) {
            var item = selected[type];
            $root.find('[data-section="' + type + '"] [data-card]').each(function () {
                var cardId = $(this).data('card');
                if (item && String(item.id) === String(cardId)) {
                    $(this).addClass('is-selected');
                    $(this).find('[data-select-btn]').text('✓ Selected');
                } else {
                    $(this).removeClass('is-selected');
                    $(this).find('[data-select-btn]').text('Select');
                }
            });
        }

        /* ── Refresh summary bar chips ── */
        function refreshSummary() {
            var total = 0, chips = [];
            $.each(selected, function (type, item) {
                total += parseFloat(item.price) || 0;
                chips.push(
                    '<span class="pcb-summary-part">' +
                        '<strong>' + $('<span>').text(type).html() + ':</strong> ' +
                        $('<span>').text(item.name.length > 22 ? item.name.substr(0, 22) + '…' : item.name).html() +
                        ' (' + formatPrice(item.price) + ')' +
                        '<button type="button" data-remove="' + $('<span>').text(type).html() + '" title="Remove">&times;</button>' +
                    '</span>'
                );
            });
            $summaryList.html(chips.join(''));
            $totalPrice.text(total > 0 ? formatPrice(total) : '$0.00');
            $addAllBtn.prop('disabled', Object.keys(selected).length === 0);
        }

        /* ── Select a product ── */
        function selectProduct(type, id, name, price) {
            if (selected[type] && String(selected[type].id) === String(id)) {
                /* toggle off */
                delete selected[type];
            } else {
                selected[type] = { id: id, name: name, price: price };
            }
            persist();
            refreshSlots();
            refreshCards(type);
            refreshSummary();
        }

        /* ── Switch active component type tab ── */
        function switchTab(type) {
            $slots.removeClass('is-active');
            $slots.filter('[data-slot="' + type + '"]').addClass('is-active');
            $sections.removeClass('is-active');
            $sections.filter('[data-section="' + type + '"]').addClass('is-active');
            refreshCards(type);
            /* clear search */
            $panelSearch.val('').trigger('input');
        }

        /* ── Panel search ── */
        $panelSearch.on('input', function () {
            var q = $(this).val().toLowerCase().trim();
            var type = activeType();
            $root.find('[data-section="' + type + '"] [data-card]').each(function () {
                var text = ($(this).data('name') + ' ' + $(this).data('brand')).toLowerCase();
                $(this).toggle(!q || text.indexOf(q) !== -1);
            });
        });

        /* ── Slot click ── */
        $slots.on('click', function () {
            switchTab($(this).data('slot'));
        });

        /* ── Select / deselect card ── */
        $root.on('click', '[data-select-btn]', function (e) {
            e.stopPropagation();
            var $card = $(this).closest('[data-card]'),
                $sect = $card.closest('[data-section]'),
                type  = $sect.data('section');
            selectProduct(
                type,
                $card.data('card'),
                $card.data('name'),
                $card.data('price')
            );
        });

        /* Double-click card also works */
        $root.on('dblclick', '[data-card]', function () {
            var $sect = $(this).closest('[data-section]'),
                type  = $sect.data('section');
            selectProduct(
                type,
                $(this).data('card'),
                $(this).data('name'),
                $(this).data('price')
            );
        });

        /* ── Remove chip from summary bar ── */
        $summaryList.on('click', '[data-remove]', function () {
            var type = $(this).data('remove');
            delete selected[type];
            persist();
            refreshSlots();
            refreshCards(type);
            refreshSummary();
        });

        /* ── Add all to cart: navigate to each product page sequentially (or open tabs) ── */
        $addAllBtn.on('click', function () {
            var items = Object.values(selected);
            if (!items.length) return;
            /* Submit add‑to‑cart forms for each selected product that has a form */
            var $forms = $root.find('[data-add-form]').filter(function () {
                var type = $(this).data('add-form');
                return !!selected[type];
            });
            if ($forms.length) {
                /* Submit first form; signal via custom event for the rest */
                $forms.each(function (i) {
                    var $f = $(this);
                    if (i === 0) {
                        $f.trigger('submit');
                    } else {
                        setTimeout(function () { $f.trigger('submit'); }, i * 400);
                    }
                });
            } else {
                /* Fallback: open product pages in new tabs */
                $.each(selected, function (type, item) {
                    if (item.url) { window.open(item.url, '_blank'); }
                });
            }
        });

        /* ── Init ── */
        refreshSlots();
        refreshSummary();
        var firstSlot = $slots.first().data('slot');
        if (firstSlot) { switchTab(firstSlot); }
    };
});
