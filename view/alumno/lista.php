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
   
      
     
   <h2 class="text-center">Lista de alumnos</h2>
   
 
      <table border='1' class="table table-striped">
         <thead >
              <tr>
                 <th scope="col">Nombre</th>
                 <th scope="col">Apellidos</th>
                 <th scope="col">Poblacion</th>
                 <th scope="col">Email</th>
                   <th scope="col">Preferencias</th>
                 <th scope="col">Perfil</th>
                 
                  <th scope="col">Actualizar</th>
              </tr>
       </thead>
       </tbody>
      
      <?php 
      foreach($alumnos as $al){
          
          echo "<tr>";
          
          
            echo " <td>$al->nombre</td>";
            echo " <td>$al->apellidos</td>";
            echo "<td>$al->poblacion</td>";
            echo "<td>$al->email</td>";
            echo "<td>$al->preferencias</td>";
            echo "<td>$al->perfil</td>";
            echo " <td>";
           
            echo " <a href='/alumno/show/$al->id'>Ver</a>";
            echo " <a href='/alumno/edit/$al->id'>Editar</a>";
            echo " <a href='/alumno/delete/$al->id'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
      }
      ?>
      </tbody>
 </table>
</div>
  </body>
  </html> 