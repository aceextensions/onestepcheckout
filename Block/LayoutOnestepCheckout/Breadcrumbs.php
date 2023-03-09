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

use Magento\Catalog\Helper\Data;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\Store;

class Breadcrumbs extends \Magento\Framework\View\Element\Template
{
	/**
     * Catalog data
     *
     * @var Data
     */
    protected $_catalogData = null;

    /**
     * @param Context $context
     * @param Data $catalogData
     * @param array $data
     */
    public function __construct(Context $context, Data $catalogData, array $data = [])
    {
        $this->_catalogData = $catalogData;
        parent::__construct($context, $data);
    }
	
    public function getCrumbs()
	{
		$crumbs = [
			[
				'label' => __('Home'),
				'title' => __('Go to Home Page'),
				'link' => $this->_storeManager->getStore()->getBaseUrl()
			],
			[
				'label' => __('Checkout'),
				'title' => __('Checkout Page'),
				'link' => ''
			]
		];
		return $crumbs;
	}
}
