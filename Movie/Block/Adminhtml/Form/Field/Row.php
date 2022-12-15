<?php

namespace Magenest\Movie\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;
use Magenest\Movie\Block\Adminhtml\Form\Field\DynamicColumn;
use Magenest\Movie\Block\Adminhtml\Form\Field\CustomerGpColumn;

class Row extends AbstractFieldArray
{
    /**
     * @var Templete
     */
    private $templeteRenderer;

    private $customerGpRenderer;

    /**
     * Prepare rendering the new field by adding all the needed columns
     */
    protected function _prepareToRender()
    {
        // For Customer Groups
        $this->addColumn(
            'customer_gp',
            [
                'label' => __('Customer Group'),
                'renderer' => $this->getCustomerGpRenderer(),
                //            'extra_params' => 'multiple="multiple"'
            ]
        );

        $this->addColumn(
            'select_date',
            [
                'label' => __('Time'),
                'id' => 'select_date',
                'class' => 'daterecuring',
            ]
        );
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Row');
    }

    protected function _prepareArrayRow(DataObject $row): void
    {
        $options = [];
        $customerGps = $row->getCustomerGp();
        $templete = $row->getTemplete();
        if ($templete !== null) {
            $options['option_' . $this->getTempleteRenderer()->calcOptionHash($templete)] = 'selected="selected"';
        }

        if (count($customerGps) > 0) {
            foreach ($customerGps as $gp) {
                $options['option_' . $this->getCustomerGpRenderer()->calcOptionHash($gp)] = 'selected="selected"';
            }
        }

        $row->setData('option_extra_attrs', $options);
    }

    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $html = parent::_getElementHtml($element);

        $script = '<script type="text/javascript">
                        require(["jquery", "jquery/ui", "mage/calendar"], function ($) {
                            $(function(){
                                function bindTimePicker() {
                                    setTimeout(function() {
                                        $(".daterecuring").timepicker( { timeFormat: "hh:mm:ss"} );
                                    }, 50);
                                }
                                bindTimePicker();
                                $("button.action-add").on("click", function(e) {
                                    bindTimePicker();
                                });
                            });
                        });
                    </script>';
        $html .= $script;
        return $html;
    }

    private function getCustomerGpRenderer()
    {
        if (!$this->customerGpRenderer) {
            $this->customerGpRenderer = $this->getLayout()->createBlock(
                CustomerGpColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->customerGpRenderer;
    }
}
