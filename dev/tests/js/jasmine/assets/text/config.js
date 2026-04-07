/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
define(function () {
    'use strict';

    return {
        local: {
            path: 'text!tests/assets/text/local.html',
<<<<<<< HEAD
            result: '<!--\n/**\n * Copyright 2015 Adobe\n * All Rights Reserved.\n */\n-->\n<span>Local Template</span>'
        },
        external: {
            path: 'text!tests/assets/text/external.html',
            result: '<!--\n/**\n * Copyright 2015 Adobe\n * All Rights Reserved.\n */\n-->\n<span>External Template</span>'
=======
            result: '<!--\n/**\n * Copyright © Magento, Inc. All rights reserved.\n * See COPYING.txt for license details.\n */\n-->\n<span>Local Template</span>'
        },
        external: {
            path: 'text!tests/assets/text/external.html',
            result: '<!--\n/**\n * Copyright © Magento, Inc. All rights reserved.\n * See COPYING.txt for license details.\n */\n-->\n<span>External Template</span>'
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        }
    };
});
