
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
      <?php if(!empty($GLOBALS['mensaje'])){?>
     
         <div class="alert alert-success"> 
           <h2>Exito en la operacion solicitada</h2>
           <p class='exito'><?=$GLOBALS['mensaje']?></p>
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

 <?php if(empty($GLOBALS['mensaje'])){?>
      <a href='/alumno/edit/<?=$alumno->id?>'>Editar</a>
 <a href='/alumno/delete/<?=$alumno->id?>'>Eliminar</a>;
<h2>Convenios</h2>
<?php   if(!empty($convenios)){?>
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
    
    }?>
  
  </tbody>
</table>
        


  </div>
</body>
</html>