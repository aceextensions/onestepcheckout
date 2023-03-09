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

namespace Aceextensions\OneStepCheckout\Plugin;

use Magento\Framework\App\RequestInterface;
use Aceextensions\OneStepCheckout\Helper\Data;

class CheckoutLink
{
    /**
     * @var RequestInterface
     */
    protected $_request;

    /**
     * @var Data
     */
    protected $dataHelper;

    /**
     * Link constructor.
     * @param RequestInterface $httpRequest
     * @param Data $dataHelper
     */
    public function __construct(
        RequestInterface $httpRequest,
        Data             $dataHelper
    )
    {
        $this->_request = $httpRequest;
        $this->dataHelper = $dataHelper;
    }

    /**
     * @param \Magento\Framework\Url $subject
     * @param $routePath
     * @param $routeParams
     * @return array|null
     */
    public function beforeGetUrl(\Magento\Framework\Url $subject, $routePath = null, $routeParams = null)
    {
        if ($this->dataHelper->isEnabled() && $routePath == 'checkout' && $this->_request->getFullActionName() != 'checkout_index_index') {
            return ['onestepcheckout', $routeParams];
        }

        return null;
    }
}
