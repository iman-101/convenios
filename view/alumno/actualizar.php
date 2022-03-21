
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
    (TEMPLATE)::login();
    (TEMPLATE)::nav("../../");
    ?>
   <div class="container">
        <h2>Formulario de edition</h2>
        
        
        <?=empty($GLOBALS['mensaje'])? "" : "<p>".$GLOBALS['mensaje']."</p>"?>
        
        
        
        <form method="POST" action="/alumno/update" >
           <?php if(Login::get()->rol == "alumno"){?>
           <input type="hidden" name="id" value="<?=$alumno->id?>">
           <label>Preferencias:</label>
           <input type="text" name="preferencias" value="<?=$alumno->preferencias?>"><br>
           <?php }else{?>
           
           <input type="hidden" name="id" value="<?=$alumno->id?>">
           <label>Nombre:</label>
           <input type="text" name="nombre" value="<?=$alumno->nombre?>"><br>
           
           <label>Apellidos:</label>
           <input type="text" name="apellidos" value="<?=$alumno->apellidos?>"><br>
               
                 
            <label>Poblacion:</label>
           <input type="text" name="poblacion" value="<?=$alumno->poblacion?>"><br>
           
           
           <label>Preferencias:</label>
           <input type="text" name="preferencias" value="<?=$alumno->preferencias?>"><br>
       <label>Perfil:</label>
           <input type="text" name="perfil" value="<?=$alumno->perfil?>"><br>
         
           <?php }?>
           
           <input type="submit" name="actualizar"  value="Actualizar"><br>
        
        </form>
        <a href="/alumno/show/<?=$alumno->id?>">Detalles</a>
        <a href="/alumno/list">Volver al listado</a>
   </div>
</body>
</html>