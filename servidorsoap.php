<?php
include './DbController.php';

ini_set("soap.wsdl_cache_enabled","0");
$server = new SoapServer('plantilla.wsdl');

try {
    function tituloLibro($isbn) {
        $resultado = '';
        $msqliStmt = new DbController();
        $res = $msqliStmt->select('SELECT lib_titulo FROM dwes06.libros where lib_isbn' . $isbn);
        $resultado = '';
        foreach ($res as $libro){
            list($lib) = $libro;
            $resultado .= $lib;
        }
        $msqliStmt->closeConnection();
        return $resultado;
    }

    function librosAutor($autor) {
        $resultado = '';
        $msqliStmt = new DbController();
        $res = $msqliStmt->select('SELECT lib_titulo FROM dwes06.libros where lib_autor' . $autor);
        $resultado = '';
        foreach ($res as $libro){
            list($lib_titulo) = $libro;
            $resultado .= $lib_titulo . ',';
        }
        $msqliStmt->closeConnection();
        return $resultado;
    }

    $server->addFunction('tituloLibro');
    $server->addFunction('librosAutor');
    $server->handle();
}
catch(SoapFault $e){
    var_dump($e);
}
?>