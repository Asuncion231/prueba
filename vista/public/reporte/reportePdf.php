<?php
 ob_start();
?>

<?php
include "../../../modelo/BD/config.php";
include "../../../modelo/BD/dataBase.php";
$dbname=new DataBase();
$query="SELECT * FROM tbproducto";
$read =$dbname->select($query);
?>

<h1 bgcolor="red" colspan="8"> <FONT COLOR="Black">
                        <?php 

                              $time = time();

                            echo date("d-m-Y (H:i:s)", $time);

                        ?>
                    </FONT>
                      </h1>
  <table class="table table-hover table-striped" border="1" id="tabla">
            <thead>
              <th bgcolor="#90147F" colspan="8"><FONT COLOR="white"><center><h1>Lista De Productos</h1></center></FONT></th>
              <tr class="text-light bg-dark text-center">
                
                <th bgcolor="#90147F" scope="col"><FONT COLOR="white">id_producto</FONT></th>
                <th bgcolor="#90147F" scope="col"><FONT COLOR="white">nombre</FONT></th>
                <th bgcolor="#90147F" scope="col"><FONT COLOR="white">cantidad</FONT></th>
                <th bgcolor="#90147F" scope="col"><FONT COLOR="white">precio</FONT></th>
                <th bgcolor="#90147F" scope="col"><FONT COLOR="white">Categoria</FONT></th>
                <th bgcolor="#90147F" scope="col"><FONT COLOR="white">Proveedor</FONT></th>
                        <th bgcolor="#90147F" scope="col"><FONT COLOR="white">Direccion</FONT></th>
                        <th bgcolor="#90147F" scope="col"><FONT COLOR="white">Telefono</FONT></th>
                        
                
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

       

              <?php } ?>
            </tr>
              
            </tbody>
          </table>  

          <?php

          $html = ob_get_clean();
          //echo $html;

          require_once './libreria/dompdf/autoload.inc.php';
          use Dompdf\Dompdf;
          $dompdf = new Dompdf();

          $options = $dompdf -> getOptions();
          $options -> set(array('isRemoteEnabled' => true));
          $dompdf -> setOptions($options);

          $dompdf -> loadHtml("$html");

          $dompdf -> setPaper('letter');

          $dompdf -> render();

  $dompdf -> stream("archivo.pdf", array("Attachment" => true));

        ?>