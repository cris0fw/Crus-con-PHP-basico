<?php 
function eliminar(){
    include("../conexionDB/conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "delete from tareas where idTareas = $id";

        $resultado = mysqli_query($conexion, $query);

        if(!$resultado){
            die("Esta re muerto");
        }

        $_SESSION['message'] = "Tarea eliminada correctamente";
        $_SESSION['message-tipo'] = "success";
        header("location: ../index.php");
    }
}

eliminar()
?>