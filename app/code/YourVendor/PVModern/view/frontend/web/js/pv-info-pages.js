(function () {
    'use strict';

    function $(selector, root) {
        return (root || document).querySelector(selector);
    }
    function $all(selector, root) {
        return Array.prototype.slice.call((root || document).querySelectorAll(selector));
    }
    function esc(value) {
        return String(value == null ? '' : value).replace(/[&<>"']/g, function (char) {
            return {'&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;'}[char];
        });
    }
    function vnd(value) {
        return new Intl.NumberFormat('vi-VN', {style: 'currency', currency: 'VND', maximumFractionDigits: 0}).format(Number(value || 0));
    }
    var REAL_IMAGE_FALLBACK = 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1400&q=82';
    function normalizeImage(value) {
        var src = String(value || '').trim();
        if (!src || src.indexOf('.svg') !== -1) { return REAL_IMAGE_FALLBACK; }
        return src;
    }
    function bindImageFallback(root) {
        $all('img', root).forEach(function (image) {
            image.onerror = function () {
                if (image.getAttribute('src') !== REAL_IMAGE_FALLBACK) {
                    image.setAttribute('src', REAL_IMAGE_FALLBACK);
                }
            };
        });
    }
    function requestJson(url) {
        return fetch(url, {headers: {'X-Requested-With': 'XMLHttpRequest'}}).then(function (response) {
            if (!response.ok) { throw new Error('Request failed'); }
            return response.json();
        });
    }
    function setHidden(node, hidden) {
        if (!node) { return; }
        if (hidden) { node.setAttribute('hidden', 'hidden'); } else { node.removeAttribute('hidden'); }
    }
    function articleCard(article) {
        return '<article class="pvnews-card"><a href="' + esc(article.url || '#') + '">' +
            '<img src="' + esc(normalizeImage(article.image)) + '" alt="' + esc(article.title) + '" loading="lazy">' +
            '<div class="pvnews-card-body"><div class="pvnews-meta"><strong>' + esc(article.category) + '</strong><span>' + esc(article.time) + '</span></div>' +
            '<h3>' + esc(article.title) + '</h3><p>' + esc(article.summary) + '</p><span class="pvnews-source">' + esc(article.source || '') + '</span></div></a></article>';
    }
    function smallStory(article, className) {
        return '<a class="' + className + '" href="' + esc(article.url || '#') + '"><img src="' + esc(normalizeImage(article.image)) + '" alt="' + esc(article.title) + '" loading="lazy"><strong>' + esc(article.title) + '</strong></a>';
    }

    function initNews(root) {
        var apiUrl = root.getAttribute('data-api-url');
        var loading = $('[data-news-loading]', root);
        var error = $('[data-news-error]', root);
        var content = $('[data-news-content]', root);
        var state = {category: 'all', page: 1};
        try {
            var params = new URLSearchParams(window.location.search);
            state.category = params.get('category') || 'all';
            state.page = Math.max(parseInt(params.get('page'), 10) || 1, 1);
        } catch (e) {}

        function syncCats() {
            $all('[data-category]', root).forEach(function (button) {
                button.classList.toggle('is-active', button.getAttribute('data-category') === state.category);
            });
        }
        function syncUrl() {
            var params = new URLSearchParams(window.location.search);
            if (state.category && state.category !== 'all') { params.set('category', state.category); } else { params.delete('category'); }
            params.set('page', String(state.page));
            history.replaceState({}, '', window.location.pathname + '?' + params.toString());
        }
        function renderPagination(totalPages) {
            var wrap = $('[data-news-pagination]', root);
            if (!wrap) { return; }
            wrap.innerHTML = '';
            if (totalPages <= 1) { return; }
            for (var page = 1; page <= totalPages; page += 1) {
                var btn = document.createElement('button');
                btn.type = 'button';
                btn.textContent = String(page);
                btn.className = page === state.page ? 'is-active' : '';
                btn.setAttribute('data-page', String(page));
                wrap.appendChild(btn);
            }
        }
        function render(data) {
            var lead = data.lead || {};
            $('[data-breaking-list]', root).innerHTML = (data.breaking || []).map(function (headline) { return '<span>' + esc(headline) + '</span>'; }).join('');
            $('[data-lead-story]', root).innerHTML = '<img src="' + esc(normalizeImage(lead.image)) + '" alt="' + esc(lead.title) + '" loading="lazy"><div class="pvnews-lead-body"><div class="pvnews-meta"><strong>' + esc(lead.category) + '</strong><span>' + esc(lead.time) + '</span></div><h2>' + esc(lead.title) + '</h2><p>' + esc(lead.summary) + '</p><span class="pvnews-source">' + esc(lead.source) + '</span></div>';
            $('[data-top-stories]', root).innerHTML = (data.top || []).map(function (a) { return smallStory(a, 'pvnews-top-item'); }).join('');
            $('[data-latest-news]', root).innerHTML = (data.items || []).map(articleCard).join('');
            $('[data-popular-news]', root).innerHTML = (data.popular || []).map(function (a) { return smallStory(a, 'pvpopular-item'); }).join('');
            $('[data-hot-topics]', root).innerHTML = (data.topics || []).map(function (topic) { return '<span>' + esc(topic) + '</span>'; }).join('');
            $('[data-news-count]', root).textContent = (data.total || 0) + ' bài viết';
            setHidden($('[data-news-empty]', root), (data.items || []).length > 0);
            renderPagination(data.total_pages || 1);
            bindImageFallback(root);
        }
        function load() {
            syncCats();
            syncUrl();
            setHidden(loading, false);
            setHidden(error, true);
            setHidden(content, true);
            requestJson(apiUrl + '?category=' + encodeURIComponent(state.category) + '&page=' + encodeURIComponent(state.page))
                .then(function (data) {
                    render(data);
                    setHidden(content, false);
                })
                .catch(function () { setHidden(error, false); })
                .finally(function () { setHidden(loading, true); });
        }
        root.addEventListener('click', function (event) {
            var cat = event.target.closest('[data-category]');
            var page = event.target.closest('[data-page]');
            if (cat) {
                state.category = cat.getAttribute('data-category') || 'all';
                state.page = 1;
                load();
            }
            if (page) {
                state.page = parseInt(page.getAttribute('data-page'), 10) || 1;
                load();
                root.scrollIntoView({behavior: 'smooth', block: 'start'});
            }
            if (event.target.closest('[data-news-retry]')) { load(); }
        });
        load();
    }

    function initWeather(root) {
        var apiUrl = root.getAttribute('data-api-url');
        var form = $('[data-weather-form]', root);
        var loading = $('[data-weather-loading]', root);
        var error = $('[data-weather-error]', root);
        var content = $('[data-weather-content]', root);
        var lastUrl = '';
        function weatherUrl(extra) {
            var city = form.city.value || 'Hanoi';
            return apiUrl + (extra || ('?city=' + encodeURIComponent(city)));
        }
        function render(data) {
            var current = data.current || {};
            $('[data-current-weather]', root).innerHTML = '<h2>' + esc(data.location) + '</h2><p>' + esc(data.updated_at) + '</p><div class="pvweather-temp"><strong>' + esc(current.temperature) + '°</strong><span>' + esc(current.icon) + '</span></div><h3>' + esc(current.condition) + '</h3><div class="pvweather-metrics"><div>Feels like<br><strong>' + esc(current.feels_like) + '°</strong></div><div>Humidity<br><strong>' + esc(current.humidity) + '%</strong></div><div>Wind<br><strong>' + esc(current.wind) + '</strong></div><div>UV<br><strong>' + esc(current.uv) + '</strong></div></div>';
            $('[data-weather-alert]', root).innerHTML = '<h2>Weather alert</h2><p><strong>' + esc((data.alert || {}).title) + '</strong></p><p>' + esc((data.alert || {}).description) + '</p><p>' + esc((data.alert || {}).time) + '</p>';
            $('[data-hourly-forecast]', root).innerHTML = (data.hourly || []).map(function (h) { return '<div class="pvweather-hour"><span>' + esc(h.time) + '</span><strong>' + esc(h.icon) + '</strong><b>' + esc(h.temp) + '°</b><small>' + esc(h.rain) + '% rain</small></div>'; }).join('');
            $('[data-daily-forecast]', root).innerHTML = (data.daily || []).map(function (d) { return '<div class="pvweather-day"><strong>' + esc(d.day) + '</strong><p>' + esc(d.icon) + ' ' + esc(d.condition) + '</p><b>' + esc(d.min) + '° / ' + esc(d.max) + '°</b></div>'; }).join('');
            $('[data-weather-news]', root).innerHTML = (data.news || []).map(function (n) { return '<article><img src="' + esc(normalizeImage(n.image)) + '" alt="' + esc(n.title) + '" loading="lazy"><h3>' + esc(n.title) + '</h3><p>' + esc(n.summary) + '</p></article>'; }).join('');
            bindImageFallback(root);
        }
        function load(url) {
            lastUrl = url || weatherUrl();
            setHidden(loading, false); setHidden(error, true); setHidden(content, true);
            requestJson(lastUrl).then(function (data) {
                render(data);
                setHidden(content, false);
            }).catch(function () { setHidden(error, false); }).finally(function () { setHidden(loading, true); });
        }
        form.addEventListener('submit', function (event) { event.preventDefault(); load(); });
        root.addEventListener('click', function (event) {
            if (event.target.closest('[data-weather-retry]')) { load(lastUrl); }
            if (event.target.closest('[data-use-location]')) {
                var msg = $('[data-geo-message]', root);
                if (!navigator.geolocation) { msg.textContent = 'Trình duyệt không hỗ trợ geolocation.'; return; }
                msg.textContent = 'Đang lấy vị trí...';
                navigator.geolocation.getCurrentPosition(function (position) {
                    msg.textContent = 'Đã lấy vị trí hiện tại.';
                    load(weatherUrl('?lat=' + encodeURIComponent(position.coords.latitude) + '&lon=' + encodeURIComponent(position.coords.longitude)));
                }, function () {
                    msg.textContent = 'Bạn đã từ chối quyền vị trí. Vui lòng nhập city thủ công.';
                });
            }
        });
        load();
    }

    function initCurrency(root) {
        var apiUrl = root.getAttribute('data-api-url');
        var form = $('[data-currency-form]', root);
        var loading = $('[data-currency-loading]', root);
        var error = $('[data-currency-error]', root);
        var content = $('[data-currency-content]', root);
        var timer = null;
        var range = '1M';
        var hasLoaded = false;
        if (!form) { return; }
        function showError() {
            setHidden(loading, true);
            setHidden(error, false);
            if (!hasLoaded) { setHidden(content, true); }
        }
        function convert() {
            var url = apiUrl + '?mode=convert&amount=' + encodeURIComponent(form.amount.value || '100') + '&from=' + encodeURIComponent(form.from.value) + '&to=' + encodeURIComponent(form.to.value);
            return requestJson(url).then(function (data) {
                $('[data-convert-result]', root).textContent = Number(data.amount || 0).toLocaleString('en-US') + ' ' + data.from + ' = ' + Number(data.result || 0).toLocaleString('vi-VN', {maximumFractionDigits: data.to === 'VND' ? 0 : 4}) + ' ' + data.to;
                $('[data-convert-meta]', root).textContent = 'Updated ' + data.updated_at + ' • ' + data.source;
            });
        }
        function latest() {
            return requestJson(apiUrl + '?mode=latest').then(function (data) {
                $('[data-currency-note]', root).textContent = data.note || '';
                $('[data-currency-updated]', root).textContent = 'Updated ' + data.updated_at + ' • ' + data.source;
                $('[data-rates-table]', root).innerHTML = (data.rates || []).map(function (r) {
                    var cls = Number(r.change) >= 0 ? 'pvcurrency-change-pos' : 'pvcurrency-change-neg';
                    return '<tr><td><strong>' + esc(r.pair) + '</strong></td><td>' + vnd(r.rate) + '</td><td class="' + cls + '">' + (Number(r.change) >= 0 ? '+' : '') + esc(r.change) + '%</td><td>' + esc(r.updated) + '</td></tr>';
                }).join('');
                $('[data-currency-watchlist]', root).innerHTML = (data.rates || []).slice(0, 4).map(function (r) { return '<div class="pvcurrency-watch-row"><strong>' + esc(r.pair) + '</strong><span>' + vnd(r.rate) + '</span></div>'; }).join('');
                $('[data-currency-news]', root).innerHTML = (data.news || []).map(function (n) { return '<article><img src="' + esc(normalizeImage(n.image)) + '" alt="' + esc(n.title) + '" loading="lazy"><h3>' + esc(n.title) + '</h3><p>' + esc(n.summary) + '</p></article>'; }).join('');
                bindImageFallback(root);
            });
        }
        function history() {
            $all('[data-range]', root).forEach(function (button) {
                button.classList.toggle('is-active', button.getAttribute('data-range') === range);
            });
            return requestJson(apiUrl + '?mode=history&range=' + encodeURIComponent(range)).then(function (data) {
                var points = data.points || [];
                var max = Math.max.apply(null, points.map(function (p) { return Number(p.value); })) || 1;
                var min = Math.min.apply(null, points.map(function (p) { return Number(p.value); })) || 0;
                $('[data-currency-chart]', root).innerHTML = points.map(function (p) {
                    var h = 20 + ((Number(p.value) - min) / Math.max(1, max - min)) * 80;
                    return '<span class="pvcurrency-bar" style="height:' + h + '%" title="' + esc(p.label) + ': ' + esc(p.value) + '"></span>';
                }).join('');
            });
        }
        function loadAll() {
            setHidden(loading, false);
            setHidden(error, true);
            if (!hasLoaded) { setHidden(content, true); }
            Promise.all([latest(), convert(), history()]).then(function () {
                hasLoaded = true;
                setHidden(content, false);
            }).catch(showError).finally(function () {
                setHidden(loading, true);
            });
        }
        function debounceConvert() {
            clearTimeout(timer);
            timer = setTimeout(function () { convert().catch(showError); }, 300);
        }
        form.addEventListener('input', debounceConvert);
        form.addEventListener('change', debounceConvert);
        root.addEventListener('click', function (event) {
            if (event.target.closest('[data-currency-swap]')) {
                var from = form.from.value;
                form.from.value = form.to.value;
                form.to.value = from;
                convert().catch(showError);
            }
            var rangeButton = event.target.closest('[data-range]');
            if (rangeButton) {
                range = rangeButton.getAttribute('data-range') || '1M';
                history().catch(showError);
            }
            if (event.target.closest('[data-currency-retry]')) {
                loadAll();
            }
        });
        loadAll();
    }

    function initTracking(root) {
        var apiUrl = root.getAttribute('data-api-url');
        var form = $('[data-tracking-page-form]', root);
        var result = $('[data-tracking-page-result]', root);
        var search = $('[data-order-search]', root);
        var statusFilter = $('[data-order-status]', root);
        var orderList = $('[data-tracking-order-list]', root);
        var empty = $('[data-tracking-empty]', root);
        var demoOrders = [
            {id: 'TW-20260427-1001', date: '27/04/2026', total: '43.105.000 ₫', status: 'shipping', label: 'Đang giao', carrier: 'Giao Hàng Nhanh', provider: 'ghn', tracking: 'GHN-TW1001', timeline: ['Đã đặt hàng', 'Đã xác nhận', 'Đã thanh toán', 'Đang chuẩn bị', 'Đang giao']},
            {id: 'TW-20260426-0998', date: '26/04/2026', total: '15.990.000 ₫', status: 'processing', label: 'Đang xử lý', carrier: 'Shopee Express', provider: 'spx', tracking: 'SPX-TW0998', timeline: ['Đã đặt hàng', 'Đã xác nhận', 'Đang chuẩn bị']},
            {id: 'TW-20260425-0972', date: '25/04/2026', total: '7.200.000 ₫', status: 'complete', label: 'Hoàn thành', carrier: 'GHTK', provider: 'ghtk', tracking: 'GHTK-TW0972', timeline: ['Đã đặt hàng', 'Đã xác nhận', 'Đã thanh toán', 'Đang giao', 'Hoàn thành']},
            {id: 'TW-20260424-0940', date: '24/04/2026', total: '2.990.000 ₫', status: 'pending', label: 'Chờ xác nhận', carrier: 'Chưa phân bổ', provider: 'spx', tracking: '', timeline: ['Đã đặt hàng']}
        ];
        try {
            var params = new URLSearchParams(window.location.search);
            if (params.get('order_id')) { form.order_id.value = params.get('order_id'); }
            if (params.get('provider')) { form.provider.value = params.get('provider'); }
            if (params.get('tracking_number')) { form.tracking_number.value = params.get('tracking_number'); }
        } catch (e) {}
        function renderDashboard() {
            if (!orderList) { return; }
            var q = String(search ? search.value : '').toLowerCase();
            var status = String(statusFilter ? statusFilter.value : 'all');
            var rows = demoOrders.filter(function (order) {
                return (status === 'all' || order.status === status) && (!q || order.id.toLowerCase().indexOf(q) !== -1 || order.tracking.toLowerCase().indexOf(q) !== -1);
            });
            var stats = [
                ['Tổng đơn', demoOrders.length],
                ['Đang giao', demoOrders.filter(function (o) { return o.status === 'shipping'; }).length],
                ['Hoàn thành', demoOrders.filter(function (o) { return o.status === 'complete'; }).length],
                ['Cần xử lý', demoOrders.filter(function (o) { return o.status === 'pending' || o.status === 'processing'; }).length]
            ];
            $('[data-tracking-stats]', root).innerHTML = stats.map(function (stat) {
                return '<article class="pvtracking-stat surface-card"><span>' + esc(stat[0]) + '</span><strong>' + esc(stat[1]) + '</strong></article>';
            }).join('');
            orderList.innerHTML = rows.map(function (order) {
                return '<article class="pvtracking-order-card surface-card">' +
                    '<div class="pvtracking-order-head"><div><span>Mã đơn hàng</span><strong>' + esc(order.id) + '</strong></div><span class="pvtracking-status-badge pvtracking-status-badge--' + esc(order.status) + '">' + esc(order.label) + '</span></div>' +
                    '<div class="pvtracking-order-grid"><div><span>Ngày đặt</span><strong>' + esc(order.date) + '</strong></div><div><span>Tổng tiền</span><strong>' + esc(order.total) + '</strong></div><div><span>Bên vận chuyển</span><strong>' + esc(order.carrier) + '</strong></div><div><span>Mã vận đơn</span><strong>' + esc(order.tracking || 'Chưa có') + '</strong></div></div>' +
                    '<ol class="pvtracking-mini-timeline">' + order.timeline.map(function (step) { return '<li>' + esc(step) + '</li>'; }).join('') + '</ol>' +
                    '<div class="pvtracking-order-actions"><button type="button" data-order-detail="' + esc(order.id) + '">Xem chi tiết</button><button type="button" data-order-track="' + esc(order.id) + '">Theo dõi vận đơn</button></div>' +
                    '</article>';
            }).join('');
            setHidden(empty, rows.length > 0);
        }
        function renderOrderDetail(order) {
            result.innerHTML = '<div class="pvtracking-card">' +
                '<div class="pvtracking-status"><div><span>Chi tiết đơn hàng</span><strong>' + esc(order.id) + '</strong></div><span class="pvtracking-pill">' + esc(order.label) + '</span></div>' +
                '<div class="pvtracking-meta"><div><span>Ngày đặt</span><strong>' + esc(order.date) + '</strong></div><div><span>Tổng tiền</span><strong>' + esc(order.total) + '</strong></div><div><span>Bên vận chuyển</span><strong>' + esc(order.carrier) + '</strong></div><div><span>Mã vận đơn</span><strong>' + esc(order.tracking || 'Chưa có') + '</strong></div></div>' +
                '<h2>Timeline</h2><ol class="pvtracking-timeline">' + order.timeline.map(function (label) { return '<li><span class="pvtracking-dot"></span><div><strong>' + esc(label) + '</strong><small>Đang cập nhật</small></div></li>'; }).join('') + '</ol>' +
                '</div>';
        }
        function render(data) {
            result.innerHTML = '<div class="pvtracking-card">' +
                '<div class="pvtracking-status"><div><span>Trạng thái hiện tại</span><strong>' + esc(data.status) + '</strong></div><span class="pvtracking-pill">' + esc(data.carrier_label) + '</span></div>' +
                '<div class="pvtracking-meta"><div><span>Mã đơn</span><strong>' + esc(data.order_id) + '</strong></div><div><span>Mã vận đơn</span><strong>' + esc(data.tracking_number) + '</strong></div><div><span>Cập nhật cuối</span><strong>' + esc(data.updated_at) + '</strong></div><div><span>Dự kiến giao</span><strong>' + esc(data.eta) + '</strong></div></div>' +
                '<h2>Timeline</h2><ol class="pvtracking-timeline">' + (data.timeline || []).map(function (row) { return '<li><span class="pvtracking-dot"></span><div><strong>' + esc(row.label) + '</strong><small>' + esc(row.time) + '</small></div></li>'; }).join('') + '</ol>' +
                '</div>';
        }
        function submit() {
            var query = '?order_id=' + encodeURIComponent(form.order_id.value) + '&provider=' + encodeURIComponent(form.provider.value) + '&tracking_number=' + encodeURIComponent(form.tracking_number.value || '');
            result.innerHTML = '<div class="pvinfo-loading"><span></span><span></span><span></span></div>';
            requestJson(apiUrl + query).then(render).catch(function () {
                result.innerHTML = '<div class="pvinfo-error"><strong>Không tải được tracking.</strong><p>Vui lòng kiểm tra mã đơn hàng hoặc thử lại sau.</p></div>';
            });
        }
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            submit();
        });
        root.addEventListener('input', function (event) {
            if (event.target && event.target.matches('[data-order-search]')) { renderDashboard(); }
        });
        root.addEventListener('change', function (event) {
            if (event.target && event.target.matches('[data-order-status]')) { renderDashboard(); }
        });
        root.addEventListener('click', function (event) {
            var detail = event.target.closest('[data-order-detail]');
            var track = event.target.closest('[data-order-track]');
            var order;
            if (detail) {
                order = demoOrders.find(function (row) { return row.id === detail.getAttribute('data-order-detail'); });
                if (order) { renderOrderDetail(order); result.scrollIntoView({behavior: 'smooth', block: 'start'}); }
            }
            if (track) {
                order = demoOrders.find(function (row) { return row.id === track.getAttribute('data-order-track'); });
                if (order) {
                    form.order_id.value = order.id;
                    form.provider.value = order.provider;
                    form.tracking_number.value = order.tracking;
                    submit();
                    result.scrollIntoView({behavior: 'smooth', block: 'start'});
                }
            }
        });
        renderDashboard();
        if (form.order_id.value) { submit(); }
    }

    document.addEventListener('DOMContentLoaded', function () {
        var news = $('[data-pvinfo-news]');
        var weather = $('[data-pvinfo-weather]');
        var currency = $('[data-pvinfo-currency]');
        var tracking = $('[data-pvinfo-tracking]');
        if (news) { initNews(news); }
        if (weather) { initWeather(weather); }
        if (currency) { initCurrency(currency); }
        if (tracking) { initTracking(tracking); }
    });
}());
