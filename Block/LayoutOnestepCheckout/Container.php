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

namespace Aceextensions\OneStepCheckout\Block\LayoutOnestepCheckout;

use Magento\Framework\View\Element\Template;
use Aceextensions\OneStepCheckout\Helper\Data;

class Container extends Template
{
    /**
     * @var Data
     */
    protected $dataHelper;

    /**
     * Container constructor.
     * @param Template\Context $context
     * @param Data $dataHelper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Data             $dataHelper,
        array            $data = []
    ) {
        $this->dataHelper = $dataHelper;

        parent::__construct($context, $data);
    }

    /**
     * @return mixed
     */
    public function getCheckoutDescription()
    {
        return $this->dataHelper->getConfigGeneral('description');
    }

    public function getCheckoutTitle()
    {
        return $this->dataHelper->getConfigGeneral('title');
    }
}
