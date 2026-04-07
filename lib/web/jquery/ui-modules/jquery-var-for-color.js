( function( factory ) {
<<<<<<< HEAD
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
=======
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
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

// Create a local jQuery because jQuery Color relies on it and the
// global may not exist with AMD and a custom build (#10199).
// This module is a noop if used as a regular AMD module.
// eslint-disable-next-line no-unused-vars
<<<<<<< HEAD
    var jQuery = $;
=======
var jQuery = $;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

} );
