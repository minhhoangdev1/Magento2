<?php

namespace Magenest\Movie\Model\Config\Source;
class DirectorData implements \Magento\Framework\Option\ArrayInterface
{
    protected $options;
    protected $directorFactory;

    public function __construct(\Magenest\Movie\Model\DirectorFactory $directorFactory
    )
    {
        $this->directorFactory = $directorFactory;
    }

    public function toOptionArray()
    {
        $directorModel = $this->directorFactory->create()->getCollection()->addFieldToSelect(array('director_id', 'name'));
        $options[] = array('label' => 'Please select', 'value' => '');
        if ($directorModel->getSize()) {
            foreach ($directorModel as $director) {
                $options[] = array(
                    'label' => ucfirst($director->getData('name')),
                    'value' => $director->getData('director_id')
                );
            }
        }
        return $options;
    }
}
