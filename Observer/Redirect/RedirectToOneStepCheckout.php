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

namespace Aceextensions\OneStepCheckout\Observer\Redirect;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\UrlInterface;
use Aceextensions\OneStepCheckout\Helper\Data;

class RedirectToOneStepCheckout implements ObserverInterface
{
    /**
     * @var UrlInterface
     */
    protected $_url;

    /**
     * @var Data
     */
    protected $dataHelper;

    /**
     * RedirectToOneStepCheckout constructor.
     * @param UrlInterface $url
     * @param Data $dataHelper
     */
    public function __construct(
        UrlInterface $url,
        Data         $dataHelper
    )
    {
        $this->_url = $url;
        $this->dataHelper = $dataHelper;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        if ($this->dataHelper->isEnabled() && boolval(!$this->dataHelper->isEnabled())) {
            $observer->getRequest()->setParam('return_url', $this->_url->getUrl('onestepcheckout'));
        }
    }
}
