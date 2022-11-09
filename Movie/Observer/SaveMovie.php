<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;

class SaveMovie implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $movie = $observer->getEvent()->getMovie();
        $movie->setRating(0);
        $movie->save();
        return $this;
    }
}
