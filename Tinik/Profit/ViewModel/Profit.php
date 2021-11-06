<?php
declare(strict_types=1);

namespace Tinik\Profit\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Profit implements ArgumentInterface
{

    protected $_registry;

    public function __construct(
        \Magento\Framework\Registry $registry
    )
    {
        $this->_registry = $registry;
    }


    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }

    /**
     * @return float
     */
    public function getProfit(): float
    {
        $currentProduct = $this->getCurrentProduct();
        return 100 - round(100 * $currentProduct->getSpecialPrice() / $currentProduct->getPrice());
    }
}
