<?php

namespace Magenest\UiKnockoutJs\Block\Adminhtml\Config;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;

class BackgroundColor extends AbstractFieldArray
{
    /**
     * @var Templete
     */

    private $colorRenderer;

    /**
     * Prepare rendering the new field by adding all the needed columns
     */
    protected function _prepareToRender()
    {
        $this->addColumn(
            'name_color',
            [
                'label' => __('Color'),
                'id' => 'name_color',
                'class' => 'required-entry',
            ]
        );
        $this->addColumn(
            'background_color',
            [
                'label' => __('Select background color'),
                'class' => 'required-entry',
                'renderer' => $this->getColorRenderer(),
            ]
        );
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Row');
    }

    protected function _prepareArrayRow(DataObject $row): void
    {
        $options = [];
        $templete = $row->getTemplete();
        if ($templete !== null) {
            $options['option_' . $this->getTempleteRenderer()->calcOptionHash($templete)] = 'selected="selected"';
        }
        $row->setData('option_extra_attrs', $options);
    }

    private function getColorRenderer()
    {
        if (!$this->colorRenderer) {
            $this->colorRenderer = $this->getLayout()->createBlock(
                \Magenest\UiKnockoutJs\Block\Adminhtml\Config\ColorRenderer::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->colorRenderer;
    }
}
