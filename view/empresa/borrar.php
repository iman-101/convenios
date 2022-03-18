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
   <?php 
    //(TEMPLATE)::header("Baje de usuario");
    ?>
    <h2 class="text-info m-3">Confirmar baja de empresa</h2>
   
    
    <form method="post" action="/usuario/destroy" class="m-3">
       <p>Confirmar la baja  del alumno <?=$usuario->email?></p>
       <input type="hidden" name="id" value="<?=$id?>">
       
       <input type="submit" name="borrar" value="Borrar" class="btn btn-info">
    </form>
    
    
    <a href="/usuario/show/<?=$usuario->id?>">Detalles</a>
    <a href="/usuario/list">Volver al listado</a>
        <?php 
        
       // (TEMPLATE)::footer();
        ?>
    </div>
</body>
</html>