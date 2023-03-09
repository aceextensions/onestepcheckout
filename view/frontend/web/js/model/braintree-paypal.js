/**
 * Aceextensions_OneStepCheckout
 *
 * @category    Checkout
 * @package     Aceextensions_OneStepCheckout
 * @author      Durga Shankar Gupta
 * @copyright   DreamWorkFactory (https://dreamworkfactory.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

define(['ko'], function (ko) {
    'use strict';
    return {
        isReviewRequired: ko.observable(false),
        customerEmail: ko.observable(null),
        active: ko.observable(false)
    }
});
