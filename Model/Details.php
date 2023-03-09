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

namespace Aceextensions\OneStepCheckout\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Aceextensions\OneStepCheckout\Api\Data\DetailsInterface;

class Details extends AbstractExtensibleModel implements DetailsInterface
{

    public function getShippingMethods()
    {
        return $this->getData(self::SHIPPING_METHODS);
    }


    public function setShippingMethods($shippingMethods)
    {
        return $this->setData(self::SHIPPING_METHODS, $shippingMethods);
    }


    public function getPaymentMethods()
    {
        return $this->getData(self::PAYMENT_METHODS);
    }


    public function setPaymentMethods($paymentMethods)
    {
        return $this->setData(self::PAYMENT_METHODS, $paymentMethods);
    }

    public function getTotals()
    {
        return $this->getData(self::TOTALS);
    }


    public function setTotals($totals)
    {
        return $this->setData(self::TOTALS, $totals);
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->getData(self::REDIRECT_URL);
    }

    /**
     * @param $url
     * @return $this
     */
    public function setRedirectUrl($url)
    {
        return $this->setData(self::REDIRECT_URL, $url);
    }
}
