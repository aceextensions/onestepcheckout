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

namespace Aceextensions\OneStepCheckout\Plugin\Quote;

use Magento\Catalog\Model\Product;
use Magento\Framework\DataObject;
use Magento\Quote\Api\Data\CartItemInterface;
use Magento\Quote\Model\Quote\Item;


class Processor
{
    /**
     * @var \Magento\CatalogInventory\Api\StockStateInterface
     */
    protected $_stockState;

    /**
     * @param \Magento\CatalogInventory\Api\StockStateInterface $stockState
     */
    public function __construct(
        \Magento\CatalogInventory\Api\StockStateInterface $stockState
    )
    {
        $this->_stockState = $stockState;
    }

    /**
     * Set qty and custom price for quote item
     *
     * @param \Magento\Quote\Model\Quote\Item\Processor $subject
     * @param \Closure $proceed
     * @param Item $item
     * @param \Magento\Framework\DataObject $request
     * @param Product $candidate
     * @return void
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function aroundPrepare(
        \Magento\Quote\Model\Quote\Item\Processor $subject,
        \Closure                                  $proceed,
        Item                                      $item,
        DataObject                                $request,
        Product                                   $candidate
    )
    {
        if ($this->_stockState->getStockQty($candidate->getId()) == 0 ||
            $this->_stockState->getStockQty($candidate->getId()) == $candidate->getCartQty()) {
            /**
             * We specify qty after we know about parent (for stock)
             */
            if ($request->getResetCount() && !$candidate->getStickWithinParent() && $item->getId() == $request->getId()) {
                $item->setData(CartItemInterface::KEY_QTY, 0);
            }
            $item->setQty($candidate->getCartQty());

            $customPrice = $request->getCustomPrice();
            if (!empty($customPrice)) {
                $item->setCustomPrice($customPrice);
                $item->setOriginalCustomPrice($customPrice);
            }
        } else {
            $proceed($item, $request, $candidate);
        }
    }
}
