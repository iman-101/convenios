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
     <?php  if(!empty($convenios)){?>
   <table border='1' class="table table-striped">
         <thead >
              <tr>
              <th scope="col">ID</th>
                 <th scope="col">Idalumno</th>
                 <th scope="col">Inicio</th>
                 <th scope="col">Fin</th>
                 <th scope="col">Horario</th>
                   <th scope="col">Estado</th>
                 <th scope="col">Duracion</th>
            
               
              </tr>
       </thead>
       </tbody>
  <?php 
  
 
 
  
          
       foreach($convenios as $e){
     
          echo "<tr>";
          
          echo " <td>$e->id</td>";
          echo " <td>$e->idalumno</td>";
          echo " <td>$e->inicio</td>";
          echo " <td>$e->fin</td>";
          echo " <td>$e->horario</td>";
          echo " <td>$e->estado</td>";
          echo " <td>$e->horario</td>";
          echo " <td>$e->duracion</td>";
          
       }
       
       }else{
        echo "No tiene convenios.";
    }
             ?>
      </tbody>
 </table>

</div>
  </body>
  </html> 