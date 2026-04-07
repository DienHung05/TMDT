/*!
<<<<<<< HEAD
 * jQuery UI :data 1.14.1
 * https://jqueryui.com
 *
 * Copyright OpenJS Foundation and other contributors
 * Released under the MIT license.
 * https://jquery.org/license
=======
 * jQuery UI :data 1.13.1
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

//>>label: :data Selector
//>>group: Core
//>>description: Selects elements which have data stored under the specified key.
<<<<<<< HEAD
//>>docs: https://api.jqueryui.com/data-selector/

( function( factory ) {
    "use strict";

    if ( typeof define === "function" && define.amd ) {

        // AMD. Register as an anonymous module.
        define( [ "jquery", "./version" ], factory );
    } else {

        // Browser globals
        factory( jQuery );
    }
} )( function( $ ) {
    "use strict";

    return $.extend( $.expr.pseudos, {
        data: $.expr.createPseudo( function( dataName ) {
            return function( elem ) {
                return !!$.data( elem, dataName );
            };
        } )
    } );
=======
//>>docs: http://api.jqueryui.com/data-selector/

( function( factory ) {
	"use strict";

	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "jquery", "./version" ], factory );
	} else {

		// Browser globals
		factory( jQuery );
	}
} )( function( $ ) {
"use strict";

return $.extend( $.expr.pseudos, {
	data: $.expr.createPseudo ?
		$.expr.createPseudo( function( dataName ) {
			return function( elem ) {
				return !!$.data( elem, dataName );
			};
		} ) :

		// Support: jQuery <1.8
		function( elem, i, match ) {
			return !!$.data( elem, match[ 3 ] );
		}
} );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
} );
