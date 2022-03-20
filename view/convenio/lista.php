<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
<!--font awsome-->
<link rel="stylesheet" type="text/css" href="../../mypro/css/all.min.css">
<!--jquery-->
<script type="text/javascript" src="../../js/jquery.js"></script>
<!--bootstrap js-->
<script src="../../js/bootstrap.min.js"></script>
<!--my style-->
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<script type="text/javascript" src="../../js/myscript.js"></script>
       
<script type="text/javascript" src="../js/activeClass.js"></script>  
<title>Biblioteca</title>
</head>
<body>
    <?php 
    (TEMPLATE)::login();
    (TEMPLATE)::nav("../../");
    ?>
    <div class="container">
   
      
     
   <h2 class="text-center">Lista de convenios</h2>
   
 <?php  if(!empty($convenios) ){
 ?>
      <table border='1' class="table table-striped">
         <thead >
              <tr>
               <th scope="col">id</th>
                 <th scope="col">idalumno</th>
                 <th scope="col">idempresa</th>
                 <th scope="col">inicio</th>
                 <th scope="col">fin</th>
                   <th scope="col">estado</th>
                 <th scope="col">horario</th>
                  <th scope="col">duracion</th>
                 <th scope="col">destalles</th>
                  <th scope="col">Actualizar</th>
              </tr>
       </thead>
       </tbody>
      
      <?php 
      
      foreach($convenios as $al){
          
          echo "<tr>";
          
          
            echo " <td>$al->id</td>";
            echo " <td>$al->idalumno</td>";
            echo "<td>$al->idempresa</td>";
           
            echo "<td>$al->inicio</>";
            echo "<td>$al->fin</td>";
            echo "<td>$al->estado</td>";
            echo "<td>$al->horario</td>";
            echo "<td>$al->duracion</td>";
            echo "<td>$al->detalles</td>";
            echo "<td><a href='/convenio/show/$al->id'>Ver</a></td>";
            if(Login::get()->rol =="cordinador"){
                
         
            echo "<td><a href='/convenio/edit/$al->id'>Actualizar</a></td>";
            echo "<td><a href='/convenio/delete/$al->id'>Eliminar</a></td>";
            }
         
            echo "</td>";
            echo "</tr>";
        }
     
      ?>
      </tbody>
 </table>
 <?php }else{
     echo "<h2>No se encuentra convenios</h2>";
     
 }?>
</div>
  </body>
  </html> 