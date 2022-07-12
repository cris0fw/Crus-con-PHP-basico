<?php 
        include("../conexionDB/conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "select * from tareas where idTareas = $id";
        $resultado = mysqli_query($conexion, $query);
        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_assoc($resultado);
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];
        }
    
    }
    
        if(isset($_POST['actualizando'])){
            $id = $_GET['id'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
        
            $query = "update tareas set titulo = '$titulo', descripcion = '$descripcion' where idTareas = $id";
            $resultado = mysqli_query($conexion, $query);

            if(!$resultado){
                die("Todo murio");
            }

            $_SESSION['message'] = "Tarea actualizada";
            $_SESSION['message-tipo'] = "success";

            header("location: ../index.php");
        }
    
?>

<?php include("../includes/head.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-4">
            <div class="card p-4">
                <form action="editar.php?id=<?php echo $_GET['id'] ?>" method="POST">
                    <div class="form-group mt-3">
                        <input type="text" placeholder="<?php echo $titulo ?>" class="form-control" name="titulo">
                    </div>
                    <div class="form-group mt-3">
                        <textarea name="descripcion" rows="3" class="form-control"
                            placeholder="<?php echo $descripcion ?>"></textarea>
                    </div>
                    <button type="submit" name="actualizando" class="btn btn-warning w-100 mt-3">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../includes/footer.php") ?>