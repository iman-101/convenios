

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
<script type="text/javascript" src="../../js/activeClass.js"></script> 
<title>Lista de usuarios</title>
</head>
<body>

<?php 
(TEMPLATE)::login();
(TEMPLATE)::nav("../../");
   //(TEMPLATE)::header("Usuario");
   
   
  

?>

     <div class="container">
        <h2 class="text-center m-3">Lista de usuario</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Usuario</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellidos</th>
              <th scope="col">Operaciones</th>
            </tr>
          </thead>
          <tbody>
          <?php  foreach($usuarios as $usuario){
          
             echo "<tr>";
             echo "<td scope='row'>$usuario->usuario</td>";
             echo "<td scope='row'>$usuario->nombre</td>";
             echo "<td scope='row'>$usuario->apellido1 $usuario->apellido2</td>";
             
             echo "<td scope='row'>";
             echo "<a href='/usuario/show/$usuario->id'>Ver </a>";
             echo "<a href='/usuario/edit/$usuario->id'> Actualizar </a>";
             echo "<a href='/usuario/delete/$usuario->id'> Borrar</a>";
             echo "</td>";
              echo " </tr>";
                
          }?>
             
        
          </tbody>
        </table>
     </div>
   <?php 
           
           (TEMPLATE)::footer();
           
           ?>
           

</body>
</html>