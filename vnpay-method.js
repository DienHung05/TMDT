define(
    [
        'Magento_Payment/js/view/payment/cc-form'
    ],
    function (Component) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Vendor_VnPay/payment/vnpay-method'
            },
            getCode: function() {
                return 'vnpay';
            },
            isActive: function() {
                return true;
            }
        });
    }
);
