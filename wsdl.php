<?php

// Define the location of the WSDL file
$wsdl = "http://localhost:8080/Test/serve.php";

// Create a new SOAP server object with the WSDL file
$server = new SoapServer($wsdl);    

// Register the "displayString" function with the server
$server->addFunction('displayString');

// Generate the WSDL file and output it
header("Content-Type: text/xml");
echo $server->getWSDL();

?>