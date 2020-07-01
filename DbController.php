<?php

class DbController {

    private $conn;

    function __construct() {
        $this->conn = mysqli_connect("localhost", "felix", "0000");
    }

    function select($query) {

        // Check connection
        if($this->conn === false){
            die("ERROR: No se puede conectar " . mysqli_connect_error());
        }

        if (!mysqli_select_db($this->conn, "examen"))
            die("No se puede conectar: " . mysqli_error());
        //Si la consulta falla se muestra el mensaje de error

        $resultado = null;
        $result = mysqli_query($this->conn,$query)
        or die ("Problemas al insertar".mysqli_error($this->conn));

        if (!$result)
            die("Error: " . mysqli_error());


        if(mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
                $resultado[] = $row;
            }
        }

        return $resultado;
    }

    function sentncia($stmt) {
        // Check connection
        if($this->conn === false){
            die("ERROR: No se puede conectar " . mysqli_connect_error());
        }

        if (!mysqli_select_db($this->conn, "examen"))
            die("No se puede conectar: " . mysqli_error());

        if(mysqli_query($this->conn, $stmt)){
            $resultado = 1;
        } else{
            $resultado = 0;
        }

        return $resultado;
    }

    function closeConnection() {
        if($this->conn !== null) {
            mysqli_close($this->conn);
        }
    }
}
?>