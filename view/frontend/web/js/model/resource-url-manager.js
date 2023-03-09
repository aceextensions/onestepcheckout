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
        'Magento_Checkout/js/model/resource-url-manager'
    ],
    function ($, resourceUrlManager) {
        "use strict";

        return $.extend({
            /** Get url for saving email to quote */
            getUrlForSaveEmailToQuote: function (quote) {
                var params = {cartId: quote.getQuoteId()};
                var urls = {
                    'guest': '/guest-carts/:cartId/save-email-to-quote',
                };
                return this.getUrl(urls, params);
            },

            // /** Get url for checking email */
            getUrlForCheckIsEmailAvailable: function (quote) {
                var params = {cartId: quote.getQuoteId()};
                var urls = {
                    'guest': '/guest-carts/:cartId/isEmailAvailable',
                };
                return this.getUrl(urls, params);
            },

            /** Get url for update item qty and remove item */
            getUrlForUpdateItemInformation: function (quote, isRemove) {
                var params = (this.getCheckoutMethod() == 'guest') ? {cartId: quote.getQuoteId()} : {};
                var urlPath = (isRemove == true) ? 'remove-item' : 'update-item';
                var urls = {
                    'guest': '/guest-carts/:cartId/' + urlPath,
                    'customer': '/carts/mine/' + urlPath
                };
                return this.getUrl(urls, params);
            },

            /** Get url for saving checkout information */
            getUrlForSetCheckoutInformation: function (quote) {
                var params = (this.getCheckoutMethod() == 'guest') ? {cartId: quote.getQuoteId()} : {};
                var urls = {
                    'guest': '/guest-carts/:cartId/checkout-information',
                    'customer': '/carts/mine/checkout-information'
                };
                return this.getUrl(urls, params);
            },

            /** Get url for update item qty and remove item */
            getUrlForUpdatePaymentTotalInformation: function (quote) {
                var params = (this.getCheckoutMethod() == 'guest') ? {cartId: quote.getQuoteId()} : {};
                var urls = {
                    'guest': '/guest-carts/:cartId/payment-total-information',
                    'customer': '/carts/mine/payment-total-information'
                };
                return this.getUrl(urls, params);
            },
            getUrlForGiftMessageItemInformation: function (quote, itemId) {
                var params = (this.getCheckoutMethod() == 'guest') ? {cartId: quote.getQuoteId()} : {};
                var urls = {
                    'guest': '/guest-carts/:cartId/gift-message/' + itemId,
                    'customer': '/carts/mine/gift-message/' + itemId
                };
                return this.getUrl(urls, params);
            }
        }, resourceUrlManager);
    }
);
