<?php 
function insertarDatos(){
    include("../conexionDB/conexion.php");
    if(isset($_POST['insertando'])){
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $query = "insert into tareas(titulo, descripcion) values ('$titulo','$descripcion')";
        $resultado = mysqli_query($conexion, $query);
            if(!$resultado){
                die("Murio todo");
            }
        // Que me redireccione a la pagina principal
         $_SESSION['message'] = "Tarea guardada";
         $_SESSION['message-tipo'] = "success" ;
     header("location: ../index.php");
    }
}

insertarDatos()
?>