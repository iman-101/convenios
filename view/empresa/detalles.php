
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
<h2>Detalles del empresa </h2>



<p><b>id:</b><?=$empresa->id?></p>
<p><b>Nombre: </b><?=$empresa->nombre?></p>
  
<p><b>Cif: </b><?=$empresa->cif?></p>

<p><b>Nombre: </b><?=$empresa->nombrecontacto?></p>
<p><b>telefono: </b><?=$empresa->telefonocontacto?></p>
<p><b>Web: </b><?=$empresa->web?></p>
<p><b>Perfil: </b><?=$empresa->perfil?></p>
<p><b>Valoracion: </b><?=$empresa->valoracion?></p>
 <a href='/empresa/edit/<?=$empresa->id?>'>Editar</a>
 <a href='/empresa/delete/<?=$empresa->id?>'>Eliminar</a>;
 <a href='/convenio/createid/<?=$empresa->id?>'>Nuevo convenio</a>;
<h2>Convenios</h2>

   
  <table border='1' class="table table-striped">
  <?php 
  if($convenios!==null){
    
      foreach( $convenios as $e){?>
           <p><b>Id: </b><?=$e->id?></p>
           <p><b>id alumno: </b><?=$e->idalumno?></p>
           <p><b>inicio: </b><?=$e->inicio?></p>
           <p><b>fin: </b><?=$e->fin?></p>
              <p><b>Horario: </b><?=$e->horario?></p>
           <p><b>id Estado: </b><?=$e->estado?></p>
              <p><b>Duracion: </b><?=$e->duracion?></p>
         
      <?php }
         
      
  }else{
      
      
      echo "<p>No tiene convenios.</p>";
  }
  
  
  ?>
</table>

  </div>
</body>
</html>