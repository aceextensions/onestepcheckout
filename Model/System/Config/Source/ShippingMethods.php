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

namespace Aceextensions\OneStepCheckout\Model\System\Config\Source;

use Magento\Framework\App\Config\ScopeConfigInterface as StoreConfig;
use Magento\Shipping\Model\Config as CarrierConfig;

class ShippingMethods
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_scopeConfig;

    /**
     * @var \Magento\Shipping\Model\CarrierFactory
     */
    protected $_carrierConfig;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Shipping\Model\Config $carrierConfig
     * @param array $data
     */
    public function __construct(
        StoreConfig   $scopeConfig,
        CarrierConfig $carrierConfig,
        array         $data = []
    )
    {
        $this->_scopeConfig = $scopeConfig;
        $this->_carrierConfig = $carrierConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        $shippingMethodsOptionArray = [
            [
                'label' => __('-- Please select --'),
                'value' => '',
            ],
        ];
        $carrierMethodsList = $this->_carrierConfig->getActiveCarriers();
        ksort($carrierMethodsList);
        foreach ($carrierMethodsList as $carrierMethodCode => $carrierModel) {
            foreach ($carrierModel->getAllowedMethods() as $shippingMethodCode => $shippingMethodTitle) {
                $shippingMethodsOptionArray[] = [
                    'label' => $this->_getShippingMethodTitle($carrierMethodCode) . ' - ' . $shippingMethodTitle,
                    'value' => $carrierMethodCode . '_' . $shippingMethodCode,
                ];
            }
        }

        return $shippingMethodsOptionArray;
    }

    /**
     * @param $shippingMethodCode
     * @return mixed
     */
    protected function _getShippingMethodTitle($shippingMethodCode)
    {
        if (!$shippingMethodTitle = $this->_scopeConfig->getValue("carriers/$shippingMethodCode/title")) {
            $shippingMethodTitle = $shippingMethodCode;
        }

        return $shippingMethodTitle;
    }
}
