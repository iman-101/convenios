
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

<title>Convenio</title>
</head>
<body>
    <?php 
    (TEMPLATE)::login();
    (TEMPLATE)::nav("../../");
    ?>
   <div class="container">
        <h2>Formulario de edition</h2>
        
          <?php if(!empty($GLOBALS['mensaje'])){?>
     
         <div class="alert alert-success"> 
           <h2>Exito en la operacion solicitada</h2>
           <p class='exito'><?=$GLOBALS['mensaje']?></p>
         </div>
         <?php }?>
        
        
        
        <form method="POST" action="/alumno/update" >
           
           <input type="hidden" name="id" value="<?=$alumno->id?>">
           <label>Preferencias:</label><br>
           <textarea name="preferencias" ><?=$alumno->preferencias?></textarea> <br>
               <input type="submit" name="actualizar"  value="Actualizar"><br>
        </form>
       
   </div>
</body>
</html>