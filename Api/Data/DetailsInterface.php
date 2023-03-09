<?php
/**
 * Aceextensions_OneStepCheckout
 *
 * @category    Checkout
 * @package     Aceextensions_OneStepCheckout
 * @author      Durga Shankar Gupta
 * @copyright   DreamWorkFactory (https://dreamworkfactory.com/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Aceextensions\OneStepCheckout\Api\Data;

interface DetailsInterface
{
    /**
     * Constants defined for keys of array, makes typos less likely
     */
    const REDIRECT_URL = 'redirect_url';
    const PAYMENT_METHODS = 'payment_methods';
    const TOTALS = 'totals';
    const SHIPPING_METHODS = 'shipping_methods';

    /**
     * @return \Magento\Quote\Api\Data\ShippingMethodInterface[]
     */
    public function getShippingMethods();

    /**
     * @param \Magento\Quote\Api\Data\PaymentMethodInterface[] $paymentMethods
     * @return $this
     */
    public function setPaymentMethods($paymentMethods);

    /**
     * @param \Magento\Quote\Api\Data\ShippingMethodInterface[] $shippingMethods
     * @return $this
     */
    public function setShippingMethods($shippingMethods);

    /**
     * @return \Magento\Quote\Api\Data\PaymentMethodInterface[]
     */
    public function getPaymentMethods();

    /**
     * @return \Magento\Quote\Api\Data\TotalsInterface
     */
    public function getTotals();

    /**
     * @return string
     */
    public function getRedirectUrl();

    /**
     * @param \Magento\Quote\Api\Data\TotalsInterface $totals
     * @return $this
     */
    public function setTotals($totals);

    /**
     * @param $url
     * @return $this
     */
    public function setRedirectUrl($url);
}
