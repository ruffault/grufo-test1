This project contains examples of how to call the Monetico payment page and how to handle the response provided by Monetico
through the response interface.

The "Examples" folder contains classes showing how to call the payment page in different scenarios.
Feel free to edit these examples by using the PaymentRequest object and look how the generated HTML form will include your changes.
The "Response" sub folders contains examples of call from the Monetico platform to your response interface.

The "Monetico" folder contains an example of implementation of the payment page interface. It includes classes representing
parameters that can be provided to the Monetico platform, handle most of the formatting and compute the seal (MAC) dynamically.

The "ResponseInterface.php" page is an example of implementation of the response interface.

To see these examples in action, start the website and browse "PaymentRequestDemo.php" and "PaymentResponseDemo.php" pages.

Configuration of your EPT number, MAC key, site code, and so on is set in the MoneticoConfig.php file.