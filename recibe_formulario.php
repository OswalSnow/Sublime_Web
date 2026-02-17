<?php
    class Contacto{
        public $nombre;
        public $email;
        public $mensaje;

        public function __construct($nombre, $email, $mensaje){
            $this->nombre = $nombre;
            $this->email = $email;
            $this->mensaje = $mensaje;
        }

        public function Imprimir(){
            echo "<div style='border: 2px solid #4CAF50; padding: 20px; margin: 20px;'>";
            echo "<h3> Datos del Formulario </h3>";
            echo "<p>Nombre; " . htmlspecialchars($this->nombre) . "</p>";
            echo "<p>Email: " . htmlspecialchars($this->email) . "</p>";
            echo "<p>Mensaje " . htmlspecialchars($this->mensaje) . "</p>";
            echo "</div>";
        }
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['mensaje'])){
            
            if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['mensaje'])){

                $contacto = new Contacto(
                    $_POST['nombre'],
                    $_POST['email'],
                    $_POST['mensaje']
                );

                echo "<h2> DATOS DEL FORMULARIO </h2>";
                $contacto->Imprimir();

            } else { echo "<h2> FALTAN DATOS DE SER LLENADOS </h2>"; }
            
        } else { echo "<h2> TODOS LOS DATOS DEBEN SER LLENADOS </h2>"; }

    } else { echo "<h2> NO SE RECIBIERON DATOS </h2>"; }
?>