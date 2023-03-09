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

namespace Aceextensions\OneStepCheckout\Plugin\Checkout;

use Magento\Customer\Api\AddressRepositoryInterface;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Quote\Api\Data\AddressInterface;
use Magento\Quote\Api\Data\EstimateAddressInterface;

class ShippingMethodManagement
{
    /**
     * Quote repository.
     *
     * @var \Magento\Quote\Api\CartRepositoryInterface
     */
    protected $quoteRepository;

    /**
     * Customer Address repository
     *
     * @var \Magento\Customer\Api\AddressRepositoryInterface
     */
    protected $addressRepository;

    /**
     * @param \Magento\Quote\Api\CartRepositoryInterface $quoteRepository
     * @param \Magento\Customer\Api\AddressRepositoryInterface $addressRepository
     */
    public function __construct(
        CartRepositoryInterface    $quoteRepository,
        AddressRepositoryInterface $addressRepository
    )
    {
        $this->quoteRepository = $quoteRepository;
        $this->addressRepository = $addressRepository;
    }

    /**
     * @param \Magento\Quote\Model\ShippingMethodManagement $subject
     * @param \Closure $proceed
     * @param $cartId
     * @param EstimateAddressInterface $address
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function aroundEstimateByAddress(
        \Magento\Quote\Model\ShippingMethodManagement $subject,
        \Closure                                      $proceed,
                                                      $cartId,
        EstimateAddressInterface                      $address
    )
    {
        $this->saveAddress($cartId, $address);

        return $proceed($cartId, $address);
    }

    /**
     * @param \Magento\Quote\Model\ShippingMethodManagement $subject
     * @param \Closure $proceed
     * @param $cartId
     * @param AddressInterface $address
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function aroundEstimateByExtendedAddress(
        \Magento\Quote\Model\ShippingMethodManagement $subject,
        \Closure                                      $proceed,
                                                      $cartId,
        AddressInterface                              $address
    )
    {
        $this->saveAddress($cartId, $address);

        return $proceed($cartId, $address);
    }

    /**
     * @param \Magento\Quote\Model\ShippingMethodManagement $subject
     * @param \Closure $proceed
     * @param $cartId
     * @param $addressId
     * @return mixed
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function aroundEstimateByAddressId(
        \Magento\Quote\Model\ShippingMethodManagement $subject,
        \Closure                                      $proceed,
                                                      $cartId,
                                                      $addressId
    )
    {
        $address = $this->addressRepository->getById($addressId);
        $this->saveAddress($cartId, $address);

        return $proceed($cartId, $addressId);
    }

    /**
     * @param $cartId
     * @param $address
     * @return $this
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    private function saveAddress($cartId, $address)
    {
        /** @var \Magento\Quote\Model\Quote $quote */
        $quote = $this->quoteRepository->getActive($cartId);

        if (!$quote->isVirtual()) {
            $addressData = [
                EstimateAddressInterface::KEY_COUNTRY_ID => $address->getCountryId(),
                EstimateAddressInterface::KEY_POSTCODE => $address->getPostcode(),
                EstimateAddressInterface::KEY_REGION_ID => $address->getRegionId(),
                EstimateAddressInterface::KEY_REGION => $address->getRegion()
            ];

            $shippingAddress = $quote->getShippingAddress();
            try {
                $shippingAddress->addData($addressData)
                    ->save();
                $this->quoteRepository->save($quote);
            } catch (\Exception $e) {
                return $this;
            }
        }

        return $this;
    }
}
