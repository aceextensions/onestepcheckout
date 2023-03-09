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
        'jquery',
        'ko',
        'uiComponent',
        'Magento_Checkout/js/model/quote',
        'Magento_SalesRule/js/action/set-coupon-code',
        'Magento_SalesRule/js/action/cancel-coupon',
        'Aceextensions_OneStepCheckout/js/model/onestepcheckout-loader/discount'
    ],
    function ($, ko, Component, quote, setCouponCodeAction, cancelCouponAction, discountLoader) {
        'use strict';
        var totals = quote.getTotals(),
            couponCode = ko.observable(null),
            isApplied = discountLoader.isAppliedCoupon;

        if (totals()) {
            couponCode(totals()['coupon_code']);
        }
        return Component.extend({
            defaults: {
                template: 'Aceextensions_OneStepCheckout/review/discount'
            },
            isBlockLoading: discountLoader.isLoading,
            couponCode: couponCode,

            /**
             * Applied flag
             */
            isApplied: isApplied,

            /**
             * Coupon code application procedure
             */
            apply: function () {
                if (this.validate()) {
                    setCouponCodeAction(couponCode(), isApplied);
                }
            },

            /**
             * Cancel using coupon
             */
            cancel: function () {
                if (this.validate()) {
                    couponCode('');
                    cancelCouponAction(isApplied);
                }
            },

            /**
             * Coupon form validation
             *
             * @returns {Boolean}
             */
            validate: function () {
                var form = '#discount-form';

                return $(form).validation() && $(form).validation('isValid');
            }
        });
    }
);
