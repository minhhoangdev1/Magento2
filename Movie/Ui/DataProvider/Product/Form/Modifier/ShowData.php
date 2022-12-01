<?php
namespace Magenest\Movie\Ui\DataProvider\Product\Form\Modifier;
use Magento\Catalog\Model\Locator\LocatorInterface;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Ui\Component\Form\Fieldset;
use Magento\Ui\Component\Form\Field;
use Magento\Ui\Component\Form\Element\Input;
use Magento\Ui\Component\DynamicRows;
use Magento\Ui\Component\Container;
use Magento\Ui\Component\Form\Element\ActionDelete;
use Magento\Ui\Component\Form\Element\Select;
use Magento\Ui\Component\Form\Element\DataType\Text;
class NewField extends AbstractModifier
{
    private $locator;
    public function __construct(
        LocatorInterface $locator
    ) {
        $this->locator = $locator;
    }
    public function modifyData(array $data)
    {
        $product = $this->locator->getProduct();
        $productId = $product->getId();
        $data = array_replace_recursive(
            $data, [
            $productId => [
                'magenest' => [
                    'myCheckbox' => true,
                    'from_date' => '21/11/2022',
                    'to_date' => '21/11/2022'
                ]
            ]
        ]);
        return $data;
    }
    public function modifyMeta(array $meta)
    {
        return $meta;
    }

}
