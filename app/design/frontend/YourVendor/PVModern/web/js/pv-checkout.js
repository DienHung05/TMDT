/**
 * PVModern — 4-Step Checkout Engine v3
 * ======================================
 * Reference-faithful implementation matching:
 *   - StepIndicator + progress bar
 *   - Step 1: Shipping form (Province/District/Ward cascading) + shipping method cards
 *   - Step 2: Card / E-wallet / Bank tabs
 *   - Step 3: Order review
 *   - Step 4: Success screen + confetti
 *
 * Carrier labels are normalized before rendering.
 *
 * data-mage-init alias: "pvmodernCheckoutV3"
 */
define(['jquery'], function ($) {
    'use strict';

    /* ═══════════════════════════════════════════════════════════════
       VIETNAM LOCATION DATA (condensed key provinces)
    ═══════════════════════════════════════════════════════════════ */
    var VN_LOCATIONS = [
        {
            id: 'HO_CHI_MINH', name: 'Thành phố Hồ Chí Minh',
            districts: [
                { id: 'QUAN_1', name: 'Quận 1', wards: ['Phường Bến Thành','Phường Đa Kao','Phường Nguyễn Huệ'] },
                { id: 'QUAN_2', name: 'Quận 2', wards: ['Phường An Phú','Phường Thủ Thiêm','Phường Cát Lái'] },
                { id: 'QUAN_3', name: 'Quận 3', wards: ['Phường Võ Thị Sáu','Phường Nguyễn Cư Trinh','Phường Cao Thắng'] },
                { id: 'QUAN_7', name: 'Quận 7', wards: ['Phường Tân Hưng','Phường Tân Phú','Phường Tân Quy'] },
                { id: 'BINH_THANH', name: 'Quận Bình Thạnh', wards: ['Phường 1','Phường 22','Phường 25'] },
                { id: 'TAN_BINH', name: 'Quận Tân Bình', wards: ['Phường 1','Phường 11','Phường 13'] },
                { id: 'GO_VAP', name: 'Quận Gò Vấp', wards: ['Phường 1','Phường 3','Phường 11'] },
                { id: 'PHU_NHUAN', name: 'Quận Phú Nhuận', wards: ['Phường 1','Phường 2','Phường 13'] },
                { id: 'HU_PHUONG', name: 'Huyện Hóc Môn', wards: ['Xã Tân Thới Nhất','Xã Áp Bắc'] },
                { id: 'CU_CHI', name: 'Huyện Củ Chi', wards: ['Xã Bình An','Xã Hòa Phú'] }
            ]
        },
        {
            id: 'HA_NOI', name: 'Thành phố Hà Nội',
            districts: [
                { id: 'HOAN_KIEM', name: 'Hoàn Kiếm', wards: ['Phường Hàng Bạc','Phường Hàng Buồm','Phường Hàng Gai'] },
                { id: 'BA_DINH', name: 'Ba Đình', wards: ['Phường Phúc Tân','Phường Cát Linh','Phường Ngọc Khánh'] },
                { id: 'CAU_GIAY', name: 'Cầu Giấy', wards: ['Phường Yên Hòa','Phường Quảng An','Phường Dịch Vọng'] },
                { id: 'DONG_DA', name: 'Đống Đa', wards: ['Phường Ô Chợ Dừa','Phường Kim Mã','Phường Quang Trung'] },
                { id: 'HAI_BA_TRUNG', name: 'Hai Bà Trưng', wards: ['Phường Bạch Đằng','Phường Vĩnh Tuy','Phường Thanh Nhàn'] },
                { id: 'THANH_XUAN', name: 'Thanh Xuân', wards: ['Phường Khương Đình','Phường Khương Thượng','Phường Thanh Xuân Trung'] },
                { id: 'HOANG_MAI', name: 'Hoàng Mai', wards: ['Phường Hoàng Liệt','Phường Định Công','Phường Giáp Bát'] },
                { id: 'LONG_BIEN', name: 'Long Biên', wards: ['Phường Việt Hùng','Phường Ngô Quyền','Phường Cổ Nhuế'] }
            ]
        },
        {
            id: 'DA_NANG', name: 'Thành phố Đà Nẵng',
            districts: [
                { id: 'HAI_CHAU', name: 'Hải Châu', wards: ['Phường Hải Châu 1','Phường Hải Châu 2','Phường Thanh Khê'] },
                { id: 'SON_TRA', name: 'Sơn Trà', wards: ['Phường Mân Thái','Phường Thọ Quang','Phường Nại Hiên Đông'] },
                { id: 'THANH_KHE', name: 'Thanh Khê', wards: ['Phường Thanh Khê Tây','Phường Thanh Khê Đông','Phường Tân Chính'] }
            ]
        },
        {
            id: 'CAN_THO', name: 'Thành phố Cần Thơ',
            districts: [
                { id: 'NINHKIEU', name: 'Ninh Kiều', wards: ['Phường An Khánh','Phường An Phú','Phường Cái Khế'] },
                { id: 'BINH_THUY', name: 'Bình Thủy', wards: ['Phường Bình Thủy','Phường Thới An'] }
            ]
        },
        {
            id: 'AN_GIANG', name: 'An Giang',
            districts: [
                { id: 'CHAU_DOC', name: 'Châu Đốc', wards: ['Phường 1','Phường 2','Phường 3','Phường 4','Phường 5'] },
                { id: 'TAN_CHAU', name: 'Tân Châu', wards: ['Phường 1','Phường 2','Phường 3'] }
            ]
        },
        { id: 'BINH_DUONG', name: 'Bình Dương', districts: [{ id: 'THU_DAU_MOT', name: 'Thủ Dầu Một', wards: ['Phường Phú Cường','Phường Hiệp An','Phường Phú Thọ'] }] },
        { id: 'DONG_NAI', name: 'Đồng Nai', districts: [{ id: 'BIEN_HOA', name: 'Biên Hòa', wards: ['Phường Trung Dũng','Phường Quang Vinh','Phường Tân Phong'] }] },
        { id: 'KHANH_HOA', name: 'Khánh Hòa', districts: [{ id: 'NHA_TRANG', name: 'Nha Trang', wards: ['Phường Lộc Thọ','Phường Vạn Thắng','Phường Vĩnh Hải'] }] },
        { id: 'LAM_DONG', name: 'Lâm Đồng', districts: [{ id: 'DA_LAT', name: 'Đà Lạt', wards: ['Phường 1','Phường 2','Phường 3'] }] },
        { id: 'QUANG_NAM', name: 'Quảng Nam', districts: [{ id: 'HOI_AN', name: 'Hội An', wards: ['Phường Minh An','Phường Tân An','Phường Cẩm Phô'] }] }
    ];

    /* ═══════════════════════════════════════════════════════════════
       MOCK SHIPPING METHODS (reference-faithful, bug-fixed names)
    ═══════════════════════════════════════════════════════════════ */
    var SHIPPING_METHODS = [
        {
            id: 'shopee-express',
            name: 'Shopee Express',
            cost: 25000,
            estimatedDays: 2,
            description: 'Giao hàng trong 2-3 ngày, toàn quốc'
        },
        {
            id: 'ghn',
            name: 'Giao Hàng Nhanh',
            cost: 35000,
            estimatedDays: 1,
            description: 'Giao hàng nhanh 1-2 ngày'
        },
        {
            id: 'ghtk',
            name: 'Giao Hàng Tiết Kiệm',
            cost: 15000,
            estimatedDays: 5,
            description: 'Giao hàng tiết kiệm 3-5 ngày'
        }
    ];

    /* ═══════════════════════════════════════════════════════════════
       PROMO CODES (reference: SAVE10, SAVE20, SAVE50K)
    ═══════════════════════════════════════════════════════════════ */
    var PROMO_CODES = {
        SAVE10: { type: 'percent', value: 0.10 },
        SAVE20: { type: 'percent', value: 0.20 },
        SAVE50K: { type: 'fixed',   value: 50000 },
        FLASH30: { type: 'percent', value: 0.30 }
    };

    /* ═══════════════════════════════════════════════════════════════
       MAIN WIDGET
    ═══════════════════════════════════════════════════════════════ */
    return function (config, element) {
        var $root      = $(element);
        var scriptNode = document.querySelector($root.data('bootstrap-selector') || '#pvco3-bootstrap');
        var bootstrap  = {};
        var storageKey = 'pvmodern_checkout_v3';

        if (!scriptNode) { console.warn('[pvco3] bootstrap JSON not found'); return; }
        try { bootstrap = JSON.parse(scriptNode.textContent || '{}'); } catch (e) { bootstrap = {}; }

        /* ── State ──────────────────────────────────────────────── */
        var state = {
            currentStep: 1,
            /* Step 1 */
            fullName: '', phone: '', email: '',
            addressLine1: '', addressLine2: '',
            province: '', district: '', ward: '',
            specialInstructions: '', saveDefault: false,
            shippingMethodId: '',
            selectedShipping: null,
            /* Step 2 */
            paymentTab: 'card',
            paymentType: '',   // 'card' | 'momo' | 'zalopay' | 'bank'
            paymentLabel: '',
            cardNumber: '', cardholderName: '', expiry: '', cvv: '',
            selectedBank: 'vietcombank',
            /* Step 3+ */
            discountCode: '', discountAmount: 0,
            order: null
        };

        /* ── Bootstrap cart data ────────────────────────────────── */
        var cart = bootstrap.cart || {};
        var cartItems = cart.items || [];
        var cartSubtotal = parseFloat(cart.subtotal || 0);
        var availableShippingMethods = SHIPPING_METHODS.slice();
        var cartCount = cartItems.reduce(function (total, item) {
            return total + (parseInt(item.qty, 10) || 0);
        }, 0) || cart.count || cartItems.length;

        /* ── Utilities ──────────────────────────────────────────── */
        function esc(v) {
            return String(v || '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
        }

        function getCurrencyMeta() {
            var sample = String((bootstrap.cart || {}).subtotal_formatted || '');

            if (sample.indexOf('$') !== -1) {
                return { locale: 'en-US', currency: 'USD', digits: 2 };
            }

            return { locale: 'vi-VN', currency: 'VND', digits: 0 };
        }

        function fmtVND(n) {
            var meta = getCurrencyMeta();

            return new Intl.NumberFormat(meta.locale, {
                style: 'currency',
                currency: meta.currency,
                minimumFractionDigits: meta.digits,
                maximumFractionDigits: meta.digits
            }).format(parseFloat(n || 0));
        }

        function fmtDate(date) {
            return new Intl.DateTimeFormat('vi-VN', { year: 'numeric', month: '2-digit', day: '2-digit' }).format(date);
        }

        function fmtDateWithTime(date) {
            return new Intl.DateTimeFormat('vi-VN', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' }).format(date);
        }

        function estimatedDate(days) {
            var d = new Date(); d.setDate(d.getDate() + days); return fmtDate(d);
        }

        function persist() {
            try { window.sessionStorage.setItem(storageKey, JSON.stringify(state)); } catch (e) {}
        }

        function restore() {
            try {
                var s = JSON.parse(window.sessionStorage.getItem(storageKey) || '{}');
                if (s && typeof s === 'object') { $.extend(true, state, s); }
            } catch (e) {}
        }

        function generateOrderNumber() {
            return 'ORD-' + Date.now() + '-' + Math.floor(Math.random() * 10000);
        }

        function placeholderImage(label) {
            var title = String(label || 'Techieworld').trim().split(/\s+/).slice(0, 2).join(' ');
            var svg = '<svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 96 96">' +
                '<defs><linearGradient id="pvco3g" x1="0" x2="1"><stop stop-color="#eff6ff"/><stop offset="1" stop-color="#dbeafe"/></linearGradient></defs>' +
                '<rect width="96" height="96" rx="18" fill="url(#pvco3g)"/>' +
                '<text x="48" y="38" text-anchor="middle" fill="#1d4ed8" font-size="12" font-family="Arial" font-weight="700">Techieworld</text>' +
                '<text x="48" y="60" text-anchor="middle" fill="#475569" font-size="10" font-family="Arial">' + esc(title) + '</text>' +
                '</svg>';

            return 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(svg);
        }

        function attachImageFallbacks($scope) {
            $scope.find('.pvco3-sidebar-thumb, .pvco3-review-thumb').each(function () {
                var img = this,
                    label,
                    fallback;

                if (img.dataset.pvco3FallbackBound === '1') {
                    return;
                }

                img.dataset.pvco3FallbackBound = '1';
                label = img.getAttribute('alt') || 'Product';
                fallback = placeholderImage(label);

                img.addEventListener('error', function () {
                    if (img.src !== fallback) {
                        img.src = fallback;
                    }
                });

                if (img.complete && img.naturalWidth === 0) {
                    img.src = fallback;
                }
            });
        }

        function getBankTransferMethod() {
            return paymentMethodByCode('bank_transfer') || {};
        }

        function syncBankTransferDisplay(bankName) {
            var method = getBankTransferMethod();
            var transferReference = $root.find('[data-transfer-ref]').text().trim();

            $root.find('#pvco3-tf-holder').text(method.account_name || 'SHOP VIETNAM LTD');
            $root.find('#pvco3-tf-account').text(method.account_number || '123456789012');
            $root.find('#pvco3-tf-bank').text(bankName || method.bank_name || 'Vietcombank');

            if (!transferReference || transferReference.indexOf('TRANSFER-') === 0) {
                $root.find('[data-transfer-ref]').text(
                    String(method.note_prefix || 'TRANSFER') + '-' + String(Date.now())
                );
            }
        }

        /* ── Alert ──────────────────────────────────────────────── */
        function showAlert(msg, type) {
            var $a = $root.find('[data-alert]');
            if (!msg) { $a.attr('hidden', 'hidden').empty(); return; }
            $a.removeAttr('hidden').attr('class', 'pvco3-alert pvco3-alert--' + (type || 'error')).text(msg);
            $a[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        function setError(field, msg) {
            $root.find('[data-error="' + field + '"]').text(msg || '');
        }

        function clearErrors() {
            $root.find('[data-error]').text('');
            showAlert('');
        }

        /* ── Step management ────────────────────────────────────── */
        function goToStep(step) {
            state.currentStep = step;
            persist();
            updateStepIndicator(step);
            $root.find('[data-panel]').attr('hidden', 'hidden');
            var $p = $root.find('[data-panel="' + step + '"]');
            $p.removeAttr('hidden');
            // Show/hide layout vs success
            if (step === 4) {
                $root.find('[data-checkout-layout]').attr('hidden', 'hidden');
                $root.find('[data-success-screen]').removeAttr('hidden');
                renderSuccessScreen();
                launchConfetti();
            } else {
                $root.find('[data-checkout-layout]').removeAttr('hidden');
                $root.find('[data-success-screen]').attr('hidden', 'hidden');
            }
            // Scroll top
            element.scrollIntoView({ behavior: 'smooth', block: 'start' });
            // Render step-specific content
            if (step === 3) { renderReview(); }
        }

        function updateStepIndicator(step) {
            for (var i = 1; i <= 4; i++) {
                var $circle = $root.find('[data-circle="' + i + '"]');
                var $num    = $circle.find('.pvco3-step-num');
                var $check  = $circle.find('.pvco3-step-check');
                var $label  = $root.find('[data-step-indicator="' + i + '"] .pvco3-step-name');

                $circle.removeClass('is-active is-done');

                if (i < step) {
                    $circle.addClass('is-done');
                    $num.attr('hidden', 'hidden');
                    $check.removeAttr('hidden');
                    $label.addClass('is-done');
                } else if (i === step) {
                    $circle.addClass('is-active');
                    $num.removeAttr('hidden');
                    $check.attr('hidden', 'hidden');
                    $label.removeClass('is-done');
                } else {
                    $num.removeAttr('hidden');
                    $check.attr('hidden', 'hidden');
                    $label.removeClass('is-done');
                }
            }
            // Progress bar
            var pct = Math.round(((step - 1) / 3) * 100);
            $root.find('[data-progress-fill]').css('width', pct + '%');
        }

        /* ── Province / District / Ward selects ────────────────── */
        function populateProvinceSelect() {
            var $sel = $root.find('[data-province-select]');
            var html = '<option value="">Chọn tỉnh/thành phố</option>';
            $.each(VN_LOCATIONS, function (_, p) {
                html += '<option value="' + esc(p.id) + '">' + esc(p.name) + '</option>';
            });
            $sel.html(html);
            if (state.province) { $sel.val(state.province); populateDistrictSelect(); }
        }

        function populateDistrictSelect() {
            var $sel = $root.find('[data-district-select]');
            var province = null;
            $.each(VN_LOCATIONS, function (_, p) { if (p.id === state.province) { province = p; return false; } return true; });
            if (!province) {
                $sel.html('<option value="">Chọn tỉnh/thành phố trước</option>').prop('disabled', true);
                $root.find('[data-ward-select]').html('<option value="">Chọn quận/huyện trước</option>').prop('disabled', true);
                return;
            }
            var html = '<option value="">Chọn quận/huyện</option>';
            $.each(province.districts, function (_, d) {
                html += '<option value="' + esc(d.id) + '">' + esc(d.name) + '</option>';
            });
            $sel.html(html).prop('disabled', false);
            if (state.district) { $sel.val(state.district); populateWardSelect(); }
        }

        function populateWardSelect() {
            var $sel = $root.find('[data-ward-select]');
            var district = null;
            $.each(VN_LOCATIONS, function (_, p) {
                if (p.id === state.province) {
                    $.each(p.districts, function (_, d) { if (d.id === state.district) { district = d; return false; } return true; });
                    return false;
                }
                return true;
            });
            if (!district) {
                $sel.html('<option value="">Chọn quận/huyện trước</option>').prop('disabled', true);
                return;
            }
            var html = '<option value="">Chọn phường/xã</option>';
            $.each(district.wards, function (_, w) {
                var label = (typeof w === 'string') ? w : w.name;
                var val   = (typeof w === 'string') ? w : w.id;
                html += '<option value="' + esc(val) + '">' + esc(label) + '</option>';
            });
            $sel.html(html).prop('disabled', false);
            if (state.ward) { $sel.val(state.ward); }
        }

        /* ── Shipping methods ───────────────────────────────────── */
        function renderShippingMethods() {
            var $list = $root.find('[data-ship-list]');
            var $loading = $root.find('[data-ship-loading]');
            var $error = $root.find('[data-ship-error]');

            /* Try real endpoint first — fall back to mock data */
            var endpoints = bootstrap.endpoints || {};
            if (endpoints.quote) {
                $loading.removeAttr('hidden');
                $list.empty();
                $error.attr('hidden', 'hidden').empty();
                $.ajax({
                    url: endpoints.quote,
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        full_name: state.fullName,
                        email: state.email,
                        phone: state.phone,
                        address: state.addressLine1,
                        street: state.addressLine1,
                        city: getProvinceName(),
                        region: getDistrictName(),
                        postcode: state.postcode || '700000',
                        country_id: 'VN',
                        receiving_method: 'delivery',
                        note: state.specialInstructions,
                        form_key: bootstrap.form_key || ''
                    })
                }).done(function (res) {
                    var methods = (res.shipping_methods || []).map(function (m) {
                        var providerCode = String(m.provider || '').toLowerCase();
                        var fallbackMethod = null;
                        var etaMin = parseInt(m.eta_min || m.estimated_days || 0, 10);
                        var etaMax = parseInt(m.eta_max || etaMin || 0, 10);
                        var cleanLabel = String(m.label || '').replace(/Exxpress/g, 'Express');

                        $.each(SHIPPING_METHODS, function (__, fallback) {
                            if (String(fallback.id).toLowerCase() === providerCode ||
                                String(fallback.id).toLowerCase().indexOf(providerCode) !== -1 ||
                                (providerCode === 'spx' && fallback.id === 'shopee-express')) {
                                fallbackMethod = fallback;
                                return false;
                            }

                            return true;
                        });

                        return {
                            id: m.method_code || ('pvmodernshipping_' + providerCode),
                            provider: providerCode,
                            name: fallbackMethod ? fallbackMethod.name : (cleanLabel || 'Phương thức vận chuyển'),
                            cost: parseFloat(m.amount || 0),
                            estimatedDays: etaMin || (fallbackMethod ? fallbackMethod.estimatedDays : 3),
                            estimatedRangeLabel: m.eta_label || ((etaMin && etaMax && etaMin !== etaMax)
                                ? (etaMin + '-' + etaMax + ' ngày')
                                : ((etaMin || (fallbackMethod ? fallbackMethod.estimatedDays : 3)) + ' ngày')),
                            description: fallbackMethod ? fallbackMethod.description : (m.description || '')
                        };
                    });
                    if (!methods.length) { methods = SHIPPING_METHODS; }
                    renderShippingCards(methods);
                }).fail(function () {
                    renderShippingCards(SHIPPING_METHODS);
                }).always(function () { $loading.attr('hidden', 'hidden'); });
            } else {
                renderShippingCards(SHIPPING_METHODS);
            }
        }

        function renderShippingCards(methods) {
            var $list = $root.find('[data-ship-list]');
            var html  = '';
            var selectedMethod = null;

            availableShippingMethods = methods.slice();

            $.each(methods, function (_, method) {
                var isSelected = state.shippingMethodId === method.id;
                if (isSelected) {
                    selectedMethod = method;
                }
                html += '<button type="button" class="pvco3-ship-card' + (isSelected ? ' is-selected' : '') +
                        '" data-ship-card data-ship-id="' + esc(method.id) + '">' +
                        '<div class="pvco3-ship-radio"><div class="pvco3-ship-radio-inner">' +
                        (isSelected ? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" width="12" height="12"><path d="M20 6 9 17l-5-5"/></svg>' : '') +
                        '</div></div>' +
                        '<div class="pvco3-ship-body">' +
                        '<div class="pvco3-ship-top">' +
                        '<span class="pvco3-ship-name">' + esc(method.name) + '</span>' +
                        '<span class="pvco3-ship-price">' + fmtVND(method.cost) + '</span>' +
                        '</div>' +
                        '<p class="pvco3-ship-desc">' + esc(method.description) + '</p>' +
                        '<p class="pvco3-ship-eta">Dự kiến: ' + estimatedDate(method.estimatedDays) + ' (' + esc(method.estimatedRangeLabel || (method.estimatedDays + ' ngày')) + ')</p>' +
                        '</div>' +
                        '</button>';
            });
            $list.html(html);

            if (selectedMethod) {
                state.selectedShipping = selectedMethod;
            }

            renderSidebar();
        }

        /* ── Sidebar ────────────────────────────────────────────── */
        function renderSidebar() {
            /* Items */
            var items = cartItems.length ? cartItems : ((bootstrap.cart || {}).items || []);
            var $itemsEl = $root.find('[data-sidebar-items]');
            var html = '';
            $.each(items, function (_, item) {
                var imageUrl = item.image_url || placeholderImage(item.name);

                html += '<div class="pvco3-sidebar-item">' +
                    '<img src="' + esc(imageUrl) + '" alt="' + esc(item.name) + '" class="pvco3-sidebar-thumb" loading="lazy"/>' +
                    '<div class="pvco3-sidebar-item-info">' +
                    '<p class="pvco3-sidebar-item-name">' + esc(item.name) + '</p>' +
                    '<p class="pvco3-sidebar-item-qty">x ' + esc(String(item.qty || 1)) + '</p>' +
                    '</div>' +
                    '<p class="pvco3-sidebar-item-price">' + (item.row_total_formatted || fmtVND(item.row_total)) + '</p>' +
                    '</div>';
            });
            $itemsEl.html(html || '<p class="pvco3-empty-note">Giỏ hàng trống.</p>');
            attachImageFallbacks($itemsEl);

            /* Totals */
            var subtotal = cartSubtotal || parseFloat((bootstrap.cart || {}).subtotal || 0);
            var shipping = state.selectedShipping ? state.selectedShipping.cost : 0;
            var discount = state.discountAmount || 0;
            var total    = Math.max(0, subtotal + shipping - discount);

            $root.find('[data-sidebar-subtotal]').text(fmtVND(subtotal));
            $root.find('[data-sidebar-count]').text(cartCount);

            if (state.selectedShipping) {
                $root.find('[data-sidebar-shipping]').text(fmtVND(shipping));
                $root.find('[data-sidebar-shipping-row]').removeAttr('hidden');
                $root.find('[data-sidebar-carrier]').text(state.selectedShipping.name);
                $root.find('[data-sidebar-carrier-row]').removeAttr('hidden');
            } else {
                $root.find('[data-sidebar-shipping-row]').attr('hidden','hidden');
                $root.find('[data-sidebar-carrier-row]').attr('hidden','hidden');
            }
            if (discount > 0) {
                $root.find('[data-sidebar-discount]').text('-' + fmtVND(discount));
                $root.find('[data-sidebar-discount-row]').removeAttr('hidden');
            } else {
                $root.find('[data-sidebar-discount-row]').attr('hidden','hidden');
            }
            $root.find('[data-sidebar-grand]').text(fmtVND(total));
        }

        /* ── Step 3 Review ──────────────────────────────────────── */
        function renderReview() {
            /* Address block */
            var addrParts = [state.addressLine1];
            if (state.addressLine2) addrParts.push(state.addressLine2);
            addrParts.push(getWardName() + ', ' + getDistrictName() + ', ' + getProvinceName());

            $root.find('[data-review-address]').html(
                '<p><strong>' + esc(state.fullName) + '</strong></p>' +
                '<p>' + addrParts.map(esc).join('<br/>') + '</p>' +
                '<p class="pvco3-review-muted">' + esc(state.phone) + '</p>'
            );

            /* Shipping block */
            if (state.selectedShipping) {
                var s = state.selectedShipping;
                $root.find('[data-review-shipping]').html(
                    '<p><strong>' + esc(s.name) + '</strong></p>' +
                    '<p class="pvco3-review-muted">' + esc(s.description) + '</p>' +
                    '<p class="pvco3-review-muted">Dự kiến: ' + estimatedDate(s.estimatedDays) + '</p>'
                );
            }

            /* Payment block */
            $root.find('[data-review-payment]').html('<p>' + esc(state.paymentLabel || 'Chưa chọn') + '</p>');

            /* Order items */
            var itemsHtml = '';
            $.each(bootstrap.cart && bootstrap.cart.items || [], function (_, item) {
                var imageUrl = item.image_url || placeholderImage(item.name);
                itemsHtml += '<div class="pvco3-review-item">' +
                    '<img src="' + esc(imageUrl) + '" alt="' + esc(item.name) + '" class="pvco3-review-thumb" loading="lazy"/>' +
                    '<div class="pvco3-review-item-info">' +
                    '<p class="pvco3-review-item-name">' + esc(item.name) + '</p>' +
                    '<p class="pvco3-review-item-qty">x ' + esc(String(item.qty || 1)) + '</p>' +
                    '</div>' +
                    '<p class="pvco3-review-item-price">' + (item.row_total_formatted || fmtVND(item.row_total)) + '</p>' +
                    '</div>';
            });
            $root.find('[data-review-items]').html(itemsHtml || '<p class="pvco3-empty-note">—</p>');
            attachImageFallbacks($root.find('[data-review-items]'));

            /* Totals */
            var subtotal = cartSubtotal || parseFloat((bootstrap.cart || {}).subtotal || 0);
            var shipping = state.selectedShipping ? state.selectedShipping.cost : 0;
            var discount = state.discountAmount || 0;
            var total    = Math.max(0, subtotal + shipping - discount);

            var totalsHtml =
                '<div class="pvco3-review-total-row"><span>Tạm tính</span><span>' + fmtVND(subtotal) + '</span></div>' +
                '<div class="pvco3-review-total-row"><span>Vận chuyển</span><span>' + fmtVND(shipping) + '</span></div>';
            if (discount > 0) {
                totalsHtml += '<div class="pvco3-review-total-row pvco3-discount-row"><span>Giảm giá (' + esc(state.discountCode) + ')</span><span>-' + fmtVND(discount) + '</span></div>';
            }
            totalsHtml += '<div class="pvco3-review-total-row pvco3-grand-row"><span><strong>Tổng cộng</strong></span><span class="pvco3-grand-val">' + fmtVND(total) + '</span></div>';
            $root.find('[data-review-totals]').html(totalsHtml);
        }

        /* ── Location helpers ───────────────────────────────────── */
        function getProvinceName() {
            var name = state.province;
            $.each(VN_LOCATIONS, function (_, p) { if (p.id === state.province) { name = p.name; return false; } return true; });
            return name;
        }

        function getDistrictName() {
            var name = state.district;
            $.each(VN_LOCATIONS, function (_, p) {
                if (p.id === state.province) {
                    $.each(p.districts, function (_, d) { if (d.id === state.district) { name = d.name; return false; } return true; });
                    return false;
                }
                return true;
            });
            return name;
        }

        function getWardName() {
            var name = state.ward;
            $.each(VN_LOCATIONS, function (_, p) {
                if (p.id === state.province) {
                    $.each(p.districts, function (_, d) {
                        if (d.id === state.district) {
                            $.each(d.wards, function (_, w) {
                                var id = (typeof w === 'string') ? w : w.id;
                                var n  = (typeof w === 'string') ? w : w.name;
                                if (id === state.ward) { name = n; return false; }
                                return true;
                            });
                            return false;
                        }
                        return true;
                    });
                    return false;
                }
                return true;
            });
            return name;
        }

        /* ── Step 1 validation ──────────────────────────────────── */
        function validateStep1() {
            clearErrors();
            var ok = true;
            if (!state.fullName.trim()) { setError('fullName', 'Vui lòng nhập họ tên.'); ok = false; }
            if (!state.phone.trim() || !/^0\d{9}$/.test(state.phone.trim())) { setError('phone', 'Số điện thoại không hợp lệ (VD: 0912345678).'); ok = false; }
            if (!state.email.trim() || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(state.email.trim())) { setError('email', 'Địa chỉ email không hợp lệ.'); ok = false; }
            if (!state.addressLine1.trim()) { setError('addressLine1', 'Vui lòng nhập địa chỉ.'); ok = false; }
            if (!state.province) { setError('province', 'Vui lòng chọn tỉnh/thành phố.'); ok = false; }
            if (!state.district) { setError('district', 'Vui lòng chọn quận/huyện.'); ok = false; }
            if (!state.ward)     { setError('ward',     'Vui lòng chọn phường/xã.'); ok = false; }
            if (!state.shippingMethodId) { setError('shippingMethod', 'Vui lòng chọn phương thức vận chuyển.'); ok = false; }
            if (!ok) {
                var $first = $root.find('[data-error]:not(:empty)').first();
                if ($first.length) { $first[0].scrollIntoView({ behavior: 'smooth', block: 'center' }); }
            }
            return ok;
        }

        /* ── Step 2 validation ──────────────────────────────────── */
        function validateStep2() {
            clearErrors();
            var tab = state.paymentTab;
            if (tab === 'card') {
                var ok = true;
                var cn = state.cardNumber.replace(/\s/g, '');
                if (!/^\d{16}$/.test(cn)) { setError('cardNumber', 'Số thẻ phải có 16 chữ số.'); ok = false; }
                if (!state.cardholderName.trim()) { setError('cardholderName', 'Vui lòng nhập tên chủ thẻ.'); ok = false; }
                if (!/^\d{2}\/\d{2}$/.test(state.expiry.trim())) { setError('expiry', 'Định dạng MM/YY.'); ok = false; }
                if (!/^\d{3,4}$/.test(state.cvv.trim())) { setError('cvv', 'CVV phải 3-4 chữ số.'); ok = false; }
                if (!ok) {
                    var $first = $root.find('[data-error]:not(:empty)').first();
                    if ($first.length) { $first[0].scrollIntoView({ behavior: 'smooth', block: 'center' }); }
                }
                return ok;
            }
            if (tab === 'ewallet') {
                if (!state.paymentType) { showAlert('Vui lòng chọn ví điện tử.', 'error'); return false; }
                return true;
            }
            if (tab === 'bank') {
                state.paymentType  = 'bank_transfer';
                state.paymentLabel = 'Chuyển khoản - ' + ($root.find('[data-bank="' + state.selectedBank + '"] .pvco3-bank-name').text() || 'Vietcombank');
                return true;
            }
            return false;
        }

        /* ── Place order ────────────────────────────────────────── */
        function placeOrder() {
            var $btn = $root.find('[data-place-order]');
            $btn.prop('disabled', true);
            $btn.find('.pvco3-place-label').attr('hidden','hidden');
            $btn.find('.pvco3-place-loading').removeAttr('hidden');
            $root.find('[data-processing-overlay]').removeAttr('hidden');

            var subtotal = cartSubtotal || parseFloat((bootstrap.cart || {}).subtotal || 0);
            var shipping = state.selectedShipping ? state.selectedShipping.cost : 0;
            var discount = state.discountAmount || 0;
            var total    = Math.max(0, subtotal + shipping - discount);

            // Try real endpoint
            var endpoints = bootstrap.endpoints || {};
            var streetAddress = state.addressLine2
                ? String(state.addressLine1 + ', ' + state.addressLine2)
                : String(state.addressLine1);
            var payload = {
                form_key: bootstrap.form_key || '',
                full_name: state.fullName,
                email: state.email,
                phone: state.phone,
                address: streetAddress,
                street: streetAddress,
                city: getProvinceName(),
                region: getDistrictName(),
                postcode: state.postcode || '700000',
                country_id: 'VN',
                receiving_method: 'delivery',
                pickup_store: '',
                payment_method: state.paymentType,
                shipping_method: state.shippingMethodId,
                note: state.specialInstructions
            };

            function onSuccess(orderNumber) {
                window.sessionStorage.removeItem(storageKey);
                state.order = {
                    orderNumber: orderNumber || generateOrderNumber(),
                    createdAt: new Date(),
                    estimatedDelivery: state.selectedShipping
                        ? new Date(Date.now() + state.selectedShipping.estimatedDays * 86400000)
                        : new Date(Date.now() + 3 * 86400000),
                    subtotal: subtotal,
                    shippingFee: shipping,
                    discount: discount,
                    total: total,
                    shippingMethod: state.selectedShipping,
                    shippingAddress: { fullName: state.fullName, phone: state.phone, email: state.email, addressLine1: state.addressLine1 },
                    paymentMethod: { name: state.paymentLabel }
                };
                persist();
                $root.find('[data-processing-overlay]').attr('hidden','hidden');
                $btn.prop('disabled', false);
                $btn.find('.pvco3-place-label').removeAttr('hidden');
                $btn.find('.pvco3-place-loading').attr('hidden','hidden');
                goToStep(4);
            }

            function onFail(msg) {
                $root.find('[data-processing-overlay]').attr('hidden','hidden');
                $btn.prop('disabled', false);
                $btn.find('.pvco3-place-label').removeAttr('hidden');
                $btn.find('.pvco3-place-loading').attr('hidden','hidden');
                showAlert(msg || 'Đặt hàng thất bại. Vui lòng thử lại.', 'error');
            }

            if (endpoints.place_order) {
                $.ajax({ url: endpoints.place_order, method: 'POST', contentType: 'application/json', data: JSON.stringify(payload) })
                    .done(function (res) {
                        if (res.success) { onSuccess(res.increment_id); }
                        else { onFail(res.message); }
                    })
                    .fail(function (xhr) { onFail((xhr.responseJSON || {}).message); });
            } else {
                // Simulate network delay (demo)
                setTimeout(function () { onSuccess(generateOrderNumber()); }, 1800);
            }
        }

        /* ── Success screen ─────────────────────────────────────── */
        function renderSuccessScreen() {
            var o = state.order;
            if (!o) { return; }

            $root.find('[data-success-order-number]').text(o.orderNumber);
            $root.find('[data-success-order-date]').text('Ngày: ' + fmtDateWithTime(o.createdAt));

            var infoHtml =
                '<div class="pvco3-success-info-section">' +
                '<h3>Thông tin giao hàng</h3>' +
                '<div class="pvco3-success-info-rows">' +
                '<p><span>Người nhận:</span> <strong>' + esc(o.shippingAddress.fullName) + '</strong></p>' +
                '<p><span>Địa chỉ:</span> ' + esc(o.shippingAddress.addressLine1) + '</p>' +
                '<p><span>Điện thoại:</span> ' + esc(o.shippingAddress.phone) + '</p>' +
                (o.shippingMethod ? '<p class="pvco3-divider-top"><span>Vận chuyển:</span> <strong>' + esc(o.shippingMethod.name) + '</strong></p>' : '') +
                '<p><span>Dự kiến:</span> ' + fmtDate(o.estimatedDelivery) + '</p>' +
                '</div>' +
                '</div>' +
                '<div class="pvco3-success-info-section pvco3-divider-top">' +
                '<h3>Chi tiết thanh toán</h3>' +
                '<div class="pvco3-success-total-rows">' +
                '<div class="pvco3-strow"><span>Tạm tính</span><span>' + fmtVND(o.subtotal) + '</span></div>' +
                '<div class="pvco3-strow"><span>Vận chuyển</span><span>' + fmtVND(o.shippingFee) + '</span></div>' +
                (o.discount > 0 ? '<div class="pvco3-strow pvco3-strow--disc"><span>Giảm giá</span><span>-' + fmtVND(o.discount) + '</span></div>' : '') +
                '<div class="pvco3-strow pvco3-strow--grand"><span><strong>Tổng cộng</strong></span><span class="pvco3-grand-val">' + fmtVND(o.total) + '</span></div>' +
                '</div>' +
                '</div>';
            $root.find('[data-success-info]').html(infoHtml);

            if (o.shippingAddress.email) {
                $root.find('[data-success-email-msg]').html(
                    '<strong>Thư xác nhận</strong> đã được gửi tới ' + esc(o.shippingAddress.email)
                );
                $root.find('[data-success-email-box]').removeAttr('hidden');
            }
        }

        /* ── Confetti ───────────────────────────────────────────── */
        function launchConfetti() {
            if (typeof window !== 'undefined' && typeof window.confetti === 'function') {
                var end = Date.now() + 2000;
                (function fire() {
                    window.confetti({ particleCount: 50, spread: 360, startVelocity: 28,
                        origin: { x: Math.random(), y: Math.random() - 0.2 } });
                    if (Date.now() < end) { setTimeout(fire, 250); }
                }());
            }
        }

        /* ── Tab switching (payment) ────────────────────────────── */
        function switchPaymentTab(tab) {
            state.paymentTab = tab;
            $root.find('[data-tab]').removeClass('is-active').attr('aria-selected', 'false');
            $root.find('[data-tab="' + tab + '"]').addClass('is-active').attr('aria-selected', 'true');
            $root.find('[data-tab-panel]').attr('hidden', 'hidden');
            $root.find('[data-tab-panel="' + tab + '"]').removeAttr('hidden');

            if (tab === 'ewallet' && !/momo|zalo/i.test(state.paymentLabel || '')) {
                state.paymentType = '';
                state.paymentLabel = '';
            }

            if (tab === 'bank' && state.paymentType !== 'bank_transfer') {
                state.paymentType = '';
                state.paymentLabel = '';
            }

            persist();
            updatePaymentActions();
        }

        /* ── Copy to clipboard ──────────────────────────────────── */
        function copyToClipboard(targetId, $btn) {
            var text = $('#' + targetId).text();
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text).then(function () { showCopied($btn); });
            } else {
                /* Fallback */
                var ta = document.createElement('textarea');
                ta.value = text; document.body.appendChild(ta); ta.select();
                try { document.execCommand('copy'); showCopied($btn); } catch (e) {}
                document.body.removeChild(ta);
            }
        }

        function showCopied($btn) {
            var orig = $btn.html();
            $btn.html('<svg viewBox="0 0 24 24" fill="none" stroke="var(--pv-color-success,#16a34a)" stroke-width="3" width="15" height="15"><path d="M20 6 9 17l-5-5"/></svg>');
            setTimeout(function () { $btn.html(orig); }, 2000);
        }

        function isCardReady() {
            return /^\d{16}$/.test(String(state.cardNumber || '').replace(/\s/g, '')) &&
                !!String(state.cardholderName || '').trim() &&
                /^\d{2}\/\d{2}$/.test(String(state.expiry || '').trim()) &&
                /^\d{3,4}$/.test(String(state.cvv || '').trim());
        }

        function isPaymentReady() {
            if (state.paymentTab === 'card') {
                return isCardReady();
            }

            if (state.paymentTab === 'ewallet') {
                return state.paymentType === 'online_gateway' && !!String(state.paymentLabel || '').trim();
            }

            if (state.paymentTab === 'bank') {
                return !!String(state.selectedBank || '').trim();
            }

            return false;
        }

        function updatePaymentActions() {
            var ready = isPaymentReady();
            var showWalletContinue = state.paymentTab === 'ewallet';

            $root.find('[data-payment-next]')
                .prop('disabled', !ready)
                .toggleClass('is-disabled', !ready);

            $root.find('[data-ewallet-continue]')
                .prop('disabled', !ready || !showWalletContinue)
                .toggleClass('is-disabled', !ready || !showWalletContinue);
        }

        function updatePlaceOrderState() {
            var accepted = $root.find('#pvco3-terms').is(':checked');

            $root.find('[data-place-order]')
                .prop('disabled', !accepted)
                .toggleClass('is-disabled', !accepted);
        }

        /* ── Collect form data ──────────────────────────────────── */
        function collectStep1() {
            state.fullName           = $root.find('[data-field="fullName"]').val() || '';
            state.phone              = $root.find('[data-field="phone"]').val() || '';
            state.email              = $root.find('[data-field="email"]').val() || '';
            state.addressLine1       = $root.find('[data-field="addressLine1"]').val() || '';
            state.addressLine2       = $root.find('[data-field="addressLine2"]').val() || '';
            state.province           = $root.find('[data-field="province"]').val() || '';
            state.district           = $root.find('[data-field="district"]').val() || '';
            state.ward               = $root.find('[data-field="ward"]').val() || '';
            state.specialInstructions= $root.find('[data-field="specialInstructions"]').val() || '';
            state.saveDefault        = $root.find('[data-field="saveDefault"]').is(':checked');
            persist();
        }

        function collectStep2() {
            state.cardNumber      = $root.find('[data-pay-field="cardNumber"]').val() || '';
            state.cardholderName  = $root.find('[data-pay-field="cardholderName"]').val() || '';
            state.expiry          = $root.find('[data-pay-field="expiry"]').val() || '';
            state.cvv             = $root.find('[data-pay-field="cvv"]').val() || '';
            if (state.paymentTab === 'card') {
                var masked = state.cardNumber.slice(-4);
                state.paymentType  = 'online_gateway';
                state.paymentLabel = 'Thẻ ****' + masked;
            }
            persist();
            updatePaymentActions();
        }

        function fillStep2() {
            $root.find('[data-pay-field="cardNumber"]').val(state.cardNumber || '');
            $root.find('[data-pay-field="cardholderName"]').val(state.cardholderName || '');
            $root.find('[data-pay-field="expiry"]').val(state.expiry || '');
            $root.find('[data-pay-field="cvv"]').val(state.cvv || '');

            switchPaymentTab(state.paymentTab || 'card');

            if (state.paymentTab === 'ewallet' && state.paymentLabel) {
                var walletCode = state.paymentLabel.toLowerCase().indexOf('zalo') !== -1 ? 'zalopay' : 'momo';
                $root.find('[data-ewallet-card]').removeClass('is-selected');
                $root.find('[data-ewallet="' + walletCode + '"]').addClass('is-selected');
            }

            if (state.paymentTab === 'bank') {
                $root.find('[data-bank]').removeClass('is-selected');
                $root.find('[data-bank="' + (state.selectedBank || 'vietcombank') + '"]').addClass('is-selected');
                syncBankTransferDisplay(
                    $root.find('[data-bank="' + (state.selectedBank || 'vietcombank') + '"] .pvco3-bank-name').text() || 'Vietcombank'
                );
            }

            updatePaymentActions();
        }

        function fillStep1() {
            $root.find('[data-field="fullName"]').val(state.fullName || '');
            $root.find('[data-field="phone"]').val(state.phone || '');
            $root.find('[data-field="email"]').val(state.email || '');
            $root.find('[data-field="addressLine1"]').val(state.addressLine1 || '');
            $root.find('[data-field="addressLine2"]').val(state.addressLine2 || '');
            $root.find('[data-field="specialInstructions"]').val(state.specialInstructions || '');
            if (state.province) {
                $root.find('[data-field="province"]').val(state.province);
                populateDistrictSelect();
            }
            if (state.district) {
                $root.find('[data-field="district"]').val(state.district);
                populateWardSelect();
            }
            if (state.ward) { $root.find('[data-field="ward"]').val(state.ward); }
        }

        /* ── Hydrate from Magento customer data ─────────────────── */
        function hydrate() {
            var cust = bootstrap.customer || {};
            var addr = cust.address || {};
            state.fullName     = state.fullName     || String(cust.full_name || cust.name || '');
            state.email        = state.email        || String(cust.email || '');
            state.phone        = state.phone        || String(cust.phone || '');
            state.addressLine1 = state.addressLine1 || String(addr.street || '');
        }

        /* ── Wire events ────────────────────────────────────────── */
        function wireEvents() {
            /* Step navigation */
            $root.on('click', '[data-next-step]', function() {
                var nextStep = parseInt($(this).data('next-step'));
                if (nextStep === 2) {
                    collectStep1();
                    if (!validateStep1()) { return; }
                }
                if (nextStep === 3) {
                    collectStep2();
                    if (!validateStep2()) { return; }
                }
                goToStep(nextStep);
                renderSidebar();
            });

            $root.on('click', '[data-prev-step]', function () {
                var prevStep = parseInt($(this).data('prev-step'));
                goToStep(prevStep);
                renderSidebar();
            });

            $root.on('click', '[data-goto-step]', function () {
                var s = parseInt($(this).data('goto-step'));
                goToStep(s);
                renderSidebar();
            });

            /* Place order */
            $root.on('click', '[data-place-order]', placeOrder);

            /* Province cascade */
            $root.on('change', '[data-province-select]', function () {
                state.province = String($(this).val() || '');
                state.district = '';
                state.ward = '';
                populateDistrictSelect();
                persist();
            });

            $root.on('change', '[data-district-select]', function () {
                state.district = String($(this).val() || '');
                state.ward = '';
                populateWardSelect();
                persist();
            });

            $root.on('change', '[data-ward-select]', function () {
                state.ward = String($(this).val() || '');
                persist();
            });

            /* Shipping method selection */
            $root.on('click', '[data-ship-id]', function () {
                var id = String($(this).data('ship-id'));
                state.shippingMethodId = id;
                $.each(availableShippingMethods, function (_, m) {
                    if (m.id === id) { state.selectedShipping = m; return false; }
                    return true;
                });
                persist();
                $root.find('[data-ship-card]').removeClass('is-selected');
                $(this).addClass('is-selected');
                $(this).find('.pvco3-ship-radio-inner').html('<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" width="12" height="12"><path d="M20 6 9 17l-5-5"/></svg>');
                $root.find('[data-ship-card]:not(.is-selected) .pvco3-ship-radio-inner').empty();
                renderSidebar();
            });

            /* Payment tabs */
            $root.on('click', '[data-tab]', function () {
                switchPaymentTab(String($(this).data('tab')));
            });

            /* E-wallet selection */
            $root.on('click', '[data-ewallet]', function () {
                var wallet = String($(this).data('ewallet'));
                var name = wallet === 'momo' ? 'MOMO' : 'ZaloPay';
                state.paymentType  = 'online_gateway';
                state.paymentLabel = name;
                $root.find('[data-ewallet-card]').removeClass('is-selected');
                $(this).addClass('is-selected');
                persist();
                updatePaymentActions();
            });

            /* E-wallet continue button */
            $root.on('click', '[data-ewallet-continue]', function () {
                if (!state.paymentType) { showAlert('Vui lòng chọn ví điện tử.', 'error'); return; }
                collectStep2();
                goToStep(3);
                renderSidebar();
            });

            /* Bank card selection */
            $root.on('click', '[data-bank]', function () {
                var bank = String($(this).data('bank'));
                state.selectedBank = bank;
                state.paymentType  = 'bank_transfer';
                state.paymentLabel = 'Chuyển khoản - ' + $root.find('[data-bank="' + bank + '"] .pvco3-bank-name').text();
                $root.find('[data-bank]').removeClass('is-selected');
                $(this).addClass('is-selected');
                syncBankTransferDisplay($root.find('[data-bank="' + bank + '"] .pvco3-bank-name').text());
                persist();
                updatePaymentActions();
            });

            /* Copy buttons */
            $root.on('click', '[data-copy-target]', function () {
                copyToClipboard(String($(this).data('copy-target')), $(this));
            });

            /* Card number formatting */
            $root.on('input', '[data-pay-field="cardNumber"]', function () {
                var v = $(this).val().replace(/\D/g, '').substring(0, 16);
                var formatted = v.replace(/(.{4})/g, '$1 ').trim();
                $(this).val(formatted);
                state.cardNumber = v;
                updatePaymentActions();
            });

            /* Expiry formatting */
            $root.on('input', '[data-pay-field="expiry"]', function () {
                var v = $(this).val().replace(/\D/g, '').substring(0, 4);
                if (v.length > 2) { v = v.substring(0, 2) + '/' + v.substring(2); }
                $(this).val(v);
                state.expiry = v;
                updatePaymentActions();
            });

            $root.on('input', '[data-pay-field="cardholderName"], [data-pay-field="cvv"]', function () {
                var fieldName = String($(this).data('pay-field') || '');
                state[fieldName] = $(this).val() || '';
                updatePaymentActions();
            });

            /* Save card toggle */
            $root.on('click', '[data-toggle-saved]', function () {
                $(this).text($(this).text().trim() === 'Sử dụng thẻ đã lưu' ? 'Nhập thẻ mới' : 'Sử dụng thẻ đã lưu');
            });

            $root.on('change', '#pvco3-terms', function () {
                updatePlaceOrderState();
            });

            /* Download invoice (demo) */
            $root.on('click', '[data-download-invoice]', function () {
                alert('Chức năng tải hóa đơn sẽ được kích hoạt cho đơn hàng thật.');
            });

            /* Prevent Enter on inputs submitting accidentally */
            $root.on('keydown', '.pvco3-input', function (e) {
                if (e.key === 'Enter' && !$(this).is('textarea')) { e.preventDefault(); }
            });
        }

        /* ── Boot ───────────────────────────────────────────────── */
        restore();
        hydrate();
        populateProvinceSelect();
        fillStep1();
        fillStep2();
        syncBankTransferDisplay(
            $root.find('[data-bank="' + (state.selectedBank || 'vietcombank') + '"] .pvco3-bank-name').text() || 'Vietcombank'
        );
        renderShippingMethods();
        renderSidebar();
        wireEvents();
        updatePaymentActions();
        updatePlaceOrderState();
        updateStepIndicator(state.currentStep || 1);

        // Render the panel for persisted step
        $root.find('[data-panel]').attr('hidden', 'hidden');
        var step = state.currentStep || 1;
        if (step <= 3) {
            $root.find('[data-panel="' + step + '"]').removeAttr('hidden');
            $root.find('[data-checkout-layout]').removeAttr('hidden');
            $root.find('[data-success-screen]').attr('hidden', 'hidden');
            if (step === 3) { renderReview(); }
        }
    };
});
