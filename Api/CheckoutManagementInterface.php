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

namespace Aceextensions\OneStepCheckout\Api;

interface CheckoutManagementInterface
{
    /**
     * @param int $cartId
     * @param int $itemId
     * @param int $itemQty
     * @return \Aceextensions\OneStepCheckout\Api\Data\DetailsInterface
     */
    public function updateItemQty($cartId, $itemId, $itemQty);


    /**
     * @param int $cartId
     * @param \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
     * @param string[] $customerAttributes
     * @param string[] $additionInformation
     * @return bool
     */
    public function saveCheckoutInformation(
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation,
        $customerAttributes = [],
        $additionInformation = []
    );

    /**
     * @param int $cartId
     * @return \Aceextensions\OneStepCheckout\Api\Data\DetailsInterface
     */
    public function getPaymentTotalInformation($cartId);

    /**
     * @param int $cartId
     * @param int $itemId
     * @return \Aceextensions\OneStepCheckout\Api\Data\DetailsInterface
     */

    public function removeItemById($cartId, $itemId);

    /**
     * @param int $cartId
     * @param bool $isUseGiftWrap
     * @return \Aceextensions\OneStepCheckout\Api\Data\DetailsInterface
     */
    public function updateGiftWrap($cartId, $isUseGiftWrap);
}
