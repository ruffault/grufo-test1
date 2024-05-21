<?php

namespace MoneticoDemoWebKit\Examples\Response;

use MoneticoDemoWebKit\Monetico\HmacComputer;

abstract class PaymentResponseExample
{
    public abstract function getName();

    public abstract function getDescription();

    protected abstract function getResponseParametersWithoutMac();

    public function getResponseParameters()
    {
        $parameters = $this->getResponseParametersWithoutMac();
        $parameters["MAC"] = (new HmacComputer())->sealFields($parameters, CLE_MAC);
        return $parameters;
    }
}