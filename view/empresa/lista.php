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
       
<script type="text/javascript" src="../js/activeClass.js"></script>  
<title>Biblioteca</title>
</head>
<body>
    <?php 
    (TEMPLATE)::login();
    (TEMPLATE)::nav("../../");
    ?>
    <div class="container">
   
      
              <form method="post" action="/empresa/buscar">
             
             <label>Camp:</label>
             
          <select name="campo">
             
                  <option value="nombre" <?=!empty($campo) && $campo=='nombre'? ' selected ' :'';?>>
                  
                  Nombre</option>
              
                  <option value="id" <?=!empty($campo) && $campo=='id'? ' selected ' :'';?>>
                  
                  Id</option>
                  
                  <option value="cif" <?=!empty($campo) && $campo=='cif'? ' selected ' :'';?>>
                  
                  Cif</option>
                
             </select>
             
            <label>Valor:</label>
            
            <input type="text" name="valor" value=""<?=!empty($valor)? $valor : '';?>>
            
             <label>Orden:</label> 
             
              <select name="orden">
                 <option value="nombre" <?=!empty($orden) && $orden=='nombre'? ' selected ' :'';?>>
                  
                  Nombre</option>
                
                  
                  <option value="id" <?=!empty($orden) && $orden=='id'? ' selected ' :'';?>>
                  
                  id</option>
                   
                  <option value="cif" <?=!empty($orden) && $orden=='cif'? ' selected ' :'';?>>
                  
                  Cif</option>
              </select>
              <input type="radio" name="sentido" value="ASC"  
             <?=empty($sentido) || $sentido=='ASC'? ' checked ' :'';?>>
            <label>ascedente</label>
            
             <input type="radio" name="sentido" value="DESC"  
             <?=!empty($sentido) && $sentido=='DESC'? ' checked ' :'';?>>
             <label>descedente</label>
             <input type="submit" name="buscar" value="Buscar">
          </form>
      <a href="/empresa/list">Quitar Filtros</a>
   <h2 class="text-center">Lista de empresas</h2>
   
          <?php if(!empty($GLOBALS['mensaje'])){?>
     
         <div class="alert alert-danger"> 
         
           <h2 class='exito'><?=$GLOBALS['mensaje']?></h2>
         </div>
         <?php }else{?>

   
 
      <table border='1' class="table table-striped">
         <thead >
              <tr>
              <th scope="col">ID</th>
                 <th scope="col">Nombre</th>
                 <th scope="col">Cif</th>
                 <th scope="col">Nombre contacto</th>
                 <th scope="col">Telefono de contacto</th>
                   <th scope="col">Web</th>
                 <th scope="col">Perfil</th>
                 <th scope="col">Qvid</th>
                   <th scope="col">Valoracion</th>
               
              </tr>
       </thead>
       </tbody>
      
      <?php 
      foreach($empresas as $al){
          
          echo "<tr>";
          
          echo " <td>$al->id</td>";
            echo " <td>$al->nombre</td>";
            echo " <td>$al->cif</td>";
            echo "<td>$al->nombrecontacto</td>";
            echo "<td>$al->telefonocontacto</td>";
            echo "<td>$al->web</td>";
            echo "<td>$al->perfil</td>";
            echo "<td>$al->qbid</td>";
            echo "<td>$al->valoracion</td>";
            echo " <td>";
           
            echo " <a href='/empresa/show/$al->id'>Ver</a>";
            echo " <a href='/empresa/edit/$al->id'>Editar</a>";
            echo " <a href='/empresa/delete/$al->id'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
      }
      ?>
      </tbody>
 </table>
 <?php }?>
</div>
  </body>
  </html> 