<?php
include "../../modelo/BD/config.php";
include "../../modelo/BD/dataBase.php";
$dbname=new DataBase();
$query="SELECT * FROM tbproducto";
$read =$dbname->select($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="curso de php Segundo año">
  <meta name="keywords" content="Introduccion al lenguaje Php">
  <title>Resultado</title>
   <link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="../assets/dataTableV/jsTables/vanilla-dataTables2.min.css">
  <script src="../assets/dataTableV/jsTables/vanilla-dataTables2.min.js"></script>
</head>
<body>
  <section class="container bg-light mt-5 p-4 rounded fade-in">

        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid bg-primary">
          <li><a class="navbar-brand text-light" href="resultado.php">Lista de Productos</a></li>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
        <li><a class="nav-link active text-light" aria-current="page" href="../../index.php">Registrar Producto</a></li>

          </div>
        </div>
      </div>
    </nav>
 <main class="row my-4">
 		<div class="col-lg-12">
        <span><a class="btn btn-danger" href="reporte/reportePdf.php" >Reporte Pdf</a></span>
        <span><a class="btn btn-success" href="reporte/reporteExcel.php">Reporte Excel</a></span>
         	<table class="table table-hover table-striped" id="tabla">
         		<thead>
         			<tr class="text-light bg-dark text-center">
         				<th scope="col">id_producto</th>
         				<th scope="col">nombre</th>
         				<th scope="col">cantidad</th>
         				<th scope="col">precio</th>
         				<th scope="col">Categoria</th>
         				<th scope="col">Proveedor</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                 <th scope="col">Accion</th>  
                
         			</tr>
         		</thead>
         		<tbody class="text-center">
         			<?php foreach ($read as $row) {?>
              <tr>
         			<td class="bg-light text-uppercase"><?php echo $row['id_producto'];?></td>
         			<td class="bg-light text-uppercase"><?php echo $row['nombre'];?></td>
         			<td class="bg-light text-uppercase"><?php echo $row['cantidad'];?></td>
         			<td class="bg-light text-uppercase"><?php echo $row['precio'];?></td>
         			<td class="bg-light text-success fw-semibold fst-italic"><?php 
              switch ($row['id_categoria']) {
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
            ?></td>

          <td class="bg-light text-success fw-semibold fst-italic"><?php 
              switch ($row['id_proveedor']) {
                case 1:
                  echo"Soalpro";
                  break;
                  case 2:
                  echo"Estrella";
                  break; 
                  case 3:
                  echo"Arcor";
                  break;
                default:
                  echo 'No existe dato';
                  break;
              }
            ?></td>

          <td class="bg-light text-success fw-semibold fst-italic"><?php 
              switch ($row['id_proveedor']) {
                case 1:
                  echo"Camino a viacha #1012";
                  break;
                  case 2:
                  echo"Camino Oruro #456";
                  break; 
                  case 3:
                  echo"Cruce Viacha #1236";
                  break;
                default:
                  echo 'No existe dato';
                  break;
              }
            ?></td>

        <td class="bg-light text-success fw-semibold fst-italic"><?php 
              switch ($row['id_proveedor']) {
                case 1:
                  echo"24708836";
                  break;
                  case 2:
                  echo"2459963";
                  break; 
                  case 3:
                  echo"2472988";
                  break;
                default:
                  echo 'No existe dato';
                  break;
              }
            ?></td>

          <td class="bg-light text-uppercase"><a href="actualizaProducto.php?id_producto=<?php echo urlencode($row['id_producto']);?>" class="btn btn-success btn-sm">Editar</a></td>

         			<?php } ?>
         		</tr>
         			
         		</tbody>
         	</table>	
 	</div>
 	
 </main>
 </section>
 <script>
   var tabla = document.querySelector("#tabla");
   var dataTable = new DataTable(tabla);

 </script>
<script type="../vista/bootstrap/js/bootstrap.min.css"></script>
</body>
</html>

