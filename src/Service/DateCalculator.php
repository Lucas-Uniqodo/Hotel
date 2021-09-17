<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class DateCalculator
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function yearsDifference($startYear)
    {
        $currentYear = date('Y');
        return $currentYear - $startYear;
    }
}




?>