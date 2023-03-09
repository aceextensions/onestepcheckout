/**
 * Aceextensions_OneStepCheckout
 *
 * @category    Checkout
 * @package     Aceextensions_OneStepCheckout
 * @author      Durga Shankar Gupta
 * @copyright   DreamWorkFactory (https://dreamworkfactory.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

define(['jquery', 'mage/validation'], function ($) {
    'use strict';

    var checkoutConfig = window.checkoutConfig,
        agreementsConfig = checkoutConfig ? checkoutConfig.checkoutAgreements : {},
        agreementsInputPath = 'div.checkout-agreements input#agreement__1';

    return {
        /**
         * Validate checkout agreements
         *
         * @returns {Boolean}
         */
        validate: function (hideError) {
            var isValid = true;
            if (!agreementsConfig.isEnabled || $(agreementsInputPath).length === 0) {
                return true;
            }
            $(agreementsInputPath).each(function (index, element) {
                if (!$.validator.validateSingleElement(element, {
                    errorElement: 'div', hideError: hideError || false
                })) {
                    isValid = false;
                }
            });

            return isValid;
        }
    };
});
