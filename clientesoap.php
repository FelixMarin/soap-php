<?php

try {
    $cliente = new SoapClient('plantilla.wsdl');

    //echo $cliente->tituloLibro('1234567890123');
   // echo $cliente->librosAutor('Miguel de Cervantes');

   $restl = $cliente->__soapCall("tituloLibro", ["1234567890123" ] );
   $reslA = $cliente->__soapCall("librosAutor", ["Miguel de Cervantes" ] );

} catch ( SOAPFault $e ) {
    echo $e->getMessage();
}

?>