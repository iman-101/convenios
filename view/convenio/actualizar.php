
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
        
        
        
        <form method="POST" action="/convenio/update" >
           
           <input type="hidden" name="id" value="<?=$convenio->id?>">
           <label>Horario:</label>
           <input type="text" name="horario" value="<?=$convenio->horario?>"><br>
           
           <label>Duracion:</label>
           <input type="text" name="duracion" value="<?=$convenio->duracion?>"><br>
               
                 
            <label>Inicio:</label>
           <input type="date" name="inicio" value="<?=$convenio->inicio?>"><br>
           
           
           <label>Fin:</label>
           <input type="date" name="fin" value="<?=$convenio->fin?>"><br>
            
         
                     
           <label>Detalles:</label>
           <input type="text" name="detalles" value="<?=$convenio->detalles?>"><br>
           
          <label>Estado:</label>
           <input type="text" name="estado" value="<?=$convenio->estado?>"><br>
        
           
           <input type="submit" name="actualizar"  value="Actualizar"><br>
        
        </form>
        <a href="/convenio/show/<?=$convenio->id?>">Detalles</a>
        <a href="/convenio/list">Volver al listado</a>
   </div>
</body>
</html>