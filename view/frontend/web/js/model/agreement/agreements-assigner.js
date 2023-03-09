/**
 * Aceextensions_OneStepCheckout
 *
 * @category    Checkout
 * @package     Aceextensions_OneStepCheckout
 * @author      Durga Shankar Gupta
 * @copyright   DreamWorkFactory (https://dreamworkfactory.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

define([
    'jquery'
], function ($) {
    'use strict';

    var agreementsConfig = window.checkoutConfig.checkoutAgreements;
    var show_toc = window.checkoutConfig.mageConfig.show_toc;
    var SHOW_IN_PAYMENT = '1';

    /** Override default place order action and add agreement_ids to request */
    return function (paymentData) {
        var agreementForm,
            agreementFormContainer,
            agreementData,
            agreementIds;

        if (!agreementsConfig.isEnabled) {
            return;
        }
        agreementFormContainer = (show_toc == SHOW_IN_PAYMENT) ? $('.payment-method._active') : $('#co-place-order-agreement');
        agreementForm = agreementFormContainer.find('div[data-role=checkout-agreements] input');

        agreementData = agreementForm.serializeArray();
        agreementIds = [];

        agreementData.forEach(function (item) {
            agreementIds.push(item.value);
        });

        if (paymentData['extension_attributes'] === undefined) {
            paymentData['extension_attributes'] = {};
        }

        paymentData['extension_attributes']['agreement_ids'] = agreementIds;
    };
});
