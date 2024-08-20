

i<?php
include "modelo/BD/config.php";
include "modelo/BD/dataBase.php";
/*======REGISTRAR USUARIO======*/
$dbname=new DataBase();
if(isset($_POST['submit'])){
  $nombre =mysqli_real_escape_string($dbname->link, $_POST['nombre']);
  $cantidad =mysqli_real_escape_string($dbname->link, $_POST['cantidad']); 
  $precio =mysqli_real_escape_string($dbname->link, $_POST['precio']);
  $id_categoria =mysqli_real_escape_string($dbname->link, $_POST['id_categoria']);
  $id_proveedor =mysqli_real_escape_string($dbname->link, $_POST['id_proveedor']);

  if($nombre==''|| $cantidad==''|| $precio==''|| $id_categoria=='' || $id_proveedor==''){
    header('Location:index.php?msg='.urldecode('Debe llenar los campos'));
    /*encriptando contraseña*/
  } else{
    
    $query="INSERT INTO tbproducto(nombre,cantidad, precio, id_categoria, id_proveedor)
    VALUES('$nombre', '$cantidad', '$precio', '$id_categoria', '$id_proveedor')";
    $create=mysqli_insert_id($dbname->registerUser($query));
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="curso de php Segundo año">
  <meta name="keywords" content="registro">
  <title>Formulario para registrar</title>
    <link rel="stylesheet" type="text/css" href="vista/assets/bootstrap/bootstrap.min.css">

</head>
<body>
 <!--Estructura de la pagina-->
 <section class="container bg-light mt-5 p-4 rounded fade-in">
  <!--Columnas para Bootstrap-->
    <!--NAMBAR-->
    <nav class="navbar navbar-expand-lg navbar-danger">
      <div class="container-fluid bg-primary">
      
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar nav">
          
            <li class="nav-icon"><a class="nav-link text-light"href="vista/public/resultado.php">MOSTRAR LISTA PRODUCTOS</a></li>
          </ul>
        </div>
      </div>
    </nav>
<!--FIN NAVBAR-->
<!--FIN DE PRESENTACION DE PROYECTO-->
<!--COLUMNA DEL FORMULARIO REGISTRO DATOS-->
<div class="col-sm-12 col-md-12 col-lg-6">
  <h2 class=" text-danger fw-semibold text-uppercase text-center">FORMULARIO DE REGISTRO PRODUCTO</h2>
  <!--FORMULARIO DE REGISTRO PRODUCTO-->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="row g-3 p-3 rounded needs-validation" novalidate method="POST" enctype="multipart/form-data"> <!--atributo que permite trabajar con archivos-->
    <?php
    if(isset($_GET['msg'])){/*obtiene el mensaje que manda el checklogin a la url*/
      echo"<center><div class='alert alert-danger fw-bold fst-italic'><span>" .$_GET['msg'] ."</span></div></center>";
    }
    ?>

    <div class="mb-3">
      <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Introducir nombre producto">
    </div>
      <div class="mb-3">
      <input type="text" class="form-control" id="cantidad" name="cantidad" required placeholder="Introducir cantidad">
    </div>
      <div class="mb-3">
      <input type="text" class="form-control" id="precio" name="precio" required placeholder="Introducir precio">
    </div>


     <div class="mb-3 mt-0">
      <label class="mb-1">Seleccionar el proveedor</label>
    <select class="form-select has-validation" aria-label="default select example" id="id_proveedor" name="id_proveedor" required>
         <option selected></option>
         <option value="1" class="lead">Soalpro</option>
         <option value="2" class="lead">La Estrella</option>
         <option value="3" class="lead">Arcor</option>
       </select>
      </div>
 
 <div class="mb-3 mt-0">
      <label class="mb-1">Seleccionar la Categoria</label>
    <select class="form-select has-validation" aria-label="default select example" id="id_categoria" name="id_categoria" required>
         <option selected></option>
         <option value="1" class="lead">Dulces</option>
         <option value="2" class="lead">Fideos</option>
         <option value="3" class="lead">Limpieza</option>
       </select>
      </div>

      <div class="col-12">
      <button type="submit" name="submit" id="submit" class="btn btn-dark">Registrar</button>
      <span><a class="btn btn-success" href="index.php">Limpiar Datos </a></span>
      </div>
  </form>
  <!--end FORMULARIO DE REGISTRO-->
</div>
 <div class="col-sm-12 col-md-12 col-lg-6">
</div>
   
 </section>
 <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>