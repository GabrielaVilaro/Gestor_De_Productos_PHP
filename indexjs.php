<html>
    <?php include("db.php"); ?>
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="estilos/bootstrap.min.css">


</head>

<body>
    <!-- navegación -->
    <nav class="navbar navbar-light bg-light">

        <a href="/" class="navbar-brand"></a>

        Gestión de productos

    </nav>
    <main class="container p-2">
            <div class="row">

                <div class="col-md-4">

                    <?php if(isset ($_SESSION['message'])) {?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?=$_SESSION['message'] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <!--mensaje de alerta con bootstrap-->
                        <?php session_unset(); } ?>
                            <!--cierra el mesaje de alerta al refrescar la página-->
                    </main>
    <div class="container">
        <!-- programa-->

        <div id="app" class="row pt-5">

            <div  class="col-md-4">
                
                <!-- tarjeta -->

                <div class="card">
                    <div class="card-header"></div>

                    <h4> Agregar producto</h4>
                

                <div class="card-body">

                    <form action = "save.php" method ="POST" class="card-body">

                        <div class="form-group">
                            <input type="text" name="nombre" placeholder="Nombre del producto" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="number" step="0.01" id ="precio" name="precio" placeholder="Precio del producto" class="form-control">

                        </div>

                        <div class="form-group">
                                <input type="text" style="width:270px;height:150px" name="descripcion" placeholder="Descripción del producto" class="form-control">
    
                            </div>
                            
                            <input type="submit" value="Guardar" name = "save" class="btn btn-primary btn-block">


                    </form>
                </div>
                </div>

            </div>

            <div class="col-md-8">
                <div id="productos-lista"></div>

                <table class="table table-border">

<thead>
    <tr>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Descripción</th>
        <th>Acción</th>
    </tr>
</thead>
<tbody>

    <?php

$query = "SELECT *  FROM productos";
$result_usuario = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result_usuario)){ ?>
        <!--recorro mi tabla usuario-->
        <tr>
            <td>
                <?php echo $row['nombre']; ?>
            </td>
            <td>
                <?php echo $row['precio']; ?>
            </td>
            <td>
                <?php echo $row['descripcion']; ?>
            </td>
            <td>
                <a href="edit.php?id=<?php echo $row['id'] ?>">Editar</a> <p>
                <a href="delete.php?id=<?php echo $row['id'] ?>">Eliminar</a>
            </td>
        </tr>
        
        <?php } ?>

</tbody>

</table>

            </div>


        </div>
        

    </div>
</body>


</html>