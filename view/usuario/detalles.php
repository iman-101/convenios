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
<script type="text/javascript" src="../js/jquery.js"></script>
<!--bootstrap js-->
<script src="../js/bootstrap.min.js"></script>
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
        <h2>Detalles del usuario</h2>
        <h3><?="$usuario->usuario ($usuario->email)"?></h3>
        
        
        <p><b>Usuario : </b><?=$usuario->usuario?></p>
        <p><b>Nombre : </b><?=$usuario->nombre?></p>
        <p><b>Apellidos :</b><?="$usuario->apellido1  $usuario->apellido2"?></p>
        <p><b>Privilegios : </b><?=$usuario->privilegio?></p>
        <p><?=$usuario->administrador? "Administrador": "No administrador"?></p>
        <p><b>Email : </b><?=$usuario->email?></p>

       <a href='/usuario/edit/<?=$usuario->id ?>'>Edita usuario</a>
       <a href='/usuario/delete/<?=$usuario->id ?>'>Borrar usuario</a>
      
   </div>
</body>
</html>