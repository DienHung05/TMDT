/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

/**
 * @deprecated since version 2.2.0
 */
define([
    'jquery',
    'jquery-ui-modules/tooltip'
], function ($) {
    'use strict';

    //Widget Wrapper
    $.widget('mage.tooltip', $.ui.tooltip, {});

    return $.mage.tooltip;
});
