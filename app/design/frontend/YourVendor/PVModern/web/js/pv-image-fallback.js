define([], function () {
    'use strict';

    function esc(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function getThemeConfig(label) {
        var normalized = String(label || '').toLowerCase();

        if (/(iphone|ipad|apple watch|airpods|macbook|mac studio|mac mini|apple)/.test(normalized)) {
            return { icon: 'apple', bg1: '#0f172a', bg2: '#4f46e5', accent: '#c084fc', badge: 'Apple' };
        }
        if (/(laptop|notebook|ultrabook|rog|legion|xps|latitude|expertbook|elitebook|macbook)/.test(normalized)) {
            return { icon: 'laptop', bg1: '#0f172a', bg2: '#2563eb', accent: '#93c5fd', badge: 'Laptop' };
        }
        if (/(monitor|display|oled|ultrawide|odyssey|alienware|proart|benq|studio display)/.test(normalized)) {
            return { icon: 'monitor', bg1: '#111827', bg2: '#7c3aed', accent: '#67e8f9', badge: 'Monitor' };
        }
        if (/(rtx|geforce|radeon|graphics|gpu|vga)/.test(normalized)) {
            return { icon: 'gpu', bg1: '#111827', bg2: '#9333ea', accent: '#f9a8d4', badge: 'GPU' };
        }
        if (/(ryzen|threadripper|core i|processor|cpu|xeon)/.test(normalized)) {
            return { icon: 'cpu', bg1: '#111827', bg2: '#ea580c', accent: '#fdba74', badge: 'CPU' };
        }
        if (/(ram|memory|ddr5|ddr4)/.test(normalized)) {
            return { icon: 'ram', bg1: '#0f172a', bg2: '#0f766e', accent: '#99f6e4', badge: 'Memory' };
        }
        if (/(ssd|hdd|storage|nvme|firecuda|ironwolf)/.test(normalized)) {
            return { icon: 'storage', bg1: '#111827', bg2: '#0284c7', accent: '#bae6fd', badge: 'Storage' };
        }
        if (/(case|tower|airflow|chassis)/.test(normalized)) {
            return { icon: 'case', bg1: '#111827', bg2: '#4f46e5', accent: '#e9d5ff', badge: 'Case' };
        }

        return { icon: 'device', bg1: '#0f172a', bg2: '#8b5cf6', accent: '#fbcfe8', badge: 'Product' };
    }

    function iconSvg(type) {
        if (type === 'apple') {
            return '<path d="M88 47c7-8 18-12 27-12 1 11-3 21-10 28-7 7-18 12-29 11-2-11 4-21 12-27Zm13 30c14 0 20 8 31 8 10 0 16-7 27-7 0 17-9 33-19 46-9 12-19 25-34 25-14 0-18-8-34-8s-21 8-34 8c-14 1-25-14-34-26-19-26-33-72-14-105 9-16 26-26 44-26 14 0 27 9 34 9 7 0 22-11 38-10 7 0 27 3 39 20-1 1-23 13-23 40 0 32 28 43 28 44-1 1-4 14-13 28-8 12-16 24-29 24-13 0-17-8-33-8s-21 8-33 8c-13 1-23-11-31-23-16-23-28-64-12-93 8-15 22-24 37-24 14 0 26 8 34 8Z" fill="white"/>';
        }
        if (type === 'laptop') {
            return '<rect x="52" y="54" width="92" height="58" rx="10" stroke="white" stroke-width="10" fill="none"/><path d="M36 126h124" stroke="white" stroke-width="10" stroke-linecap="round"/>';
        }
        if (type === 'monitor') {
            return '<rect x="44" y="42" width="108" height="68" rx="10" stroke="white" stroke-width="10" fill="none"/><path d="M98 112v18" stroke="white" stroke-width="10" stroke-linecap="round"/><path d="M70 140h56" stroke="white" stroke-width="10" stroke-linecap="round"/>';
        }
        if (type === 'gpu') {
            return '<rect x="40" y="58" width="116" height="48" rx="12" stroke="white" stroke-width="10" fill="none"/><circle cx="82" cy="82" r="14" stroke="white" stroke-width="8" fill="none"/><circle cx="118" cy="82" r="14" stroke="white" stroke-width="8" fill="none"/>';
        }
        if (type === 'cpu') {
            return '<rect x="54" y="54" width="84" height="84" rx="12" stroke="white" stroke-width="10" fill="none"/><rect x="78" y="78" width="36" height="36" rx="6" fill="white"/>';
        }
        if (type === 'ram') {
            return '<rect x="36" y="76" width="124" height="36" rx="10" stroke="white" stroke-width="10" fill="none"/><path d="M58 70v-14M80 70v-14M102 70v-14M124 70v-14M146 70v-14" stroke="white" stroke-width="8" stroke-linecap="round"/>';
        }
        if (type === 'storage') {
            return '<rect x="56" y="40" width="80" height="112" rx="16" stroke="white" stroke-width="10" fill="none"/><circle cx="96" cy="122" r="7" fill="white"/>';
        }
        if (type === 'case') {
            return '<rect x="64" y="34" width="64" height="124" rx="10" stroke="white" stroke-width="10" fill="none"/><circle cx="96" cy="128" r="6" fill="white"/><path d="M82 58h28" stroke="white" stroke-width="8" stroke-linecap="round"/>';
        }

        return '<rect x="48" y="46" width="96" height="92" rx="16" stroke="white" stroke-width="10" fill="none"/><path d="M66 76h60" stroke="white" stroke-width="8" stroke-linecap="round"/><path d="M66 100h44" stroke="white" stroke-width="8" stroke-linecap="round"/>';
    }

    function createFallbackSrc(label) {
        var theme = getThemeConfig(label);
        var safeLabel = esc(label || 'Product image');
        var lines = safeLabel.length > 34
            ? [safeLabel.slice(0, 34), safeLabel.slice(34, 68)]
            : [safeLabel];
        var secondLine = lines[1] ? '<text x="24" y="246" font-family="Inter, Arial, sans-serif" font-size="18" font-weight="600" fill="rgba(255,255,255,.88)">' + lines[1] + '</text>' : '';
        var svg = '' +
            '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 320">' +
                '<defs>' +
                    '<linearGradient id="bg" x1="20" y1="24" x2="298" y2="298" gradientUnits="userSpaceOnUse">' +
                        '<stop stop-color="' + theme.bg1 + '"/>' +
                        '<stop offset="1" stop-color="' + theme.bg2 + '"/>' +
                    '</linearGradient>' +
                '</defs>' +
                '<rect width="320" height="320" rx="28" fill="url(#bg)"/>' +
                '<circle cx="262" cy="60" r="48" fill="' + theme.accent + '" opacity=".22"/>' +
                '<rect x="24" y="24" width="96" height="34" rx="17" fill="rgba(255,255,255,.14)"/>' +
                '<text x="72" y="45" text-anchor="middle" font-family="Inter, Arial, sans-serif" font-size="13" font-weight="700" fill="white" letter-spacing="1.2">' + theme.badge.toUpperCase() + '</text>' +
                '<g transform="translate(68 76)">' + iconSvg(theme.icon) + '</g>' +
                '<text x="24" y="220" font-family="Inter, Arial, sans-serif" font-size="20" font-weight="800" fill="white">' + lines[0] + '</text>' +
                secondLine +
            '</svg>';

        return 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(svg);
    }

    function shouldUseGeneratedFallback(target) {
        var src = String(target.getAttribute('src') || '').toLowerCase();

        if (!src) {
            return true;
        }

        return /placeholder|no_selection|transparent\.gif/.test(src);
    }

    function applyFallback(target) {
        if (!target || target.tagName !== 'IMG' || target.dataset.pvFallbackApplied === '1') {
            return;
        }

        target.dataset.pvFallbackApplied = '1';
        target.src = createFallbackSrc(target.getAttribute('alt') || target.getAttribute('title') || 'Product image');
        target.classList.add('pv3-image-fallback-applied');
    }

    function scanImages(root) {
        var nodes = root && root.querySelectorAll ? root.querySelectorAll('img') : [];

        Array.prototype.forEach.call(nodes, function (img) {
            if (shouldUseGeneratedFallback(img) || (img.complete && img.naturalWidth === 0)) {
                applyFallback(img);
            }
        });
    }

    return function () {
        document.addEventListener('error', function (event) {
            applyFallback(event.target);
        }, true);

        scanImages(document);

        if (typeof MutationObserver === 'function') {
            new MutationObserver(function (mutations) {
                mutations.forEach(function (mutation) {
                    Array.prototype.forEach.call(mutation.addedNodes || [], function (node) {
                        if (!node || node.nodeType !== 1) {
                            return;
                        }

                        if (node.tagName === 'IMG') {
                            if (shouldUseGeneratedFallback(node)) {
                                applyFallback(node);
                            }
                            return;
                        }

                        scanImages(node);
                    });
                });
            }).observe(document.documentElement, {
                childList: true,
                subtree: true
            });
        }
    };
});
