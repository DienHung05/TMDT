( function( factory ) {
<<<<<<< HEAD
    "use strict";

    if ( typeof define === "function" && define.amd ) {

        // AMD. Register as an anonymous module.
        define( [ "jquery" ], factory );
    } else {

        // Browser globals
        factory( jQuery );
    }
} )( function( $ ) {
    "use strict";

    $.ui = $.ui || {};

    return $.ui.version = "1.14.1";
=======
	"use strict";

	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "jquery" ], factory );
	} else {

		// Browser globals
		factory( jQuery );
	}
} )( function( $ ) {
"use strict";

$.ui = $.ui || {};

return $.ui.version = "1.13.1";
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

} );
