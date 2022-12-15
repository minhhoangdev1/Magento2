<?php

namespace Magenest\Movie\Model;
class TransportBuilder extends \Magento\Framework\Mail\Template\TransportBuilder
{
    public function getMessage()
    {
        return $this->message;
    }

    //create attachment items for email based on parameters
    public function createAttachment($params, $transport = false)
    {
        $type = isset($params['cat']) ? $params['cat'] : \Zend_Mime::TYPE_OCTETSTREAM;
        if ($transport === false) {
            if ($type == 'pdf') {
                $this->message->createAttachment(
                    $params['body'],
                    'application/pdf',
                    \Zend_Mime::DISPOSITION_ATTACHMENT,
                    \Zend_Mime::ENCODING_BASE64,
                    $params['name']
                );
            } elseif ($type == 'png') {
                $this->message->createAttachment(
                    $params['body'],
                    'image/png',
                    \Zend_Mime::DISPOSITION_ATTACHMENT,
                    \Zend_Mime::ENCODING_BASE64,
                    $params['name']
                );
            } else {
                $encoding =
                    isset($params['encoding']) ? $params['encoding'] : \Zend_Mime::ENCODING_BASE64;
                $this->message->createAttachment(
                    $params['body'],
                    $type,
                    \Zend_Mime::DISPOSITION_ATTACHMENT,
                    $encoding,
                    $params['name']
                );
            }
        } else {
            $this->addAttachment($params, $transport);
        }
        return $this;
    }

    public function addAttachment($params, $transport)
    {
        $zendPart = $this->createZendMimePart($params);
        $parts = $transport->getMessage()->getBody()->addPart($zendPart);
        $transport->getMessage()->setBody($parts);
    }

    protected function createZendMimePart($params)
    {
        if (class_exists('Zend\Mime\Mime') && class_exists('Zend\Mime\Part')) {
            $type = isset($params['type']) ? $params['type'] : \Zend\Mime\Mime::TYPE_OCTETSTREAM;
            $part = new \Zend\Mime\Part(@$params['body']);
            $part->type = $type;
            $part->filename = @$params['name'];
            $part->disposition = \Zend\Mime\Mime::DISPOSITION_ATTACHMENT;
            $part->encoding = \Zend\Mime\Mime::ENCODING_BASE64;
            return $part;
        } else {
            throw new \Exception("Missing Zend Framework Source");
        }
    }

    public function reset()
    {
        return parent::reset();
    }

//    public function sendMail()
//    {
//        //define variables for the email generate email template with template file and templates variables
//        $template = 'abandonedcart_item1';
//        $recipient_address = '[recipient email]';
//        $recipient_name = '[recipient name]';
//	    $from_address = '[‘Name’ => [sender name], ‘Email’ => [sender email]]';
//        //an array with variables, format is key = variable name, value = variable value
//        $vars = [];
//        //several variables in email template, i.e. storeName are generated based on store Id
//        $storeId = [store Id];
//
//        $this->_inlineTranslation->suspend();
//        $version = $this->_helperData->getVersionMagento();
//        if (version_compare($version, '2.2.0') < 0) {
//            //create email object for Magento 2.1.x
//            $this->_transportBuilder->setTemplateIdentifier(
//                $template
//            )->setTemplateOptions(
//                [
//                    'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
//                    'store' => $storeId,
//                ]
//            )->setTemplateVars(
//                $vars
//            )->addTo(
//                $recipient_address,
//                $recipient_name
//            );
//        } //create email template for Magento 2.2.x and 2.3.x
//        else {
//            $this->_transportBuilder->setTemplateIdentifier(
//                $template
//            )->setTemplateOptions(
//                [
//                    'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
//                    'store' => $storeId,
//                ]
//            )->setTemplateVars(
//                $vars
//            )->setFrom(
//                $from_address
//            )->addTo(
//                $recipient_address,
//                $recipient_name
//            );
//        }
//
//        //add bcc email address
//        $bccMail = '[email address]';
//        $this->_transportBuilder->addBcc($bccMail);
//
//        //add attachments to email object
//        if ($attachments) {
//        //check version of Zend Framework in use based on the existence of createAttachment function in Magento 2’s default transportBuiler
//            if (method_exists($this->_transportBuilder->getMessage(), 'createAttachment')) {
//                foreach ($attachments as $attachment) {
//                    if ($attachment) {
//                        $this->_transportBuilder->createAttachment($attachment);
//                    }
//                }
//                $transport = $this->_transportBuilder->getTransport();
//            } else {
//                $transport = $this->_transportBuilder->getTransport();
//                foreach ($attachments as $attachment) {
//                    if ($attachment) {
//                        $this->_transportBuilder->createAttachment($attachment, $transport);
//                    }
//                }
//            }
//        }
//
//        //create the transport
//        if (!isset($transport)) {
//            $transport = $this->_transportBuilder->getTransport();
//        }
//
//        //send the email
//        try {
//            $transport->sendMessage();
//            $this->_inlineTranslation->resume();
//        } catch (\Exception $exception) {
//            //log failed email send operation
//            $this->_logger->critical($exception->getMessage());
//        }
//    }
}
