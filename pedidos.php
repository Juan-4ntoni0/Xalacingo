<?php
        require("Pconexion.php");
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Xalacingo S.A de C.V.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Almacen</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Pedidos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link disabled" href="#" aria-disabled="true">Producción</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header">Pedidos</h5>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Estilo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Fecha</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php 
                            
                            $consulta ="SELECT * FROM pedido";
                            $res= $conexion->query($consulta);
                            while($fila = $res->fetch_array(MYSQLI_ASSOC)) :
                            ?>
                            <tr>
                            <td><?php echo $fila['id'];?></td>
                            <td><?php echo $fila['estilo'];?></td>
                            <td><?php echo $fila['descripcion'];?></td>
                            <td><?php echo $fila['fecha'];?></td>
                            <td><button class='btn btn-warning act' type='button'  data-toggle="modal"
                             data-target="#modalAgregarAvios" <?php $var=$fila['id'];?> >Ver</button>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header">Nuevo Pedido</h5>
                    <div class="card-body">
                        <form action="AgregarPedido.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Estilo</label>
                                    <input name="txtEstilo" class="form-control" type="text" />
                                </div>
                                <div class="col-md-6">
                                    <label>Marca</label>
                                    <input name="txtMarca" class="form-control" type="text" />  
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Descripción</label>
                                <input name="txtDescripcion" class="form-control" type="text" />
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Codigo</label>
                                    <input name="txtCodigo" type="text" class="form-control"  />
                                </div>
                                <div class="col-md-8">
                                    <label>Diseñador</label>
                                    <input type="text" class="form-control" name="txtDiseñador" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Cantidad</label>
                                    <input type="number" class="form-control" name="txtCantidad" />
                                </div>
                                <div class="col-md-7">
                                    <label>Fecha</label>
                                    <input type="date" class="form-control" name="txtFecha" />
                                </div>
                            </div><br>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-outline-success" >Añadir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modalAgregarAvios" data-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Avíos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo $var?>
                <form action="Aalmacen.php" method="post" name="form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Avío</label>
                                    <input name="Avio" required class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input name="Tamaño" required class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cantidad</label>
                                    <input name="Cantidad" required class="form-control" type="number" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input name="Color" required class="form-control" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btnActualizar" class="btn btn-primary">Insertar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>