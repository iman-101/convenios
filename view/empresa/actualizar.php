
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<!--font awsome-->
<link rel="stylesheet" type="text/css" href="/mypro/css/all.min.css">
<!--jquery-->
<script type="text/javascript" src="/js/jquery.js"></script>
<!--bootstrap js-->
<script src="/js/bootstrap.min.js"></script>
<!--my style-->
<link rel="stylesheet" type="text/css" href="/css/style.css">
<script type="text/javascript" src="/js/myscript.js"></script>

<title>Biblioteca</title>
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
        
        <form method="POST" action="/empresa/update" >
           
            
           <input type="hidden" name="id" value="<?=$empresa->id?>">
           <label>Nombre:</label>
           <input type="text" name="nombre" value="<?=$empresa->nombre?>"><br>
           
           <label>Cif:</label>
           <input type="text" name="cif" value="<?=$empresa->cif?>" maxlength="9"><br>
               
                 
            <label>Nombre Contacto:</label>
           <input type="text" name="nombrecontacto" value="<?=$empresa->nombrecontacto?>"><br>
           
           
           <label>telefono:</label>
           <input type="text" name="telefonocontacto" value="<?=$empresa->telefonocontacto?>"><br>
            <label>Perfil:</label>
           <input type="text" name="perfil" value="<?=$empresa->perfil?>"><br>
         
                     
            <label>Web:</label>
           <input type="text" name="web" value="<?=$empresa->web?>"><br>
                              
            <label>preferencias:</label>
               <input type="text" name="preferencias" value="<?=$empresa->preferencias?>">
           <br>
           <label>qbid:</label>
           
               <label>Si</label>
               
                     <input type="radio" name="qbid"   value="1"      <?= $empresa->qbid==1 ? ' checked ' :'';?>> 
                    
                      <label>No</label>    
                         <input type="radio" name="qbid" value="0"   <?= $empresa->qbid==0 ? ' checked ' :'';?>><br>
    
             
             
             
            <label>Valoracion:</label>
           <input type="text" name="valoracion" value="<?=$empresa->valoracion?>"><br>
        
           <input type="submit" name="actualizar"  value="Actualizar"><br>
        
        </form>
        <?php if(Login::get()->rol=="corrdinador"){?>
        <a href="/empresa/show/<?=$empresa->id?>">Detalles</a>
        <a href="/empresa/list">Volver al listado</a>
        <?php }?>
   </div>
</body>
</html>