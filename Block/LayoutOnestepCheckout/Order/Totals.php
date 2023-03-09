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

namespace Aceextensions\OneStepCheckout\Block\LayoutOnestepCheckout\Order;

use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Template;

class Totals extends Template
{

    public function initTotals()
    {
        $totalsBlock = $this->getParentBlock();
        $source = $totalsBlock->getSource();
        if ($source && !empty($source->getGiftWrapAmount())) {
            $totalsBlock->addTotal(new DataObject([
                'code' => 'gift_wrap',
                'field' => 'onestepcheckout_gift_wrap_amount',
                'label' => __('Gift Wrap'),
                'value' => $source->getGiftWrapAmount(),
            ]));
        }
    }
}
