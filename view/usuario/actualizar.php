
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

<title>Lista de usuarios</title>
</head>
<body>

<?php 
(TEMPLATE)::login();
(TEMPLATE)::nav("../../");
   //(TEMPLATE)::header("Usuario");
   
   
  

?>
    <div class="container">
        <h2>Formulario de edition</h2>
        <p><?="$usuario->usuario ($usuario->email)"?></p>
        
        <?=empty($GLOBALS['mensaje'])? "" : "<p>".$GLOBALS['mensaje']."</p>"?>
        
        
        
        <form method="POST" action="/usuario/update">
           
           <input type="hidden" name="id" value="<?=$usuario->id?>">
           <label>Usuario:</label>
           <input type="text" name="usuario" value="<?=$usuario->usuario?>"><br>
           
           <label>Clave:</label>
           <input type="password" name="clave" >
           <label>En blanco para cambiar la clave actual</label>
           <br>
           <label>Nombre:</label>
           <input type="text" name="nombre" value="<?=$usuario->nombre?>"><br>
           
            <label>Primer apellido:</label>
           <input type="text" name="apellido1" value="<?=$usuario->apellido1?>"><br>
           <label>Segundo apellido:</label>
           <input type="text" name="apellido2" value="<?=$usuario->apellido2?>"><br>
           
           
              
           <label>Email</label>
           <input type="email" name="email" value="<?=$usuario->email?>"><br>
            <label>Privilegeo: </label>
           <input type="number"  name="privilegio" min="0" max="9999" value="<?=$usuario->privilegio?>"><br>
        
           <input type="checkbox" name="administrador" value="1"
             <?=empty($usuario->administrador)?'' : ' checked'?> >
           <label>Conceder privilegio de administrador </label>
           <br>
        
        
           
           <input type="submit" name="actualizar"  value="Actualizar"><br>
        
        </form>
        <a href="/usuario/show/<?=$usuario->id?>">Detalles</a>
        <a href="/usuario/list">Volver al listado de usuario</a>
    </div>
</body>
</html>
