<link rel="stylesheet" href="estilos/bootstrap.min.css">

<?php
include("db.php");
$nombre = '';
$precio= '';
$descripcion = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM productos WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $nombre = $row['nombre'];
    $precio = $row['precio'];
    $descripcion = $row['descripcion'];
  }
}
if (isset($_POST['actualiza'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $precio= $_POST['precio'];
  $descripcion= $_POST['descripcion'];
  $query = "UPDATE productos set nombre = '$nombre', precio = '$precio', descripcion = '$descripcion' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: indexjs.php');
}
?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
        <p>
                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
                                        </p>
                                        <p>
                                            <input type="text" name="precio" class="form-control" placeholder="Precio" autofocus>
                                        </p>
                                        <p>
                                            <input type="text" style="width:270px;height:150px" name="descripcion" class="form-control" placeholder="Descripción" autofocus>
                                        </p>
                                        <p>

                                    </div>
        <div class="form-group">

        </div>
        <button class="btn-success" name="actualiza">
         Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>