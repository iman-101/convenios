
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

<title>Biblioteca</title>
</head>
<body>
    <?php 
    Basic::login();
    Basic::nav("../../");
    ?>
      <div class="container">
      <?php if($mensaje!==""){?>
     
         <div class="alert alert-success"> 
           <h2>Exito en la operacion solicitada</h2>
           <p class='exito'><?=$mensaje?></p>
         </div>
         <?php }?>
<h2>Detalles del alumno </h2>



<p><b>id:</b><?=$alumno->id?></p>
<p><b>Nombre: </b><?=$alumno->nombre?></p>
  
<p><b>Apellidos: </b><?=$alumno->apellidos?></p>

<p><b>Poblacion: </b><?=$alumno->poblacion?></p>
<p><b>Preferencias: </b><?=$alumno->preferencias?></p>
<p><b>Email: </b><?=$alumno->email?></p>
<p><b>Perfil: </b><?=$alumno->perfil?></p>
 <a href='/alumno/edit/<?=$alumno->id?>'>Editar</a>
 <a href='/alumno/delete/<?=$alumno->id?>'>Eliminar</a>;
<h2>Prestamos</h2>

   
  <table border='1' class="table table-striped">
  <?php 
 /* if($prestamos){
      
      echo "<tr>";
      foreach($prestamos as $e){
          if($e->devolucion===null){
              echo "<td>$e</td><td><a href='/prestamo/delete/$e->id'>Borrar</a></td><td>
          <a href='/prestamo/edit/$e->id'> Actualizar</a></td><td><a href='/prestamo/devolver/$e->id'> Devolver</a></td>";
              
              echo "</tr>";
          }else{
          echo "<td>$e</td><td></td><td></td><td><a href='/prestamo/delete/$e->id'>Borrar</a></td>
          ";
        
          echo "</tr>";
          }
      }
      
  }else{
      
      
      echo "<p>No tiene prestamo.</p>";
  }
  */
  
  ?>
</table>

  </div>
</body>
</html>