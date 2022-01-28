<?php

namespace Nourelhadi\CmiPayment;

use Nourelhadi\CmiPayment\Resources\Response\ResponsePaymentInterface;

interface CmiPaymentInterface
{
    public function send(): ResponsePaymentInterface;
}