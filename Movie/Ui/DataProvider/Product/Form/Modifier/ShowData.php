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
use function PHPUnit\Framework\isEmpty;

class ShowData extends AbstractModifier
{
    private $locator;
    private $courseFactory;
    public function __construct(
        LocatorInterface $locator,
        \Magenest\Movie\Model\ResourceModel\Course\CollectionFactory $courseFactory
    ) {
        $this->locator = $locator;
        $this->courseFactory=$courseFactory;
    }
    public function modifyData(array $data)
    {
        $product = $this->locator->getProduct();
        $productId = $product->getId();
        $collection = $this->courseFactory->create();
        $dataCoures = $collection->addFieldToFilter('entity_id',$productId);
        if(count($dataCoures->getData())==0){
            $data = array_replace_recursive(
                $data, [
                $productId => [
                    'magenest' => [
                        'myCheckbox' => false
                    ]
                ]
            ]);
        }else{
            $data = array_replace_recursive(
                $data, [
                $productId => [
                    'magenest' => [
                        'myCheckbox' => true
                    ]
                ]
            ]);
        }
        return $data;
    }
    public function modifyMeta(array $meta)
    {
        return $meta;
    }

}
