define(['jquery'], function ($) {
    'use strict';

    return function (config, element) {
        var $root = $(element);
        var scriptNode = document.querySelector($root.data('bootstrap-selector') || '#pvco3-bootstrap');
        var bootstrap = {};
        var storageKey = 'pvmodern_checkout_reference_v1';
        var quoteTimer = null;
        var submitting = false;
        var currencyMeta = null;

        var LOCATION_TREE = [
            {
                value: 'Ho Chi Minh City',
                label: 'Hồ Chí Minh',
                postcode: '700000',
                districts: [
                    { value: 'Quan 1', label: 'Quận 1', wards: [
                        { value: 'Ben Nghe', label: 'Bến Nghé' },
                        { value: 'Ben Thanh', label: 'Bến Thành' },
                        { value: 'Nguyen Thai Binh', label: 'Nguyễn Thái Bình' }
                    ] },
                    { value: 'Quan 3', label: 'Quận 3', wards: [
                        { value: 'Vo Thi Sau', label: 'Võ Thị Sáu' },
                        { value: 'Ward 6', label: 'Phường 6' },
                        { value: 'Ward 7', label: 'Phường 7' }
                    ] },
                    { value: 'Thu Duc City', label: 'Thủ Đức', wards: [
                        { value: 'An Khanh', label: 'An Khánh' },
                        { value: 'Thao Dien', label: 'Thảo Điền' },
                        { value: 'Linh Tay', label: 'Linh Tây' }
                    ] }
                ]
            },
            {
                value: 'Ha Noi',
                label: 'Hà Nội',
                postcode: '100000',
                districts: [
                    { value: 'Ba Dinh', label: 'Ba Đình', wards: [
                        { value: 'Kim Ma', label: 'Kim Mã' },
                        { value: 'Cong Vi', label: 'Cống Vị' },
                        { value: 'Lieu Giai', label: 'Liễu Giai' }
                    ] },
                    { value: 'Hoan Kiem', label: 'Hoàn Kiếm', wards: [
                        { value: 'Hang Bong', label: 'Hàng Bông' },
                        { value: 'Trang Tien', label: 'Tràng Tiền' },
                        { value: 'Ly Thai To', label: 'Lý Thái Tổ' }
                    ] },
                    { value: 'Cau Giay', label: 'Cầu Giấy', wards: [
                        { value: 'Dich Vong', label: 'Dịch Vọng' },
                        { value: 'Mai Dich', label: 'Mai Dịch' },
                        { value: 'Nghia Tan', label: 'Nghĩa Tân' }
                    ] }
                ]
            },
            {
                value: 'Da Nang',
                label: 'Đà Nẵng',
                postcode: '550000',
                districts: [
                    { value: 'Hai Chau', label: 'Hải Châu', wards: [
                        { value: 'Thach Thang', label: 'Thạch Thang' },
                        { value: 'Hai Chau 1', label: 'Hải Châu 1' },
                        { value: 'Nam Duong', label: 'Nam Dương' }
                    ] },
                    { value: 'Thanh Khe', label: 'Thanh Khê', wards: [
                        { value: 'An Khe', label: 'An Khê' },
                        { value: 'Tam Thuan', label: 'Tam Thuận' },
                        { value: 'Thanh Khe Tay', label: 'Thanh Khê Tây' }
                    ] },
                    { value: 'Son Tra', label: 'Sơn Trà', wards: [
                        { value: 'An Hai Bac', label: 'An Hải Bắc' },
                        { value: 'Man Thai', label: 'Mân Thái' },
                        { value: 'Phuoc My', label: 'Phước Mỹ' }
                    ] }
                ]
            }
        ];

        var BANK_OPTIONS = {
            vietcombank: { name: 'Vietcombank', code: '970' },
            techcombank: { name: 'TechcomBank', code: '980' },
            acb: { name: 'ACB', code: '963' },
            vpbank: { name: 'VPBank', code: '975' }
        };

        var SHIPPING_COPY = {
            ghn: {
                label: 'Giao Hàng Nhanh',
                description: 'Giao hàng nhanh 1-2 ngày'
            },
            ghtk: {
                label: 'Giao Hàng Tiết Kiệm',
                description: 'Giao hàng tiết kiệm 3-5 ngày'
            },
            spx: {
                label: 'Shopee Express',
                description: 'Giao hàng trong 2-3 ngày, toàn quốc'
            },
            pickup: {
                label: 'Nhận tại cửa hàng',
                description: 'Nhận hàng trực tiếp tại showroom Techieworld'
            }
        };

        var state = {
            step: 1,
            full_name: '',
            phone: '',
            email: '',
            address: '',
            address_extra: '',
            city: '',
            region: '',
            ward: '',
            postcode: '700000',
            country_id: 'VN',
            receiving_method: 'delivery',
            pickup_store: '',
            shipping_method: '',
            shipping_methods: [],
            selected_shipping: null,
            payment_tab: 'card',
            payment_method: '',
            payment_variant: '',
            selected_wallet: 'momo',
            selected_bank: 'vietcombank',
            cod_selected: false,
            card_number: '',
            cardholder_name: '',
            card_expiry: '',
            card_cvv: '',
            save_address: false,
            save_card: false,
            transfer_code: '',
            quote_summary: null
        };

        if (!scriptNode) {
            return;
        }

        try {
            bootstrap = JSON.parse(scriptNode.textContent || '{}');
        } catch (error) {
            bootstrap = {};
        }

        function esc(value) {
            return String(value || '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;');
        }

        function normalizeKey(value) {
            return String(value || '')
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-z0-9]+/g, ' ')
                .trim();
        }

        function getCurrencyMeta() {
            if (currencyMeta) {
                return currencyMeta;
            }

            var sample = String(bootstrap.cart && bootstrap.cart.subtotal_formatted || '');
            if (sample.indexOf('₫') !== -1) {
                currencyMeta = { locale: 'vi-VN', currency: 'VND', digits: 0 };
            } else {
                currencyMeta = { locale: 'en-US', currency: 'USD', digits: 2 };
            }

            return currencyMeta;
        }

        function formatCurrency(value) {
            var meta = getCurrencyMeta();

            return new Intl.NumberFormat(meta.locale, {
                style: 'currency',
                currency: meta.currency,
                minimumFractionDigits: meta.digits,
                maximumFractionDigits: meta.digits
            }).format(parseFloat(value || 0));
        }

        function placeholderImage(label) {
            var initials = String(label || 'TW').trim().split(/\s+/).slice(0, 2).join(' ').substring(0, 18);
            var svg = '<svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 96 96">' +
                '<defs><linearGradient id="g" x1="0" x2="1"><stop stop-color="#eff6ff"/><stop offset="1" stop-color="#dbeafe"/></linearGradient></defs>' +
                '<rect width="96" height="96" rx="18" fill="url(#g)"/>' +
                '<text x="48" y="46" text-anchor="middle" fill="#1d4ed8" font-size="13" font-family="Arial" font-weight="700">Techieworld</text>' +
                '<text x="48" y="66" text-anchor="middle" fill="#475569" font-size="10" font-family="Arial">' + esc(initials) + '</text>' +
                '</svg>';

            return 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(svg);
        }

        function paymentMethodByCode(code) {
            var found = null;

            $.each(bootstrap.payment_methods || [], function (_, method) {
                if (method.code === code) {
                    found = method;
                    return false;
                }

                return true;
            });

            return found;
        }

        function restoreState() {
            try {
                var cached = JSON.parse(window.sessionStorage.getItem(storageKey) || '{}');
                if (cached && typeof cached === 'object') {
                    state = $.extend(true, state, cached);
                }
            } catch (error) {}
        }

        function persistState() {
            try {
                window.sessionStorage.setItem(storageKey, JSON.stringify(state));
            } catch (error) {}
        }

        function hydrateFromBootstrap() {
            var customer = bootstrap.customer || {};
            var address = customer.address || {};

            state.full_name = state.full_name || String(customer.full_name || '');
            state.email = state.email || String(customer.email || '');
            state.phone = state.phone || String(customer.phone || '');
            state.address = state.address || String(address.street || '');
            state.city = state.city || String(address.city || 'Ho Chi Minh City');
            state.region = state.region || String(address.region || '');
            state.postcode = state.postcode || String(address.postcode || '700000');
            state.country_id = state.country_id || String(address.country_id || 'VN');
            state.transfer_code = state.transfer_code || ((paymentMethodByCode('bank_transfer') && paymentMethodByCode('bank_transfer').note_prefix) || 'TRANSFER') + '-' + String(Date.now()).slice(-10);
        }

        function setAlert(message, type) {
            var $alert = $root.find('[data-role="checkout-alert"]');

            if (!message) {
                $alert.attr('hidden', 'hidden').removeClass('is-error is-success').text('');
                return;
            }

            $alert.removeAttr('hidden')
                .removeClass('is-error is-success')
                .addClass(type === 'success' ? 'is-success' : 'is-error')
                .text(message);
        }

        function clearErrors() {
            $root.find('[data-error-for]').text('');
        }

        function setErr(key, message) {
            $root.find('[data-error-for="' + key + '"]').text(message);
        }

        function provinceFromValue(value) {
            var normalized = normalizeKey(value);
            var found = null;

            $.each(LOCATION_TREE, function (_, province) {
                if (normalizeKey(province.value) === normalized || normalizeKey(province.label) === normalized) {
                    found = province;
                    return false;
                }

                return true;
            });

            return found;
        }

        function districtFromValue(province, value) {
            var normalized = normalizeKey(value);
            var found = null;

            $.each((province && province.districts) || [], function (_, district) {
                if (normalizeKey(district.value) === normalized || normalizeKey(district.label) === normalized) {
                    found = district;
                    return false;
                }

                return true;
            });

            return found;
        }

        function wardFromValue(district, value) {
            var normalized = normalizeKey(value);
            var found = null;

            $.each((district && district.wards) || [], function (_, ward) {
                if (normalizeKey(ward.value) === normalized || normalizeKey(ward.label) === normalized) {
                    found = ward;
                    return false;
                }

                return true;
            });

            return found;
        }

        function getProvinceLabel(value) {
            var province = provinceFromValue(value);
            return province ? province.label : value;
        }

        function getDistrictLabel(provinceValue, districtValue) {
            var province = provinceFromValue(provinceValue);
            var district = districtFromValue(province, districtValue);
            return district ? district.label : districtValue;
        }

        function getWardLabel(provinceValue, districtValue, wardValue) {
            var province = provinceFromValue(provinceValue);
            var district = districtFromValue(province, districtValue);
            var ward = wardFromValue(district, wardValue);
            return ward ? ward.label : wardValue;
        }

        function syncLocationSelects() {
            var $province = $root.find('[data-role="province-select"]');
            var $district = $root.find('[data-role="district-select"]');
            var $ward = $root.find('[data-role="ward-select"]');
            var provinceOptions = ['<option value="">Chọn tỉnh/thành phố</option>'];
            var province = null;
            var district = null;

            $.each(LOCATION_TREE, function (_, item) {
                provinceOptions.push('<option value="' + esc(item.value) + '">' + esc(item.label) + '</option>');
            });

            $province.html(provinceOptions.join(''));
            province = provinceFromValue(state.city) || LOCATION_TREE[0];
            state.city = province.value;
            state.postcode = province.postcode;
            $province.val(province.value);

            function renderDistrictOptions() {
                var districtOptions = ['<option value="">' + esc('Chọn quận/huyện') + '</option>'];
                var activeProvince = provinceFromValue(state.city) || LOCATION_TREE[0];
                district = districtFromValue(activeProvince, state.region) || activeProvince.districts[0];

                $.each(activeProvince.districts, function (_, item) {
                    districtOptions.push('<option value="' + esc(item.value) + '">' + esc(item.label) + '</option>');
                });

                state.region = district.value;
                $district.prop('disabled', false).html(districtOptions.join('')).val(district.value);
                renderWardOptions(activeProvince, district);
            }

            function renderWardOptions(activeProvince, activeDistrict) {
                var wardOptions = ['<option value="">' + esc('Chọn phường/xã') + '</option>'];
                var currentWard = wardFromValue(activeDistrict, state.ward) || activeDistrict.wards[0];

                $.each(activeDistrict.wards, function (_, item) {
                    wardOptions.push('<option value="' + esc(item.value) + '">' + esc(item.label) + '</option>');
                });

                state.ward = currentWard ? currentWard.value : '';
                $ward.prop('disabled', false).html(wardOptions.join('')).val(state.ward);
            }

            renderDistrictOptions();

            $province.off('change.pvco3').on('change.pvco3', function () {
                var selected = provinceFromValue($(this).val()) || LOCATION_TREE[0];
                state.city = selected.value;
                state.postcode = selected.postcode;
                state.region = '';
                state.ward = '';
                persistState();
                syncLocationSelects();
                scheduleQuoteFetch();
            });

            $district.off('change.pvco3').on('change.pvco3', function () {
                var activeProvince = provinceFromValue(state.city) || LOCATION_TREE[0];
                var selectedDistrict = districtFromValue(activeProvince, $(this).val()) || activeProvince.districts[0];
                state.region = selectedDistrict.value;
                state.ward = '';
                persistState();
                syncLocationSelects();
                scheduleQuoteFetch();
            });

            $ward.off('change.pvco3').on('change.pvco3', function () {
                state.ward = String($(this).val() || '');
                persistState();
            });
        }

        function fillFields() {
            $root.find('[data-field]').each(function () {
                var $field = $(this);
                var key = String($field.data('field'));

                if ($field.is(':checkbox')) {
                    $field.prop('checked', !!state[key]);
                } else {
                    $field.val(state[key] || '');
                }
            });
        }

        function collectFields() {
            $root.find('[data-field]').each(function () {
                var $field = $(this);
                var key = String($field.data('field'));

                if ($field.is(':checkbox')) {
                    state[key] = $field.is(':checked');
                } else {
                    state[key] = String($field.val() || '');
                }
            });

            persistState();
        }

        function shippingDisplayLabel(method) {
            var copy = SHIPPING_COPY[method.provider] || {};
            return copy.label || method.label || method.provider;
        }

        function shippingDisplayDescription(method) {
            var copy = SHIPPING_COPY[method.provider] || {};
            return copy.description || method.description || '';
        }

        function shippingEstimatedText(method) {
            var days = parseInt(method.eta_min || method.eta_max || 0, 10) || 0;
            var etaDate = new Date();
            etaDate.setDate(etaDate.getDate() + days);
            var day = etaDate.getDate() < 10 ? '0' + etaDate.getDate() : etaDate.getDate();
            var month = (etaDate.getMonth() + 1) < 10 ? '0' + (etaDate.getMonth() + 1) : (etaDate.getMonth() + 1);

            return 'Dự kiến: ' + day + '/' + month + '/' + etaDate.getFullYear() + ' (' + days + ' ngày)';
        }

        function sortShippingMethods(methods) {
            var order = { spx: 1, ghn: 2, ghtk: 3, pickup: 4 };

            return (methods || []).sort(function (left, right) {
                return (order[left.provider] || 99) - (order[right.provider] || 99);
            });
        }

        function preferredShippingMethod(methods) {
            var preferred = null;

            $.each(methods || [], function (_, method) {
                if (method.provider === 'ghn') {
                    preferred = method;
                    return false;
                }

                return true;
            });

            return preferred || (methods && methods[0]) || null;
        }

        function updateSummaryTotals() {
            var subtotalText = (bootstrap.cart && bootstrap.cart.subtotal_formatted) || formatCurrency((bootstrap.cart && bootstrap.cart.subtotal) || 0);
            var shippingText = '—';
            var grandText = (bootstrap.cart && bootstrap.cart.grand_total_formatted) || formatCurrency((bootstrap.cart && bootstrap.cart.grand_total) || 0);
            var shippingName = 'Chưa chọn';

            if (state.selected_shipping) {
                shippingText = state.selected_shipping.amount_formatted || formatCurrency(state.selected_shipping.amount || 0);
                grandText = formatCurrency(((bootstrap.cart && bootstrap.cart.subtotal) || 0) + parseFloat(state.selected_shipping.amount || 0));
                shippingName = shippingDisplayLabel(state.selected_shipping);
            }

            $root.find('[data-summary-subtotal]').text(subtotalText);
            $root.find('[data-summary-shipping]').text(shippingText);
            $root.find('[data-summary-grand]').text(grandText);
            $root.find('[data-summary-count-text]').text(String((bootstrap.cart && bootstrap.cart.count) || 0));
            $root.find('[data-summary-shipping-name]').text(shippingName);
        }

        function bindImageFallback($scope) {
            $scope.find('img[data-fallback]').each(function () {
                var $img = $(this);
                $img.off('error.pvco3').on('error.pvco3', function () {
                    $img.attr('src', $img.data('fallback'));
                });
            });
        }

        function renderSummaryItems() {
            var items = (bootstrap.cart && bootstrap.cart.items) || [];
            var html = [];

            if (!items.length) {
                html.push('<p class="pvco3-summary-empty">Giỏ hàng trống.</p>');
            } else {
                $.each(items, function (_, item) {
                    var src = item.image_url || placeholderImage(item.name);
                    var fallback = placeholderImage(item.name);

                    html.push(
                        '<article class="pvco3-summary-item">' +
                            '<img src="' + esc(src) + '" alt="' + esc(item.name) + '" class="pvco3-summary-thumb" loading="lazy" data-fallback="' + esc(fallback) + '"/>' +
                            '<div class="pvco3-summary-copy">' +
                                '<strong>' + esc(item.name) + '</strong>' +
                                '<span>x ' + esc(item.qty) + '</span>' +
                            '</div>' +
                            '<strong class="pvco3-summary-price">' + esc(item.row_total_formatted || formatCurrency(item.row_total || 0)) + '</strong>' +
                        '</article>'
                    );
                });
            }

            $root.find('[data-summary-items]').html(html.join(''));
            bindImageFallback($root.find('[data-summary-items]'));
            updateSummaryTotals();
        }

        function renderShippingMethods() {
            var methods = state.shipping_methods || [];
            var $list = $root.find('[data-shipping-list]');
            var $empty = $root.find('[data-shipping-empty]');

            if (!methods.length) {
                $list.empty();
                $empty.removeAttr('hidden');
                updateSummaryTotals();
                return;
            }

            $empty.attr('hidden', 'hidden');

            $list.html($.map(methods, function (method) {
                var isSelected = state.shipping_method === method.method_code;

                return (
                    '<button type="button" class="pvco3-ship-card' + (isSelected ? ' is-selected' : '') + '" data-ship-option="' + esc(method.method_code) + '">' +
                        '<span class="pvco3-ship-marker">' + (isSelected ? '✓' : '') + '</span>' +
                        '<span class="pvco3-ship-copy">' +
                            '<span class="pvco3-ship-title">' + esc(shippingDisplayLabel(method)) + '</span>' +
                            '<span class="pvco3-ship-desc">' + esc(shippingDisplayDescription(method)) + '</span>' +
                            '<small>' + esc(shippingEstimatedText(method)) + '</small>' +
                        '</span>' +
                        '<span class="pvco3-ship-fee">' + esc(method.amount_formatted || formatCurrency(method.amount || 0)) + '</span>' +
                    '</button>'
                );
            }).join(''));
        }

        function syncSelectedShipping() {
            var found = null;

            $.each(state.shipping_methods || [], function (_, method) {
                if (method.method_code === state.shipping_method) {
                    found = method;
                    return false;
                }

                return true;
            });

            state.selected_shipping = found;
            persistState();
            renderShippingMethods();
            updateSummaryTotals();
        }

        function scheduleQuoteFetch() {
            clearTimeout(quoteTimer);
            quoteTimer = window.setTimeout(fetchShippingQuotes, 500);
        }

        function fetchShippingQuotes() {
            var $loading = $root.find('[data-shipping-loading]');
            var $error = $root.find('[data-shipping-error]');
            var $empty = $root.find('[data-shipping-empty]');

            collectFields();

            if (!state.address || !state.city || !state.region) {
                state.shipping_methods = [];
                state.shipping_method = '';
                state.selected_shipping = null;
                $error.attr('hidden', 'hidden').text('');
                $loading.attr('hidden', 'hidden');
                $empty.removeAttr('hidden');
                renderShippingMethods();
                return;
            }

            $loading.removeAttr('hidden');
            $error.attr('hidden', 'hidden').text('');
            $empty.attr('hidden', 'hidden');

            $.ajax({
                url: bootstrap.endpoints.quote,
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    form_key: bootstrap.form_key,
                    full_name: state.full_name,
                    email: state.email,
                    phone: state.phone,
                    address: state.address,
                    city: state.city,
                    region: state.region,
                    postcode: state.postcode,
                    country_id: state.country_id,
                    receiving_method: state.receiving_method,
                    pickup_store: state.pickup_store
                })
            }).done(function (response) {
                state.shipping_methods = sortShippingMethods(response.shipping_methods || []);
                state.quote_summary = response.summary || null;

                if (response.payment_methods) {
                    bootstrap.payment_methods = response.payment_methods;
                    renderPaymentAvailability();
                }

                if (!state.shipping_method) {
                    var preferred = preferredShippingMethod(state.shipping_methods);
                    state.shipping_method = preferred ? preferred.method_code : '';
                } else {
                    var exists = false;
                    $.each(state.shipping_methods, function (_, method) {
                        if (method.method_code === state.shipping_method) {
                            exists = true;
                            return false;
                        }

                        return true;
                    });

                    if (!exists) {
                        var fallbackMethod = preferredShippingMethod(state.shipping_methods);
                        state.shipping_method = fallbackMethod ? fallbackMethod.method_code : '';
                    }
                }

                syncSelectedShipping();
            }).fail(function (xhr) {
                var message = (xhr.responseJSON && xhr.responseJSON.message) || 'Không thể tải danh sách vận chuyển. Vui lòng thử lại.';

                state.shipping_methods = [];
                state.shipping_method = '';
                state.selected_shipping = null;
                $error.removeAttr('hidden').text(message);
                renderShippingMethods();
            }).always(function () {
                $loading.attr('hidden', 'hidden');
            });
        }

        function renderPaymentAvailability() {
            var hasGateway = !!paymentMethodByCode('online_gateway');
            var hasBank = !!paymentMethodByCode('bank_transfer');
            var hasCod = !!paymentMethodByCode('cod');

            $root.find('[data-pay-tab="card"], [data-pay-tab="wallet"]').toggleClass('is-disabled', !hasGateway);
            $root.find('[data-pay-tab="bank"]').toggleClass('is-disabled', !(hasBank || hasCod));
            $root.find('[data-cod-option]').toggle(!!hasCod);
            renderBankTransferDetails();
            renderPaymentSelection();
        }

        function renderPaymentSelection() {
            $root.find('[data-pay-tab]').removeClass('is-active');
            $root.find('[data-pay-tab="' + state.payment_tab + '"]').addClass('is-active');
            $root.find('[data-pay-panel]').removeClass('is-active');
            $root.find('[data-pay-panel="' + state.payment_tab + '"]').addClass('is-active');

            $root.find('[data-wallet-option]').removeClass('is-selected');
            $root.find('[data-wallet-option="' + state.selected_wallet + '"]').addClass('is-selected');
            $root.find('[data-bank-option]').removeClass('is-selected');
            $root.find('[data-bank-option="' + state.selected_bank + '"]').addClass('is-selected');
            $root.find('[data-cod-option]').toggleClass('is-selected', !!state.cod_selected);
        }

        function renderBankTransferDetails() {
            var method = paymentMethodByCode('bank_transfer') || {};
            var selectedBank = BANK_OPTIONS[state.selected_bank] || BANK_OPTIONS.vietcombank;
            var prefix = method.note_prefix || 'TRANSFER';

            $root.find('[data-bank-account-name]').text(method.account_name || 'TECHIEWORLD CO., LTD.');
            $root.find('[data-bank-account-number]').text(method.account_number || '0123 456 789 012');
            $root.find('[data-bank-name]').text(selectedBank.name);
            $root.find('[data-bank-transfer-code]').text((prefix + '-' + String(state.transfer_code || Date.now())).replace(/[^A-Z0-9\-]/gi, '').slice(0, 24));
        }

        function paymentDisplayName() {
            if (state.payment_method === 'cod') {
                return 'Thanh toán khi nhận hàng (COD)';
            }

            if (state.payment_method === 'bank_transfer') {
                var selectedBank = BANK_OPTIONS[state.selected_bank] || BANK_OPTIONS.vietcombank;
                return 'Chuyển khoản - ' + selectedBank.name;
            }

            if (state.payment_method === 'online_gateway' && state.payment_variant === 'zalopay') {
                return 'ZaloPay';
            }

            if (state.payment_method === 'online_gateway' && state.payment_variant === 'momo') {
                return 'MoMo';
            }

            if (state.payment_method === 'online_gateway' && state.payment_variant === 'saved_card') {
                return 'Visa •••• 4242';
            }

            if (state.payment_method === 'online_gateway') {
                return 'Thẻ thanh toán';
            }

            return 'Chưa chọn';
        }

        function renderReview() {
            var addressParts = [];
            var shippingText = 'Chưa chọn';
            var paymentText = paymentDisplayName();

            addressParts.push('<strong>' + esc(state.full_name) + '</strong>');
            addressParts.push(esc(state.address));

            if (state.address_extra) {
                addressParts.push(esc(state.address_extra));
            }

            addressParts.push(
                esc(getWardLabel(state.city, state.region, state.ward)) + ', ' +
                esc(getDistrictLabel(state.city, state.region)) + ', ' +
                esc(getProvinceLabel(state.city))
            );
            addressParts.push(esc(state.phone) + ' · ' + esc(state.email));

            if (state.selected_shipping) {
                shippingText = '<strong>' + esc(shippingDisplayLabel(state.selected_shipping)) + '</strong>' +
                    '<span>' + esc(shippingDisplayDescription(state.selected_shipping)) + '</span>' +
                    '<small>' + esc(shippingEstimatedText(state.selected_shipping)) + '</small>';
            }

            $root.find('[data-review-address]').html('<p>' + addressParts.join('</p><p>') + '</p>');
            $root.find('[data-review-shipping]').html('<p>' + shippingText + '</p>');
            $root.find('[data-review-payment]').html('<p><strong>' + esc(paymentText) + '</strong></p>');

            if (state.note) {
                $root.find('[data-review-note]').text(state.note);
                $root.find('[data-review-note-block]').removeAttr('hidden');
            } else {
                $root.find('[data-review-note-block]').attr('hidden', 'hidden');
            }
        }

        function renderStepper() {
            var progress = { 1: '0%', 2: '34%', 3: '67%', 4: '100%' };

            $root.find('[data-step]').each(function () {
                var $step = $(this);
                var stepNumber = parseInt($step.data('step'), 10);
                var $circle = $step.find('[data-step-circle]');

                $step.removeClass('is-current is-complete');
                if (state.step > stepNumber) {
                    $step.addClass('is-complete');
                    $circle.text('✓');
                } else if (state.step === stepNumber) {
                    $step.addClass('is-current');
                    $circle.text(String(stepNumber));
                } else {
                    $circle.text(String(stepNumber));
                }
            });

            $root.find('[data-step-progress]').css('width', progress[state.step] || '0%');
            $root.find('[data-step-panel]').removeClass('is-active');
            $root.find('[data-step-panel="' + state.step + '"]').addClass('is-active');
            $root.find('[data-summary-sidebar]').prop('hidden', state.step === 4);
        }

        function showStep(step) {
            state.step = step;
            persistState();
            if (step === 3) {
                renderReview();
            }
            renderStepper();
        }

        function validateStepOne() {
            var phonePattern = /^[0-9+\s\-]{8,15}$/;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var isValid = true;

            clearErrors();
            setAlert('');
            collectFields();

            if (!state.full_name) {
                setErr('full_name', 'Vui lòng nhập họ và tên.');
                isValid = false;
            }

            if (!state.phone || !phonePattern.test(state.phone)) {
                setErr('phone', 'Số điện thoại không hợp lệ.');
                isValid = false;
            }

            if (!state.email || !emailPattern.test(state.email)) {
                setErr('email', 'Email không hợp lệ.');
                isValid = false;
            }

            if (!state.address) {
                setErr('address', 'Vui lòng nhập địa chỉ giao hàng.');
                isValid = false;
            }

            if (!state.city) {
                setErr('city', 'Vui lòng chọn tỉnh/thành phố.');
                isValid = false;
            }

            if (!state.region) {
                setErr('region', 'Vui lòng chọn quận/huyện.');
                isValid = false;
            }

            if (!state.ward) {
                setErr('ward', 'Vui lòng chọn phường/xã.');
                isValid = false;
            }

            if (!state.shipping_method) {
                setErr('shipping_method', 'Vui lòng chọn phương thức vận chuyển.');
                isValid = false;
            }

            return isValid;
        }

        function validateCardInputs() {
            var cardNumber = String(state.card_number || '').replace(/\s+/g, '');
            var expiryPattern = /^(0[1-9]|1[0-2])\/\d{2}$/;
            var isValid = true;

            if (!cardNumber || cardNumber.length < 16) {
                setErr('card_number', 'Vui lòng nhập số thẻ hợp lệ.');
                isValid = false;
            }

            if (!state.cardholder_name) {
                setErr('cardholder_name', 'Vui lòng nhập tên chủ thẻ.');
                isValid = false;
            }

            if (!expiryPattern.test(String(state.card_expiry || ''))) {
                setErr('card_expiry', 'Định dạng MM/YY không hợp lệ.');
                isValid = false;
            }

            if (!String(state.card_cvv || '').match(/^\d{3,4}$/)) {
                setErr('card_cvv', 'CVV không hợp lệ.');
                isValid = false;
            }

            return isValid;
        }

        function finalizePaymentSelection() {
            var hasGateway = !!paymentMethodByCode('online_gateway');
            var hasBank = !!paymentMethodByCode('bank_transfer');
            var hasCod = !!paymentMethodByCode('cod');

            if (state.payment_tab === 'card') {
                if (!hasGateway) {
                    setErr('payment_method', 'Phương thức thẻ hiện chưa khả dụng.');
                    return false;
                }

                state.payment_method = 'online_gateway';
                state.payment_variant = state.saved_card ? 'saved_card' : 'card';
                return validateCardInputs();
            }

            if (state.payment_tab === 'wallet') {
                if (!hasGateway) {
                    setErr('payment_method', 'Ví điện tử hiện chưa khả dụng.');
                    return false;
                }

                state.payment_method = 'online_gateway';
                state.payment_variant = state.selected_wallet || 'momo';
                return true;
            }

            if (state.cod_selected && hasCod) {
                state.payment_method = 'cod';
                state.payment_variant = 'cod';
                return true;
            }

            if (!hasBank) {
                setErr('payment_method', 'Chuyển khoản hiện chưa khả dụng.');
                return false;
            }

            state.payment_method = 'bank_transfer';
            state.payment_variant = state.selected_bank || 'vietcombank';
            return true;
        }

        function validateStepTwo() {
            clearErrors();
            setAlert('');
            collectFields();

            if (!finalizePaymentSelection()) {
                if (!$root.find('[data-error-for="payment_method"]').text()) {
                    setErr('payment_method', 'Vui lòng hoàn thành thông tin thanh toán.');
                }
                return false;
            }

            persistState();
            return true;
        }

        function renderSuccess(response) {
            var summary = response.summary || {};

            $root.find('[data-success-copy]').text('Đơn hàng #' + response.increment_id + ' đã được tạo thành công.');
            $root.find('[data-success-meta]').html(
                '<div><span>Mã đơn hàng</span><strong>#' + esc(response.increment_id) + '</strong></div>' +
                '<div><span>Tạm tính</span><strong>' + esc(summary.subtotal || '') + '</strong></div>' +
                '<div><span>Vận chuyển</span><strong>' + esc(summary.shipping || '') + '</strong></div>' +
                '<div><span>Tổng cộng</span><strong>' + esc(summary.grand_total || '') + '</strong></div>'
            );

            $root.find('[data-failure-state]').attr('hidden', 'hidden');
            $root.find('[data-success-state]').removeAttr('hidden');
        }

        function renderFailure(message) {
            $root.find('[data-success-state]').attr('hidden', 'hidden');
            $root.find('[data-failure-copy]').text(message || 'Đã xảy ra lỗi trong quá trình xử lý thanh toán.');
            $root.find('[data-failure-state]').removeAttr('hidden');
        }

        function placeOrder() {
            if (submitting) {
                return;
            }

            if (!validateStepOne() || !validateStepTwo()) {
                setAlert('Vui lòng hoàn tất đầy đủ thông tin trước khi đặt hàng.', 'error');
                return;
            }

            submitting = true;
            setAlert('');

            $root.find('[data-place-order]').prop('disabled', true);
            $root.find('.pvco3-place-label, .pvco3-place-arrow').attr('hidden', 'hidden');
            $root.find('.pvco3-place-loading').removeAttr('hidden');

            $.ajax({
                url: bootstrap.endpoints.place_order,
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    form_key: bootstrap.form_key,
                    full_name: state.full_name,
                    phone: state.phone,
                    email: state.email,
                    address: state.address,
                    city: state.city,
                    region: state.region,
                    postcode: state.postcode,
                    country_id: state.country_id,
                    receiving_method: state.receiving_method,
                    pickup_store: state.pickup_store,
                    shipping_method: state.shipping_method,
                    payment_method: state.payment_method,
                    note: state.note
                })
            }).done(function (response) {
                if (!response.success) {
                    renderFailure(response.message || 'Không thể đặt hàng lúc này.');
                    showStep(4);
                    return;
                }

                window.sessionStorage.removeItem(storageKey);
                renderSuccess(response);
                showStep(4);
            }).fail(function (xhr) {
                var message = (xhr.responseJSON && xhr.responseJSON.message) || 'Không thể đặt hàng lúc này. Vui lòng thử lại.';
                renderFailure(message);
                showStep(4);
            }).always(function () {
                submitting = false;
                $root.find('[data-place-order]').prop('disabled', false);
                $root.find('.pvco3-place-label, .pvco3-place-arrow').removeAttr('hidden');
                $root.find('.pvco3-place-loading').attr('hidden', 'hidden');
            });
        }

        function wireEvents() {
            $root.on('input change', '[data-field]', function () {
                var key = String($(this).data('field'));

                if ($(this).is(':checkbox')) {
                    state[key] = $(this).is(':checked');
                } else {
                    state[key] = String($(this).val() || '');
                }

                persistState();

                if (key === 'address') {
                    scheduleQuoteFetch();
                }
            });

            $root.on('click', '[data-step-next]', function () {
                var targetStep = parseInt($(this).data('step-next'), 10);

                if (targetStep === 2 && !validateStepOne()) {
                    return;
                }

                if (targetStep === 3 && !validateStepTwo()) {
                    return;
                }

                showStep(targetStep);
            });

            $root.on('click', '[data-step-prev]', function () {
                showStep(parseInt($(this).data('step-prev'), 10));
            });

            $root.on('click', '[data-step-edit]', function () {
                showStep(parseInt($(this).data('step-edit'), 10));
            });

            $root.on('click', '[data-ship-option]', function () {
                state.shipping_method = String($(this).data('ship-option') || '');
                syncSelectedShipping();
            });

            $root.on('click', '[data-pay-tab]', function () {
                if ($(this).hasClass('is-disabled')) {
                    return;
                }

                state.payment_tab = String($(this).data('pay-tab'));
                persistState();
                renderPaymentSelection();
            });

            $root.on('click', '[data-wallet-option]', function () {
                state.selected_wallet = String($(this).data('wallet-option') || 'momo');
                state.payment_tab = 'wallet';
                state.cod_selected = false;
                persistState();
                renderPaymentSelection();
            });

            $root.on('click', '[data-bank-option]', function () {
                state.selected_bank = String($(this).data('bank-option') || 'vietcombank');
                state.payment_tab = 'bank';
                state.cod_selected = false;
                persistState();
                renderBankTransferDetails();
                renderPaymentSelection();
            });

            $root.on('click', '[data-cod-option]', function () {
                state.payment_tab = 'bank';
                state.cod_selected = !state.cod_selected;
                persistState();
                renderPaymentSelection();
            });

            $root.on('click', '[data-wallet-continue]', function () {
                state.payment_tab = 'wallet';
                if (validateStepTwo()) {
                    showStep(3);
                }
            });

            $root.on('click', '[data-toggle-saved-cards]', function () {
                var $saved = $root.find('[data-saved-cards]');
                var isHidden = $saved.prop('hidden');
                $saved.prop('hidden', !isHidden);
            });

            $root.on('click', '[data-saved-card]', function () {
                state.saved_card = String($(this).data('saved-card'));
                state.payment_tab = 'card';
                state.payment_method = 'online_gateway';
                state.payment_variant = 'saved_card';
                state.card_number = '4242424242424242';
                state.cardholder_name = 'TECHIEWORLD CUSTOMER';
                state.card_expiry = '12/25';
                state.card_cvv = '123';
                fillFields();
                persistState();
            });

            $root.on('click', '[data-copy-source]', function () {
                var source = String($(this).data('copy-source') || '');
                var map = {
                    account_name: $root.find('[data-bank-account-name]').text(),
                    account_number: $root.find('[data-bank-account-number]').text(),
                    bank_name: $root.find('[data-bank-name]').text(),
                    transfer_code: $root.find('[data-bank-transfer-code]').text()
                };

                if (navigator.clipboard && navigator.clipboard.writeText && map[source]) {
                    navigator.clipboard.writeText(map[source]);
                }
            });

            $root.on('click', '[data-place-order]', placeOrder);
        }

        restoreState();
        hydrateFromBootstrap();
        fillFields();
        syncLocationSelects();
        renderSummaryItems();
        renderPaymentAvailability();
        wireEvents();
        renderStepper();

        if (state.address && state.city && state.region) {
            fetchShippingQuotes();
        } else {
            renderShippingMethods();
        }
    };
});
