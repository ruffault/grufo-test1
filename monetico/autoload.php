<?php
    require "MoneticoConfig.php";
    require 'PaymentRequestDemo.class.php';
    require 'PaymentResponseDemo.class.php';
    require 'ResponseInterface.class.php';

    require 'Examples/Response/PaymentResponseExample.php';
    require 'Examples/Response/BasicPaymentResponseExample.php';
    require 'Examples/Response/SplitPaymentFirstInstalmentResponseExample.php';

    require 'Examples/IPaymentRequestExample.php';
    require 'Examples/BasicPaymentExample.php';
    require 'Examples/Bypass3DSecureChallengePaymentExample.php';
    require 'Examples/SplitPaymentExample.php';
    require 'Examples/ExpressPaymentOptionExample.php';
    require 'Examples/FullOrderContextExample.php';
    require 'Examples/Cofidis1EuroDirectRedirectionExample.php';
    require 'Examples/CofidisPreFillPaymentExample.php';

    require 'Monetico/HmacComputer.php';

    require 'Monetico/Collections/Currency.php';
    require 'Monetico/Collections/Language.php';
    require 'Monetico/Collections/PaymentProtocol.php';
    require 'Monetico/Collections/ThreeDSecureChallengeValue.php';

    require 'Monetico/Request/OrderContext.php';
    require 'Monetico/Request/OrderContextBilling.php';
    require 'Monetico/Request/OrderContextClient.php';
    require 'Monetico/Request/OrderContextShipping.php';
    require 'Monetico/Request/OrderContextShoppingCart.php';
    require 'Monetico/Request/OrderContextShoppingCartItem.php';
    require 'Monetico/Request/PaymentRequest.php';
    require 'Monetico/Request/SplitPaymentRequest.php';
    require 'Monetico/Request/CofidisPaymentInformations.php';
    require 'Monetico/Request/PreAuthorizedPayment.php';
?>