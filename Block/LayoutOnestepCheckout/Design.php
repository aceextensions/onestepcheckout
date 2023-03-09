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

use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\View\Design\Theme\ThemeProviderInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Aceextensions\OneStepCheckout\Helper\Data;

class Design extends Template
{
    /**
     * @var Data
     */
    protected $dataHelper;

    /**
     * @var ThemeProviderInterface
     */
    protected $_themeProviderInterface;

    /**
     * @type \Magento\Checkout\Model\Session
     */
    private $checkoutSession;

    /**
     * Design constructor.
     * @param Context $context
     * @param Data $dataHelper
     * @param ThemeProviderInterface $themeProviderInterface
     * @param CheckoutSession $checkoutSession
     * @param array $data
     */
    public function __construct(
        Context                $context,
        Data                   $dataHelper,
        ThemeProviderInterface $themeProviderInterface,
        CheckoutSession        $checkoutSession,
        array                  $data = []
    ) {
        parent::__construct($context, $data);

        $this->dataHelper = $dataHelper;
        $this->_themeProviderInterface = $themeProviderInterface;
        $this->checkoutSession = $checkoutSession;
    }

    /**
     * @return bool
     */
    public function isEnableGoogleApi()
    {
        return $this->getHelperConfig()->getAutoDetectedAddress() == 'google';
    }

    public function getHelperConfig()
    {
        return $this->dataHelper;
    }

    /**
     * @return mixed
     */
    public function getGoogleApiKey()
    {
        return $this->getHelperConfig()->getGoogleApiKey();
    }

    /**
     * @return array
     */
    public function getDesignConfiguration()
    {
        return $this->getHelperConfig()->getDesignConfig();
    }

    /**
     * @return string
     */
    public function getCurrentTheme()
    {
        return $this->_themeProviderInterface->getThemeById($this->getHelperConfig()->getCurrentThemeId())->getCode();
    }

    /**
     * @return bool
     */
    public function isVirtual()
    {
        return $this->checkoutSession->getQuote()->isVirtual();
    }
}
