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

/**
 * Interface for update item information
 * @api
 */
interface GuestCheckoutManagementInterface
{
    /**
     * @param string $cartId
     * @param int $itemId
     * @param int $itemQty
     * @return \Aceextensions\OneStepCheckout\Api\Data\DetailsInterface
     */
    public function updateItemQty($cartId, $itemId, $itemQty);

    /**
     * @param string $cartId
     * @return \Aceextensions\OneStepCheckout\Api\Data\DetailsInterface
     */
    public function getPaymentTotalInformation($cartId);

    /**
     * @param string $cartId
     * @param int $itemId
     * @return \Aceextensions\OneStepCheckout\Api\Data\DetailsInterface
     */
    public function removeItemById($cartId, $itemId);

    /**
     * @param string $cartId
     * @param bool $isUseGiftWrap
     * @return \Aceextensions\OneStepCheckout\Api\Data\DetailsInterface
     */
    public function updateGiftWrap($cartId, $isUseGiftWrap);

    /**
     * @param string $cartId
     * @param string $email
     * @return bool
     */
    public function saveEmailToQuote($cartId, $email);

    /**
     * @param string $cartId
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
     * Check if given email is associated with a customer account in given website.
     *
     * @param string $cartId
     * @param string $customerEmail
     * @param int $websiteId If not set, will use the current websiteId
     * @return bool
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function isEmailAvailable($cartId, $customerEmail, $websiteId = null);
}
