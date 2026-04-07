<<<<<<< HEAD
/*! js-cookie v3.0.5 | MIT */
=======
/*! js-cookie v3.0.1 | MIT */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
;
(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
        typeof define === 'function' && define.amd ? define(factory) :
<<<<<<< HEAD
            (global = typeof globalThis !== 'undefined' ? globalThis : global || self, (function () {
                var current = global.Cookies;
                var exports = global.Cookies = factory();
                exports.noConflict = function () { global.Cookies = current; return exports; };
            })());
})(this, (function () { 'use strict';
=======
            (global = global || self, (function () {
                var current = global.Cookies;
                var exports = global.Cookies = factory();
                exports.noConflict = function () { global.Cookies = current; return exports; };
            }()));
}(this, (function () { 'use strict';
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

    /* eslint-disable no-var */
    function assign (target) {
        for (var i = 1; i < arguments.length; i++) {
            var source = arguments[i];
            for (var key in source) {
                target[key] = source[key];
            }
        }
        return target
    }
    /* eslint-enable no-var */

    /* eslint-disable no-var */
    var defaultConverter = {
        read: function (value) {
            if (value[0] === '"') {
                value = value.slice(1, -1);
            }
            return value.replace(/(%[\dA-F]{2})+/gi, decodeURIComponent)
        },
        write: function (value) {
            return encodeURIComponent(value).replace(
                /%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g,
                decodeURIComponent
            )
        }
    };
    /* eslint-enable no-var */

    /* eslint-disable no-var */

    function init (converter, defaultAttributes) {
<<<<<<< HEAD
        function set (name, value, attributes) {
=======
        function set (key, value, attributes) {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            if (typeof document === 'undefined') {
                return
            }

            attributes = assign({}, defaultAttributes, attributes);

            if (typeof attributes.expires === 'number') {
                attributes.expires = new Date(Date.now() + attributes.expires * 864e5);
            }
            if (attributes.expires) {
                attributes.expires = attributes.expires.toUTCString();
            }

<<<<<<< HEAD
            name = encodeURIComponent(name)
=======
            key = encodeURIComponent(key)
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                .replace(/%(2[346B]|5E|60|7C)/g, decodeURIComponent)
                .replace(/[()]/g, escape);

            var stringifiedAttributes = '';
            for (var attributeName in attributes) {
                if (!attributes[attributeName]) {
                    continue
                }

                stringifiedAttributes += '; ' + attributeName;

                if (attributes[attributeName] === true) {
                    continue
                }

                // Considers RFC 6265 section 5.2:
                // ...
                // 3.  If the remaining unparsed-attributes contains a %x3B (";")
                //     character:
                // Consume the characters of the unparsed-attributes up to,
                // not including, the first %x3B (";") character.
                // ...
                stringifiedAttributes += '=' + attributes[attributeName].split(';')[0];
            }

            return (document.cookie =
<<<<<<< HEAD
                name + '=' + converter.write(value, name) + stringifiedAttributes)
        }

        function get (name) {
            if (typeof document === 'undefined' || (arguments.length && !name)) {
=======
                key + '=' + converter.write(value, key) + stringifiedAttributes)
        }

        function get (key) {
            if (typeof document === 'undefined' || (arguments.length && !key)) {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                return
            }

            // To prevent the for loop in the first place assign an empty array
            // in case there are no cookies at all.
            var cookies = document.cookie ? document.cookie.split('; ') : [];
            var jar = {};
            for (var i = 0; i < cookies.length; i++) {
                var parts = cookies[i].split('=');
                var value = parts.slice(1).join('=');

                try {
<<<<<<< HEAD
                    var found = decodeURIComponent(parts[0]);
                    jar[found] = converter.read(value, found);

                    if (name === found) {
=======
                    var foundKey = decodeURIComponent(parts[0]);
                    jar[foundKey] = converter.read(value, foundKey);

                    if (key === foundKey) {
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        break
                    }
                } catch (e) {}
            }

<<<<<<< HEAD
            return name ? jar[name] : jar
=======
            return key ? jar[key] : jar
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        }

        return Object.create(
            {
<<<<<<< HEAD
                set,
                get,
                remove: function (name, attributes) {
                    set(
                        name,
=======
                set: set,
                get: get,
                remove: function (key, attributes) {
                    set(
                        key,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                        '',
                        assign({}, attributes, {
                            expires: -1
                        })
                    );
                },
                withAttributes: function (attributes) {
                    return init(this.converter, assign({}, this.attributes, attributes))
                },
                withConverter: function (converter) {
                    return init(assign({}, this.converter, converter), this.attributes)
                }
            },
            {
                attributes: { value: Object.freeze(defaultAttributes) },
                converter: { value: Object.freeze(converter) }
            }
        )
    }

    var api = init(defaultConverter, { path: '/' });
    /* eslint-enable no-var */

    return api;

<<<<<<< HEAD
}));
=======
})));
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
