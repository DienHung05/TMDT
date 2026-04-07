/*!
<<<<<<< HEAD
 * jQuery UI Tabbable 1.14.1
 * https://jqueryui.com
 *
 * Copyright OpenJS Foundation and other contributors
 * Released under the MIT license.
 * https://jquery.org/license
=======
 * jQuery UI Tabbable 1.13.1
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

//>>label: :tabbable Selector
//>>group: Core
//>>description: Selects elements which can be tabbed to.
<<<<<<< HEAD
//>>docs: https://api.jqueryui.com/tabbable-selector/

( function( factory ) {
    "use strict";

    if ( typeof define === "function" && define.amd ) {

        // AMD. Register as an anonymous module.
        define( [ "jquery", "./version", "./focusable" ], factory );
    } else {

        // Browser globals
        factory( jQuery );
    }
} )( function( $ ) {
    "use strict";

    return $.extend( $.expr.pseudos, {
        tabbable: function( element ) {
            var tabIndex = $.attr( element, "tabindex" ),
                hasTabindex = tabIndex != null;
            return ( !hasTabindex || tabIndex >= 0 ) && $.ui.focusable( element, hasTabindex );
        }
    } );
=======
//>>docs: http://api.jqueryui.com/tabbable-selector/

( function( factory ) {
	"use strict";

	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "jquery", "./version", "./focusable" ], factory );
	} else {

		// Browser globals
		factory( jQuery );
	}
} )( function( $ ) {
"use strict";

return $.extend( $.expr.pseudos, {
	tabbable: function( element ) {
		var tabIndex = $.attr( element, "tabindex" ),
			hasTabindex = tabIndex != null;
		return ( !hasTabindex || tabIndex >= 0 ) && $.ui.focusable( element, hasTabindex );
	}
} );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

} );
