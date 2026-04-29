define(['jquery'], function ($) {
    'use strict';

    var CITIES = [
        {name: 'An Giang', districts: ['Long Xuyên', 'Châu Đốc', 'Tân Châu', 'Châu Phú']},
        {name: 'Bà Rịa - Vũng Tàu', districts: ['Vũng Tàu', 'Bà Rịa', 'Long Điền', 'Phú Mỹ']},
        {name: 'Bạc Liêu', districts: ['Bạc Liêu', 'Giá Rai', 'Hòa Bình', 'Vĩnh Lợi']},
        {name: 'Bắc Giang', districts: ['Bắc Giang', 'Việt Yên', 'Yên Dũng', 'Lạng Giang']},
        {name: 'Bắc Kạn', districts: ['Bắc Kạn', 'Ba Bể', 'Chợ Đồn', 'Bạch Thông']},
        {name: 'Bắc Ninh', districts: ['Bắc Ninh', 'Từ Sơn', 'Quế Võ', 'Yên Phong']},
        {name: 'Bến Tre', districts: ['Bến Tre', 'Ba Tri', 'Châu Thành', 'Mỏ Cày Nam']},
        {name: 'Bình Dương', districts: ['Thủ Dầu Một', 'Dĩ An', 'Thuận An', 'Bến Cát']},
        {name: 'Bình Định', districts: ['Quy Nhơn', 'An Nhơn', 'Hoài Nhơn', 'Tuy Phước']},
        {name: 'Bình Phước', districts: ['Đồng Xoài', 'Phước Long', 'Bình Long', 'Chơn Thành']},
        {name: 'Bình Thuận', districts: ['Phan Thiết', 'La Gi', 'Hàm Thuận Bắc', 'Bắc Bình']},
        {name: 'Cà Mau', districts: ['Cà Mau', 'Năm Căn', 'Đầm Dơi', 'U Minh']},
        {name: 'Cao Bằng', districts: ['Cao Bằng', 'Bảo Lạc', 'Trùng Khánh', 'Hòa An']},
        {name: 'Đắk Lắk', districts: ['Buôn Ma Thuột', 'Buôn Hồ', 'Ea Kar', 'Krông Pắc']},
        {name: 'Đắk Nông', districts: ['Gia Nghĩa', 'Đắk Mil', 'Đắk R’lấp', 'Cư Jút']},
        {name: 'Điện Biên', districts: ['Điện Biên Phủ', 'Mường Lay', 'Điện Biên', 'Tuần Giáo']},
        {name: 'Đồng Nai', districts: ['Biên Hòa', 'Long Khánh', 'Nhơn Trạch', 'Trảng Bom']},
        {name: 'Đồng Tháp', districts: ['Cao Lãnh', 'Sa Đéc', 'Hồng Ngự', 'Lấp Vò']},
        {name: 'Gia Lai', districts: ['Pleiku', 'An Khê', 'Ayun Pa', 'Chư Sê']},
        {name: 'Hà Giang', districts: ['Hà Giang', 'Đồng Văn', 'Mèo Vạc', 'Vị Xuyên']},
        {name: 'Hà Nam', districts: ['Phủ Lý', 'Duy Tiên', 'Kim Bảng', 'Lý Nhân']},
        {name: 'Hà Tĩnh', districts: ['Hà Tĩnh', 'Hồng Lĩnh', 'Kỳ Anh', 'Cẩm Xuyên']},
        {name: 'Hải Dương', districts: ['Hải Dương', 'Chí Linh', 'Kinh Môn', 'Nam Sách']},
        {name: 'Hậu Giang', districts: ['Vị Thanh', 'Ngã Bảy', 'Châu Thành', 'Phụng Hiệp']},
        {name: 'Hòa Bình', districts: ['Hòa Bình', 'Lương Sơn', 'Mai Châu', 'Tân Lạc']},
        {name: 'Hưng Yên', districts: ['Hưng Yên', 'Mỹ Hào', 'Văn Lâm', 'Khoái Châu']},
        {name: 'Khánh Hòa', districts: ['Nha Trang', 'Cam Ranh', 'Ninh Hòa', 'Diên Khánh']},
        {name: 'Kiên Giang', districts: ['Rạch Giá', 'Hà Tiên', 'Phú Quốc', 'Châu Thành']},
        {name: 'Kon Tum', districts: ['Kon Tum', 'Đăk Hà', 'Ngọc Hồi', 'Sa Thầy']},
        {name: 'Lai Châu', districts: ['Lai Châu', 'Tam Đường', 'Than Uyên', 'Mường Tè']},
        {name: 'Lâm Đồng', districts: ['Đà Lạt', 'Bảo Lộc', 'Đức Trọng', 'Di Linh']},
        {name: 'Lạng Sơn', districts: ['Lạng Sơn', 'Cao Lộc', 'Hữu Lũng', 'Chi Lăng']},
        {name: 'Lào Cai', districts: ['Lào Cai', 'Sa Pa', 'Bảo Thắng', 'Bát Xát']},
        {name: 'Long An', districts: ['Tân An', 'Kiến Tường', 'Bến Lức', 'Đức Hòa']},
        {name: 'Nam Định', districts: ['Nam Định', 'Mỹ Lộc', 'Ý Yên', 'Hải Hậu']},
        {name: 'Nghệ An', districts: ['Vinh', 'Cửa Lò', 'Thái Hòa', 'Diễn Châu']},
        {name: 'Ninh Bình', districts: ['Ninh Bình', 'Tam Điệp', 'Hoa Lư', 'Gia Viễn']},
        {name: 'Ninh Thuận', districts: ['Phan Rang - Tháp Chàm', 'Ninh Hải', 'Ninh Phước', 'Thuận Nam']},
        {name: 'Phú Thọ', districts: ['Việt Trì', 'Phú Thọ', 'Lâm Thao', 'Thanh Ba']},
        {name: 'Phú Yên', districts: ['Tuy Hòa', 'Sông Cầu', 'Đông Hòa', 'Tây Hòa']},
        {name: 'Quảng Bình', districts: ['Đồng Hới', 'Ba Đồn', 'Bố Trạch', 'Lệ Thủy']},
        {name: 'Quảng Nam', districts: ['Tam Kỳ', 'Hội An', 'Điện Bàn', 'Núi Thành']},
        {name: 'Quảng Ngãi', districts: ['Quảng Ngãi', 'Đức Phổ', 'Bình Sơn', 'Sơn Tịnh']},
        {name: 'Quảng Ninh', districts: ['Hạ Long', 'Cẩm Phả', 'Uông Bí', 'Móng Cái']},
        {name: 'Quảng Trị', districts: ['Đông Hà', 'Quảng Trị', 'Gio Linh', 'Vĩnh Linh']},
        {name: 'Sóc Trăng', districts: ['Sóc Trăng', 'Vĩnh Châu', 'Ngã Năm', 'Kế Sách']},
        {name: 'Sơn La', districts: ['Sơn La', 'Mộc Châu', 'Mai Sơn', 'Thuận Châu']},
        {name: 'Tây Ninh', districts: ['Tây Ninh', 'Trảng Bàng', 'Hòa Thành', 'Gò Dầu']},
        {name: 'Thái Bình', districts: ['Thái Bình', 'Quỳnh Phụ', 'Tiền Hải', 'Đông Hưng']},
        {name: 'Thái Nguyên', districts: ['Thái Nguyên', 'Sông Công', 'Phổ Yên', 'Đại Từ']},
        {name: 'Thanh Hóa', districts: ['Thanh Hóa', 'Sầm Sơn', 'Bỉm Sơn', 'Nghi Sơn']},
        {name: 'Thừa Thiên Huế', districts: ['Huế', 'Hương Thủy', 'Hương Trà', 'Phú Vang']},
        {name: 'Tiền Giang', districts: ['Mỹ Tho', 'Gò Công', 'Cai Lậy', 'Châu Thành']},
        {name: 'Trà Vinh', districts: ['Trà Vinh', 'Duyên Hải', 'Càng Long', 'Cầu Ngang']},
        {name: 'Tuyên Quang', districts: ['Tuyên Quang', 'Sơn Dương', 'Hàm Yên', 'Yên Sơn']},
        {name: 'Vĩnh Long', districts: ['Vĩnh Long', 'Bình Minh', 'Long Hồ', 'Mang Thít']},
        {name: 'Vĩnh Phúc', districts: ['Vĩnh Yên', 'Phúc Yên', 'Bình Xuyên', 'Tam Đảo']},
        {name: 'Yên Bái', districts: ['Yên Bái', 'Nghĩa Lộ', 'Yên Bình', 'Văn Chấn']},
        {name: 'Thành phố Cần Thơ', districts: ['Ninh Kiều', 'Bình Thủy', 'Cái Răng', 'Ô Môn', 'Thốt Nốt']},
        {name: 'Thành phố Đà Nẵng', districts: ['Hải Châu', 'Sơn Trà', 'Thanh Khê', 'Liên Chiểu', 'Ngũ Hành Sơn']},
        {name: 'Thành phố Hà Nội', districts: ['Hoàn Kiếm', 'Ba Đình', 'Cầu Giấy', 'Đống Đa', 'Hai Bà Trưng', 'Thanh Xuân', 'Nam Từ Liêm', 'Long Biên']},
        {name: 'Thành phố Hải Phòng', districts: ['Hồng Bàng', 'Ngô Quyền', 'Lê Chân', 'Hải An', 'Kiến An']},
        {name: 'Thành phố Hồ Chí Minh', districts: ['Quận 1', 'Quận 3', 'Quận 5', 'Quận 7', 'Quận 10', 'Bình Thạnh', 'Tân Bình', 'Thủ Đức']}
    ];

    var ADDRESS_DATA = CITIES;
    var DISTRICT_WARDS = {};
    var WARDS = ['Phường/Xã trung tâm', 'Phường 1', 'Phường 2', 'Phường 3', 'Xã 1', 'Xã 2'];
    var WARD_MAP = {
        'Quận 1': ['Phường Bến Nghé', 'Phường Bến Thành', 'Phường Đa Kao', 'Phường Nguyễn Thái Bình', 'Phường Tân Định'],
        'Quận 3': ['Phường Võ Thị Sáu', 'Phường 9', 'Phường 10', 'Phường 11', 'Phường 12'],
        'Quận 5': ['Phường 1', 'Phường 2', 'Phường 3', 'Phường 4', 'Phường 5'],
        'Quận 7': ['Phường Tân Phong', 'Phường Tân Phú', 'Phường Tân Quy', 'Phường Phú Mỹ'],
        'Bình Thạnh': ['Phường 1', 'Phường 11', 'Phường 19', 'Phường 22', 'Phường 25'],
        'Tân Bình': ['Phường 1', 'Phường 2', 'Phường 4', 'Phường 12', 'Phường 15'],
        'Thủ Đức': ['Phường Linh Trung', 'Phường Linh Xuân', 'Phường Hiệp Bình Chánh', 'Phường Thảo Điền'],
        'Hoàn Kiếm': ['Phường Hàng Bạc', 'Phường Hàng Bài', 'Phường Hàng Bông', 'Phường Tràng Tiền'],
        'Ba Đình': ['Phường Điện Biên', 'Phường Đội Cấn', 'Phường Kim Mã', 'Phường Ngọc Hà'],
        'Cầu Giấy': ['Phường Dịch Vọng', 'Phường Dịch Vọng Hậu', 'Phường Nghĩa Đô', 'Phường Yên Hòa'],
        'Đống Đa': ['Phường Cát Linh', 'Phường Láng Hạ', 'Phường Ô Chợ Dừa', 'Phường Quang Trung'],
        'Hải Châu': ['Phường Hải Châu I', 'Phường Hải Châu II', 'Phường Bình Hiên', 'Phường Thạch Thang'],
        'Sơn Trà': ['Phường An Hải Bắc', 'Phường Mân Thái', 'Phường Nại Hiên Đông', 'Phường Thọ Quang'],
        'Ninh Kiều': ['Phường An Cư', 'Phường An Hòa', 'Phường Cái Khế', 'Phường Xuân Khánh']
    };

    var SHIPPING_METHODS = [
        {id: 'pvmodernshipping_spx', provider: 'spx', name: 'Shopee Express', price: 25000, description: 'Giao hàng trong 2-3 ngày, toàn quốc', eta: '27/04/2026 (2 ngày)'},
        {id: 'pvmodernshipping_ghn', provider: 'ghn', name: 'Giao Hàng Nhanh', price: 35000, description: 'Giao hàng nhanh 1-2 ngày', eta: '26/04/2026 (1 ngày)'},
        {id: 'pvmodernshipping_ghtk', provider: 'ghtk', name: 'Giao Hàng Tiết Kiệm', price: 15000, description: 'Giao hàng tiết kiệm 3-5 ngày', eta: '30/04/2026 (5 ngày)'}
    ];

    var PAYMENT_METHODS = [
        {id: 'cod', providerCode: 'cod', title: 'Thanh toán khi nhận hàng', description: 'Trả tiền khi đơn hàng được giao', icon: 'cod'},
        {id: 'bank_transfer', providerCode: 'bank_transfer', title: 'Chuyển khoản ngân hàng', description: 'Nhận thông tin chuyển khoản sau khi đặt hàng', icon: 'bank'},
        {id: 'card', providerCode: 'online_gateway', title: 'Thẻ tín dụng / ghi nợ', description: 'Điền thông tin thẻ qua cổng thanh toán an toàn', icon: 'card'},
        {id: 'wallet', providerCode: 'online_gateway', title: 'Ví điện tử', description: 'Quét mã hoặc mở app MoMo/VNPay khi gateway được cấu hình', icon: 'wallet'}
    ];

    var BANKS = [
        {id: 'vcb', name: 'Vietcombank', code: '970436'},
        {id: 'tcb', name: 'Techcombank', code: '970407'},
        {id: 'acb', name: 'ACB', code: '970416'},
        {id: 'vpb', name: 'VPBank', code: '970432'}
    ];

    var WALLETS = [
        {id: 'momo', name: 'MoMo', tone: 'pink', payUrl: ''},
        {id: 'vnpay', name: 'VNPay', tone: 'blue', payUrl: ''}
    ];

    return function (config, element) {
        var $root = $(element);
        var bootstrap = readBootstrap();
        var storageKey = 'pvmodern_checkout_customer_flow';
        var isSubmitting = false;
        var state = $.extend(true, {
            step: 1,
            maxUnlockedStep: 1,
            fullName: '',
            phone: '',
            email: '',
            address: '',
            address2: '',
            city: '',
            district: '',
            ward: '',
            note: '',
            saveAsDefault: false,
            shippingMethodId: '',
            paymentMethodId: '',
            bankId: 'vcb',
            walletId: 'momo',
            card: {holderName: '', number: '', expiry: '', cvv: ''},
            order: null,
            paymentStatus: 'idle'
        }, loadState());

        function readBootstrap() {
            var node = document.querySelector($root.data('bootstrap-selector') || '#pvcheckout-bootstrap');
            if (!node) {
                return {};
            }
            try {
                return JSON.parse(node.textContent || '{}');
            } catch (e) {
                return {};
            }
        }

        function loadState() {
            try {
                return JSON.parse(window.sessionStorage.getItem(storageKey) || '{}') || {};
            } catch (e) {
                return {};
            }
        }

        function saveState() {
            try {
                window.sessionStorage.setItem(storageKey, JSON.stringify(state));
            } catch (e) {}
        }

        function esc(value) {
            return String(value || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        }

        function getRequestedStep() {
            try {
                var step = parseInt(new URLSearchParams(window.location.search).get('step'), 10) || 0;
                return step > 5 ? 1 : step;
            } catch (e) {
                return 0;
            }
        }

        function loadVietnamLocations() {
            $.ajax({
                url: (bootstrap.endpoints || {}).locations || '/pvmodern/api/locations',
                method: 'GET',
                dataType: 'json',
                timeout: 6500
            }).done(function (response) {
                var rows = Array.isArray(response) ? response : (response.locations || []);
                if (!Array.isArray(rows) || !rows.length) {
                    return;
                }
                DISTRICT_WARDS = {};
                ADDRESS_DATA = rows.map(function (province) {
                    var districts = (province.districts || []).map(function (district) {
                        if (typeof district === 'string') {
                            DISTRICT_WARDS[province.name + '|' + district] = [];
                            return district;
                        }
                        DISTRICT_WARDS[province.name + '|' + district.name] = (district.wards || []).map(function (ward) {
                            return typeof ward === 'string' ? ward : ward.name;
                        }).filter(Boolean);
                        return district.name;
                    });
                    return {name: province.name, districts: districts};
                });
                populateCities();
            });
        }

        function formatVND(value) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
                maximumFractionDigits: 0
            }).format(parseFloat(value || 0));
        }

        function paymentIcon(type) {
            var icons = {
                cod: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16v10H4z"/><path d="M8 11h8"/><path d="M8 15h3"/></svg>',
                bank: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m3 10 9-6 9 6"/><path d="M5 10h14"/><path d="M6 10v8"/><path d="M10 10v8"/><path d="M14 10v8"/><path d="M18 10v8"/><path d="M4 18h16"/></svg>',
                card: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/><path d="M7 15h4"/></svg>',
                wallet: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h15a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7a3 3 0 0 1 3-3h13"/><path d="M16 13h.01"/></svg>'
            };
            return icons[type] || icons.card;
        }

        function cartItems() {
            return ((bootstrap.cart || {}).items || []);
        }

        function subtotal() {
            var fallback = parseFloat((bootstrap.cart || {}).subtotal || 0);
            return cartItems().reduce(function (sum, item) {
                return sum + parseFloat(item.row_total || ((item.price || 0) * (item.qty || 1)) || 0);
            }, 0) || fallback;
        }

        function itemCount() {
            return cartItems().reduce(function (sum, item) {
                return sum + (parseInt(item.qty, 10) || 0);
            }, 0) || parseInt((bootstrap.cart || {}).count || 0, 10);
        }

        function selectedShipping() {
            var method = SHIPPING_METHODS.find(function (row) {
                return row.id === state.shippingMethodId;
            });
            if (!method) {
                return null;
            }
            method = $.extend({}, method);
            method.price = quoteShippingPrice(method);
            return method;
        }

        function selectedPayment() {
            return PAYMENT_METHODS.find(function (method) {
                return method.id === state.paymentMethodId;
            }) || null;
        }

        function total() {
            var shipping = selectedShipping();
            return subtotal() + (shipping ? shipping.price : 0);
        }

        function shippingDistanceSurcharge() {
            if (!state.city) {
                return 0;
            }
            if (state.city === 'Thành phố Hồ Chí Minh') {
                return 0;
            }
            if (state.city === 'Thành phố Hà Nội') {
                return 14000;
            }
            if (state.city === 'Thành phố Đà Nẵng' || state.city === 'Thành phố Cần Thơ') {
                return 9000;
            }
            return 17000;
        }

        function quoteShippingPrice(method) {
            return method.price + shippingDistanceSurcharge();
        }

        function placeholder(label) {
            var svg = '<svg xmlns="http://www.w3.org/2000/svg" width="112" height="112" viewBox="0 0 112 112">' +
                '<rect width="112" height="112" rx="16" fill="#f1f5f9"/>' +
                '<text x="56" y="52" text-anchor="middle" fill="#0f172a" font-family="Arial" font-size="11" font-weight="700">Techieworld</text>' +
                '<text x="56" y="70" text-anchor="middle" fill="#64748b" font-family="Arial" font-size="9">' + esc(String(label || 'Product').slice(0, 18)) + '</text>' +
                '</svg>';
            return 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(svg);
        }

        function bindImageFallback($scope) {
            $scope.find('img').each(function () {
                var img = this;
                if (img.dataset.pvBound === '1') {
                    return;
                }
                img.dataset.pvBound = '1';
                img.addEventListener('error', function () {
                    img.src = placeholder(img.getAttribute('alt') || 'Product');
                });
                if (img.complete && img.naturalWidth === 0) {
                    img.src = placeholder(img.getAttribute('alt') || 'Product');
                }
            });
        }

        function showAlert(message) {
            var $alert = $root.find('[data-checkout-alert]');
            if (!message) {
                $alert.attr('hidden', 'hidden').text('');
                return;
            }
            $alert.removeAttr('hidden').text(message);
            $alert[0].scrollIntoView({behavior: 'smooth', block: 'center'});
        }

        function togglePanel($panel, shouldShow) {
            if (shouldShow) {
                $panel.removeAttr('hidden');
            } else {
                $panel.attr('hidden', 'hidden');
            }
        }

        function setError(name, message) {
            var $error = $root.find('[data-error="' + name + '"]');
            var $field = $root.find('[data-field="' + name + '"], [data-card-field="' + name + '"]');
            $error.text(message || '');
            $field.toggleClass('is-error', !!message);
        }

        function clearErrors() {
            $root.find('[data-error]').text('');
            $root.find('.is-error').removeClass('is-error');
            showAlert('');
        }

        function populateCities() {
            var html = '<option value="">Chọn tỉnh/thành phố</option>';
            ADDRESS_DATA.forEach(function (city) {
                html += '<option value="' + esc(city.name) + '">' + esc(city.name) + '</option>';
            });
            $root.find('[data-city-select]').html(html).val(state.city);
            populateDistricts();
        }

        function populateDistricts() {
            var city = ADDRESS_DATA.find(function (row) { return row.name === state.city; });
            var $district = $root.find('[data-district-select]');
            var $ward = $root.find('[data-ward-select]');
            if (!city) {
                $district.html('<option value="">Chọn tỉnh/thành phố trước</option>').prop('disabled', true);
                $ward.html('<option value="">Chọn quận/huyện trước</option>').prop('disabled', true);
                renderShippingMethods();
                renderSummary();
                return;
            }
            var html = '<option value="">Chọn quận/huyện</option>';
            city.districts.forEach(function (district) {
                html += '<option value="' + esc(district) + '">' + esc(district) + '</option>';
            });
            $district.html(html).prop('disabled', false).val(state.district);
            populateWards();
            renderShippingMethods();
            renderSummary();
        }

        function populateWards() {
            var $ward = $root.find('[data-ward-select]');
            if (!state.district) {
                $ward.html('<option value="">Chọn quận/huyện trước</option>').prop('disabled', true);
                return;
            }
            var html = '<option value="">Chọn phường/xã</option>';
            getWardOptions(state.city, state.district).forEach(function (ward) {
                html += '<option value="' + esc(ward) + '">' + esc(ward) + '</option>';
            });
            $ward.html(html).prop('disabled', false).val(state.ward);
        }

        function getWardOptions(city, district) {
            if (DISTRICT_WARDS[city + '|' + district] && DISTRICT_WARDS[city + '|' + district].length) {
                return DISTRICT_WARDS[city + '|' + district];
            }
            if (WARD_MAP[district]) {
                return WARD_MAP[district];
            }
            if (/huyện/i.test(district)) {
                return ['Thị trấn ' + district.replace(/^Huyện\s+/i, ''), 'Xã Trung tâm', 'Xã Đông', 'Xã Tây', 'Xã Nam'];
            }
            if (/thị xã/i.test(district)) {
                return ['Phường Trung tâm', 'Phường 1', 'Phường 2', 'Xã ven đô'];
            }
            if (/thành phố|tp\.?/i.test(district)) {
                return ['Phường Trung tâm', 'Phường 1', 'Phường 2', 'Phường 3', 'Xã ngoại thành'];
            }
            return WARDS;
        }

        function fillCustomerDefaults() {
            var customer = bootstrap.customer || {};
            var address = customer.address || {};
            if (!state.fullName && customer.full_name) { state.fullName = customer.full_name; }
            if (!state.email && customer.email) { state.email = customer.email; }
            if (!state.phone && customer.phone) { state.phone = customer.phone; }
            if (!state.address && address.street) { state.address = address.street; }
        }

        function syncFields() {
            $root.find('[data-field]').each(function () {
                var $field = $(this);
                var key = $field.data('field');
                if ($field.attr('type') === 'checkbox') {
                    $field.prop('checked', !!state[key]);
                } else {
                    $field.val(state[key] || '');
                }
            });
            $root.find('[data-card-field]').each(function () {
                var $field = $(this);
                $field.val(state.card[$field.data('card-field')] || '');
            });
        }

        function renderShippingMethods() {
            var html = '';
            SHIPPING_METHODS.forEach(function (method) {
                var selected = method.id === state.shippingMethodId;
                var price = quoteShippingPrice(method);
                var distanceNote = shippingDistanceSurcharge() > 0 ? 'Đã tính phụ phí theo vị trí giao hàng' : 'Giá nội thành/gần shop';
                html += '<button type="button" class="shipping-method-card' + (selected ? ' is-selected' : '') + '" data-shipping-method="' + esc(method.id) + '">' +
                    '<span class="shipping-radio"></span>' +
                    '<span>' +
                    '<span class="shipping-method-name">' + esc(method.name) + '</span>' +
                    '<span class="shipping-method-description">' + esc(method.description) + '</span>' +
                    '<span class="shipping-method-eta">Dự kiến: ' + esc(method.eta) + '</span>' +
                    '<span class="shipping-method-note">' + esc(distanceNote) + '</span>' +
                    '</span>' +
                    '<span class="shipping-method-price">' + formatVND(price) + '</span>' +
                    '</button>';
            });
            $root.find('[data-shipping-method-list]').html(html);
        }

        function renderPaymentMethods() {
            var html = '';
            PAYMENT_METHODS.forEach(function (method) {
                var selected = method.id === state.paymentMethodId;
                html += '<button type="button" class="payment-method-card' + (selected ? ' is-selected' : '') + '" data-payment-method="' + esc(method.id) + '">' +
                    '<span class="payment-radio"></span>' +
                    '<span class="payment-icon" aria-hidden="true">' + paymentIcon(method.icon) + '</span>' +
                    '<span>' +
                    '<span class="payment-title">' + esc(method.title) + '</span>' +
                    '<span class="payment-description">' + esc(method.description) + '</span>' +
                    '</span>' +
                    '</button>';
            });
            $root.find('[data-payment-method-list]').html(html);
            togglePanel($root.find('[data-card-payment-form]'), state.paymentMethodId === 'card');
            togglePanel($root.find('[data-bank-payment-panel]'), state.paymentMethodId === 'bank_transfer');
            togglePanel($root.find('[data-wallet-payment-panel]'), state.paymentMethodId === 'wallet');
            renderBanks();
            renderWallets();
            renderTransferReference();
        }

        function renderBanks() {
            var html = '';
            BANKS.forEach(function (bank) {
                html += '<button type="button" class="bank-card' + (bank.id === state.bankId ? ' is-selected' : '') + '" data-bank-id="' + esc(bank.id) + '">' +
                    '<strong>' + esc(bank.name) + '</strong>' +
                    '<span>Mã: ' + esc(bank.code) + '</span>' +
                    '</button>';
            });
            $root.find('[data-bank-grid]').html(html);
            var selected = BANKS.find(function (bank) { return bank.id === state.bankId; }) || BANKS[0];
            $root.find('[data-selected-bank-label]').text(selected.name);
        }

        function renderWallets() {
            var html = '';
            WALLETS.forEach(function (wallet) {
                html += '<button type="button" class="wallet-card wallet-card--' + esc(wallet.tone) + (wallet.id === state.walletId ? ' is-selected' : '') + '" data-wallet-id="' + esc(wallet.id) + '">' +
                    '<span class="wallet-mark">' + esc(wallet.name.slice(0, 2).toUpperCase()) + '</span>' +
                    '<strong>' + esc(wallet.name) + '</strong>' +
                    '<small>Backend payment URL ready</small>' +
                    '</button>';
            });
            $root.find('[data-wallet-grid]').html(html);
            var selected = WALLETS.find(function (wallet) { return wallet.id === state.walletId; }) || WALLETS[0];
            $root.find('[data-wallet-title]').text(selected.name);
        }

        function renderTransferReference() {
            var reference = 'TECHIE-' + (bootstrap.quote_id || 'ORDER') + '-' + itemCount();
            $root.find('[data-transfer-reference]').text(reference);
            $root.find('[data-transfer-reference]').attr('data-copy-value', reference);
        }

        function renderSummary() {
            var html = '';
            cartItems().forEach(function (item) {
                var rowTotal = parseFloat(item.row_total || ((item.price || 0) * (item.qty || 1)) || 0);
                var image = item.image_url || placeholder(item.name);
                html += '<div class="checkout-summary-item">' +
                    '<img class="checkout-summary-item-image" src="' + esc(image) + '" alt="' + esc(item.name) + '" loading="lazy"/>' +
                    '<div class="checkout-summary-item-body">' +
                    '<p class="checkout-summary-item-name">' + esc(item.name) + '</p>' +
                    '<div class="checkout-summary-item-meta">' +
                    '<span class="checkout-summary-item-qty">x ' + esc(item.qty || 1) + '</span>' +
                    '<strong class="checkout-summary-item-price">' + formatVND(rowTotal) + '</strong>' +
                    '</div></div></div>';
            });
            $root.find('[data-summary-items]').html(html || '<p class="checkout-empty-note">Giỏ hàng trống.</p>');
            bindImageFallback($root.find('[data-summary-items]'));

            var shipping = selectedShipping();
            $root.find('[data-summary-subtotal]').text(formatVND(subtotal()));
            $root.find('[data-summary-count]').text(itemCount());
            $root.find('[data-summary-total]').text(formatVND(total()));
            if (shipping) {
                $root.find('[data-summary-shipping]').text(formatVND(shipping.price));
                $root.find('[data-summary-shipping-row]').removeAttr('hidden');
                $root.find('[data-summary-carrier]').text(shipping.name);
                $root.find('[data-summary-carrier-row]').removeAttr('hidden');
            } else {
                $root.find('[data-summary-shipping-row], [data-summary-carrier-row]').attr('hidden', 'hidden');
            }
        }

        function stepMeta(step) {
            return [
                null,
                ['Thông tin nhận hàng', 'Địa chỉ & bên vận chuyển'],
                ['Phương thức thanh toán', 'COD / Bank / Card / Wallet'],
                ['Xác nhận', 'Kiểm tra đơn hàng'],
                ['Xác nhận thanh toán', 'QR / payment URL'],
                ['Hoàn thành', 'Đơn hàng thành công']
            ][step];
        }

        function goToStep(step) {
            state.step = step;
            state.maxUnlockedStep = Math.max(state.maxUnlockedStep, step);
            saveState();
            $root.find('[data-checkout-panel]').attr('hidden', 'hidden');
            if (step < 5) {
                $root.find('[data-checkout-layout]').removeAttr('hidden');
                $root.find('[data-checkout-complete]').attr('hidden', 'hidden');
                $root.find('[data-checkout-panel="' + step + '"]').removeAttr('hidden');
            } else {
                $root.find('[data-checkout-layout]').attr('hidden', 'hidden');
                $root.find('[data-checkout-complete]').removeAttr('hidden');
                renderComplete();
            }
            renderStepper();
            renderSummary();
            if (step === 3) { renderReview(); }
            if (step === 4) { renderPaymentConfirmation(); }
            element.scrollIntoView({behavior: 'smooth', block: 'start'});
        }

        function renderStepper() {
            $root.find('[data-step-target]').each(function () {
                var $item = $(this);
                var step = parseInt($item.data('step-target'), 10);
                $item.removeClass('is-active is-completed is-disabled');
                if (step < state.step) {
                    $item.addClass('is-completed');
                    $item.find('[data-step-circle]').text('✓');
                } else if (step === state.step) {
                    $item.addClass('is-active');
                    $item.find('[data-step-circle]').text(step);
                } else {
                    $item.addClass(step <= state.maxUnlockedStep ? '' : 'is-disabled');
                    $item.find('[data-step-circle]').text(step);
                }
            });
            var meta = stepMeta(state.step);
            $root.find('[data-mobile-step-count]').text('Bước ' + state.step + '/5');
            $root.find('[data-mobile-step-title]').text(meta[0]);
            $root.find('[data-mobile-step-subtitle]').text(meta[1]);
            $root.find('[data-mobile-step-progress]').css('width', ((state.step / 5) * 100) + '%');
            $root.find('[data-stepper-progress]').css('width', ((state.step / 5) * 100) + '%');
        }

        function validateInformation() {
            var ok = true;
            clearErrors();
            if (state.fullName.trim().length < 2) { setError('fullName', 'Vui lòng nhập họ và tên'); ok = false; }
            if (!/^[0-9]{9,11}$/.test(state.phone.trim())) { setError('phone', 'Số điện thoại không hợp lệ'); ok = false; }
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(state.email.trim())) { setError('email', 'Email không hợp lệ'); ok = false; }
            if (state.address.trim().length < 5) { setError('address', 'Vui lòng nhập địa chỉ'); ok = false; }
            if (!state.city) { setError('city', 'Vui lòng chọn tỉnh/thành phố'); ok = false; }
            if (!state.district) { setError('district', 'Vui lòng chọn quận/huyện'); ok = false; }
            if (!state.ward) { setError('ward', 'Vui lòng chọn phường/xã'); ok = false; }
            focusFirstError();
            return ok;
        }

        function validateCarrier() {
            var ok = true;
            clearErrors();
            if (!state.shippingMethodId) {
                setError('shippingMethod', 'Vui lòng chọn bên vận chuyển');
                ok = false;
            }
            focusFirstError();
            return ok;
        }

        function validatePayment() {
            var ok = true;
            clearErrors();
            if (!state.paymentMethodId) {
                setError('paymentMethod', 'Vui lòng chọn phương thức thanh toán');
                ok = false;
            }
            if (state.paymentMethodId === 'card') {
                if (!state.card.holderName.trim()) { setError('cardHolder', 'Vui lòng nhập tên chủ thẻ'); ok = false; }
                if (state.card.number.replace(/\s/g, '').length < 12) { setError('cardNumber', 'Số thẻ không hợp lệ'); ok = false; }
                if (!/^\d{2}\/\d{2}$/.test(state.card.expiry.trim())) { setError('cardExpiry', 'Định dạng MM/YY'); ok = false; }
                if (!/^\d{3,4}$/.test(state.card.cvv.trim())) { setError('cardCvv', 'CVV không hợp lệ'); ok = false; }
            }
            if (state.paymentMethodId === 'bank_transfer' && !state.bankId) {
                setError('paymentMethod', 'Vui lòng chọn ngân hàng nhận chuyển khoản');
                ok = false;
            }
            if (state.paymentMethodId === 'wallet' && !state.walletId) {
                setError('paymentMethod', 'Vui lòng chọn ví điện tử');
                ok = false;
            }
            focusFirstError();
            return ok;
        }

        function focusFirstError() {
            var $first = $root.find('.form-error').filter(function () { return !!$(this).text(); }).first();
            if ($first.length) {
                $first[0].scrollIntoView({behavior: 'smooth', block: 'center'});
                $first.closest('.form-field').find('input,select,textarea').first().trigger('focus');
            }
        }

        function renderReview() {
            var shipping = selectedShipping();
            var payment = selectedPayment();
            var productRows = '';
            cartItems().forEach(function (item) {
                var rowTotal = parseFloat(item.row_total || ((item.price || 0) * (item.qty || 1)) || 0);
                productRows += '<div class="review-product-row">' +
                    '<img class="review-product-image" src="' + esc(item.image_url || placeholder(item.name)) + '" alt="' + esc(item.name) + '"/>' +
                    '<div><p class="review-product-name">' + esc(item.name) + '</p><p class="review-product-meta">x ' + esc(item.qty || 1) + '</p></div>' +
                    '<strong class="review-product-price">' + formatVND(rowTotal) + '</strong></div>';
            });
            var html = '<div class="review-box"><div class="review-box-header"><h3 class="review-box-title">Thông tin giao hàng</h3><button type="button" class="review-edit-button" data-edit-step="1">Sửa</button></div>' +
                '<div class="review-text"><strong>' + esc(state.fullName) + '</strong><br>' + esc(state.phone) + '<br>' + esc(state.email) + '<br>' + esc([state.address, state.address2, state.ward, state.district, state.city].filter(Boolean).join(', ')) + '</div></div>' +
                '<div class="review-box"><div class="review-box-header"><h3 class="review-box-title">Bên vận chuyển</h3><button type="button" class="review-edit-button" data-edit-step="1" data-scroll-shipping="1">Sửa</button></div>' +
                '<div class="review-text"><strong>' + esc(shipping ? shipping.name : '') + '</strong><br>' + esc(shipping ? shipping.description : '') + '<br>Dự kiến: ' + esc(shipping ? shipping.eta : '') + '<br>' + formatVND(shipping ? shipping.price : 0) + '</div></div>' +
                '<div class="review-box"><div class="review-box-header"><h3 class="review-box-title">Phương thức thanh toán</h3><button type="button" class="review-edit-button" data-edit-step="2">Sửa</button></div>' +
                '<div class="review-text"><strong>' + esc(payment ? payment.title : '') + '</strong>' + renderPaymentReviewDetail() + '</div></div>' +
                '<div class="review-box"><div class="review-box-header"><h3 class="review-box-title">Sản phẩm trong đơn</h3></div><div class="review-product-list">' + productRows + '</div></div>' +
                '<div class="review-box"><div class="checkout-summary-row"><span>Tạm tính</span><strong>' + formatVND(subtotal()) + '</strong></div><div class="checkout-summary-row"><span>Phí vận chuyển</span><strong>' + formatVND(shipping ? shipping.price : 0) + '</strong></div><div class="checkout-summary-row is-total"><span>Tổng cộng</span><strong>' + formatVND(total()) + '</strong></div></div>';
            $root.find('[data-review-list]').html(html);
            bindImageFallback($root.find('[data-review-list]'));
        }

        function renderPaymentReviewDetail() {
            var bank = BANKS.find(function (row) { return row.id === state.bankId; }) || BANKS[0];
            var wallet = WALLETS.find(function (row) { return row.id === state.walletId; }) || WALLETS[0];
            if (state.paymentMethodId === 'bank_transfer') {
                return '<br>Ngân hàng: ' + esc(bank.name) + '<br>Nội dung: ' + esc($root.find('[data-transfer-reference]').text() || 'TECHIE-ORDER');
            }
            if (state.paymentMethodId === 'wallet') {
                return '<br>Ví: ' + esc(wallet.name) + '<br>Thanh toán qua QR/app sau khi xác nhận đơn';
            }
            if (state.paymentMethodId === 'card') {
                var number = state.card.number.replace(/\s/g, '');
                return '<br>Thẻ: **** **** **** ' + esc(number.slice(-4) || '----');
            }
            return '';
        }

        function renderPaymentConfirmation() {
            var payment = selectedPayment();
            var shipping = selectedShipping();
            var bank = BANKS.find(function (row) { return row.id === state.bankId; }) || BANKS[0];
            var wallet = WALLETS.find(function (row) { return row.id === state.walletId; }) || WALLETS[0];
            var orderRef = state.order && state.order.orderId ? state.order.orderId.replace(/^#/, '') : 'TECHIE-' + (bootstrap.quote_id || Date.now());
            var title = payment ? payment.title : 'Thanh toán';
            var qrLabel = state.paymentMethodId === 'wallet' ? wallet.name : (state.paymentMethodId === 'bank_transfer' ? bank.name : (state.paymentMethodId === 'card' ? 'VNPay/Card Gateway' : 'COD'));
            var message = 'Kiểm tra lại thông tin. Khi bấm Đặt hàng, backend sẽ tạo order và khởi tạo payment URL thật nếu MoMo/VNPay/VNPay card đã được cấu hình.';
            var paymentUrl = state.order && state.order.payment ? (state.order.payment.redirect_url || state.order.payment.paymentUrl || '') : '';
            var paymentStatus = state.paymentStatus || (state.order && state.order.payment ? (state.order.payment.status || 'pending') : 'idle');
            var statusLabel = {
                idle: 'Chưa tạo thanh toán',
                pending: 'Đang chờ thanh toán',
                awaiting_payment: 'Đang chờ thanh toán',
                paid: 'Đã thanh toán',
                failed: 'Thanh toán thất bại',
                expired: 'Đã hết hạn',
                cancelled: 'Đã hủy'
            }[paymentStatus] || 'Đang chờ thanh toán';

            if (state.paymentMethodId === 'cod') {
                message = 'Đơn COD sẽ được tạo ngay. Bạn thanh toán khi nhận hàng từ ' + (shipping ? shipping.name : 'bên vận chuyển') + '.';
            }
            if (state.paymentMethodId === 'bank_transfer') {
                message = 'Quét mã hoặc chuyển khoản theo nội dung bên dưới. Hệ thống giữ đơn ở trạng thái chờ đối soát.';
            }
            if (state.paymentMethodId === 'wallet') {
                message = 'MoMo/VNPay sẽ được backend tạo payment URL thật sau khi đặt hàng nếu đã cấu hình credential.';
            }
            if (state.paymentMethodId === 'card') {
                message = 'Thanh toán thẻ đi qua gateway backend. Secret và merchant credential không nằm ở frontend.';
            }

            $root.find('[data-payment-confirmation]').html(
                '<div class="payment-confirm-grid">' +
                '<div class="payment-qr-card">' +
                '<div class="payment-qr-title"><span>' + esc(qrLabel) + '</span><strong>' + formatVND(total()) + '</strong></div>' +
                '<div class="payment-qr" aria-label="QR placeholder"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>' +
                '<div class="payment-status-pill payment-status-pill--' + esc(paymentStatus) + '">' + esc(statusLabel) + '</div>' +
                '<p>' + esc(message) + '</p>' +
                (paymentUrl ? '<a class="btn btn-primary payment-url-button" href="' + esc(paymentUrl) + '" target="_blank" rel="noopener">Mở trang thanh toán</a>' : '') +
                '</div>' +
                '<div class="payment-confirm-detail">' +
                '<h3>' + esc(title) + '</h3>' +
                '<dl>' +
                '<div><dt>Mã tham chiếu</dt><dd>' + esc(orderRef) + '</dd></div>' +
                '<div><dt>Tổng thanh toán</dt><dd>' + formatVND(total()) + '</dd></div>' +
                '<div><dt>Bên vận chuyển</dt><dd>' + esc(shipping ? shipping.name : '') + '</dd></div>' +
                '<div><dt>Payment channel</dt><dd>' + esc(state.paymentMethodId === 'wallet' ? wallet.name : (state.paymentMethodId === 'bank_transfer' ? bank.name : title)) + '</dd></div>' +
                '</dl>' +
                '<div class="payment-confirm-note">Live payment URL cần env MOMO_*/VNPAY_* và <code>PVMODERN_PAYMENT_MOCK=0</code>. Nếu thiếu credential, hệ thống dùng mock an toàn.</div>' +
                '</div>' +
                '</div>'
            );
            $root.find('[data-check-payment-status]').prop('hidden', !state.order || state.paymentMethodId === 'cod');
            $root.find('[data-place-order]').prop('hidden', !!state.order && state.paymentMethodId !== 'cod');
        }

        function renderComplete() {
            var shipping = selectedShipping();
            var payment = selectedPayment();
            var orderId = state.order && state.order.orderId ? state.order.orderId : '#SHOP-' + new Date().getFullYear() + '0425-0001';
            $root.find('[data-complete-order-id]').text(orderId);
            $root.find('[data-complete-summary]').html(
                '<h3 class="complete-summary-title">Tóm tắt đơn hàng</h3>' +
                '<div class="complete-summary-row"><span>Sản phẩm</span><strong>' + itemCount() + ' sản phẩm</strong></div>' +
                '<div class="complete-summary-row"><span>Tổng tiền</span><strong>' + formatVND(total()) + '</strong></div>' +
                '<div class="complete-summary-row"><span>Thanh toán</span><strong>' + esc(payment ? payment.title : '') + '</strong></div>' +
                '<div class="complete-summary-row"><span>Bên vận chuyển</span><strong>' + esc(shipping ? shipping.name : '') + '</strong></div>' +
                '<div class="complete-summary-row"><span>Dự kiến</span><strong>' + esc(shipping ? shipping.eta.replace(/ \(.+\)/, '') : '') + '</strong></div>'
            );
        }

        function placeOrder() {
            if (isSubmitting) { return; }
            clearErrors();
            isSubmitting = true;
            $root.find('[data-place-order]').addClass('is-loading').prop('disabled', true);
            $root.find('[data-place-order-label]').text('Đang xử lý...');
            $root.find('[data-place-order-spinner]').removeAttr('hidden');
            var payment = selectedPayment();
            var shipping = selectedShipping();
            var payload = {
                form_key: bootstrap.form_key || '',
                full_name: state.fullName,
                email: state.email,
                phone: state.phone,
                address: [state.address, state.address2].filter(Boolean).join(', '),
                street: [state.address, state.address2].filter(Boolean).join(', '),
                city: state.city,
                region: state.district,
                postcode: '700000',
                country_id: 'VN',
                receiving_method: 'delivery',
                payment_method: payment ? payment.providerCode : '',
                shipping_method: shipping ? shipping.id : '',
                note: state.note,
                bank_id: state.bankId,
                wallet_id: state.walletId,
                gateway_channel: state.paymentMethodId === 'wallet' ? state.walletId : (state.paymentMethodId === 'card' ? 'vnpay' : ''),
                card_last4: state.card.number.replace(/\s/g, '').slice(-4),
                shipping_quote_amount: shipping ? shipping.price : 0
            };
            $.ajax({
                url: (bootstrap.endpoints || {}).place_order || '',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(payload)
            }).done(function (response) {
                state.order = {
                    orderId: '#' + (response.increment_id || ('SHOP-' + Date.now())),
                    payment: response.payment || {},
                    shipping: response.shipping || {}
                };
                state.paymentStatus = (response.payment && response.payment.status) ? response.payment.status : 'pending';
                saveState();
                if (state.paymentMethodId === 'cod') {
                    goToStep(5);
                    return;
                }
                renderPaymentConfirmation();
                if (response.payment && response.payment.redirect_url) {
                    showAlert('Payment URL đã được tạo. Mở trang thanh toán để hoàn tất, sau đó quay lại kiểm tra trạng thái.');
                    return;
                }
                showAlert('Đơn đã được tạo ở trạng thái chờ thanh toán. Cấu hình payment credential thật để tạo QR/payment URL live.');
            }).fail(function (xhr) {
                var response = xhr.responseJSON || {};
                showAlert(response.message || 'Đặt hàng thất bại. Vui lòng kiểm tra lại thông tin.');
            }).always(function () {
                isSubmitting = false;
                $root.find('[data-place-order]').removeClass('is-loading').prop('disabled', false);
                $root.find('[data-place-order-label]').text('Tạo thanh toán');
                $root.find('[data-place-order-spinner]').attr('hidden', 'hidden');
            });
        }

        function checkPaymentStatus() {
            if (!state.order || !state.order.orderId) {
                showAlert('Chưa có đơn hàng để kiểm tra trạng thái thanh toán.');
                return;
            }
            var endpoint = (bootstrap.endpoints || {}).payment_status || '/api/payments/status';
            $.ajax({
                url: endpoint,
                method: 'GET',
                dataType: 'json',
                data: {
                    orderId: state.order.orderId.replace(/^#/, ''),
                    paymentId: state.order.payment ? (state.order.payment.reference || '') : ''
                }
            }).done(function (response) {
                state.paymentStatus = response.status || 'pending';
                saveState();
                renderPaymentConfirmation();
                if (state.paymentStatus === 'paid') {
                    goToStep(5);
                    return;
                }
                showAlert(response.message || 'Thanh toán vẫn đang chờ xác nhận.');
            }).fail(function () {
                showAlert('Không kiểm tra được trạng thái thanh toán. Vui lòng thử lại.');
            });
        }

        function bindEvents() {
            $root.on('input change', '[data-field]', function () {
                var $field = $(this);
                var key = $field.data('field');
                state[key] = $field.attr('type') === 'checkbox' ? $field.is(':checked') : $field.val();
                if (key === 'city') { state.district = ''; state.ward = ''; populateDistricts(); }
                if (key === 'district') { state.ward = ''; populateWards(); renderShippingMethods(); renderSummary(); }
                saveState();
            });
            $root.on('input change', '[data-card-field]', function () {
                state.card[$(this).data('card-field')] = $(this).val();
                saveState();
            });
            $root.on('click', '[data-shipping-method]', function () {
                state.shippingMethodId = $(this).data('shipping-method');
                saveState();
                renderShippingMethods();
                renderSummary();
            });
            $root.on('click', '[data-payment-method]', function () {
                state.paymentMethodId = $(this).data('payment-method');
                saveState();
                renderPaymentMethods();
            });
            $root.on('click', '[data-bank-id]', function () {
                state.bankId = $(this).data('bank-id');
                saveState();
                renderBanks();
            });
            $root.on('click', '[data-wallet-id]', function () {
                state.walletId = $(this).data('wallet-id');
                saveState();
                renderWallets();
            });
            $root.on('click', '[data-copy-button]', function () {
                var $button = $(this);
                var source = $button.data('copy-source');
                var value = source ? $root.find(source).text() : ($button.data('copy-value') || '');
                if (!value) { return; }
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(value);
                }
                $button.text('Copied');
                window.setTimeout(function () { $button.text('Copy'); }, 1200);
            });
            $root.on('click', '[data-wallet-launch]', function () {
                var wallet = WALLETS.find(function (row) { return row.id === state.walletId; }) || WALLETS[0];
                if (wallet.payUrl) {
                    window.location.href = wallet.payUrl;
                    return;
                }
                showAlert('Cổng ' + wallet.name + ' đang ở mock mode. Cần cấu hình API backend để tạo payment URL thật.');
            });
            $root.on('click', '[data-next-step]', function () {
                var next = parseInt($(this).data('next-step'), 10);
                if (next === 2 && (!validateInformation() || !validateCarrier())) { return; }
                if (next === 3 && !validatePayment()) { return; }
                goToStep(next);
            });
            $root.on('click', '[data-prev-step]', function () {
                goToStep(parseInt($(this).data('prev-step'), 10));
            });
            $root.on('click', '[data-step-target]', function () {
                var step = parseInt($(this).data('step-target'), 10);
                if (step <= state.maxUnlockedStep) { goToStep(step); }
            });
            $root.on('click', '[data-edit-step]', function () {
                var step = parseInt($(this).data('edit-step'), 10);
                var shouldScrollShipping = !!$(this).data('scroll-shipping');
                goToStep(step);
                if (shouldScrollShipping) {
                    window.setTimeout(function () {
                        document.getElementById('pv-shipping-method-section').scrollIntoView({behavior: 'smooth', block: 'start'});
                    }, 120);
                }
            });
            $root.on('click', '[data-complete-track]', function () {
                var orderId = state.order && state.order.orderId ? state.order.orderId : '';
                var shipping = selectedShipping();
                var provider = shipping && shipping.provider ? shipping.provider : 'spx';
                window.location.href = '/order-tracking?order_id=' + encodeURIComponent(orderId.replace(/^#/, '')) + '&provider=' + encodeURIComponent(provider);
            });
            $root.on('click', '[data-place-order]', placeOrder);
            $root.on('click', '[data-check-payment-status]', checkPaymentStatus);
        }

        function init() {
            var requestedStep = getRequestedStep();
            var params;
            try {
                params = new URLSearchParams(window.location.search);
                if (params.get('payment_result') === 'success' && state.order) {
                    state.paymentStatus = 'paid';
                    state.maxUnlockedStep = 5;
                    state.step = 5;
                } else if (params.get('payment_result') === 'failed' && state.order) {
                    state.paymentStatus = 'failed';
                    state.step = 4;
                    state.maxUnlockedStep = Math.max(state.maxUnlockedStep || 1, 4);
                }
            } catch (e) {}
            if (requestedStep === 1) {
                state.step = 1;
                state.maxUnlockedStep = 1;
                state.order = null;
                state.paymentStatus = 'idle';
                saveState();
            }
            if (!state.step || state.step < 1 || state.step > 5 || (state.step === 5 && !state.order)) {
                state.step = 1;
                state.maxUnlockedStep = Math.max(1, state.maxUnlockedStep || 1);
            }
            fillCustomerDefaults();
            populateCities();
            loadVietnamLocations();
            syncFields();
            renderShippingMethods();
            renderPaymentMethods();
            renderSummary();
            bindEvents();
            goToStep(state.step || 1);
        }

        init();
    };
});
