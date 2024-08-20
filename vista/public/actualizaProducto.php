<?php
include "../../modelo/BD/config.php";
include "../../modelo/BD/dataBase.php";

$id =$_GET['id_producto'];
$dbname=new DataBase();
$query="SELECT * FROM tbproducto WHERE id_producto=$id";
$getData=$dbname->select($query)->fetch_assoc();

if(isset($_POST['submit'])){
  $nombre =mysqli_real_escape_string($dbname->link, $_POST['nombre']);
  $cantidad =mysqli_real_escape_string($dbname->link, $_POST['cantidad']); 
  $precio =mysqli_real_escape_string($dbname->link, $_POST['precio']);
  $id_categoria =mysqli_real_escape_string($dbname->link, $_POST['id_categoria']);
  $id_proveedor =mysqli_real_escape_string($dbname->link, $_POST['id_proveedor']);

  if( $nombre==''|| $cantidad==''|| $precio=='' || $id_categoria==''|| $id_proveedor==''){
    header('Location:registrar.php?msg='.urlencode('Debe llenar los campos'));

  } else{

    $query ="UPDATE tbproducto

              SET 
                  nombre ='$nombre',
                  cantidad ='$cantidad',
                  precio ='$precio',
                  id_categoria ='$id_categoria',
                  id_proveedor ='$id_proveedor'

                  WHERE id_producto=$id";

   $update=$dbname->updateUsuario($query);
  
}
  /*==============END ACTUALIZAR LOS DATOS===============*/
}
 /*============ELIMINAR DATOS==================*/
 if(isset($_POST['delete'])){
 	$query="DELETE FROM tbproducto WHERE id_producto=$id";
 	$delete_Data = $dbname->deleteUsuario($query);
 }
 /*==============END ELIMINAR LOS DATOS============*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="curso de php Segundo año">
  <meta name="keywords" content="registro">
  <title>Formulario para actualizar</title>
<  <link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">

</head>
<body oncopy="return false" oncopaste="return false">
 <!--Estructura de la pagina-->
 <section class="container bg-light mt-5 p-4 rounded fade-in">
  <!--Columnas para Bootstrap-->
  <div class="row bg-ligt rouded p-3">
    <!--NAMBAR-->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid bg-primary">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar nav">
            <li class="nav-icon "><a class="nav-link active text-light" aria-current="page" href="../../index.php">SALIR</a></li>
            <li class="nav-icon "><a class="nav-link  text-light"href="resultado.php">MOSTRAR LISTA</a></li>
          </ul>
        </div>
      </div>
    </nav>
<!--FIN NAVBAR-->

<!--COLUMNA DEL FORMULARIO REGISTRO DATOS-->
<div class="col-sm-12 col-md-12 col-lg-6">
  <h2 class="text-danger fw-semibold text-uppercase text-center">FORMULARIO ACTUALIZACION DE DATOS</h2>
  <!--FORMULARIO DE REGISTRO-->
  <form action=" actualizaPersonal.php?id_producto=<?php echo $id;?>" class="row g-3 p-3 rounded needs-validation" novalidate method="POST" enctype="multipart/form-data"> 
    <?php
    if(isset($_GET['msg'])){/*obtiene el mensaje que manda el checklogin a la url*/
      echo"<center class='alert alert-danger fw-bold fst-italic'>" .$_GET['msg'] ."</center>";
    }
    ?>

  <div class="mb-3">
  <label class="mb-1 lead fs-6">Nombre del Producto</label>
      <input type="text" class="form-control text-primary text-opacity-75 fw-semibold" id="nombre" name="nombre" required value="<?php echo $getData['nombre'];?>">
    </div>
  <div class="mb-3">
  <label class="mb-1 lead fs-6">Cantidad</label>
  <input type="text" class="form-control text-primary text-opacity-75 fw-semibold" id="cantidad" name="cantidad" required value="<?php echo $getData['cantidad'];?>">
    </div>
  <div class="mb-3">
  <label class="mb-1 lead fs-6">Precio</label>
  <input type="text" class="form-control text-primary text-opacity-75 fw-semibold" id="precio" name="precio" required value="<?php echo $getData['precio'];?>">
    </div>
    <div class="mb-3 mt-0">
      <label class="mb-1 lead fs-6">Seleccionar la Categoria</label>
       <select class="form-select has-validation text-primary text-opacity-75 fw-semibold" aria-label="default select example" id="id_categoria" name="id_categoria" required>
              <option selected value="<?php echo $getData['id_categoria'];?>"><?php
              switch ($getData['id_categoria']) {
                case 1:
                  echo"Dulces";
                  break;
                  case 2:
                  echo"Fideos";
                  break; 
                  case 3:
                  echo"Ola";
                  break;
                default:
                  echo 'No existe dato';
                  break;
              }
            ?></option>
            <option value="1" class="lead">Dulces</option>
            <option value="2" class="lead">Fideos</option>
            <option value="3" class="lead">Ola</option>
       </select>
      </div>
    <div class="mb-3 mt-0">
      <label class="mb-1 lead fs-6">Seleccionar el Proveedor</label>
       <select class="form-select has-validation text-primary text-opacity-75 fw-semibold" aria-label="default select example" id="id_proveedor" name="id_proveedor" required>
         			<option selected value="<?php echo $getData['id_proveedor'];?>"><?php
              switch ($getData['id_proveedor']) {
                case 1:
                  echo"Soalpro";
                  break;
                  case 2:
                  echo"La Estrella";
                  break; 
                  case 3:
                  echo"Arcor";
                  break;
                default:
                  echo 'No existe dato';
                  break;
              }
            ?></option>
            <option value="1" class="lead">Soalpro</option>
            <option value="2" class="lead">La Estrella</option>
            <option value="3" class="lead">Arcor</option>
       </select>
      </div>
  
      <div class="d-grid gap-2 d-md-flex justify-content-md-center">
      <button type="submit" name="submit" id="submit" class="btn btn-dark">Guardar Cambios</button>
      <button type="submit" name="delete" id="delete" class="btn btn-danger">Eliminar dato</button>
      <span><a class="btn btn-success" href="resultado.php">Cancelar Cambio </a></span>
      </div>
  </form>
  <!--end FORMULARIO DE REGISTRO-->
</div>
  </div>
   
 </section>
 <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>


