/**
 * Aceextensions_OneStepCheckout
 *
 * @category    Checkout
 * @package     Aceextensions_OneStepCheckout
 * @author      Durga Shankar Gupta
 * @copyright   DreamWorkFactory (https://dreamworkfactory.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

define(
    [
        'ko',
        'Magento_Checkout/js/model/quote'
    ],
    function (ko, quote) {
        'use strict';
        var totals = quote.getTotals(),
            couponCode = ko.observable(null);
        if (totals()) {
            couponCode(totals()['coupon_code']);
        }
        return {
            isLoading: ko.observable(false),
            isAppliedCoupon: ko.observable(couponCode() != null),
            /**
             * Start full page loader action
             */
            startLoader: function () {
                this.isLoading(true);
            },
            /**
             * Stop full page loader action
             */
            stopLoader: function () {
                this.isLoading(false);
            }
        };
    }
);
