<?php
  include("conexionDB/conexion.php")
?>

<?php include("includes/head.php") ?>

<body>
    <?php include("includes/navbar.php") ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-4">
                <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?php echo $_SESSION['message-tipo'] ?> alert-dismissible fade show"
                    role="alert">
                    <?php echo $_SESSION['message']  ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- destruyo la session -->
                <?php session_unset(); } ?>
                <div class="card p-4">
                    <!-- Le mando a insertar.php para que me inserte los datos -->
                    <form action="crudFunciones/insertar.php" method="POST">
                        <div class="form-group mt-3">
                            <input type="text" placeholder="Titulo" class="form-control" name="titulo">
                        </div>
                        <div class="form-group mt-3">
                            <textarea name="descripcion" rows="3" class="form-control"
                                placeholder="Descripcion"></textarea>
                        </div>
                        <button type="submit" name="insertando" class="btn btn-primary w-100 mt-3">Enviar</button>
                    </form>
                </div>
            </div>
            <div class="col-8">
                <!-- Voy a mostrar mis datos -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 22%;">Titulo</th>
                            <th style="width: 22%;">Descripcion</th>
                            <th>Creacion</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php 
                      $query = "select * from tareas";

                      $resultado = mysqli_query($conexion, $query);

                      while($row = mysqli_fetch_assoc($resultado)){?>
                          <tr>
                            <td><?php echo $row['idTareas'] ?></td>
                            <td><?php echo $row['titulo'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['creacion'] ?></td>
                            <td><a href="crudFunciones/editar.php?id=<?php echo $row['idTareas'] ?>" class="btn btn-warning">Editar</a></td>
                            <td><a href="crudFunciones/eliminar.php?id=<?php echo $row['idTareas'] ?>" class="btn btn-danger">Eliminar</a></td>
                        </tr> 
                   <?php  } ?>
                    
                    </tbody>
                </table>


            </div>
        </div>

</body>
<?php include("includes/footer.php") ?>